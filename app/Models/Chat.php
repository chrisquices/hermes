<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model {

	use HasFactory;

	public $appends = ['last_message_sent_at'];

	public function firstUser()
	{
		return $this->belongsTo(User::class);
	}

	public function secondUser()
	{
		return $this->belongsTo(User::class);
	}

	public function messages()
	{
		return $this->hasMany(Message::class);
	}

	public function getFirstUserUnreadMessagesCountAttribute()
	{
		return $this->messages->where('is_read', 0)->where('sent_by', 'first_user')->count();
	}

	public function getSecondUserUnreadMessagesCountAttribute()
	{
		return $this->messages->where('is_read', 0)->where('sent_by', 'second_user')->count();
	}

	public function getLastMessageAttribute()
	{
		$last_message = $this->messages->sortByDesc('created_at')->first();

		if ($last_message) {

			if (strlen($last_message) >= 25) {
				return substr($last_message->message, 0, 25) . '...';
			}

			return $last_message;
		}

		return null;
	}

	public function getLastMessageSentAtAttribute()
	{
		$last_message = $this->messages->sortByDesc('created_at')->first();

		if ($last_message) {
			return $last_message->sent_at;
		}

		return null;
	}

	public function getLastMessageSentAtFormattedAttribute()
	{
		$last_message = $this->messages->sortByDesc('created_at')->first();

		if ($last_message) {
			return $last_message->sent_at_formatted;
		}

		return null;
	}

}
