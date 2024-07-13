<header class="header-area d-none d-lg-block">
    <div class="header-main">
        <div class="container">
            <div class="header-main-wrapper d-flex justify-content-between align-items-center">
                <div class="header-brand">
                    <a href="/">
                        <img class="custom-logo" src="{{asset('assets/images/logo.png')}}" alt="">
                    </a>
                </div>
                <div class="header-main-content d-flex">
                    <div class="single-content-block d-flex">
                        <div class="block-icon">
                            <i class="ion-android-pin"></i>
                        </div>
                        <div class="block-content media-body">
                            <span class="label">  {{ __('index.LOCATION') }}</span>

                            <span class="text">{{ __('index.DUBAI, UAE') }} </span>
                        </div>
                    </div>

                    <div class="single-content-block d-flex" style="    margin-left: 1.2rem">
                        <div class="block-icon" id="block-icon">
                            <i class="ion-android-call"></i>
                        </div>

                        <div class="block-content media-body">
                            <span class="label">  {{ __('index.Hotline') }}</span>

                            <span class="text-2"><a href="tel:05683458868">+971 555 31 34 88 </a></span>
                        </div>
                    </div>
                    <div class="single-content-block d-flex">
                        <div class="block-icon">
                            <i class="ion-clock"></i>
                        </div>
                        <div class="block-content media-body">
                            <span class="label">  {{ __('index.WORKING HOURS') }}</span>
                            <span class="text">{{ __('index.MON-FRI: 8.00 - 17.00') }}</span>
                        </div>
                    </div>
                </div>
                <div class="header-main-btn">
                    <a href="add-car.html" class="main-btn"><i class="ion-model-s"></i>  {{ __('index.Add Part') }}</a>
                </div>
            </div>
        </div>
    </div>
</header>
