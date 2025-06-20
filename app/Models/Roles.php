<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    /** @use HasFactory<\Database\Factories\RolesFactory> */
    use HasFactory;
    protected $fillable = ['role_name'];
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->hasMany(User::class);
    }
}
