<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Survey extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'user_id'
    ];

     /**
     * Returns the questions associated with this survey
     * 
     * @Return HasMany
     * 
     */
    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }

    /**
     * Returns a single user associated to this survey
     * 
     * @Return BelongsTo
     * 
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

     /**
     * Returns many responses associated the survey
     * 
     * @Return HasMany
     * 
     */
    public function responses(): HasMany
    {
        return $this->hasMany(Response::class);
    }
}
