<?php

namespace App\Models;

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

	public function questions() {
		return $this->hasMany(Question::class);
	}

	public function author() {
		return $this->belongsTo(User::class, 'user_id');
	}

	protected $casts = [
		'created_at' => 'datetime:Y-m-d',
		'updated_at' => 'datetime:Y-m-d',
		'deleted_at' => 'datetime:Y-m-d h:i:s',
	];
}
