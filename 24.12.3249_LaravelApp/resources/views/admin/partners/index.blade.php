<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manajemen Partner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">Amikom Event Hub - Admin Panel</a>
            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('admin.categories.index') }}">📂 Kategori</a>
                <a class="nav-link active" href="{{ route('admin.partners.index') }}">🤝 Partner</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm p-4 border-0">
                    <h5 class="fw-bold mb-3 text-success">➕ Tambah Partner</h5>
                    <form action="{{ route('admin.partners.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Nama Partner</label>
                            <input type="text" name="name" class="form-control" placeholder="Contoh: Google Student Club" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-semibold">URL Logo Partner</label>
                            <input type="url" name="logo_url" class="form-control" placeholder="https://linklogo.com/gambar.png" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100 fw-bold text-white">Simpan Partner</button>
                    </form>
                </div>
            </div>

            <div class="col-md-8">
                @if(session('success'))
                    <div class="alert alert-success border-0 shadow-sm mb-3">{{ session('success') }}</div>
                @endif

                <div class="card shadow-sm p-4 border-0">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-2">
                        <h5 class="fw-bold m-0 text-dark">📋 Daftar Partner Kerja Sama</h5>
                        
                        <form action="{{ route('admin.partners.index') }}" method="GET" class="d-flex gap-2">
                            <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari partner..." value="{{ $search }}">
                            <button type="submit" class="btn btn-sm btn-secondary">Cari</button>
                            @if($search)
                                <a href="{{ route('admin.partners.index') }}" class="btn btn-sm btn-light">Reset</a>
                            @endif
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle small">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Logo</th>
                                    <th>Nama Partner</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($partners as $partner)
                                    <tr>
                                        <td class="fw-bold">{{ $partner->id }}</td>
                                        <td><img src="{{ $partner->logo_url }}" alt="logo" class="img-thumbnail" style="height: 40px; width: 40px; object-fit: contain;"></td>
                                        <td class="fw-semibold text-dark">{{ $partner->name }}</td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-1">
                                                <button class="btn btn-sm btn-warning fw-bold text-white" data-bs-toggle="modal" data-bs-target="#editPartner{{ $partner->id }}">Edit</button>
                                                <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST" onsubmit="return confirm('Hapus partner ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger fw-bold">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="editPartner{{ $partner->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content p-3 border-0 shadow">
                                                <div class="modal-header border-0"><h5 class="fw-bold">Ubah Data Partner</h5></div>
                                                <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body py-2">
                                                        <div class="mb-3">
                                                            <label class="form-label small">Nama Partner</label>
                                                            <input type="text" name="name" class="form-control" value="{{ $partner->name }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label small">URL Logo</label>
                                                            <input type="url" name="logo_url" class="form-control" value="{{ $partner->logo_url }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer border-0">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-warning text-white fw-bold">Perbarui</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr><td colspan="4" class="text-center text-muted py-4">Data partner kerja sama tidak ditemukan.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>