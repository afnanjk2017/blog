<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// دايم الكلاس مودل يكون نفس اسم التيبل الي يشتغل عليه ولكن مفرد ويبدا كابتيل 
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id'
        
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
