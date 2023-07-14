<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Admin extends Model implements Authenticatable
{
    use HasFactory;
    use AuthenticatableTrait;

    protected $table = 'admins';
    protected $primaryKey = 'id';


    public function getAuthIdentifierName()
    {
        return 'id';
    }
    /**
     * Get the unique identifier for the admin.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the admin.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the name of the remember token column.
     *
     * @return string|null
     */
    public function getRememberTokenName()
    {
        return null;
    }

    /**
     * Set the remember token for the admin.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        // Not implemented for now
    }

    /**
     * Get the remember token value for the admin.
     *
     * @return string|null
     */
    public function getRememberToken()
    {
        // Not implemented for now
        return null;
    }
    public function getFullNameAttribute()
    {
        return $this->attributes['full_name'];
    }

}