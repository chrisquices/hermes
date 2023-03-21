<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Message extends Model {

	use HasFactory;

	public function chat()
	{
		return $this->belongsTo(Chat::class);
	}

	public function getSentByUserAttribute()
	{
		return User::find($this->sent_by);
	}

	public function getPhotoUrlAttribute()
	{
		if ($this->photo) {
			return config('app.url') . Storage::url($this->photo);
		} else {
			return null;
		}
	}

	public function getSentAtFormattedAttribute()
	{
		return Carbon::parse($this->sent_at)->format('d-m-Y H:i:s');
	}

	public function getReadAtFormattedAttribute()
	{
		return Carbon::parse($this->read_at)->format('d-m-Y H:i:s');
	}

}
