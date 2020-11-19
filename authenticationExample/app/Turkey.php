<?php

namespace App;


class Turkey{
    protected string $name;

    public function __construct(string $theName){
        $this->name = $theName;
    }
}
