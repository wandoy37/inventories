<button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#formAddUnits">
      <i class="bi bi-plus-circle"></i> Stock Awal
</button>

<div class="modal fade" id="formAddUnits" tabindex="-1" aria-labelledby="formAddUnitsLabel" aria-hidden="true"
      wire:ignore.self>
      <div class="modal-dialog modal-dialog-centered">
            <form wire:submit.prevent="saveUnit" class="modal-content">
                  <div class="modal-header">
                        <h1 class="modal-title fs-5" id="formAddUnitsLabel">Tambah Stock Awal</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <div class="modal-body">
                        <div class="form-group mb-3">
                              <label for="nameUnit">Satuan</label>
                              <input id="nameUnit" type="text"
                                    class="form-control @error('nameUnit') is-invalid @enderror"
                                    wire:model.defer="nameUnit">
                              @error('nameUnit') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group mb-3">
                              <label for="quantityUnit">Kuantitas</label>
                              <input id="quantityUnit" type="number" min="1"
                                    class="form-control @error('quantityUnit') is-invalid @enderror"
                                    wire:model.defer="quantityUnit">
                              @error('quantityUnit') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group mb-3">
                              <label for="price_buyUnit">Harga Beli/Modal</label>
                              <input id="price_buyUnit" type="text" inputmode="numeric" autocomplete="off"
                                    class="form-control @error('price_buyUnit') is-invalid @enderror"
                                    wire:model.defer="price_buyUnit" oninput="this.value = formatRupiah(this.value)">
                              @error('price_buyUnit') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group mb-3">
                              <label for="price_sellUnit">Harga Jual</label>
                              <input id="price_sellUnit" type="text" inputmode="numeric" autocomplete="off"
                                    class="form-control @error('price_sellUnit') is-invalid @enderror"
                                    wire:model.defer="price_sellUnit" oninput="this.value = formatRupiah(this.value)">
                              @error('price_sellUnit') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                  </div>

                  <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-secondary" wire:loading.attr="disabled">
                              <span wire:loading.remove><i class="bi bi-plus-circle"></i> Simpan</span>
                              <span wire:loading>Memproses…</span>
                        </button>
                  </div>
            </form>
      </div>
</div>

@push('scripts')
<script>
      window.addEventListener('unit-saved', () => {
  const el = document.getElementById('formAddUnits');
  const modal = bootstrap.Modal.getInstance(el) || new bootstrap.Modal(el);
  modal.hide();
});
</script>

{{-- Format Rupiah --}}
<script>
      function formatRupiah(v) {
    const digits = (v || '').replace(/[^\d]/g,'');  // sisakan angka saja
    return digits ? new Intl.NumberFormat('id-ID').format(digits) : '';
  }
</script>
@endpush