<?php

/**
 * Description of admincontroller
 *
 * @author georginfanger <me@georginfanger.ch>
 * 
 * 
 */
class AdminController extends BaseController {

      //add to the parent constructor
      public function __constructor($action, $urlValues) {
            parent::__construct($action, $urlValues);
          
      }

      protected function index() {
            $this->view->output($this->model->index());
      }
       protected function user(){
             
           $this->view->output($this->model->user());
           
       }
       protected function saveuser(){
             
           $this->view->output($this->model->saveuser());
           
       }

}

?>
