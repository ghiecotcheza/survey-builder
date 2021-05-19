<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionType extends Model
{
    use HasFactory;
    
    protected $fillable = [
       
        'name',
        'keyname',
    ];

    /**
     * Returns questions associates with this questionType
     * 
     * @Return hasMany
     * 
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
