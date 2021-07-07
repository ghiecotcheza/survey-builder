<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'start',
        'end',
        'published_at',
    ];

     /**
     * Returns the questions associated with this survey
     * 
     * @Return hasMany
     * 
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    /**
     * Returns a single user associated to this survey
     * 
     * @Return belongsTo
     * 
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

     /**
     * Returns many responses associated the survey
     * 
     * @Return hasMany
     * 
     */
    public function responses()
    {
        return $this->hasMany(Response::class);
    }
}
