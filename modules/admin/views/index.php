<?php

/**
 * Description of index
 *
 * @author georginfanger <me@georginfanger.ch>
 * 
 * 
 */

 
$data = $viewModel->get('content'); 

foreach($data as $key=>$value){
      
      echo $key;
      echo "</br> ". $value;
      
}
      ?>