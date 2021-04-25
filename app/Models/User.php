<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'birth_date',
        'avatar',
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

    /**
     * set password attribute for current model encrypted
     *
     * @param $password
     *
     * @return null
     *
     **/
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    /**
     * set avatar attribute to avatar folder for current user
     *
     * @param $avatar
     *
     * @return null
     *
     **/
    public function setAvatarAttribute($avatar)
    {
        $this->attributes['avatar'] = $avatar->store('avatar', ['disk' => 'public']);
    }

    /**
     * get avatar attribute with storage link
     *
     * @param $avatar
     *
     * @return string
     *
     * @author Amr Degheidy
     *
     **/
    public function getAvatarAttribute($avatar)
    {
        return 'storage/' . $avatar;
    }

    /**
     * all tweets
     *
     * @param null
     *
     * @return HasMany
     *
     * @author Amr Degheidy
     *
     **/
    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    /**
     * follows relation on same table
     *
     * @param null
     *
     * @return BelongsToMany
     *
     * @author Amr Degheidy
     *
     **/
    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_id');
    }
}
