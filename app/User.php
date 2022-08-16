<?php

namespace App;

use App\Role;
use App\Location;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use Notifiable;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at',
        'created_at',
        'updated_at',
        'is_verified',
        'activation_code',
        'activation_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }
    public function location()
    {
        return $this->hasMany(Location::class);
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class,"user_role","user_id","role_id");
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class,"user_permission","permission_id","user_id");
    }

    public function hasRole($role)
    {
        return $this->roles()->where('nomRole',$role)->first() !== null;
    }
    public function hasAnyRoles($role){
        return $this->roles()->whereIn("nomRole",$roles)->first() !== null;
    }
    public function getAllRoleNamesAttribute()
    {
        return $this->roles->implode('nomRole',' | ');
    }

}
