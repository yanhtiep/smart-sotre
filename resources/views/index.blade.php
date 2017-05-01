@extends('layouts.frontend.layout')
@section('content')

<div class="banner-slider">
    @include('layouts.frontend.partials.slider')
</div>
<div class="main-content-home">
    <div class="container">

        @include('layouts.frontend.partials.pro_blog')
    
        <!-- Banner 01 -->
        <div class="box-adv-col2">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="item-adv-simple">
                        <a href="#"><img src="{{ASSETS_PATH}}images/home1/ad1.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="item-adv-simple">
                        <a href="#"><img src="{{ASSETS_PATH}}images/home1/ad2.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Banner 01 -->

        <div class="clearfix category-product-featured ajaxLoad yellow-box" rel="5">
            <div id="blog">
                <div class="loader"></div>
            </div>
        </div>

        <!-- Banner 02 -->
        <div class="box-adv-col2">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="item-adv-simple">
                        <a href="#"><img src="{{ASSETS_PATH}}images/home1/ad3.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="item-adv-simple">
                        <a href="#"><img src="{{ASSETS_PATH}}images/home1/ad4.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Banner 02 -->

        @include('layouts.frontend.partials.supper_deal')
        
        <div class="box-adv-col1">
            <div class="item-adv-simple">
                <a href="#"><img alt="" src="{{ASSETS_PATH}}images/home1/ad5.png"></a>
            </div>
        </div>
        <!-- End Box Adv Col1 -->
        <div class="list-partner clearfix">
            <a href="#" class="partner-link"><img src="{{ASSETS_PATH}}images/home1/pn1.png" alt="" /></a>
            <a href="#" class="partner-link"><img src="{{ASSETS_PATH}}images/home1/pn2.png" alt="" /></a>
            <a href="#" class="partner-link"><img src="{{ASSETS_PATH}}images/home1/pn3.png" alt="" /></a>
            <a href="#" class="partner-link"><img src="{{ASSETS_PATH}}images/home1/pn4.png" alt="" /></a>
            <a href="#" class="partner-link"><img src="{{ASSETS_PATH}}images/home1/pn5.png" alt="" /></a>
            <a href="#" class="partner-link"><img src="{{ASSETS_PATH}}images/home1/pn6.png" alt="" /></a>
            <a href="#" class="partner-link"><img src="{{ASSETS_PATH}}images/home1/pn7.png" alt="" /></a>
            <a href="#" class="partner-link"><img src="{{ASSETS_PATH}}images/home1/pn8.png" alt="" /></a>
            <a href="#" class="partner-link"><img src="{{ASSETS_PATH}}images/home1/pn9.png" alt="" /></a>
            <a href="#" class="partner-link"><img src="{{ASSETS_PATH}}images/home1/pn10.png" alt="" /></a>
            <a href="#" class="partner-link"><img src="{{ASSETS_PATH}}images/home1/pn11.png" alt="" /></a>
            <a href="#" class="partner-link"><img src="{{ASSETS_PATH}}images/home1/pn12.png" alt="" /></a>
            <a href="#" class="partner-link"><img src="{{ASSETS_PATH}}images/home1/pn13.png" alt="" /></a>
            <a href="#" class="partner-link"><img src="{{ASSETS_PATH}}images/home1/pn14.png" alt="" /></a>
            <a href="#" class="partner-link"><img src="{{ASSETS_PATH}}images/home1/pn15.png" alt="" /></a>
            <a href="#" class="partner-link"><img src="{{ASSETS_PATH}}images/home1/pn16.png" alt="" /></a>
            <a href="#" class="partner-link"><img src="{{ASSETS_PATH}}images/home1/pn17.png" alt="" /></a>
            <a href="#" class="partner-link"><img src="{{ASSETS_PATH}}images/home1/pn18.png" alt="" /></a>
            <a href="#" class="partner-link"><img src="{{ASSETS_PATH}}images/home1/pn19.png" alt="" /></a>
            <a href="#" class="partner-link"><img src="{{ASSETS_PATH}}images/home1/pn20.png" alt="" /></a>
            <a href="#" class="partner-link"><img src="{{ASSETS_PATH}}images/home1/pn21.png" alt="" /></a>
        </div>
    </div>
</div>

@stop