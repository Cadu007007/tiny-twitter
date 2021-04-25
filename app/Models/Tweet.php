<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    /**
     * the attributes that should mass assignable
     *@var array
     **/
    protected $fillable = ['user_id', 'tweet'];

    /**
     * the user hast that tweet
     *
     * @param null
     *
     * @return BelongsTo
     *
     * @author Amr Degheidy
     *
     **/
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
