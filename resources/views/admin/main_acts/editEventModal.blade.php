<div class="modal fade" id="editEvent" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <form action="{{ route('maincategories.store') }}" method="post">
        @csrf
        @method('put')
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="editmodalLabel">Edit New Category</h4>
                </div>
                <div class="modal-body">
                    <label for="name">Enter Category Name</label>
                    <input type="text" class="form-control" id="editname" name="name">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
