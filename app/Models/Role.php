<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function hasPermission($permission)
    {
        $permission = Permission::where('name', $permission)->first();

        if ($this->permissions->contains($permission)) {
            return true;
        } else {
            return false;
        }
    }
}
