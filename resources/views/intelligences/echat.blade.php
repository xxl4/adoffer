
<link href="/vendor/laravel-admin/intelligences/select2.css" rel="stylesheet" type="text/css" media="screen">
<link href="/vendor/laravel-admin/intelligences/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen">
<link href="/vendor/laravel-admin/intelligences/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/vendor/laravel-admin/intelligences/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/vendor/laravel-admin/intelligences/demo.css">
<link href="/vendor/laravel-admin/intelligences/font-awesome.css" rel="stylesheet" type="text/css">
<link href="/vendor/laravel-admin/intelligences/animate.min.css" rel="stylesheet" type="text/css">
<link href="/vendor/laravel-admin/intelligences/jquery.scrollbar.css" rel="stylesheet" type="text/css">
<link href="/vendor/laravel-admin/intelligences/datepicker.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/vendor/laravel-admin/intelligences/rickshaw.css" type="text/css" media="screen">
<link rel="stylesheet" href="/vendor/laravel-admin/intelligences/mapplic.css" type="text/css" media="screen">
<link rel="stylesheet" href="/vendor/laravel-admin/intelligences/ionicons.css" type="text/css">
<link href="/vendor/laravel-admin/intelligences/messenger.css" rel="stylesheet" type="text/css" media="screen">
<link href="/vendor/laravel-admin/intelligences/messenger-theme-flat.css" rel="stylesheet" type="text/css" media="screen">

<link href="/vendor/laravel-admin/intelligences/webarch.css" rel="stylesheet" type="text/css">
<link href="/vendor/laravel-admin/intelligences/custom.css" rel="stylesheet" type="text/css">


