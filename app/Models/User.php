<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use SoftDeletes;
    use HasRoles;
    use HasApiTokens;
   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
        /**
     * Returns surveys that are associated with this user
     * 
     * @Return HasMany
     * 
     */
    public function surveys(): HasMany
    {
        return $this->hasMany(Survey::class);
    }

     /**
     * Returns responses made by the user
     * 
     * @Return HasMany
     * 
     */
    public function responses(): HasMany
    {
        return $this->hasMany(Response::class);
    }

    /**
     * Returns the roles of this user
     * 
     * @Return HasMany
     * 
     */
    public function role(): HasMany
    {
        return $this->hasMany(Role::class);
    }

    
}
