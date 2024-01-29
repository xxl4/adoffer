<link href="/vendor/laravel-admin/test/select2.css" rel="stylesheet" type="text/css" media="screen">
<link href="/vendor/laravel-admin/test/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen">
<link href="/vendor/laravel-admin/test/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/vendor/laravel-admin/test/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/vendor/laravel-admin/test/demo.css">
<link href="/vendor/laravel-admin/test/font-awesome.css" rel="stylesheet" type="text/css">
<link href="/vendor/laravel-admin/test/animate.min.css" rel="stylesheet" type="text/css">
<link href="/vendor/laravel-admin/test/jquery.scrollbar.css" rel="stylesheet" type="text/css">
<link href="/vendor/laravel-admin/test/datepicker.css" rel="stylesheet" type="text/css">
{{--<link rel="stylesheet" href="/vendor/laravel-admin/test/sweet-alert.css">--}}
<link rel="stylesheet" href="/vendor/laravel-admin/test/rickshaw.css" type="text/css" media="screen">
<link rel="stylesheet" href="/vendor/laravel-admin/test/mapplic.css" type="text/css" media="screen">
<link rel="stylesheet" href="/vendor/laravel-admin/test/ionicons.css" type="text/css">
<link href="/vendor/laravel-admin/test/messenger.css" rel="stylesheet" type="text/css" media="screen">
<link href="/vendor/laravel-admin/test/messenger-theme-flat.css" rel="stylesheet" type="text/css" media="screen">
<link rel="icon" type="image/png" href="https://m4trix.network/Reporting-platform/images/favicon.png">
<link href="/vendor/laravel-admin/test/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" media="screen">

<link rel="stylesheet" href="/vendor/laravel-admin/analytic/bootstrap-select.min.css">
<script src="/vendor/laravel-admin/analytic/bootstrap-select.min.js"></script>
<script src="/vendor/laravel-admin/analytic/clipboard.min.js"></script>
<!-- END PLUGIN CSS -->
<!-- BEGIN CORE CSS FRAMEWORK -->
<link href="/vendor/laravel-admin/test/icon" rel="stylesheet">
<link href="/vendor/laravel-admin/test/webarch.css" rel="stylesheet" type="text/css">
<link href="/vendor/laravel-admin/test/custom.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/vendor/laravel-admin/test/links_img.css">
<!-- END CORE CSS FRAMEWORK -->

<style>.cke {
        visibility: hidden;
    }</style>
<script src="u5" type="text/javascript"></script>
<!-- TEXT EDITOR -->

<script>var switch_theme = 0;</script>
<link href="/vendor/laravel-admin/test/lity.css" rel="stylesheet">

<script>
    window.networks = [{"net": "net", "name": "All networks", "uid": "", "role": ""}];
    window.net = 'net';
    window.selectedUid = '';
    window.selectedRole = '';
</script>




<div class="pace  pace-inactive">
    <div class="pace-progress" data-progress-text="100%" data-progress="99"
         style="transform: translate3d(100%, 0px, 0px);">
        <div class="pace-progress-inner"></div>
    </div>
    <div class="pace-activity"></div>
