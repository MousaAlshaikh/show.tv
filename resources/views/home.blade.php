@extends('layouts.main')

@section('content')
    <!--slider start-->
    <section id="home" class="p-0">
        <h2 class="d-none" aria-hidden="true">slider</h2>
        <div id="rev_slider_12_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="Herox-one"
             data-source="gallery" style="background:transparent;padding:0px;">
            <!-- START REVOLUTION SLIDER 5.4.8.1 fullscreen mode -->
            <div id="rev_slider_12_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.8.1">
                <ul>
                    <!-- SLIDE  -->
                    <li data-index="rs-69" data-transition="crossfade" data-slotamount="default" data-hideafterloop="0"
                        data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="500"
                        data-rotate="0"
                        data-saveperformance="off" data-title="Slide" data-param1="01" data-param2="" data-param3=""
                        data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
                        data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="{{ asset('imgs/tv.roya.app.jpg') }}" alt="" data-bgposition="center center"
                             data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->
                    </li>
                </ul>
                <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
            </div>
            <div class="slider-social">
                <a href="#." class="facebook-text-hvr"><i class="ti ti-facebook" aria-hidden="true"></i></a>
                <a href="#." class="twitter-text-hvr"><i class="ti ti-twitter-alt" aria-hidden="true"></i></a>
                <a href="#." class="instagram-text-hvr"><i class="ti ti-instagram" aria-hidden="true"></i></a>
            </div>

        </div>
    </section>
    <!--slider end-->


    <!--team start-->
    <section id="team" class="team circle-left">
        <h2 class="d-none" aria-hidden="true">hidden</h2>
        <div class="container">
                            <h3 style="text-align: center">Recent Episodes</h3>
            <div class="row">
                <div class="col-sm-12">
                    <div class="team-box">
                        <form>
                            <ul>
                                @foreach($recent_episodes as $episode)
                                    <!--accordian first slide-->
                                        <li>
                                            <input id="rad{{ $episode->id }}" type="radio" checked name="rad">
                                            <!--verticle text-->
                                            <label for="rad{{ $episode->id }}"><span class="team-name text-white">{{ $episode->title }}</span></label>
                                            <div class="accslide d-flex">
                                                <div class="team-inner">
                                                    <div class="team-about">
                                                        <p>
                                                           {{ $episode->description }}
                                                            <br><br>
                                                            {{ $episode->airing_time }}
                                                        </p>
                                                        <span class="hr-line ml-0 mt-4 mb-4"></span>
                                                        <a href="/episode/show/{{ $episode->id }}">Watch</a>
                                                    </div>
                                                    <div class="team-img">
                                                        <img src="{{ asset('uploads/' . $episode->thump) }}" alt="team-img">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                @endforeach
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--team end-->

@endsection
