<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model {
	use HasFactory;
	public $timestamps = FALSE;

	protected $fillable = ['answer'];
	protected $guarded = ['question_id', 'is_correct'];

	public function quiz() {
		return $this->belongsTo(Question::class);
	}
}