<script src="/vendor/laravel-admin/intelligences/select2.js" type="text/javascript"></script>

            <title>Reporting platform</title>
            <link href="/vendor/laravel-admin/intelligences/jquery.dataTables.css" rel="stylesheet" type="text/css">
            <link href="/vendor/laravel-admin/intelligences/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen">


            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="grid simple">
                            <div class="grid-title no-border">
                                <h4>
                                    <span class="semi-bold">Top Offers</span>
                                </h4>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse"></a>
                                    <a href="javascript:;" class="remove"></a>
                                </div>
                            </div>
                            <div class="grid-body no-border">
                                <h4><span class="semi-bold">Top 3 Offers filtered per date and geos</span></h4>
                                <p>This section allows you to view and analyse the top 3 offers distribution per any selected date and country.</p>
                                <div class="row">


                                    <div class="col-xs-12">
                                        <div class="row">

                                            <div class="col-xs-12 col-md-6 col-lg-2_min_col_lg_1 use_small_padding">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <select class="list_date select2_list padding_left select2-accessible" name="date" tabindex="-1" aria-hidden="true" id="geos_date">
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
                                            <div class="col-xs-12 col-md-6 col-lg-2_min_col_lg_1 use_small_padding calendar_padding">
                                                <div class="col-xs-4 col-sm-4">
                                                    <div class="row">
                                                        <div class="about_color">
                                                            <p class="about_inputs">Start</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-append success col-xs-8 col-sm-8">
                                                    <div class="row">
                                                        <input type="text" class="form-control date_start date_pic_wid sandbox-advance" id="start_date" value="<?php echo date("d/m/Y") ?>">
                                                        <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-md-6 col-lg-2_min_col_lg_1 use_small_padding calendar_padding">
                                                <div class="col-xs-4 col-sm-4">
                                                    <div class="row">
                                                        <div class="about_color">
                                                            <p class="about_inputs">End</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-append success col-xs-8 col-sm-8">
                                                    <div class="row">
                                                        <input type="text" class="form-control date_end date_pic_wid sandbox-advance" id="end_date" value="<?php echo date("d/m/Y") ?>">
                                                        <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-md-6 col-lg-2_min_col_lg_1">
                                                <div class="row">
                                                    <div class="col-xs-12 use_small_padding">
                                                        <select class="select2_geos select2-hidden-accessible" name="offer_geos" id="geos" multiple="" tabindex="-1" aria-hidden="true">

                                                            @foreach ($category_lis as $key=>$item)
                                                                <option value="{{$item['id']}}">{{$item['country']}}</option>
                                                            @endforeach

                                                        </select>





                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-md-12 col-lg-1">
                                                <div class="row">
                                                    <div class="col-xs-12 use_small_padding">
                                                        <form id="report_test">
                                                            <div>
                                                                <a class="btn btn-success btn-cons button_top" type="submit">Report</a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}"/>



                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div id="offers_date-pie" class="col-md-12" style="display: block;">

                                            <canvas id="myPieChart" style="width: 484px;height:233px;"></canvas>



                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="col-md-8">
                                        <table class="table no-more-tables offer_table" style="display: block;">
                                            <thead>
                                            <tr>
                                                <th style="width:40%">Offer</th>
                                                <th style="width:6%">Percentage</th>
                                                <th style="width:10%">Distribution</th>
                                            </tr>
                                            </thead>
                                            <tbody   id="html_data">


                                            @foreach ($offer_count as $key=>$item)
                                            <tr>
                                                <td class="v-align-middle">
                                                    <span class="muted">{{$item['offer_top']}}</span>
                                                </td>
                                                <td>
                                                    <span class="muted">{{$item['offer_percent']}}</span>
                                                </td>
                                                <td class="v-align-middle">
                                                    <div class="progress">
                                                        <div data-percentage="{{$item['offer_percent']}}" class="progress-bar animate-progress-bar" style="width: {{$item['offer_percent']}}; background-color:#0aa699">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            @endforeach


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="offers_date_no_data" style="display: none;">
                                            <p>
                                                Morpheus: I imagine that right now, you're feeling a bit like Alice. Hmm? Tumbling down the rabbit hole?
                                            </p>
                                            <p>
                                                Neo: You could say that.
                                            </p>
                                            <p>
                                                Morpheus: I see it in your eyes. You have the look of a man who accepts what he sees because he is expecting to wake up. Ironically, that's not far from the truth. Do you believe in fate, Neo?
                                            </p>
                                            <p>
                                                Neo: No.
                                            </p>
                                            <p>
                                                Morpheus: Why not?
                                            </p>
                                            <p>
                                                Neo: Because I don't like the idea that I'm not in control of my life.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>








                    <div class="col-md-12">
                        <div class="grid simple">
                            <div class="grid-title no-border">
                                <h4><span class="semi-bold">Top Countries</span></h4>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse"></a>
                                    <a href="javascript:;" class="remove"></a>
                                </div>
                            </div>
                            <div class="grid-body no-border">
                                <h4><span class="semi-bold">Top 10 Countries filtered per date and offers</span></h4>
                                <p>This section allows you to view and analyse the top 10 countries distribution per any selected date and offer.</p>



                                <div class="row">

                                    <div class="col-xs-12 col-md-6 col-lg-2_min_col_lg_1 use_small_padding">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <select class="list_date1 select2_list1 select2-accessible" name="date" tabindex="-1" aria-hidden="true">
                                                    <option value="today" disabled="disabled">Today</option>
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


                                    <div class="col-xs-12 col-md-6 col-lg-2_min_col_lg_1 use_small_padding calendar_padding">
                                        <div class="col-xs-4 col-sm-4">
                                            <div class="row  ">
                                                <div class="about_color">
                                                    <p class="about_inputs">Start</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-append success col-xs-8 col-sm-8">
                                            <div class="row  ">
                                                <input type="text" class="form-control date_start1 date_pic_wid sandbox-advance">
                                                <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-xs-12 col-md-6 col-lg-2_min_col_lg_1 use_small_padding calendar_padding">
                                        <div class="col-xs-4 col-sm-4">
                                            <div class="row ">
                                                <div class="about_color">
                                                    <p class="about_inputs">End</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-append success col-xs-8 col-sm-8">
                                            <div class="row ">
                                                <input type="text" class="form-control date_end1 date_pic_wid sandbox-advance">
                                                <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-md-6 col-lg-2_min_col_lg_1">
                                        <div class="row">
                                            <div class="col-xs-12 use_small_padding">
                                                <select class="select2_offers select2-hidden-accessible" name="offers" id="offers" multiple="" tabindex="-1" aria-hidden="true">
                                                    @foreach ($all_offer as $key=>$item)
                                                    <option value="DroneX">{{$item['offer_name']}}</option>
                                                    @endforeach
                                                </select>



                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-md-12 col-lg-1">
                                        <div class="row ">
                                            <div class="col-xs-12 use_small_padding">
                                                <form id="report">
                                                    <div>
                                                        <button class="btn btn-success btn-cons button_top" type="submit">Report</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>




                                </div>


                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div id="geo_date-pie" class="col-md-12" style="display: block;">


                                            <canvas id="myCountryPieChart" style="width: 484px;height:233px;"></canvas>


                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="col-md-8">
                                        <table class="table no-more-tables geo_table" style="display: block;">
                                            <thead>
                                            <tr>
                                                <th style="width:40%">Offer</th>
                                                <th style="width:6%">Percentage</th>
                                                <th style="width:10%">Distribution</th>
                                            </tr>
                                            </thead>


                                            <tbody id="html_data_country">

                                            @foreach ($country_count as $key=>$item)
                                            <tr>
                                                <td class="v-align-middle"><span class="muted">
                                                        <img style="width:25px; margin-right:5px;" src="">{{$item['country_top']}}</span>
                                                </td>
                                                <td>
                                                    <span class="muted">{{$item['country_percent']}} </span>
                                                </td>
                                                <td class="v-align-middle">
                                                    <div class="progress">
                                                        <div data-percentage="47.3%" class="progress-bar animate-progress-bar" style="width:{{$item['country_percent']}}; background-color:#0aa699">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach



                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="geo_date_no_data" style="display: none;">
                                            <p>
                                                Morpheus: I imagine that right now, you're feeling a bit like Alice. Hmm? Tumbling down the rabbit hole?
                                            </p>
                                            <p>
                                                Neo: You could say that.
                                            </p>
                                            <p>
                                                Morpheus: I see it in your eyes. You have the look of a man who accepts what he sees because he is expecting to wake up. Ironically, that's not far from the truth. Do you believe in fate, Neo?
                                            </p>
                                            <p>
                                                Neo: No.
                                            </p>
                                            <p>
                                                Morpheus: Why not?
                                            </p>
                                            <p>
                                                Neo: Because I don't like the idea that I'm not in control of my life.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="grid simple">
                            <div class="grid-title no-border">
                                <h4>Hot <span class="semi-bold">Opportunity</span></h4>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse"></a>
                                    <a href="javascript:;" class="remove"></a>
                                </div>
                            </div>
                            <div class="grid-body no-border">
                                <h4>Top Progression Based of the Last 7 Days</h4>
                                <p>This section will dynamically showcase the top opportunity based of the past few days, our smart profitability algorithm analyse a certain number of criteria in real time in order to determine a single offer suggestion, that is the most likely to bring you profit.</p>
                                <br>
                                <div class="row">
                                    <div class="col-xs-12 opportunity-graph text-center"><div id="opportunity-graph" class="easy-pie-custom" data-percent="18.18"><span class="easy-pie-percent"><div style="line-Height:18px; width:80%; margin:35% auto;">TVShareMax 18.18</div></span><canvas height="192" width="192" style="height: 110px; width: 110px;"></canvas></div></div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="grid simple">
                            <div class="grid-title no-border">
                                <h4>New Offers  <span class="semi-bold"></span></h4>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse"></a>
                                    <a href="javascript:;" class="remove"></a>
                                </div>
                            </div>
                            <div class="grid-body no-border">
                                <h4>Last Released Offers</h4>
                                <p>This section display the last 3 offers added to the M4TRIX, jump in fast to profit from the first mover advantage. The early bird catches the worm.
                                </p>
                                <br>
                                <div class="row">
                                    <div class="col-xs-12 ">
                                        <table class="table table-striped table-flip-scroll cf">
                                            <thead class="cf">
                                            <tr>
                                                <th>Offer</th>
                                                <th>Release Date</th>
                                                <th>Payout</th>
                                            </tr>
                                            </thead>
                                            <tbody class="new_offers">

                                            @foreach ($offer_list as $key=>$item)

                                            <tr>
                                                <td>{{$item['offer_name']}}</td>
                                                <td>{{$item['created_at']}}</td>
                                                <td>${{$item['offer_price']}}</td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="grid simple">
                            <div class="grid-title no-border">
                                <h4>Monthly  <span class="semi-bold">Top 3 Offers</span></h4>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse"></a>
                                    <a href="javascript:;" class="remove"></a>
                                </div>
                            </div>
                            <div class="grid-body no-border">
                                <h4>Monthly Progression Of The Top 3 Chart</h4>
                                <p>This section gives you a high level view on the top 3 offers evolution across the current year.</p>
                                <br>
                                <style type="text/css">
                                    .legend table{
                                        position: relative !important;
                                        display: block;
                                    }
                                    .legend>div{
                                        display: none;
                                    }
                                    .legend table tr{
                                        display: inline-block;
                                        padding-right: 5px;
                                    }
                                    .legend table tr td{
                                        padding-right: 5px;
                                    }
                                </style>
                                <div class="row">
                                    <div class="col-xs-12">

                                        <canvas id="myBarChart" style="height: 100px;width: 400px!important;"></canvas>


                                   
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="grid simple">
                            <div class="grid-title no-border">
                                <h4><span class="semi-bold">CTR</span></h4>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse"></a>
                                    <a href="javascript:;" class="remove"></a>
                                </div>
                            </div>
                            <div class="grid-body no-border">
          
                                <br>
                                <div class="row">
                                    <div class="col-xs-12 ">
                                        <div class="ctr_display">
                                            <p>The conversion rate and EPC is highly dependant on the traffic source, the geos, the demos, the funnel type, etc.</p>

                                            <p>As a general figure, our E-Commerce offers convert anywhere from 1% - 4.5%. With a Median Value at 2.5%.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="grid simple">
                            <div class="grid-title no-border">
                                <h4><span class="semi-bold">Traffic Sources</span></h4>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse"></a>
                                    <a href="javascript:;" class="remove"></a>
                                </div>
                            </div>
                            <div class="grid-body no-border">

                                <br>
                                <div class="row">
                                    <div class="col-xs-12 ">
                                        <div class="traffic_sources_display">
                                            <p>Our E-Com offers tend to do extremely well on Native and FB.</p>

                                            <p>Secondary sources are display and GDN.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

