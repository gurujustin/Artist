<div class="modal fade" id="editLocation" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <form action="{{ route('locations.store') }}" method="post">
        @csrf
        @method('put')
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="editmodalLabel">Edit Location</h4>
                </div>
                <div class="modal-body">
                    <label for="country">Select Country</label>
                    <select name="country" id="editcountry" class="form-control">
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                    <label for="name">Enter Location Name</label>
                    <input type="text" class="form-control" id="editname" name="name">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
