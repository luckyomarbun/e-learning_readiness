<form action="{{ route('value-weight.destroy', $valueWeight->id) }}" method="post">
    <div class="modal-body">
        @csrf
        @method('DELETE')
        <h5 class="text-center">Apakah anda yakin ingin menghapus {{ $valueWeight->name }}?</h5>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancelButton">Batal</button>
        <button type="submit" class="btn btn-danger">Hapus</button>
    </div>
</form>

