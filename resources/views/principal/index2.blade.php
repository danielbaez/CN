<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('iCheck/skins/flat/green.css') }}" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('build/css/custom.min.css') }}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        

        <!-- top navigation -->
        <div class="top_nav" style="margin-left: 0">
          <div class="nav_menu">
            <nav>
            <img src="http://www.grupocnet.com.co/templates/umaster/images/logo.svg" style="width: 248px;height: 57px;">
              <!-- <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>

              </div> -->

              <ul class="nav navbar-nav navbar-right" style="width: auto">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('images/img.jpg') }}" alt="">{{ Auth::user()->usuario }}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="{{ route('logout') }}"><i class="fa fa-fw fa-power-off pull-right"></i> Cerrar Sesión</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="{{ asset('images/img.jpg') }}" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="{{ asset('images/img.jpg') }}" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="{{ asset('images/img.jpg') }}" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="{{ asset('images/img.jpg') }}" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main" style="margin-left: 0">

          <div class="row">
      
            <div class="col-md-offset-1 col-md-10 col-sm-12 col-xs-12 lista-sucursales">
                      @if($sucursales)
                      <h3 style="color:#337ab7">SUCURSALES</h3>
                      <div class="table-responsive">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>#</th><th>Nombre</th><th>Dirección</th><th>Representante</th><th>Operación</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($sucursales as $sucursal)
                            <tr>
                              <th scope="row">{{ $sucursal->id }}</th><td>{{ $sucursal->razon_social }}</td><td>{{ $sucursal->direccion }}</td><td>{{ $sucursal->representante }}</td><td><button class="btn btn-primary">Ingresar</button></td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      @else
                        <h4>{{ $mensaje }}</h4>
                      @endif
                  </div>
              
          </div>
          <br />

        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer style="margin-left: 0">
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('nprogress/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('Chart.js/dist/Chart.min.js') }}"></script>
    <!-- gauge.js -->
    <script src="{{ asset('gauge.js/dist/gauge.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('iCheck/icheck.min.js') }}"></script>
    <!-- Skycons -->
    <script src="{{ asset('skycons/skycons.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('DateJS/build/date.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('jqvmap/dist/jquery.vmap.js') }}"></script>
    <script src="{{ asset('jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('build/js/custom.min.js') }}"></script>
	
  </body>
</html>
