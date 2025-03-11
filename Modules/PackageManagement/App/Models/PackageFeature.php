<?php

namespace Modules\PackageManagement\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\PackageManagement\Database\factories\PackageFeatureFactory;

class PackageFeature extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    public function setTitleAttribute($title){  
        $this->attributes['title'] = json_encode($title);
    }

    public function getTitleAttribute(){  
       return json_decode($this->attributes['title'],true);
    }

     /**get columns translated regarding to language sent in header for frontend developers */
     public function getTitleTranslatedAttribute(){  
        return json_decode($this->attributes['title'],true)[app()->getLocale()];
     }
     /**get columns translated regarding to language sent in header for frontend developers */
    
    protected static function newFactory(): PackageFeatureFactory
    {
        //return PackageFeatureFactory::new();
    }
}
