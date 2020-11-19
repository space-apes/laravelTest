<?php

use Illuminate\Support\Facades\Route;

//register all services
//CAN BE DONE AUTOMATICALLY!
/*
app()->bind('example', function(){

    //do set up steps for a new Example
    $iKey = config('services.importantSettings.key');

    return new App\Example($iKey);
});
*/

Route::get('/', function () {

    /** explicit definition in AppProviders */
    $example = resolve(App\Example::class);
    ddd($example);
});

Route::get('/home', 'App\Http\Controllers\PagesController@home');

    /**automatic resolution with no explicit service registered
    //just classes in providers directory
    $d1 = resolve(App\Dinner::class);
    ddd($d1);
     **/

    /****** SERVICE CONTAINER CONCEPTS
     * see App\Example and App\SContainer
     *
    $scontainer = new App\SContainer();

    //store data in container
    $scontainer->bind('example', function(){
        //IMAGINE MANY PRECURSOR STEPS TO BE ABLE TO
        //MAKE NEW INSTANCE OF EXAMPLE!

        return new App\Example();
    });

    //retrieve data from container
    $example = $scontainer->resolve('example');

    $example->go();


    //ddd($container)
    ddd($example);
     *
     *
     */

    //return view('welcome');


//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
