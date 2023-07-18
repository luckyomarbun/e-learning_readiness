<form action="{{ route('survey.update', $question->id) }}" method="post">
    @csrf
    @method('PUT')

    <!-- Equivalent to... -->
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="id" value="{{ $question->id }}" />
    <div class="form">
        <label for="name">Question</label>
        <input type="text" name="value" class="form-control rounded-top  @error('value') is-invalid @enderror" id="value" placeholder="Nama" required value="{{ old('value', $question->value) }}">
        @error('value')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col text-right">
        <a href="/survey" class="w-30 btn btn-md btn-danger mt-3">Batal</a>
        <button class="w-30 btn btn-md btn-primary mt-3" type="submit">Update</button>
    </div>
</form>
