<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    
    protected $fillable = [
       
        'survey_id',
        'question',
        'description',
        'question_type_id',
    ];

    /**
     * Returns the survey which this question belongs to
     * 
     * @Return belongsTo
     * 
     */
    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    /**
     * Returns the options associated with this question
     * 
     * @Return hasMany
     * 
     */
    public function questionOptions()
    {
        return $this->hasMany(QuestionOption::class);
    }

    /**
     * Returns the responses made by the user for this question
     * 
     * @Return hasMany
     * 
     */
    public function responseAnswers()
    {
        return $this->hasMany(ResponseAnswer::class);
    }
 
    /**
     * Returns the questionType of this question
     * 
     * @Return belongsTo
     * 
     */
    public function questionType()
    {
        return $this->belongsTo(QuestionType::class);
    }
}
