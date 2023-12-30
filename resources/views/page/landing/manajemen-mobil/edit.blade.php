<form action="{{ url('manajemen-mobil/' . $edit->id_manajemen ) }}" method="POST">
    @csrf
    @method("PUT")
    <div class="modal-body">
        <div class="row">
            <div class="col mb-3">
                <label for="nomor_plat" class="form-label">Nomor Plat <small class="text-danger">*</small> </label>
                <input type="text" id="nomor_plat" name="nomor_plat" class="form-control" placeholder="Masukkan Nomor Plat" required value="{{ old('nomor_plat') ?? $edit->nomor_plat }}" />
            </div>
        </div>
        <div class="row mb-2 g-2">
            <div class="col mb-0">
                <label for="merek" class="form-label">Merek <small class="text-danger">*</small> </label>
                <input type="text" id="merek" name="merek" class="form-control" placeholder="Masukkan Nama Merek" required value="{{ old('merek') ?? $edit->merek }}" />
            </div>
            <div class="col mb-0">
                <label for="model" class="form-label">Model <small class="text-danger">*</small> </label>
                <input type="text" id="model" name="model" class="form-control" placeholder="Masukkan Nama Model" required value="{{ old('model') ?? $edit->model }}" />
            </div>
        </div>
        <div class="row">
            <div class="col mb-0">
                <label for="tarif" class="form-label"> Tarif <small class="text-danger">*</small> </label>
                <input type="number" class="form-control" name="tarif" id="tarif" placeholder="Masukkan Tarif" min="1000" required value="{{ old('tarif') ?? $edit->tarif }}" >
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="reset" class="btn btn-label-secondary">
            <i class="fa fa-times fs-7" style="margin-right: 5px"></i> Batal
        </button>
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-check fs-7" style="margin-right: 5px"></i> Simpan
        </button>
    </div>
</form>
