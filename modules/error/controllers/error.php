<?php

/**
 * Description of error
 *
 * @author georginfanger <me@georginfanger.ch>
 * 
 * 
 */
class ErrorController extends BaseController
{    
    //add to the parent constructor
    public function __construct($action, $urlValues) {
     
        parent::__construct($action, $urlValues);
      
    }
    
    //bad URL request error
    protected function badURL()
    {
        $this->view->output($this->model->badURL(), "errortemplate");
    }
    
    protected function badView()
    {
        $this->view->output($this->model->badView(), "errortemplate");
    }
}

?>
