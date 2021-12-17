<div class="sidebar" data-color="azure" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-3.jpg">
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
      

      @if (Auth::user()->hasRole('viewer'))
      <li class="nav-item{{ $activePage == 'degree_list' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('register/graduate/show')  }}">
          <i class="material-icons" style="color: blue;">school</i>
          <p>{{ __('Graduate') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'diploma_list' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('register/diploma/show')  }}">
          <i class="material-icons" style="color: blue;">receipt_long</i>
          <p>{{ __('Diploma') }}</p>
        </a>
      </li>
      @endif


      @if (!(Auth::user()->hasRole('viewer')))
      <li class="nav-item{{ $activePage == 'institutes' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('institutes') }}">
          <i class="material-icons" style="color: blue;">business</i>
          <p>{{ __('Institutes') }}</p>
        </a>
      </li>
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
      <li class="nav-item{{ $activePage == 'import_records' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('import') }}">
          <i class="material-icons" style="color: blue;">upload_file</i>
          <p>{{ __('Data Import') }}</p>
        </a>
      </li>
      @endif

      @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('owner'))
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
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }} ">
        <a class="nav-link " data-toggle="collapse" href="#student_list" aria-expanded="true">
          <i class="material-icons" style="color: green;">format_list_bulleted</i>
          <p>{{ __('Student List') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="student_list">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'list_degree' ? ' active' : '' }}">
              <a class="nav-link" href="{{ url('list/graduate/') }}">
                <i class="material-icons">school</i>
                <p>{{ __('Graduate') }}</p>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'list_diploma' ? ' active' : '' }}">
              <a class="nav-link" href="{{ url('list/diploma/') }}">
                <i class="material-icons">receipt_long</i>
                <p>{{ __('Diploma') }}</p>
              </a>
            </li>
          </ul>
        </div>
      </li>
      
      <li class="nav-item{{ $activePage == 'reports' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('report') }}">
          <i class="material-icons" style="color: red;">picture_as_pdf</i>
          <p>{{ __('Reports') }}</p>
        </a>
      </li>
      @endif

    </ul>
  </div>
</div>