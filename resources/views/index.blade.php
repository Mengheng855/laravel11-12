<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Product Table</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .card {
            border: none;
            border-radius: 20px;
        }

        .card-header {
            background: linear-gradient(90deg, #00c6ff, #0072ff);
            color: white;
            font-size: 22px;
            font-weight: bold;
            text-align: center;
            border-radius: 20px 20px 0 0 !important;
        }

        .table img {
            width: 55px;
            height: 55px;
            object-fit: cover;
            border-radius: 12px;
        }

        .price-badge {
            font-size: 14px;
            padding: 6px 12px;
            border-radius: 20px;
        }

        .btn-custom {
            border-radius: 50px;
            padding: 5px 14px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="card shadow-lg">
            <div class="card-header">
                🛍 Premium Product List
            </div>

            <div class="card-body">

                <div class="d-flex justify-content-between mb-4">
                    <h5 class="fw-bold">All Products</h5>
                    <button type="button" id="add" class="btn btn-primary rounded-pill px-4"
                        data-bs-toggle="modal" data-bs-target="#productModal">
                        + Add Product
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle text-center">

                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $d)    
                            <tr>
                                <td>{{ $d['id'] }}</td>
                                <td><img src="{{ $d['image'] }}"></td>
                                <td class="fw-semibold">{{ $d['name'] }}</td>
                                <td><span class="badge bg-success price-badge">${{ $d['price'] }}</span></td>
                                <td><span class="badge bg-primary">{{ $d['qty'] }}</span></td>
                                <td>
                                    <button class="btn btn-warning btn-sm btn-custom" id="edit" data-bs-toggle="modal" data-bs-target="#productModal">Edit</button>
                                    <button class="btn btn-danger btn-sm btn-custom">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="productModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 rounded-4 shadow-lg">

                <div class="modal-header bg-primary text-white rounded-top-4">
                    <h5 id="title" class="modal-title fw-bold">🛍 Add New Product</h5>
                    <button type="button" class="btn-close btn-close-white"
                        data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body p-4">

                    <form id="form" action="{{ url('insert') }}" method="post" enctype="multipart/form-data">
                        <div class="row">
                            @csrf
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Product Name</label>
                                <input type="text" class="form-control rounded-3" name="name" id="name"
                                    placeholder="Enter product name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Price ($)</label>
                                <input type="number" class="form-control rounded-3" name="price" id="price"
                                    placeholder="Enter price">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Quantity</label>
                                <input type="number" class="form-control rounded-3" name="qty" id="qty"
                                    placeholder="Enter quantity">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Product Image</label>
                                <input type="file" class="form-control rounded-3" name="image">
                            </div>
                        </div>
                </div>
                <div class="modal-footer border-0 px-4 pb-4">
                    <button type="button"
                        class="btn btn-light rounded-pill px-4"
                        data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" id="save"
                        class="btn btn-primary rounded-pill px-4">
                        Save
                    </button>
                    <button type="submit" id="update"
                        class="btn btn-warning rounded-pill px-4">
                        Update
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<script>
    $(document).ready(function(){
        $('#add').click(function(){
            $('#update').hide()
            $('#save').show()
            $('#title').text('Add Product')
            $('#form').attr('action',`{{ url('insert') }}`)
            $('#form')[0].reset()

        })
        $(document).on('click','#edit',function(){
            $('#update').show()
            $('#save').hide()
            $('#title').text('Update Product')
            const row=$(this).closest('tr')
            const id=row.find('td:eq(0)').text().trim()
            const name=row.find('td:eq(2)').text().trim()
            const price=row.find('td:eq(3)').text().trim().slice(1)
            const qty=row.find('td:eq(4)').text().trim()
            console.log(price);
            
            $('#name').val(name)
            $('#price').val(price)
            $('#qty').val(qty)
            $('#form').attr('action',`{{ url('update/${id}') }}`)
        })
    })
</script>