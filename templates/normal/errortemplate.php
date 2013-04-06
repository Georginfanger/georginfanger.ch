<?php

/**
 * Description of maintemplate
 *
 * @author georginfanger <me@georginfanger.ch>
 * 
 * 
 */?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $viewModel->get('pageTitle'); ?></title>
 <base href="http://localhost/~georginfanger/georginfanger/" />
<link rel="stylesheet" href="views/maincss.css">
</head>

<?php require($this->viewFile); ?>
</body>
</html>