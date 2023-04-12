<?php
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;

class _BaseController extends Controller
{
    
    public function beforeExecuteRoute(Dispatcher $dispatcher): bool
    {
        //$this->view->setMainView("base");
        //$this->view->setLayout("main");

        //$controllerName = $dispatcher->getControllerName();
        //$actionName     = $dispatcher->getActionName();

        //// Only check permissions on private controllers
        //if ($this->acl->isPrivate($controllerName)) {
        //    // Get the current identity
        //    $identity = $this->auth->getIdentity();

        //    // If there is no identity available the user is redirected to index/index
        //    if (!is_array($identity)) {
        //        $this->flash->notice('You don\'t have access to this module: private');

        //        $dispatcher->forward([
        //            'controller' => 'index',
        //            'action'     => 'index',
        //        ]);
        //        return false;
        //    }

        //    // Check if the user have permission to the current option
        //    if (!$this->acl->isAllowed($identity['profile'], $controllerName, $actionName)) {
        //        $this->flash->notice('You don\'t have access to this module: ' . $controllerName . ':' . $actionName);

        //        if ($this->acl->isAllowed($identity['profile'], $controllerName, 'index')) {
        //            $dispatcher->forward([
        //                'controller' => $controllerName,
        //                'action'     => 'index',
        //            ]);
        //        } else {
        //            $dispatcher->forward([
        //                'controller' => 'index',
        //                'action'     => 'index',
        //            ]);
        //        }

        //        return false;
        //    }
        //}

        return true;
    }

    protected function initialize()
    {
        //$this->tag->title()
        //          ->prepend('INVO | ')
        //;
        //$this->view->setTemplateAfter('main');
    }
    
}
