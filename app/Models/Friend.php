<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model {

	use HasFactory;

	public function firstUser()
	{
		return $this->belongsTo(User::class);
	}

	public function secondUser()
	{
		return $this->belongsTo(User::class);
	}

}
