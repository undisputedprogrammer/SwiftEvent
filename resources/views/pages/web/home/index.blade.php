@extends('layouts.web')

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('utils/slick/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('utils/slick/slick-theme.css') }}" />
    <style>
        .slick-prev:before,
        .slick-next:before {
            color: #09529b !important;
        }
    </style>
@endpush

@section('content')
    <section class="my-6">
        <div class="hero min-h-[30rem] bg-base-300 w-[80%] mx-auto rounded-2xl">
            <div class="hero-content flex-col lg:flex-row-reverse">
                <img src="{{ asset('images/banner-image.jpg') }}" class="max-w-[20rem] rounded-lg shadow-2xl" />
                <div>
                    <h1 class="text-5xl font-bold">Join now! Experience the future today</h1>
                    <p class="py-6">Join us for a cutting-edge exploration of the latest trends and innovations in
                        technology. Connect with industry experts, participate in hands-on workshops, and take your tech
                        skills to the next level!</p>
                    <button class="btn btn-primary">Explore Events</button>
                </div>
            </div>
        </div>
    </section>

    <section class="w-[80%] mx-auto py-6 event-slider">
        @foreach ($sliderEvents as $event)
            <div class="w-[80%]  mx-auto rounded-2xl overflow-hidden relative" style="height: 30rem!important;">
                <img src="{{ PageHelper::getEventImageUrl($event->image, $event->id) }}" class=" w-full h-full object-cover"
                    alt="">
                <div class=" absolute left-6 bottom-6 bg-black text-white rounded-lg p-3 w-96">
                    <h1 class= "font-bold font-mono text-4xl">{{ $event->name }}</h1>
                    <p class="text-base ">{{ Str::limit($event->description, 100, '...') }}</p>
                    <a href="#" class="btn btn-primary btn-sm my-2">Book now</a>
                </div>
            </div>
        @endforeach
    </section>

    <section class="w-[80%] mx-auto my-6">
        <h1 class=" text-3xl font-bold">Upcoming Events</h1>
        <hr class="my-6 border-1 shadow-md">

        <div id="event-list">
            @include('pages.web.home.includes.event-list')
        </div>

    </section>
@endsection

@push('scripts')
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="{{ asset('utils/slick/slick.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.event-slider').slick({
                infinite: true,
                speed: 200,
                autoplay: true,
                autoplaySpeed: 4000
            });

            $(document).on('click', '.pagination-link', function(event) {
                event.preventDefault();
                let url = $(this).attr('href');

                $('#ajaxLoading').removeClass('hidden');
                setTimeout(() => {
                    $.ajax({
                        url: url,
                        method: 'GET',
                        success: function(response) {
                            $('#event-list').html(response.view);
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', status, error);
                        }
                    });
                    $('#ajaxLoading').addClass('hidden');
                }, 500);

            });

        });
    </script>
@endpush
