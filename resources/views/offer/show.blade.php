<style>
.skin-black .content-header {
    display: none;
}
</style>
<link href="/vendor/laravel-admin/test/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen">
<link href="/vendor/laravel-admin/test/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/vendor/laravel-admin/test/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/vendor/laravel-admin/test/demo.css">
<link href="/vendor/laravel-admin/test/animate.min.css" rel="stylesheet" type="text/css">
<link href="/vendor/laravel-admin/test/jquery.scrollbar.css" rel="stylesheet" type="text/css">
<link href="/vendor/laravel-admin/test/datepicker.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/vendor/laravel-admin/test/rickshaw.css" type="text/css" media="screen">
<link rel="stylesheet" href="/vendor/laravel-admin/test/mapplic.css" type="text/css" media="screen">
<link href="/vendor/laravel-admin/test/messenger.css" rel="stylesheet" type="text/css" media="screen">
<link href="/vendor/laravel-admin/test/messenger-theme-flat.css" rel="stylesheet" type="text/css" media="screen">
<link href="/vendor/laravel-admin/test/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" media="screen">

<link rel="stylesheet" href="/vendor/laravel-admin/analytic/bootstrap-select.min.css">
<script src="/vendor/laravel-admin/analytic/bootstrap-select.min.js"></script>
<script src="/vendor/laravel-admin/analytic/clipboard.min.js"></script>
<script>var switch_theme = 0;</script>
<script src="/vendor/laravel-admin/test/jquery.cookie.js"></script>
<script>
    window.networks = [{"net":"net","name":"All networks","uid":"","role":""}];
    window.net = 'net';
    window.selectedUid = '';
    window.selectedRole = '';
</script>
<script src="/vendor/laravel-admin/test/main.js"></script>


<!-- END PLUGIN CSS -->
<!-- BEGIN CORE CSS FRAMEWORK -->
{{--<link href="/vendor/laravel-admin/test/icon" rel="stylesheet">--}}

<link href="/vendor/laravel-admin/test/webarch.css" rel="stylesheet" type="text/css">
<link href="/vendor/laravel-admin/test/custom.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/vendor/laravel-admin/test/links_img.css">
<!-- END CORE CSS FRAMEWORK -->

<style>.cke {
        visibility: hidden;
    }</style>
<!-- TEXT EDITOR -->

<script>var switch_theme = 0;</script>
<link href="/vendor/laravel-admin/test/lity.css" rel="stylesheet">

<div class="pace  pace-inactive">
    <div class="pace-progress" data-progress-text="100%" data-progress="99"
         style="transform: translate3d(100%, 0px, 0px);">
        <div class="pace-progress-inner"></div>
    </div>
    <div class="pace-activity"></div>
