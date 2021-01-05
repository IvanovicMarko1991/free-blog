<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory;

    // use Searchable;

    //Table name
    protected $table = 'posts';

    //Primary key
    protected $primaryKey = 'id';

    //Timestamps
    public $timestamps = true;


    public function user(){
        return $this->belongsTo('App\Models\User');
    }    

    public function categories(){
        return $this->belongsToMany('App\Models\Category');
    }


}
