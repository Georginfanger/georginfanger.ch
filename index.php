<?php

/**
 * Description of index
 *
 * @author georginfanger <me@georginfanger.ch>
 * 
 * 
 */
//load the required classes
require("classes/basecontroller.php");  
require("classes/basemodel.php");
require("classes/view.php");
require("classes/viewmodel.php");
require("classes/loader.php");
// Include the main Propel script
require_once 'vendor/propel/propel1/runtime/lib/Propel.php';

//// Initialize Propel with the runtime configuration
Propel::init("build/conf/georginfanger-conf.php");


// Add the generated 'classes' directory to the include path
set_include_path("build/entities" . PATH_SEPARATOR . get_include_path());


$loader = new Loader($_GET); //create the loader object
$controller = $loader->createController(); //creates the requested controller object based on the 'controller' URL value
$controller->executeAction(); //execute the requested controller's requested method based on the 'action' URL value. Controller methods output a View.




?>