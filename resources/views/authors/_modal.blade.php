<div class="modal modal-danger fade in" id="exampleModal" >
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-danger text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Data <strong> {{ $author_name }} </strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are You Sure to Delete ?
            </div>
            <div class="modal-footer">
                <form action="{{ route('authors.destroy', $author_id) }}" class="float-right" method="post">
                        @csrf
                        @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Cancel</button>
                    <button type="submit" class="btn btn-warning"><i class="fas fa-trash-alt"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>