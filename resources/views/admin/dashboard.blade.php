@extends('layout.master')

@section('title', 'Admin Dashboard | Threadline Studio')
@section('body_class', 'admin-dashboard-page')
@section('hide_header', true)
@section('hide_footer', true)

@push('styles')
    <style>
        .admin-dashboard-page {
            background: #f6f3ee;
        }

        .admin-dashboard-page main {
            min-height: 100vh;
        }

        .dashboard-shell {
            min-height: 100vh;
            padding: 0;
            color: #1f1d19;
        }

        .dashboard-frame {
            width: 100%;
            min-height: 100vh;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 230px 1fr 310px;
            gap: 26px;
            overflow: hidden;
            border-radius: 0;
            background: #fbfaf7;
            box-shadow: none;
        }

        .admin-sidebar {
            min-height: 100vh;
            padding: 32px 24px;
            display: flex;
            flex-direction: column;
            gap: 34px;
            background: #fffdf8;
            border-right: 1px solid rgba(31, 29, 25, .06);
        }

        .admin-logo {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-weight: 800;
            color: #dd8950;
        }

        .admin-logo-mark,
        .user-avatar,
        .friend-avatar {
            display: grid;
            place-items: center;
            overflow: hidden;
            border-radius: 50%;
            background: #fae0bc;
            color: #c96d38;
            font-weight: 800;
        }

        .admin-logo-mark {
            width: 34px;
            height: 34px;
        }

        .side-title {
            margin: 0 0 14px;
            color: #1f1d19;
            font-size: 1rem;
            font-weight: 800;
        }

        .side-menu {
            display: grid;
            gap: 10px;
        }

        .side-link {
            display: flex;
            align-items: center;
            gap: 12px;
            min-height: 48px;
            padding: 0 16px;
            border-radius: 10px;
            color: #6f6a60;
            font-size: .92rem;
            font-weight: 700;
        }

        .side-link.active,
        .side-link:hover {
            background: #ffbd72;
            color: #fff;
            box-shadow: 0 14px 28px rgba(255, 160, 75, .28);
        }

        .side-icon {
            width: 22px;
            text-align: center;
            font-size: 1rem;
        }

        .upgrade-card {
            margin-top: auto;
            padding: 20px;
            border-radius: 18px;
            background: #fff3e3;
        }

        .upgrade-card strong {
            display: block;
            margin-bottom: 8px;
            font-size: .94rem;
        }

        .upgrade-card a {
            color: #dd8950;
            font-size: .88rem;
            font-weight: 800;
        }

        .dashboard-main {
            padding: 36px 0 36px;
        }

        .dashboard-topbar,
        .panel-header,
        .metric-grid,
        .leader-row,
        .schedule-item,
        .friend-row {
            display: flex;
            align-items: center;
        }

        .dashboard-topbar {
            justify-content: space-between;
            gap: 18px;
            margin-bottom: 34px;
        }

        .dashboard-topbar h1 {
            margin: 0 0 6px;
            max-width: none;
            color: #1f1d19;
            font-size: clamp(1.75rem, 3vw, 2.45rem);
            line-height: 1.05;
        }

        .dashboard-topbar p,
        .panel-header p,
        .card-label,
        .small-muted {
            margin: 0;
            color: #a09a90;
            font-size: .88rem;
            line-height: 1.4;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 12px;
            border-radius: 999px;
            background: #fff;
        }

        .user-avatar {
            width: 42px;
            height: 42px;
            background: url("https://images.unsplash.com/photo-1496747611176-843222e1e57c?auto=format&fit=crop&w=120&q=80") center / cover;
        }

        .profile-name {
            display: block;
            font-weight: 800;
            font-size: .94rem;
        }

        .content-grid {
            display: grid;
            gap: 24px;
        }

        .panel-header {
            justify-content: space-between;
            gap: 14px;
            margin-bottom: 16px;
        }

        .panel-header h2 {
            margin: 0;
            color: #1f1d19;
            font-size: 1.1rem;
            line-height: 1.2;
        }

        .filter-button,
        .more-button {
            border: 0;
            background: transparent;
            color: #df7656;
            font: inherit;
            font-weight: 800;
            cursor: pointer;
        }

        .filter-button {
            min-height: 38px;
            padding: 0 16px;
            border-radius: 999px;
            background: #f26661;
            color: #fff;
            box-shadow: 0 12px 26px rgba(242, 102, 97, .26);
        }

        .metric-grid {
            align-items: stretch;
            gap: 18px;
        }

        .metric-card {
            flex: 1;
            min-height: 128px;
            padding: 22px;
            border-radius: 14px;
            color: #fff;
            position: relative;
            overflow: hidden;
        }

        .metric-card::after {
            content: "";
            position: absolute;
            right: -28px;
            bottom: -38px;
            width: 130px;
            height: 130px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .12);
            box-shadow: -30px -24px 0 rgba(255, 255, 255, .08);
        }

        .metric-card.orange {
            background: #ffbd72;
        }

        .metric-card.green {
            background: #34c895;
        }

        .metric-card.blue {
            background: #45abd7;
        }

        .metric-icon {
            width: 26px;
            height: 26px;
            display: grid;
            place-items: center;
            margin-bottom: 16px;
            border-radius: 8px;
            background: rgba(255, 255, 255, .22);
        }

        .metric-value {
            display: block;
            margin-bottom: 2px;
            font-size: 1.8rem;
            font-weight: 900;
        }

        .metric-card .card-label {
            color: rgba(255, 255, 255, .82);
        }

        .insight-grid {
            display: grid;
            grid-template-columns: 1fr 1.25fr;
            gap: 18px;
        }

        .white-card {
            padding: 22px;
            border-radius: 18px;
            background: #fff;
            box-shadow: 0 16px 40px rgba(31, 29, 25, .04);
        }

        .level-card {
            display: grid;
            grid-template-columns: 124px 1fr;
            gap: 18px;
            align-items: center;
        }

        .progress-ring {
            width: 116px;
            height: 116px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: conic-gradient(#2fc7aa 0 78%, #eef0ec 78% 100%);
            position: relative;
            font-size: 1.4rem;
            font-weight: 900;
        }

        .progress-ring::before {
            content: "";
            position: absolute;
            inset: 12px;
            border-radius: 50%;
            background: #fff;
        }

        .progress-ring span {
            position: relative;
        }

        .detail-list {
            display: grid;
            gap: 9px;
            color: #6f6a60;
            font-size: .9rem;
        }

        .detail-dot {
            display: inline-block;
            width: 9px;
            height: 9px;
            margin-right: 8px;
            border-radius: 50%;
        }

        .hours-card {
            display: grid;
            grid-template-columns: 130px 1fr;
            gap: 20px;
            align-items: end;
        }

        .hours-value {
            display: block;
            margin: 8px 0;
            font-size: 2rem;
            font-weight: 900;
        }

        .bar-chart {
            height: 126px;
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 10px;
        }

        .bar {
            width: 100%;
            min-width: 20px;
            border-radius: 8px 8px 0 0;
            background: #f8dcc2;
        }

        .bar.active {
            background: #ffbd72;
        }

        .bar span {
            display: block;
            transform: translateY(22px);
            color: #aaa298;
            font-size: .78rem;
            text-align: center;
        }

        .leaderboard {
            padding: 24px;
            border-radius: 20px;
            background: #fff;
        }

        .leader-table {
            display: grid;
            gap: 4px;
        }

        .leader-row {
            display: grid;
            grid-template-columns: 70px 1.4fr 1.2fr 1fr;
            gap: 18px;
            min-height: 52px;
            padding: 0 14px;
            border-radius: 10px;
            color: #4d4942;
            font-size: .9rem;
        }

        .leader-row.header {
            min-height: 38px;
            color: #b0a89d;
            font-size: .72rem;
            font-weight: 800;
            text-transform: uppercase;
        }

        .leader-row:not(.header):hover,
        .leader-row.highlight {
            background: #fff0dc;
        }

        .member {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
        }

        .member img {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            object-fit: cover;
        }

        .dashboard-aside {
            padding: 36px 26px 36px 0;
            display: grid;
            align-content: start;
            gap: 26px;
        }

        .aside-card {
            padding: 22px;
            border-radius: 20px;
            background: #fff;
        }

        .schedule-list,
        .friend-list {
            display: grid;
            gap: 18px;
        }

        .schedule-item {
            gap: 16px;
        }

        .schedule-icon {
            width: 60px;
            height: 60px;
            display: grid;
            place-items: center;
            flex: 0 0 auto;
            border-radius: 12px;
            background: #ffbd72;
            color: #fff;
            font-size: 1.35rem;
        }

        .schedule-item h3 {
            margin: 0 0 4px;
            font-size: 1rem;
        }

        .friend-row {
            justify-content: space-between;
            gap: 14px;
        }

        .friend-info {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 700;
            font-size: .92rem;
        }

        .friend-avatar {
            width: 34px;
            height: 34px;
            object-fit: cover;
        }

        .send-link {
            color: #ffbd72;
            font-weight: 900;
        }

        @media (max-width: 1180px) {
            .dashboard-frame {
                grid-template-columns: 210px 1fr;
            }

            .dashboard-aside {
                grid-column: 1 / -1;
                padding: 0 26px 36px;
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 820px) {
            .dashboard-shell {
                padding: 14px;
            }

            .dashboard-frame,
            .insight-grid,
            .dashboard-aside {
                grid-template-columns: 1fr;
            }

            .admin-sidebar {
                min-height: auto;
            }

            .side-menu {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .dashboard-main {
                padding: 0 22px 22px;
            }

            .metric-grid {
                flex-direction: column;
            }

            .leader-row {
                grid-template-columns: 46px 1fr;
                gap: 8px 12px;
                padding: 12px;
            }

            .leader-row.header {
                display: none;
            }
        }

        @media (max-width: 560px) {
            .side-menu,
            .level-card,
            .hours-card {
                grid-template-columns: 1fr;
            }

            .dashboard-topbar {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
@endpush

@section('content')
    <section class="dashboard-shell">
        <div class="dashboard-frame">
            <aside class="admin-sidebar">
                <a class="admin-logo" href="{{ url('/admin/dashboard') }}" aria-label="Threadline admin dashboard">
                    <span class="admin-logo-mark">TS</span>
                    <span>Threadline</span>
                </a>

                <nav aria-label="Admin menu">
                    <p class="side-title">Menu</p>
                    <div class="side-menu">
                        <a class="side-link active" href="{{ url('/admin/dashboard') }}"><span class="side-icon">&#9638;</span> Overview</a>
                        <a class="side-link" href="{{ url('/admin/product') }}"><span class="side-icon">&#9634;</span> Product</a>
                        <a class="side-link" href="{{ url('/admin/product/add') }}"><span class="side-icon">&#8862;</span> Add Product</a>
                        <a class="side-link" href="{{ url('/admin/category') }}"><span class="side-icon">&#9635;</span> Category</a>
                        <a class="side-link" href="{{ url('/admin/category/add') }}"><span class="side-icon">&#10010;</span> Add Category</a>
                        <a class="side-link" href="{{ url('/admin/user') }}"><span class="side-icon">&#9783;</span> User</a>
                        <a class="side-link" href="#"><span class="side-icon">&#9993;</span> Message</a>
                        <a class="side-link" href="#"><span class="side-icon">&#9881;</span> Setting</a>
                    </div>
                </nav>


            </aside>

            <section class="dashboard-main">
                <div class="dashboard-topbar">
                    <div>
                        <h1>Good morning, Admin</h1>
                        <p>Welcome back, here is your clothing store overview.</p>
                    </div>
                    <div class="admin-profile">
                        <span class="user-avatar" aria-hidden="true"></span>
                        <div>
                            <span class="profile-name">Jon Pantau</span>
                            <p class="small-muted">Store Manager</p>
                        </div>
                    </div>
                </div>

                <div class="content-grid">
                    <div>
                        <div class="panel-header">
                            <h2>Overview</h2>
                            <button class="filter-button" type="button">Today</button>
                        </div>

                        <div class="metric-grid">
                            <article class="metric-card orange">
                                <span class="metric-icon">&#9636;</span>
                                <span class="metric-value">280</span>
                                <p class="card-label">Products</p>
                            </article>
                            <article class="metric-card green">
                                <span class="metric-icon">&#9672;</span>
                                <span class="metric-value">42</span>
                                <p class="card-label">Categories</p>
                            </article>
                            <article class="metric-card blue">
                                <span class="metric-icon">&#8645;</span>
                                <span class="metric-value">1250</span>
                                <p class="card-label">Orders</p>
                            </article>
                        </div>
                    </div>

              

                    <section class="leaderboard">
                        <div class="panel-header">
                            <h2>Product Leaderboard</h2>
                            <button class="filter-button" type="button">Today</button>
                        </div>
                        <div class="leader-table">
                            <div class="leader-row header">
                                <span>Ranking</span>
                                <span>Product</span>
                                <span>Category</span>
                                <span>Sales</span>
                            </div>
                            <div class="leader-row highlight">
                                <span>1</span>
                                <span class="member"><img src="https://images.unsplash.com/photo-1523398002811-999ca8dec234?auto=format&fit=crop&w=100&q=80" alt=""> Denim Jacket</span>
                                <span>Outerwear</span>
                                <strong>5520 pts</strong>
                            </div>
                            <div class="leader-row">
                                <span>2</span>
                                <span class="member"><img src="https://images.unsplash.com/photo-1503342217505-b0a15ec3261c?auto=format&fit=crop&w=100&q=80" alt=""> Soft Blouse</span>
                                <span>Essentials</span>
                                <strong>5140 pts</strong>
                            </div>
                            <div class="leader-row">
                                <span>3</span>
                                <span class="member"><img src="https://images.unsplash.com/photo-1496747611176-843222e1e57c?auto=format&fit=crop&w=100&q=80" alt=""> Linen Dress</span>
                                <span>Dresses</span>
                                <strong>4780 pts</strong>
                            </div>
                            <div class="leader-row">
                                <span>4</span>
                                <span class="member"><img src="https://images.unsplash.com/photo-1543076447-215ad9ba6923?auto=format&fit=crop&w=100&q=80" alt=""> Street Hoodie</span>
                                <span>Streetwear</span>
                                <strong>4520 pts</strong>
                            </div>
                        </div>
                    </section>
                </div>
            </section>

            <aside class="dashboard-aside">
                <section class="aside-card">
                    <div class="panel-header">
                        <h2>My Schedule</h2>
                        <button class="more-button" type="button">...</button>
                    </div>
                    <div class="schedule-list">
                        <article class="schedule-item">
                            <span class="schedule-icon">&#9636;</span>
                            <div>
                                <h3>Restock Linen Dress</h3>
                                <p class="small-muted">&#128197; August 9, 2026</p>
                            </div>
                        </article>
                        <article class="schedule-item">
                            <span class="schedule-icon">&#9787;</span>
                            <div>
                                <h3>Photo Shoot Review</h3>
                                <p class="small-muted">&#128197; August 11, 2026</p>
                            </div>
                        </article>
                        <article class="schedule-item">
                            <span class="schedule-icon">&#9634;</span>
                            <div>
                                <h3>Update Category Blog</h3>
                                <p class="small-muted">&#128197; August 13, 2026</p>
                            </div>
                        </article>
                    </div>
                </section>

                <section class="aside-card">
                    <div class="panel-header">
                        <h2>Friends</h2>
                        <button class="more-button" type="button">...</button>
                    </div>
                    <div class="friend-list">
                        <div class="friend-row">
                            <span class="friend-info"><img class="friend-avatar" src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80" alt=""> Jacob Jones</span>
                            <a class="send-link" href="#">&#8599;</a>
                        </div>
                        <div class="friend-row">
                            <span class="friend-info"><img class="friend-avatar" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=80&q=80" alt=""> Samuel Ethan</span>
                            <a class="send-link" href="#">&#8599;</a>
                        </div>
                        <div class="friend-row">
                            <span class="friend-info"><span class="friend-avatar">E</span> Eleanor Pena</span>
                            <a class="send-link" href="#">&#8599;</a>
                        </div>
                        <div class="friend-row">
                            <span class="friend-info"><img class="friend-avatar" src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=80&q=80" alt=""> Annette Black</span>
                            <a class="send-link" href="#">&#8599;</a>
                        </div>
                    </div>
                </section>
            </aside>
        </div>
    </section>
@endsection
