<!-- BEGIN PLUGIN CSS -->
<link href="/assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />
<link href="/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
<link href="/assets/plugins/bootstrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/plugins/bootstrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="/assets/plugins/shape-hover/css/demo.css" />
<link href="/assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="/assets/plugins/animate.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" />
<link href="/assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="/assets/plugins/sweet-alert/sweet-alert.css">
<link rel="stylesheet" href="/assets/plugins/jquery-ricksaw-chart/css/rickshaw.css" type="text/css" media="screen">
<link rel="stylesheet" href="/assets/plugins/Mapplic/mapplic/mapplic.css" type="text/css" media="screen">
<link rel="stylesheet" href="/css/ionicons.css" type="text/css">
<link href="/assets/plugins/jquery-notifications/css/messenger.css" rel="stylesheet" type="text/css" media="screen" />
<link href="/assets/plugins/jquery-notifications/css/messenger-theme-flat.css" rel="stylesheet" type="text/css" media="screen" />
<link href="/assets/plugins/jquery-jvectormap/css/jquery-jvectormap-1.2.2.css?v=0.1" rel="stylesheet" type="text/css" media="screen" />
<!-- END PLUGIN CSS -->
<!-- BEGIN CORE CSS FRAMEWORK -->
<link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="/webarch/css/webarch.css?v=0.1" rel="stylesheet" type="text/css" />
<link href="/css/custom.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="/css/links_img.css">
<!-- END CORE CSS FRAMEWORK -->

{{--<script src="/vendor/laravel-admin/analytic/bootstrap-select.min.js"></script>--}}
<script src="/vendor/laravel-admin/analytic/clipboard.min.js"></script>
<script src="/vendor/laravel-admin/test/chosen.jquery.js"></script>


<!-- END CONTENT -->
<!-- BEGIN CORE JS FRAMEWORK-->
<script src="/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<!-- BEGIN JS DEPENDECENCIES-->
<script src="/js/jquery-2.1.4.js"></script>


<!--	<script src="assets/plugins/bootstrapv3/js/bootstrap.min.js" type="text/javascript"></script>-->


{{--影响下拉--}}
{{--<script src="/assets/plugins/bootstrapv3/js/bootstrap.js" type="text/javascript"></script>   --}}
{{--<script src="/js/bootstrap-tooltip-custom-class-master/bootstrap-v3/popover/dist/js/bootstrap-popover-custom-class.min.js" type="text/javascript"></script>--}}
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="/assets/plugins/jquery-block-ui/jqueryblockui.min.js" type="text/javascript"></script>
<script src="/assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>



<script src="/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
<script src="/assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="/assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>

{{--<script src="/assets/plugins/bootstrap-select2/select2.js" type="text/javascript"></script>--}}

<script src="/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="/assets/js/form_elements.js" type="text/javascript"></script>
<script src="/assets/plugins/sweet-alert/sweet-alert.min.js"></script>
<script src="/assets/plugins/clipboard.js"></script>
<script src="/assets/plugins/jquery-notifications/js/messenger.min.js" type="text/javascript"></script>
<!-- END CORE JS DEPENDECENCIES-->
<!-- BEGIN CORE TEMPLATE JS -->
<script src="/webarch/js/webarch.js" type="text/javascript"></script>
<!-- END CORE TEMPLATE JS -->

