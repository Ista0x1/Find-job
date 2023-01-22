<x-layout >
@include('partial.hero')
@include('partial.search')
        <div  >
            @foreach ($Listings as $listing)
                <x-listing-card :listing='$listing'/>
            @endforeach
    </div>
    {{$Listings->links()}}
</x-layout>

