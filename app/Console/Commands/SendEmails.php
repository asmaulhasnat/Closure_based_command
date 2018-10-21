<?php

namespace App\Console\Commands;

use App\Mail\sendmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmails extends Command {
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'sendmail:sendemail';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'sending mail using command';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle() {
		Mail::to('ahsweet92@gmail.com')->send(new sendmail());
	}
}
