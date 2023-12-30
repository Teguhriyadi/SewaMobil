<form action="{{ url('/') }}" method="POST">
    @csrf
    <input type="hidden" name="mobil_id" value="{{ $id_mobil }}">
    <div class="modal-body">
        <div class="row g-2">
            <div class="col mb-0">
                <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                <input type="datetime-local" id="tanggal_mulai" name="tanggal_mulai" class="form-control" />
            </div>
            <div class="col mb-0">
                <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                <input type="datetime-local" id="tanggal_selesai" name="tanggal_selesai" class="form-control" />
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="reset" class="btn btn-danger">
            <i class="fa fa-times fs-7" style="margin-right: 5px"></i> Batal
        </button>
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-check fs-7" style="margin-right: 5px"></i> Simpan
        </button>
    </div>
</form>
