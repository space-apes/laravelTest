<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DinnerController extends Controller
{
    public function show(Dinner $dinner, Turkey $turkey){
        return sprintf("The dinner's id is: %d and the turkey's name is: %s", $dinner->id, $turkey->name);
    }
}
