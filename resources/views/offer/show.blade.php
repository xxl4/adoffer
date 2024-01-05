
    <link href="/vendor/laravel-admin/test/select2.css" rel="stylesheet" type="text/css" media="screen">
    <link href="/vendor/laravel-admin/test/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen">
    <link href="/vendor/laravel-admin/test/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/vendor/laravel-admin/test/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="/vendor/laravel-admin/test/demo.css">
    <link href="/vendor/laravel-admin/test/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="/vendor/laravel-admin/test/animate.min.css" rel="stylesheet" type="text/css">
    <link href="/vendor/laravel-admin/test/jquery.scrollbar.css" rel="stylesheet" type="text/css">
    <link href="/vendor/laravel-admin/test/datepicker.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/vendor/laravel-admin/test/sweet-alert.css">
    <link rel="stylesheet" href="/vendor/laravel-admin/test/rickshaw.css" type="text/css" media="screen">
    <link rel="stylesheet" href="/vendor/laravel-admin/test/mapplic.css" type="text/css" media="screen">
    <link rel="stylesheet" href="/vendor/laravel-admin/test/ionicons.css" type="text/css">
    <link href="/vendor/laravel-admin/test/messenger.css" rel="stylesheet" type="text/css" media="screen">
    <link href="/vendor/laravel-admin/test/messenger-theme-flat.css" rel="stylesheet" type="text/css" media="screen">
    <link rel="icon" type="image/png" href="https://m4trix.network/Reporting-platform/images/favicon.png">
    <link href="/vendor/laravel-admin/test/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    <!-- END PLUGIN CSS -->
    <!-- BEGIN CORE CSS FRAMEWORK -->
    <link href="/vendor/laravel-admin/test/icon" rel="stylesheet">
    <link href="/vendor/laravel-admin/test/webarch.css" rel="stylesheet" type="text/css">
    <link href="/vendor/laravel-admin/test/custom.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/vendor/laravel-admin/test/links_img.css">
    <!-- END CORE CSS FRAMEWORK -->

    <style>.cke{visibility:hidden;}</style>
    <script src="u5" type="text/javascript"></script>
    <!-- TEXT EDITOR -->

    <script>var switch_theme = 0;</script>
    <link href="/vendor/laravel-admin/test/lity.css" rel="stylesheet">

    <script>
        window.networks = [{"net":"net","name":"All networks","uid":"","role":""}];
        window.net = 'net';
        window.selectedUid = '';
        window.selectedRole = '';
    </script>

{{--    <?php--}}

{{--    print_r("<pre/>");--}}
{{--    print_r($data);exit;--}}
{{--    ?>--}}



<div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
    <div class="pace-progress-inner"></div>
</div>
    <div class="pace-activity"></div></div>
    <form method="POST" id="form_id">
<div class="page-container row-fluid">

    <a href="?id=offer#" class="scrollup">Scroll</a>
    <div class="footer-widget">
        <div class="pull-right">
            <a class="exit" href="javascript:void(0);"><i class="material-icons">power_settings_new</i></a>
        </div>
        <div>
            <span class="va-sub">Network</span>
        </div>
    </div>
            <link href="/vendor/laravel-admin/test/network.css" rel="stylesheet" type="text/css">

    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
    <div class="form-group">

        <div class="col-sm-4" style="width: 20%!important;">
            <select id="category" name="usertype" class="selectpicker show-tick form-control" multiple data-max-options="3" data-live-search="true" data-none-selected-text="Select Offers Categories"  data-size="10">
                @foreach ($data['category_list'] as $key=>$item)
                <option value="{{$item['id']}}" data-content="<span class='label label-success'>{{$item['category_name']}}</span>">{{$item['category_name']}}</option>
                @endforeach
            </select>
        </div>


        <div class="col-sm-4" style="width: 20%!important;">
            <select id="geos" name="usertype" class="selectpicker show-tick form-control" multiple data-max-options="3" data-live-search="true" data-none-selected-text="Select Offers Geos"  data-size="10">
                @foreach ($data['geos_list'] as $key=>$item)
                <option value="{{$item['id']}}" data-content="<span class='label label-success'>{{$item['country']}}</span>">{{$item['country']}}</option>
                @endforeach

            </select>
        </div>



        <div class="col-sm-4" style="width: 20%!important;">
            <select id="sort" name="usertype" class="selectpicker show-tick form-control"  data-max-options="3" data-live-search="true" data-none-selected-text="Order By">

                <option value="0" data-content="<span class='label label-success'>Release Date (Newest on Top)</span>">Release Date (Newest on Top)</option>
                <option value="1" data-content="<span class='label label-success'>Release Date (Oldest on Top)</span>">Release Date (Oldest on Top)</option>
                <option value="2" data-content="<span class='label label-success'>Payout (High to Low)</span>">Payout (High to Low)</option>
                <option value="3" data-content="<span class='label label-success'>Payout (Low to High)</span>">Payout (Low to High)</option>
            </select>
        </div>

        <div class="row">
            <div class="col-sm-4" style="width: 20%!important;">
                <input type="text" class="form-control" id="keyword" value="" placeholder="搜索...">
            </div>
            <button id="searchBtn" class="btn btn-primary">搜索</button>
        </div>
    </div>




            <div class="col-sm-12">
                <div class="row">
                    <h4> <span class="semi-bold"></span></h4>
                    <div class="tools tracking_block">
                        <a href="javascript:;" class="collapse"></a>
                        <div class="col-mlg-6">
                            <div class="row">

                                <!--内容开始-->
                               <div class="categories_offer_left ">

                                   @foreach ($data['offer'] as $key=>$item)

                                    <div class="col-md-12 accord" data-offer_db="CozyTime Pro" data-marker-id="{{$item['id']}}">

                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="active"><a href="#tab0Offer_<?php echo $key;?>" role="tab" data-toggle="tab" onclick="openTab('{{$item['id'].'_'.$item['offer_name']}}')">Summary</a></li>
                                            <li><a href="#tab0Description_<?php echo $key;?>" role="tab" data-toggle="tab"  onclick="openTab('{{$item['id'].'_'.$item['des']}}')">Description</a></li>
                                            <li><a href="#tab0Geos_<?php echo $key;?>" role="tab" data-toggle="tab">Accepted Geos</a></li>

