<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Survey extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $casts = ['approved_at' => 'datetime'];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function scores()
    {
        return $this->hasMany(Score::class, 'survey_id', 'id');
    }

    public function status()
    {
        return ($this->deleted_at) ? "<span class='text-danger'>Deleted</span>" : "<span class='text-success'>Active</span>";
    }
}
