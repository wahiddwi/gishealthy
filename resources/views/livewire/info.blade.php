<div>
    <div class="form-group">
        <label for="">Nama Rumah Sakit</label>
        <select class="form-control @error('id_rumahsakit') is-invalid @enderror" wire:model="selectedLaykes" name="id_rumahsakit" required>
            <option value="">--Pilih Rumah Sakit--</option>
              @foreach ($laykeses as $item)
                <option value="{{ $item->id }}">{{ $item->nama_rumahsakit }}</option>
              @endforeach
          </select>
          @error('id_rumahsakit')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
        @enderror
    </div>
    {{-- @if(count($selectedLaykes) > 0) --}}
    <div class="form-group">
        <label for="nama">No. Kamar</label>
        <select class="form-control @error('id_kamar') is-invalid @enderror" wire:model="selectedInfoKamar" name="id_kamar" required>
            <option value="">--Pilih No. Kamar--</option>
              @foreach ($kamars as $ik)
                <option value="{{ $ik->id }}">{{ $ik->no_kamar }}</option>
              @endforeach
          </select>
          @error('id_kamar')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="inputEmail4">Status Kamar</label>
        <select id="inputState" class="form-control @error('status') is-invalid @enderror" name="status" wire:model="selectedStatus" required>
            <option selected="">--Pilih Status Kamar--</option>
            <option value="Tersedia">Tersedia</option>
            <option value="Terisi">Terisi</option>
          </select>
        @error('status')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    {{-- @endif --}}
</div>
