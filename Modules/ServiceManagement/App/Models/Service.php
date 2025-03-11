<?php

namespace Modules\ServiceManagement\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\ServiceManagement\Database\factories\ServiceFactory;

class Service extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     */

    public function getIconPathAttribute()
    {
        if (filter_var($this->attributes['icon'], FILTER_VALIDATE_URL)) {
            // If the image is a valid URL, return it directly
            return $this->attributes['icon'];
        } else {
            // If the image is not a URL, assume it's a file path and return it with the asset helper
            return url('storage/' . $this->attributes['icon']);
        }
    }

    public function setTitleAttribute($title){
        $this->attributes['title'] = json_encode($title);
    }

    public function setTextAttribute($text){
        $this->attributes['text'] = json_encode($text);
    }

    public function getTitleAttribute(){
       return json_decode($this->attributes['title'],true);
    }

    public function getTextAttribute(){
        return json_decode($this->attributes['text'],true);
    }
    /**get columns translated regarding to language sent in header for frontend developers */
    public function getTitleTranslatedAttribute(){
        return json_decode($this->attributes['title'],true)[app()->getLocale()];
    }

    public function getTextTranslatedAttribute(){
        return json_decode($this->attributes['text'],true)[app()->getLocale()];
    }

    /**get columns translated regarding to language sent in header for frontend developers */

    protected static function newFactory(): ServiceFactory
    {
        //return ServiceFactory::new();
    }
}
