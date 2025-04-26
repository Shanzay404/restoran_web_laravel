<?php

namespace App\Models;

use App\Models\Item;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'icon',
        'user_id',
        'tag_id',
        'status',
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tag(){
        return $this->belongsTo(Tag::class);
    }
    
    public function item(){
        return $this->hasMany(Item::class);
    }

}
