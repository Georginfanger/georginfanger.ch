<?php

/**
 * Description of error
 *
 * @author georginfanger <me@georginfanger.ch>
 * 
 * 
 */
class ErrorModel extends BaseModel
{    
      public function __construct() {
            parent::__construct(true);
      }
    //data passed to the bad URL error view
    public function badURL()
    {
        $this->viewModel->set("pageTitle","Error - Bad URL");
      
        return $this->viewModel;
    }
     public function badView()
    {
        $this->viewModel->set("pageTitle","Error - Bad URL");
      
        return $this->viewModel;
    }
}

?>
