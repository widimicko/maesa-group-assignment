<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">
    
    <li class="nav-heading">Dashboard</li>
    
    <li class="nav-item">
      <a class="nav-link collapsed {{ Request::is('dashboard/employees*') ? 'active' : '' }}" href="{{ route('employees.index') }}">
        <i class="bi bi-people"></i>
        <span>Employees</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="{{ route('categories.index') }}">
        <i class="bi bi-tags"></i>
        <span>Category</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed {{ Request::is('dashboard/products*') ? 'active' : '' }}" href="{{ route('products.index') }}">
        <i class="bi bi-basket"></i>
        <span>Products</span>
      </a>
    </li>


    <li class="nav-item">
      <a class="nav-link collapsed {{ Request::is('dashboard/users*') ? 'active' : '' }}" href="{{ route('users.index') }}">
        <i class="bi bi-grid-fill"></i>
        <span>Users</span>
      </a>
    </li>

  </ul>

</aside>