<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amikom Event Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .hero-section { background: linear-gradient(135deg, #6f42c1, #43227a); color: white; padding: 60px 0; }
        .card-event { transition: transform 0.2s; border: none; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); }
        .card-event:hover { transform: translateY(-5px); }
        .badge-category { background-color: #e9ecef; color: #6f42c1; font-weight: 600; text-decoration: none; display: inline-block; transition: all 0.2s; }
        .badge-category:hover { background-color: #6f42c1; color: white !important; }
        .badge-active { background-color: #6f42c1 !important; color: white !important; }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('landing') }}">AmikomEventHub</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('landing') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary btn-sm text-white ms-2 px-3 fw-bold" href="{{ route('admin.orders') }}">🔒 Menu Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="hero-section text-center">
        <div class="container">
            <h1 class="display-4 fw-bold">Selamat Datang di Amikom Event Hub</h1>
            <p class="lead">Temukan berbagai seminar IT, workshop design, dan hiburan menarik di sini.</p>
        </div>
    </header>

    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert">
                🎉 <strong>Sukses!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <div class="container my-5">
        
        <h3 class="mb-4 fw-bold text-secondary">Kategori Pilihan</h3>
        <div class="d-flex gap-2 mb-5 overflow-auto pb-2">
            <a href="{{ route('landing') }}" class="badge badge-category px-4 py-2 rounded-pill fs-6 shadow-sm {{ !$categoryId ? 'badge-active' : '' }}">
                🌐 Semua Event
            </a>
            
            @foreach ($categories as $category)
                <a href="{{ route('landing', ['category_id' => $category->id]) }}" 
                   class="badge badge-category px-4 py-2 rounded-pill fs-6 shadow-sm {{ $categoryId == $category->id ? 'badge-active' : '' }}">
                    📂 {{ $category->name }}
                </a>
            @endforeach
        </div>

        <h3 class="mb-4 fw-bold text-dark">Daftar Event Mendatang</h3>
        <div class="row g-4">
            @forelse($events as $event)
                <div class="col-md-4">
                    <div class="card h-100 card-event">
                        <div class="card-body d-flex flex-column">
                            <span class="text-muted small mb-2 d-block">📅 {{ date('d M Y, H:i', strtotime($event->date)) }}</span>
                            <h5 class="card-title fw-bold text-primary mb-2">{{ $event->title }}</h5>
                            <p class="card-text text-secondary flex-grow-1">{{ Str::limit($event->description, 100) }}</p>
                            
                            <hr class="text-muted">
                            <div class="mb-3">
                                <div class="small text-muted">📍 Lokasi:</div>
                                <div class="fw-semibold text-dark">{{ $event->location }}</div>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mt-auto mb-3">
                                <span class="fw-bold text-success fs-5">Rp {{ number_format($event->price, 0, ',', '.') }}</span>
                                <span class="badge bg-warning text-dark">Sisa: {{ $event->stock }} Tiket</span>
                            </div>

                            <a href="{{ route('event.detail', $event->id) }}" class="btn btn-outline-primary w-100">
                                Lihat Detail Event
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted fs-5">Belum ada data event untuk kategori ini.</p>
                </div>
            @endforelse
        </div>

        <hr class="my-5 text-muted">
        <h3 class="mb-4 fw-bold text-dark text-center">🤝 Partner Kerja Sama</h3>
        <div class="row justify-content-center text-center g-4 mb-5">
            @forelse($partners as $partner)
                <div class="col-6 col-md-2">
                    <div class="p-3 bg-white rounded shadow-sm border h-100 d-flex flex-column align-items-center justify-content-center">
                        <img src="{{ $partner->logo_url }}" alt="{{ $partner->name }}" class="img-fluid mb-2" style="max-height: 50px; object-fit: contain;">
                        <div class="small fw-bold text-secondary">{{ $partner->name }}</div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-3">
                    <p class="text-muted small">Belum ada partner resmi terdaftar.</p>
                </div>
            @endforelse
        </div>

    </div> <footer class="bg-dark text-white text-center py-4 mt-5">
        <p class="mb-0">&copy; 2026 24.12.3249  - Universitas AMIKOM Yogyakarta</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>