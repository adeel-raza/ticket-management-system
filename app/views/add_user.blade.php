@extends('layouts.master-child')

@section('page-wrapper')

        <div class="row">
            <div class="col-lg-12">
                <h1>User Management <small>Add User</small></h1>
                <ol class="breadcrumb">
                    <li><a href="{{ url('index') }}"><i class="icon-dashboard"></i> Dashboard</a></li>
                     <li><a href="#"><i class="icon-dashboard"></i> User Management </a></li>
                    <li class="active"><i class="icon-file-alt"></i> Add User </li>
                </ol>
            </div>
        </div><!-- /.row -->

        <div class="breadcrumb user-management center-block">
          <!-- form start -->
           <!-- Messages After Submit --> 
             @if(isset($messages))
             
                @if (count($messages) === 1)
                   @if($messages == "success")
                      <div class="success-message">{{ $messages }}</div>
                   @else
                       <div class="error-message">{{ $messages  }}</div>
                   @endif
                
                @else
                    @foreach ($messages->all('<li>:message</li>') as $message)
                    <p>{{ $message }}</p>
                    @endforeach
                @endif
             @endif   
            <!-- Messages After Submit --> 
            
            {{ Form::open(array('action' => 'Webxity\DashboardController@postAdduser') ) }}
                <div class="form-group">
                    <label for="username">User Name</label>
                    <input type="text" name="name" class="form-control" id="username" placeholder="User Name">
                </div>
                <div class="form-group">
                    <label for="useremail">Email</label>
                    <input type="email" name="email" class="form-control" id="useremail" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="pass" class="form-control" id="password" placeholder="Password">
                </div>
               <div class="form-group">
                    <label for="user_role">User Role </label>
               </div>  
            {{  Form::select('role', array(client' => 'Client', 'developer' => 'Developer' , 'analyst'=>'Business Analyst'))  }}
   
             <br/><br/>
                
                <button type="submit" class="btn btn-default" name="submit">Submit</button>
           {{ Form::close() }}
        </div><!-- form end -->


@stop

