<div class="modal fade" id="addAuctionModal" tabindex="-1" aria-labelledby="addAuctionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Increase the width by adding 'modal-xl' class -->
        <div class="modal-content">
            <div class="modal-header text-dark">
                <h3>Add New Exiting Auction</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="model-body p-3 text-dark">
                <form action="{{ route('auction.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                    <p><span class="text-danger">@error('title') {{ $message }} @enderror</span></p>
                    <label>Location</label>
                    <input type="text" class="form-control" name="location" value="{{ old('location') }}">
                    <p><span class="text-danger">@error('location') {{ $message }} @enderror</span></p>

                    <div>
                        <label>Auction Date</label>
                        <input type="date" class="form-control" name="auction_date" value="{{ old('auction_date') }}">
                        <p><span class="text-danger">@error('auction_date') {{ $message }} @enderror</span></p>
                    </div>

                    <div class="mt-2"><label>Auction Period</label>
                        <select name="period">
                            <option value="Morning">Morning</option>
                            <option value="Afternoon">Afternoon</option>
                            <option value="Evening">Evening</option>
                        </select>
                        <p><span class="text-danger">@error('period') {{ $message }} @enderror</span></p>
                    </div>
                    <label>Description</label>
                    <textarea name="description" class="ckeditor form-control" rows="5"
                              cols="50">{{ old('description') }}</textarea>
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