<script src="/vendor/laravel-admin/intelligences/functions.js"></script>
<script src="/vendor/laravel-admin/tests/summary.js"></script>
<script src="/vendor/laravel-admin/tests/advanced.js"></script>
<script src="/vendor/laravel-admin/intelligences/advanced1.js"></script>


</div>



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
{{--            <img src="./M4TRIX - NETWORK_files/squares-preloader-gif.svg" alt="">--}}
        </div>
        <div class="input-container">
            <input type="text" id="userInput" placeholder="Type your message...">
            <button id="sendButton" '="">Send</button>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade modal-v-center" id="userTutorialExploreModal" tabindex="-1" role="dialog" aria-labelledby="userTutorialExploreModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h3 class="modal-title text-left" id="userTutorialExploreModalLabel">Ready to get started?</h3>
            </div>
            <div class="modal-body text-left">
                <p>Go to <a href="https://m4trix.network/Reporting-platform/Reporting-platform.php?id=offer" class="text-info">Offers</a> to pick your winning campaign!</p>
                <p>Your Affiliate Manager is available to get you started on the M4TRIX Journey, get to know each other!</p>
                <p class="m-0">For any other inquiry, visit our <a href="https://m4trix.network/Reporting-platform/Reporting-platform.php?id=faq" class="text-info">Help Center</a> or report directly to our communication deck at <span class="text-info">crew@m4trix.network</span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
                <button type="button" class="btn btn-primary btnTutorialDone" data-explore="1">Get Started</button>
            </div>
        </div>
    </div>
