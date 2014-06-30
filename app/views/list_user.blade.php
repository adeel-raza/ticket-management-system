@extends('layouts.master-child')

@section('page-wrapper')

        <div class="row">
            <div class="col-lg-12">
                <h1>User Management <small>List Users</small></h1>
                <ol class="breadcrumb">
                    <li><a href="{{ url('index') }}"><i class="icon-dashboard"></i> Dashboard</a></li>
                     <li><a href="#"><i class="icon-dashboard"></i> User Management </a></li>
                    <li class="active"><i class="icon-file-alt"></i> List Users </li>
                </ol>
            </div>
        </div><!-- /.row -->

        <div class="breadcrumb user-management center-block">
             <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-user"></i> Users </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped tablesorter">
                        <thead>
                        <tr>
                            <th> # <i class="fa fa-sort"></i></th>
                            <th> Name <i class="fa fa-sort"></i></th>
                            <th> Email <i class="fa fa-sort"></i></th>
                            <th> Role <i class="fa fa-sort"></i></th>
                            <th> Edit <i class="fa fa-sort"></i></th>
                        </tr>
                        </thead>
                        <tbody> 
                           <?php $id = 1 ; ?> 
                            @if($users)
                         @foreach($users as $user)
                        <tr>
                            <td> <?php echo $id ; ?> </td>
                            <td> {{{    $user->name       }}}</td>
                            <td> {{{    $user->email     }}}</td>
                            <td> {{{    $user->role       }}}</td>
                            <td> <a href="{{{ url('edituser/'.$user->id )}}}"> Edit </a></td> 
                        </tr>
                        <?php $id++; ?>
                        @endforeach
                         @endif
                        </tbody>
                    </table>
                </div>
               <!-- <div class="text-right">
                    <a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                </div>-->
            </div>
        </div>
            
        </div><!-- form end -->


@stop

