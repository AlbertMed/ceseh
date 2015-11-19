<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use \App\User;
class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		User::create([
			'nombreEmpresa'=> str_random(8),
			'nombre'=> str_random(8),
			'Apellido'=> str_random(8),
			'sapResultado' => "",
			'grupoGiro' => "",
			'RFC' => str_random(13),
			'telefono'=> rand(1111111111, 9999999999),
			'email'=> "alberto_me_d@hotmail.com",
			'password'     => bcrypt('secret')
		]);
		// $this->call('UserTableSeeder');
	}

}
