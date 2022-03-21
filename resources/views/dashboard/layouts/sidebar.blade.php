<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">
    
    <li class="nav-heading">Dashboard</li>

      <li class="nav-item">
        <a class="nav-link collapsed {{ Request::is('dashboard/events*') ? 'active' : '' }}" href="{{ url('/dashboard/events') }}">
          <i class="bi bi-calendar2-event-fill"></i>
          <span>Products</span>
        </a>
      </li>

    @can('Admin')
      <li class="nav-heading">Administrator</li>

      <li class="nav-item">
        <a class="nav-link collapsed {{ Request::is('dashboard/employees*') ? 'active' : '' }}" href="{{ url('/dashboard/employees') }}">
          <i class="bi bi-calendar2-event-fill"></i>
          <span>Employees</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed {{ Request::is('dashboard/users*') ? 'active' : '' }}" href="{{ url('/dashboard/users') }}">
          <i class="bi bi-calendar2-event-fill"></i>
          <span>Users</span>
        </a>
      </li>
    @endcan

  </ul>

</aside>