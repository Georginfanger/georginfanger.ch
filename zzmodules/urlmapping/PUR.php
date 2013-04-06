<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PUR
 *
 * @author georginfanger
 */
class PUR {

      protected $route_match = false;
      protected $route_call = false;
      protected $route_call_args = false;
      protected $routes = array();

      public function __construct() {
            
      }

// function __construct( )

      public function setRoutes($routes) {
            $this->routes = $routes;
      }

// function setRoutes

      public function routeURL($url = false) {

            if ($url) {
                  $pieces = explode("/", $url);
                  array_shift($pieces);
                  print_r($pieces);
                 $this->callRoute($pieces);
                  echo "Richtig";
            } else {
                  echo "Null";
            }
      }

      public function routeURL9($url = false) {
            // Look for exact matches
            $pieces = explode("/", $url);
            print_r($pieces);
            if (isset($this->routes[$url])) {
                  $this->route_match = $url;
                  $this->route_call = $this->routes[$url];

                  $this->callRoute();
                  return true;
            }

            // See if the first part of the route exists
            foreach ($this->routes as $path => $call) {
                  if (empty($path)) {
                        continue;
                  }

                  preg_match("|{$path}/(.*)$|i", $url, $match);
                  if (!empty($match[1])) {
                        $this->route_match = $path;
                        $this->route_call = $call;
                        $this->route_call_args = explode("/", $match[1]);

                        $this->callRoute();
                        return true;
                  } // if
            } // foreach
            // If no match was found, call the default route if there is one
            if ($this->route_call === false) {
                  if (!empty($this->routes['_not_found_'])) {
                        $this->route_call = $this->routes['_not_found_'];
                        $this->callRoute();
                        return true;
                  }
            }
      }

// function routeURL( )

      private function callRoute($url = false) {
           if($url){
                 
                 
           }else{
            $call = $this->route_call;
            
            

            if (is_array($call)) {
                  require "./modules/" . $call[0] . "/controller/" . $call[1] . ".php";
                  $modul = new $call[1];
                  $modul->$call[1]($call);
            } else {
                  echo "ECHO";
                  $call($this->route_call_args);
            }
      }
      }
// function callRoute
}

// class PUR
?>
