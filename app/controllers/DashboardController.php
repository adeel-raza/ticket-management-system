<?php

namespace Webxity;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class DashboardController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth', array('except' => array('getLogin' ,  'postVerifylogin' )) ); // Except on login

        $this->beforeFilter('csrf', array('on' => 'post' , 'except' =>  'postVerifylogin'));  // Except on post from login

    }

    
    public function getIndex() { 
        
                //Check if user logged in
                if (!\Auth::check()) {
                    return \Redirect::action(__CLASS__ . '@getLogin');
                 
                }
                else
                {   
                    //User is Authenticated
                    return View::make('dashboard', array ( "name" => \Auth::user()->getName()) );
                }
    }


    public function postVerifylogin() {

                $user = array(
                'email' => \Input::get('email'),
                'password' => \Input::get('password')
            );

            if ( \Auth::attempt($user)) 
             {
                   return \Redirect::action(__CLASS__ . '@getIndex');

             } 
             else
             {

                 // validation not successful, send back to form
                    return \Redirect::to('login')->with('message', 'Login Failed');

             }   
     
    }
    public function getLogout() {
        // Logout the User 
        
        Auth::logout();
         return \Redirect::to('login') ;
        
    }       
    

    public function getDashboard() {
       
        return View::make('dashboard');
    }
    
    public function postAdduser(){
     
         $user =  array(
                            'name'               => \Input::get('name'),
                            'password'      => \Input::get('pass') ,
                            'email'             => \Input::get('email'),
                            'user_role'    =>\Input::get('user_role'),
                             'cap'                => \Input::get('user_role') 
                            ) ; 
         
         
                    $validator = \Validator::make(  
                            $user,
                            array(
                             'name' => 'required',
                            'password' => 'required|min:4',
                            'email' => 'required|email|unique:users', 
                             'user_role' =>'required'   
                            )
                    ); 

            
          $messages = "Submission Sucessfull";
          
         if ($validator->fails())
            {
                 // The given data did not pass validation
                 $messages = $validator->messages();
            
            }   
            
            else
            {
                
                // Create a new user in the database...
                $user['password'] = \Hash::make($user['password']);
                $response  = \User::create($user);
             }   
            
       return View::make('add_user' , array('messages' => $messages)) ;  
        
    }
    
    public function getListuser(){
        
        $users = \User::all();
      return  View::make('list_user' , array('users' => $users) ) ; 
        
    }
    public function getAdduser(){
        
        return View::make('add_user') ;  
    }
    public function getEdituser($id){
        
       return  View::make('edit_user' , array('user' => \User::find($id)) ) ; 
    }
    public function postEdituser(){
        
          $id =  intval(\Input::get('id')) ;
        
        $user =  array(
                            'name'               => \Input::get('name'),
                            'password'      => \Input::get('password') ,
                            'email'             => \Input::get('email'),
                            'role'               =>\Input::get('role')
                            ) ; 
         
         

            
          $messages = "Record Successfully Updated";

           
                
                        // Update User Record...
           try{
                        \User::where('id', '=', $id)
                        ->update( array ('name' => $user['name'] , 'email' => $user['email'] , 'role' => $user['role']  ));

                          // If password sent update it else not
                        
                        if (\Input::has('password'))
                        {
                             $user['password'] = \Hash::make($user['password']);
                              \User::where('email', '=', $user['email'])
                               ->update( array ('password' => $user['password']  ));

                         }
                }
                catch(Exception $e) {
                    
                     echo $messages =  'Please enter a unique email address';
                   
                }
                 
                   \Session::put('messages', $messages);
                    return \Redirect::to("edituser/$id")->with('user', \User::find($id));
          
    }
            
    

    public function getCharts() {

        return View::make('charts');
    }

    public function getLogin() {
    
        return View::make('login');
    }

    public function anyAjax() {
        if (!\Request::Ajax()) {
            return \App::abort(404);
        }

        $method = \Request::method();

        $requested = \Input::get('requested');

        if (empty($requested)) {
            return \Redirect::action(__CLASS__ . '@getIndex');
        }

        $requested = camel_case('@' . strtolower($method) . '_' . $requested);

        return \Redirect::action(__CLASS__ . $requested);

    }

}