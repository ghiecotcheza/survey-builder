<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Permission extends Model
{
    use HasFactory;

    /**
     * Returns the roles associated with this permission
     * 
     * @Return BelongsTo
     * 
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
