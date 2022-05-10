<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    //protected $fillable = ['name', 'slug', 'module'];
    protected $hidden = ['created_at','updated_at'];
    protected $dates = ['delete_at'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
