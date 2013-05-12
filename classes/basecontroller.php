<?php

/**
 * Description of BaseController
 *
 * @author georginfanger <me@georginfanger.ch>
 * 
 * 
 */

abstract class BaseController {

      protected $urlValues;
      protected $action;
      protected $model;
      protected $view;
      protected $viewmodel;


      public function __construct($action, $urlValues, $admin = 0) {
            $this->action = $action;
            $this->urlValues = $urlValues;
            $this->viewModel = new ViewModel();
            if($admin){
            echo "Hello";
                  $this->adminViewData();
            }
            else {
                  echo "hjhjh";
             $this->commonViewData();          }
          
            require("modules/". $this->urlValues['controller'] . "/models/". $this->urlValues['controller'] . ".php");
            $modelname =  $this->urlValues['controller'] . "Model";
           
            $this->model = new $modelname();
            //establish the view object
         
            $this->view = new View(get_class($this), $action);
        
      }

      //executes the requested method
      public function executeAction() {
       
            return $this->{$this->action}();
      }
      
      public function loadmodel($model){
            require $model.".php";
          
            $this->{$model} = new $model();
      }


       protected function commonViewData() {
            //print "Hello";
            $this->viewModel->set("mainMenu", array("Home" => "home", "Admin" => "admin", "Help" => "help"));
            $this->viewModel->set("Basepath", "http://localhost/~georginfanger/georginfanger/");
      }
      
      protected function adminViewData() {
            //print "Hello";
            $this->viewModel->set("mainMenu", array("Dashboard" => "admin/index" ,"User"=> "admin/user",  "Help" => array("test"=>"neu", "Hello" =>array("3testufe" =>"jhjh"))));
            $this->viewModel->set("Basepath", "http://localhost/~georginfanger/georginfanger/");
      }

}

?>