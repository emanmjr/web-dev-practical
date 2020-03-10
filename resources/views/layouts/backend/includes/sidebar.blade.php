
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">Welcome, {{ Auth::user()->name }}</div>
        <div class="list-group list-group-flush">
            <a href="{{ route('home') }}" class="list-group-item list-group-item-action {{ Request::segment(1) == 'dashboard' ? 'active' : 'bg-light' }}" style="text-decoration: underline;">Dashboard</a>
            @if(auth()->user()->userRole->id == 1)
                
                <a href="#" style="text-decoration: underline;" class="list-group-item list-group-item-action {{ Request::segment(1) == 'users' ? '' : 'bg-light' }}">User Management</a>
                <a href="{{ route('dashboard.users.roles.index') }}" class="list-group-item list-group-item-action {{ Request::segment(2) == 'roles' ? 'active' : 'bg-light' }}">Roles</a>
                <a href="{{ route('dashboard.users.index') }}" class="list-group-item list-group-item-action {{ (Request::segment(1) == 'users' && Request::segment(2) == '') ? 'active' : 'bg-light' }}">Users</a>
            @endif
            <a href="#" class="list-group-item list-group-item-action {{ Request::segment(1) == 'expenses' ? '' : 'bg-light' }}" style="text-decoration: underline;">Expense Management</a>
            @if(auth()->user()->userRole->id == 1)
                <a href="{{ route('dashboard.expense.category.index') }}" class="list-group-item list-group-item-action {{ Request::segment(2) == 'category' ? 'active' : 'bg-light' }}">Expense Categories</a>
            @endif
            @if(auth()->user()->userRole->id != 1 || auth()->user()->userRole->id == 1)
                <a href="{{ route('dashboard.expense.index') }}" class="list-group-item list-group-item-action {{ (Request::segment(1) == 'expenses' && Request::segment(2) == '') ? 'active' : 'bg-light' }}">Expenses</a>
            @endif
        </div>
    </div>