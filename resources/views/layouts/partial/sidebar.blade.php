<div class="list-group">
    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action {{ Request::is('dashboard') ? 'active' : '' }}">Dashboard</a>
    <a href="{{ route('category.index') }}" class="list-group-item list-group-item-action {{ Request::routeIs('category*') ? 'active' : '' }}">Category</a>
    <a href="{{ route('blog.index') }}" class="list-group-item list-group-item-action {{ Request::routeIs('blog*') ? 'active' : '' }}">Blog</a>
    <a href="#" class="list-group-item list-group-item-action disabled">User List</a>
</div>
