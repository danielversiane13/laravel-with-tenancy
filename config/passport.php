<?php

return [
  'storage' => [
    'database' => [
      'connection' => 'main',
    ],
  ],
  'key_path' => env('OAUTH_KEY_PATH', 'storage')
];
