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

      public function __construct($action, $urlValues) {
            $this->action = $action;
            $this->urlValues = $urlValues;
            
            require("models/". $this->urlValues['controller'] . "/" . $this->urlValues['controller'] . ".php");
            $modelname =  $this->urlValues['controller'] . "Model";
            $this->model = new $modelname();
            //establish the view object
            $this->view = new View(get_class($this), $action);
      }

      //executes the requested method
      public function executeAction() {
            return $this->{$this->action}();
      }

}

?>