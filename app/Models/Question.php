<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
     * @Return BelongsTo
     * 
     */
    public function survey(): BelongsTo
    {
        return $this->belongsTo(Survey::class);
    }

    /**
     * Returns the options associated with this question
     * 
     * @Return HasMany
     * 
     */
    public function options(): HasMany
    {
        return $this->hasMany(QuestionOption::class);
    }
 
    /**
     * Returns the questionType of this question
     * 
     * @Return BelongsTo
     * 
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(QuestionType::class);
    }
}
