<?php

/**
 * Description of HomeModel
 *
 * @author georginfanger <me@georginfanger.ch>
 * 
 * 
 */
class UserModel extends BaseModel {

      public function __construct() {
            parent::__construct();
      }

//data passed to the home index view
      public function index() {

            $this->viewModel->set("pageTitle", "Georg Infanger - User");
            $this->viewModel->set("content", $this->get_all_users());
            return $this->viewModel;
      }

      public function get_all_users() {

            return UserQuery::create()->find();
      }

}

?>