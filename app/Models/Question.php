<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [   
        'survey_id',
        'question',
        'description',
        'question_type_id',
    ];

    protected $with = ['survey', 'options', 'type'];

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
        return $this->belongsTo(QuestionType::class, 'question_type_id');
    }

    /**
     * Returns the response of this question
     * 
     * @Return HasMany
     * 
     */
    public function responses(): HasMany
    {
        return $this->hasMany(Response::class);
    }
}
