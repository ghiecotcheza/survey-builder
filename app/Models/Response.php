<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Response extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [        
        'survey_id',
        'user_id',
    ];

    /**
     * Returns all the answers associated with this specific response
     * 
     * @Return HasMany
     * 
     */
    public function answers(): HasMany
    {
        return $this->hasMany(ResponseAnswer::class);
    }

    /**
     * Returns the survey where this response belongs to
     * 
     * @Return BelongsTo
     * 
     */
    public function survey(): BelongsTo
    {
        return $this->belongsTo(Survey::class);
    }

    /**
     * Returns the user associated with this response
     * 
     * @Return BelongsTo
     * 
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Returns the question where this response belongs to
     *
     * @Return BelongsTo
     *
     */
    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

}
