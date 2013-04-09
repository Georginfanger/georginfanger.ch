<?php

/**
 * Description of menu
 *
 * @author georginfanger <me@georginfanger.ch>
 * 
 * 
 */
?>
<?php

$array = $viewModel->get('mainMenu');
echo '<nav id="nav"> <ul id="navigation">';


foreach ($array as $key => $value) {
      if (is_array($value)) {
      
            echo '<li><a href="#">' . $key . '</a><ul>';
            foreach ($value as $key2 => $value2) {
                  echo '<li><a href= "' . $viewModel->get("Basepath") . '' . $value2 . '">' . $key2 . '</a></li>';
            }
            echo '</ul></li>';
      } else {
            echo '<li><a href= "' . $viewModel->get("Basepath") . '' . $value . '">' . $key . '</a></li>';
      }
      
}
echo '</ul></nav>'; ?>