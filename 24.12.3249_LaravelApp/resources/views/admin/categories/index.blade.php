<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manajemen Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">Amikom Event Hub - Admin Panel</a>
            <div class="navbar-nav">
                <a class="nav-link active" href="{{ route('admin.categories.index') }}">📂 Kategori</a>
                <a class="nav-link" href="{{ route('admin.partners.index') }}">🤝 Partner</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm p-4 border-0">
                    <h5 class="fw-bold mb-3 text-primary">➕ Tambah Kategori</h5>
                    <form action="{{ route('admin.categories.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Nama Kategori</label>
                            <input type="text" name="name" class="form-construct form-control" placeholder="Contoh: Seminar IT" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 fw-bold">Simpan Kategori</button>
                    </form>
                </div>
            </div>

            <div class="col-md-8">
                @if(session('success'))
                    <div class="alert alert-success border-0 shadow-sm mb-3">{{ session('success') }}</div>
                @endif

                <div class="card shadow-sm p-4 border-0">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-2">
                        <h5 class="fw-bold m-0 text-dark">📋 Daftar Kategori</h5>
                        
                        <form action="{{ route('admin.categories.index') }}" method="GET" class="d-flex gap-2">
                            <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari kategori..." value="{{ $search }}">
                            <button type="submit" class="btn btn-sm btn-secondary">Cari</button>
                            @if($search)
                                <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-light">Reset</a>
                            @endif
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle small">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Kategori</th>
                                    <th>Created At</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categories as $category)
                                    <tr>
                                        <td class="fw-bold">{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td class="text-muted">{{ $category->created_at }}</td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-1">
                                                <button class="btn btn-sm btn-warning fw-bold text-white" data-bs-toggle="modal" data-bs-target="#editModal{{ $category->id }}">Edit</button>
                                                
                                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger fw-bold">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="editModal{{ $category->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content p-3 border-0 shadow">
                                                <div class="modal-header border-0"><h5 class="fw-bold">Ubah Nama Kategori</h5></div>
                                                <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body py-2">
                                                        <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
                                                    </div>
                                                    <div class="modal-footer border-0">
                                                        <button type="button" class="btn btn-light small fw-semibold" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-warning text-white fw-bold">Perbarui</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr><td colspan="4" class="text-center text-muted py-4">Data kategori tidak ditemukan.</td></tr>
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