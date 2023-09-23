<x-app-layout>
    <x-slot name="header">
        @if($auction instanceof \Illuminate\Support\Collection && $auction->count() > 1)
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
                style="margin-left: 200px; color: black">
                {{ __('Auction Items') }}<br>
            </h2>
        @else
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
                style="margin-left: 200px; color: black">
                {{ __('Auction') }} {{ ' - '.$auction->title }}<br>
            </h2>
        @endif

        <p style="margin-left: 200px; color: black">
            @if($auction instanceof \Illuminate\Support\Collection && $auction->count() > 1)
                <!-- Add any specific content for multititle here -->
            @else
                Auction is at:<em>{{ ' '.$auction->auction_date .' '.$auction->period. ' in '. $auction->location }}</em>
            @endif
        </p>
    </x-slot>


    <div class="d-flex">
        <div class="listing">
            @if(Auth::user()->role == 'admin' || Auth::user()->role == 'seller')
            <div class="p-3">
                @include('items.add-model')
                <a data-bs-toggle="modal" data-bs-target="#addItemAuctionModal-{{ $lot->id }}" data-bs-backdrop="static" class="btn btn-primary">Add
                    new Item for this lot in auction</a>
            </div>            @endif

            <div class="p-3">
                    <h4 style="font-size: 20px; font-weight: bold">Search Items</h4>
                    <form action="{{ route('lot.show', $lot) }}" method="get">
                        <label>Item Category</label>
                        <select name="category" class="form-control">
                            <option>Select item category</option>
                            <option value="Paintings" {{ request('category') == 'Paintings' ? 'selected' : '' }}>Paintings</option>
                            <option value="Drawings" {{ request('category') == 'Drawings' ? 'selected' : '' }}>Drawings</option>
                            <option value="Photographic Images" {{ request('category') == 'Photographic Images' ? 'selected' : '' }}>Photographic Images</option>
                            <option value="Sculptures" {{ request('category') == 'Sculptures' ? 'selected' : '' }}>Sculptures</option>
                            <option value="Carvings" {{ request('category') == 'Carvings' ? 'selected' : '' }}>Carvings</option>
                        </select>

                        <label>Piece title</label>
                        <input type="text" name="title" value="{{ request('title') }}"  class="form-control">
                        <label>Name of Artist</label>
                        <input type="text" name="name_of_artist" value="{{ request('name_of_artist') }}"  class="form-control">
                        <button class="btn btn-success">Search</button>
                    </form>

                </div>
        </div>
        <div class="maintain">
            <div class=" bg-light m-3 d-block  p-3 glower">
                <div class="language-details-container p-2">
                    <div class="d-flex ">
                                                @php
                                                    $resourcesCount = count($items);
                                                    $resourcesPerRow = 3;
                                                @endphp

                                                @for ($i = 0; $i < $resourcesCount; $i += $resourcesPerRow)
                                                    <div class="row justify-content-evenly">
                                                        @foreach($items as $resource)
                                                            @if ($i < $resourcesCount)
                                                                @php
                                                                    $item = $resource;
                                                                @endphp
{{--                                                                @include('additional-resource.edit-model')--}}
                                                                <div class="course col-md-3 d-flex flex-wrap justify-content-center mx-2 mt-2"><a href="{{ route('items.show',$item) }}">
                                                                        <div class="d-flex justify-content-center" style="width: 100%">
                                                                            <img src="{{ asset('images/item/'.$resource->image_name) }}" alt="Your Image">
                                                                            <div>
                                                                                @if(Auth::user()->role == 'admin')
                                                                                <div class="place">
                                                                                    <div class="justify-content-end">
                                                                                        <div class="ellipsis">...</div>
                                                                                    </div>
                                                                                    <div class="options">
                                                                                        @if($resource->in_auction == 0)
                                                                                            <a href="{{ route('item.up', $item) }}" onclick="return confirm('Are u sure u want to add this item to auction?')">Add to auction</a>
                                                                                        @else
                                                                                            <a href="{{ route('item.up', $item) }}" onclick="return confirm('Are u sure u want to remove this item to auction?')">Remove From Auction</a>
                                                                                        @endif
                                                                                        @php
                                                                                            $additionalResource = $resource;
                                                                                        @endphp
                                                                                        <form action="{{ route('items.destroy',$additionalResource) }}" onclick="return confirm('Are you sure u wan to delete')" method="post">
                                                                                            @csrf
                                                                                            @method('delete')
                                                                                            <button class="delete">Delete</button>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <hr>
                                                                            <P>Artist: {{ ' '.$resource->name_of_artist }}</P>
                                                                            <p>Tile: {{ ' '.$resource->title }}</p>
                                                                            <p>Description: {{ ' '.$resource->description }}</p>
                                                                        </div></a>
                                                                </div>
                                                            @endif
                                                            @php $i++; @endphp
                                                        @endforeach
                                                    </div>
                                                @endfor
                    </div>


                </div>
            </div>
        </div>
    </div>

</x-app-layout>

