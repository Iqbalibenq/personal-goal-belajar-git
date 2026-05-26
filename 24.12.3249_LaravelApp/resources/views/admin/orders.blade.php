<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Data Pendaftaran Tiket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">Amikom Event Hub - Admin Panel</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link text-white me-3" href="/">🏠 Lihat Web Depan</a>
                <a class="nav-link" href="{{ route('admin.categories.index') }}">📂 Kategori</a>
                <a class="nav-link" href="{{ route('admin.partners.index') }}">🤝 Partner</a>
                <a class="nav-link active fw-bold text-primary" href="{{ route('admin.orders') }}">🎫 Tiket Masuk</a>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-dark m-0">Data Pendaftaran Tiket Masuk</h2>
            <span class="badge bg-primary fs-6 px-3 py-2">Total: {{ $transactions->count() }} Orderan</span>
        </div>

        <div class="card shadow-sm border-0 p-4">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark text-white">
                        <tr>
                            <th>Order ID</th>
                            <th>Nama Pendaftar</th>
                            <th>Email</th>
                            <th>Nomor HP</th>
                            <th>Event Yang Dibeli</th>
                            <th>Total Bayar</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transactions as $transaction)
                            <tr>
                                <td class="fw-bold text-primary small">{{ $transaction->order_id }}</td>
                                <td class="fw-semibold">{{ $transaction->customer_name }}</td>
                                <td class="text-muted small">{{ $transaction->customer_email }}</td>
                                <td>{{ $transaction->customer_phone }}</td>
                                <td>
                                    <span class="badge bg-secondary px-2 py-1 small">
                                        {{ $transaction->event->title ?? 'Event Terhapus' }}
                                    </span>
                                </td>
                                <td class="fw-bold text-success">
                                    Rp {{ number_format($transaction->total_price, 0, ',', '.') }}
                                </td>
                                <td class="text-center">
                                    @if(strtolower($transaction->status) == 'success')
                                        <span class="badge bg-success px-3 py-2 fw-bold text-uppercase">Success</span>
                                    @else
                                        <span class="badge bg-warning text-dark px-3 py-2 fw-bold text-uppercase">
                                            {{ $transaction->status }}
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-5 fs-5">
                                    Belum ada data pendaftaran tiket yang masuk.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>