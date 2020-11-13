<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    //if want to use route-model binding but not use path wildcard associated with primary key
    // override this function like so

    /*
        public function getRouteKeyName()
        {
            return 'columnNameHere'
        }
    */
    //this is a special property that tells laravel which of this model's
    //properties can be mass-assigned

    //be very careful with this. only do this for non-valuable data
    //DONT allow users to change admin stuff etc
    //so no request->all()
    protected $fillable = ['title', 'excerpt', 'body'];

    //inversely, you can make a list of attributes you absolutely do not want to mass-assign
    //with an attribute called 'guarded'

    //protected $guarded[]

    //CHECK OUT MY COOL ELOQUENT CONNECTIONS!
    function user()
    {
        return $this->belongsTo(User::class);
    }


    function tags(){
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

}