</div>



<div style="left: -1000px; overflow: scroll; position: absolute; top: -1000px; border: none; box-sizing: content-box; height: 200px; margin: 0px; padding: 0px; width: 200px;"><div style="border: none; box-sizing: content-box; height: 200px; margin: 0px; padding: 0px; width: 200px;"></div></div><div id="tooltip" style="position: absolute; display: none; border: 1px solid rgb(240, 240, 240); padding: 2px; background-color: rgb(255, 255, 255); z-index: 99999; opacity: 0.8;"></div><div><div class="sweet-overlay" tabindex="-1"></div>



</div>



<div class="cke_screen_reader_only cke_copyformatting_notification">
    <div aria-live="polite"></div></div>

<script>
    $(document).ready(function(){

        
        $(".select2_list").select2();
        console.log("select2_list")
        $(".select2_list").val("week").trigger("change");
        console.log("select2_list 2")

        $(".select2_list1").select2();
        $(".select2_list1").val("week").trigger("change");


        $(".select_timezone").select2();
        $(".select_timezone").val("64").trigger("change");

        

    });
</script>


<script>

    var frontendData = @json($data);
    $(function () {
        $.get('/admin/intelligences/echat', function (e) {
            // console.log('数据接收',frontendData.original.data.offer_sale);
            // console.log('数据值',e)

            var datasetsData = frontendData.original.data.offer_sale;
            var month = frontendData.original.data.month;
            //示例数据
            var labels = [month];
            //创建一个空的 datasets 数组
            var datasets = [];
            //循环遍历 datasetsData，创建数据集对象并添加到 datasets 数组 拼接柱状图数据
            for (var i = 0; i < datasetsData.length; i++) {
                if (datasetsData[i] && datasetsData[i].length >= 2) {
                    var secondElement = datasetsData[i][1];
                }

                // console.log('123', datasetsData[i])

                var dataset = {
                    label: secondElement,
                    data: datasetsData[i],
                    backgroundColor: 'rgba(' + (Math.random() * 255) + ',' + (Math.random() * 255) + ',' + (Math.random() * 255) + ', 0.2)',
                    borderColor: 'rgba(' + (Math.random() * 255) + ',' + (Math.random() * 255) + ',' + (Math.random() * 255) + ', 1)',
                    borderWidth: 1
                };
                datasets.push(dataset);
            }


            //创建柱状图
            var ctx = document.getElementById('myBarChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: datasets,
                    backgroundColor: ['RGB(10,166,153)', 'RGB(0,144,217)', 'RGB(243,89,88)', 'RGB(253,208,28)', 'RGB(95,188,87)', 'RGB(50,100,87)', 'RGB(250,200,187)', 'RGB(350,0,187)', 'RGB(20,400,287)'],
                },
                options: {
                    barPercentage: 0.8,
                    scales: {
                        xAxes: [{
                            categoryPercentage: 0.1 // 设置类目轴上柱子的宽度占比为80%
                        }],
                        yAxes: [{
                            categorySpacing: 0.1, // 或者直接指定具体像素值，如15px
                            beginAtZero: true,
                            max: 1, // 设置纵坐标最大值为 1，表示百分比
                            ticks: {
                                callback: function (value) {
                                    return (value * 100) + '%'; // 在纵坐标刻度上显示百分比
                                }
                            },
                        }
                        ],
                    },
                    tooltips: {
                        callbacks: {
                            label: function (tooltipItem) {
                                return (tooltipItem.yLabel * 100).toFixed(2) + '%'; // 工具提示显示百分比
                            }
                        }
                    }
                }
            });
        });
    });
