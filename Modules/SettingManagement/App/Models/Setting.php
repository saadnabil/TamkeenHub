<?php

namespace Modules\SettingManagement\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\SettingManagement\Database\factories\SettingFactory;

class Setting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    public function setTitleAttribute($title){
        $this->attributes['title'] = json_encode($title);
    }

    public function setSocialMediaAttribute($socialMedia){
        $this->attributes['social_media'] = json_encode($socialMedia);
    }

    public function setAddressAttribute($address){
        $this->attributes['address'] = json_encode($address);
    }

    public function setPhonesAttribute($phones){
        $this->attributes['phones'] = json_encode($phones);
    }

    public function getTitleAttribute(){
        return json_decode($this->attributes['title'],true);
     }

     public function getSocialMediaAttribute(){
         return json_decode($this->attributes['social_media'],true);
     }

     public function getAddressAttribute(){
        return json_decode($this->attributes['address'],true);
     }

     public function getPhonesAttribute(){
        return json_decode($this->attributes['phones'],true);
     }

    /**get columns translated regarding to language sent in header for frontend developers */
    public function getTitleTranslatedAttribute(){
        return json_decode($this->attributes['title'],true)[app()->getLocale()];
    }

    public function getAddressTranslatedAttribute(){
        return json_decode($this->attributes['address'],true)[app()->getLocale()];
    }

    /**get columns translated regarding to language sent in header for frontend developers */

    protected static function newFactory(): SettingFactory
    {
        //return SettingFactory::new();
    }
}
