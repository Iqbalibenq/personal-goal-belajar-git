<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Daftar Orderan Tiket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('landing') }}">AmikomEventHub - Admin</a>
            <a href="{{ route('landing') }}" class="btn btn-outline-light btn-sm">Lihat Website</a>
        </div>
    </nav>

    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-dark">Data Pendaftaran Tiket Masuk</h2>
            <span class="badge bg-primary fs-6">Total: {{ $transactions->count() }} Orderan</span>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-striped mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th class="ps-3">Order ID</th>
                                <th>Nama Pendaftar</th>
                                <th>Email</th>
                                <th>Nomor HP</th>
                                <th>Event Yang Dibeli</th>
                                <th>Total Bayar</th>
                                <th class="pe-3">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($transactions as $tx)
                                <tr>
                                    <td class="fw-bold text-primary ps-3">{{ $tx->order_id }}</td>
                                    <td>{{ $tx->customer_name }}</td>
                                    <td>{{ $tx->customer_email }}</td>
                                    <td>{{ $tx->customer_phone }}</td>
                                    <td><span class="badge bg-secondary">{{ $tx->event->title ?? 'Event Dihapus' }}</span></td>
                                    <td class="fw-bold text-success">Rp {{ number_format($tx->total_price, 0, ',', '.') }}</td>
                                    <td class="pe-3"><span class="badge bg-success">{{ $tx->status }}</span></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-5 text-muted">Belum ada data tiket yang terjual atau diorder.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>
</html>