</div>
<form method="POST" id="form_id">
    <div class="page-container row-fluid">

        <link href="/vendor/laravel-admin/test/network.css" rel="stylesheet" type="text/css">

        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}"/>
        <div class="form-group">

            <div class="col-sm-4" style="width: 20%!important;">
                <select id="category" name="usertype" class="selectpicker show-tick form-control" multiple
                        data-max-options="3" data-live-search="true" data-none-selected-text="Select Offers Categories"
                        data-size="10">
                    @foreach ($data['category_list'] as $key=>$item)
                        <option value="{{$item['id']}}"
                                data-content="{{$item['category_name']}}">{{$item['category_name']}}</option>
                    @endforeach
                </select>
            </div>


            <div class="col-sm-4" style="width: 20%!important;">
                <select id="geos" name="usertype" class="selectpicker show-tick form-control" multiple
                        data-max-options="3"
                        data-live-search="true" data-none-selected-text="Select Offers Geos" data-size="10">
                    @foreach ($data['geos_list'] as $key=>$item)
                        <option value="{{$item['id']}}"
                                data-content="{{$item['country']}}">{{$item['country']}}</option>
                    @endforeach

                </select>
            </div>


            <div class="col-sm-4" style="width: 20%!important;">
                <select id="sort" name="usertype" class="selectpicker show-tick form-control" data-max-options="3"
                        data-live-search="true" data-none-selected-text="Order By">

                    <option value="0"
                            data-content="Release Date (Newest on Top)">
                        Release Date (Newest on Top)
                    </option>
                    <option value="1"
                            data-content="Release Date (Oldest on Top)">
                        Release Date (Oldest on Top)
                    </option>
                    <option value="2" data-content="Payout (High to Low)">
                        Payout
                        (High to Low)
                    </option>
                    <option value="3" data-content="Payout (Low to High)">
                        Payout
                        (Low to High)
                    </option>
                </select>
            </div>

            <div class="row">
                <div class="col-sm-4" style="width: 20%!important;">
                    <input type="text" class="form-control" id="keyword" value="" placeholder="搜索...">

                    <p id="keyword1"></p>


                </div>
                <button id="searchBtn" class="btn btn-primary">搜索</button>
            </div>
        </div>


        <div class="col-sm-12">
            <div class="row">
                <h4><span class="semi-bold"></span></h4>
                <div class="tools tracking_block">
                    <a href="javascript:;" class="collapse"></a>
                    <div class="col-mlg-12">
                        <div class="row">

                            <!--内容开始-->
                            <div class="categories_offer_left">


                                @foreach($data['offer'] as $key=>$offer)

                                <div class="col-md-6 accord" data-offer_db="KneeBoost Pro <?php echo $key;?>">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="active"><a href="#tab<?php echo $key;?>Offer" role="tab" data-toggle="tab">Summary</a></li>
                                        <li><a href="#tab<?php echo $key;?>Description" role="tab" data-toggle="tab">Description</a></li>
                                        <li><a href="#tab<?php echo $key;?>Geos" role="tab" data-toggle="tab">Accepted Geos</a></li>
                                        <li><a href="#tab<?php echo $key;?>Top_Geos" class="tab_top_geo" role="tab" data-toggle="tab">Top Geos</a></li>
                                        <li><a href="#tab<?php echo $key;?>Tracking" role="tab" data-toggle="tab">Tracking Links</a></li>
                                        <li><a href="#tab<?php echo $key;?>ProductsFeed" role="tab" data-toggle="tab">Products Data Feed</a></li>
                                        <li><a href="#tab<?php echo $key;?>Creative" role="tab" data-toggle="tab">Creatives</a></li>
                                        <li><a href="#tab<?php echo $key;?>Pixel_Postback" class="offers-tab-pixels" data-offer-id="<?php echo $offer['id'];?>" role="tab" data-toggle="tab">Pixels/Postbacks</a></li>
                                    </ul>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"></a>
                                        <a href="#grid-config" data-toggle="modal" class="config"></a>
                                        <a href="javascript:;" class="reload"></a><a href="javascript:;" class="remove"></a>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab<?php echo $key;?>Offer">
                                            <div class="row column-seperation"><div class="col-md-12">
                                                    <table class="table table-striped table-flip-scroll cf">
                                                        <thead class="cf">


                                                        @php

                                                            $land = '';
                                                            if(!empty($offer['track_list'])){
                                                                foreach ($offer['track_list'] as $x=>$y){
                                                                   $land = isset($offer['track_list'][$x][0]['land_link']) ? $offer['track_list'][$x][0]['land_link'] : '';
                                                                }
                                                            }
                                                        @endphp

                                                        <tr>
                                                            <th><a href="{{$land}}" target="_blank"><span class="offer-product-img-container" data-original-title="" title="">
                                                                        <img src="{{env('APP_URL').'/upload/'.$offer['image']}}" alt="KneeBoost Pro"></span>Offer Preview <i class="icon ion-eye"></i>

                                                                </a></th>


                                                            <th>Payout</th>
                                                            <th>Status</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td width="55%">{{$offer['offer_name']}}</td>
                                                            <td width="25%">${{$offer['offer_price']}} Per Sale</td>
                                                            <td width="20%">

                                                                @if($offer['offer_status']==1)
                                                                    <span class="label label-success">Live</span>
                                                                @else
                                                                    <span class="label label-warning">Paused</span>
                                                            @endif
                                                            </td>

                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="tab-pane" id="tab<?php echo $key;?>Description">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p></p>
                                                    <p><strong>{{$offer['des']}}</strong></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="tab<?php echo $key;?>Geos">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p></p><p>{{$offer['accepted_area']}}</p>
                                                    <p></p><p></p>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="tab-pane top_geos_tab" id="tab<?php echo $key;?>Top_Geos">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="top_geos_graph">
                                                        <div class="col-xs-12">
                                                            <div class="row">
                                                                <div class="col-xs-12 col-md-6 col-lg-4 use_small_padding">
                                                                    <div class="row">
                                                                        <div class="col-xs-12">
                                                                            <select class="list_date select2_list padding_left" data-suffix="geo" style="margin-bottom: 10px;" name="date" id="">
                                                                                <option value="today">Today</option>
                                                                                <option value="yester">Yesterday</option>
                                                                                <option value="week">Current Week</option>
                                                                                <option value="month">Current Month</option>
                                                                                <option value="year">Year To Date</option>
                                                                                <option value="l_week">Last Week</option>
                                                                                <option value="l_month">Last Month</option>
                                                                                <option value="calendar">Custom</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-12 col-md-6 col-lg-4 use_small_padding calendar_padding">
                                                                    <div class="col-xs-4 col-sm-4">
                                                                        <div class="row">
                                                                            <div class="about_color">
                                                                                <p class="about_inputs">Start</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="input-append success col-xs-8 col-sm-8">
                                                                        <div class="row">
                                                                            <input type="text" class="form-control date_start">
                                                                            <span class="add-on">
                                                                            <span class="arrow"></span><i class="fa fa-th"></i>
                                                                        </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-12 col-md-6 col-lg-4 use_small_padding calendar_padding">
                                                                    <div class="col-xs-4 col-sm-4">
                                                                        <div class="row">
                                                                            <div class="about_color">
                                                                                <p class="about_inputs">End</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="input-append success col-xs-8 col-sm-8">
                                                                        <div class="row">
                                                                            <input type="text" class="form-control date_end">
                                                                            <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <table class="table no-more-tables geo_table">
                                                                    <thead>
                                                                    <tr>
                                                                        <th style="width:30%">COUNTRY</th>
                                                                        <th style="width:20%">Percentage</th>
                                                                        <th style="width:50%">Distribution</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody></tbody>
                                                                </table>
                                                                <div style="display:none;" class="geo_date_no_data">
                                                                    <p>Morpheus: Throughout human history, we have been dependent on machines to survive. Fate, it seems, is not without a sense of irony.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wait_loader">
                                                <img src="images/squares-preloader-gif.svg" alt="">
                                            </div>
                                        </div>




                                        <div class="tab-pane" id="tab<?php echo $key;?>Tracking">
                                            <div class="row">
{{--                                                <div class="col-md-12">--}}

