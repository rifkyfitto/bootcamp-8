@extends ('layout.master')
@section('content')
    <!-- Hero Section -->
    <div class="p-5 mb-4 bg-light rounded-3 shadow-sm" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1441986300917-64674bd600d8?q=80&w=1200'); background-size: cover; background-position: center; color: white;">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Halo {{ $nama }}! Gaya Baru, Semangat Baru.</h1>
            <p class="col-md-8 fs-4">Temukan koleksi pakaian terbaik dengan kualitas premium hanya di Kyyttoo Store. Diskon hingga 50% untuk koleksi musim ini!</p>
            <a href="{{ url('/products') }}" class="btn btn-primary btn-lg">Belanja Sekarang</a>
        </div>
    </div>

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
@endsection