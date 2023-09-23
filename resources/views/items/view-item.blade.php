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
                Auction is at:<em>{{ ' '.$auction->auction_date .' in '.$auction->period. ' period in location '. $auction->location }}</em>
            @endif
        </p>
            <p style="margin-left: 200px; color: black">Lot number is:{{'  '. $lot->lotNumber}}</p>
            <p style="margin-left: 200px; color: black">Lot Description:{{'  '. $lot->description}}</p>

    </x-slot>
    <div class="container-fluid bg-light d-flex justify-content-center flex-wrap p-3 m-2">
        <div>
        <p>Lot Reference Number: {{ '        '. $item->lot_number }}</p>
        <p> Date Of Production : {{ '        '. $item->year_work_produced }}</p>
        <p>Piece Title: {{ '         '.$item->title }}</p>
        <p>Estimated Price : ${{ '         '.$item->estimated_price }}</p>
        @if($item->dimension != null)
            <p>Dimension : {{ '       '.$item->dimension }}</p>
        @endif
        @if($item->image_type != null)
            <p>Image Type : {{ '       '.$item->image_type }}</p>
        @endif
        @if($item->drawing_medium != null)
            <p>Drawing Medium : {{ '      '.$item->drawing_medium }}</p>
        @endif
        @if($item->painting_medium != null)
            <p>Painting Medium : {{ '      '.$item->painting_medium }}</p>
        @endif
        @if($item->framed != null)
            <p>Framed : {{ '       '.$item->framed }}</p>
        @endif
        @if($item->material_used != null)
            <p>Material Used : {{ '     '.$item->material_used }}</p>
        @endif
        @if($item->weight != null)
            <p>Weight : {{ ' '.$item->weight }}</p>
        @endif
        <p>Description: {{ ' '.$item->description }}</p>
            <div class="p-3" style="background-color: grey">
            <img src="{{ asset('images/item/'.$item->image_name) }}" alt="Your Image">
            </div>
        </div>
    </div>
</x-app-layout>
