<?php

namespace Modules\PackageManagement\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\PackageManagement\Database\factories\PackageFactory;

class Package extends Model
{
    use HasFactory,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];


    /**
     * The attributes that are mass assignable.
     */

    public function setTitleAttribute($title){  
        $this->attributes['title'] = json_encode($title);
    }

    public function getTitleAttribute(){  
       return json_decode($this->attributes['title'],true);
    }

    public function features(){
        return $this->hasMany(PackageFeature::class);
    }

     /**get columns translated regarding to language sent in header for frontend developers */
     public function getTitleTranslatedAttribute(){  
        return json_decode($this->attributes['title'],true)[app()->getLocale()];
     }
     /**get columns translated regarding to language sent in header for frontend developers */

    protected static function newFactory(): PackageFactory
    {
        //return PackageFactory::new();
    }
}
