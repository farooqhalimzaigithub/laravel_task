<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */
    'paths'                => ['api/*', 'sanctum/csrf-cookie', 'storage/*'],
    'allowed_origins'      => ['http://localhost:5173'],
    'allowed_headers'      => ['Authorization', 'Content-Type', 'X-Requested-With', 'Accept', 'Origin', 'X-CSRF-TOKEN', '*'],
    'supports_credentials' => false,

];
