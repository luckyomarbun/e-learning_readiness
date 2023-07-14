<form action="/survey" method="post">
    @csrf
    @method('POST')
    <div class="form">
        <label for="name">Pertanyaan</label>
        <input type="text" name="value" class="form-control rounded-top  @error('value') is-invalid @enderror" id="name" placeholder="Masukkan Pertanyaan" required value="{{ old('value') }}">
        <input type="hidden" name="section_id" class="form-control rounded-top @error('value') is-invalid @enderror" id="section_id" placeholder="section_id" required value="{{ old('section_id',$selectedSectionId) }}">
        @error('value')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col text-right">
        <a href="/survey" class="w-30 btn btn-md btn-danger mt-3">Batal</a>
        <button class="w-30 btn btn-md btn-primary mt-3" type="submit">Simpan</button>
    </div>
</form>