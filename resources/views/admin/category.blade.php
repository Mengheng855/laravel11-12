@extends('layout.master')

@section('title', 'Categories | Threadline Admin')
@section('body_class', 'admin-page')
@section('hide_header', true)
@section('hide_footer', true)

@push('styles')
    @include('admin.partials.styles')
@endpush

@section('content')
    <section class="admin-shell">
        @include('admin.partials.sidebar', ['active' => 'category'])

        <main class="admin-content">
            <div class="admin-topbar">
                <div>
                    <h1>Category Management</h1>
                    <p>Organize the clothes shop by collections, style moods, and product groups.</p>
                </div>
                <div class="admin-actions">
                    <button class="admin-btn soft" type="button">&#9881; Sort</button>
                    <a class="admin-btn" href="{{ url('/admin/category/add') }}">+ Add Category</a>
                </div>
            </div>

            <div class="stat-grid">
                <article class="stat-card"><span>Total Categories</span><strong>42</strong></article>
                <article class="stat-card"><span>Featured</span><strong>8</strong></article>
                <article class="stat-card"><span>Hidden</span><strong>3</strong></article>
                <article class="stat-card"><span>Products Linked</span><strong>280</strong></article>
            </div>

            <section class="admin-panel">
                <div class="panel-header">
                    <div>
                        <h2>Category Data</h2>
                        <p class="muted">Current category list with image and name.</p>
                    </div>
                    <input class="search-box" type="search" placeholder="Search category" aria-label="Search category">
                </div>

                <div class="table-scroll">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>CAT-001</td>
                                <td><img class="table-thumb" src="https://images.unsplash.com/photo-1483985988355-763728e1935b?auto=format&fit=crop&w=120&q=80" alt="Dresses category"></td>
                                <td>Dresses</td>
                                <td><span class="table-actions"><a class="icon-action edit-icon" href="{{ url('/admin/category/edit') }}" aria-label="Update Dresses">&#9998;</a><button class="icon-action" type="button" aria-label="More actions">&#8942;</button></span></td>
                            </tr>
                            <tr>
                                <td>CAT-002</td>
                                <td><img class="table-thumb" src="https://images.unsplash.com/photo-1543076447-215ad9ba6923?auto=format&fit=crop&w=120&q=80" alt="Streetwear category"></td>
                                <td>Streetwear</td>
                                <td><span class="table-actions"><a class="icon-action edit-icon" href="{{ url('/admin/category/edit') }}" aria-label="Update Streetwear">&#9998;</a><button class="icon-action" type="button" aria-label="More actions">&#8942;</button></span></td>
                            </tr>
                            <tr>
                                <td>CAT-003</td>
                                <td><img class="table-thumb" src="https://images.unsplash.com/photo-1520975916090-3105956dac38?auto=format&fit=crop&w=120&q=80" alt="Essentials category"></td>
                                <td>Essentials</td>
                                <td><span class="table-actions"><a class="icon-action edit-icon" href="{{ url('/admin/category/edit') }}" aria-label="Update Essentials">&#9998;</a><button class="icon-action" type="button" aria-label="More actions">&#8942;</button></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </section>
@endsection
