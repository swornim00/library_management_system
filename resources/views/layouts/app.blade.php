<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - SchooPhile Library Management System</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/jquery/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/font-awesome-4.6.3/css/font-awesome.min.css')}}">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script src="{{asset('assets/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/jquery/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>

</head>

<div class="modal fade" id="def-modal">
  <div class="modal-dialog">
    <div class="modal-content" id="def-modal-content">
      <div id="modalHeader" class="modal-header">
      </div>
      <div class="modal-body" id="modalBody">
      </div>
      <div class="modal-footer" id="modalFooter">
      </div>
    </div>
  </div>
</div>
<script>
function closeModal(){
  $('#default-modal').modal("hide");
}

function deleteModal(id,item){

  $.get('{{url("/")}}/modal/delete/'+item+'/'+id,function(data){
    $('#def-modal-content').html(data);
  });

  $('#def-modal').modal('show');
}
</script>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <b>Schoo</b>Phile Library Management System
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                          <li><a href="{{ url('/login') }}">Login</a></li>
                          <li><a href="{{ url('/contact_us') }}">Contact Us</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="#" onclick="showProfile()"><span class="fa fa-user"></span> Profile</a>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <span class="fa fa-sign-out"></span> Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            @if(\Auth::check())
                @include('layouts.top')
                @if($errors)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}<span class="close" data-dismiss="alert">&times;</span></div>
                    @endforeach
                @endif
            @endif
            @yield('content')
        </div>
    </div>
    <br><br><br>
    <div class="footer">
      <center>
        <hr />
        <p class="footer-text">Copyright &copy; Swornim Labs 2016 - 2017</p>
      </center>
    </div>
    <style>
      .footer{
        padding:20px;
      }
      .footer-text{
        color:white;
        font-weight:700;

      }
    </style>
    <!-- Scripts -->

    <script>
    function showProfile(){
        $.get('{{url("/")}}/profile',function(data){
            $('.modal-head').html("<h4><span class='fa fa-user'></span> Profile</h4>");
            $('.modal-body').html(data);
        });
        $('#def-modal').modal("show");
    }


    </script>
</body>
</html>
