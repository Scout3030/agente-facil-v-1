<?php

namespace App\Mail;

use App\Operation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendConfirmation extends Mailable {
	use Queueable, SerializesModels;

	protected $operation;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct(Operation $operation) {
		$this->operation = $operation;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build() {
		return $this
			->subject(__("Tu operación fue confirmada"))
			->markdown('mails.send_confirmation')
			->with('operation', $this->operation);
	}
}
