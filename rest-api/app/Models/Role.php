<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'description',
    ];
    
    public function users() : HasMany
    {
        return $this->hasMany(User::class);
    }
    
    public function submenus() : BelongsToMany
    {
        return $this->belongsToMany(
            Submenu::class,
            'permissions',
            'role_id',
            'submenu_id');
    }
}
