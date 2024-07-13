@extends('layouts.userpanel.master')

@section('title', 'Used 2018 Audi S8')
@section('description', 'Description for Used 2018 Audi S8')
@section('keywords', 'Used, Audi, S8, 2018')

@section('addCss')

<style>
    .text-al-center{
        text-align: center;
    }
    .col-white{
        color: white;
    }
    .col-theme{
        color: #153e4b;
    }

    .single-field.col-lomer.SumoSelect {
        border-radius: 5px;
        width: 100%;
        display: block;
        margin-bottom: 15px;
    }
    .single-field.col-lomer.SumoSelect .SumoSelect {
        width: 100%;
        display: block;
        border-radius: 5px;
    }

    .slick-dots {
        display: flex;
        justify-content: center;
        align-items: center;
        bottom: 15px;
    }

    .slick-dots li {
        display: inline-block;
        margin: 0 5px; /* Adjust margin to your preference */
    }

    .slick-dots li button:before {
        font-size: 12px;
        color: #fff;
    }

    .slick-dots li.slick-active button:before {
        color: #ff0000;
    }

    .u-slick__pagination {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        right: 0;
        bottom: 15px;
        left: 0;
    }

    .u-slick__pagination--long {
        width: 100%;
    }

    .u-slick__pagination li {
        margin: 0 5px;
    }

    .u-slick__pagination li span {
        background-color: #000;
        border: none;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        display: block;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .u-slick__pagination li.slick-active span {
        background-color: rgba(254, 56, 39, 0.89);
    }

    .bg-img-hero {
        background-size: cover;
        background-position: center;
    }

    .min-height-420 {
        min-height: 420px;
    }

    .js-slick-carousel .slick-slide {
        position: relative;
    }

    .content {
        position: relative;
        color: white;
    }

    .fadeInUp {
        animation: fadeInUp 1s ease-in-out forwards;
    }

    .zoomIn {
        animation: zoomIn 1s ease-in-out forwards;
    }

    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes zoomIn {
        0% {
            opacity: 0;
            transform: scale(0.9);
        }
        100% {
            opacity: 1;
            transform: scale(1);
        }
    }

    .form-container {
        background: #153e4b;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        margin-top: 20px;

    }

    .form-container:hover {
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .form-container h2 {
        margin-bottom: 20px;
    }

    .form-container .form-group {
        margin-bottom: 15px;
    }

    .form-container .form-control {
        border-radius: 5px;
    }


    .slider-container {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        margin-right: 0;
    }

    .slider-content {
        padding: 20px;
    }

    .btn-fancy {
        background: linear-gradient(to right, #ff416c, #ff4b2b);
        border: none;
        color: white;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 30px;
        transition: background 0.3s ease;
    }

    .btn-fancy:hover {
        background: linear-gradient(to right, #ff4b2b, #ff416c);
    }
    .slider-btn {
        list-style: none;
        padding: 0;
        display: flex; /* Ensures that list items are laid out in a horizontal line */
        justify-content: center; /* Centers the buttons horizontally */
        align-items: center; /* Aligns the buttons vertically */
    }

    .slider-btn li {
        margin-right: 10px; /* Adds some space between the buttons */
    }
    .main-btn {
        background-color: #1bc744;
    }
    .slider-btn a {

        transition: background-color 0.3s, transform 0.3s;
    }

    .slider-btn a:hover {
        background-color: #000000;
        transform: scale(1.05); /* Slightly enlarges the button on hover */
    }

</style>

@endsection


@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12" style="margin-top:1.3%">
                <div class="bg-img-hero slider-container" style="background-image: url('http://www.farom.com/img/1920X422/img1.jpg');">
                    <div class="container min-height-420 overflow-hidden position-relative">
                        <div class="js-slick-carousel u-slick">
                            <div class="js-slide bg-img-hero-center">
                                <div class="row min-height-420 py-7 py-md-0 content slider-content">
                                    <div class="offset-xl-3 col-xl-4 col-6 mt-md-8">
                                        <h1 class="font-size-64 text-lh-57 font-weight-light" data-scs-animation-in="fadeInUp">
                                            THE NEW <span class="d-block font-size-55">STANDARD</span>
                                        </h1>
                                        <h6 class="font-size-15 font-weight-bold mb-3" data-scs-animation-in="fadeInUp" data-scs-animation-delay="0.2s">
                                            UNDER FAVORABLE SMARTWATCHES
                                        </h6>
                                        <div class="mb-4" data-scs-animation-in="fadeInUp" data-scs-animation-delay="0.3s">
                                            <span class="font-size-13 col-theme">FROM</span>
                                            <div class="font-size-50 font-weight-bold text-lh-45 col-theme">
                                                <sup>$</sup>749<sup>99</sup>
                                            </div>
                                        </div>
                                        <a href="../shop/single-product-fullwidth.html" class="btn btn-fancy" data-scs-animation-in="fadeInUp">
                                            Start Buying
                                        </a>
                                    </div>
                                    <div class="col-xl-5 col-6 d-flex align-items-center" data-scs-animation-in="zoomIn">
                                        <img class="img-fluid" src="{{asset('images/mercedes-benz/g-class/body-kit-mercedes-benz-g-wagon.png')}}" alt="Image Description">
                                    </div>
                                </div>
                            </div>
                            <div class="js-slide bg-img-hero-center">
                                <div class="row min-height-420 py-7 py-md-0 content slider-content">
                                    <div class="offset-xl-3 col-xl-4 col-6 mt-md-8">
                                        <h1 class="font-size-64 text-lh-57 font-weight-light" data-scs-animation-in="fadeInUp">
                                            THE NEW <span class="d-block font-size-55">STANDARD</span>
                                        </h1>
                                        <h6 class="font-size-15 font-weight-bold mb-3" data-scs-animation-in="fadeInUp" data-scs-animation-delay="0.2s">
                                            UNDER FAVORABLE SMARTWATCHES
                                        </h6>
                                        <div class="mb-4" data-scs-animation-in="fadeInUp" data-scs-animation-delay="0.3s">
                                            <span class="font-size-13">FROM</span>
                                            <div class="font-size-50 font-weight-bold text-lh-45">
                                                <sup>$</sup>749<sup>99</sup>
                                            </div>
                                        </div>
                                        <a href="../shop/single-product-fullwidth.html" class="btn btn-fancy" data-scs-animation-in="fadeInUp" data-scs-animation-delay="0.4s">
                                            Start Buying
                                        </a>
                                    </div>
                                    <div class="col-xl-5 col-6 d-flex align-items-center" data-scs-animation-in="zoomIn" data-scs-animation-delay="0.5s">
                                        <img class="img-fluid" src="{{asset('img/416X420/img2.png')}}" alt="Image Description">
                                    </div>
                                </div>
                            </div>
                            <div class="js-slide bg-img-hero-center">
                                <div class="row min-height-420 py-7 py-md-0 content slider-content">
                                    <div class="offset-xl-3 col-xl-4 col-6 mt-md-8">
                                        <h1 class="font-size-64 text-lh-57 font-weight-light" data-scs-animation-in="fadeInUp">
                                            THE NEW <span class="d-block font-size-55">STANDARD</span>
                                        </h1>
                                        <h6 class="font-size-15 font-weight-bold mb-3" data-scs-animation-in="fadeInUp" data-scs-animation-delay="0.2s">
                                            UNDER FAVORABLE SMARTWATCHES
                                        </h6>
                                        <div class="mb-4" data-scs-animation-in="fadeInUp" data-scs-animation-delay="0.3s">
                                            <span class="font-size-13">FROM</span>
                                            <div class="font-size-50 font-weight-bold text-lh-45">
                                                <sup>$</sup>749<sup>99</sup>
                                            </div>
                                        </div>
                                        <a href="../shop/single-product-fullwidth.html" class="btn btn-fancy" data-scs-animation-in="fadeInUp" data-scs-animation-delay="0.4s">
                                            Start Buying
                                        </a>
                                    </div>
                                    <div class="col-xl-5 col-6 d-flex align-items-center" data-scs-animation-in="zoomIn" data-scs-animation-delay="0.5s">
                                        <img class="img-fluid" src="{{asset('img/416X420/img3.png')}}" alt="Image Description">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="js-pagination u-slick_pagination u-slick_pagination--long mb-3 mb-md-4"></ul>
                    </div>
                </div>
            </div>



            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                <div class="form-container">
                    <header style="margin-bottom: 1rem;">
                        <div style="display: flex; align-items: center;">
                            <div style="display: flex; flex-direction: column; margin-right: 10px;">
                                <h2 class="text-al-center" style="color: white; margin: 0; padding: 0;">
                                    <i class="fa fa-whatsapp"></i> SEND ENQUIRY
                                </h2>
                                <span style="color: white; margin: 0; padding: 2px 0;">MERCEDES G CLASS SPARE PARTS</span>
                            </div>
                            <img src="{{asset('images/mercedes-benz/mercedes-parts.png')}}">
                        </div>
                        <hr style="border: 1px solid white;">
                    </header>
                    <form>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="name" class="col-white">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter your name">
                            </div>
                            <div class="form-group col-6">
                                <label for="email" class="col-white">Email address</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter your email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="chassis" class="col-white">Chassis Number</label>
                            <input type="text" class="form-control" id="chassis" placeholder="Enter chassis number">
                        </div>
                        <div class="form-group single-field col-lomer SumoSelect" tabindex="0" role="button" aria-expanded="false" selected-count="2" is-selected="true">
                            <label class="col-white">{{('index.PARTS')}}</label>
                            <select multiple="multiple" name="parts" id="parts" class="search_parts SumoUnder" tabindex="-1">
                                <optgroup label="{{('index.SELECT PARTS')}}">
                                    @foreach ($parts as $roma)
                                        <option value="{{$roma->id}}">
                                            {{('parts.'.$roma->name)}}
                                        </option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </form>
                    <ul class="slider-btn">
                        <li><a class="main-btn main-btn-2" href="#" tabindex="0">BY WHATSAPP</a></li>
                        <li><a class="main-btn" href="#" tabindex="0"><i class="ion-speedometer"></i>BY EMAIL</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('ScriptMineExtra')
    <script>
        $(document).ready(function() {
            $('.js-slick-carousel').on('beforeChange', function(event, slick, currentSlide, nextSlide) {
                var animatingElements = $(slick.$slides[nextSlide]).find('[data-scs-animation-in]');
                doAnimations(animatingElements);
            });

            $('.js-slick-carousel').slick({
                dots: true,
                infinite: true,
                speed: 500,
                fade: true,
                cssEase: 'linear',
                autoplay: true,
                autoplaySpeed: 2500,
                arrows: false,
                appendDots: $('.js-pagination'),
                customPaging: function(slider, i) {
                    return '<span></span>';
                }
            });

            $('.js-pagination').on('click', 'li', function() {
                var index = $(this).index();
                $('.js-slick-carousel').slick('slickGoTo', index);
            });

            function doAnimations(elements) {
                var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
                elements.each(function() {
                    var $this = $(this);
                    var $animationDelay = $this.data('scs-animation-delay');
                    var $animationType = 'animated ' + $this.data('scs-animation-in');

                    $this.css({
                        'animation-delay': $animationDelay,
                        '-webkit-animation-delay': $animationDelay,
                        'opacity': 0
                    });

                    $this.addClass($animationType).one(animationEndEvents, function() {
                        $this.removeClass($animationType);
                        $this.css('opacity', 1);
                    });

                    setTimeout(function() {
                        $this.css('opacity', 1);
                    }, $animationDelay ? parseFloat($animationDelay) * 1000 : 0);
                });
            }

            var animatingElements = $('.js-slick-carousel .slick-current').find('[data-scs-animation-in]');
            doAnimations(animatingElements);
        });
    </script>


    <script>

        var entr = '{{ __("index.Enter here") }}';
        var crbfo = '{{ __("index.SELECT PARTS") }}';

        $('.search_parts').SumoSelect({search: true, searchText: entr+'...',placeholder: crbfo});
    </script>

@endsection