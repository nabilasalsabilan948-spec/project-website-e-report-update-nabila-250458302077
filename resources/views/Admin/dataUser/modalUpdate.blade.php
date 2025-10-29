<!-- modal create -->
<div class="modal fade" id="edit{{ $jun->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.update') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="hidden" value="{{ $jun->id }}" name="id">
                        <input type="text" name="category" value="{{ $jun->category }}" class="form-control" placeholder="Masukkan Data Category !">
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    </form>
    <!-- /.modal-dialog -->
</div>