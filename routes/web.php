<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Logout;
use App\Livewire\Clients\Index;
use App\Livewire\Events\Calendar;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware(['auth', 'subscribed'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('clients', Index::class)->name('clients.index');

    Route::get('events/calendar', Calendar::class)->name('calendar.index');

    Route::get('logout', Logout::class)->name('auth.logout');

    Route::get('events/calendar/events', \App\Http\Controllers\Event\CalendarController::class)
        ->name('events.calendar.events');
});

Route::get('settings/company/subscription', App\Livewire\Settings\Company\Subscription\Index::class)
    ->middleware('auth')
    ->name('settings.company.subscription.index');

Route::get('settings/company/subscription/checkout/{planId}', App\Livewire\Settings\Company\Subscription\Create::class)
    ->middleware('auth')
    ->name('settings.company.subscription.create');

Route::get('login', Login::class)->name('auth.login');
