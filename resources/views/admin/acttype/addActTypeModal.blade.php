<div class="modal fade" id="addActType" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <form action="{{ route('acttypes.store') }}" method="post">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modalLabel">Add New Act Type</h4>
                </div>
                <div class="modal-body">
                    <label for="parentact">Act Category</label>
                    <select name="parentact" class="form-control" required>
                        @foreach ($parentacts as $parentact)
                            <option value="{{ $parentact->id }}">{{ $parentact->name }}</option>
                        @endforeach
                    </select>
                    <label for="name">Act Subcategory</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
