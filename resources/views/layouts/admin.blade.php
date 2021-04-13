<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="es">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Ingenielectricas SAS</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">

    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
   

    
</head>

</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                            data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button"
                        class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="app-header__content bg-primary header-text-dark header-shadow">
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">

                                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Cerrar Sesión') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--barra de navegacion -->
        <div class="theme-settings__inner">
            <div class="scrollbar-container">
            </div>
        </div>

        <div class="app-main">
            <div class="app-sidebar sidebar-shadow bg-dark sidebar-text-light">
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button"
                            class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                            <li class="app-sidebar__heading text-white">Inicio</li>
                            <li>
                                <a href={{asset('home')}} class="text-white">
                                    <i class="metismenu-icon pe-7s-home"></i>
                                    INGENIELECTRICAS
                                </a>
                            </li>
                            <li class="app-sidebar__heading text-white">ADMINISTRAR</li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-users text-white"></i>
                                    <p  class="text-white">Usuarios</p>
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left text-white"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a class="text-white" href={{asset('roles')}}>
                                            <i class="metismenu-icon"></i>
                                            Gestionar Roles
                                        </a>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <a class="text-white" href={{asset('usuarios')}}>
                                            <i class="metismenu-icon"></i>
                                            Gestionar Usuarios
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-id text-white"></i>
                                    <p  class="text-white">Empleados</p>
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left text-white"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a class="text-white" href={{asset('cargos')}}>
                                            <i class="metismenu-icon"></i>
                                            Gestionar Cargos
                                        </a>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <a class="text-white" href={{asset('empleados')}}>
                                            <i class="metismenu-icon"></i>
                                            Gestionar Empleados
                                        </a>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <a class="text-white" href={{asset('obras')}}>
                                            <i class="metismenu-icon"></i>
                                            Gestionar Obras
                                        </a>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <a class="text-white" href={{asset('empleados_obras')}}>
                                            <i class="metismenu-icon"></i>
                                            Gestionar Empleado Obras
                                        </a>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <a class="text-white" href={{asset('implementos')}}>
                                            <i class="metismenu-icon"></i>
                                            Gestionar Implementos
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-portfolio text-white"></i>
                                    <p class="text-white">Productos</p>
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left text-white"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a class="text-white" href={{asset('productos')}}>
                                            <i class="metismenu-icon"></i>
                                            Gestionar Productos
                                        </a>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <a class="text-white" href={{asset('unidad_medida')}}>
                                            <i class="metismenu-icon"></i>
                                            Gestionar Unidad Medida
                                        </a>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <a  class="text-white" href={{asset('proveedores')}}>
                                            <i class="metismenu-icon"></i>
                                            Gestionar Proveedores
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-timer text-white"></i>
                                    <p class="text-white">Servicios</p>
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left text-white"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a class="text-white" href={{asset('servicios')}}>
                                            <i class="metismenu-icon"></i>
                                            Gestionar Servicios
                                        </a>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <a class="text-white" href={{asset('solicitud_servicios')}}>
                                            <i class="metismenu-icon"></i>
                                            Gestionar Solicitudes
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-cart text-white"></i>
                                    <p class="text-white">Pedidos</p>
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left text-white"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a class="text-white" href={{asset('pedidos')}}>
                                            <i class="metismenu-icon"></i>
                                            Gestionar Pedidos
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-refresh-2 text-white"></i>
                                    <p class="text-white">Movimientos</p>
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left text-white"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a class="text-white" href={{asset('movimientos')}}>
                                            <i class="metismenu-icon"></i>
                                            Gestionar Movimientos
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="row">
                        @yield('contenido')
                    </div>
                </div>
                <div class="app-wrapper-footer">
                    <!-- <div class="app-footer">
                        <div class="app-footer__inner">
                            <div class="app-footer-left">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link">
                                            Footer Link 1
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link">
                                            Footer Link 2
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="app-footer-right">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link">
                                            Footer Link 3
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link">
                                            <div class="badge badge-success mr-1 ml-0">
                                                <small>NEW</small>
                                            </div>
                                            Footer Link 4
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
    
    <script type="text/javascript" src="{{asset('js/main.js')}}"></script></body>
   

    @yield("script")

</body>

</html>
