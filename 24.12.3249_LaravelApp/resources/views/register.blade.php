<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Tiket - {{ $event->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f3f4f6; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('landing') }}">AmikomEventHub</a>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                
                @if ($errors->any())
                    <div class="alert alert-danger mb-3">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card p-4 shadow border-0">
                    <h3 class="fw-bold text-center text-primary mb-2">Form Pendaftaran Tiket</h3>
                    <p class="text-muted text-center small mb-4">Event: <strong>{{ $event->title }}</strong></p>
                    
                    <hr>

                    <form action="{{ route('event.store', $event->id) }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Lengkap Pendaftar</label>
                            <input type="text" class="form-control" name="customer_name" value="{{ old('customer_name') }}" placeholder="Masukkan nama sesuai KTP/KTM" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Alamat Email Aktif</label>
                            <input type="email" class="form-control" name="customer_email" value="{{ old('customer_email') }}" placeholder="contoh@amikom.ac.id" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nomor WhatsApp/Telepon</label>
                            <input type="tel" class="form-control" name="customer_phone" value="{{ old('customer_phone') }}" placeholder="08xxxxxxxxxx" required>
                        </div>

                        <div class="p-3 bg-light rounded mb-4">
                            <div class="d-flex justify-content-between text-muted small">
                                <span>Harga Satuan:</span>
                                <span>Rp {{ number_format($event->price, 0, ',', '.') }}</span>
                            </div>
                            <hr class="my-2">
                            <div class="d-flex justify-content-between fw-bold text-dark fs-5">
                                <span>Total Bayar:</span>
                                <span class="text-success">Rp {{ number_format($event->price, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success w-100 py-2 fw-bold shadow-sm">
                            Konfirmasi & Proses Pembayaran
                        </button>
                        
                        <a href="{{ route('event.detail', $event->id) }}" class="btn btn-link w-100 text-center text-decoration-none text-muted small mt-2">
                            Batal
                        </a>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-4 mt-5">
        <p class="mb-0">&copy; 2026 NIM Kamu - Universitas AMIKOM Yogyakarta</p>
    </footer>

</body>
</html>