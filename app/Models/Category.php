<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
//    use softDeletes;

    protected $fillable = [
      'user_id',
      'category_name',
    ];


    public function users(){
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
}
