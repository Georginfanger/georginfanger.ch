<?php

/**
 * Description of BaseModel
 *
 * @author georginfanger <me@georginfanger.ch>
 * 
 * 
 */
class BaseModel {

      protected $viewModel;
      protected $model;

      //create the base and utility objects available to all models on model creation
      public function __construct($admin = false) {
            $this->viewModel = new ViewModel();
            if ($admin) {
                  $this->adminViewData();
            } else {
                  $this->commonViewData();
            }
      }

      //establish viewModel data that is required for all views in this method (i.e. the main template)
      protected function commonViewData() {
            //print "Hello";
            $this->viewModel->set("mainMenu", array("Home" => "home", "Admin" => "admin", "Help" => "help"));
            $this->viewModel->set("Basepath", "http://localhost/~georginfanger/georginfanger/");
      }
       protected function adminViewData() {
            //print "Hello";
            $this->viewModel->set("mainMenu", array("Dashboard" => "admin/index" ,"User"=> "admin/user",  "Help" => array("test"=>"neu", "Hello" =>"DU")));
            $this->viewModel->set("Basepath", "http://localhost/~georginfanger/georginfanger/");
      }

}

?>