{{--                                            Top_Geos暂时拿掉--}}
{{--                                            <li><a href="#tab0Top_Geos_<?php echo $key;?>" class="tab_top_geo" role="tab" data-toggle="tab">Top Geos</a></li>--}}



                                            <li><a href="#tab0Tracking_<?php echo $key;?>" role="tab" data-toggle="tab">Tracking Links</a></li>
{{--                                            <li><a href="#tab0ProductsFeed_<?php echo $key;?>" role="tab" data-toggle="tab">Products Data Feed</a></li>--}}
                                            <li><a href="#tab0Creative_<?php echo $key;?>" role="tab" data-toggle="tab">Creatives</a></li>
{{--                                            <li><a href="#tab0Pixel_Postback_<?php echo $key;?>" class="offers-tab-pixels" data-offer-id="277" role="tab" data-toggle="tab">Pixels/Postbacks</a></li>--}}
                                        </ul>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse"></a>
                                            <a href="?id=offer#grid-config" data-toggle="modal" class="config"></a>
                                            <a href="javascript:;" class="reload"></a>
                                            <a href="javascript:;" class="remove"></a>
                                        </div>
                                        <div class="tab-content">
                                            <!-- 第一个tab内容 start-->
                                            <div class="tab-pane active" id="tab0Offer_<?php echo $key;?>">
                                                <div class="row column-seperation">
                                                    <div class="col-md-12">
                                                        <table class="table table-striped table-flip-scroll cf">
                                                            <thead class="cf">
                                                            <tr><th><a href="@if(!empty($item['track_list'][0]['track_link'])){{$item['track_list'][0]['track_link']}}
                                                             @else'' @endif" target="_blank">
                                                                        <span class="offer-product-img-container" data-original-title="" title="">
                                                                            <img src="{{$item['image']}}" alt="CozyTime Pro">
                                                                        </span>Offer Preview
                                                                        <i class="icon ion-eye"></i>
                                                                    </a>
                                                                </th>
                                                                <th>Payout</th>
                                                                <th>Status</th>
                                                            </tr></thead>
                                                            <tbody>
                                                            <tr>
                                                                <td width="55%">{{$item['offer_name']}}</td>
                                                                <td width="25%">${{$item['offer_price']}} Per Sale</td>
                                                                <td width="20%">

                                                                    @if($item['offer_status']==1)
                                                                    <span class="label label-success">Live</span>
                                                                    @else
                                                                    <span class="label label-warning">Paused</span>
                                                                    @endif

                                                                </td></tr
                                                            ></tbody></table></div></div>
                                            </div>
                                            <!-- 第一个tab内容 end  warning-->




                                            <!-- 第二个tab内容 start-->
                                            <div class="tab-pane" id="tab0Description_<?php echo $key;?>"><div class="row"><div class="col-md-12"><p></p><p>
                                            <strong>E-commerce - CozyTime Pro INTL - All Languages - EXCLUSIVE</strong></p>
                                            <p>{{$item['des']}}</p>
                                            <p></p></div></div></div>
                                            <!-- 第二个tab内容 end-->


                                            <!-- 第三个tab内容 start-->
                                            <div class="tab-pane" id="tab0Geos_<?php echo $key;?>">
                                                <div class="row"><div class="col-md-12">
                                                <p></p><p>{{$item['accepted_area']}}</p>

                                                    </div></div></div>
                                            <!-- 第三个tab内容 end-->


                                            <!-- 第四个tab内容 start-->
                                   <!--         <div class="tab-pane top_geos_tab" id="tab0Top_Geos_<?php echo $key;?>">
                                                <div class="row"><div class="col-md-12">
                                                        <div class="top_geos_graph">
                                                            <div class="col-xs-12">
                                                                <div class="row">
                                                                    <div class="col-xs-12 col-md-6 col-lg-4 use_small_padding">
                                                                        <div class="row">
                                                                            <div class="col-xs-12">
                                                                                <select class="list_date select2_list padding_left" data-suffix="geo" style="margin-bottom: 10px;" name="date" id=""><option value="today">Today</option><option value="yester">Yesterday</option><option value="week">Current Week</option><option value="month">Current Month</option><option value="year">Year To Date</option><option value="l_week">Last Week</option><option value="l_month">Last Month</option><option value="calendar">Custom</option></select></div></div></div><div class="col-xs-12 col-md-6 col-lg-4 use_small_padding calendar_padding"><div class="col-xs-4 col-sm-4"><div class="row"><div class="about_color"><p class="about_inputs">Start</p></div></div></div><div class="input-append success col-xs-8 col-sm-8"><div class="row"><input type="text" class="form-control date_start"><span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span></div></div></div><div class="col-xs-12 col-md-6 col-lg-4 use_small_padding calendar_padding"><div class="col-xs-4 col-sm-4"><div class="row"><div class="about_color"><p class="about_inputs">End</p></div></div></div><div class="input-append success col-xs-8 col-sm-8"><div class="row"><input type="text" class="form-control date_end"><span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span></div></div></div><table class="table no-more-tables geo_table"><thead><tr><th style="width:30%">COUNTRY</th><th style="width:20%">Percentage</th><th style="width:50%">Distribution</th></tr></thead><tbody></tbody></table><div style="display:none;" class="geo_date_no_data"><p>Morpheus: Throughout human history, we have been dependent on machines to survive. Fate, it seems, is not without a sense of irony.</p></div></div></div></div></div></div><div class="wait_loader"><img src="/vendor/laravel-admin/test/squares-preloader-gif.svg" alt=""></div></div>
                                                                                 -->
                                            <!-- 第四个tab内容 end-->






                                            <!-- 第五个tab内容 start-->
                                    <div class="tab-pane" id="tab0Tracking_<?php echo $key;?>">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>{{$item['track_des']}}</p>
{{--                                                <p>You can use any of the 3 custom parameters agnostically.</p>--}}
{{--                                                <p>Replace {AFFID}, {SUBID}, {CLICKID} with your own tracking variables and get them feed-backed in your pixel/postback.</p>--}}
                                            </div>
                                            <div class="col-md-12">
                                                <br>
{{--                                                <p>Traffic sources sometimes block certain URLs and/or companies, we offer different tracking domains to choose from.</p>--}}

                                                <!-- dropdown domains  tracking 下拉暂时拿掉 -->
                                                <!--
                                                <div class="btn-group m-b-30">
                                                    <a class="btn btn-success dropdown-toggle m-b-5" data-toggle="dropdown" href="?id=offer#">Select your tracking domain<span class="caret"></span></a>
                                                    <ul class="dropdown-menu domains-menu">
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://urgoodeal.com">https://urgoodeal.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://xtechgadget.com">https://xtechgadget.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://popularhitech.com">https://popularhitech.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://buysmartproduct.com">https://buysmartproduct.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://storepx.com">https://storepx.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://airportxshop.com">https://airportxshop.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://flightxshop.com">https://flightxshop.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://blackfridaytechs.com">https://blackfridaytechs.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://techchristmasgift.com">https://techchristmasgift.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://gadgetronixs.com">https://gadgetronixs.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://luxurygadgetx.com">https://luxurygadgetx.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://newxventions.com">https://newxventions.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://appgogadget.com">https://appgogadget.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://todaystech.co">https://todaystech.co</a></li>
                                                    </ul>
                                                </div>
                                                -->
                                                <!-- end dropdown domains -->

                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <!-- filter tabs -->
                                                        <div class="tabbable tabs-left tabs-bg">
{{--                                                            <ul class="nav nav-tabs" role="tablist">--}}
{{--                                                                <li class="active">--}}
{{--                                                                    <a href="?id=offer#provenorderpages-0" role="tab" data-toggle="tab">Proven Order Pages</a>--}}
{{--                                                                </li>--}}
{{--                                                                <li>--}}
{{--                                                                    <a href="?id=offer#splittestorderpages-0" role="tab" data-toggle="tab">Split-Test Order Pages</a>--}}
{{--                                                                </li>--}}
{{--                                                            </ul>--}}
                                                            <div class="tab-content">



                                                                <div class="tab-pane active" id="provenorderpages-0">
                                                                    <div class="row">
                                                                        <div class="col-md-12">


                                                                            @foreach ($item['track_list'] as $k=>$i)
                                                                            <div class="padding-for_links">
                                                                                <div>{{$i['track_name']}}</div>
                                                                                <input readonly="" type="text" class="form-control trecking_link clipboard-0-0-0 dynamicDomainTrackingLink" value="{{$i['track_link']}}" target="_blank" class=" dynamicDomainTrackingLink">
                                                                                    <i class="icon ion-eye pull-right"></i>
                                                                                </a>
                                                                                <button class="copp pull-right btn btn-success btn-cons" data-clipboard-action="copy" data-clipboard-target=".clipboard-0-0-0">Copy</button>
                                                                            </div>
                                                                            @endforeach
                                                                       <!--     <div class="padding-for_links">
                                                                                <div>Order Page 5.0 - The Minimalist</div>
                                                                                <input readonly="" type="text" class="form-control trecking_link clipboard-0-0-1 dynamicDomainTrackingLink" value="https://popularhitech.com/intl_5/?prod=cozytimepro&amp;net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}">
                                                                                <a href="https://popularhitech.com/intl_5/?prod=cozytimepro&amp;net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}" target="_blank" class=" dynamicDomainTrackingLink">
                                                                                    <i class="icon ion-eye pull-right"></i>
                                                                                </a>
                                                                                <button class="copp pull-right btn btn-success btn-cons" data-clipboard-action="copy" data-clipboard-target=".clipboard-0-0-1">Copy</button>
                                                                            </div>
                                                                            <div class="padding-for_links">
                                                                                <div>Order Page 7.0 - The Champ</div>
                                                                                <input readonly="" type="text" class="form-control trecking_link clipboard-0-0-2 dynamicDomainTrackingLink" value="https://popularhitech.com/intl_7/?prod=cozytimepro&amp;net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}">
                                                                                <a href="https://popularhitech.com/intl_7/?prod=cozytimepro&amp;net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}" target="_blank" class=" dynamicDomainTrackingLink">
                                                                                    <i class="icon ion-eye pull-right"></i>
                                                                                </a>
                                                                                <button class="copp pull-right btn btn-success btn-cons" data-clipboard-action="copy" data-clipboard-target=".clipboard-0-0-2">Copy</button>
                                                                            </div>
                                                                            <div class="padding-for_links">
                                                                                <div>Order Page 12.0 - The Wise One</div>
                                                                                <input readonly="" type="text" class="form-control trecking_link clipboard-0-0-3 dynamicDomainTrackingLink" value="https://popularhitech.com/intl_12/?prod=cozytimepro&amp;net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}">
                                                                                <a href="https://popularhitech.com/intl_12/?prod=cozytimepro&amp;net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}" target="_blank" class=" dynamicDomainTrackingLink">
                                                                                    <i class="icon ion-eye pull-right"></i>
                                                                                </a>
                                                                                <button class="copp pull-right btn btn-success btn-cons" data-clipboard-action="copy" data-clipboard-target=".clipboard-0-0-3">Copy</button>
                                                                            </div>

                                                                            -->
                                                                        </div>
                                                                    </div>
                                                                </div>

