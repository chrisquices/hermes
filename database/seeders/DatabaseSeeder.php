<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {

	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		User::factory()->create([
			'name'     => 'Christopher Quiñonez',
			'email'    => 'rosphrethic@hermes.com',
			'password' => Hash::make('password'),
			'photo'    => 'users/1.jpg',
		]);

		User::factory()->create([
			'name'     => 'Sean McLoughlin',
			'email'    => 'jacksepticeye@hermes.com',
			'password' => Hash::make('password'),
			'photo'    => 'users/2.jpg',
		]);

		User::factory()->create([
			'name'     => 'Ludwig Ahgren',
			'email'    => 'ludwig@hermes.com',
			'password' => Hash::make('password'),
			'photo'    => 'users/3.jpg',
		]);

		User::factory()->create([
			'name'     => 'Leslie Ann Fu',
			'email'    => 'fuslie@hermes.com',
			'password' => Hash::make('password'),
			'photo'    => 'users/4.jpg',
		]);

		User::factory()->create([
			'name'     => 'Rachell Hofstetter',
			'email'    => 'valkyrae@hermes.com',
			'password' => Hash::make('password'),
			'photo'    => 'users/5.jpg',
		]);

		User::factory()->create([
			'name'     => 'Mark Fischbach',
			'email'    => 'markiplier@hermes.com',
			'password' => Hash::make('password'),
			'photo'    => 'users/6.jpg',
		]);

		User::factory()->create([
			'name'     => 'Felix Kjellberg',
			'email'    => 'pewdiepie@hermes.com',
			'password' => Hash::make('password'),
			'photo'    => 'users/7.jpg',
		]);
	}

}
