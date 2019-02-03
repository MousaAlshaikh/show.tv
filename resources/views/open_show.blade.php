@extends('layouts.main')

@section('content')

    <!--cover-->
<section class="page-header bg-3" style="background: url('/uploads/{{ $show->resource_cover }}')">
    <div class="container">
        <div class="row text-center text-white">
            <div class="col-sm-12 pt-md-5">
                <div class="page-title" style="background: #08010147;padding: 15px;color: #f3f0f0;">
                    <h2>{{ $show->title }}</h2>
                    <p>{{ $show->description }}</p>
                    <p>Airing time <i class="ti-angle-double-right" aria-hidden="true"></i> <span class="main-color">{{ $show->airing_time }}</span></p>
                    @php
                        $is_follow = \App\TvResource::isFollowed(auth()->id() , $show->id);
                    @endphp
                    <button class="btn btn-dark btn-default {{ $is_follow == 'follow'?'selected':'' }}" data-interact="{{ $is_follow == 'follow'?'none':'follow' }}">{{ $is_follow == 'follow'?'Un-Follow':'Follow' }}</button>
                </div>
            </div>
        </div>
    </div>
</section>
<!--cover end-->

<!--page content-->
<section>
    <div class="container">
        <div class="row">
            <!--left side-->
            @if(count($show_episodes) > 0)
            <div class="col-lg-8 mb-xs-5">
                <!--item-->
                @foreach($show_episodes as $episode)
                <div class="blog-list-item">
                    <!--blog image-->
                    <a href="/episode/show/{{ $episode->id }}">
                        <div class="blog-item-img mb-5 hover-effect">
                            <img src="{{ asset('uploads/' . $episode->thump) }}" alt="image">
                        </div>
                    </a>
                    <!--blog contetn-->
                    <div class="blog-item-content">
                        <span class="category main-color tex">Published At</span> - <span class="date">{{ date('l @ h:iA' , strtotime($episode->created_at)) }}</span>
                        <h4 class="mt-2 mb-3"><a href="#.">{{ $episode->title }}</a></h4>
                        <p class="mb-4">{{ $episode->description }}</p>
                        <!--button-->
                        <h6 class="text-capitalize"><a href="/episode/show/{{ $episode->id }}"><img src="{{ asset('imgs/play.png') }}" style="height: 50px;width: 50px;border-radius: 50%"> Watch</a></h6>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
            <!--right side-->
            <div class="col-lg-4">
                <!--search-->
                <!--recent post-->
                <div class="widget bg-light">
                    <h5 class="mb-4">Other Shows</h5>
                    @foreach($random_shows as $random_show)
                    <!--recent post item-->
                    <div class="recent-post d-flex">
                        <img src="{{ asset('uploads/' . $random_show->resource_cover) }}" alt="image">
                        <div class="text">
                            <a href="#.">{{ $random_show->airing_time }}</a>
                            <span class="date">{{ date('l @ h:iA' , strtotime($random_show->created_at))}}</span>
                        </div>
                    </div>
                    <!--recent post item-->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!--page content end-->
@endsection
@section('script')
    @auth
        <script>
            $('[data-interact]').click(function () {
                $.get('{{ route('tv.follow', $show->id) }}',
                    {action: $(this).data('interact') ,'X-CSRF-TOKEN': CSRF_TOKEN},
                    function (response) {
                    console.log(response.success)
                     if(response.success){
                         var element = $('[data-interact]');
                         if(element.attr('data-interact') == 'none'){
                             element.removeClass('selected')
                             element.attr('data-interact', 'follow')
                             element.html('Follow')
                         }else{
                             element.addClass('selected');
                             element.attr('data-interact' , 'none')
                             element.html('Un-Follow')
                         }
                     }else{
                         alert('Something went wrong, try again');
                     }
                    });
            });
        </script>
    @endauth
@endsection