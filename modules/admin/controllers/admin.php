<?php

/**
 * Description of error
 *
 * @author georginfanger <me@georginfanger.ch>
 * 
 * 
 */
class AdminController extends BaseController {

      //add to the parent constructor
      public function __construct($action, $urlValues) {
            parent::__construct($action, $urlValues, "admin");
            
      }

      public function index() {
            
            $this->viewModel->set("pageTitle", "Georg Infanger - Admin");
            $this->viewModel->set("content", array('content'=>'hello///', 'test2'=>'nw'));
            
            $this->view->output($this->viewModel, "maintemplate");
      }
      
      public function user(){
//            print_r("hhj");
//            $this->loadmodel('user/models/user');
//             $this->view->output($this->user->index(), "maintemplate");
            require 'modules/user/models/user.php';
            $um = new \UserModel();
            
             $this->view->output($um->index(), 'maintemplate');
      }

}

?>
