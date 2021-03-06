<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionOption extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [       
        'question_id',
        'option',
    ];

    /**
     * Returns the question which this questionOptions belongs to
     * 
     * @Return BelongsTo
     * 
     */
    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
