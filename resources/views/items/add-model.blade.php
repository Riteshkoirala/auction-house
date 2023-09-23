<div class="modal fade" id="addItemAuctionModal-{{ $lot->id }}" tabindex="-1" aria-labelledby="addItemAuctionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Increase the width by adding 'modal-xl' class -->
        <div class="modal-content">
            <div class="modal-header text-dark">
                <h3>Add New Exiting Auction Item</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="model-body p-3 text-dark">
                <form action="{{ route('items.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="lot_id" value="{{ $lot->id }}">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                    <p><span class="text-danger">@error('title') {{ $message }} @enderror</span></p>
                    <label>Name of Artist</label>
                    <input type="text" class="form-control" name="name_of_artist" value="{{ old('name_of_artist') }}">
                    <p><span class="text-danger">@error('name_of_artist') {{ $message }} @enderror</span></p>
                    <label>Year the work was produced</label>
                    <input type="text" class="form-control" name="year_work_produced" id="date" value="{{ old('year_work_produced') }}" >
                    <p><span class="text-danger">@error('year_work_produced') {{ $message }} @enderror</span></p>
                    <label>Subject classification</label>
                    <input type="text" class="form-control" name="subject_classification" value="{{ old('subject_classification') }}">
                    <p><span class="text-danger">@error('subject_classification') {{ $message }} @enderror</span></p>
                    <label>Estimated Price</label>
                    <input type="number" class="form-control" name="estimated_price" value="{{ old('estimated_price') }}">
                    <p><span class="text-danger">@error('estimated_price') {{ $message }} @enderror</span></p>

                    <div class="mt-2">
                        <label>Item Category</label>
                        <select name="category" class="form-control">
                            <option value="Paintings">Paintings</option>
                            <option value="Drawings">Drawings</option>
                            <option value="Photographic Images">Photographic Images</option>
                            <option value="Sculptures">Sculptures</option>
                            <option value="Carvings">Carvings</option>
                        </select>
                        <p><span class="text-danger">@error('category') {{ $message }} @enderror</span></p>
                    </div>
                    <label>image</label>
                    <input type="file" class="form-control" name="image_name" accept="image/*">
                    <label>Image Type (required for Photographic Images)</label>
                    <input type="text" class="form-control" name="image_type" value="{{ old('image_type') }}">
                    <p><span class="text-danger">@error('image_type') {{ $message }} @enderror</span></p>
                    <label>Dimension in cm  (required for all category) </label>
                    <input type="text" class="form-control" name="dimension" value="{{ old('dimension') }}">
                    <p><span class="text-danger">@error('dimension') {{ $message }} @enderror</span></p>
                    <label>Drawing Medium (required for drawing)</label>
                    <input type="text" class="form-control" name="drawing_medium" value="{{ old('drawing_medium') }}">
                    <p><span class="text-danger">@error('drawing_medium') {{ $message }} @enderror</span></p>
                    <label>Painting Medium (required for painting)</label>
                    <input type="text" class="form-control" name="painting_medium" value="{{ old('painting_medium') }}">
                    <p><span class="text-danger">@error('painting_medium') {{ $message }} @enderror</span></p>
                    <div class="mt-2">
                        <label>Framed (required for drawing and painting)</label>
                        <input type="text" class="form-control" name="framed" value="{{ old('framed') }}">
                        <p><span class="text-danger">@error('framed') {{ $message }} @enderror</span></p>
                    </div>
                    <label>Material Used (required for sculptures and carving)</label>
                    <input type="text" class="form-control" name="material_used" value="{{ old('material_used') }}">
                    <p><span class="text-danger">@error('material_used') {{ $message }} @enderror</span></p>
                    <label>Weight (required for sculptures and carving)</label>
                    <input type="text" class="form-control" name="weight" value="{{ old('weight') }}">
                    <p><span class="text-danger">@error('weight') {{ $message }} @enderror</span></p>
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="5" cols="50">{{ old('description') }}</textarea>
                    <p><span class="text-danger">@error('description') {{ $message }} @enderror</span></p>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary bg-secondary" data-bs-dismiss="modal">Close
                        </button>
                        <button type="submit" class="btn btn-primary bg-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function extractYear(input) {
        // Remove any non-numeric characters from the input
        var year = input.value.replace(/\D/g, '');

        // Display only the first four characters (assuming a valid year is four digits)
        input.value = year.substring(0, 4);
    }
</script>






