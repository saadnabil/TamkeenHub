<?php

namespace Modules\ProjectManagement\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\ProjectManagement\Database\factories\ProjectFactory;

class Project extends Model
{
    use HasFactory;

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

    public function setTextAttribute($text){
        $this->attributes['text'] = json_encode($text);
    }

    public function setAddressAttribute($address){
        $this->attributes['address'] = json_encode($address);
    }

    public function getTitleAttribute(){
       return json_decode($this->attributes['title'],true);
    }

    public function getTextAttribute(){
        return json_decode($this->attributes['text'],true);
    }

    public function getAddressAttribute(){
        return json_decode($this->attributes['address'],true);
    }

    /**get columns translated regarding to language sent in header for frontend developers */
    public function getTitleTranslatedAttribute(){  
        return json_decode($this->attributes['title'],true)[app()->getLocale()];
     }
 
     public function getTextTranslatedAttribute(){
         return json_decode($this->attributes['text'],true)[app()->getLocale()];
     }

     public function getAddressTranslatedAttribute(){
        return json_decode($this->attributes['address'],true)[app()->getLocale()];
    }
     /**get columns translated regarding to language sent in header for frontend developers */

   
    
    protected static function newFactory(): ProjectFactory
    {
        //return ProjectFactory::new();
    }

    /**Project Images*/
    public function images(){
        return $this->hasMany(ProjectImage::class);
    }
    
}
