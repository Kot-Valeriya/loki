<?php

namespace App\Models;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model {
	use HasFactory;

	protected $fillable = ['name'];

	public function quizzes() {
		return $this->belongsToMany(Quiz::class);
	}
}
