<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
Mail::raw('Test Gmail', function($m) { 
    $m->to('rungobf@gmail.com')->subject('Test Gmail'); 
});
echo 'OK';