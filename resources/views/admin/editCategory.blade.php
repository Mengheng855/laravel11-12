@extends('layout.master')

@section('title', 'Update Category | Threadline Admin')
@section('body_class', 'admin-page')
@section('hide_header', true)
@section('hide_footer', true)

@push('styles')
    @include('admin.partials.styles')
    <style>
        .simple-category-form {
            width: 100%;
        }

        .simple-category-form .form-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .simple-category-form input[type="file"] {
            min-height: 54px;
            padding: 8px;
            border: 1px dashed rgba(31, 29, 25, .18);
            border-radius: 12px;
            background: #fffaf2;
            color: #6f6a60;
            font-size: .95rem;
            cursor: pointer;
        }

        .simple-category-form input[type="file"]::file-selector-button {
            min-height: 38px;
            margin-right: 14px;
            padding: 0 16px;
            border: 0;
            border-radius: 9px;
            background: #1f1d19;
            color: #fff;
            font: inherit;
            font-weight: 800;
            cursor: pointer;
        }

        .simple-category-form input[type="file"]::file-selector-button:hover {
            background: #c96d38;
        }

        .simple-category-form .form-actions {
            justify-content: flex-end;
        }

        @media (max-width: 640px) {
            .simple-category-form .form-grid {
                grid-template-columns: 1fr;
            }

            .simple-category-form .form-actions {
                justify-content: stretch;
            }

            .simple-category-form .form-actions .admin-btn {
                flex: 1;
            }
        }
    </style>
@endpush

@section('content')
    <section class="admin-shell">
        @include('admin.partials.sidebar', ['active' => 'category'])

        <main class="admin-content">
            <div class="admin-topbar">
                <div>
                    <h1>Update Category</h1>
                    <p>Update category name and image.</p>
                </div>
                <div class="admin-actions">
                    <a class="admin-btn soft" href="{{ url('/admin/category') }}">Back</a>
                </div>
            </div>

            <section class="admin-panel simple-category-form">
                <div class="panel-header">
                    <div>
                        <h2>Category Update Form</h2>
                        <p class="muted">Change category information and save updates.</p>
                    </div>
                </div>

                <form class="admin-form" id="edit-category-form">
                    <div class="form-grid">
                        <div class="form-field">
                            <label for="cate-name">Category Name</label>
                            <input id="cate-name" name="cate_name" type="text" value="Dresses">
                        </div>

                        <div class="form-field">
                            <label for="category-image">Image</label>
                            <input id="category-image" name="image" type="file">
                        </div>
                    </div>

                    <div class="form-actions">
                        <button class="admin-btn" type="submit">Update Category</button>
                        <button class="admin-btn soft" type="reset">Clear</button>
                    </div>
                </form>
            </section>
        </main>
    </section>
@endsection
