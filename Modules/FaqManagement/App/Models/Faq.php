<?php

namespace Modules\FaqManagement\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\FaqManagement\Database\factories\FaqFactory;

class Faq extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    public function setQuestionAttribute($question){  
        $this->attributes['question'] = json_encode($question);
    }

    public function setAnswerAttribute($answer){
        $this->attributes['answer'] = json_encode($answer);
    }

    public function getAnswerAttribute(){  
       return json_decode($this->attributes['answer'],true);
    }

    public function getQuestionAttribute(){
        return json_decode($this->attributes['question'],true);
    }

    /**get columns translated regarding to language sent in header for frontend developers */
    public function getAnswerTranslatedAttribute(){  
        return json_decode($this->attributes['answer'],true)[app()->getLocale()];
     }
 
     public function getQuestionTranslatedAttribute(){
         return json_decode($this->attributes['question'],true)[app()->getLocale()];
     }
     /**get columns translated regarding to language sent in header for frontend developers */

    protected static function newFactory(): FaqFactory
    {
        //return FaqFactory::new();
    }
}
