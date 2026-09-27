<?php  
  
namespace App\Models;  
  
// use Illuminate\Contracts\Auth\MustVerifyEmail;  
use Database\Factories\UserFactory;  
use Illuminate\Database\Eloquent\Attributes\Fillable;  
use Illuminate\Database\Eloquent\Attributes\Hidden;  
use Illuminate\Database\Eloquent\Factories\HasFactory;  
use Illuminate\Foundation\Auth\User as Authenticatable;  
use Illuminate\Notifications\Notifiable;  
use App\Models\Post;  
use App\Models\Profile;
use App\Models\Role;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;
  
#[Fillable(['name', 'email', 'password'])]  
#[Hidden(['password', 'remember_token'])]  
class User extends Authenticatable  
{  
    /** @use HasFactory<UserFactory> */  
    use HasFactory, Notifiable, SoftDeletes; 
 
    // One to Many
    public function posts() 
    { 
        return $this->hasMany(Post::class); 
    }

    // One to One
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    // Many to Many
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
 
    // Accessor
    protected function name(): Attribute 
    { 
        return Attribute::make( 
            get: fn ($value) => strtoupper($value), 
        ); 
    }

    // Mutator
    protected function email(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => strtolower($value),
        );
    }

    // Query Scope
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
  
    /**  
     * Get the attributes that should be cast.  
     *  
     * @return array<string, string>  
     */  
    protected function casts(): array  
    {  
        return [  
            'email_verified_at' => 'datetime',  
            'password' => 'hashed',  
        ];  
    }  
}