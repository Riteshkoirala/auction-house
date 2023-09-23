<div class="modal fade" id="editLotModel-{{ $lot->id }}" tabindex="-1" aria-labelledby="editLotModelLabel{{ $lot->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Increase the width by adding 'modal-xl' class -->
        <div class="modal-content">
            <div class="modal-header text-dark">
                <h3>Add New Lot for Auction</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="model-body p-3 text-dark">
                <form action="{{ route('lot.update', $lot) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <label>Title</label>
                    <input type="hidden" name="editLot" value="{{ $lot->auction_id }}">
                    <input type="hidden" name="auction_id" value="{{ $lot->auction_id  }}">
                    <input type="text" class="form-control" name="title" value="{{ old('title', $lot->title) }}">
                    <p><span class="text-danger">@error('title') {{ $message }} @enderror</span></p>
                    <label>Lot Number</label>
                    <input type="number" class="form-control" name="lotNumber" value="{{ old('lotNumber', $lot->lotNumber) }}">
                    <p><span class="text-danger">@error('lotNumber') {{ $message }} @enderror</span></p>
                    <label>Description</label>
                    <textarea name="description" class="ckeditor form-control" rows="5"
                              cols="50">{{ old('description', $lot->description) }}</textarea>
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





