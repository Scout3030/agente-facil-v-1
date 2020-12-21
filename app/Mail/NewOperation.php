<?php

namespace App\Mail;

use App\Operation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewOperation extends Mailable implements ShouldQueue {
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
			->subject(__("Nueva operación registrada en el sistema"))
			->markdown('mails.new_operation')
			->with('operation', $this->operation);
	}
}