{{--                                                </div>--}}
                                                <div class="col-md-12">
                                                    <br>
                                                    <p>{{$offer['track_des']}}</p>

                                                    <!-- dropdown domains -->
                                                    <div class="btn-group m-b-30">
                                                        <a class="btn btn-success dropdown-toggle m-b-5" data-toggle="dropdown" href="#">Select your tracking domain<span class="caret"></span></a>
                                                        <ul class="dropdown-menu domains-menu">

                                                         @foreach($offer['offersDomain'] as $m=>$n)
                                                            <li><a href="#" class="offersDomain" data-domain="{{$n['delivery_link']}}">{{$n['delivery_link']}}</a></li>
                                                            @endforeach

                                                        </ul>
                                                    </div>
                                                    <!-- end dropdown domains -->

                                                    <div class="row">
                                                        <div class="col-md-12">

                                                            <!-- filter tabs -->
                                                            <div class="tabbable tabs-left tabs-bg">

                                                                <ul class="nav nav-tabs" role="tablist">

                                                                    @php
                                                                        $index = 0;
                                                                    @endphp
                                                                    @foreach ($offer['track_list'] as $key2=>$item2)

                                                                        @if($index ==0)
                                                                            <li class="active"><a href="#provenorderpages-<?php echo $key2.$key?>" role="tab" data-toggle="tab"><?php echo $key2?></a></li>
                                                                        @else
                                                                            <li><a href="#provenorderpages-<?php echo $key2.$key?>" role="tab" data-toggle="tab"><?php echo $key2?></a></li>
                                                                        @endif

                                                                        @php
                                                                            $index++;
                                                                        @endphp

                                                                    @endforeach
                                                                </ul>


                                                                <div class="tab-content">
                                                                    @php
                                                                        $index1 = 0;
                                                                    @endphp

                                                                    @foreach ($offer['track_list'] as $key3=>$item3)
                                                                        @if($index1==0)
                                                                            <div class="tab-pane active" id="provenorderpages-<?php echo $key3.$key?>">
                                                                                @else
                                                                                    <div class="tab-pane" id="provenorderpages-<?php echo $key3.$key?>">
                                                                                        @endif

                                                                                        @php
                                                                                            $index1++;
                                                                                        @endphp

                                                                        <div class="row">


                                                                            @foreach ($item3 as $key4=>$item4)


                                                                            <div class="col-md-12">
                                                                                <div class="padding-for_links">
                                                                                    <div>{{$item4['track_name']}}</div>
                                                                                    <input readonly="" type="text" class="form-control trecking_link clipboard-0-0-0 dynamicDomainTrackingLink clipboard-1-0-0-1{{$key2.'-'.$key3.'-'.$key4}}" value="{{$item4['track_link']}}">
                                                                                    <a href="{{$item4['track_link']}}" target="_blank" class=" dynamicDomainTrackingLink">
                                                                                        <i class="icon ion-eye pull-right"></i>
                                                                                    </a>
                                                                                    <a class="copp pull-right btn btn-success btn-cons copy-button" data-clipboard-action="copy" data-clipboard-target=".clipboard-1-0-0-1{{$key2.'-'.$key3.'-'.$key4}}">Copy</a>
                                                                                </div>
                                                                            </div>

                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                </div>

                                                            </div>
                                                            <!-- end filter tabs -->

                                                            <div class="clearfix"></div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="tab<?php echo $key;?>ProductsFeed">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p>Want to Sell on More Channels? Tap into the power of product listing optimization and import our entire product list.</p>
                                                    <p>You can find below the entire catalogue automated Products Data Feed, for easy submit to shopping channels and all the major marketplaces.</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <!-- dropdown domains -->
                                                    <div class="btn-group m-b-30">
                                                        <a class="btn btn-success dropdown-toggle m-b-5" data-toggle="dropdown" href="#">Select your Products Feed domain<span class="caret"></span></a>
                                                        <ul class="dropdown-menu domains-menu domains-menu-feed">
                                                            <li><a href="#" class="offersDomain" data-domain="https://urgoodeal.com">https://urgoodeal.com</a></li>
                                                            <li><a href="#" class="offersDomain" data-domain="https://xtechgadget.com">https://xtechgadget.com</a></li>
                                                            <li><a href="#" class="offersDomain" data-domain="https://popularhitech.com">https://popularhitech.com</a></li>
                                                            <li><a href="#" class="offersDomain" data-domain="https://buysmartproduct.com">https://buysmartproduct.com</a></li>
                                                            <li><a href="#" class="offersDomain" data-domain="https://storepx.com">https://storepx.com</a></li>
                                                            <li><a href="#" class="offersDomain" data-domain="https://airportxshop.com">https://airportxshop.com</a></li>
                                                            <li><a href="#" class="offersDomain" data-domain="https://flightxshop.com">https://flightxshop.com</a></li>
                                                            <li><a href="#" class="offersDomain" data-domain="https://blackfridaytechs.com">https://blackfridaytechs.com</a></li>
                                                            <li><a href="#" class="offersDomain" data-domain="https://techchristmasgift.com">https://techchristmasgift.com</a></li>
                                                            <li><a href="#" class="offersDomain" data-domain="https://gadgetronixs.com">https://gadgetronixs.com</a></li>
                                                            <li><a href="#" class="offersDomain" data-domain="https://luxurygadgetx.com">https://luxurygadgetx.com</a></li>
                                                            <li><a href="#" class="offersDomain" data-domain="https://newxventions.com">https://newxventions.com</a></li>
                                                            <li><a href="#" class="offersDomain" data-domain="https://appgogadget.com">https://appgogadget.com</a></li>
                                                            <li><a href="#" class="offersDomain" data-domain="https://todaystech.co">https://todaystech.co</a></li>
                                                        </ul>
                                                    </div>
                                                    <!-- end dropdown domains -->
                                                </div>

                                                <div class="col-md-12">
                                                    <div>Products Feed - All Products</div>
                                                    <input readonly="" type="text" class="form-control trecking_link clipboard-ProductsFeed-0 dynamicDomainTrackingLink" value="https://popularhitech.com/feed?net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}">
                                                    <a href="https://popularhitech.com/feed?net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}" target="_blank" class="dynamicDomainTrackingLink">
                                                        <i class="icon ion-eye pull-right"></i>
                                                    </a>
                                                    <button class="copp pull-right btn btn-success btn-cons" data-clipboard-action="copy" data-clipboard-target=".clipboard-ProductsFeed-0">Copy</button>
                                                </div>

                                            </div>
                                        </div>


                                        <div class="tab-pane" id="tab<?php echo $key;?>Creative">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    @foreach ($offer['creatives'] as $k1=>$i1)
                                                        <p></p><p>{{$i1['name']}}</p>
                                                        <p>
                                                            <a href="{{$i1['link']}}"
                                                               target="_blank">{{$i1['link']}}</a></p>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>



                                        <div class="tab-pane" id="tab<?php echo $key;?>Pixel_Postback">
                                            <div class="wait_loader offers-tab-pixels-loader" data-offer-id="<?php echo $offer['id'];?>">
                                                <img src="images/squares-preloader-gif.svg" alt="preloader">
                                            </div>
                                            <div class="offers-tab-pixels-container" data-offer-id="<?php echo $offer['id'];?>"></div>
                                        </div>
                                    </div>
                                </div>

                                    @endforeach


                            </div>


                        </div>




                    </div>
                </div>
                <!-- Modal -->
                <div id="change_tracking" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">×</button>
                                <h4 class="modal-title">Change Tracking</h4>
                            </div>
                            <div class="modal-body">
                                <form class="offer_user_tracking" action="?id=offer" id="offer_user_tracking">
                                    <input hidden="" type="text" id="u_id" name="u_id" value="933d42b67e4cf2968f3b0c90f1e2ec79">
                                    <div style="text-align: center;">
                                        <input class="btn btn-primary btn-cons" type="button" id="add_pixel" value="Add Pixel">
                                        <input class="btn btn-primary btn-cons" type="button" id="add_postback"
                                               value="Add Post Back">
                                    </div>
                                    <div class="pixels">

                                    </div>
                                    <div style="text-align: center;">
                                        <input class="btn btn-success btn-cons save_pixels hidden" type="submit" value="submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- END PAGE CONTAINER -->

        <!-- Modal -->
        <div class="modal fade" id="notification_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <br>
                        <div class="cbp_tmicon primary animated bounceIn notification_modal_image">
                            <!-- Notification image-->
                        </div>
                        <div class="notification_modal_head_block">
                            <h4 id="notification_modal_Label" class="semi-bold text-info"></h4>
                            <p><span class="data_notification"></span> <span class="time_notification"></span></p>
                            <p class="m-10"></p>
                            <div class="container_notify">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div id="chat-panel">
            <div class="chat-outer">
                <div class="chat-container" id="chatContainer"></div>
                <div id="loader" class="loader-overlay">
                    <!--Rounded loader-->
                    <!--<div class="loader-spinner"></div>-->

                    <!--M4trix Loader-->
                    {{--                    <img src="/vendor/laravel-admin/test/squares-preloader-gif.svg" alt="">--}}
                </div>
                <div class="input-container">
                    <input type="text" id="userInput" placeholder="Type your message...">
                    <button id="sendButton"
                    '="">Send</button>
                </div>
            </div>
        </div>


        <div class="modal fade" id="wantAnOfferModal" tabindex="-1" role="dialog" aria-labelledby="wantAnOfferModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">

                <div class="modal-content wantAnOfferModalContent">
                    <form id="formWantOffer" name="formWantOffer" action="?id=offer#" role="form" autocomplete="off"
                          class="validate" novalidate="novalidate">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 id="wantAnOfferModalLabel" class="semi-bold">
                                Can’t Find What You Are Looking For?
                                <br>
                                Submit a Product/Offer to the M4TRIX.
                            </h4>
                            <p class="no-margin">We can onboard any E-Commerce offers within a few days.</p>
                            <p class="no-margin">Kindly share as much details as possible to allow our team to find your
                                product faster.</p>
                            <p class="no-margin">Useful information include product name, description, listing &amp;
                                pictures.</p>
                            <br>
                        </div>
                        <div class="modal-body">
                            <div class="row form-row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Enter the details about the product(s) you would like to
                                            Onboard on the M4TRIX</label>
                                        <textarea rows="5" name="wantOffer[message]" class="form-control" required=""
                                                  aria-required="true"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Product/Offer Link(s)</label>
                                        <input name="wantOffer[product]" class="form-control input-sm" type="text"
                                               placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Expected Payout</label>
                                        <input name="wantOffer[expPayout]" class="form-control input-sm" type="text"
                                               placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Expected Volume</label>
                                        <input name="wantOffer[expVolume]" class="form-control input-sm" type="text"
                                               placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Geo(s)</label>
                                        <input name="wantOffer[geos]" class="form-control input-sm" type="text"
                                               placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Request The Offer</button>
                        </div>
                    </form>
                </div>

                <div class="modal-content wantAnOfferModalResultContent hidden">
                    <div class="modal-body body-success hidden">
                        <h4 class="semi-bold">Thank you <span class="name"></span>!</h4>
                        <p>Your Offer Request was transmitted successfully to one of our product team analyst.</p>
                        <p>We will get back to your directly via E-mail or Skype regarding the setup of the offer.</p>
                        <p>The M4TRIX shall use a vast amount of human power to respond to your query as soon as
                            possible.</p>
                        <p>Let us lead the fight against the machines.</p>
                    </div>
                    <div class="modal-body body-error hidden">
                        <p>This does not happen often, The M4TRIX just had a glitch :(</p>
                        <p>Your message was lost in the inner space of CPU and RAM Power. The Machines have won this round I
                            am afraid.</p>
                        <p>Kindly try re-sending it. If the error persists, please contact <span class="sendToEmail"></span>.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>        <!-- Modal -->


        <div class="modal fade modal-v-center" id="userTutorialExploreModal" tabindex="-1" role="dialog"
             aria-labelledby="userTutorialExploreModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                        <h3 class="modal-title text-left" id="userTutorialExploreModalLabel">Ready to get started?</h3>
                    </div>
                    <div class="modal-body text-left">
                        <p>Go to <a href="?id=offer" class="text-info">Offers</a> to pick your winning campaign!</p>
                        <p>Your Affiliate Manager is available to get you started on the M4TRIX Journey, get to know each
                            other!</p>
                        <p class="m-0">For any other inquiry, visit our <a href="?id=faq" class="text-info">Help Center</a>
                            or report directly to our communication deck at <span
                                class="text-info">crew@m4trix.network</span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
                        <button type="button" class="btn btn-primary btnTutorialDone" data-explore="1">Get Started</button>
                    </div>
                </div>
            </div>
        </div>


        <div
            style="left: -1000px; overflow: scroll; position: absolute; top: -1000px; border: none; box-sizing: content-box; height: 200px; margin: 0px; padding: 0px; width: 200px;">
            <div
                style="border: none; box-sizing: content-box; height: 200px; margin: 0px; padding: 0px; width: 200px;"></div>
        </div>


</form>
<script>

    $(function () {
        $('.selectpicker').selectpicker();
    });

    $(document).ready(function() {
        // 初始化 Clipboard.js


        var ulElements = document.querySelectorAll('.categories_offer_right ul');

        // 循环遍历每个<ul>元素
        ulElements.forEach(function (ul) {

            // console.log('Inner Value:', innerValue);


            var ul_id = ul.id;

            // if (ul_id.indexOf("myList") !== -1) {
            //     // 含有该字符
            // }

            // console.log('Inner Value:', ul_id);

            if (ul_id.indexOf("myList") !== -1) {
                // 获取目标<li>元素的文本内容
                // var value = li.textContent || li.innerText;
                var liElements = ul.querySelectorAll('li');


                liElements.forEach(function (innerLi) {
                    // 获取内层<li>元素的文本内容
                    var innerValue = innerLi.textContent || innerLi.innerText;

                    // 输出内层<li>元素的值
                    // console.log('Inner Value:', innerValue);
                });


                // 打印或使用该值
                // console.log('li数据',liElements);
            }


            // 获取<ul>元素下的所有<li>元素
            // var liElements = ul.querySelectorAll('li');

            // console.log('test123',liElements);


            // 循环遍历每个<li>元素
            // liElements.forEach(function (li) {
            //     // 检查是否是目标元素（这里以id为"targetItem"的元素为例）
            //     if (li.id === 'targetItem') {
            //         // 获取目标<li>元素的文本内容
            //         var value = li.textContent || li.innerText;
            //
            //         // 打印或使用该值
            //         console.log(value);
            //     }
            // });
        });








        // $('#myList li').on('click', function() {
        //     // 获取被点击的 li 的文本内容
        //     var selectedValue = $(this).text();
        //
        //     var originalValue = $("#myInput").val();
        //
        //     var hidden_value = $("#hidden_value").val();
        //
        //     console.log(hidden_value)
        //
        //
        //
        //     // 将值赋给 foreach 内部的第一个 input
        //     $('#myInput1 #myInput').val(selectedValue);
        //
        //
        //
        //
        //
        //     if ($("#myInput").val() === originalValue) {
        //         console.log("赋值成功！");
        //     } else {
        //         console.log("赋值失败！");
        //     }
        // });


    });



    $(document).ready(function() {
        // 初始化 Clipboard.js
        var clipboard = new ClipboardJS('.copy-button');
        // 处理复制成功事件
        clipboard.on('success', function(e) {
            alert('复制成功!');
            e.clearSelection(); // 清除选定文本
        });
        // 处理复制失败事件
        clipboard.on('error', function(e) {
            alert('Copy failed. Please try again.');
        });
    });


    $(document).ready(function() {
        // 初始化 Clipboard.js
        var clipboard = new ClipboardJS('.copy-button2');
        // 处理复制成功事件
        clipboard.on('success', function(e) {
            alert('复制成功1!');
            e.clearSelection(); // 清除选定文本
        });

        // 处理复制失败事件
        clipboard.on('error', function(e) {
            alert('Copy failed. Please try again.');
        });
    });




    $('#searchBtn').click(function (e) {

        e.preventDefault();
        var formData = $('#form_id').serialize();
        var keyword = $('#keyword').val();
        var _token = $('#_token').val();
        var category = $('#category').val();
        var geos = $('#geos').val();
        var sort = $('#sort').val();

        $.ajax({
            type: 'POST',
            url: '/admin/offer/query',
            data: {
                keyword: keyword,
                _token: _token,
                category: category,
                geos: geos,
                sort: sort,
            },
            success: function (data) {


                // $("#keyword1").html("Hello <b>world</b>!");

                // console.log('返回数据',123)
                //
                // alert(123)
                //
                // $("#test").html()

                $('.categories_offer_left').empty();
                $('.categories_offer_right').empty();

                $('.categories_offer_left').html(data.left_data);
                $('.categories_offer_right').html(data.right_data);

                console.info('返回数据', data)
                // console.info('返回数据1')
                // do something with the response data
            }
        });
    });

</script>
