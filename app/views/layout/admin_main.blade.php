<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
    @if(isset($title)) 
        {{ $title }}
    @else
        Laravel Title
    @endif
    </title>
    
</head>
<body>
    
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
@include('layout.top_nav_admin')
@include('layout.left_nav_admin')


        
           </nav>

        <div id="page-wrapper">
        @if(Session::has('message'))
            <div class="alert alert-{{ Session::get('message_type') }}">
              <span type="button" class="close" data-dismiss="alert">&times;</span>
             <strong> {{ Session::get('message') }}</strong>
            </div>
        @endif
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Page Name</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
        @yield('body-content')
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->




    <!-- jQuery -->
    {{ HTML::script('js/jquery.js') }}
    <!-- Bootstrap Core JavaScript -->
    {{ HTML::script('js/bootstrap.min.js') }}

    <!-- Metis Menu Plugin JavaScript -->
    <!-- {{ HTML::script('js/plugins/metisMenu/metisMenu.min.js') }} -->

    <!-- Morris Charts JavaScript -->
    <!-- {{ HTML::script('js/plugins/morris/raphael.min.js') }} -->

    <!-- Custom Theme JavaScript -->
    <!-- {{ HTML::script('js/sb-admin-2.js') }} -->
</body>
</html>
