@extends('layout.admin_main')

@section('body-content')

<div> {{ HTML::linkRoute('user-create', 'New User', '', array('class'=> 'btn btn-primary') ) }} </div>
	<!-- <p>{{ ($message) ? $message : ''; }}</p> -->
	 <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Ser.</th>
                                            <th>Photo</th>
                                            <th>User Name</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                   <tbody> 
                                   @foreach ($data as $user)
                                    
                                        <tr>
                                            <td>{{$ser++ }}</td>
                                            <td><img class="img-responsive img-circle" src="{{ asset($user->file) }}" width="70" height="80" ></td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td class="center">{{ $user->email }}</td>
                                            <td class="center">{{ HTML::linkRoute('delete_user_destroy', 'Delete', array($user->id), array('class'=> 'btn btn-danger') ) }}
			{{ HTML::linkRoute('user_get_edit', 'Edit', array($user->id), array('class'=> 'btn btn-success') ) }}</td>
                                        </tr>
                                        @endforeach

                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>

@stop
<!-- DataTables JavaScript -->
{{ HTML::script('js/plugins/dataTables/jquery.dataTables.js') }}
{{ HTML::script('js/plugins/dataTables/dataTables.bootstrap.js') }}

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>
