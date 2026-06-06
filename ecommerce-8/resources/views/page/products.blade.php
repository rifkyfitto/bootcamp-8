@extends ('layout.master')
@section('content')
    <h1>Our Products</h1>
    <p>Discover our latest products and enjoy shopping with us.</p>

        <!-- Section Pencarian dan Filter -->
    <div class="row mb-4 align-items-center">
        <div class="col-md-8 mb-3 mb-md-0">
            <form action="" method="GET">
                <div class="input-group input-group-lg">
                    <input type="text" class="form-control" placeholder="Cari pakaian impianmu..." name="search">
                    <button class="btn btn-dark" type="submit">Cari Produk</button>
                </div>
            </form>
        </div>
        
        <div class="col-md-4">
            <select class="form-select form-select-lg" aria-label="Filter Kategori">
                <option selected>Semua Kategori</option>
                <option value="pria">Pria</option>
                <option value="wanita">Wanita</option>
            </select>
        </div>
    </div>

    <!-- Judul Bagian Produk -->
    <div class="d-flex justify-content-between align-items-center mb-4 mt-5">
        <h3 class="fw-bold m-0">Produk Terbaru</h3>
        <a href="{{ url('/products') }}" class="text-decoration-none text-primary">Lihat Semua</a>
    </div>

    <!-- Section Daftar Produk (Grid Dinamis) -->
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        @foreach($products as $product)
        <div class="col">
            <div class="card h-100 shadow-sm border-0">
                <img src="{{ $product['image'] }}" class="card-img-top" alt="{{ $product['nama'] }}">
                
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold text-truncate">{{ $product['nama'] }}</h5>
                    <h5 class="text-primary fw-bold mb-3">Rp {{ number_format($product['harga'], 0, ',', '.') }}</h5>
                    <p class="card-text text-muted small">{{ $product['deskripsi'] }}</p>
                    
                    <div class="mt-auto d-flex gap-2">
                        <button class="btn btn-outline-secondary w-50">🛒 Keranjang</button>
                        <button class="btn btn-primary w-50">Beli</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- <a href="{{ url('/addProduct') }}" class="btn btn-primary">Add Product</a>
    <hr>
    <div class="alert alert-primary">
        <b>Toko :</b> {{ $nama_toko }} 
        <br>
        <b>Alamat :</b> {{ $alamat_toko }}
        <br>
        <b>Kontak :</b> {{ $kontak_toko }}
        <br>
        <b>Email :</b> {{ $email_toko }}    
    </div> -->

    <!-- <table class="table table-bordered table-striped table-hover table-responsive">
        
        <thead class="header-table">
            <tr>
                <th>Product List</th>
                <th>Price</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Laravel Hoodie</td>
                <td>$59.99</td>
                <td><img src="https://laravel.com/img/merch/hoodie-black.png" alt="Laravel Hoodie" width="100"></td>
                <td>
                    <button class="btn btn-sm btn-primary">Edit</button>
                    <button class="btn btn-sm btn-danger">Delete</button>
                </td>
            </tr>
            <tr>
                <td>Laravel T-Shirt</td>
                <td>$29.99</td>
                <td><img src="https://laravel.com/img/merch/tshirt-black.png" alt="Laravel T-Shirt" width="100"></td>
                <td>
                    <button class="btn btn-sm btn-primary">Edit</button>
                    <button class="btn btn-sm btn-danger">Delete</button>
                </td>
            </tr>
            <tr>
                <td>Laravel Cap</td>
                <td>$24.99</td>
                <td><img src="https://laravel.com/img/merch/cap-black.png" alt="Laravel Cap" width="100"></td>
                <td>
                    <button class="btn btn-sm btn-primary">Edit</button>
                    <button class="btn btn-sm btn-danger">Delete</button>
                </td>
            </tr>
        </tbody>
    </table> -->
@endsection