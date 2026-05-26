<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Event - {{ $event->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .event-header { background-color: #6f42c1; color: white; padding: 40px 0; mb-4; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('landing') }}">AmikomEventHub</a>
        </div>
    </nav>

    <div class="event-header text-center mb-5">
        <div class="container">
            <span class="badge bg-light text-dark mb-2">🎟️ Detail Event Resmi</span>
            <h1 class="fw-bold">{{ $event->title }}</h1>
        </div>
    </div>

    <div class="container my-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card p-4 shadow-sm border-0 mb-4">
                    <h4 class="fw-bold text-secondary mb-3">Deskripsi Event</h4>
                    <p class="fs-5 text-dark" style="line-height: 1.8;">{{ $event->description }}</p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card p-4 shadow-sm border-0 bg-white">
                    <h5 class="fw-bold mb-4 text-dark">Informasi Pelaksanaan</h5>
                    
                    <div class="mb-3">
                        <small class="text-muted d-block">Tanggal & Waktu:</small>
                        <strong class="text-dark">📅 {{ date('d F Y, H:i', strtotime($event->date)) }} WIB</strong>
                    </div>

                    <div class="mb-3">
                        <small class="text-muted d-block">Tempat Pelaksanaan:</small>
                        <strong class="text-dark">📍 {{ $event->location }}</strong>
                    </div>

                    <div class="mb-4">
                        <small class="text-muted d-block">Harga Tiket Masuk:</small>
                        <strong class="text-success fs-4">Rp {{ number_format($event->price, 0, ',', '.') }}</strong>
                        <span class="text-muted small d-block">Sisa Kuota: {{ $event->stock }} Kursi</span>
                    </div>

                    <a href="{{ route('event.register', $event->id) }}" class="btn btn-purple btn-primary w-100 py-2 fw-bold">
                        Daftar & Beli Tiket Sekarang
                    </a>
                    
                    <a href="{{ route('landing') }}" class="btn btn-light w-100 mt-2 btn-sm text-muted">
                        Back to Home
                    </a>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-4 mt-5">
        <p class="mb-0">&copy; 2026 NIM Kamu - Universitas AMIKOM Yogyakarta</p>
    </footer>

</body>
</html>