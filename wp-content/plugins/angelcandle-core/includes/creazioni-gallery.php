<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Metabox Galleria immagini per le Creazioni.
 */
function angelcandle_creazioni_gallery_metabox(): void
{
    add_meta_box(
        'angelcandle_creazioni_gallery',
        'Galleria immagini',
        'angelcandle_creazioni_gallery_render',
        'angel_creazione',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'angelcandle_creazioni_gallery_metabox');


/**
 * Render del metabox.
 */
function angelcandle_creazioni_gallery_render(WP_Post $post): void
{
    wp_nonce_field(
        'angelcandle_save_creazioni_gallery',
        'angelcandle_creazioni_gallery_nonce'
    );

    $image_ids = get_post_meta(
        $post->ID,
        '_angelcandle_gallery_ids',
        true
    );

    if (!is_array($image_ids)) {
        $image_ids = [];
    }
    ?>

    <div id="angelcandle-gallery">
        <div id="angelcandle-gallery-preview">
            <?php foreach ($image_ids as $image_id) : ?>
                <?php
                $thumbnail = wp_get_attachment_image_url(
                    (int) $image_id,
                    'thumbnail'
                );

                if (!$thumbnail) {
                    continue;
                }
                ?>

                <div
                    class="angelcandle-gallery-item"
                    data-id="<?php echo esc_attr($image_id); ?>"
                >
                    <img
                        src="<?php echo esc_url($thumbnail); ?>"
                        alt=""
                    >

                    <button
                        type="button"
                        class="button angelcandle-gallery-remove"
                    >
                        Rimuovi
                    </button>
                </div>
            <?php endforeach; ?>
        </div>

        <input
            type="hidden"
            id="angelcandle-gallery-ids"
            name="angelcandle_gallery_ids"
            value="<?php echo esc_attr(implode(',', $image_ids)); ?>"
        >

        <p>
            <button
                type="button"
                class="button button-primary"
                id="angelcandle-gallery-add"
            >
                Aggiungi / gestisci immagini
            </button>
        </p>

        <p class="description">
            Seleziona una o più fotografie della creazione.
            Potrai modificarle o rimuoverle in qualsiasi momento.
        </p>
    </div>

    <?php
}


/**
 * Carica Media Library + JS/CSS solamente
 * nell'editor delle Creazioni.
 */
function angelcandle_creazioni_gallery_admin_assets(string $hook): void
{
    global $post_type;

    if (
        $post_type !== 'angel_creazione' ||
        !in_array($hook, ['post.php', 'post-new.php'], true)
    ) {
        return;
    }

    wp_enqueue_media();

    wp_add_inline_style(
        'wp-admin',
        '
        #angelcandle-gallery-preview {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 15px;
        }

        .angelcandle-gallery-item {
            width: 130px;
            padding: 8px;
            background: #fff;
            border: 1px solid #dcdcde;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .angelcandle-gallery-item img {
            display: block;
            width: 100%;
            height: 110px;
            object-fit: cover;
            margin-bottom: 8px;
        }

        .angelcandle-gallery-remove {
            width: 100%;
        }
        '
    );

    wp_add_inline_script(
        'jquery-core',
        "
        jQuery(function($) {

            let frame;

            function updateGalleryIds() {
                const ids = [];

                $('#angelcandle-gallery-preview .angelcandle-gallery-item')
                    .each(function() {
                        ids.push($(this).data('id'));
                    });

                $('#angelcandle-gallery-ids').val(ids.join(','));
            }

            $('#angelcandle-gallery-add').on('click', function(e) {
                e.preventDefault();

                if (frame) {
                    frame.open();
                    return;
                }

                frame = wp.media({
                    title: 'Seleziona immagini della creazione',
                    button: {
                        text: 'Usa queste immagini'
                    },
                    library: {
                        type: 'image'
                    },
                    multiple: true
                });

                frame.on('select', function() {

                    const selection = frame.state().get('selection');

                    selection.each(function(attachment) {

                        attachment = attachment.toJSON();

                        if (
                            $('#angelcandle-gallery-preview ' +
                              '.angelcandle-gallery-item[data-id=\"' +
                              attachment.id +
                              '\"]').length
                        ) {
                            return;
                        }

                        let imageUrl = attachment.url;

                        if (
                            attachment.sizes &&
                            attachment.sizes.thumbnail
                        ) {
                            imageUrl =
                                attachment.sizes.thumbnail.url;
                        }

                        const item = $('<div>', {
                            class: 'angelcandle-gallery-item',
                            'data-id': attachment.id
                        });

                        $('<img>', {
                            src: imageUrl,
                            alt: ''
                        }).appendTo(item);

                        $('<button>', {
                            type: 'button',
                            class: 'button angelcandle-gallery-remove',
                            text: 'Rimuovi'
                        }).appendTo(item);

                        $('#angelcandle-gallery-preview').append(item);
                    });

                    updateGalleryIds();
                });

                frame.open();
            });

            $(document).on(
                'click',
                '.angelcandle-gallery-remove',
                function(e) {
                    e.preventDefault();

                    $(this)
                        .closest('.angelcandle-gallery-item')
                        .remove();

                    updateGalleryIds();
                }
            );

        });
        "
    );
}
add_action(
    'admin_enqueue_scripts',
    'angelcandle_creazioni_gallery_admin_assets'
);


/**
 * Salvataggio della galleria.
 */
function angelcandle_save_creazioni_gallery(int $post_id): void
{
    if (
        !isset($_POST['angelcandle_creazioni_gallery_nonce']) ||
        !wp_verify_nonce(
            sanitize_text_field(
                wp_unslash(
                    $_POST['angelcandle_creazioni_gallery_nonce']
                )
            ),
            'angelcandle_save_creazioni_gallery'
        )
    ) {
        return;
    }

    if (
        defined('DOING_AUTOSAVE') &&
        DOING_AUTOSAVE
    ) {
        return;
    }

    if (
        get_post_type($post_id) !== 'angel_creazione' ||
        !current_user_can('edit_post', $post_id)
    ) {
        return;
    }

    $raw_ids = isset($_POST['angelcandle_gallery_ids'])
        ? sanitize_text_field(
            wp_unslash($_POST['angelcandle_gallery_ids'])
        )
        : '';

    $image_ids = array_values(
        array_filter(
            array_map(
                'absint',
                explode(',', $raw_ids)
            )
        )
    );

    update_post_meta(
        $post_id,
        '_angelcandle_gallery_ids',
        $image_ids
    );
}
add_action(
    'save_post_angel_creazione',
    'angelcandle_save_creazioni_gallery'
);