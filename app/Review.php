<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Review extends Model {
	protected $fillable = [
		'user_id', 'title', 'description',
	];

	public function user() {
		return $this->belongsTo(User::class);
	}
}
