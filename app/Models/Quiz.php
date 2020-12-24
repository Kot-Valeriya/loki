<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model {
	use HasFactory, SoftDeletes;

	protected $fillable = ['title', 'description', 'number_of_questions'];
	protected $guarded = ['user_id'];

	public function getRouteKeyName() {
		return 'id';
	}

	public function getCreatedAtAttribute($value) {
		return (new Carbon($value))->format('m/d/Y');
	}

	public function getUpdatedAtAttribute($value) {
		return (new Carbon($value))->format('m/d/Y');
	}

	public function questions() {
		return $this->hasMany(Question::class);
	}

	public function answers() {
		return $this->hasManyThrough(Answer::class, Question::class);
	}

	public function author() {
		return $this->belongsTo(User::class, 'user_id');
	}

	public function solve($answers) {
		$score = 0;

		foreach ($answers as $answer) {

			if ($answer) {
				$score++;
			}
		}
		return $score;

	}

	/**
	 * Get latest entered quizzes. Used by ViewComposer
	 *
	 * @return App\Models\Quiz
	 */
	public static function get_latest(int $number) {
		return self::take($number)->latest()->get();
	}

	protected $casts = [
		'created_at' => 'datetime:Y-m-d',
		'updated_at' => 'datetime:Y-m-d',
		'deleted_at' => 'datetime:Y-m-d h:i:s',
	];
}
