<?php

/**
 * Description of user
 *
 * @author georginfanger <me@georginfanger.ch>
 * 
 * 
 */


$data = $viewModel->get('content'); 



echo '<table border="1"><tr><td>Username</td></tr>';
foreach($data as $value){
	echo  "<tr><td>".$value->getUserUname()."</tr>"  ;  
}
echo "</table>";



?>