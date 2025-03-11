<?php

namespace Modules\ProjectManagement\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\ProjectManagement\Database\factories\ProjectImageFactory;

class ProjectImage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    public function project(){
        return $this->belongsTo(Project::class);
    }

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
    
    protected static function newFactory(): ProjectImageFactory
    {
        //return ProjectImageFactory::new();
    }
}
