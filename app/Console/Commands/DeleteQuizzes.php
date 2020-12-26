<?php

namespace App\Console\Commands;

use App\Models\Quiz;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeleteQuizzes extends Command {
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'delete:quiz';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Force delete quizzes, that were marked to delete 30 days ago';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle() {
		$quizzes = Quiz::onlyTrashed()
			->where('deleted_at', '<', Carbon::now()->subDays(30))
			->get();

		$quizzes->each->forceDelete();
	}
}