</script>


<script>
    var frontendData = @json($data);
    $(document).ready(function () {
        var data = frontendData.original.data;
        var ctx = document.getElementById('myPieChart').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: data.offer,
                datasets: [{
                    data: data.total_quantity,
                    backgroundColor: ['RGB(10,166,153)', 'RGB(0,144,217)', 'RGB(243,89,88)', 'RGB(253,208,28)'],
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: true,
                    position: 'right',
                    align: 'start',
                    padding: 30
                }
            }
        });



        $("#report_test").click(function () {



            //动作触发后执行都代码
            var start_date = $("#start_date").val();
            var end_date = $("#end_date").val();
            var country = $("#geos").val();

            // 发送 AJAX 请求
            function updateOfferChartData() {

                $.ajax({
                    url: '/admin/intelligences/offerPie',
                    method: 'GET',
                    dataType: 'json',
                    data: {start_date: start_date, end_date: end_date, country: country},
                    success: function (data) {

                        var res = data.data.offer_sale;
                        myPieChart.data.datasets[0].data = res.total_quantity;
                        myPieChart.data.labels = res.offer;
                        // 重新绘制图表
                        myPieChart.update();

                        $("#html_data").empty();
                        $("#html_data").html(res.total_sales_html);
                    },
                });
            }
            updateOfferChartData();
        });
    });


    // 更新饼图数据
    function updatePieChart(newData) {
        // 判断数据是否符合预期格式
        if (isValidDataFormat(newData)) {
            myPieChart.data = newData;
            myPieChart.update();
        } else {
            console.error('Invalid data format');
        }
    }


    // 判断数据是否符合预期格式
    function isValidDataFormat(data) {
        return (
            data &&
            data.labels &&
            Array.isArray(data.labels) &&
            data.datasets &&
            Array.isArray(data.datasets) &&
            data.datasets.length > 0 &&
            data.datasets[0].data &&
            Array.isArray(data.datasets[0].data)
        );
    }

