<form wire:submit="addRekening">
      <div class="card">
            <div class="card-header">
                  <h4>Tambah Rekening Vendor</h4>
            </div>
            <div class="card-body">
                  <div class="form-group">
                        <label>Nama Bank</label>
                        <input type="text"class="form-control @error('bank_name') is-invalid @enderror"wire:model="bank_name">
                  </div>
                  <div class="form-group">
                        <label>Nomor Rekening</label>
                        <input type="number"class="form-control @error('rekening_number') is-invalid @enderror"wire:model="rekening_number">
                  </div>
                  <div class="form-group pt-3">
                        <div class="d-felx d-grid">
                              <button type="submit" class="btn btn-secondary rounded-pill">
                              <i class="bi bi-plus-circle"></i>
                              Tambah
                        </button>
                        </div>
                  </div>
            </div>
      </div>
</form>