<?php

namespace Modules\AdminManagement\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\AdminManagement\Database\factories\AdminFactory;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Admin extends Authenticatable implements JWTSubject
{
    use HasFactory;


    public function getImagePathAttribute()
    {
        if (filter_var($this->attributes['image'], FILTER_VALIDATE_URL)) {
            // If the image is a valid URL, return it directly
            return $this->attributes['image'];
        } else {
            // If the image is not a URL, assume it's a file path and return it with the asset helper
            return url('storage/' . $this->attributes['image']);
        }
    }

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    /**
     * JWT: Get the identifier for the token.
     */
    public function getJWTIdentifier()
    {
        return $this->getKey(); // عادةً ما يكون المعرف هو الـ ID
    }

    /**
     * JWT: Get custom claims for the token.
     */
    public function getJWTCustomClaims()
    {
        return []; // يمكن إضافة أي بيانات إضافية تحتاجها هنا
    }

    /**
     * Factory for Admin.
     */
    protected static function newFactory(): AdminFactory
    {
        // Uncomment if you have a factory for Admin.
        // return AdminFactory::new();
    }
}
