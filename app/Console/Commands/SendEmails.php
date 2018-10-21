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
	protected $signature = 'sendmail:sendemail {user} {--queue=}';

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
		$userId = $this->argument('user');
		$queueName = $this->option('queue');
		//$name = $this->ask('What is your name?'); //it ask for input something
		//$name = $this->anticipate('What is your name?', ['asmaul', 'hasnat', 'akther', 'sweet']); // it is give you auto complete benefit
		$name = $this->choice('What is your name?', ['asmaul', 'hasnat'], $defaultIndex = 0); //give multiple choice name
		$password = $this->secret('What is the password?');
		$headers = ['Name', 'Email'];
		$users = \App\User::all(['name', 'email'])->toArray();

		$this->table($headers, $users);
		if ($password == '123456') {
			if ($this->confirm('Do you wish to continue?')) {
				Mail::to('ahsweet92@gmail.com')->send(new sendmail($userId, $queueName, $name));
			}

		}

	}
}
