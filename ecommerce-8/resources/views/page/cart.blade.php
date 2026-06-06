@extends('layout.master')

@section('content')
    <h2 class="fw-bold mb-4">🛒 Keranjang Belanja Anda</h2>

    <div class="row">
        <!-- Kolom Kiri: Daftar Barang -->
        <div class="col-lg-8">
            
            @foreach($cartItems as $item)
            <!-- Card Item Keranjang -->
            <div class="card shadow-sm border-0 mb-3 cart-item" data-price="{{ $item['harga'] }}">
                <div class="card-body">
                    <div class="row align-items-center">
                        <!-- Gambar Produk -->
                        <div class="col-md-2 col-4">
                            <img src="{{ $item['image'] }}" class="img-fluid rounded" alt="{{ $item['nama'] }}">
                        </div>
                        
                        <!-- Info Produk -->
                        <div class="col-md-4 col-8">
                            <h5 class="fw-bold mb-1">{{ $item['nama'] }}</h5>
                            <p class="text-muted small mb-2">Kategori: {{ $item['kategori'] }}</p>
                            <h6 class="text-primary fw-bold mb-0 item-price-display">
                                Rp {{ number_format($item['harga'], 0, ',', '.') }}
                            </h6>
                        </div>

                        <!-- Kontrol Kuantitas (+ / -) -->
                        <div class="col-md-3 col-6 mt-3 mt-md-0">
                            <div class="input-group input-group-sm w-75 mx-md-auto">
                                <button class="btn btn-outline-secondary btn-minus" type="button">➖</button>
                                <input type="text" class="form-control text-center fw-bold input-qty" value="{{ $item['qty'] }}" readonly>
                                <button class="btn btn-outline-secondary btn-plus" type="button">➕</button>
                            </div>
                        </div>

                        <!-- Subtotal per Item & Tombol Hapus -->
                        <div class="col-md-3 col-6 mt-3 mt-md-0 text-end">
                            <h6 class="fw-bold mb-2 item-subtotal">Rp 0</h6>
                            <button class="btn btn-sm btn-outline-danger btn-remove">
                                🗑️ Hapus
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <!-- Kolom Kanan: Ringkasan Belanja -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 sticky-top" style="top: 100px; z-index: 1;">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4">Ringkasan Belanja</h5>
                    
                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-muted">Total Harga (<span id="total-items">0</span> barang)</span>
                        <span class="fw-bold" id="summary-price">Rp 0</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-muted">Diskon</span>
                        <span class="text-success fw-bold">- Rp 0</span>
                    </div>
                    
                    <hr>
                    
                    <div class="d-flex justify-content-between mb-4">
                        <span class="fw-bold fs-5">Total Bayar</span>
                        <span class="fw-bold fs-5 text-primary" id="grand-total">Rp 0</span>
                    </div>

                    <button class="btn btn-primary w-100 py-2 fw-bold fs-5">
                        Lanjut ke Pembayaran 🚀
                    </button>
                </div>
            </div>
        </div>
    </div>

<!-- JAVASCRIPT UNTUK INTERAKSI KERANJANG -->
<script>
    // Kode ini akan berjalan setelah seluruh elemen halaman web dimuat
    document.addEventListener('DOMContentLoaded', function() {
        
        // Fungsi untuk merubah format angka biasa ke format Rupiah (Rp 100.000)
        function formatRupiah(angka) {
            return 'Rp ' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        // Fungsi utama untuk menghitung ulang semua total harga
        function hitungTotal() {
            let totalHargaKeseluruhan = 0;
            let totalBarang = 0;
            
            // Ambil semua elemen baris barang di keranjang
            const items = document.querySelectorAll('.cart-item');

            items.forEach(function(item) {
                // Ambil harga asli dari attribute data-price
                const harga = parseInt(item.getAttribute('data-price'));
                // Ambil jumlah barang dari input text
                const qty = parseInt(item.querySelector('.input-qty').value);
                
                // Hitung subtotal per barang (Harga x Jumlah)
                const subtotal = harga * qty;
                
                // Update teks subtotal di baris tersebut
                item.querySelector('.item-subtotal').innerText = formatRupiah(subtotal);
                
                // Tambahkan ke total keseluruhan
                totalHargaKeseluruhan += subtotal;
                totalBarang += qty;
            });

            // Update Ringkasan Belanja di sebelah kanan
            document.getElementById('summary-price').innerText = formatRupiah(totalHargaKeseluruhan);
            document.getElementById('grand-total').innerText = formatRupiah(totalHargaKeseluruhan);
            document.getElementById('total-items').innerText = totalBarang;
        }

        // --- MENGAKTIFKAN TOMBOL-TOMBOL --- //

        // Tombol Tambah (+)
        document.querySelectorAll('.btn-plus').forEach(function(btn) {
            btn.addEventListener('click', function() {
                const input = this.previousElementSibling; // Ambil input qty di sebelahnya
                input.value = parseInt(input.value) + 1;   // Tambah 1
                hitungTotal();                             // Hitung ulang harga
            });
        });

        // Tombol Kurang (-)
        document.querySelectorAll('.btn-minus').forEach(function(btn) {
            btn.addEventListener('click', function() {
                const input = this.nextElementSibling;     // Ambil input qty di sebelahnya
                if(parseInt(input.value) > 1) {            // Jangan sampai minus atau 0
                    input.value = parseInt(input.value) - 1; // Kurangi 1
                    hitungTotal();                           // Hitung ulang harga
                }
            });
        });

        // Tombol Hapus (Tempat sampah)
        document.querySelectorAll('.btn-remove').forEach(function(btn) {
            btn.addEventListener('click', function() {
                // Konfirmasi ke pengguna sebelum menghapus
                if(confirm('Apakah Anda yakin ingin menghapus barang ini?')) {
                    // Hapus elemen card (.cart-item) tersebut dari layar
                    this.closest('.cart-item').remove();
                    hitungTotal(); // Hitung ulang harga setelah barang hilang
                }
            });
        });

        // Jalankan fungsi hitungTotal saat halaman pertama kali dibuka
        hitungTotal();
    });
</script>
@endsection