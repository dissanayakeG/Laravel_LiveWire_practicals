<?php


namespace App;


class Context
{
    public function perform(){
        // work with databases, API's and external services
        // and complicated stuff you don't want to run
        // in a test
        return 5;
    }

}
