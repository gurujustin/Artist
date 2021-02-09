<div class="modal fade" id="addLocation" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <form action="{{ route('locations.store') }}" method="post">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modalLabel">Add New Location</h4>
                </div>
                <div class="modal-body">
                    <label for="country">Select Country</label>
                    <select name="country" id="country" class="form-control">
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                    <label for="name">Enter Act Location</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
