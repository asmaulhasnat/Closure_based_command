<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendmail extends Mailable {
	use Queueable, SerializesModels;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	private $userId;
	private $queueName;
	private $name;
	public function __construct($userId, $queueName, $name) {
		$this->userId = $userId;
		$this->queueName = $queueName;
		$this->name = $name;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build() {
		return $this->view('email')->with(['email' => $this->userId,
			'queueName' => $this->queueName,
			'name' => $this->name,
		]);
	}
}
