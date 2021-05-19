<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;
    
    protected $fillable = [
        
        'survey_id',
        'user_id',
    ];

    /**
     * Returns all the answers associated with this specific response
     * 
     * @Return hasMany
     * 
     */
    public function responseAnswers()
    {
        return $this->hasMany(ResponseAnswer::class);
    }

    /**
     * Returns the survey where this response belongs to
     * 
     * @Return belongsTo
     * 
     */
    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    /**
     * Returns the user associated with this response
     * 
     * @Return belongsTo
     * 
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
