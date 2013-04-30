<?php

/**
 * Description of error
 *
 * @author georginfanger <me@georginfanger.ch>
 * 
 * 
 */
class UserModel {

      public function __construct() {
            // parent::__construct(true);
      }

      //data passed to the bad URL error view
      public function save_user() {
            
      }

      public function user_admin() {
            $array = UserQuery::create()->find();
            return $array;
      }
      
      public function user_save($username, $userpw){
          $user = new User();
          $user->setUserUname($username);
          $user->setUserPw($userpw);
          $user->setPkUser(91);
          $user->setUserSalt("jhjhjh");
          
         $user->save();
      }

}

?>
