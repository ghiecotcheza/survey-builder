<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
     * @Return belongsTo
     *
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    /**
    * Returns the response where this answer belongs to
    *
    * @Return belongsTo
    *
    */
    public function response()
    {
        return $this->belongsTo(Response::class);
    }
}
