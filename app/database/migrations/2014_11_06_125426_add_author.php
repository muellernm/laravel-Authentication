<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAuthor extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('authors')->insert(array(
			'author_name'=>'Author -1 ',
			'bio'=>'Md Alauddin is nothng but a man',
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
			));
	DB::table('authors')->insert(array(
			'author_name'=>'Author -2 ',
			'bio'=>'Md Alauddin is nothng but a man',
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
			));
	DB::table('authors')->insert(array(
			'author_name'=>'Author -3 ',
			'bio'=>'Md Alauddin is nothng but a man',
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
			));
	DB::table('authors')->insert(array(
			'author_name'=>'Author -4 ',
			'bio'=>'Md Alauddin is nothng but a man',
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
			));
	DB::table('authors')->insert(array(
			'author_name'=>'Author -5 ',
			'bio'=>'Md Alauddin is nothng but a man',
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
			));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('authors')->delete(1);
		DB::table('authors')->delete(2);
		DB::table('authors')->delete(3);
		DB::table('authors')->delete(4);
		DB::table('authors')->delete(5);
	}

}
