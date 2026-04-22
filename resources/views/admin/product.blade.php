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
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img class="table-thumb" src="https://images.unsplash.com/photo-1496747611176-843222e1e57c?auto=format&fit=crop&w=120&q=80" alt="Linen Wrap Dress"></td>
                                <td>Linen Wrap Dress</td>
                                <td>$89</td>
                                <td>62 pcs</td>
                                <td>Dresses</td>
                                <td><span class="table-actions"><a class="icon-action edit-icon" href="{{ url('/admin/product/edit') }}" aria-label="Update Linen Wrap Dress">&#9998;</a><button class="icon-action" type="button" aria-label="More actions">&#8942;</button></span></td>
                            </tr>
                            <tr>
                                <td><img class="table-thumb" src="https://images.unsplash.com/photo-1523398002811-999ca8dec234?auto=format&fit=crop&w=120&q=80" alt="Denim Work Jacket"></td>
                                <td>Denim Work Jacket</td>
                                <td>$118</td>
                                <td>84 pcs</td>
                                <td>Outerwear</td>
                                <td><span class="table-actions"><a class="icon-action edit-icon" href="{{ url('/admin/product/edit') }}" aria-label="Update Denim Work Jacket">&#9998;</a><button class="icon-action" type="button" aria-label="More actions">&#8942;</button></span></td>
                            </tr>
                            <tr>
                                <td><img class="table-thumb" src="https://images.unsplash.com/photo-1503342217505-b0a15ec3261c?auto=format&fit=crop&w=120&q=80" alt="Tailored Soft Blouse"></td>
                                <td>Tailored Soft Blouse</td>
                                <td>$64</td>
                                <td>21 pcs</td>
                                <td>Essentials</td>
                                <td><span class="table-actions"><a class="icon-action edit-icon" href="{{ url('/admin/product/edit') }}" aria-label="Update Tailored Soft Blouse">&#9998;</a><button class="icon-action" type="button" aria-label="More actions">&#8942;</button></span></td>
                            </tr>
                            <tr>
                                <td><img class="table-thumb" src="https://images.unsplash.com/photo-1543076447-215ad9ba6923?auto=format&fit=crop&w=120&q=80" alt="Street Hoodie"></td>
                                <td>Street Hoodie</td>
                                <td>$72</td>
                                <td>0 pcs</td>
                                <td>Streetwear</td>
                                <td><span class="table-actions"><a class="icon-action edit-icon" href="{{ url('/admin/product/edit') }}" aria-label="Update Street Hoodie">&#9998;</a><button class="icon-action" type="button" aria-label="More actions">&#8942;</button></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </section>
@endsection
