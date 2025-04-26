<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
    ];

    public function category(){
        return $this->hasMany(Category::class);
    }
}
