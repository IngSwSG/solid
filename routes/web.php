<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $report = new \App\Reporting\SalesReporter();

    $startDate = Carbon::now()->subDays(1)->toDateString();
    $endDate = Carbon::now()->toDateString();

    return $report->between($startDate, $endDate);
});