<!--

                                                                <div class="tab-pane" id="splittestorderpages-0">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="padding-for_links">
                                                                                <div>Order Page 4.0 - The Challenger</div>
                                                                                <input readonly="" type="text" class="form-control trecking_link clipboard-0-1-0 dynamicDomainTrackingLink" value="https://popularhitech.com/intl_4/?prod=cozytimepro&amp;net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}">
                                                                                <a href="https://popularhitech.com/intl_4/?prod=cozytimepro&amp;net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}" target="_blank" class=" dynamicDomainTrackingLink">
                                                                                    <i class="icon ion-eye pull-right"></i>
                                                                                </a>
                                                                                <button class="copp pull-right btn btn-success btn-cons" data-clipboard-action="copy" data-clipboard-target=".clipboard-0-1-0">Copy</button>
                                                                            </div>
                                                                            <div class="padding-for_links">
                                                                                <div>Order Page 6.0 - The Heavyweight</div>
                                                                                <input readonly="" type="text" class="form-control trecking_link clipboard-0-1-1 dynamicDomainTrackingLink" value="https://popularhitech.com/intl_6/?prod=cozytimepro&amp;net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}">
                                                                                <a href="https://popularhitech.com/intl_6/?prod=cozytimepro&amp;net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}" target="_blank" class=" dynamicDomainTrackingLink">
                                                                                    <i class="icon ion-eye pull-right"></i>
                                                                                </a>
                                                                                <button class="copp pull-right btn btn-success btn-cons" data-clipboard-action="copy" data-clipboard-target=".clipboard-0-1-1">Copy</button>
                                                                            </div>
                                                                            <div class="padding-for_links">
                                                                                <div>Order Page 8.0 - The New School</div>
                                                                                <input readonly="" type="text" class="form-control trecking_link clipboard-0-1-2 dynamicDomainTrackingLink" value="https://popularhitech.com/intl_8/?prod=cozytimepro&amp;net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}">
                                                                                <a href="https://popularhitech.com/intl_8/?prod=cozytimepro&amp;net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}" target="_blank" class=" dynamicDomainTrackingLink">
                                                                                    <i class="icon ion-eye pull-right"></i>
                                                                                </a>
                                                                                <button class="copp pull-right btn btn-success btn-cons" data-clipboard-action="copy" data-clipboard-target=".clipboard-0-1-2">Copy</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                -->

                                                                <div class="tab-pane" id="archivedorderpages-0">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="padding-for_links">
                                                                                <div>Order Page 2.0 - The N00b</div>
                                                                                <input readonly="" type="text" class="form-control trecking_link clipboard-0-2-0 dynamicDomainTrackingLink" value="https://popularhitech.com/intl_2/?prod=cozytimepro&amp;net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}">
                                                                                <a href="https://popularhitech.com/intl_2/?prod=cozytimepro&amp;net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}" target="_blank" class=" dynamicDomainTrackingLink">
                                                                                    <i class="icon ion-eye pull-right"></i>
                                                                                </a>
                                                                                <button class="copp pull-right btn btn-success btn-cons" data-clipboard-action="copy" data-clipboard-target=".clipboard-0-2-0">Copy</button>
                                                                            </div>
                                                                            <div class="padding-for_links">
                                                                                <div>Order Page 3.0 - The Multi-Step</div>
                                                                                <input readonly="" type="text" class="form-control trecking_link clipboard-0-2-1 dynamicDomainTrackingLink" value="https://popularhitech.com/intl_3/?prod=cozytimepro&amp;net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}">
                                                                                <a href="https://popularhitech.com/intl_3/?prod=cozytimepro&amp;net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}" target="_blank" class=" dynamicDomainTrackingLink">
                                                                                    <i class="icon ion-eye pull-right"></i>
                                                                                </a>
                                                                                <button class="copp pull-right btn btn-success btn-cons" data-clipboard-action="copy" data-clipboard-target=".clipboard-0-2-1">Copy</button>
                                                                            </div>
                                                                            <div class="padding-for_links">
                                                                                <div>Order Page 11.0 - The Money Maker</div>
                                                                                <input readonly="" type="text" class="form-control trecking_link clipboard-0-2-2 dynamicDomainTrackingLink" value="https://popularhitech.com/intl_11/?prod=cozytimepro&amp;net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}">
                                                                                <a href="https://popularhitech.com/intl_11/?prod=cozytimepro&amp;net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}" target="_blank" class=" dynamicDomainTrackingLink">
                                                                                    <i class="icon ion-eye pull-right"></i>
                                                                                </a>
                                                                                <button class="copp pull-right btn btn-success btn-cons" data-clipboard-action="copy" data-clipboard-target=".clipboard-0-2-2">Copy</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane" id="advertorialpages-0">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="padding-for_links">
                                                                                <div>Advertorial | EN</div>
                                                                                <input readonly="" type="text" class="form-control trecking_link clipboard-0-3-0 dynamicDomainTrackingLink" value="https://popularhitech.com/advertorial/cozytimepro/?net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}">
                                                                                <a href="https://popularhitech.com/advertorial/cozytimepro/?net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}" target="_blank" class=" dynamicDomainTrackingLink">
                                                                                    <i class="icon ion-eye pull-right"></i>
                                                                                </a>
                                                                                <button class="copp pull-right btn btn-success btn-cons" data-clipboard-action="copy" data-clipboard-target=".clipboard-0-3-0">Copy</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane" id="salespages-0">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="padding-for_links">
                                                                                <div>Sale Page | EN</div>
                                                                                <input readonly="" type="text" class="form-control trecking_link clipboard-0-4-0 dynamicDomainTrackingLink" value="https://popularhitech.com/salespage/cozytimepro/?net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}">
                                                                                <a href="https://popularhitech.com/salespage/cozytimepro/?net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}" target="_blank" class=" dynamicDomainTrackingLink">
                                                                                    <i class="icon ion-eye pull-right"></i>
                                                                                </a>
                                                                                <button class="copp pull-right btn btn-success btn-cons" data-clipboard-action="copy" data-clipboard-target=".clipboard-0-4-0">Copy</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end filter tabs -->
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                            <!-- 第五个tab内容 end-->








                                            <!-- 第六个tab内容 start-->
{{--                                    <div class="tab-pane" id="tab0ProductsFeed_<?php echo $key;?>">--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-md-12">--}}
{{--                                                <p>Want to Sell on More Channels? Tap into the power of product listing optimization and import our entire product list.</p>--}}
{{--                                                <p>You can find below the entire catalogue automated Products Data Feed, for easy submit to shopping channels and all the major marketplaces1.</p>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-12">--}}
                                                <!-- dropdown domains -->

                                                <!-- tracking下拉暂时拿掉 -->
                                                <!--
                                                <div class="btn-group m-b-30">
                                                    <a class="btn btn-success dropdown-toggle m-b-5" data-toggle="dropdown" href="?id=offer#">Select your Products Feed domain<span class="caret"></span></a>
                                                    <ul class="dropdown-menu domains-menu domains-menu-feed">
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://urgoodeal.com">https://urgoodeal.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://xtechgadget.com">https://xtechgadget.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://popularhitech.com">https://popularhitech.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://buysmartproduct.com">https://buysmartproduct.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://storepx.com">https://storepx.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://airportxshop.com">https://airportxshop.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://flightxshop.com">https://flightxshop.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://blackfridaytechs.com">https://blackfridaytechs.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://techchristmasgift.com">https://techchristmasgift.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://gadgetronixs.com">https://gadgetronixs.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://luxurygadgetx.com">https://luxurygadgetx.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://newxventions.com">https://newxventions.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://appgogadget.com">https://appgogadget.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://todaystech.co">https://todaystech.co</a></li>
                                                    </ul>
                                                </div>
                                                -->


                                                <!-- end dropdown domains -->
{{--                                            </div>--}}

{{--                                            <div class="col-md-12">--}}
{{--                                                <div>Products Feed - All Products</div>--}}
{{--                                                <input readonly="" type="text" class="form-control trecking_link clipboard-ProductsFeed-0 dynamicDomainTrackingLink" value="https://popularhitech.com/feed?net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}">--}}
{{--                                                <a href="https://popularhitech.com/feed?net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}" target="_blank" class="dynamicDomainTrackingLink">--}}
{{--                                                    <i class="icon ion-eye pull-right"></i>--}}
{{--                                                </a>--}}
{{--                                                <button class="copp pull-right btn btn-success btn-cons" data-clipboard-action="copy" data-clipboard-target=".clipboard-ProductsFeed-0">Copy</button>--}}
{{--                                            </div>--}}

{{--                                        </div>--}}
{{--                                    </div>--}}


                                            <!-- 第六个tab内容 end-->


                                            <!-- 第七个tab内容 start-->
                                            <div class="tab-pane" id="tab0Creative_<?php echo $key;?>">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        @foreach ($item['creatives'] as $k1=>$i1)


                                                        <p></p><p>{{$i1['name']}}</p>

                                        <p><a href="https://www.dropbox.com/scl/fo/fyoovooys02dhqnd4tcy3/h?rlkey=1jyre8331r9m5y723ztcudped&amp;dl=0" target="_blank">{{$i1['link']}}</a></p>

                                                        @endforeach
                                                    </div>
                                                </div>





{{--                                                <div class="row">--}}
{{--                                                    <div class="col-md-12">--}}


{{--                                                        <p></p><p>Product creatives:</p>--}}

{{--                                                        <p><a href="https://www.dropbox.com/scl/fo/fyoovooys02dhqnd4tcy3/h?rlkey=1jyre8331r9m5y723ztcudped&amp;dl=0" target="_blank">https://www.dropbox.com/scl/fo/fyoovooys02dhqnd4tcy3/h?rlkey=1jyre8331r9m5y723ztcudped&amp;dl=0</a></p>--}}

{{--                                                        <p>Advertorial Page Source Code:</p>--}}

{{--                                                        <p><a href="https://www.dropbox.com/scl/fi/wu3kjml7omdm52rvb9hsy/CozyTime-Pro-ADV.zip?rlkey=7ufd4jcprlf677g1wmynswpxd&amp;dl=0" target="_blank">https://www.dropbox.com/scl/fi/wu3kjml7omdm52rvb9hsy/CozyTime-Pro-ADV.zip?rlkey=7ufd4jcprlf677g1wmynswpxd&amp;dl=0</a></p>--}}

{{--                                                        <p>Sale Page Source Code:</p>--}}

{{--                                                        <p><a href="https://www.dropbox.com/scl/fi/iheou1zvxzcct93022ykh/Cozytime-sales.zip?rlkey=7janon2h35d60k2xlkxnsymzq&amp;dl=0" target="_blank">https://www.dropbox.com/scl/fi/iheou1zvxzcct93022ykh/Cozytime-sales.zip?rlkey=7janon2h35d60k2xlkxnsymzq&amp;dl=0</a></p>--}}
{{--                                                        <p></p></div>--}}
{{--                                                </div>--}}


                                            </div>
                                            <!-- 第七个tab内容 end-->




                                            <!-- 第八个tab内容 start-->
{{--                                            <div class="tab-pane" id="tab0Pixel_Postback_<?php echo $key;?>"><div class="wait_loader offers-tab-pixels-loader" data-offer-id="277"><img src="/vendor/laravel-admin/test/squares-preloader-gif.svg" alt="preloader"></div><div class="offers-tab-pixels-container" data-offer-id="277"></div></div>--}}

                                            <!-- 第八个tab内容 end-->


                                        </div>
                                    </div>



                                   @endforeach

                                        </div>
                                 <!--内容结束-->










                            </div>
                        </div>


                        <div class="col-mlg-6">
                            <div class="row">

                                 <!--内容开始-->

                                <div class="categories_offer_right ">
                                    <div class="col-md-12 accord" data-offer_db="Skincare">
                                    <ul class="nav nav-tabs" role="tablist"><li class="active"><a href="?id=offer#tab1Offer" role="tab" data-toggle="tab">Summary</a></li><li><a href="?id=offer#tab1Description" role="tab" data-toggle="tab">Description</a></li><li><a href="?id=offer#tab1Geos" role="tab" data-toggle="tab">Accepted Geos</a></li><li><a href="?id=offer#tab1Top_Geos" class="tab_top_geo" role="tab" data-toggle="tab">Top Geos</a></li><li><a href="?id=offer#tab1Tracking" role="tab" data-toggle="tab">Tracking Links</a></li><li><a href="?id=offer#tab1ProductsFeed" role="tab" data-toggle="tab">Products Data Feed</a></li><li><a href="?id=offer#tab1Creative" role="tab" data-toggle="tab">Creatives</a></li><li><a href="?id=offer#tab1Pixel_Postback" class="offers-tab-pixels" data-offer-id="276" role="tab" data-toggle="tab">Pixels/Postbacks</a></li></ul><div class="tools"><a href="javascript:;" class="collapse"></a><a href="?id=offer#grid-config" data-toggle="modal" class="config"></a><a href="javascript:;" class="reload"></a><a href="javascript:;" class="remove"></a></div><div class="tab-content"><div class="tab-pane active" id="tab1Offer"><div class="row column-seperation"><div class="col-md-12"><table class="table table-striped table-flip-scroll cf"><thead class="cf"><tr><th><a href="https://bioresponse.co/?net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}" target="_blank"><span class="offer-product-img-container" data-original-title="" title=""><img src="/vendor/laravel-admin/test/skincare-logo.png" alt="Skincare"></span>Offer Preview <i class="icon ion-eye"></i></a></th><th>Payout</th><th>Status</th></tr></thead><tbody><tr><td width="55%">E-commerce - SkinBliss INTL - All Languages - EXCLUSIVE</td><td width="25%">$65 Per Sale</td><td width="20%"><span class="label label-success">Live</span></td></tr></tbody></table></div></div></div><div class="tab-pane" id="tab1Description"><div class="row"><div class="col-md-12"><p></p><p><strong>E-commerce - SkinBliss INTL - All Languages - EXCLUSIVE</strong></p>

                                    <p><em>What is SkinBliss?</em></p>

                                    <p><em>SkinBliss is a serum for skin tag removal/treatment.</em></p>

                                    <p><em>It presents a robust serum crafted from natural ingredients. Applying just a few drops to a blemish enables the serum to reach the root of a mole or skin tag, prompting an influx of white blood cells to the area. This kickstarts the process of removal and healing. </em></p>

                                    <p>It is a powerful offer in the skin care niche. Special dedicated landing page for maximizing your conversions. Start promoting this offer today to see the results ASAP!</p>

                                    <p>Pixel fires on sale,</p>

                                    <p>All traffic accepted, except for incentive.</p>

                                    <p>All major payment methods are accepted.</p>
                                    <p></p></div></div></div><div class="tab-pane" id="tab1Geos"><div class="row"><div class="col-md-12"><p></p><p>Accepted Destinations:</p>

                                    <p>Contact your affiliate account manager to inquire about specific not supported Geos.</p>
                                    <p></p><p>Andorra, United States</p></div></div></div><div class="tab-pane top_geos_tab" id="tab1Top_Geos"><div class="row"><div class="col-md-12"><div class="top_geos_graph"><div class="col-xs-12"><div class="row"><div class="col-xs-12 col-md-6 col-lg-4 use_small_padding"><div class="row"><div class="col-xs-12"><select class="list_date select2_list padding_left" data-suffix="geo" style="margin-bottom: 10px;" name="date" id=""><option value="today">Today</option><option value="yester">Yesterday</option><option value="week">Current Week</option><option value="month">Current Month</option><option value="year">Year To Date</option><option value="l_week">Last Week</option><option value="l_month">Last Month</option><option value="calendar">Custom</option></select></div></div></div><div class="col-xs-12 col-md-6 col-lg-4 use_small_padding calendar_padding"><div class="col-xs-4 col-sm-4"><div class="row"><div class="about_color"><p class="about_inputs">Start</p></div></div></div><div class="input-append success col-xs-8 col-sm-8"><div class="row"><input type="text" class="form-control date_start"><span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span></div></div></div><div class="col-xs-12 col-md-6 col-lg-4 use_small_padding calendar_padding"><div class="col-xs-4 col-sm-4"><div class="row"><div class="about_color"><p class="about_inputs">End</p></div></div></div><div class="input-append success col-xs-8 col-sm-8"><div class="row"><input type="text" class="form-control date_end"><span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span></div></div></div><table class="table no-more-tables geo_table"><thead><tr><th style="width:30%">COUNTRY</th><th style="width:20%">Percentage</th><th style="width:50%">Distribution</th></tr></thead><tbody></tbody></table><div style="display:none;" class="geo_date_no_data"><p>Morpheus: Throughout human history, we have been dependent on machines to survive. Fate, it seems, is not without a sense of irony.</p></div></div></div></div></div></div><div class="wait_loader"><img src="/vendor/laravel-admin/test/squares-preloader-gif.svg" alt=""></div></div>
                                    <div class="tab-pane" id="tab1Tracking">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>These links are unique to you, use them to generate traffic.</p>
                                                <p>You can use any of the 3 custom parameters agnostically.</p>
                                                <p>Replace {AFFID}, {SUBID}, {CLICKID} with your own tracking variables and get them feed-backed in your pixel/postback.</p>
                                            </div>
                                            <div class="col-md-12">

                                                <br>
                                                <p>Traffic sources sometimes block certain URLs and/or companies, we offer different tracking domains to choose from.</p>

                                                <!-- dropdown domains -->
                                                <div class="btn-group m-b-30">
                                                    <a class="btn btn-success dropdown-toggle m-b-5" data-toggle="dropdown" href="?id=offer#">Select your tracking domain<span class="caret"></span></a>
                                                    <ul class="dropdown-menu domains-menu">
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://urgoodeal.com">https://urgoodeal.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://xtechgadget.com">https://xtechgadget.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://popularhitech.com">https://popularhitech.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://buysmartproduct.com">https://buysmartproduct.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://storepx.com">https://storepx.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://airportxshop.com">https://airportxshop.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://flightxshop.com">https://flightxshop.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://blackfridaytechs.com">https://blackfridaytechs.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://techchristmasgift.com">https://techchristmasgift.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://gadgetronixs.com">https://gadgetronixs.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://luxurygadgetx.com">https://luxurygadgetx.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://newxventions.com">https://newxventions.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://appgogadget.com">https://appgogadget.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://todaystech.co">https://todaystech.co</a></li>
                                                    </ul>
                                                </div>
                                                <!-- end dropdown domains -->

                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <!-- filter tabs -->
                                                        <div class="tabbable tabs-left tabs-bg">
                                                            <ul class="nav nav-tabs" role="tablist">
                                                                <li class="active">
                                                                    <a href="?id=offer#advertorialpages-1" role="tab" data-toggle="tab">Advertorial Pages</a>
                                                                </li>
                                                                <li>
                                                                    <a href="?id=offer#homepages-1" role="tab" data-toggle="tab">Home Pages</a>
                                                                </li>
                                                            </ul>
                                                            <div class="tab-content">
                                                                <div class="tab-pane active" id="advertorialpages-1">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="padding-for_links">
                                                                                <div>Advertorial | EN</div>
                                                                                <input readonly="" type="text" class="form-control trecking_link clipboard-1-0-0 dynamicDomainTrackingLink" value="https://popularhitech.com/advertorial/skinbliss/?net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}">
                                                                                <a href="https://popularhitech.com/advertorial/skinbliss/?net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}" target="_blank" class=" dynamicDomainTrackingLink">
                                                                                    <i class="icon ion-eye pull-right"></i>
                                                                                </a>
                                                                                <button class="copp pull-right btn btn-success btn-cons" data-clipboard-action="copy" data-clipboard-target=".clipboard-1-0-0">Copy</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane" id="homepages-1">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="padding-for_links">
                                                                                <div>Master Landing Page</div>
                                                                                <input readonly="" type="text" class="form-control trecking_link clipboard-1-1-0" value="https://bioresponse.co/?net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}">
                                                                                <a href="https://bioresponse.co/?net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}" target="_blank" class="">
                                                                                    <i class="icon ion-eye pull-right"></i>
                                                                                </a>
                                                                                <button class="copp pull-right btn btn-success btn-cons" data-clipboard-action="copy" data-clipboard-target=".clipboard-1-1-0">Copy</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end filter tabs -->

                                                        <div class="clearfix"></div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab1ProductsFeed">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>Want to Sell on More Channels? Tap into the power of product listing optimization and import our entire product list.</p>
                                                <p>You can find below the entire catalogue automated Products Data Feed, for easy submit to shopping channels and all the major marketplaces.</p>
                                            </div>
                                            <div class="col-md-12">
                                                <!-- dropdown domains -->
                                                <div class="btn-group m-b-30">
                                                    <a class="btn btn-success dropdown-toggle m-b-5" data-toggle="dropdown" href="?id=offer#">Select your Products Feed domain<span class="caret"></span></a>
                                                    <ul class="dropdown-menu domains-menu domains-menu-feed">
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://urgoodeal.com">https://urgoodeal.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://xtechgadget.com">https://xtechgadget.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://popularhitech.com">https://popularhitech.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://buysmartproduct.com">https://buysmartproduct.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://storepx.com">https://storepx.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://airportxshop.com">https://airportxshop.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://flightxshop.com">https://flightxshop.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://blackfridaytechs.com">https://blackfridaytechs.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://techchristmasgift.com">https://techchristmasgift.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://gadgetronixs.com">https://gadgetronixs.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://luxurygadgetx.com">https://luxurygadgetx.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://newxventions.com">https://newxventions.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://appgogadget.com">https://appgogadget.com</a></li>
                                                        <li><a href="?id=offer#" class="offersDomain" data-domain="https://todaystech.co">https://todaystech.co</a></li>
                                                    </ul>
                                                </div>
                                                <!-- end dropdown domains -->
                                            </div>

                                            <div class="col-md-12">
                                                <div>Products Feed - All Products</div>
                                                <input readonly="" type="text" class="form-control trecking_link clipboard-ProductsFeed-1 dynamicDomainTrackingLink" value="https://popularhitech.com/feed?net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}">
                                                <a href="https://popularhitech.com/feed?net=6546&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}" target="_blank" class="dynamicDomainTrackingLink">
                                                    <i class="icon ion-eye pull-right"></i>
                                                </a>
                                                <button class="copp pull-right btn btn-success btn-cons" data-clipboard-action="copy" data-clipboard-target=".clipboard-ProductsFeed-1">Copy</button>
                                            </div>

                                        </div>
                                    </div><div class="tab-pane" id="tab1Creative"><div class="row"><div class="col-md-12"><p></p><p>Offer's Creatives:</p>

                                        <p><a href="https://www.dropbox.com/scl/fo/8agbyixyi92qzn5926u2z/h?rlkey=cu6kwyx9ngegmzix88o4x7bmp&amp;dl=0" target="_blank">https://www.dropbox.com/scl/fo/8agbyixyi92qzn5926u2z/h?rlkey=cu6kwyx9ngegmzix88o4x7bmp&amp;dl=0</a></p>

                                        <p>Advertorial Page Source Code:</p>

                                        <p><a href="https://www.dropbox.com/scl/fi/4iq7ph7jy3q37ezwz99qq/SkinBliss-Advertorial.zip?rlkey=caixl5aolpksita3nj5k9htxe&amp;dl=0" target="_blank">https://www.dropbox.com/scl/fi/4iq7ph7jy3q37ezwz99qq/SkinBliss-Advertorial.zip?rlkey=caixl5aolpksita3nj5k9htxe&amp;dl=0</a></p>
                                        <p></p></div></div></div><div class="tab-pane" id="tab1Pixel_Postback"><div class="wait_loader offers-tab-pixels-loader" data-offer-id="276"><img src="/vendor/laravel-admin/test/squares-preloader-gif.svg" alt="preloader"></div><div class="offers-tab-pixels-container" data-offer-id="276"></div></div></div></div>
                                    </div>


                            </div>
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
                                <input class="btn btn-primary btn-cons" type="button" id="add_postback" value="Add Post Back">
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

{{--        <script src="/vendor/laravel-admin/test/js_offer_top_geos.js.下载"></script>--}}
{{--        <script src="/vendor/laravel-admin/test/offer.js"></script>--}}

    </div>

</div>

<!-- END PAGE CONTAINER -->

<!-- Modal -->
<div class="modal fade" id="notification_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <p> <span class="data_notification"></span> <span class="time_notification"></span></p>
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
            <img src="/vendor/laravel-admin/test/squares-preloader-gif.svg" alt="">
        </div>
        <div class="input-container">
            <input type="text" id="userInput" placeholder="Type your message...">
            <button id="sendButton" '="">Send</button>
        </div>
    </div>
</div>



<div class="modal fade" id="wantAnOfferModal" tabindex="-1" role="dialog" aria-labelledby="wantAnOfferModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content wantAnOfferModalContent">
            <form id="formWantOffer" name="formWantOffer" action="?id=offer#" role="form" autocomplete="off" class="validate" novalidate="novalidate">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 id="wantAnOfferModalLabel" class="semi-bold">
                        Can’t Find What You Are Looking For?
                        <br>
                        Submit a Product/Offer to the M4TRIX.
                    </h4>
                    <p class="no-margin">We can onboard any E-Commerce offers within a few days.</p>
                    <p class="no-margin">Kindly share as much details as possible to allow our team to find your product faster.</p>
                    <p class="no-margin">Useful information include product name, description, listing &amp; pictures.</p>
                    <br>
                </div>
                <div class="modal-body">
                    <div class="row form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Enter the details about the product(s) you would like to Onboard on the M4TRIX</label>
                                <textarea rows="5" name="wantOffer[message]" class="form-control" required="" aria-required="true"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Product/Offer Link(s)</label>
                                <input name="wantOffer[product]" class="form-control input-sm" type="text" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Expected Payout</label>
                                <input name="wantOffer[expPayout]" class="form-control input-sm" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Expected Volume</label>
                                <input name="wantOffer[expVolume]" class="form-control input-sm" type="text" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Geo(s)</label>
                                <input name="wantOffer[geos]" class="form-control input-sm" type="text" placeholder="">
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
                <p>The M4TRIX shall use a vast amount of human power to respond to your query as soon as possible.</p>
                <p>Let us lead the fight against the machines.</p>
            </div>
            <div class="modal-body body-error hidden">
                <p>This does not happen often, The M4TRIX just had a glitch :(</p>
                <p>Your message was lost in the inner space of CPU and RAM Power. The Machines have won this round I am afraid.</p>
                <p>Kindly try re-sending it. If the error persists, please contact <span class="sendToEmail"></span>.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>		<!-- Modal -->
<div class="modal fade modal-v-center" id="userTutorialExploreModal" tabindex="-1" role="dialog" aria-labelledby="userTutorialExploreModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h3 class="modal-title text-left" id="userTutorialExploreModalLabel">Ready to get started?</h3>
            </div>
            <div class="modal-body text-left">
                <p>Go to <a href="?id=offer" class="text-info">Offers</a> to pick your winning campaign!</p>
                <p>Your Affiliate Manager is available to get you started on the M4TRIX Journey, get to know each other!</p>
                <p class="m-0">For any other inquiry, visit our <a href="?id=faq" class="text-info">Help Center</a> or report directly to our communication deck at <span class="text-info">crew@m4trix.network</span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
                <button type="button" class="btn btn-primary btnTutorialDone" data-explore="1">Get Started</button>
            </div>
        </div>
    </div>
</div>



<div style="left: -1000px; overflow: scroll; position: absolute; top: -1000px; border: none; box-sizing: content-box; height: 200px; margin: 0px; padding: 0px; width: 200px;"><div style="border: none; box-sizing: content-box; height: 200px; margin: 0px; padding: 0px; width: 200px;"></div></div><div><div class="sweet-overlay" tabindex="-1"></div><div class="sweet-alert" tabindex="-1"><div class="icon error"><span class="x-mark"><span class="line left"></span><span class="line right"></span></span></div><div class="icon warning"> <span class="body"></span> <span class="dot"></span> </div> <div class="icon info"></div> <div class="icon success"> <span class="line tip"></span> <span class="line long"></span> <div class="placeholder"></div> <div class="fix"></div> </div> <div class="icon custom"></div> <h2>Title</h2><p class="lead text-muted">Text</p><p><button class="cancel btn btn-lg" tabindex="2">Cancel</button> <button class="confirm btn btn-lg" tabindex="1">OK</button></p></div></div>

    </form>
<script>



    $('#searchBtn').click(function(e) {



        e.preventDefault();
        var formData = $('#form_id').serialize();

        var keyword = $('#keyword').val();
        var _token = $('#_token').val();
        var category = $('#category').val();
        var geos = $('#geos').val();
        var sort = $('#sort').val();

        $.ajax({
            type: 'get',
            url: '/admin/offer/show',
            data:{
                keyword:keyword,
                _token:_token,
                category:category,
                geos:geos,
                sort:sort,
            },
            success: function(data) {


                location.reload();

               // console.info('返回数据',data)
               // console.info('返回数据1')
                // do something with the response data
            }
        });
    });

</script>
