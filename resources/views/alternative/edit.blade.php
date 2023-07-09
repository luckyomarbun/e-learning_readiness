<form action="{{ route('alternative.update', $alternative->id) }}" method="post">
    @csrf
    @method('PUT')

    <!-- Equivalent to... -->
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="id" value="{{ $alternative->id }}" />
    <div class="form">
        <label for="name">Nama</label>
        <input type="text" name="name" class="form-control rounded-top  @error('name') is-invalid @enderror" id="name" placeholder="Nama" required value="{{ old('name', $alternative->name) }}">
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col text-right">
        <a href="/alternative" class="w-30 btn btn-md btn-danger mt-3">Batal</a>
        <button class="w-30 btn btn-md btn-primary mt-3" type="submit">Update</button>
    </div>
</form>