</script>


<script>
    function generateRandomColors(numColors) {
        var colors = [];
        for (var i = 0; i < numColors; i++) {
            var r = Math.floor(Math.random() * 256);
            var g = Math.floor(Math.random() * 256);
            var b = Math.floor(Math.random() * 256);
            var alpha = Math.random().toFixed(2); // 控制透明度，可根据需求修改
            colors.push('rgba(' + r + ',' + g + ',' + b + ',' + alpha + ')');
        }
        return colors;
    }

    var frontendData = @json($data);
    $(document).ready(function () {
        var data = frontendData.original.data;

        var ctx = document.getElementById('myCountryPieChart').getContext('2d');
        var pieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: data.country,
                datasets: [{
                    data: data.country_total_quantity,
                    // backgroundColor: generateRandomColors(10),

                    backgroundColor: ['RGB(10,166,153)', 'RGB(0,144,217)', 'RGB(243,89,88)', 'RGB(253,208,28)', 'RGB(95,188,87)', 'RGB(50,100,87)', 'RGB(250,200,187)', 'RGB(350,0,187)', 'RGB(20,400,287)'],

                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                // width: 484,
                // height: 233,
                legend: {
                    display: true,
                    position: 'right',
                    align: 'center',
                    fontSize: 10
                }
            }
        });


        $("#report").click(function () {
            //动作触发后执行都代码
            var start_date = $(".date_start1").val();
            var end_date = $(".date_end1").val();
            var offers = $("#offers").val();

            // 发送 AJAX 请求
            function updateCountryChartData() {
                $.ajax({
                    url: '/admin/intelligences/countryPie',
                    method: 'GET',
                    dataType: 'json',
                    data: {start_date: start_date, end_date: end_date, offers: offers},
                    success: function (data) {

                        var res = data.data.offer_sale;
                        // console.log('国家排行', res.country);

                        pieChart.data.datasets[0].data = res.country_total_quantity;
                        pieChart.data.labels = res.country;
                        // 重新绘制图表
                        pieChart.update();

                        $("#html_data_country").empty();
                        $("#html_data_country").html(res.total_sales_html);

                    },
                    error: function (error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }
            updateCountryChartData();
        });
    });


    // 更新饼图数据
    function updatePieChart(newData) {
        // 判断数据是否符合预期格式
        if (isValidDataFormat(newData)) {
            myPieChart.data = newData;
            myPieChart.update();
        } else {
            console.error('Invalid data format');
        }
    }

    // 判断数据是否符合预期格式
    function isValidDataFormat(data) {
        return (
            data &&
            data.labels &&
            Array.isArray(data.labels) &&
            data.datasets &&
            Array.isArray(data.datasets) &&
            data.datasets.length > 0 &&
            data.datasets[0].data &&
            Array.isArray(data.datasets[0].data)
        );
    }
</script>
