<?php

/**
 * Description of error
 *
 * @author georginfanger <me@georginfanger.ch>
 * 
 * 
 */
class AdminModel extends BaseModel
{    
       public function __construct() {
            parent::__construct(true);
      }
    //data passed to the bad URL error view
    public function index()
    {
        $this->viewModel->set("pageTitle",  get_class($this));
      
        return $this->viewModel;
    }
}

?>
