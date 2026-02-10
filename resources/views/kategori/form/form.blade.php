<form method="POST">
    @csrf
    @if ($method == 'edit')
        <div class="form-group">
            <label>Kode Kategori</label>
            <input type="text" class="form-control" name="kode_kategori" required readonly value="{{ $kategori->kode ?? '' }}">
        </div>
    @endif

    <div class="form-group">
        <label>Nama Kategori</label>
        <input type="text" class="form-control" name="nama" required value="{{ $kategori->nama ?? '' }}">
    </div>

    <button class="btn btn-primary mt-3">Submit</button>
    <a href="{{url('kategori')}}" class="btn btn-secondary mt-3">Batal</a>
</form>
