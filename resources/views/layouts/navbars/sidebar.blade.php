<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-3.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="{{ route('home') }}" class="simple-text logo-normal">
      {{ __('GDS Analysis') }}
    </a>
  </div>

  <div class="sidebar-wrapper">
    <ul class="nav">
       <!--
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
          <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
     
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Laravel Examples') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('User profile') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('User Management') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('table') }}">
          <i class="material-icons">content_paste</i>
          <p>{{ __('Table List') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'typography' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('typography') }}">
          <i class="material-icons">library_books</i>
          <p>{{ __('Typography') }}</p>
        </a>
      </li>
      -->
      <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('icons') }}">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Icons') }}</p>
        </a>
      </li>
      <!--
      <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('map') }}">
          <i class="material-icons">location_ons</i>
          <p>{{ __('Maps') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('notifications') }}">
          <i class="material-icons">notifications</i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li>
-->
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }} ">
        <a class="nav-link " data-toggle="collapse" href="#graduate" aria-expanded="true">
          <i class="material-icons" style="color: red;">school</i>
          <p>{{ __('Graduate') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="graduate">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'degree_add' ? ' active' : '' }}">
              <a class="nav-link" href="{{ url('register/graduate/create') }}">
                <i class="material-icons">person_add_alt</i>
                <p>{{ __('Add New Graduate') }}</p>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'degree_list' ? ' active' : '' }}">
              <a class="nav-link" href="{{ url('register/graduate/show') }}">
                <i class="material-icons">list</i>
                <p>{{ __('Show Graduate List ') }}</p>
              </a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }} ">
        <a class="nav-link " data-toggle="collapse" href="#diploma" aria-expanded="true">
          <i class="material-icons" style="color: green;">receipt_long</i>
          <p>{{ __('Diploma') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="diploma">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'diploma_add' ? ' active' : '' }}">
              <a class="nav-link" href="{{ url('register/diploma/create') }}">
                <i class="material-icons">person_add_alt</i>
                <p>{{ __('Add New Diploma') }}</p>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'diploma_list' ? ' active' : '' }}">
              <a class="nav-link" href="{{ url('register/diploma/show') }}">
                <i class="material-icons">list</i>
                <p>{{ __('Show Diploma List') }}</p>
              </a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }} ">
        <a class="nav-link " data-toggle="collapse" href="#contacts" aria-expanded="true">
          <i class="material-icons" style="color: green;">import_contacts</i>
          <p>{{ __('Filter Contacts') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="contacts">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'cont_degree' ? ' active' : '' }}">
              <a class="nav-link" href="{{ url('contacts/graduate/') }}">
                <i class="material-icons">school</i>
                <p>{{ __('Graduate') }}</p>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'cont_diploma' ? ' active' : '' }}">
              <a class="nav-link" href="{{ url('contacts/diploma/') }}">
                <i class="material-icons">receipt_long</i>
                <p>{{ __('Diploma') }}</p>
              </a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item{{ $activePage == 'import_records' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('import') }}">
          <i class="material-icons" style="color: blue;">upload_file</i>
          <p>{{ __('Data Import') }}</p>
        </a>
      </li>

      <li class="nav-item{{ $activePage == 'institutes' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('institutes') }}">
          <i class="material-icons">business</i>
          <p>{{ __('Institutes') }}</p>
        </a>
      </li>

      <li class="nav-item{{ $activePage == 'institutes' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('institutes') }}">
          <i class="material-icons">picture_as_pdf</i>
          
          <p>{{ __('Reports') }}</p>
        </a>
      </li>

    </ul>
  </div>
</div>