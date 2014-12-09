<?php

use Dimsav\Todo\Models\User;
use Dimsav\Todo\Models\Todo;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::table('users')->delete();

		User::create([
			'id' => 1,
			'email' => 'dimsav@madewithlove.be',
			'password' => Hash::make('secret'),
		]);

		DB::table('todos')->delete();

		$todos = [
			[
				'text' => 'Apply to madewithlove',
				'finished' => true,
				'user_id' => 1,
			],
			[
				'text' => 'Start assignment',
				'finished' => true,
				'user_id' => 1,
			],
			[
				'text' => 'Finish assignment',
				'finished' => false,
				'user_id' => 1,
			],
			[
				'text' => 'Send assignment',
				'finished' => false,
				'user_id' => 1,
			],
		];
		foreach ($todos as $todo)
		{
			Todo::create($todo);
		}

	}

}
