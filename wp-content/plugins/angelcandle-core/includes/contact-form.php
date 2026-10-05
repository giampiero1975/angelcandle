<?php
if (!defined('ABSPATH')) { exit; }

function angelcandle_turnstile_site_key(): string {
    return defined('ANGELCANDLE_TURNSTILE_SITE_KEY') ? trim((string) ANGELCANDLE_TURNSTILE_SITE_KEY) : '';
}
function angelcandle_turnstile_secret_key(): string {
    return defined('ANGELCANDLE_TURNSTILE_SECRET_KEY') ? trim((string) ANGELCANDLE_TURNSTILE_SECRET_KEY) : '';
}
function angelcandle_contact_recipient(): string {
    if (defined('ANGELCANDLE_CONTACT_EMAIL') && is_email(ANGELCANDLE_CONTACT_EMAIL)) {
        return ANGELCANDLE_CONTACT_EMAIL;
    }
    return (string) get_option('admin_email');
}
function angelcandle_contact_redirect(string $status): void {
    wp_safe_redirect(add_query_arg('contact', $status, home_url('/contatti/')));
    exit;
}
function angelcandle_contact_client_ip(): string {
    $candidates = ['HTTP_CF_CONNECTING_IP', 'REMOTE_ADDR'];
    foreach ($candidates as $key) {
        if (!empty($_SERVER[$key])) {
            $ip = sanitize_text_field(wp_unslash($_SERVER[$key]));
            if (filter_var($ip, FILTER_VALIDATE_IP)) { return $ip; }
        }
    }
    return 'unknown';
}
function angelcandle_verify_turnstile(string $token): bool {
    $secret = angelcandle_turnstile_secret_key();
    if ($secret === '') {
        return wp_get_environment_type() === 'local';
    }
    if ($token === '') { return false; }
    $response = wp_remote_post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
        'timeout' => 8,
        'body' => [
            'secret' => $secret,
            'response' => $token,
            'remoteip' => angelcandle_contact_client_ip(),
        ],
    ]);
    if (is_wp_error($response)) { return false; }
    $data = json_decode(wp_remote_retrieve_body($response), true);
    return is_array($data) && !empty($data['success']);
}
function angelcandle_handle_contact_form(): void {
    if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') { angelcandle_contact_redirect('error'); }

    $nonce = isset($_POST['angelcandle_contact_nonce']) ? sanitize_text_field(wp_unslash($_POST['angelcandle_contact_nonce'])) : '';
    if (!$nonce || !wp_verify_nonce($nonce, 'angelcandle_contact_submit')) { angelcandle_contact_redirect('error'); }

    // Honeypot: legitimate users never fill this field.
    if (!empty($_POST['website'])) { angelcandle_contact_redirect('sent'); }

    // Human forms should not normally be submitted in under four seconds.
    $started = isset($_POST['form_started']) ? absint($_POST['form_started']) : 0;
    if (!$started || (time() - $started) < 4 || (time() - $started) > 7200) { angelcandle_contact_redirect('error'); }

    // Rate limit: max 4 accepted attempts per 15 minutes for the same IP hash.
    $ip_hash = hash_hmac('sha256', angelcandle_contact_client_ip(), wp_salt('nonce'));
    $rate_key = 'ac_contact_' . substr($ip_hash, 0, 32);
    $attempts = (int) get_transient($rate_key);
    if ($attempts >= 4) { angelcandle_contact_redirect('error'); }
    set_transient($rate_key, $attempts + 1, 15 * MINUTE_IN_SECONDS);

    $name = isset($_POST['name']) ? sanitize_text_field(wp_unslash($_POST['name'])) : '';
    $email = isset($_POST['email']) ? sanitize_email(wp_unslash($_POST['email'])) : '';
    $reason = isset($_POST['reason']) ? sanitize_key(wp_unslash($_POST['reason'])) : '';
    $message = isset($_POST['message']) ? sanitize_textarea_field(wp_unslash($_POST['message'])) : '';
    $privacy = isset($_POST['privacy']) && $_POST['privacy'] === '1';
    $allowed_reasons = ['candela', 'evento', 'regalo', 'altro'];

    if ($name === '' || mb_strlen($name) > 80 || !is_email($email) || !in_array($reason, $allowed_reasons, true) || !$privacy || mb_strlen($message) < 10 || mb_strlen($message) > 3000) {
        angelcandle_contact_redirect('error');
    }

    $turnstile = isset($_POST['cf-turnstile-response']) ? sanitize_text_field(wp_unslash($_POST['cf-turnstile-response'])) : '';
    if (!angelcandle_verify_turnstile($turnstile)) { angelcandle_contact_redirect('error'); }

    $labels = ['candela' => 'Candela personalizzata', 'evento' => 'Evento o cerimonia', 'regalo' => 'Idea regalo', 'altro' => 'Altro'];
    $subject = '[AngelCandles] ' . $labels[$reason];
    $body = "Nome: {$name}\nEmail: {$email}\nMotivo: {$labels[$reason]}\n\nMessaggio:\n{$message}";
    $headers = ['Reply-To: ' . $name . ' <' . $email . '>'];

    $sent = wp_mail(angelcandle_contact_recipient(), $subject, $body, $headers);
    angelcandle_contact_redirect($sent ? 'sent' : 'error');
}
add_action('admin_post_nopriv_angelcandle_contact', 'angelcandle_handle_contact_form');
add_action('admin_post_angelcandle_contact', 'angelcandle_handle_contact_form');

function angelcandle_contact_turnstile_script(): void {
    if (!is_page('contatti') || angelcandle_turnstile_site_key() === '') { return; }
    wp_enqueue_script('cloudflare-turnstile', 'https://challenges.cloudflare.com/turnstile/v0/api.js', [], null, true);
}
add_action('wp_enqueue_scripts', 'angelcandle_contact_turnstile_script', 20);
