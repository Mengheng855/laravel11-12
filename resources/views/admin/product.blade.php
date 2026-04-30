@extends('layout.master')

@section('title', 'Products | Threadline Admin')
@section('body_class', 'admin-page')
@section('hide_header', true)
@section('hide_footer', true)

@push('styles')
@include('admin.partials.styles')
@endpush

@section('content')
<section class="admin-shell">
    @include('admin.partials.sidebar', ['active' => 'product'])

    <main class="admin-content">
        <div class="admin-topbar">
            <div>
                <h1>Product Management</h1>
                <p>Track clothing stock, prices, categories, and best selling items.</p>
            </div>
            <div class="admin-actions">
                <button class="admin-btn soft" type="button">&#9881; Filter</button>
                <a class="admin-btn" href="{{ url('/admin/product/add') }}">+ Add Product</a>
            </div>
        </div>

        <div class="stat-grid">
            <article class="stat-card"><span>Total Products</span><strong>280</strong></article>
            <article class="stat-card"><span>Active Items</span><strong>246</strong></article>
            <article class="stat-card"><span>Low Stock</span><strong>18</strong></article>
            <article class="stat-card"><span>Revenue</span><strong>$42k</strong></article>
        </div>

        <section class="admin-panel">
            <div class="panel-header">
                <div>
                    <h2>Product Data</h2>
                    <p class="muted">Product image, price, quantity, and category.</p>
                </div>
                <input class="search-box" type="search" placeholder="Search product" aria-label="Search product">
            </div>

            <div class="table-scroll">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th>Category</th>
                            <th>Created BY</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                        <tr>
                            <td>{{ $d['id'] }}</td>
                            <td>
                                <img src="{{ $d['image'] }}" width="40px" walt="">
                            </td>
                            <td>{{ $d['pro_name'] }}</td>
                            <td>{{ $d['price'] }}</td>
                            <td>{{ $d['stock'] }}</td>
                            <td>{{ $d['stock']*$d['price'] }}</td>
                            <td>{{ $d->category->cate_name }}</td>
                            <td>{{ $d->user->name }}</td>
                            <td>
                                <span class="table-actions">
                                    <a class="icon-action edit-icon"
                                        href="{{ url('/admin/product/' . $d['id'] . '/edit') }}"
                                        aria-label="Update Denim Work Jacket">
                                        &#9998;
                                    </a>
                                    <a href="{{ url('/admin/product/' . $d['id'] . '/deleteProduct')}}"
                                        onclick="return confirm('Are you sure?')"
                                        class="icon-action" type="button" aria-label="More actions">
                                        &#128465;
                                    </a>
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</section>
@endsection