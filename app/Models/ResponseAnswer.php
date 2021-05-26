<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ResponseAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'response_id',
        'question_id',
        'answer'
    ];

    
    /**
     * Returns the question where this responseAnswer belongs to
     *
     * @Return BelongsTo
     *
     */
    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    /**
    * Returns the response where this answer belongs to
    *
    * @Return belongsTo
    *
    */
    public function response(): BelongsTo
    {
        return $this->belongsTo(Response::class);
    }
}
