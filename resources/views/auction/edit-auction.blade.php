<div class="modal fade" id="editAuctionModal-{{ $auc->id }}" tabindex="-1" aria-labelledby="editAuctionModalLabel-{{ $auc->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Increase the width by adding 'modal-xl' class -->
        <div class="modal-content">
            <div class="modal-header text-dark">
                <h3>Add the Auction - {{ $auc->title }}</h3>
                @php
                    $auction = $auc;
                @endphp
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="model-body p-3 text-dark">

                <form action="{{ route('auction.update', $auction) }}" method="post" enctype="multipart/form-data">
                    @csrf <!-- CSRF token for security -->
                    @method('put')
                    <input type="hidden" name="eid" value="{{ $auc->id }}">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title', $auc->title) }}">
                    <p><span class="text-danger">@error('title') {{ $message }} @enderror</span></p>

                    <label>Location</label>
                    <input type="text" class="form-control" name="location" value="{{ old('location', $auc->location) }}">
                    <p><span class="text-danger">@error('location') {{ $message }} @enderror</span></p>

                    <div>
                        <label>Auction Date</label>
                        <input type="date" class="form-control" name="auction_date" value="{{ old('auction_date', $auc->auction_date) }}">
                        <p><span class="text-danger">@error('auction_date') {{ $message }} @enderror</span></p>
                    </div>

                    <div class="mt-2">
                        <label>Auction Period</label>
                        <select name="period">
                            <option value="Morning" @if(old('period', $auc->period) == 'Morning') selected @endif>Morning</option>
                            <option value="Afternoon" @if(old('period', $auc->period) == 'Afternoon') selected @endif>Afternoon</option>
                            <option value="Evening" @if(old('period', $auc->period) == 'Evening') selected @endif>Evening</option>
                        </select>
                        <p><span class="text-danger">@error('period') {{ $message }} @enderror</span></p>
                    </div>

                    <label>Description</label>
                    <textarea name="description" class="ckeditor form-control" rows="5" cols="50">{{ old('description', $auc->description) }}</textarea>
                    <p><span class="text-danger">@error('description') {{ $message }} @enderror</span></p>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary bg-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary bg-primary">Save changes</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>





