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
                                <th>Created by</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $d['id'] }}</td>
                                    <td>
                                        <img src="{{ $d['image'] }}" width="40px" alt="">
                                    </td>
                                    <td>{{ $d['cate_name'] }}</td>
                                    <td>{{ $d->user->name }}</td>
                                    <td>{{ $d['created_at'] }}</td>
                                    <td>{{ $d['updated_at'] }}</td>
                                    <td><span class="table-actions"><a class="icon-action edit-icon" href="{{ url('/admin/product/edit') }}" aria-label="Update Denim Work Jacket">&#9998;</a><button class="icon-action" type="button" aria-label="More actions">&#8942;</button></span></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </section>
@endsection
