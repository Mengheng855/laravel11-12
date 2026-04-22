<aside class="admin-sidebar">
    <a class="admin-logo" href="{{ url('/admin/dashboard') }}" aria-label="Threadline admin dashboard">
        <span class="admin-logo-mark">TS</span>
        <span>Threadline</span>
    </a>

    <nav aria-label="Admin menu">
        <p class="side-title">Menu</p>
        <div class="side-menu">
            <a class="side-link {{ ($active ?? '') === 'dashboard' ? 'active' : '' }}" href="{{ url('/admin/dashboard') }}"><span class="side-icon">&#9638;</span> Overview</a>
            <a class="side-link {{ ($active ?? '') === 'product' ? 'active' : '' }}" href="{{ url('/admin/product') }}"><span class="side-icon">&#9634;</span> Product</a>
            <a class="side-link {{ ($active ?? '') === 'addProduct' ? 'active' : '' }}" href="{{ url('/admin/product/add') }}"><span class="side-icon">&#8862;</span> Add Product</a>
            <a class="side-link {{ ($active ?? '') === 'category' ? 'active' : '' }}" href="{{ url('/admin/category') }}"><span class="side-icon">&#9635;</span> Category</a>
            <a class="side-link {{ ($active ?? '') === 'addCategory' ? 'active' : '' }}" href="{{ url('/admin/category/add') }}"><span class="side-icon">&#10010;</span> Add Category</a>
            <a class="side-link {{ ($active ?? '') === 'user' ? 'active' : '' }}" href="{{ url('/admin/user') }}"><span class="side-icon">&#9783;</span> User</a>
            <a class="side-link" href="#"><span class="side-icon">&#9993;</span> Message</a>
            <a class="side-link" href="#"><span class="side-icon">&#9881;</span> Setting</a>
        </div>
    </nav>

</aside>
