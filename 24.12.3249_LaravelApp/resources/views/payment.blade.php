<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selesaikan Pembayaran Tiket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">AmikomEventHub - Invoice Pembayaran</a>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow border-0 p-4">
                    <h4 class="fw-bold text-center text-dark mb-4">Selesaikan Pembayaran Anda</h4>
                    
                    <div class="table-responsive mb-4">
                        <table class="table table-bordered small">
                            <tr>
                                <td class="fw-semibold bg-light">Order ID</td>
                                <td class="fw-bold text-primary">{{ $transaction->order_id }}</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold bg-light">Nama Event</td>
                                <td>{{ $transaction->event->title }}</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold bg-light">Nama Pendaftar</td>
                                <td>{{ $transaction->customer_name }}</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold bg-light">Total Tagihan</td>
                                <td class="fw-bold text-success">Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</td>
                            </tr>
                        </table>
                    </div>

                    <button id="pay-button" class="btn btn-primary w-100 py-3 fw-bold fs-5 shadow-sm mb-2">
                        💳 BAYAR SEKARANG via MIDTRANS
                    </button>

                    <form id="success-form" action="{{ route('event.pay.success', $transaction->id) }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    
                    <p class="text-center text-muted small mt-3">Silakan klik tombol di atas untuk memilih metode pembayaran simulasi bank transfer / e-wallet.</p>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            // Memicu Snap Pop-Up bawaan Midtrans menggunakan token dari database
            window.snap.pay('{{ $transaction->snap_token }}', {
                onSuccess: function(result){
                    // Jika sukses simulasi pembayaran, kirim form tersembunyi ke database
                    document.getElementById('success-form').submit();
                },
                onPending: function(result){
                    alert("Menunggu pembayaran Anda!");
                },
                onError: function(result){
                    alert("Pembayaran gagal, silakan coba kembali!");
                }
            });
        });
    </script>
</body>
</html>