<nav class="pcoded-navbar menu-light ">
   <div class="navbar-wrapper  ">
      <div class="navbar-content scroll-div ">

         <div class="">
            <div class="main-menu-header">
               <img class="img-radius" src="https://ui-avatars.com/api/?name={{Auth::user()->name}}" alt="User-Profile-Image">
               <div class="user-details">
                  <div id="more-details">{{Auth::user()->name}} <i class="fa fa-caret-down"></i></div>
               </div>
            </div>
            <div class="collapse" id="nav-user-link">
               <ul class="list-unstyled">
                  <li class="list-group-item">
                     <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary"><i class="feather icon-log-out"></i> Cerrar Sesion</button>
                     </form>
                  </li>
               </ul>
            </div>
         </div>

         <ul class="nav pcoded-inner-navbar ">
            <li class="nav-item pcoded-menu-caption">
               <label>MENU</label>
            </li>
            <li class="nav-item">
               <a href="{{route('home')}}" class="nav-link "><span class="pcoded-micon">
                     <i class="fa fa-home" aria-hidden="true"></i>
                  </span><span class="pcoded-mtext">Dashboard</span></a>
            </li>

            
            <li class="nav-item">
               <a href="{{route('estu.grados')}}" class="nav-link "><span class="pcoded-micon">
                     <i class="fa fa-list" aria-hidden="true" style="color: red;"></i>
                  </span><span class="pcoded-mtext">BOLETINES</span></a>
            </li>


            <li class="nav-item pcoded-hasmenu">
               <a href="#" class="nav-link"><span class="pcoded-micon">
                     <i class="fa fa-graduation-cap" aria-hidden="true" style="color: #ff740e;"></i>
                  </span><span class="pcoded-mtext">ESTUDIANTES</span></a>
               <ul class="pcoded-submenu">
                  <li><a href="{{route('estu.index')}}">Listado</a></li>
                  @can('administrados')
                  <li><a href="{{route('inscripcion.index')}}">INSCRIBIR</a></li>
                  @endcan
                  @can('profesor')
                  <li><a href="{{route('estu.calificar')}}">Calificar</a></li>
                  @endcan
                  @can('administrados')
                  <li><a href="{{route('estu.reportes')}}">Reportes</a></li>
                  @endcan
               </ul>
            </li>

            <li class="nav-item pcoded-hasmenu">
               <a href="#" class="nav-link"><span class="pcoded-micon"><i class="fas fa-user-check    " style="color:  #cfca00;"></i></span><span class="pcoded-mtext">PADRES</span></a>
               <ul class="pcoded-submenu">
                  <li><a href="{{ route('encargado.index') }}">LISTADO</a></li>
                  <li><a href="{{route('encargado.reports')}}" target="_blank">REPORTES</a></li>
               </ul>
            </li>


            <li class="nav-item pcoded-hasmenu">
               <a href="#" class="nav-link"><span class="pcoded-micon"><i class="fas fa-user-tie    " style="color: #00cfc7;"></i></span><span class="pcoded-mtext">PROFESOR</span></a>
               <ul class="pcoded-submenu">
                  <li><a href="{{ route('profe.index') }}">LISTADO</a></li>
                  @can('administrados')
                  <li><a href="{{ route('profe.create') }}">REGISTRO</a></li>
                  @endcan
                  <li><a href="{{route('profe.reporteAll')}}">REPORTES</a></li>
               </ul>
            </li>

            <li class="nav-item pcoded-hasmenu">
               <a href="#" class="nav-link"><span class="pcoded-micon"><i class="fa fa-book" aria-hidden="true" style="color:#006ecf ;"></i></span><span class="pcoded-mtext">GRADOS</span></a>
               <ul class="pcoded-submenu">
                  <li><a href="{{ route('grado.index') }}">Listado</a></li>
                  @can('administrados')
                  <li><a href="{{ route('grado.grado_profesor') }}">Profesor - Grados</a></li>
                  <li><a href="{{ route('grados.create') }}">Registro</a></li>
                  @endcan
                  <li><a href="{{route('grados.reportes')}}">Reportes</a></li>
               </ul>
            </li>

            <li class="nav-item pcoded-hasmenu">
               <a href="#" class="nav-link"><span class="pcoded-micon"><i class="fas fa-book-open    " style="color: #8e499f;"></i></span><span class="pcoded-mtext">CURSOS</span></a>
               <ul class="pcoded-submenu">
                  <li><a href="{{route('cur.index')}}">Listado</a></li>
                  <li><a href="{{route('cur.reports')}}">Reportes</a></li>
               </ul>
            </li>


            <li class="nav-item pcoded-hasmenu">
               <a href="#" class="nav-link"><span class="pcoded-micon"><i style="color: #ff18cc;" class="fa fa-users" aria-hidden="true"></i></span><span class="pcoded-mtext">USUARIOS</span></a>
               <ul class="pcoded-submenu">
                  <li><a href="{{route('users.index')}}">Listado</a></li>
                  <li><a href="{{route('roles.index')}}">Roles</a></li>
                  <li><a href="{{route('permissions.index')}}">Permisos</a></li>
               </ul>
            </li>

            <li class="nav-item pcoded-hasmenu">
               <a href="#" class="nav-link"><span class="pcoded-micon"><i class="fas fa-bookmark    " style="color: #9218ff;" ></i></span><span class="pcoded-mtext">NOTAS</span></a>
               <ul class="pcoded-submenu">
                  <li><a href="{{route('nota.index')}}">Listado</a></li>
               </ul>
            </li>

         </ul>
      </div>
   </div>
</nav>