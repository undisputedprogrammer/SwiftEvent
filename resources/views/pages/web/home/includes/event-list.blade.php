<div>
    @foreach ($events as $event)
        <div class="flex flex-row space-x-16 justify-evenly my-5">
            <img src="{{ PageHelper::getEventImageUrl($event->image, $event->id) }}" class=" h-40 aspect-square rounded-2xl" alt="">
            <div class="text-lg flex flex-col justify-center basis-1/2">
                <p>Date : {{ date('M Y', strtotime($event->date)) }}</p>
                <p class="font-bold">{{ $event->name }}</p>
                <p class="font-semibold">{{ Str::limit($event->description, 100, '...') }}</p>
                <p class=" font-bold">Venue : {{ $event->venue }}</p>
            </div>
            <div class="flex flex-col justify-center space-y-1">
                <a href="#" class="btn btn-outline btn-primary btn-sm">View</a>
                <a href="#" class=" btn btn-success btn-sm">Book now</a>
            </div>
        </div>
    @endforeach

    <div class="w-full flex justify-center">
        {{ $events->links('vendor.pagination.custom-pagination-links') }}
    </div>

</div>
