<?php
namespace Modules\ClientManagement\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\ClientManagement\Database\factories\ClientFactory;

class Client extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];
    
    public function getLogoPathAttribute()
    {
        if (filter_var($this->attributes['logo'], FILTER_VALIDATE_URL)) {
            // If the image is a valid URL, return it directly
            return $this->attributes['logo'];
        } else {
            // If the image is not a URL, assume it's a file path and return it with the asset helper
            return url('storage/' . $this->attributes['logo']);
        }
    }
    
    protected static function newFactory(): ClientFactory
    {
        //return ClientFactory::new();
    }
}
