<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('answers', function (Blueprint $table) {
			$table->id();
			$table->foreignId('question_id')

				->onDelete('cascade')
				->index()
				->default(DB::getPdo()->lastInsertId());
			$table->string('answer');
			$table->boolean('is_correct')->default(false);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('answers');
	}
}
