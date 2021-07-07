<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    
     /**
     * Returns the user associated with this role
     * 
     * @Return BelongsTo
     * 
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * Returns the persmissions associated with this role
     * 
     * @Return HasMany
     * 
     */
    public function permissions(): HasMany
    {
        return $this->hasMany(Permission::class);
    }
}
