<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    use HasFactory;

    protected $table = 'movies';
    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'release_date',        
        'price',
        'id_category',
    ];

    public function categories(){
        return $this->hasOne(Categories::class, 'id','id_category');
    }
}
