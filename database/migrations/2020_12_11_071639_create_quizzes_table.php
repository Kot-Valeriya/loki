<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('quizzes', function (Blueprint $table) {
			$table->id();
			$table->string('title'); //->unique();
			$table->unsignedSmallInteger('number_of_questions');
			$table->text('description');
			$table->foreignId('user_id')->default('1');
			//$table->foreignId('question_id');
			$table->softDeletes();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('quizzes');
	}
}
