<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Media;
use App\Models\Post;
use App\Models\UserMeta;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

#[Fillable(['name', 'email', 'password', 'email_verified_at', 'ip_address'])]
class User extends Authenticatable
{
    use HasUlids, HasFactory, Notifiable, HasRoles, HasApiTokens, SoftDeletes;

    /**
     * Get the columns that should receive a unique identifier.
     *
     * @return array<int, string>
     */
    public function uniqueIds(): array
    {
        return ['ulid'];
    }

    /**
     * Get the route key name for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'ulid';
    }
    
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

    public function before(User $user, string $ability): bool|null
    {
        if ( $user->hasRole('Super Admin') ) return true;

        return null;
    }

    public function userMeta()
    {
        return $this->hasMany(UserMeta::class, 'user_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function medias()
    {
        return $this->hasMany(Media::class);
    }

    // mutator
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }

    public function lastLogin()
    {
        $lastLoginMeta = UserMeta::where('user_id', Auth::user()->id)
            ->where('meta_key', 'last_login')
            ->first();

        return $lastLoginMeta ? Carbon::parse( $lastLoginMeta->meta_value )->diffForHumans() : Carbon::parse(Auth::user()->updated_at)->diffForHumans();
    }

}
