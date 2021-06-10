@extends('personal.layouts.main')

@section('content')
    <div class="about-page wrapper">
        @include('includes.navbar')
        <div class="about-info">
            <div class="container">
                <div class="row mx-0">
                    <div class="about">
                        <h1 class="h1-about er">About</h1>
                        {!! $aboutSettings !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="history mt-3">
            <div class="container">
                <div class="row mx-0">
                    <div class="history-info">
                        <h1 class="h1-about">Our History</h1>
                        <ul class="history-list">
                            <li class="wow fadeInLeft" style="animation-delay: 0.5s">
                                <p>
                                    <span class="h6">
                                        <i class="far fa-calendar-alt"></i>
                                        May 2016
                                    </span>
                                    <span>
                                        Our developer, Jaxon Strickland, was really interested in cryptocurrencies. At this time he realised, that he want to create the best platform for trading and cryptocurrency storage.
                                    </span>
                                </p>
                            </li>
                            <li class="wow fadeInRight" style="animation-delay: 0.7s">
                                <p>
                                <span class="h6">
                                    <i class="far fa-calendar-alt"></i>
                                    June 2016
                                </span>
                                    <span>
                                    Developer started collecting the team to make his vision come true.
                                </span>
                                </p>
                            </li>
                            <li class="wow fadeInLeft" style="animation-delay: 0.5s">
                                <p>
                                <span class="h6">
                                    <i class="far fa-calendar-alt"></i>
                                    August 2016
                                </span>
                                    <span>
                                    Jaxon with his friens, Teresa Alsopp and Susan Baldwin, started their huge work in creating Chartrade platform.
                                </span>
                                </p>
                            </li>
                            <li class="wow fadeInRight" style="animation-delay: 0.7s">
                                <p>
                                <span class="h6">
                                    <i class="far fa-calendar-alt"></i>
                                    July 2017
                                </span>
                                    <span>
                                    The Chartrade Exchange was officially registered as a platform for trading and storage of cryptocurrency.
                                </span>
                                </p>
                            </li>
                            <li class="wow fadeInLeft" style="animation-delay: 0.5s">
                                <p>
                                <span class="h6">
                                    <i class="far fa-calendar-alt"></i>
                                    March 2018
                                </span>
                                    <span>
                                    Secured Deal section has been created.
                                </span>
                                </p>
                            </li>
                            <li class="wow fadeInRight" style="animation-delay: 0.7s">
                                <p>
                                <span class="h6">
                                    <i class="far fa-calendar-alt"></i>
                                    December 2018
                                </span>
                                    <span>
                                    At the initiative of Teresa Alsopp, a verification procedure was introduced.
                                </span>
                                </p>
                            </li>
                            <li class="wow fadeInLeft" style="animation-delay: 0.5s">
                                <p>
                                <span class="h6">
                                    <i class="far fa-calendar-alt"></i>
                                    January 2019
                                </span>
                                    <span>
                                    Binary options have been added to the trading section.
                                </span>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="place">
            <div class="container">
                <div class="row wow fadeInDown bg-block p-4 mx-0">
                    <div class="mb-5">
                        <p class="h1 text-white">Our place</p>
                        <p class="h5">
                            {{ \App\Models\Setting::getAddress() }}
                        </p>
                    </div>
                    <div class="row mx-0">
                        <div class="col-md-6 col-sm-12">
                            <img src="images/building.jpg" class="w-100 h-100" alt="building"/>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <?php
                            $link = "https://maps.google.com/maps?width=100%&height=100%&hl=en&q=". \App\Models\Setting::getAddress() ."&ie=UTF8&t=&z=16&iwloc=B&output=embed"
                            ?>
                            <iframe
                                class="w-100 h-100"
                                src="{{ $link }}"
                                frameborder="0"
                                scrolling="no"
                                marginheight="0"
                                marginwidth="0"
                            ></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bottom-bg">
            @include('includes.footer')
        </div>

    </div>
@endsection


