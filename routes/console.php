<?php
use App\Mail\sendmail;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
 */

Artisan::command('inspire', function () {
	$this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('sendmail', function () {
	Mail::to('ahsweet92@gmail.com')->send(new sendmail());
	$this->warn('mail send using closure based command');
})->describe('mail send using Closure based command');
