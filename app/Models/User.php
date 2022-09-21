<?php

namespace App\Models;

use App\Http\Resources\admin\CustomerResource;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Scope;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $resource = CustomerResource::class;

    public function scopeSearch($query,$request)
        {
            if(!empty($request->search['value'])){
                $search = '%' . $request->search['value'] . '%';
                return $query->whereTranslationLike('name','%' .$search .'%');
                }
        return $query;
        }

    public function scopeCustomer($query){
        // return $query->where('user_type','customer' )->get();
        return $query->where('user_type','customer' );
    }

    protected $fillable = [
        'fname',
        'lname',
        'user_type',
        'email',
        'second_email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function setPasswordAttribute($password)
    {
        if ( !empty($password) ) {
            $this->attributes['password'] = bcrypt($password);
        }
    }


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
        // return $this->morphMany('App\Models\Image', 'imageable');
        // 'App\Models\Student'

    }
}
