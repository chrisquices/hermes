<?php

namespace App\Http\Livewire;

use App\Models\Message;
use App\Models\User;
use Livewire\Component;

class Chat extends Component {

	public $user;
	public $contacts;
	public $recent_chats;

	public $active_pane;
	public $search_term;
	public $message;
	public $selected_chat;
	public $selected_chat_messages;
	public $selected_chat_messages_count_old;

	public function mount()
	{
		$this->user = auth()->user();
		$this->active_pane = 'recent-chats';

		$this->createMissingConversations();
	}

	public function render()
	{
		if ($this->search_term) {
			$this->contacts = User::query()
				->where('name', 'like', '%' . $this->search_term . '%')
				->where('id', '!=', $this->user->id)
				->orderBy('name')
				->get();
		} else {
			$this->contacts = User::query()
				->where('id', '!=', $this->user->id)
				->orderBy('name')
				->get();
		}

		$recent_chats = \App\Models\Chat::query()
			->where('first_user_id', $this->user->id)
			->orWhere('second_user_id', $this->user->id)
			->get();

		foreach ($recent_chats as $key => $recent_chat) {
			if (!$recent_chat->last_message) {
				$recent_chats->forget($key);
			}
		}

		$this->recent_chats = $recent_chats->sortByDesc('last_message_sent_at');

		if ($this->selected_chat) {
			$this->getMessages();
		}

		return view('livewire.chat');
	}

	public function getChat($first_user_id = null, $second_user_id = null)
	{
		$this->selected_chat_messages_count_old = null;

		$this->selected_chat = \App\Models\Chat::query()
			->where('first_user_id', $first_user_id)
			->where('second_user_id', $second_user_id)
			->first();

		if (!$this->selected_chat) {

			$this->selected_chat = \App\Models\Chat::query()
				->where('second_user_id', $this->user->id)
				->where('first_user_id', $user_id)
				->first();

			if (!$this->selected_chat) {
				$new_chat = new \App\Models\Chat();
				$new_chat->first_user_id = $first_user_id;
				$new_chat->second_user_id = $second_user_id;
				$new_chat->save();

				$this->selected_chat = $new_chat;

			}

		}

		$this->getMessages();

		$this->message = '';

	}

	public function getMessages()
	{
		$this->selected_chat_messages = Message::where('chat_id', $this->selected_chat->id)->get();

		if ($this->selected_chat_messages_count_old != $this->selected_chat_messages->count()) {
			$this->selected_chat_messages_count_old = $this->selected_chat_messages->count();
			$this->dispatchBrowserEvent('scrollConversationToBottom');
		}
	}

	public function storeMessage()
	{
		if ($this->selected_chat && $this->message) {

			$new_message = new Message();
			$new_message->chat_id = $this->selected_chat->id;
			$new_message->sent_by = $this->user->id;
			$new_message->message = $this->message;
			$new_message->sent_at = now();
			$new_message->is_read = 0;
			$new_message->save();

			$this->getMessages();

			$this->message = '';

		} else {

			$this->dispatchBrowserEvent('emptyMessage');

		}
	}

	public function updateActivePane($pane)
	{
		$this->active_pane = $pane;
	}

	public function createMissingConversations()
	{
		$users_available = User::where('id', '!=', $this->user->id)->get();

		foreach ($users_available as $user_available) {

			$chat_exist = \App\Models\Chat::query()
				->where('first_user_id', $this->user->id)
				->where('second_user_id', $user_available->id)
				->first();

			if (!$chat_exist) {
				$chat_exist = \App\Models\Chat::query()
					->where('second_user_id', $this->user->id)
					->where('first_user_id', $user_available->id)
					->first();

				if (!$chat_exist) {
					$new_chat = new \App\Models\Chat();
					$new_chat->first_user_id = $this->user->id;
					$new_chat->second_user_id = $user_available->id;
					$new_chat->save();
				}
			}
		}
	}

}
