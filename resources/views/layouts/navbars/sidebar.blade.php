<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="https://creative-tim.com/" class="simple-text logo-normal">
      {{ __('Panel') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="false">
          <i><span class="material-icons">account_circle</span></i>
          <p>{{ __('Panel Usuario') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse hide" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('Perfil') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"> AU </span>
                <span class="sidebar-normal"> {{ __('Agregar Usuario') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item{{ $activePage == 'cupo' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('parqueadero.index') }}">
          <i class="material-icons">library_books</i>
            <p>{{ __('Cupos disponibles') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'cliente' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('cliente.index') }}">
          <i><img style="width:25px" src="{{ asset('material') }}/img/person.png"></i>
          <p>{{ __('Clientes') }}</p>
        </a>         
      </li>
      <li class="nav-item{{ $activePage == 'vehiculo' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('vehiculo.index') }}">
          <i><img style="width:25px" src="{{ asset('material') }}/img/car.png"></i>         
            <p>{{ __('Vehiculos') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'detalle' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('detalle.index') }}">
          <i><img style="width:25px" src="{{ asset('material') }}/img/time.png"></i>         
            <p>{{ __('Hora de ingreso') }}</p>
        </a>
      </li>      
    </ul>
  </div>
</div>