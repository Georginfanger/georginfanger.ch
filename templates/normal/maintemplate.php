<?php /**
 * Description of maintemplate
 *
 * @author georginfanger <me@georginfanger.ch>
 * 
 * 
 */ ?>
<!DOCTYPE html>
<html>
      <head>
            <title><?php echo $viewModel->get('pageTitle'); ?></title>
            <link rel="stylesheet" href="<?php echo $viewModel->get('Basepath') . "templates/normal/css/maincss.css" ?>">
             <link rel="stylesheet" href="<?php echo $viewModel->get('Basepath') . "templates/normal/css/menucss.css" ?>">
      </head>
      <div id="content">
            <div id="mainmenu">
                  <?php require($this->mainMenu); ?>
                  </br>
            </div>
            
            
            <?php require($this->viewFile); ?>
      </div>
</body>
</html>