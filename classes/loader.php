<?php

/**
 * Description of loader
 *
 * @author georginfanger <me@georginfanger.ch>
 * 
 * 
 */
class Loader {

      private $controllerName;
      private $controllerClass;
      private $action;
      private $urlValues;

      //store the URL request values on object creation
      public function __construct() {

            list($null,$controller, $action, $id) = explode("/",  $_SERVER['PATH_INFO']);
       
            $this->urlValues['base'] = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $this->urlValues['controller'] = $controller ? $controller : "home";
            $this->urlValues['action'] = $action;
            $this->urlValues['id'] = $id;

            $this->controllerName = strtolower($this->urlValues['controller']);
            $this->controllerClass = ucfirst(strtolower($this->urlValues['controller'])) . "Controller";

            if ($this->urlValues['action'] == "") {
                  $this->action = "index";
            } else {
                  $this->action = $this->urlValues['action'];
            }
      }

      //factory method which establishes the requested controller as an object
      public function createController() {
            //check our requested controller's class file exists and require it if so
          
            if (file_exists("modules/" . $this->controllerName . "/controllers/" . $this->controllerName .".php" ) && $this->controllerName != 'error') {
                  require("modules/" . $this->controllerName . "/controllers/" . $this->controllerName .".php");
             
            } else {
                
                  $this->urlValues['controller'] = "error";
                  require("modules/error/controllers/error.php");
                  return new ErrorController("badurl", $this->urlValues);
            }

            //does the class exist?
            if (class_exists($this->controllerClass)) {
                  $parents = class_parents($this->controllerClass);
                  //does the class inherit from the BaseController class?
                  if (in_array("BaseController", $parents)) {
                        //does the requested class contain the requested action as a method?
                        if (method_exists($this->controllerClass, $this->action)) {  
                              return new $this->controllerClass($this->action, $this->urlValues);
                              
                        } else {
                              //bad action/method error
                              $this->urlValues['controller'] = "error";
                              require("modules/error/controllers/error.php");
                              return new ErrorController("badview", $this->urlValues);
                        }
                  } else {
                        $this->urlValues['controller'] = "error";
                        //bad controller error
                        echo "hjh";
                        require("modules/error/controllers/error.php");
                        return new ErrorController("b", $this->urlValues);
                  }
            } else {
                  
                  //bad controller error
                  require("modules/error/controllers/error.php");
                  return new ErrorController("badurl", $this->urlValues);
            }
      }

}

?>
