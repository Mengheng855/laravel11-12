@extends('layout.master')

@section('title', 'Users | Threadline Admin')
@section('body_class', 'admin-page')
@section('hide_header', true)
@section('hide_footer', true)

@push('styles')
@include('admin.partials.styles')
@endpush

@section('content')
<section class="admin-shell">
    @include('admin.partials.sidebar', ['active' => 'user'])

    <main class="admin-content">
        <div class="admin-topbar">
            <div>
                <h1>User Management</h1>
                <p>Manage customers, admins, permissions, and recent member activity.</p>
            </div>
            <div class="admin-actions">
                <button class="admin-btn soft" type="button">&#9881; Role</button>
                <button class="admin-btn" type="button">+ Add User</button>
            </div>
        </div>

        <div class="stat-grid">
            <article class="stat-card"><span>Total Users</span><strong>1.2k</strong></article>
            <article class="stat-card"><span>Customers</span><strong>986</strong></article>
            <article class="stat-card"><span>Admins</span><strong>12</strong></article>
            <article class="stat-card"><span>New Today</span><strong>38</strong></article>
        </div>

        <section class="admin-panel">
            <div class="panel-header">
                <h2>Recent Users</h2>
                <input class="search-box" type="search" placeholder="Search user" aria-label="Search user">
            </div>

            <div class="table-scroll">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                        <tr>
                            <td>{{ $d['id'] }}</td>
                            <td>{{ $d['name'] }}</td>
                            <td>{{ $d['email'] }}</td>
                            <td>{{ $d['is_admin']?'admin':'user'  }}</td>
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