<?php

/**
 * Description of Home
 *
 * @author georginfanger <me@georginfanger.ch>
 * 
 * 
 */
class HomeController extends BaseController
{
    //add to the parent constructor
    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);
        
    }
    
    //default method
    protected function index()
    {
        $this->view->output($this->model->index());
    }
    
    
}

?>
