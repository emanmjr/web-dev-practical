
<!-- Sidebar -->
<div class="bg-light border-right" id="sidebar-wrapper">
  <div class="sidebar-heading">{{ Auth::user()->name }}</div>
  <div class="list-group list-group-flush">
    <a href="{{ route('home') }}" class="list-group-item list-group-item-action {{ Request::segment(1) == 'dashboard' ? 'active' : 'bg-light' }}">Dashboard</a>
    <a href="#" class="list-group-item list-group-item-action {{ Request::segment(1) == 'users' ? '' : 'bg-light' }}">User Management</a>
    <a href="{{ route('dashboard.users.roles.index') }}" class="list-group-item list-group-item-action {{ Request::segment(2) == 'roles' ? 'active' : 'bg-light' }}">Roles</a>
    <a href="{{ route('dashboard.users.index') }}" class="list-group-item list-group-item-action {{ (Request::segment(1) == 'users' && Request::segment(2) == '') ? 'active' : 'bg-light' }}">Users</a>
    <a href="#" class="list-group-item list-group-item-action bg-light">Expense Management</a>
    <a href="#" class="list-group-item list-group-item-action bg-light">Expense Categories</a>
    <a href="#" class="list-group-item list-group-item-action bg-light">Expenses</a>
  </div>
</div>