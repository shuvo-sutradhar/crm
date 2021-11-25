<?php

namespace App\Models;

use App\Traits\HasPermissions;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory, Sluggable, HasPermissions;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];


    /**
     * Return permissions
     *
     * @return array
     */
    public function permissions(){
        return $this->belongsToMany(Permission::class, 'role_permission');
    }


    /**
     * Check hasPermissions.
     *
     * @return $role->hasPermissionTo('edit-user', 'edit-issue');
     */
    public function hasPermissionTo(...$permissions) {
        return $this()->permissions()->whereIn('slug',$permissions)->count();
    }

}
