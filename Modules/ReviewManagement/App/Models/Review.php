<?php

namespace Modules\ReviewManagement\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\ReviewManagement\Database\factories\ReviewFactory;

class Review extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    

    public function setTextAttribute($text){
        $this->attributes['text'] = json_encode($text);
    }

   
    public function getTextAttribute(){
        return json_decode($this->attributes['text'],true);
    }

    /**get Image Path */
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
     /**get Image Path */



    /**get columns translated regarding to language sent in header for frontend developers */

 
     public function getTextTranslatedAttribute(){
         return json_decode($this->attributes['text'],true)[app()->getLocale()];
     }


     /**get columns translated regarding to language sent in header for frontend developers */
    
    protected static function newFactory(): ReviewFactory
    {
        //return ReviewFactory::new();
    }
}
