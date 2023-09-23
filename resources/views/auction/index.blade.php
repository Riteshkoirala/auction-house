<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            style="margin-left: 200px; color: black">
            {{ __('Auction') }}
        </h2>
    </x-slot>
    <style>
        .bla:hover {
            box-shadow: 0 0 10px 5px grey;
        }
    </style>
    @if ($errors->has('title') || $errors->has('auction_date') || $errors->has('location'))
        @if(old('eid'))
            <script>
                $(document).ready(function () {
                    var val = '#editAuctionModal-' + {{ old('eid') }};
                    $(val).modal('show');
                });
            </script>
        @else
            <script>
                $(document).ready(function () {
                    $('#addAuctionModal').modal('show');
                });
            </script>
        @endif
    @endif
    @if(Auth::user()->role == 'admin' )
        <div class="d-flex justify-content-end mx-5">
            <a data-bs-toggle="modal" data-bs-target="#addAuctionModal" class="btn btn-primary "
               style=" cursor: pointer">Add new Auction</a>
            @include('auction.create-model')
        </div>
    @endif

    <div class="container-fluid w-75 bg-light mt-2 p-3">
        @foreach($auction as $auc)
            <div class="w-full">
                @php
                    $auction = $auc;
                @endphp
                <div class="d-flex justify-content-evenly mt-2 p-3 w-full bla"
                     style="background-color: #88b1b9; border-radius: 20px"><a class="d-flex justify-content-evenly" href="{{ route('auction.show',$auction) }}">
                    <div class="p-2 me-5">
                        <h3 style="font-size: 15px; font-weight: bold">Auction Auction</h3>
                        <h2 style="font-size: 30px; font-weight: bold">{{ $auc->title }}</h2>
                        Auction is at:<em>{{ ' '.$auc->auction_date .' '.$auc->period. ' in '. $auc->location }}</em>
                        <p style="font-weight: bold">{{ $auc->description }}</p>
                    </div>
                    <div class="d-flex justify-content-center mx-5">

                        <img src="{{ asset('images/img_5.png') }}" width="200px" height="200">
                    </div>
                    <div>
                        <div class="d-flex">
                        @if(Auth::user()->role == 'admin')
                            <a class="eddd"
                               data-bs-toggle="modal"
                               data-bs-target="#editAuctionModal-{{ $auc->id }}"
                               style="cursor: pointer"><i
                                    class="bi-pencil-square " style="color: #0d6efd"></i></a>
                        @endif
                        @include('auction.edit-auction')
                        @if(Auth::check() && (Auth::user()->role == 'admin'))
                            @php
                            @endphp

                                @if($auc->is_archive == 0)
                                    <a href="{{ route('auction.up', $auction) }}" onclick="return confirm('Are u sure u want to remove from archive auction?')">Remove from archive</a>
                                @else
                                    <a href="{{ route('auction.up', $auction) }}" onclick="return confirm('Are u sure u want to add this auction to archive?')">Archive</a>
                                @endif
                            <form action="{{ route('auction.destroy', $auc) }}" method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete???')">
                                @csrf
                                @method('DELETE')
                                <button class="ddd" type="submit"><i class="bi-trash text-danger"></i></button>
                            </form>
                        @endif
                    </div>
                    </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