<!-- TEXT EDITOR -->
{{--<script>--}}
{{--    $.fn.modal.Constructor.prototype.enforceFocus = function() {--}}
{{--        modal_this = this--}}
{{--        $(document).on('focusin.modal', function (e) {--}}
{{--            if (modal_this.$element[0] !== e.target && !modal_this.$element.has(e.target).length--}}
{{--                && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_select')--}}
{{--                && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_text')) {--}}
{{--                modal_this.$element.focus()--}}
{{--        }--}}
{{--    })--}}
{{--    };--}}
{{--</script>--}}
<script src="/assets/plugins/ckeditor/ckeditor.js?v=0.1" type="text/javascript"></script>
<script src="/assets/plugins/ckeditor/config.js?v=0.1" type="text/javascript"></script>
<!-- TEXT EDITOR -->

<script>var switch_theme = 0;</script>

<!-- for tutorial.php || headerMenuFaq.php || faq.php -->
<link href="/assets/plugins/lity-2.4.1/dist/lity.css" rel="stylesheet">
<script src="/assets/plugins/lity-2.4.1/dist/lity.js"></script>

<script src="/js/jquery.cookie.js"></script>
<script>
    window.networks = [{"net":"net","name":"All networks","uid":"","role":""}];
    window.net = 'net';
    window.selectedUid = '';
    window.selectedRole = '';
    window.domain = '<?php echo admin_url("/");?>'
</script>
<script src="/js/main.js"></script>
<script type="text/javascript" src="/js/notifications.js?v=0.4"></script>
<script type="text/javascript" src="/js/email-broadcast.js?v=0.1"></script>

<div class="sm-gutter">

    <div class="row">
        <!-- BEGIN WORLD MAP WIDGET - MAP -->
        <div class="col-md-12 col-vlg-12 m-b-12">
            <div class="row">
                <div class="col-md-12 m-b-10" data-sync-height="true">
                    <div class="col-md-8 col-vlg-8 col-sm-8 no-padding -height wait_data">
                        <div class="tiles green" id="mapplic_demo">
                        </div>
                        <div class="clearfix"></div>
                        <div class="wait_loader" style=""><img src="/assets/plugins/Mapplic/mapplic/images/squares-preloader-gif.svg" alt=""></div>
                    </div>
                    <div class="col-md-4 col-vlg-4 col-sm-4 no-padding wait_data">
                        <div class="tiles black" style="height: 550px;">
                            <div class="tiles-body">
                                <h5 class="text-white"><span class="semi-bold">SALES GEOGRAPHIC DISTRIBUTION</span></h5>
                                <input type="text" id="country_search" placeholder="Search Country..." class="form-control input-sm m-t-20 text-white">
                                <div hidden id="href_map"></div>
                                <div class="m-t-40">
                                    <div class="widget-stats">
                                        <div class="wrapper"> <span class="item-title">Overall Sales</span> <span class="item-count animate-number semi-bold all_peyout" data-animation-duration="700">0</span>
                                        </div>
                                    </div>
                                    <div class="widget-stats">
                                        <div class="wrapper"> <span class="item-title">Today’s Sales</span> <span class="item-count animate-number semi-bold day_peyout" data-animation-duration="700">0</span>
                                        </div>
                                    </div>
                                    <div class="widget-stats hidden-sm">
                                        <div class="wrapper last"> <span class="item-title">Monthly Sales</span> <span class="item-count animate-number semi-bold month_peyout" data-animation-duration="700">0</span>
                                        </div>
                                    </div>
                                    <div class="progress transparent progress-small no-radius m-t-20" style="width:90%">
                                        <div class="progress-bar progress-bar-success animate-progress-bar percentage" data-percentage="0"></div>
                                    </div>
                                    <div class="description"> <span class="text-white mini-description message"></span></div>
                                </div>
                            </div>
                            <div id="chart" style="height:123px"> </div>
                        </div>
                        <div class="wait_loader" style=""><img src="/assets/plugins/Mapplic/mapplic/images/squares-preloader-gif.svg" alt=""></div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12">
            <div class="row">
                <!-- BEGIN REALTIME SALES GRAPH -->
                <div class="col-md-12 col-vlg-6 m-b-10">
                    <div class="tiles white last_sale_container p-b-5">
                        <div class="sales-graph-heading">
                            <div class="col-md-5 col-sm-5">
                                <p class="semi-bold">You have earned</p>
                                <h4><span class="item-count animate-number semi-bold all_peyout_price" data-value="0" data-animation-duration="700">12,260</span> USD</h4>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <p class="semi-bold">TODAY</p>
                                <h4><span class="item-count animate-number semi-bold day_peyout_price" data-value="0" data-animation-duration="700">0</span> USD</h4>
                            </div>
                            <div class="col-md-4 col-sm-3">
                                <p class="semi-bold">THIS MONTH</p>
                                <h4><span class="item-count animate-number semi-bold month_peyout_price" data-value="0" data-animation-duration="700">0</span> USD</h4>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <h5 class="semi-bold m-t-30 m-l-30">LAST SALES</h5>
                        <div class="table no-more-tables m-t-20 m-l-20 m-b-30 last_sale">
                            <div class="forst_row_table col_head_table" style="width:18%; display: inline-block;">Sale Date </div>
                            <div class="second_row_table col_head_table" style="width:18%; display: inline-block;">Time</div>
                            <div class="second_row_table col_head_table" style="width:44%; display: inline-block;">Offer</div>
                            <div class="last_row_table col_head_table" style="width:12%; display: inline-block;">Payout</div>
                            <div class="last_sales"><hr class="teble_hr" style="width:calc(100% - 20px);"><div class="forst_row_table table_content_top bold text-success" style="width:18%; display: inline-block;">27-10-2020</div><div class="forst_row_table table_content_top bold text-success" style="width:18%; display: inline-block;"> 00:23:49</div><div class="second_row_table table_content_top" style="width:44%; display: inline-block;">Ecommerce - WIFI UltraBoost - All Languages - EXCLUSIVE</div><div class="last_row_table table_content_top bold text-success" style="width:12%; display: inline-block; text-align: center;"> $ 40</div><hr class="teble_hr" style="width:calc(100% - 20px);"><div class="forst_row_table table_content_top bold text-success" style="width:18%; display: inline-block;">26-10-2020</div><div class="forst_row_table table_content_top bold text-success" style="width:18%; display: inline-block;"> 21:45:31</div><div class="second_row_table table_content_top" style="width:44%; display: inline-block;">Ecommerce - WIFI UltraBoost - All Languages - EXCLUSIVE</div><div class="last_row_table table_content_top bold text-success" style="width:12%; display: inline-block; text-align: center;"> $ 40</div><hr class="teble_hr" style="width:calc(100% - 20px);"><div class="forst_row_table table_content_top bold text-success" style="width:18%; display: inline-block;">28-02-2020</div><div class="forst_row_table table_content_top bold text-success" style="width:18%; display: inline-block;"> 07:31:07</div><div class="second_row_table table_content_top" style="width:44%; display: inline-block;">Ecommerce - BarXStop INTL - All Languages - EXCLUSIVE</div><div class="last_row_table table_content_top bold text-success" style="width:12%; display: inline-block; text-align: center;"> $ 30</div><hr class="teble_hr" style="width:calc(100% - 20px);"><div class="forst_row_table table_content_top bold text-success" style="width:18%; display: inline-block;">28-02-2020</div><div class="forst_row_table table_content_top bold text-success" style="width:18%; display: inline-block;"> 01:00:20</div><div class="second_row_table table_content_top" style="width:44%; display: inline-block;">Ecommerce - BarXStop INTL - All Languages - EXCLUSIVE</div><div class="last_row_table table_content_top bold text-success" style="width:12%; display: inline-block; text-align: center;"> $ 30</div><hr class="teble_hr" style="width:calc(100% - 20px);"><div class="forst_row_table table_content_top bold text-success" style="width:18%; display: inline-block;">11-02-2020</div><div class="forst_row_table table_content_top bold text-success" style="width:18%; display: inline-block;"> 22:49:00</div><div class="second_row_table table_content_top" style="width:44%; display: inline-block;">Ecommerce - BarXStop INTL - All Languages - EXCLUSIVE</div><div class="last_row_table table_content_top bold text-success" style="width:12%; display: inline-block; text-align: center;"> $ 30</div></div>
                        </div>
                        <div id="sales-graph"> </div>
                    </div>
                    <div class="wait_loader" style=""><img src="/assets/plugins/Mapplic/mapplic/images/squares-preloader-gif.svg" alt=""></div>
                </div>
                <!-- END REALTIME SALES GRAPH -->

                <!--noitificatuiions widget-->
                <div class="col-md-12 col-vlg-6">
                    <div class="tiles white m-b-10">
                        <div class="tiles-body">
                            <!-- <div class="controller">
                                <a href="javascript:;" class="reload"></a>
                                <a href="javascript:;" class="remove"></a>
                            </div> -->
                            <h5><span class="semi-bold">NOTIFICATIONS</span></h5>
                            <div class="m-t-20">
                                <div class="scroll-wrapper dashboard_note scrollbar-dynamic" style="position: relative; height: 363px;"><div class="dashboard_note scrollbar-dynamic scroll-content scroll-scrollx_visible scroll-scrolly_visible" style="margin-bottom: -17px; margin-right: -17px; height: 380px;">
                                        <div class="notification-messages read notify-preview-item" data-message_id="3500">
                                            <div class="notification_data">
                                                <div class="user-profile"> <img src="/images/users_profile/37200_8.jpg" alt="" data-src="/images/users_profile/37200_8.jpg" data-src-retina="/images/users_profile/37200_8.jpg" width="35" height="35"> </div>
                                                <div class="message-wrapper">
                                                    <div class="heading"> Easy Wins with Lower CPA Offers: Give It A Shot </div>
                                                    <div class="description"> <p style="margin-left:0px; margin-right:0px; text-align:start">Dear M4TRIX Affiliates,</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">I hope this email finds you well. As we continue to navigate through the landscape of affiliate marketing and e-commerce, we want to bring you a quick tip that can help you if you're struggling to generate the traction that we <strong>know</strong> you're capable of. Sometimes, all you need is a small win, and these can come in the form of lower ticket offers.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">While high CPAs are undoubtedly attractive and crucial for scaling operations, it's essential to recognize the potential of lower CPA offers in driving significant conversions. Today, we want to highlight three such offers within our network: KneeBoost Pro, ReliefMate Pro, and GermsPurge Pro.</p>

                                                        <ol style="margin-left:0px; margin-right:0px">
                                                            <li>
                                                                <p style="margin-left:0px; margin-right:0px"><strong><a href="https://popularhitech.com/intl_3/?prod=kneeboostpro&amp;net=net" target="_blank">KneeBoost Pro $28</a>:</strong> This innovative knee brace is designed to cater to a wide demographic, including active individuals, the elderly, and those on the path to recovery from injury. Its preventative and restorative features make it a sought-after product among various consumer groups.</p>
                                                            </li>
                                                            <li>
                                                                <p style="margin-left:0px; margin-right:0px"><strong><a href="https://popularhitech.com/salespage/reliefmatepro/?prod=reliefmatepro&amp;net=net" target="_blank">ReliefMate Pro $35</a>:</strong> Targeting similar demographics to KneeBoost Pro, ReliefMate Pro offers an EMS therapy massage device known for its efficacy in providing relief and promoting recovery. Its versatile nature makes it a valuable addition to anyone seeking comfort and restoration.</p>
                                                            </li>
                                                            <li>
                                                                <p style="margin-left:0px; margin-right:0px"><a href="https://popularhitech.com/intl/?prod=germspurgepro&amp;net=net" target="_blank"><strong>GermsPurge Pro $30:</strong></a> Hygiene has become more critical than ever, and the average consumer has become more conscious of it. GermsPurge Pro offers an infrared toothbrush hygiene device that not only ensures oral health but also aids in preventing the transmission of bacteria and viruses. Its relevance in today's world makes it a compelling offer with high conversion potential.</p>
                                                            </li>
                                                        </ol>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">While high CPAs should have their place in your strategy, lower CPA offers like the ones mentioned above boast exceptional conversion rates. One of the key reasons behind this is the lack of financial barrier for potential customers. These offers often require smaller testing budgets, than something like ProTabletX with it's $105 payout; making them accessible to a broader audience and facilitating quicker decision-making.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">By tapping into these lower CPA offers, you stand to gain easy wins with minimal investment. They provide an excellent opportunity to diversify your marketing efforts and capitalize on untapped segments of the market.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">If you're interested in exploring these opportunities further or have any questions regarding our lower CPA offers, please don't hesitate to reach out. Our team is here to provide support and guidance every step of the way.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Thank you for your continued partnership with M4TRIX Network. Let's get to it!</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Best regards,</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start"><strong>M4TRIX | Tank</strong></p>
                                                    </div>
                                                </div>
                                                <div class="date pull-right"> 2024-03-01 00:02:17 </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>									<div class="notification-messages info notify-preview-item" data-message_id="3498">
                                            <div class="notification_data">
                                                <div class="user-profile"> <img src="/images/users_profile/37200_8.jpg" alt="" data-src="/images/users_profile/37200_8.jpg" data-src-retina="/images/users_profile/37200_8.jpg" width="35" height="35"> </div>
                                                <div class="message-wrapper">
                                                    <div class="heading"> Try MaxPhone In This Geo: HINT. It's a Gold Mine </div>
                                                    <div class="description"> <p style="margin-left:0px; margin-right:0px; text-align:start">Dear Valued Affiliate Partner,</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">We're excited to introduce you to a golden opportunity that can skyrocket your earnings in a thriving market that frequently tops our <a href="https://m4trix.network/Reporting-platform/Reporting-platform.php?id=intelligence" target="_blank">intelligence list</a>. Today we're releasing an advertorial and sales page translated and localised for Israel, one of our top-performing geos.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Why Israel? Because it's a market that proves to be profitable for our affiliates, time and time again. As a bonus, Android devices reign supreme there. This is where <a href="https://popularhitech.com/advertorial/maxphone_he/?net=net" target="_blank">MaxPhone</a>, with its attractive pricing and premium features, comes into play, offering you a fantastic chance to boost your earnings for months and years to come.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start"><strong>New Resources For You</strong></p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start"><strong>1. <a href="https://popularhitech.com/advertorial/maxphone_he/?net=net" target="_blank">Top-Performing Advertorial:</a></strong> Our meticulously crafted advertorial is translated and ready to go in Hebrew RTL format. It's been optimized and tested to ensure maximum conversion rates in this market. Save time and effort – just plug and play to start generating income.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start"><strong>2. <a href="https://popularhitech.com/salespage/maxphone_he/?net=net" target="_blank">High-Converting Sales Page:</a></strong> We've also prepared a sales page that's been fine-tuned to perfection. It's persuasive, visually appealing, and tailored for the audience. No need to worry about translations, RTL formatting, or design – it's all done for you.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">With <a href="https://popularhitech.com/salespage/maxphone_he/?net=net" target="_blank">MaxPhone</a>, you're poised to seize a slice of a proven, top-performing market, all while promoting a premium Android device that appeals to broad audiences.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Don't miss out on this incredible opportunity! Start promoting MaxPhone in Israel today and watch your profits soar. The potential of this market is limitless.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Ready to get started? <a href="https://m4trix.network/Reporting-platform/Reporting-platform.php?id=offer" target="_blank">Simply log in to your affiliate dashboard to access</a> these new resources and begin your journey to greater profits in Israel.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">If you have any questions or need assistance, our dedicated affiliate support team is here to help you every step of the way.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Here's to unlocking new profits and achieving unprecedented success!</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Best regards,</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start"><strong>M4TRIX | Tank</strong></p>
                                                    </div>
                                                </div>
                                                <div class="date pull-right"> 2024-02-23 06:27:01 </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>									<div class="notification-messages info notify-preview-item" data-message_id="3494">
                                            <div class="notification_data">
                                                <div class="user-profile"> <img src="/images/users_profile/37200_8.jpg" alt="" data-src="/images/users_profile/37200_8.jpg" data-src-retina="/images/users_profile/37200_8.jpg" width="35" height="35"> </div>
                                                <div class="message-wrapper">
                                                    <div class="heading"> You've Got To Be Using These: Presell Pages </div>
                                                    <div class="description"> <p>Hey M4TRIX Affiliate,</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">We hope this message finds you well today. As we strive to empower our affiliates with tools and resources for success, we want to remind both our long-standing and new affiliates about the invaluable collection of <a href="https://mastery.m4trix.com/documentation/m4trix-offers/presell-pages/" target="_blank">presell pages available for our offers</a>.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Presell pages play a pivotal role in optimizing your affiliate campaigns by priming your audience for conversion. They serve as a bridge between your traffic source and the offer, effectively warming up potential customers and increasing the likelihood of a successful conversion. By providing valuable information, building anticipation, and addressing potential objections, presell pages can significantly enhance the performance of your affiliate campaigns.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Here are a few key reasons why utilizing presell pages is essential:</p>

                                                        <ol style="margin-left:0px; margin-right:0px">
                                                            <li>
                                                                <p style="margin-left:0px; margin-right:0px">Ad Network Compliance: Presell pages are instrumental in ensuring compliance with ad networks' policies and guidelines, thereby safeguarding your campaigns from potential penalties or restrictions.</p>
                                                            </li>
                                                            <li>
                                                                <p style="margin-left:0px; margin-right:0px">Improved Conversion Rates: By pre-framing the offer and establishing rapport with your audience, presell pages can significantly boost conversion rates, translating into higher earnings for you.</p>
                                                            </li>
                                                            <li>
                                                                <p style="margin-left:0px; margin-right:0px">Enhanced User Experience: Presell pages create a seamless and engaging user experience, guiding visitors through the sales journey and instilling confidence in their purchasing decision.</p>
                                                            </li>
                                                        </ol>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">To access <a href="https://mastery.m4trix.com/documentation/m4trix-offers/presell-pages/" target="_blank">presell pages for our offers,</a> simply navigate to your dashboard and locate the corresponding links under the offer details. Incorporating presell pages into your affiliate campaigns can yield remarkable results, so we encourage you to leverage this powerful tool in your marketing efforts.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start"><a href="https://mastery.m4trix.com/documentation/m4trix-offers/presell-pages/" target="_blank">Our knowledgebase</a> is also a shortcut to these presell pages that you can use. We'll continuously update it with newer content. So be sure to bookmark it! Instructions on how to use them are also there.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Should you require any assistance or have further inquiries regarding presell pages or any other aspect of your affiliate journey with M4TRIX, our dedicated support team is always here to help.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Thank you for your continued partnership and commitment to excellence. Let's elevate our affiliate campaigns together with the strategic use of presell pages.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Best regards,</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start"><strong>M4TRIX | Tank</strong></p>
                                                    </div>
                                                </div>
                                                <div class="date pull-right"> 2024-02-16 05:57:45 </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>									<div class="notification-messages info notify-preview-item" data-message_id="3491">
                                            <div class="notification_data">
                                                <div class="user-profile"> <img src="/images/users_profile/37200_8.jpg" alt="" data-src="/images/users_profile/37200_8.jpg" data-src-retina="/images/users_profile/37200_8.jpg" width="35" height="35"> </div>
                                                <div class="message-wrapper">
                                                    <div class="heading"> Getting You Up To Speed: New M4TRIX Affiliates </div>
                                                    <div class="description"> <p style="margin-left:0px; margin-right:0px; text-align:start">Dear Affiliate,</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">We're hard at work, creating exciting new stuff behind the scenes, and at the same time, we're honoured to see so many new faces join our network. We want to help you guys get up to speed, and as self sufficient as possible; so you can get the $$$ rolling in.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Our dedicated team stands ready to help whenever necessary. However, we also understand the importance of providing swift solutions to simple queries. Hence, we've curated responses to common questions frequently posed by new affiliates.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Below, you'll find the topics we'll be addressing, along with links to our knowledge base for further guidance:</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start"><a href="https://mastery.m4trix.com/documentation/new-affiliates-start-here/" target="_blank">Affiliate ID</a>: Your unique identifier, known as your net ID, is instrumental in attributing sales and tracking traffic. You can conveniently locate it within any tracking link upon logging in.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start"><a href="https://mastery.m4trix.com/documentation/m4trix-offers/presell-pages/" target="_blank">Presell Pages:</a> Enhancing ad network compliance and visitor conversion rates, presell pages are recommended. Kickstart with an advertorial followed by a sales page, accessible through your offers section under tracking links.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start"><a href="https://mastery.m4trix.com/documentation/m4trix-offers/top-performing-offers/" target="_blank">Top Offers &amp; Geos:</a> Discovering high-performing offers and geographies is effortless through our intelligence section. Leverage this feature to your advantage.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start"><a href="https://mastery.m4trix.com/documentation/traffic/" target="_blank">Best Traffic Sources:</a> Optimize your efforts by focusing on top-performing traffic sources, such as Native, Social, and Search channels. Delve into our beginner's guides to master these avenues effectively.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start"><a href="https://mastery.m4trix.com/documentation/payouts-account-management/" target="_blank">Getting Paid:</a> Ensure smooth transactions by adhering to our payment guidelines. For any concerns regarding payouts or account details, reach out to us if you have any requests out of the norm regarding payouts.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start"><a href="https://mastery.m4trix.com/documentation/basic-tracking/" target="_blank">Pixels and Tracking:</a> Harness the power of pixels and postbacks for precise event tracking and audience retargeting. We're here to assist with any tracking inquiries or test conversions you may require.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">This covers all of your frequently asked questions. Should you require further guidance, rest assured, our team remains at your disposal to support your success.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Warm regards,</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">M4TRIX | Tank</p>
                                                    </div>
                                                </div>
                                                <div class="date pull-right"> 2024-02-09 06:08:31 </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>									<div class="notification-messages info notify-preview-item" data-message_id="3489">
                                            <div class="notification_data">
                                                <div class="user-profile"> <img src="/images/users_profile/37200_8.jpg" alt="" data-src="/images/users_profile/37200_8.jpg" data-src-retina="/images/users_profile/37200_8.jpg" width="35" height="35"> </div>
                                                <div class="message-wrapper">
                                                    <div class="heading"> Plug &amp; Play: New Territory For MaxPhone </div>
                                                    <div class="description"> <p style="margin-left:0px; margin-right:0px; text-align:start">Dear Valued Affiliate Partner,</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">We're excited to introduce you to a golden opportunity that can skyrocket your earnings in an untapped and thriving market. Today we're releasing an advertorial and salespage translated and localised for France, one of Europe's biggest e-commerce hubs.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Why France? Because it's a market ripe for the taking, and Android devices reign supreme there. This is where <a href="https://popularhitech.com/salespage/maxphone_fr/?net=net&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}" target="_blank">MaxPhone</a>, with its attractive pricing and premium features, comes into play, offering you a fantastic chance to boost your earnings for months and years to come.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start"><strong>New Resources For You</strong></p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start"><strong>1. <a href="https://popularhitech.com/advertorial/maxphone_fr/?net=net" target="_blank">Top-Performing Advertorial:</a></strong> Our meticulously crafted advertorial is translated and ready to go. It's been optimized and tested to ensure maximum conversion rates in the French market. Save time and effort – just plug and play to start generating income.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start"><strong>2. <a href="https://popularhitech.com/salespage/maxphone_fr/?net=net" target="_blank">High-Converting Sales Page:</a></strong> We've also prepared a sales page that's been fine-tuned to perfection. It's persuasive, visually appealing, and tailored for the French audience. No need to worry about translations or design – it's all done for you.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">With <a href="https://popularhitech.com/salespage/maxphone_fr/?net=net&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}" target="_blank">MaxPhone</a>, you're poised to seize a relatively untapped market during France's e-commerce boom, all while promoting a premium Android device that appeals to the masses.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Don't miss out on this incredible opportunity! Start promoting MaxPhone in France today and watch your profits soar. The potential for long-term success in this untapped market is limitless.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Ready to get started? <a href="https://m4trix.network/Reporting-platform/Reporting-platform.php?id=offer" target="_blank">Simply log in to your affiliate dashboard to access</a> these new resources and begin your journey to greater profits in France.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">If you have any questions or need assistance, our dedicated affiliate support team is here to help you every step of the way.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Here's to unlocking new profits and achieving unprecedented success!</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Best regards,</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start"><strong>M4TRIX | Tank</strong></p>
                                                    </div>
                                                </div>
                                                <div class="date pull-right"> 2024-02-02 07:51:29 </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>									<div class="notification-messages info notify-preview-item" data-message_id="3486">
                                            <div class="notification_data">
                                                <div class="user-profile"> <img src="/images/users_profile/37200_8.jpg" alt="" data-src="/images/users_profile/37200_8.jpg" data-src-retina="/images/users_profile/37200_8.jpg" width="35" height="35"> </div>
                                                <div class="message-wrapper">
                                                    <div class="heading"> The Fitness Craze Continues: KneeBoost Pro! </div>
                                                    <div class="description"> <p style="margin-left:0px; margin-right:0px; text-align:start">Dear M4TRIX Marketer,</p>

                                                        <p>As the new year fitness trend continues, we have a new offer that can benefit both your audience's health and your affiliate earnings. Interested? Look no further than <a href="https://popularhitech.com/intl_10/?prod=kneeboostpro&amp;net=net" target="_blank">KneeBoost Pro</a>, the innovative knee support sleeve designed to provide massive health benefits to those suffering from knee pain or looking to prevent injuries during physical activities.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start"><strong>Why should you promote KneeBoost Pro?</strong></p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start"><strong>$28 per Sale:</strong> With <a href="https://popularhitech.com/intl_10/?prod=kneeboostpro&amp;net=net" target="_blank">KneeBoost Pro</a>! This low-ticket offer is perfect for beginners looking to start earning, but it's also a fantastic opportunity for seasoned marketers with the right audience.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start"><strong>Targeting Ages 45+:</strong> Knee pain is a common issue among adults aged 45 and above. By promoting <a href="https://popularhitech.com/intl_10/?prod=kneeboostpro&amp;net=net" target="_blank">KneeBoost Pro</a>, you'll have the chance to tap into this demographic and offer them a practical solution to improve their quality of life.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start"><strong>Ride the Health and Fitness Wave:</strong> In January, health and fitness are in the spotlight. It's the perfect time to capitalize on the growing interest in staying active and healthy. Promoting <a href="https://popularhitech.com/intl_10/?prod=kneeboostpro&amp;net=net" target="_blank">KneeBoost Pro</a> aligns perfectly with this trend, making it an ideal choice for affiliate marketers like you.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start"><strong>Key Selling Points of KneeBoost Pro:</strong></p>

                                                        <ul>
                                                            <li style="margin-left: 0px; margin-right: 0px; text-align: start;">Provides excellent knee support during physical activities.</li>
                                                            <li style="margin-left: 0px; margin-right: 0px; text-align: start;">Relieves knee pain and discomfort.</li>
                                                            <li style="margin-left: 0px; margin-right: 0px; text-align: start;">Helps prevent injuries and strain.</li>
                                                            <li style="margin-left: 0px; margin-right: 0px; text-align: start;">Comfortable and easy to wear.</li>
                                                            <li style="margin-left: 0px; margin-right: 0px; text-align: start;">Suitable for various lifestyles and activities.</li>
                                                        </ul>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Don't miss out on this incredible opportunity to join us in promoting <a href="https://popularhitech.com/intl_10/?prod=kneeboostpro&amp;net=net" target="_blank">KneeBoost Pro </a>today and start earning impressive commissions while helping your audience live a pain-free, active life.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">To get started, simply log in to your <a href="https://m4trix.network/Reporting-platform/Reporting-platform.php?id=offer" target="_blank">M4TRIX Network offers section and grab your tracking links and creatives</a>. Presell pages are on the way.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Thank you for being a valued part of the M4TRIX Network family. We look forward to seeing your success with KneeBoost Pro!</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">If you have any questions or need assistance, feel free to reach out to our affiliate support team.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Here's to a prosperous and healthy 2024!</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Best regards,</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start"><strong>M4TRIX | Tank</strong></p>
                                                    </div>
                                                </div>
                                                <div class="date pull-right"> 2024-01-26 04:13:52 </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>									<div class="notification-messages info notify-preview-item" data-message_id="3481">
                                            <div class="notification_data">
                                                <div class="user-profile"> <img src="/images/users_profile/37200_8.jpg" alt="" data-src="/images/users_profile/37200_8.jpg" data-src-retina="/images/users_profile/37200_8.jpg" width="35" height="35"> </div>
                                                <div class="message-wrapper">
                                                    <div class="heading"> Earn Big with HealthWatch - New Year Fitness Craze! </div>
                                                    <div class="description"> <p style="margin-left:0px; margin-right:0px; text-align:start">Dear M4TRIX Network Affiliates,</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">As we run well into the new year, we're thrilled to introduce an exciting opportunity for you to boost your earnings! <a href="https://popularhitech.com/intl/?prod=healthwatch&amp;net=net" target="_blank">HealthWatch</a>, one of our long-performing e-commerce products, is set to dominate the market with the rising wave of new year fitness enthusiasts and health-conscious consumers.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Here's why you should jump on board:</p>

                                                        <ol style="margin-left:0px; margin-right:0px">
                                                            <li>
                                                                <p style="margin-left:0px; margin-right:0px"><strong>Generous $50 Payout:</strong> We're offering an attractive $50 payout for every successful sale. And with scope for payout bumps, this means there's high scale potential.</p>
                                                            </li>
                                                            <li>
                                                                <p style="margin-left:0px; margin-right:0px"><strong>Presell Page:</strong> To help you convert more users into sales, we've created a compelling presell page. Check it out here: <a href="https://hqgeeks.com/ps/healthwatch/index.php?net=net" target="_blank">HealthWatch Presell Page</a>. Simply replace the placeholders with your affiliate information.</p>
                                                            </li>
                                                            <li>
                                                                <p style="margin-left:0px; margin-right:0px"><strong>On-Trend Product:</strong> <a href="https://hqgeeks.com/ps/healthwatch/index.php?net=net" target="_blank">HealthWatch</a> is perfectly aligned with the current trend of heightened health awareness and fitness resolutions that typically surge at the start of each year. Capitalize on this trend to maximize your earnings.</p>
                                                            </li>
                                                        </ol>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start"><strong>Marketing Angles:</strong></p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">To assist you in your promotional efforts, here are five advertising angles you can explore:</p>

                                                        <ol style="margin-left:0px; margin-right:0px">
                                                            <li>
                                                                <p style="margin-left:0px; margin-right:0px"><strong>New Year, New You:</strong> Promote <a href="https://hqgeeks.com/ps/healthwatch/index.php?net=net&amp;aff={AFFID}&amp;sid={SUBID}&amp;cid={CLICKID}" target="_blank">HealthWatch</a> as the must-have gadget for anyone committed to their new year's fitness resolutions. Highlight how it helps users monitor their health and achieve their goals.</p>
                                                            </li>
                                                            <li>
                                                                <p style="margin-left:0px; margin-right:0px"><strong>Precision Health Tracking:</strong> Emphasize the advanced features of HealthWatch, such as heart rate monitoring, sleep tracking, and activity analysis, which provide users with precise insights into their health and well-being.</p>
                                                            </li>
                                                            <li>
                                                                <p style="margin-left:0px; margin-right:0px"><strong>Smart Wearable Technology:</strong> Position HealthWatch as a cutting-edge, stylish accessory that not only looks great but also enhances the user's health and fitness journey.</p>
                                                            </li>
                                                            <li>
                                                                <p style="margin-left:0px; margin-right:0px"><strong>Gift of Good Health:</strong> Encourage your audience to consider HealthWatch as a thoughtful gift for loved ones, promoting well-being and helping them stay on track with their health goals.</p>
                                                            </li>
                                                            <li>
                                                                <p style="margin-left:0px; margin-right:0px"><strong>Limited-Time Offer:</strong> Create a sense of urgency by highlighting limited-time discounts, special offers, or bundles, motivating potential buyers to make a purchase decision now.</p>
                                                            </li>
                                                        </ol>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Don't miss out on this golden opportunity to earn big in the thriving health and fitness niche this new year. Start promoting HealthWatch today and watch your commissions soar!</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">If you have any questions or need further assistance, please don't hesitate to reach out to our dedicated affiliate support team.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Wishing you a prosperous and healthy new year!</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Best regards,</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start"><strong>M4TRIX | Tank</strong></p>
                                                    </div>
                                                </div>
                                                <div class="date pull-right"> 2024-01-19 09:15:33 </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>									<div class="notification-messages info notify-preview-item" data-message_id="3479">
                                            <div class="notification_data">
                                                <div class="user-profile"> <img src="/images/users_profile/37200_8.jpg" alt="" data-src="/images/users_profile/37200_8.jpg" data-src-retina="/images/users_profile/37200_8.jpg" width="35" height="35"> </div>
                                                <div class="message-wrapper">
                                                    <div class="heading"> Beat The Control: 7 Steps To The Perfect Advertorial </div>
                                                    <div class="description"> <p style="margin-left:0px; margin-right:0px; text-align:start">Dear M4TRIX Network Affiliates,</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Hope this email finds you well. Today, we're challenging you to "beat the control". What do we mean by that?</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">In 2024 not only will we be leveling up in terms of the offers we send your way and the tools to help you run them, we want to empower you with the knowledge to improve on these resources. Starting with a quick advertorial masterclass!</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">If you don't already know, advertorials offer a unique opportunity to engage your audience, build trust, and ultimately drive conversions. While we provide top quality, conversion-primed advertorials and pre-landers <a href="https://m4trix.network/Reporting-platform/Reporting-platform.php?id=offer" target="_blank">(check the tracking links in the offer section here)</a>, we want you to differentiate from other marketers by making variations of ours and creating your own.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start"><strong>Here's a secret, our top affiliates have been doing this for years.</strong></p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Let's explore the seven crucial steps to creating the perfect advertorial that captivates your audience and leads to successful sales.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start"><strong>Step 1: Define the Big Idea</strong></p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Grab your audience's attention by crafting a catchy headline that falls into one of these categories: loophole, insider secret, massive result, new discovery/unique mechanism, advantage, or a hot take/controversial opinion. Clearly define the big idea behind the product you're marketing and explain why buyers should care. Take MaxPhone for example: "Tech experts said phones would NEVER have these features at this price.."</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start"><strong>Step 2: Define the Pain or Problem</strong></p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Identify the pain or problem your product aims to solve. Make it relatable to your target audience by discussing who it affects and why it matters to them. Establish an emotional connection that compels your audience to keep reading.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start"><strong>Step 3: Agitate the Pain</strong></p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Take a deeper dive into the pain or problem, agitating the situation by exploring the ripple effects it has on your audience's lives. Highlight the challenges, frustrations, and limitations they face due to this issue, intensifying the need for a solution.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start"><strong>Step 4: Discuss Existing Solutions and Their Limitations</strong></p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Acknowledge the existing solutions available in the market, but focus on their limitations. Prime your audience to recognize the drawbacks of these alternatives, creating a gap that sets the stage for your product as the superior solution.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start"><strong>Step 5: Introduce Your Product as the Ideal Solution</strong></p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Position your product as the game-changer that overcomes the limitations of existing solutions. Emphasize its unique features and benefits, demonstrating why it's the ideal solution to the pain or problem your audience is experiencing.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start"><strong>Step 6: Paint the Picture of Post-Purchase Bliss</strong></p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Create a vivid picture of what life or the customer's situation will look like after investing in your product. Highlight the positive outcomes, improvements, and benefits they can expect, inspiring a sense of excitement and anticipation.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start"><strong>Step 7: Call to Action with Urgency</strong></p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Wrap up your advertorial with a compelling call to action. Encourage your audience to click through and make a purchase by introducing time or quantity-based scarcity. Create a sense of urgency that motivates them to act swiftly.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">By following these seven steps, you'll be well on your way to crafting compelling advertorials that resonate with your audience and drive sales. Remember, the key is to engage, empathize, and inspire action. Best of luck with your campaigns!</p>

                                                        <p>Best,</p>

                                                        <p><strong>M4TRIX | Tank</strong></p>
                                                    </div>
                                                </div>
                                                <div class="date pull-right"> 2024-01-12 07:15:18 </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>									<div class="notification-messages info notify-preview-item" data-message_id="3475">
                                            <div class="notification_data">
                                                <div class="user-profile"> <img src="/images/users_profile/37200_8.jpg" alt="" data-src="/images/users_profile/37200_8.jpg" data-src-retina="/images/users_profile/37200_8.jpg" width="35" height="35"> </div>
                                                <div class="message-wrapper">
                                                    <div class="heading"> Start 2024 With Some Easy Wins! </div>
                                                    <div class="description"> <p>Greetings Affiliate,</p>

                                                        <p>Welcome to 2024! We hope you enjoyed the festivities closing out 2023, and again, we thank you for your hard work and participation of yesteryear. Now, it's a new day, and we're determined for you to vault over last year's performance and reach new heights; so let's start this year off with an <strong>EASY WIN.</strong></p>

                                                        <p>Checked the weather forecast in Australia and New Zealand lately? While it's winter for most of us, they're in their <strong>hottest months of the year, right now!</strong></p>

                                                        <p>This means it's time for you to crack open your CoolEdge campaigns. It's tried, it's tested, and it's proven year after year.</p>

                                                        <p><strong>CoolEdge</strong></p>

                                                        <ul>
                                                            <li>Payout: $60</li>
                                                            <li><a href="https://buysmartproduct.com/advertorial/cooledge/" rel="noreferrer noopener" target="_blank">Advertorial</a></li>
                                                            <li><a href="https://buysmartproduct.com/salespage/cooledge/" rel="noreferrer noopener" target="_blank">Sales Page</a></li>
                                                            <li><a href="https://www.dropbox.com/sh/kmvj0xb16wve3i7/AACvqMj4OkcDTrBmGg9C5WLSa?dl=0" target="_blank">Creatives</a></li>
                                                        </ul>

                                                        <p><strong>Why CoolEdge?</strong></p>

                                                        <p>Great question, it’s selling right now in these geos! It's also been a proven seller for several years running, and most of the work has been done for you. Simply use the pages above.</p>

                                                        <p><strong>Awesome! How Do I Use These Pages?</strong></p>

                                                        <p>First of all, bear in mind that:</p>

                                                        <ul>
                                                            <li>Advertorials and sales pages presell your traffic, increasing the likelihood of getting a conversion.</li>
                                                            <li>Advertising networks don’t like you running traffic directly to checkout.</li>
                                                        </ul>

                                                        <p><strong>Tips</strong></p>

                                                        <ul>
                                                            <li>All you have to do is add your net ID to your chosen landing page. For example, net=999999.</li>
                                                            <li>By default, the advertorial page links to the sales page.&nbsp;<em>If you want, you can skip the sales page by adding “&amp;next=checkout” at the end of your advertorial URL.</em></li>
                                                            <li>You can preset your desired checkout page by adding the URL parameter “target=intl_12”&nbsp;<em>(2 through to 12, or leave it blank for default.)</em></li>
                                                        </ul>

                                                        <p><strong>Why Use These Pages?</strong></p>

                                                        <p>Using advertorials and sales pages with cold traffic increases conversion rates dramatically with the right traffic! All you have to do is plug these pages into your campaigns, start running, and reap the rewards!</p>

                                                        <p><a href="https://m4trix.network/Reporting-platform/Reporting-platform.php?id=offer" rel="noreferrer noopener" target="_blank">Log into the offers section here on the M4TRIX to get your links</a>&nbsp;and use the URL parameters above to customise your flow.</p>

                                                        <p>Don't miss this opportunity. So be on the lookout. Start using these pages today and get to generating those commissions!</p>

                                                        <p>Let's Crush This Year!</p>

                                                        <p><strong>M4TRIX | Tank</strong></p>
                                                    </div>
                                                </div>
                                                <div class="date pull-right"> 2024-01-05 05:02:05 </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>									<div class="notification-messages info notify-preview-item" data-message_id="3472">
                                            <div class="notification_data">
                                                <div class="user-profile"> <img src="/images/users_profile/37200_8.jpg" alt="" data-src="/images/users_profile/37200_8.jpg" data-src-retina="/images/users_profile/37200_8.jpg" width="35" height="35"> </div>
                                                <div class="message-wrapper">
                                                    <div class="heading"> 2023 Year End Wrap Up! Thank You </div>
                                                    <div class="description"> <p>Dear Valued Affiliates,<br>
                                                            <br>
                                                            It's time to put a bow on 2023 and wrap it up! The entire M4TRIX Network would like to thank you for your continued involvement and tenacity. This has been an exciting year for us, as we brought to life many new ideas and initiatives.<br>
                                                            <br>
                                                            This year saw us successfully launch ventures (<a href="https://thepet.care/" target="_blank">ThePet.Care</a> &amp; <a href="https://bioresponse.co/" target="_blank">SkinBliss</a>) in new territories, previously uncharted by M4TRIX. 2024 will bring more, and that means MORE opportunities for you to earn with us.<br>
                                                            <br>
                                                            Other highlights for the year include <a href="https://popularhitech.com/salespage/vacuumgopro/" target="_blank">VacuumGo Pro</a> and <a href="https://popularhitech.com/salespage/maxphone/" target="_blank">MaxPhone</a>, wide appeal offers that proved stable throughout the year and have become staple earners for M4TRIX affiliates. And of course, many of our classics such as <a href="https://popularhitech.com/salespage/cooledge/" target="_blank">CoolEdge </a>and <a href="https://popularhitech.com/salespage/clearview/" target="_blank">ClearView</a> continued to rack up commissions for those who took action.<br>
                                                            <br>
                                                            Thank you for your activity and trust in us throughout this year. Your contributions have helped us to grow and succeed as a company, and we’re thankful to have you as part of our guild.<br>
                                                            <br>
                                                            Looking towards 2024, we’re excited to bring new ideas to life that will bring more profits into the hands of our affiliates. With your valuable support, we are confident in our collective success. The upcoming year holds significant plans for us.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Innovation remains ingrained in our DNA, propelling everything we undertake at M4TRIX Network. We are thrilled to unveil additional exciting developments in the near future.</p>

                                                        <p style="margin-left:0px; margin-right:0px; text-align:start">Wishing you a joyous and healthy holiday season, we look forward to more collaboration with you in the upcoming year.</p>

                                                        <p><br>
                                                            Warm regards,<br>
                                                            <strong>M4TRIX | Morpheus</strong></p>
                                                    </div>
                                                </div>
                                                <div class="date pull-right"> 2024-01-01 04:09:52 </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>							</div><div class="scroll-element scroll-x scroll-scrollx_visible scroll-scrolly_visible"><div class="scroll-element_outer">    <div class="scroll-element_size"></div>    <div class="scroll-element_track"></div>    <div class="scroll-bar" style="width: 87px; left: 0px;"></div></div></div><div class="scroll-element scroll-y scroll-scrollx_visible scroll-scrolly_visible"><div class="scroll-element_outer">    <div class="scroll-element_size"></div>    <div class="scroll-element_track"></div>    <div class="scroll-bar" style="height: 163px; top: 135.971px;"></div></div></div></div>
                            </div>
                            <div class="text-center m-t-10">
                                <a href="?id=account_notifications">See All</a>
                            </div>
                        </div>
                        <div class="wait_loader" style=""><img src="/assets/plugins/Mapplic/mapplic/images/squares-preloader-gif.svg" alt=""></div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12">

            <div class="row">
                <div class="col-md-12">
                    <div class="tiles white m-b-10 clearfix">
                        <div class="col-md-6 col-sm-12 no-padding">
                            <div id="world_daily" style="height:360px"></div>
                        </div>
                        <div class="col-md-6 p-t-35 p-r-20 p-b-30 col-sm-12">
                            <div class="col-md-6 col-sm-6 ">
                                <div class="row b-b b-grey p-b-10">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <p class="bold small-text">YOUR TOP GEOS TODAY</p>
                                        <h3 class="bold text-success"><span class="top5country_percent">0%</span></h3>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <p class="bold small-text">SALES</p>
                                        <h3 class="bold text-black"><span class="top5country_count">0</span></h3>
                                    </div>
                                </div>
                                <div class="countries_data_count"></div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="row b-b b-grey p-b-10">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <p class="bold small-text">YOUR TOP OFFERS TODAY</p>
                                        <h3 class="bold text-success"><span class="top5offer_percent">0%</span></h3>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <p class="bold small-text">SALES</p>
                                        <h3 class="bold text-black"><span class="top5offer_count">0</span></h3>
                                    </div>
                                </div>
                                <div class="offers_data_count"></div>
                            </div>
                        </div>
                    </div>
                    <div class="wait_loader" style=""><img src="/assets/plugins/Mapplic/mapplic/images/squares-preloader-gif.svg" alt=""></div>
                </div>
            </div>
            <!--geo day widget-->

            <div class="col-md-12 m-b-10">
                <div class="row tiles-container tiles white spacing-bottom">
                    <div class="tile-more-content col-md-4 col-sm-4 no-padding">
                        <div class="tiles green">
                            <div class="tiles-body">
                                <div class="heading"> Global Intel Network Wide </div>
                                <p>Stats Range : Last Week</p>
                            </div>
                            <div class="tile-footer">
                                <div class="iconplaceholder"><i class="fa fa-map-marker"></i></div>
                                <span class="country_num">20</span> Countries, <span class="offer_num">23</span> Offers Receiving Traffic
                            </div>
                        </div>
                        <div class="tiles-body">

                            <ul class="progress-list weekly_top_geo_per_offer">

                                <!--
                                    <li>
                                        <div class="details-wrapper">
                                            <div class="name">MaxPhone</div>
                                            <div class="description">Israel, Australia, Canada</div>
                                        </div>

                                        <div class="details-status pull-right">
                                            <span class="animate-number" data-value="29.66" data-animation-duration="800">29.66</span>% </div>
                                        <div class="clearfix"></div>
                                        <div class="progress progress-small no-radius">
                                            <div class="progress-bar animate-progress-bar" style="background-color: rgb(69, 122, 241); width: 30%;" data-percentage="30%"></div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="details-wrapper">
                                            <div class="name">CoolEdge</div>
                                            <div class="description">United States, Australia, New Zealand</div>
                                        </div>
                                        <div class="details-status pull-right">
                                            <span class="animate-number" data-value="20.34" data-animation-duration="800">20.34</span>% </div>
                                        <div class="clearfix"></div>
                                        <div class="progress progress-small no-radius"><div class="progress-bar animate-progress-bar" style="background-color: rgb(253, 208, 28); width: 20%;" data-percentage="20%"></div></div>
                                    </li>

                                    <li>
                                        <div class="details-wrapper"><div class="name">Tactic AIR Drone</div><div class="description">United Kingdom, Australia, Guernsey</div>
                                        </div>
                                        <div class="details-status pull-right"> <span class="animate-number" data-value="9.32" data-animation-duration="800">9.32</span>% </div>
                                        <div class="clearfix"></div>
                                        <div class="progress progress-small no-radius"><div class="progress-bar animate-progress-bar" style="background-color: rgb(243, 89, 88); width: 9%;" data-percentage="9%"></div>
                                        </div>
                                    </li>

                                    -->
                            </ul>
                        </div>
                    </div>
                    <div class="tiles white col-md-8 col-sm-8 no-padding">
                        <div class="tiles-chart">
                            <div class="tiles-body">
                                <div class="tiles-title">NETWORK WIDE DISTRIBUTION</div>
                                <div class="heading"> Last Week Top 10 Geos <i class="fa fa-map-marker"></i> </div>
                            </div>
                            <div id="world_weekly" style="height:405px"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="wait_loader" style=""><img src="/assets/plugins/Mapplic/mapplic/images/squares-preloader-gif.svg" alt=""></div>
            </div>
        </div>


    </div>

</div>

<script src="/assets/plugins/Mapplic/js/jquery.easing.js" type="text/javascript"></script>
<script src="/assets/plugins/Mapplic/js/jquery.mousewheel.js" type="text/javascript"></script>
<script src="/assets/plugins/Mapplic/js/hammer.js" type="text/javascript"></script>
<script src="/assets/plugins/Mapplic/mapplic/mapplic.js?v=0.1" type="text/javascript"></script>
<script src="/assets/plugins/jquery-ricksaw-chart/js/raphael-min.js"></script>
<script src="/assets/plugins/jquery-ricksaw-chart/js/d3.v2.js"></script>
<script src="/assets/plugins/jquery-ricksaw-chart/js/rickshaw.min.js"></script>
<script src="/assets/plugins/jquery-jvectormap/js/jquery-jvectormap-1.2.2.min.js?v=0.1" type="text/javascript"></script>
<script src="/assets/plugins/jquery-jvectormap/js/jquery-jvectormap-world-mill.js?v=0.1" type="text/javascript"></script>
<!-- <script src="assets/js/widgets.js" type="text/javascript"></script> -->
<script> var theme_color = 'dark';</script>
<script src="/js/home.js?v=0.1"></script>
