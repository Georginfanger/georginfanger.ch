<?php

/**
 * Description of index
 *
 * @author georginfanger <me@georginfanger.ch>
 * 
 * 
 */

 
$data = $viewModel->get('content'); 

foreach($data as $author) { 
echo $author->getUserUname();
}
      ?>
<form name="input" action="user" method="post">
Username: <input type="text" name="username">
<input type="submit" value="Submit">
</form>
