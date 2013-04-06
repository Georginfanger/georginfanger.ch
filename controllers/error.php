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
    public function __construct() {
        parent::__construct();
        
    }
    
    //bad URL request error
    protected function badURL()
    {
        $this->view->output($this->model->badURL(), "errortemplate");
 
    }
}

?>
