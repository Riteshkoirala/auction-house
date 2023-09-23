<x-app-layout>
    @if(old('addLot'))
        <script>
            $(document).ready(function () {
                var val = '#addLotModel-' + {{ old('addLot') }};
                $(val).modal('show');
            });
        </script>
        @elseif(old('editLot'))
            <script>
                $(document).ready(function () {
                    var val = '#editLotModel-' + {{ old('editLot') }};
                    $(val).modal('show');
                });
            </script>
    @endif

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
        @if(Auth::user()->role == 'admin')
        <div class="p-3" style="width: fit-content; margin-left: 50px">
            @include('auction.lot-add')
            <a data-bs-toggle="modal" data-bs-target="#addLotModel-{{$auction->id}}" data-bs-backdrop="static" class="btn btn-primary">Add lot</a>
        </div>
        @endif
    <div class="d-flex">
        <div class="maintain">
            <div class=" bg-light m-3 d-block  p-3 glower">
                <div class="language-details-container p-2">
                    <div class="d-flex ">
                        @php
                            $resourcesCount = count($lots);
                            $resourcesPerRow = 3;
                        @endphp

                        @for ($i = 0; $i < $resourcesCount; $i += $resourcesPerRow)
                            <div class="row justify-content-evenly">
                                @foreach($lots as $lot)
                                    @if ($i < $resourcesCount)
                                        @include('auction.lot-edit')
                                        <div class="course col-md-3 d-flex flex-wrap justify-content-center mx-2 mt-2"><a href="{{ route('lot.show', $lot) }}">
                                                <div class="d-flex justify-content-center" style="width: 100%">
                                                    <div>
                                                        @if(Auth::user()->role == 'admin' )
                                                        <div class="place">
                                                            <div class="justify-content-end">
                                                                <div class="ellipsis">...</div>
                                                            </div>
                                                            <div class="options">
                                                                <a data-bs-toggle="modal" data-bs-target="#editLotModel-{{ $lot->id }}" data-bs-backdrop="static" class="edit">Edit</a>
                                                                @if($lot->is_archive == 0)
                                                                    <a href="{{ route('lot.up', $lot) }}" onclick="return confirm('Are u sure u want to remove this lot from archive?')">Remove from archive</a>
                                                                @else
                                                                    <a href="{{ route('lot.up', $lot) }}" onclick="return confirm('Are u sure u want to add this lot to archive?')">Archive</a>
                                                                @endif
                                                                <form action="{{ route('lot.destroy',$lot) }}" onclick="return confirm('Are you sure u wan to delete')" method="post">
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
                                                    <p>Title: {{ $lot->title }}</p>
                                                    <p>Lot Number: {{ $lot->lotNumber }}</p>
                                                    <p>Description: {{ $lot->description }}</p>
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

