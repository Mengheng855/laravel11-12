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
                                <th>User</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Orders</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span class="table-item"><img class="avatar" src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=100&q=80" alt=""> Jacob Jones</span></td>
                                <td>jacob@example.com</td>
                                <td>Customer</td>
                                <td>18</td>
                                <td><span class="badge green">Active</span></td>
                                <td><span class="table-actions"><button class="icon-action" type="button">&#9998;</button><button class="icon-action" type="button">&#8942;</button></span></td>
                            </tr>
                            <tr>
                                <td><span class="table-item"><img class="avatar" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=100&q=80" alt=""> Samuel Ethan</span></td>
                                <td>samuel@example.com</td>
                                <td>Admin</td>
                                <td>4</td>
                                <td><span class="badge blue">Staff</span></td>
                                <td><span class="table-actions"><button class="icon-action" type="button">&#9998;</button><button class="icon-action" type="button">&#8942;</button></span></td>
                            </tr>
                            <tr>
                                <td><span class="table-item"><img class="avatar" src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=100&q=80" alt=""> Annette Black</span></td>
                                <td>annette@example.com</td>
                                <td>Customer</td>
                                <td>27</td>
                                <td><span class="badge green">Active</span></td>
                                <td><span class="table-actions"><button class="icon-action" type="button">&#9998;</button><button class="icon-action" type="button">&#8942;</button></span></td>
                            </tr>
                            <tr>
                                <td><span class="table-item"><span class="avatar" style="display:grid;place-items:center;color:#c96d38;font-weight:800;">E</span> Eleanor Pena</span></td>
                                <td>eleanor@example.com</td>
                                <td>Customer</td>
                                <td>9</td>
                                <td><span class="badge">Pending</span></td>
                                <td><span class="table-actions"><button class="icon-action" type="button">&#9998;</button><button class="icon-action" type="button">&#8942;</button></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </section>
@endsection
