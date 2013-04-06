<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Index {

   

 function __construct( ){
          
            require "./modules/urlmapping/PUR.php";
            
            
            $routes = Array("_not_found_" => "demo_not_found",
                "index.html" => Array("DEMO", "homePage"),
                "/color/black" => Array("DEMO", "colorBlack"),
                "/admin" => "admin",
                "/color" => Array("DEMO", "color")
            );


            $route = new PUR();
            $route->setRoutes($routes);
            $route->routeURL( $_SERVER['PATH_INFO']);
          
            //$route->routeURL(preg_replace("|/$|", "", $_GET['_route_']));
 }
 
 }
 
 function demo_not_found( $args = false ) {
    print "Route not found.";
}
 $index = new Index;

class DEMO {

      function homePage($args = false) {
            print "This is the home page.";
      }

      function colorBlack($args = false) {
            print "The color black and everything below.";
      }

      function color($args = false) {
            print "All the other colors.";
      }

}


?>
