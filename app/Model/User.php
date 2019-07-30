<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'birthday',
        'address',
        'phone_number',
        'gender',
        'avatar',
    ];

    public function getGenderAttribute($value)
    {
        $gender = '';

        if ($value !== null) {
            $gender = config('config.gender.' . $value);
        }

        return $gender;
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
