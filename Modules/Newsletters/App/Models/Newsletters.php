<?php

namespace Modules\Newsletters\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Newsletters\Database\factories\NewslettersFactory;

class Newsletters extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    protected static function newFactory(): NewslettersFactory
    {
        //return NewslettersFactory::new();
    }
}
