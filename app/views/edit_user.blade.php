@extends('layouts.master-child')

@section('page-wrapper')

        <div class="row">
            <div class="col-lg-12">
                <h1>User Management <small>Edit User</small></h1>
                <ol class="breadcrumb">
                    <li><a href="{{ url('index') }}"><i class="icon-dashboard"></i> Dashboard</a></li>
                     <li><a href="#"><i class="icon-dashboard"></i> User Management </a></li>
                    <li class="active"><i class="icon-file-alt"></i> Edit User </li>
                </ol>
            </div>
        </div><!-- /.row -->

        <div class="breadcrumb user-management center-block">
          <!-- form start -->
           <!-- Messages After Submit -->
           <?php $msg = Session::pull('messages'); ?>
             @if(isset($msg))
             
               
                   @if($msg == "Record Successfully Updated")
                      <div class="success-message">{{ $msg }}</div>
                   @else
                       <div class="error-message">{{ $msg  }}</div>
                   @endif

             @endif   
            <!-- Messages After Submit --> 
            
            
          @if($user) 
            {{ Form::model($user, array('action' => 'Webxity\DashboardController@postEdituser', $user->id))  }}
                <div class="form-group">
                    <label for="username">User Name</label>
                    {{Form::text('name' , $user->name,  array( 'class' => 'form-control')) }}
            </div>
                <div class="form-group">
                    <label for="useremail">Email</label>
                   {{Form::text('email' , $user->email,  array( 'class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                   {{Form::text('password' , '' ,  array( 'class' => 'form-control')) }}
                {{" * Let this field be empty to retain the previous password"}}
                </div>
               <div class="form-group">
                    <label for="user_role">User Role </label>
                   <br/> 
               {{  Form::select('role', array( 'client' => 'Client', 'admin' => 'Admin',  'developer' => 'Developer' , 'analyst'=>'Business Analyst') , $user->role)  }}
               {{Form::hidden('id' , $user->id)}}    
               </div> 
              <br/>

                <button type="submit" class="btn btn-default" name="submit">Submit</button>
           {{ Form::close() }}
           
       @endif    
        </div><!-- form end -->


@stop

