<?php

/**
 * Description of view
 *
 * @author georginfanger <me@georginfanger.ch>
 * 
 * 
 */
class View {

      protected $viewFile;
      protected $mainMenu;

      //establish view location on object creation
      public function __construct($controllerClass, $action) {
            $controllerName = str_replace("Controller", "", $controllerClass);
            $this->viewFile = "modules/" . $controllerName . "/views/" . $action . ".php";
            $this->mainMenu = "modules/menu/views/menu.php";
          
      }

      //output the view
      public function output($viewModel, $template = "maintemplate") {
            $templateFile ="templates/normal/" . $template . ".php";
            if (file_exists($this->viewFile)) {
                  if ($template) {
                        //include the full template
                        if (file_exists($templateFile)) {
                              require($templateFile);
                        } else {
                              require("/error/views/badtemplate.php");
                        }
                  } else {
                        //we're not using a template view so just output the method's view directly
                        require($this->viewFile);
                  }
            } else {

                  require("/error/views/badview.php");
            }
      }

}

?>