</div>
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

        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}"/>
        <div class="form-group">

            <div class="col-sm-4" style="width: 20%!important;">
                <select id="category" name="usertype" class="selectpicker show-tick form-control" multiple
                        data-max-options="3" data-live-search="true" data-none-selected-text="Select Offers Categories"
                        data-size="10">
                    @foreach ($data['category_list'] as $key=>$item)
                        <option value="{{$item['id']}}"
                                data-content="<span class='label label-success'>{{$item['category_name']}}</span>">{{$item['category_name']}}</option>
                    @endforeach
                </select>
            </div>


            <div class="col-sm-4" style="width: 20%!important;">
                <select id="geos" name="usertype" class="selectpicker show-tick form-control" multiple
                        data-max-options="3"
                        data-live-search="true" data-none-selected-text="Select Offers Geos" data-size="10">
                    @foreach ($data['geos_list'] as $key=>$item)
                        <option value="{{$item['id']}}"
                                data-content="<span class='label label-success'>{{$item['country']}}</span>">{{$item['country']}}</option>
                    @endforeach

                </select>
            </div>


            <div class="col-sm-4" style="width: 20%!important;">
                <select id="sort" name="usertype" class="selectpicker show-tick form-control" data-max-options="3"
                        data-live-search="true" data-none-selected-text="Order By">

                    <option value="0"
                            data-content="<span class='label label-success'>Release Date (Newest on Top)</span>">
                        Release Date (Newest on Top)
                    </option>
                    <option value="1"
                            data-content="<span class='label label-success'>Release Date (Oldest on Top)</span>">
                        Release Date (Oldest on Top)
                    </option>
                    <option value="2" data-content="<span class='label label-success'>Payout (High to Low)</span>">
                        Payout
                        (High to Low)
                    </option>
                    <option value="3" data-content="<span class='label label-success'>Payout (Low to High)</span>">
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
                    <div class="col-mlg-6">
                        <div class="row">

                            <!--内容开始-->
                            <div class="categories_offer_left">



                                @foreach ($data['offer'] as $key=>$item)
                                    <div class="col-md-12 accord" data-offer_db="CozyTime Pro"
                                         data-marker-id="{{$item['id']}}">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="active"><a href="#tab0Offer_<?php echo $key;?>" role="tab"
                                                                  data-toggle="tab"
                                                                  onclick="openTab('{{$item['id'].'_'.$item['offer_name']}}')">Summary</a>
                                            </li>
                                            <li><a href="#tab0Description_<?php echo $key;?>" role="tab"
                                                   data-toggle="tab"
                                                   onclick="openTab('{{$item['id'].'_'.$item['des']}}')">Description</a>
                                            </li>
                                            <li><a href="#tab0Geos_<?php echo $key;?>" role="tab" data-toggle="tab">Accepted
                                                    Geos</a></li>
                                            <li><a href="#tab0Tracking_<?php echo $key;?>" role="tab" data-toggle="tab">Tracking
                                                    Links</a></li>
                                            <li><a href="#tab0Creative_<?php echo $key;?>" role="tab" data-toggle="tab">Creatives</a>
                                            </li>
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
                                                            <tr>
                                                                <th><a href="@if(!empty($item['track_list'][0][0]['track_link'])){{$item['track_list'][0][0]['track_link']}}
                                                             @else'' @endif" target="_blank">
                                                                        <span class="offer-product-img-container"
                                                                              data-original-title="" title="">
                                                                            <img src="{{env('APP_URL').'/upload/'.$item['image']}}">
                                                                        </span>Offer Preview
                                                                        <i class="icon ion-eye"></i>
                                                                    </a>
                                                                </th>
                                                                <th>Payout</th>
                                                                <th>Status</th>
                                                            </tr>
                                                            </thead>
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

                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- 第二个tab内容 start-->
                                            <div class="tab-pane" id="tab0Description_<?php echo $key;?>">
                                                <div class="row">
                                                    <div class="col-md-12"><p></p>
                                                        <p>
                                                            <strong></strong></p>
                                                        <p>{{$item['des']}}</p>
                                                        <p></p></div>
                                                </div>
                                            </div>
                                            <!-- 第二个tab内容 end-->


                                            <!-- 第三个tab内容 start-->
                                            <div class="tab-pane" id="tab0Geos_<?php echo $key;?>">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p></p>
                                                        <p>{{$item['accepted_area']}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- 第五个tab内容 start-->
                                            <div class="tab-pane" id="tab0Tracking_<?php echo $key;?>">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p>{{$item['track_des']}}</p>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-12">

                                                                <!-- filter tabs -->
                                                                <div class="tabbable tabs-left tabs-bg">
                                                                    <ul class="nav nav-tabs" role="tablist">

                                                                        @foreach ($item['track_list'] as $key2=>$item2)
                                                                            @if($key2 ==0)
                                                                                <li class="active"><a href="?id=offer#advertorialpages12-1<?php echo $key2.$key?>" role="tab" data-toggle="tab">Advertorial Pages<?php echo $key2.$key?></a></li>
                                                                            @else
                                                                                <li><a href="?id=offer#advertorialpages12-1<?php echo $key2.$key?>" role="tab" data-toggle="tab">Advertorial Pages<?php echo $key2.$key?></a></li>
                                                                            @endif
                                                                        @endforeach
                                                                    </ul>
                                                                    <div class="tab-content">

                                                                        @foreach ($item['track_list'] as $key3=>$item3)

                                                                            @if($key3==0)
                                                                                <div class="tab-pane active" id="advertorialpages12-1<?php echo $key3.$key?>">
                                                                                    @else
                                                                                        <div class="tab-pane" id="advertorialpages12-1<?php echo $key3.$key?>">
                                                                                            @endif
                                                                                            <div class="row">
                                                                                                @foreach ($item3 as $key4=>$item4)
                                                                                                    <div class="col-md-12">
{{--                                                                                                        <div class="padding-for_links">--}}
{{--                                                                                                            <div>{{$item4['track_name']}}</div>--}}
{{--                                                                                                            <input  style="width: calc(100% - 100px)"  readonly="" type="text" class="clipboard-1-0-0-1-2{{$key3.'-'.$key4}}" value="{{$item4['track_link']}}">--}}
{{--                                                                                                            <a href=""  target="_blank" class=" dynamicDomainTrackingLink">--}}
{{--                                                                                                                <i class="icon ion-eye pull-right"></i>--}}
{{--                                                                                                            </a>--}}
{{--                                                                                                            <a class="copp pull-right btn btn-success btn-cons copy-button1" data-clipboard-action="copy" data-clipboard-target=".clipboard-1-0-0-2{{$key3.$key4}}">Copy</a>--}}
{{--                                                                                                        </div>--}}



                                                                                                        <div class="padding-for_links">
                                                                                                            <div>{{$item4['track_name']}}</div>
                                                                                                            <input readonly="" style="width: calc(100% - 100px)" type="text" class="clipboard-1-0-0-1{{$key2.'-'.$key3.'-'.$key4}}" value="{{$item4['track_link']}}">
                                                                                                            <a href="" target="_blank" class=" dynamicDomainTrackingLink">
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

                                                <div class="tab-pane" id="tab0Creative_<?php echo $key;?>">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            @foreach ($item['creatives'] as $k1=>$i1)
                                                                <p></p><p>{{$i1['name']}}</p>
                                                                <p>
                                                                    <a href="{{$i1['link']}}"
                                                                       target="_blank">{{$i1['link']}}</a></p>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
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


                                                                                                                @php
                                                                                                                $index = 0;
                                                                                                                $index1 = 0;
                                                                                                                 @endphp



                                    @foreach ($data['offer1'] as $key1=>$item1)

                                        <div class="col-md-12 accord" data-offer_db="Skincare">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="active"><a href="?id=offer#tab1Offer<?php echo $key1;?>"
                                                                      role="tab"
                                                                      data-toggle="tab">Summary</a></li>
                                                <li><a href="?id=offer#tab1Description<?php echo $key1;?>" role="tab"
                                                       data-toggle="tab">Description</a></li>
                                                <li><a href="?id=offer#tab1Geos<?php echo $key1;?>" role="tab"
                                                       data-toggle="tab">Accepted Geos</a></li>
                                                <li><a href="?id=offer#tab1Tracking<?php echo $key1;?>" role="tab"
                                                       data-toggle="tab">Tracking Links</a></li>
                                                <li><a href="?id=offer#tab1Creative<?php echo $key1;?>" role="tab"
                                                       data-toggle="tab">Creatives</a></li>
                                            </ul>
                                            <div class="tools">
                                                <a href="javascript:;" class="collapse"></a>
                                                <a href="?id=offer#grid-config" data-toggle="modal" class="config"></a>
                                                <a href="javascript:;" class="reload"></a>
                                                <a href="javascript:;" class="remove"></a>
                                            </div>
                                            <div class="tab-content">

                                                <!--第一部分 start-->

                                                <div class="tab-pane active" id="tab1Offer<?php echo $key1;?>">
                                                    <div class="row column-seperation">
                                                        <div class="col-md-12">
                                                            <table class="table table-striped table-flip-scroll cf">
                                                                <thead class="cf">
                                                                <tr>
                                                                    <th>
                                                                        <a href="@if(!empty($item1['track_list'][0][0]['track_link'])){{$item1['track_list'][0][0]['track_link']}}
                                                             @else'' @endif" target="_blank">
                                                                        <span class="offer-product-img-container"
                                                                              data-original-title="" title="">
                                                                            <img src="{{env('APP_URL').'/upload/'.$item1['image']}}">
                                                                        </span>Offer Preview
                                                                            <i class="icon ion-eye"></i>
                                                                        </a>
                                                                    </th>
                                                                    <th>Payout</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td width="55%">{{$item1['offer_name']}}</td>
                                                                    <td width="25%">${{$item1['offer_price']}} Per Sale</td>
                                                                    <td width="20%">
                                                                        @if($item1['offer_status']==1)
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

                                                <!--第一部分 end-->

                                                <!--第二部分 start-->
                                                <div class="tab-pane" id="tab1Description<?php echo $key1;?>">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <p></p>
                                                            <p><strong></strong></p>
                                                            <p>{{$item1['des']}}</p>
                                                            <p></p></div>
                                                    </div>
                                                </div>
                                                <!--第二部分 end-->

                                                <!--第三部分 start-->
                                                <div class="tab-pane" id="tab1Geos<?php echo $key1;?>">
                                                    <div class="row">
                                                        <div class="col-md-12"><p></p>
                                                            <p>{{$item1['accepted_area']}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--第三部分 end-->

                                                <!--第五部分 start-->
                                                <div class="tab-pane" id="tab1Tracking<?php echo $key1;?>">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <p>{{$item1['track_des']}}</p>
                                                            {{--                                                        <p>You can use any of the 3 custom parameters agnostically.</p>--}}
                                                            {{--                                                        <p>Replace {AFFID}, {SUBID}, {CLICKID} with your own tracking--}}
                                                            {{--                                                            variables and get them feed-backed in your--}}
                                                            {{--                                                            pixel/postback.</p>--}}
                                                        </div>
                                                        <div class="col-md-12">

                                                            <br>
                                                                                                                    <p>Traffic sources sometimes block certain URLs and/or
                                                                                                                        companies, we
                                                                                                                        offer different tracking domains to choose from.</p>

                                                            <!-- dropdown domains -->

                                                            <div class="btn-group m-b-30">
                                                                <a class="btn btn-success dropdown-toggle m-b-5"
                                                                   data-toggle="dropdown" href="?id=offer#">Select your
                                                                    tracking
                                                                    domain<span class="caret"></span></a>
                                                                <ul class="dropdown-menu domains-menu">
                                                                    <li><a href="?id=offer#" class="offersDomain"
                                                                           data-domain="https://urgoodeal.com">https://urgoodeal.com</a>
                                                                    </li>

                                                                </ul>
                                                            </div>

                                                            <!-- end dropdown domains -->

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <!-- filter tabs -->
                                                                    <div class="tabbable tabs-left tabs-bg">
                                                                        <ul class="nav nav-tabs" role="tablist">
                                                                            @foreach ($item1['track_list'] as $key2=>$item2)

                                                                                @if($key2==0)
                                                                                    <li class="active"><a href="?id=offer#advertorialpages1-1<?php echo $key2.$key1?>" role="tab" data-toggle="tab">Advertorial Pages<?php echo $key2.$key1?></a></li>
                                                                                @else
                                                                                    <li><a href="?id=offer#advertorialpages1-1<?php echo $key2.$key1?>" role="tab" data-toggle="tab">Advertorial Pages<?php echo $key2.$key1?></a></li>
                                                                                @endif


                                                                                    @php
                                                                                        $index ++;
                                                                                    @endphp

                                                                                {{--                                                                            <li><a href="?id=offer#homepages-1<?php echo $key2?>" role="tab" data-toggle="tab">Home Pages<?php echo $key2?></a></li>--}}
                                                                            @endforeach
                                                                        </ul>
                                                                        <div class="tab-content">

                                                                            @foreach ($item1['track_list'] as $key3=>$item3)

                                                                                @if($key3==0)
                                                                                    <div class="tab-pane active" id="advertorialpages1-1<?php echo $key3.$key1?>">
                                                                                        @else
                                                                                            <div class="tab-pane" id="advertorialpages1-1<?php echo $key3.$key1?>">
                                                                                                @endif


                                                                                                @php
                                                                                                    $index1 ++;
                                                                                                @endphp

                                                                                                <div class="row">
                                                                                                    @foreach ($item3 as $key4=>$item4)
                                                                                                        <div class="col-md-12">
                                                                                                            <div class="padding-for_links">
                                                                                                                <div>{{$item4['track_name']}}</div>
                                                                                                                <input readonly="" style="width: calc(100% - 100px)" type="text" class="clipboard-1-0-0-4{{$key1.'-'.$key2.'-'.$key3.'-4'.$key4}}" value="{{$item4['track_link']}}">
                                                                                                                <a href="" target="_blank" class=" dynamicDomainTrackingLink">
                                                                                                                    <i class="icon ion-eye pull-right"></i>
                                                                                                                </a>
                                                                                                                <a class="copp pull-right btn btn-success btn-cons copy-button2" data-clipboard-action="copy" data-clipboard-target=".clipboard-1-0-0-4{{$key1.'-'.$key2.'-'.$key3.'-4'.$key4}}">Copy</a>
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

                                                    <!--第五部分 end-->


                                                    <!--第七部分 start-->
                                                    <div class="tab-pane" id="tab1Creative<?php echo $key1;?>">
                                                        <div class="row">
                                                            <div class="col-md-12"><p></p>

                                                                @foreach ($item1['creatives'] as $k1=>$i1)
                                                                    <p>{{$i1['name']}}</p>
                                                                    <p>
                                                                        <a href="{{$i1['link']}}"
                                                                           target="_blank">{{$i1['link']}}</a>
                                                                    </p>

                                                                    <p></p>

                                                                @endforeach

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--第七部分 end-->


                                                </div>
                                            </div>

                                            @endforeach
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

                {{--        <script src="/vendor/laravel-admin/test/js_offer_top_geos.js.下载"></script>--}}
                {{--        <script src="/vendor/laravel-admin/test/offer.js"></script>--}}

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
                    <img src="/vendor/laravel-admin/test/squares-preloader-gif.svg" alt="">
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
