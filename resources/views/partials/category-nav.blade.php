<!-- resources/views/partials/category-nav.blade.php -->
<ul class="navbar-nav justify-content-end menu-list list-unstyled d-flex gap-md-3 mb-0">
    @foreach($categories as $category)
    <li class="nav-item border-dashed {{ Request::is('category/'.$category->id) ? 'active' : '' }}">
        <a href="{{ route('admin.category.items', $category->id) }}" class="nav-link d-flex align-items-center gap-3 text-dark p-2">
            <svg width="24" height="24" viewBox="0 0 24 24">
                <use xlink:href="#fruits"></use>
            </svg>
            <span>{{ $category->name }}</span>
        </a>
    </li>
    @endforeach
</ul>