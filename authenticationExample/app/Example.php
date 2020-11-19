<?php
/**SERVICE CONTAINER CONCEPTS **/
namespace App;

class Example
{
    protected string $key;
    protected $collaborator;

    public function __construct(string $theKey, Collaborator $collaborator){
        $this->key = $theKey;
        $this->collaborator = $collaborator;
    }

    public function go(){
        dump('it works!');
    }
}
