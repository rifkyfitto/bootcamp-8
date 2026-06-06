<footer class="bg-primary text-white mt-5 py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3">
                <h5>Kyyttoo Store</h5>
                <p>Belanja produk berkualitas dengan harga terbaik. Kepuasan pelanggan adalah prioritas kami.</p>
            </div>
            <div class="col-md-4 mb-3 text-center">
                <h5>Link Cepat</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ url('/home') }}" class="text-white text-decoration-none">Home</a></li>
                    <li><a href="{{ url('/products') }}" class="text-white text-decoration-none">Products</a></li>
                    <li><a href="{{ url('/cart') }}" class="text-white text-decoration-none">Cart</a></li>
                </ul>
            </div>
            <div class="col-md-4 mb-3 text-end">
                <h5>Kontak Kami</h5>
                <p>Email: support@kyyttoo.com<br>WhatsApp: +62 812 3456 7890</p>
            </div>
        </div>
        <hr class="bg-light">
        <div class="text-center">
            <p class="mb-0">&copy; {{ date('Y') }} Kyyttoo Store. All rights reserved.</p>
        </div>
    </div>
</footer>