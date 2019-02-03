@extends('layouts.main')

@section('content')
<style>
    .selected{
        background: #0c5460;
    }
</style>
    <!--cover-->
    <section class="page-header bg-3" style="background: url('/uploads/{{ $episode->thump }}')">
        <div class="container">
            <div class="row text-center text-white">
                <div class="col-sm-12 pt-md-5">
                    <div class="page-title" style="background: #08010147;padding: 15px;color: #f3f0f0;">
                        <h2>{{ $episode->title }}</h2>
                        <p>{{ $episode->description }}</p>
                        <p>Airing time <i class="ti-angle-double-right" aria-hidden="true"></i> <span class="main-color">{{ $episode->airing_time }}</span></p>
                       <div class = "input-group-sm">
                           @php
                               $is_liked = \App\Episode::isLike(auth()->id() , $episode->id);
                           @endphp
                           <button class="btn btn-dark btn-default {{ $is_liked == 'like'?'selected':'' }}" data-interact="like"><i class="ti-thumb-up"></i></button>
                           <button class="btn btn-dark btn-default {{ $is_liked == 'dislike'?'selected':'' }}" data-interact="dislike"><i class="ti-thumb-down"></i></button>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--cover end-->

<!--page content-->
<section class="page-content">
    <div class="container">
        <div class="row">
            <div class="blog-detail-item row">
                <div class="blog-detail-img col-sm-12 mb-5 hover-effect">
                    <video width="100%" controls>
                        <source src="{{ asset('uploads/' . $episode->video_content) }}" type="video/mp4">
                        Your browser does not support HTML5 video.
                    </video>
                </div>
                <div class="col-lg-8 mb-xs-5">
                    <!--blog contetn-->
                    <div class="blog-item-content">
                        <span class="category main-color tex">Published At</span> - <span class="date">{{ date('l @ h:iA' , strtotime($episode->created_at)) }}</span>
                        <h4 class="mt-2 mb-3"><a href="#.">{{ $episode->title }}</a></h4>
                        <p class="mb-4">{{ $episode->description }}</p>
                        <!--button-->
                    </div>
                <!--right side-->
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

                $.get('{{ route('episode.like', $episode->id) }}',
                    {action: $(this).data('interact') ,'X-CSRF-TOKEN': CSRF_TOKEN});
                $('[data-interact]').removeClass('selected')
                $(this).addClass('selected');
            });
        </script>
    @endauth
@endsection