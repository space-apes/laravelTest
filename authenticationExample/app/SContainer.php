<?php
/**SERVICE CONTAINER CONCEPTS **/
namespace App;

class SContainer
{
    protected $bindings = [];

    public function bind($key, $value){
        $this->bindings[$key] = $value;
    }

    public function resolve($key){
        if(isset($this->bindings[$key])){
            return $this->bindings[$key]();
        }
        else{
            //gross
            return false;
        }
    }
}
