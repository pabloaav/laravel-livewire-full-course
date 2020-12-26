<?php

use App\Comment;
use App\SupportTicket;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		factory(User::class, 5)->create();
		/**
		 * Las siguientes lineas son para asignar cantidad de registros a las tablas:
		 */
		$cantidadSupportTicket      = 5;
		$cantidadComments    = 50;

		factory(Comment::class, $cantidadComments)->create();


		//En el caso de los Comments , cada uno debe estar asociado a una SupportTicket. Para ello se usa la funcion each(...); esta significa, "para cada SupportTicket hacer...". Recibe un solo parametro que es en este caso una funcion anonima.
		factory(SupportTicket::class, $cantidadSupportTicket)->create()->each(
			function ($supportTicket) {
				$comentarios = Comment::all()->random(mt_rand(1, 5))->pluck('id');

				$supportTicket->comments()->attach($comentarios);
			}
		);
	} // Fin de run()

}
