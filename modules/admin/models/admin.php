<?php

/**
 * Description of error
 *
 * @author georginfanger <me@georginfanger.ch>
 * 
 * 
 */
class AdminModel extends BaseModel {

      public function __construct() {
            parent::__construct(true);
      }

      //data passed to the bad URL error view
      public function index() {
            $this->viewModel->set("pageTitle", get_class($this));

            return $this->viewModel;
      }

      public function user() {
                 require 'user.php';
            $um = new \UserModel();
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                  $this->saveuser($um);
            }
       
            $this->viewModel->set("pageTitle", get_class($this));
            // $array = UserQuery::create()->find();
            $this->viewModel->set("content", $um->user_admin());
            return $this->viewModel;
      }
      
      public function saveuser($um){
          $username =  $_POST['username'];
          
          $um->user_save($username, "");
      }

}

?>
