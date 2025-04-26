<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'detail',
        'icon',
        'user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

}
