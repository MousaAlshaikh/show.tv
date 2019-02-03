@extends('layouts.main')

@section('content')

    <!--cover-->
    <section class="page-header bg-3">
        <div class="container">
            <div class="row text-center text-white">
                <div class="col-sm-12 pt-md-5">
                    <div class="page-title" style="background: #08010147;padding: 15px;color: #f3f0f0;">
                        <h2>Search Result</h2>
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
                @if(count($result) > 0)
                    <div class="col-lg-12 mb-xs-12">
                        <!--item-->
                        @foreach($result as $show)
                            <div class="blog-list-item">
                                <!--blog image-->
                                <a href="{{ route('tv.show' , $show->id ) }}">
                                    <div class="blog-item-img mb-5 hover-effect">
                                        <img src="{{ asset('uploads/' . $show->resource_cover) }}" alt="image">
                                    </div>
                                </a>
                                <!--blog contetn-->
                                <div class="blog-item-content">
                                    <span class="category main-color tex">Published At</span> - <span class="date">{{ date('l @ h:iA' , strtotime($show->created_at)) }}</span>
                                    <h4 class="mt-2 mb-3"><a href="{{ route('tv.show' , $show->id ) }}">{{ $show->title }}</a></h4>
                                    <p class="mb-4">{{ $show->description }}</p>
                                  </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p style="text-align: center;">No Result Found</p>
                @endif
            </div>
        </div>
    </section>
    <!--page content end-->
@endsection
