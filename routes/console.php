<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// commande de synchronisation des flux rss et api 
Schedule::command('app:sync-feeds')->everyMinute();

//par jour
// Schedule::command('app:sync-feeds')->daily();
