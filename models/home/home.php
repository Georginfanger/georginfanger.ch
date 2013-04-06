<?php

/**
 * Description of HomeModel
 *
 * @author georginfanger <me@georginfanger.ch>
 * 
 * 
 */
class HomeModel extends BaseModel {

      public function __construct() {
            parent::__construct();
      }

      //data passed to the home index view
      public function index() {
            $this->viewModel->set("pageTitle", "Georg Infanger - Home");
            $this->viewModel->set("content", array('content'=>'hello///', 'test2'=>'nw'));
            return $this->viewModel;
      }

}

?>
