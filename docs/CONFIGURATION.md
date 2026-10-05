# AngelCandles - configurazione ambiente

Le credenziali e i valori specifici dell'ambiente non devono essere salvati nella repository.

## Form Contatti

Il plugin `angelcandle-core` legge queste costanti da `wp-config.php`:

```php
define('ANGELCANDLE_TURNSTILE_SITE_KEY', '...');
define('ANGELCANDLE_TURNSTILE_SECRET_KEY', '...');
define('ANGELCANDLE_CONTACT_EMAIL', '...');
```

Inserirle in `wp-config.php` prima della riga `/* That's all, stop editing! Happy publishing. */`.

### Sviluppo locale

Per testare Cloudflare Turnstile in locale usare esclusivamente le chiavi di test ufficiali Cloudflare. Non salvare chiavi reali nella repository.

Site key di test (validazione positiva):

```text
1x00000000000000000000AA
```

Secret key di test corrispondente:

```text
1x0000000000000000000000000000000AA
```

Configurazione locale:

```php
define('ANGELCANDLE_TURNSTILE_SITE_KEY', '1x00000000000000000000AA');
define('ANGELCANDLE_TURNSTILE_SECRET_KEY', '1x0000000000000000000000000000000AA');
```

`ANGELCANDLE_CONTACT_EMAIL` puo essere omessa durante lo sviluppo. In assenza della costante, il form usa l'indirizzo email amministrativo configurato in WordPress.

## Produzione

Quando sara disponibile il dominio definitivo:

1. creare un widget Turnstile per il dominio;
2. usare la Site Key e la Secret Key reali esclusivamente nella configurazione del server;
3. impostare `ANGELCANDLE_CONTACT_EMAIL` con l'indirizzo definitivo che deve ricevere i messaggi;
4. non committare mai `wp-config.php` o Secret Key nella repository;
5. verificare l'invio email e la validazione Turnstile prima della pubblicazione.

Il sito AngelCandles e attualmente configurato come sito vetrina: il modulo Contatti raccoglie richieste informative e non costituisce un ordine o un acquisto online.
