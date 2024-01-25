<?php

namespace App\Models;

use Brackets\AdminAuth\Models\AdminUser;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends AdminUser implements JWTSubject
{
    protected $table = 'admin_users';
    
    /**
     * Resource url to generate edit
     *
     * @return UrlGenerator|string
     */
    public function getResourceUrlAttribute(): string
    {
        return url('/admin/admin-users/' . $this->getKey());
    }

    /* *************************** JWT *************************** */

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
