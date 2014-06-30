<?php

namespace Webxity\Roles;

use Illuminate\Support\Facades\View;

class Role extends \BaseController
{
    public function index()
    {
	 
	return   $role = Role_m::find(1);
        
    }
    
    public function add_role( $user_id="" , $role_name= "" )
     {
        // add the new user role in db
        
     }
     
     public function get_role(  $user_id = ""  )
     {
         //Get the user role
         
     }        
    
     public function has_cap ( $user_id="" ,  $cap_name="" )
     {
         //Check weather the user has the cap
         
     }        
             
   
}