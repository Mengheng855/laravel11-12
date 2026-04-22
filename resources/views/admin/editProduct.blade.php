@extends('layout.master')

@section('title', 'Update Product | Threadline Admin')
@section('body_class', 'admin-page')
@section('hide_header', true)
@section('hide_footer', true)

@push('styles')
    @include('admin.partials.styles')
    <style>
        .simple-product-form {
            width: 100%;
        }

        .simple-product-form .form-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .simple-product-form input[type="file"] {
            min-height: 54px;
            padding: 8px;
            border: 1px dashed rgba(31, 29, 25, .18);
            border-radius: 12px;
            background: #fffaf2;
            color: #6f6a60;
            font-size: .95rem;
            cursor: pointer;
        }

        .simple-product-form input[type="file"]::file-selector-button {
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

        .simple-product-form input[type="file"]::file-selector-button:hover {
            background: #c96d38;
        }

        .simple-product-form .form-actions {
            justify-content: flex-end;
        }

        @media (max-width: 640px) {
            .simple-product-form .form-grid {
                grid-template-columns: 1fr;
            }

            .simple-product-form .form-actions {
                justify-content: stretch;
            }

            .simple-product-form .form-actions .admin-btn {
                flex: 1;
            }
        }
    </style>
@endpush

@section('content')
    <section class="admin-shell">
        @include('admin.partials.sidebar', ['active' => 'product'])

        <main class="admin-content">
            <div class="admin-topbar">
                <div>
                    <h1>Update Product</h1>
                    <p>Update product name, price, quantity, image, and category.</p>
                </div>
                <div class="admin-actions">
                    <a class="admin-btn soft" href="{{ url('/admin/product') }}">Back</a>
                </div>
            </div>

            <section class="admin-panel simple-product-form">
                <div class="panel-header">
                    <div>
                        <h2>Product Update Form</h2>
                        <p class="muted">Change product information and save updates.</p>
                    </div>
                </div>

                <form class="admin-form" id="edit-product-form">
                    <div class="form-grid">
                        <div class="form-field full">
                            <label for="product-name">Product Name</label>
                            <input id="product-name" name="name" type="text" value="Denim Work Jacket">
                        </div>

                        <div class="form-field">
                            <label for="product-price">Price</label>
                            <input id="product-price" name="price" type="number" value="118">
                        </div>

                        <div class="form-field">
                            <label for="product-qty">Qty</label>
                            <input id="product-qty" name="qty" type="number" value="84">
                        </div>

                        <div class="form-field">
                            <label for="product-category">Category</label>
                            <select id="product-category" name="category">
                                <option>Outerwear</option>
                                <option>Dresses</option>
                                <option>Essentials</option>
                                <option>Streetwear</option>
                            </select>
                        </div>

                        <div class="form-field">
                            <label for="product-image">Image</label>
                            <input id="product-image" name="image" type="file">
                        </div>
                    </div>

                    <div class="form-actions">
                        <button class="admin-btn" type="submit">Update Product</button>
                        <button class="admin-btn soft" type="reset">Clear</button>
                    </div>
                </form>
            </section>
        </main>
    </section>
@endsection
