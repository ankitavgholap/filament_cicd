<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// Check for core providers
$providers = [
    'Illuminate\Filesystem\FilesystemServiceProvider',
    'Illuminate\Foundation\Providers\FoundationServiceProvider',
    'Illuminate\Foundation\Providers\ConsoleSupportServiceProvider',
];

foreach ($providers as $provider) {
    if (class_exists($provider)) {
        echo "$provider exists\n";
    } else {
        echo "$provider DOES NOT exist\n";
    }
}