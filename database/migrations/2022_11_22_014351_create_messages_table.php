<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('messages', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('chat_id');
			$table->text('message')->nullable();
			$table->string('sent_by');
			$table->string('photo')->nullable();
			$table->timestamp('sent_at');
			$table->timestamp('read_at')->nullable();
			$table->boolean('is_read')->default(0);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('messages');
	}

};
