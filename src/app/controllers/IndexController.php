<?php
use Phalcon\Mvc\Controller;

class IndexController extends _BaseController
{
    public function indexAction()
    {
        print '<h1>Hello!</h1>';
    }

    public function notFoundAction()
    {
        print "404";
    }
    
}
