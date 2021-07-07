<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionType extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [       
        'name',
        'keyname',
    ];

    /**
     * Returns questions associates with this questionType
     * 
     * @Return HasMany
     * 
     */
    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }
}
