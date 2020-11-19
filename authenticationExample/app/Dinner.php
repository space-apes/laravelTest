<?php

namespace App;

class Dinner{
    protected Turkey $turkey;

    public function __construct(Turkey $turkey){
        $this->turkey = $turkey;
    }
}
