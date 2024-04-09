<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function details()
    {
        return $this->hasMany(QuestionDetails::class, 'question_id', 'id');
    }

    public function getQuestions($group)
    {
        return Question::where('status', 1)->where('question_group', $group)->orderBy('id')->get();
    }
}
