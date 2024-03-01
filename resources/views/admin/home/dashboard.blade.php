<!-- BEGIN PLUGIN CSS -->
<style>
    .skin-black .content-header {
        display: none;
    }
</style>

<link href="/vendor/laravel-admin/home/select2.css" rel="stylesheet" type="text/css" media="screen">
<link href="/vendor/laravel-admin/home/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen">
<link href="/vendor/laravel-admin/home/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/vendor/laravel-admin/home/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/vendor/laravel-admin/home/demo.css">
<link href="/vendor/laravel-admin/home/font-awesome.css" rel="stylesheet" type="text/css">
<link href="/vendor/laravel-admin/home/animate.min.css" rel="stylesheet" type="text/css">
<link href="/vendor/laravel-admin/home/jquery.scrollbar.css" rel="stylesheet" type="text/css">
<link href="/vendor/laravel-admin/home/datepicker.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/vendor/laravel-admin/home/sweet-alert.css">
<link rel="stylesheet" href="/vendor/laravel-admin/home/rickshaw.css" type="text/css" media="screen">
<link rel="stylesheet" href="/vendor/laravel-admin/home/mapplic.css" type="text/css" media="screen">
<link rel="stylesheet" href="/vendor/laravel-admin/home/ionicons.css" type="text/css">
<link href="/vendor/laravel-admin/home/messenger.css" rel="stylesheet" type="text/css" media="screen">
<link href="/vendor/laravel-admin/home/messenger-theme-flat.css" rel="stylesheet" type="text/css" media="screen">
<link href="/vendor/laravel-admin/home/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" media="screen">
<!-- END PLUGIN CSS -->
<!-- BEGIN CORE CSS FRAMEWORK -->
<link href="/vendor/laravel-admin/home/icon" rel="stylesheet">
<link href="/vendor/laravel-admin/home/webarch.css" rel="stylesheet" type="text/css">
<link href="/vendor/laravel-admin/home/custom.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/vendor/laravel-admin/home/links_img.css">
<!-- END CORE CSS FRAMEWORK -->

<!-- END CONTENT -->
<!-- BEGIN CORE JS FRAMEWORK-->
</script><script async="" src="/vendor/laravel-admin/home/roundtrip.js"></script>
<script src="/vendor/laravel-admin/home/pace.min.js" type="text/javascript"></script>
<!-- BEGIN JS DEPENDECENCIES-->
<script src="/vendor/laravel-admin/home/jquery-2.1.4.js"></script>
<!--	<script src="assets/plugins/bootstrapv3/js/bootstrap.min.js" type="text/javascript"></script>-->
<script src="/vendor/laravel-admin/home/bootstrap.js" type="text/javascript"></script>
<script src="/vendor/laravel-admin/home/raphael-min.js"></script>
<script src="/vendor/laravel-admin/home/jqueryblockui.min.js" type="text/javascript"></script>
<script src="/vendor/laravel-admin/home/jquery.unveil.min.js" type="text/javascript"></script>
<script src="/vendor/laravel-admin/home/jquery.scrollbar.min.js" type="text/javascript"></script>
<script src="/vendor/laravel-admin/home/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="/vendor/laravel-admin/home/jquery.validate.min.js" type="text/javascript"></script>
<script src="/vendor/laravel-admin/home/select2.js" type="text/javascript"></script>
<script src="/vendor/laravel-admin/home/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="/vendor/laravel-admin/home/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="/vendor/laravel-admin/home/form_elements.js" type="text/javascript"></script>
<script src="/vendor/laravel-admin/home/sweet-alert.min.js"></script>
<script src="/vendor/laravel-admin/home/clipboard.js"></script>
<script src="/vendor/laravel-admin/home/messenger.min.js" type="text/javascript"></script>
<!-- END CORE JS DEPENDECENCIES-->
<!-- BEGIN CORE TEMPLATE JS -->
<script src="/vendor/laravel-admin/home/webarch.js" type="text/javascript"></script>
<script src="/vendor/laravel-admin/home/chat.js" type="text/javascript"></script>
<!-- END CORE TEMPLATE JS -->

<!-- TEXT EDITOR -->
<script>
    // bootstrap-ckeditor-fix.js
    // hack to fix ckeditor/bootstrap compatiability bug when ckeditor appears in a bootstrap modal dialog
    //
    // Include this file AFTER both jQuery and bootstrap are loaded.

    $.fn.modal.Constructor.prototype.enforceFocus = function() {
        modal_this = this
        $(document).on('focusin.modal', function (e) {
            if (modal_this.$element[0] !== e.target && !modal_this.$element.has(e.target).length
                && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_select')
                && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_text')) {
                modal_this.$element.focus()
            }
        })
    };
</script>
<script src="/vendor/laravel-admin/home/ckeditor.js" type="text/javascript"></script><style>.cke{visibility:hidden;}</style>
<script src="/vendor/laravel-admin/home/config.js" type="text/javascript"></script>
<!-- TEXT EDITOR -->

<script>var switch_theme = 0;</script>

<!-- for tutorial.php || headerMenuFaq.php || faq.php -->
<link href="/vendor/laravel-admin/home/lity.css" rel="stylesheet">
<script src="/vendor/laravel-admin/home/lity.js"></script>

<script src="/vendor/laravel-admin/home/jquery.cookie.js"></script>
<script>
    window.networks = [{"net":"net","name":"All networks","uid":"","role":""}];
    window.net = 'net';
    window.selectedUid = '';
    window.selectedRole = '';
</script>
<script src="/vendor/laravel-admin/home/main.js"></script>
<script type="text/javascript" src="/vendor/laravel-admin/home/notifications.js"></script>
<script type="text/javascript" src="/vendor/laravel-admin/home/email-broadcast.js"></script>

{{--<script type="text/javascript">--}}
{{--    adroll_adv_id = "BBRDVRROJ5B3ZCI2VHENNY";--}}
{{--    adroll_pix_id = "ABU5YKBIZJEL5KHFXZZB7T";--}}
{{--    adroll_version = "2.0";--}}

{{--    (function(w, d, e, o, a) {--}}
{{--        w.__adroll_loaded = true;--}}
{{--        w.adroll = w.adroll || [];--}}
{{--        w.adroll.f = [ 'setProperties', 'identify', 'track' ];--}}
{{--        var roundtripUrl = "https://s.adroll.com/j/" + adroll_adv_id--}}
{{--            + "/roundtrip.js";--}}
{{--        for (a = 0; a < w.adroll.f.length; a++) {--}}
{{--            w.adroll[w.adroll.f[a]] = w.adroll[w.adroll.f[a]] || (function(n) {--}}
{{--                return function() {--}}
{{--                    w.adroll.push([ n, arguments ])--}}
{{--                }--}}
{{--            })(w.adroll.f[a])--}}
{{--        }--}}

{{--        e = d.createElement('script');--}}
{{--        o = d.getElementsByTagName('script')[0];--}}
{{--        e.async = 1;--}}
{{--        e.src = roundtripUrl;--}}
{{--        o.parentNode.insertBefore(e, o);--}}
{{--    })(window, document);--}}
{{--    adroll.track("pageView");--}}
{{--</script>--}}


<meta http-equiv="origin-trial" content="A41wt2Lsq30A9Ox/WehogvJckPI4aY9RoSxhb8FMtVnqaUle1AtI6Yf7Wk+7+Wm0AfDDOkMX+Wn6wnDpBWYgWwYAAAB8eyJvcmlnaW4iOiJodHRwczovL2Fkcm9sbC5jb206NDQzIiwiZmVhdHVyZSI6IkludGVyZXN0Q29ob3J0QVBJIiwiZXhwaXJ5IjoxNjI2MjIwNzk5LCJpc1N1YmRvbWFpbiI6dHJ1ZSwiaXNUaGlyZFBhcnR5Ijp0cnVlfQ==">
<script type="text/javascript" src="/vendor/laravel-admin/home/sendrolling.js"></script>
<div style="width: 1px; height: 1px; display: inline; position: absolute;"></div>
</head>


<div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
        <div class="pace-progress-inner"></div>
    </div>
    <div class="pace-activity"></div></div>

<!-- END HEADER -->
<!-- BEGIN CONTENT -->
<div class="page-container row-fluid">






    <div class="content">
        <title>Document</title>
        <div class="sm-gutter">
            <div class="row">
                <!-- BEGIN WORLD MAP WIDGET - MAP -->
                <div class="col-md-12 col-vlg-12 m-b-12">
                    <div class="row">
                        <div class="col-md-12 m-b-10" data-sync-height="true">
                            <div class="col-md-8 col-vlg-8 col-sm-8 no-padding -height" style="height: 550px;">
                                <div class="tiles green mapplic-element" id="mapplic_demo" style="height: 550px;">

                                </div>

                                <div class="clearfix"></div>
                                <div class="wait_loader" style=""><img src="/vendor/laravel-admin/home/squares-preloader-gif.svg" alt=""></div>
                            </div>
                            <div class="col-md-4 col-vlg-4 col-sm-4 no-padding" style="height: 550px;">
                                <div class="tiles black" style="height: 550px;">
                                    <div class="tiles-body">
                                        <h5 class="text-white"><span class="semi-bold">SALES GEOGRAPHIC DISTRIBUTION</span></h5>
                                        <input type="text" id="country_search" placeholder="Search Country..." class="form-control input-sm m-t-20 text-white">
                                        <div hidden="" id="href_map"></div>
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
                                                <div class="progress-bar progress-bar-success animate-progress-bar percentage" data-percentage="0" style="width: 0px;"></div>
                                            </div>
                                            <div class="description"> <span class="text-white mini-description message"></span></div>
                                        </div>
                                    </div>
                                    <div id="chart" style="height:123px" class="rickshaw_graph"><svg width="100%" height="123"><g><path d="M0,10.510706230805738Q11.054421768707485,11.370012500019913,12.755102040816327,11.359025751856521C15.306122448979592,11.342545629611434,22.95918367346939,10.76781025256391,25.510204081632654,10.345905008354876S35.714285714285715,7.754508699425115,38.26530612244898,7.139973309766177S48.46938775510205,4.247378330222562,51.02040816326531,4.200551111765492S61.224489795918366,4.862508259875316,63.775510204081634,6.671701125195483S73.9795918367347,20.271626831311586,76.53061224489797,22.29247976496717S86.73469387755101,26.97888382503528,89.28571428571428,26.880230461751296S99.48979591836735,22.55335711888396,102.04081632653062,21.305946132127332S112.24489795918367,13.970849207172147,114.79591836734694,14.406120594185012S125,25.495696132154617,127.55102040816327,25.65866000225597S137.75510204081633,17.15610475879157,140.30612244897958,16.035759295198545S150.51020408163268,13.851210844163285,153.06122448979593,14.4552053663257S163.265306122449,22.36345255162949,165.81632653061226,22.075704516822697S176.0204081632653,12.01443230540075,178.57142857142856,11.57772501825778S188.77551020408166,16.683314350479076,191.3265306122449,17.708631645392998S201.53061224489798,23.393684436531657,204.08163265306123,21.830897967397007S214.2857142857143,3.2063737539500208,216.83673469387756,2.0807669540464815S227.04081632653063,8.760063697200847,229.59183673469389,10.574829968361612S239.79591836734699,19.939011242461966,242.34693877551024,20.228429665654147S252.55102040816328,13.274419731740931,255.10204081632654,13.46901420028341S265.30612244897964,23.39949359288947,267.8571428571429,22.174374351078953S278.0612244897959,2.4009334425874016,280.61224489795916,1.2178217821782198S290.8163265306123,8.852256693169045,293.36734693877554,10.343257746987135S303.5714285714286,16.151940866503487,306.12244897959187,16.127832320359133S316.32653061224494,10.165931893807015,318.8775510204082,10.102172285543574S329.08163265306126,14.256979628358053,331.6326530612245,15.49023623772473S341.8367346938776,22.08962551227823,344.38775510204084,22.434738379210344S354.59183673469386,20.175150466701663,357.1428571428571,18.94136490704588S367.3469387755102,10.949543556941503,369.89795918367344,10.096882782652528S380.10204081632656,8.768826899877089,382.6530612244898,10.414757164156129S392.8571428571429,26.346292968875407,395.40816326530614,26.55618542544292S405.6122448979592,13.031781128055213,408.16326530612247,12.513681729831262S418.3673469387755,21.91270066734747,420.91836734693874,21.375191443203406S431.12244897959187,7.231166728014268,433.6734693877551,7.138589488390636S443.8775510204082,19.8032502002709,446.42857142857144,20.44941904696708S456.6326530612245,13.45546176211428,459.18367346938777,13.600277955352453S469.38775510204084,21.510242810188547,471.9387755102041,21.897580979348803S482.1428571428572,18.152562566248356,484.6938775510205,17.473659646955S494.8979591836735,15.62157914285211,497.44897959183675,15.10855178641522S507.6530612244898,12.228396547210895,510.2040816326531,12.343386082586107S520.4081632653061,15.756103620326439,522.9591836734694,16.258447140167334S533.1632653061225,17.18033763577705,535.7142857142858,17.366821280995055S545.9183673469388,18.131152462958788,548.469387755102,18.123283592347363S558.6734693877551,17.69007687446897,561.2244897959183,17.288132574880805S571.4285714285714,13.818812416294012,573.9795918367347,14.103840596465687S584.1836734693878,20.094752723849354,586.7346938775511,20.138414376597552S596.9387755102041,15.673689538055555,599.4897959183673,14.540457123947661S609.6938775510205,8.23052375808636,612.2448979591837,8.80609023551861Q613.9455782312925,9.189801220473443,625,20.296121898270158L625,69.58529165879446Q613.9455782312925,65.99293746912564,612.2448979591837,65.96529770419409C609.6938775510205,65.92383805679677,602.0408163265306,68.9640832674833,599.4897959183673,69.17069518482131S589.2857142857143,68.49288148584634,586.7346938775511,68.03141687757417S576.530612244898,64.16349541989878,573.9795918367347,64.5560491020996S563.7755102040816,71.09125846028094,561.2244897959183,71.95695369958244S551.0204081632653,73.87328682407286,548.469387755102,73.21300149511468S538.265306122449,65.75859594914154,535.7142857142858,65.35410041000064S525.5102040816327,68.89708500346823,522.9591836734694,69.16804610370576S512.7551020408164,68.1091578723334,510.2040816326531,68.06371141237594S500,68.59176570983855,497.44897959183675,68.71358150413118S487.24489795918373,69.21743811020214,484.6938775510205,69.28186935530218S474.48979591836735,69.79430884988794,471.9387755102041,69.35789395513159S461.734693877551,64.67037368868826,459.18367346938777,64.91772040773864S448.9795918367347,71.98148583286833,446.42857142857144,71.8313611456354S436.2244897959184,63.32691985985856,433.6734693877551,63.41647353540939S423.469387755102,72.6292832622625,420.91836734693874,72.72689790114364S410.7142857142857,64.40235985313761,408.16326530612247,64.39261992422075S397.9591836734694,72.7503315652556,395.40816326530614,72.6294986119751S385.2040816326531,63.918092526301464,382.6530612244898,63.18429039141559S372.4489795918367,64.36336809340638,369.89795918367344,65.29147726311629S359.69387755102036,72.13399511662429,357.1428571428571,72.46538208851467S346.9387755102041,69.09145005250295,344.38775510204084,68.60534698202012S334.18367346938777,67.89430817447986,331.6326530612245,67.60435138368638S321.42857142857144,65.56309507208111,318.8775510204082,65.7057790740853S308.6734693877551,68.95196489240914,306.12244897959187,69.03119140372826S295.9183673469388,67.47994817510785,293.36734693877554,66.49804418727645S283.1632653061224,59.05341981544269,280.61224489795916,59.21215152541419S270.40816326530614,67.77050838846922,267.8571428571429,68.08536128699149S257.6530612244898,62.30502213035365,255.10204081632654,62.36068051063685S244.8979591836735,68.37187868417926,242.34693877551024,68.64194508982348S232.14285714285714,65.82375117496917,229.59183673469389,65.06134456707902S219.3877551020408,60.706820086559375,216.83673469387756,61.017879010921966S206.6326530612245,66.91795947062322,204.08163265306123,68.17193381070494S193.87755102040816,74.11545770188107,191.3265306122449,73.55762241173917S181.1224489795918,62.67473195172011,178.57142857142856,62.59358090928604S168.3673469387755,72.33516692658388,165.81632653061226,72.74611198739844S155.6122448979592,67.4454219673988,153.06122448979593,66.70303151743153S142.85714285714283,64.73833619501045,140.30612244897958,65.3222074877257S130.10204081632654,72.64449582276532,127.55102040816327,72.54174444458414S117.34693877551021,64.27727395900382,114.79591836734694,64.29469370591382S104.59183673469389,71.87094476219885,102.04081632653062,72.71594191368402S91.83673469387755,73.07362783730275,89.28571428571428,72.74466522076554S79.08163265306123,70.62536324732221,76.53061224489797,69.42631574831191S66.3265306122449,61.959724202908134,63.775510204081634,60.754190230662445S53.57142857142857,57.01460450970392,51.02040816326531,57.370976025855S40.81632653061225,64.0715429977026,38.26530612244898,64.31790539217323S28.06122448979592,59.74563714543688,25.510204081632654,59.83459997056139S15.306122448979592,65.09257915379307,12.755102040816327,65.20753364341834Q11.054421768707485,65.2841699698352,0,60.984144866814226Z" class="area" fill="rgba(255,255,255,0.05)"></path></g><g><path d="M0,60.984144866814226Q11.054421768707485,65.2841699698352,12.755102040816327,65.20753364341834C15.306122448979592,65.09257915379307,22.95918367346939,59.9235627956859,25.510204081632654,59.83459997056139S35.714285714285715,64.56426778664387,38.26530612244898,64.31790539217323S48.46938775510205,57.72734754200608,51.02040816326531,57.370976025855S61.224489795918366,59.548656258416756,63.775510204081634,60.754190230662445S73.9795918367347,68.2272682493016,76.53061224489797,69.42631574831191S86.73469387755101,72.41570260422833,89.28571428571428,72.74466522076554S99.48979591836735,73.5609390651692,102.04081632653062,72.71594191368402S112.24489795918367,64.31211345282381,114.79591836734694,64.29469370591382S125,72.43899306640296,127.55102040816327,72.54174444458414S137.75510204081633,65.90607878044096,140.30612244897958,65.3222074877257S150.51020408163268,65.96064106746425,153.06122448979593,66.70303151743153S163.265306122449,73.15705704821299,165.81632653061226,72.74611198739844S176.0204081632653,62.51242986685197,178.57142857142856,62.59358090928604S188.77551020408166,72.99978712159728,191.3265306122449,73.55762241173917S201.53061224489798,69.42590815078667,204.08163265306123,68.17193381070494S214.2857142857143,61.32893793528456,216.83673469387756,61.017879010921966S227.04081632653063,64.29893795918886,229.59183673469389,65.06134456707902S239.79591836734699,68.9120114954677,242.34693877551024,68.64194508982348S252.55102040816328,62.416338890920045,255.10204081632654,62.36068051063685S265.30612244897964,68.40021418551375,267.8571428571429,68.08536128699149S278.0612244897959,59.3708832353857,280.61224489795916,59.21215152541419S290.8163265306123,65.51614019944505,293.36734693877554,66.49804418727645S303.5714285714286,69.11041791504738,306.12244897959187,69.03119140372826S316.32653061224494,65.84846307608949,318.8775510204082,65.7057790740853S329.08163265306126,67.3143945928929,331.6326530612245,67.60435138368638S341.8367346938776,68.1192439115373,344.38775510204084,68.60534698202012S354.59183673469386,72.79676906040505,357.1428571428571,72.46538208851467S367.3469387755102,66.2195864328262,369.89795918367344,65.29147726311629S380.10204081632656,62.45048825652971,382.6530612244898,63.18429039141559S392.8571428571429,72.50866565869458,395.40816326530614,72.6294986119751S405.6122448979592,64.3828799953039,408.16326530612247,64.39261992422075S418.3673469387755,72.82451254002478,420.91836734693874,72.72689790114364S431.12244897959187,63.50602721096021,433.6734693877551,63.41647353540939S443.8775510204082,71.68123645840247,446.42857142857144,71.8313611456354S456.6326530612245,65.16506712678903,459.18367346938777,64.91772040773864S469.38775510204084,68.92147906037523,471.9387755102041,69.35789395513159S482.1428571428572,69.34630060040222,484.6938775510205,69.28186935530218S494.8979591836735,68.83539729842381,497.44897959183675,68.71358150413118S507.6530612244898,68.01826495241848,510.2040816326531,68.06371141237594S520.4081632653061,69.43900720394329,522.9591836734694,69.16804610370576S533.1632653061225,64.94960487085974,535.7142857142858,65.35410041000064S545.9183673469388,72.5527161661565,548.469387755102,73.21300149511468S558.6734693877551,72.82264893888394,561.2244897959183,71.95695369958244S571.4285714285714,64.94860278430043,573.9795918367347,64.5560491020996S584.1836734693878,67.56995226930201,586.7346938775511,68.03141687757417S596.9387755102041,69.37730710215932,599.4897959183673,69.17069518482131S609.6938775510205,65.92383805679677,612.2448979591837,65.96529770419409Q613.9455782312925,65.99293746912564,625,69.58529165879446L625,123Q613.9455782312925,123,612.2448979591837,123C609.6938775510205,123,602.0408163265306,123,599.4897959183673,123S589.2857142857143,123,586.7346938775511,123S576.530612244898,123,573.9795918367347,123S563.7755102040816,123,561.2244897959183,123S551.0204081632653,123,548.469387755102,123S538.265306122449,123,535.7142857142858,123S525.5102040816327,123,522.9591836734694,123S512.7551020408164,123,510.2040816326531,123S500,123,497.44897959183675,123S487.24489795918373,123,484.6938775510205,123S474.48979591836735,123,471.9387755102041,123S461.734693877551,123,459.18367346938777,123S448.9795918367347,123,446.42857142857144,123S436.2244897959184,123,433.6734693877551,123S423.469387755102,123,420.91836734693874,123S410.7142857142857,123,408.16326530612247,123S397.9591836734694,123,395.40816326530614,123S385.2040816326531,123,382.6530612244898,123S372.4489795918367,123,369.89795918367344,123S359.69387755102036,123,357.1428571428571,123S346.9387755102041,123,344.38775510204084,123S334.18367346938777,123,331.6326530612245,123S321.42857142857144,123,318.8775510204082,123S308.6734693877551,123,306.12244897959187,123S295.9183673469388,123,293.36734693877554,123S283.1632653061224,123,280.61224489795916,123S270.40816326530614,123,267.8571428571429,123S257.6530612244898,123,255.10204081632654,123S244.8979591836735,123,242.34693877551024,123S232.14285714285714,123,229.59183673469389,123S219.3877551020408,123,216.83673469387756,123S206.6326530612245,123,204.08163265306123,123S193.87755102040816,123,191.3265306122449,123S181.1224489795918,123,178.57142857142856,123S168.3673469387755,123,165.81632653061226,123S155.6122448979592,123,153.06122448979593,123S142.85714285714283,123,140.30612244897958,123S130.10204081632654,123,127.55102040816327,123S117.34693877551021,123,114.79591836734694,123S104.59183673469389,123,102.04081632653062,123S91.83673469387755,123,89.28571428571428,123S79.08163265306123,123,76.53061224489797,123S66.3265306122449,123,63.775510204081634,123S53.57142857142857,123,51.02040816326531,123S40.81632653061225,123,38.26530612244898,123S28.06122448979592,123,25.510204081632654,123S15.306122448979592,123,12.755102040816327,123Q11.054421768707485,123,0,123Z" class="area" fill="rgba(0,0,0,0.30)"></path></g></svg></div>
                                </div>
                                <div class="wait_loader" style=""><img src="/vendor/laravel-admin/home/squares-preloader-gif.svg" alt=""></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END WORLD MAP WIDGET - CRAFT MAP -->
                <div class="col-md-12">
                    <div class="row">
                        <!-- BEGIN REALTIME SALES GRAPH -->
                        <div class="col-md-12 col-vlg-6 m-b-10">
                            <div class="tiles white last_sale_container p-b-5">
                                <div class="sales-graph-heading">
                                    <div class="col-md-5 col-sm-5">
                                        <p class="semi-bold">You have earned</p>

                                        {{--                                            @php--}}

                                        {{--print_r($data['total_sale']);exit;--}}
                                        {{-- @endphp--}}

                                        <h4><span class="item-count animate-number semi-bold all_peyout_price" data-value="0" data-animation-duration="700">0</span> USD</h4>
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


                                    <div class="last_sales">


                                        @foreach ($data['offer_info'] as $key=>$value)
                                            <hr class="teble_hr" style="width:calc(100% - 20px);">
                                            <div class="forst_row_table table_content_top bold text-success" style="width:18%; display: inline-block;">{{date('Y-m-d',strtotime($value->created_at))}}</div>
                                            <div class="forst_row_table table_content_top bold text-success" style="width:18%; display: inline-block;"> {{date('H:i:s',strtotime($value->created_at))}}</div>
                                            <div class="second_row_table table_content_top" style="width:44%; display: inline-block;">{{$value->offer_name}}</div>
                                            <div class="last_row_table table_content_top bold text-success" style="width:12%; display: inline-block; text-align: center;"> $ {{$value->revenue}}</div>
                                        @endforeach
                                    </div>


                                </div>
                                <div id="sales-graph"> </div>
                            </div>
                            <div class="wait_loader" style=""><img src="/vendor/laravel-admin/home/squares-preloader-gif.svg" alt=""></div>
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
                                        <div class="scroll-wrapper dashboard_note scrollbar-dynamic" style="position: relative; height: 363px;"><div class="dashboard_note scrollbar-dynamic scroll-content scroll-scrollx_visible scroll-scrolly_visible" style="margin-bottom: -17px; margin-right: -17px; height: 363px;">
                                                <div class="notification-messages info notify-preview-item" data-message_id="3498">
                                                    <div class="notification_data">
                                                        <div class="user-profile"> <img src="/vendor/laravel-admin/home/37200_8.jpg" alt="" data-src="/vendor/laravel-admin/home/37200_8.jpg" data-src-retina="/vendor/laravel-admin/home/37200_8.jpg" width="35" height="35"> </div>
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
                                                        <div class="user-profile"> <img src="/vendor/laravel-admin/home/37200_8.jpg" alt="" data-src="/vendor/laravel-admin/home/37200_8.jpg" data-src-retina="/vendor/laravel-admin/home/37200_8.jpg" width="35" height="35"> </div>
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
                                                        <div class="user-profile"> <img src="/vendor/laravel-admin/home/37200_8.jpg" alt="" data-src="/vendor/laravel-admin/home/37200_8.jpg" data-src-retina="/vendor/laravel-admin/home/37200_8.jpg" width="35" height="35"> </div>
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
                                                        <div class="user-profile"> <img src="/vendor/laravel-admin/home/37200_8.jpg" alt="" data-src="/vendor/laravel-admin/home/37200_8.jpg" data-src-retina="/vendor/laravel-admin/home/37200_8.jpg" width="35" height="35"> </div>
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
                                                        <div class="user-profile"> <img src="/vendor/laravel-admin/home/37200_8.jpg" alt="" data-src="/vendor/laravel-admin/home/37200_8.jpg" data-src-retina="/vendor/laravel-admin/home/37200_8.jpg" width="35" height="35"> </div>
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
                                                        <div class="user-profile"> <img src="/vendor/laravel-admin/home/37200_8.jpg" alt="" data-src="/vendor/laravel-admin/home/37200_8.jpg" data-src-retina="/vendor/laravel-admin/home/37200_8.jpg" width="35" height="35"> </div>
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
                                                        <div class="user-profile"> <img src="/vendor/laravel-admin/home/37200_8.jpg" alt="" data-src="/vendor/laravel-admin/home/37200_8.jpg" data-src-retina="/vendor/laravel-admin/home/37200_8.jpg" width="35" height="35"> </div>
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
                                                        <div class="user-profile"> <img src="/vendor/laravel-admin/home/37200_8.jpg" alt="" data-src="/vendor/laravel-admin/home/37200_8.jpg" data-src-retina="/vendor/laravel-admin/home/37200_8.jpg" width="35" height="35"> </div>
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
                                                        <div class="user-profile"> <img src="/vendor/laravel-admin/home/37200_8.jpg" alt="" data-src="/vendor/laravel-admin/home/37200_8.jpg" data-src-retina="/vendor/laravel-admin/home/37200_8.jpg" width="35" height="35"> </div>
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
                                                </div>									<div class="notification-messages read notify-preview-item" data-message_id="3466">
                                                    <div class="notification_data">
                                                        <div class="user-profile"> <img src="/vendor/laravel-admin/home/37200_8.jpg" alt="" data-src="/vendor/laravel-admin/home/37200_8.jpg" data-src-retina="/vendor/laravel-admin/home/37200_8.jpg" width="35" height="35"> </div>
                                                        <div class="message-wrapper">
                                                            <div class="heading"> Hit The Ground Running: Your questions answered </div>
                                                            <div class="description"> <p>Dear M4TRIX Affiliate,</p>

                                                                <p>Glad to have you on board as a trusted partner in the e-commerce world.</p>

                                                                <p style="margin-left:0px; margin-right:0px; text-align:start">We're working behind the scenes on exciting, high scale potential offers to bring your way, but dont for a second think we've forgotten about those of you who are new to our network. We'd like to take this moment to assist in hitting your first milestones with M4TRIX, by answering some of your common questions.</p>

                                                                <p style="margin-left:0px; margin-right:0px; text-align:start">Our team is always ready to offer support, but we also aim to empower you with swift solutions to basic queries.</p>

                                                                <p style="margin-left:0px; margin-right:0px; text-align:start">This email is designed to help you do just that!</p>

                                                                <p style="margin-left:0px; margin-right:0px; text-align:start">Below, you'll find the topics we'll be addressing, along with links to our knowledge base for more detailed information.</p>

                                                                <ul style="margin-left:0px; margin-right:0px">
                                                                    <li><a href="https://mastery.m4trix.com/documentation/new-affiliates-start-here/" target="_blank">Affiliate ID:</a> Your unique affiliate ID with M4TRIX is called your net ID. This is what we use to attribute sales to your account and identify your traffic. You can find it in any of the tracking links once you are logged in.<br>
                                                                        &nbsp;</li>
                                                                    <li><a href="https://mastery.m4trix.com/documentation/m4trix-offers/presell-pages/" target="_blank">Presell Pages:</a> Presell pages are effective for ad network compliance, and also increase the likely hood of you turning a visitor into a buyer. We recommend starting with an advertorial followed by a sales page. You can find the links within your <a href="https://m4trix.network/Reporting-platform/Reporting-platform.php?id=offer" target="_blank">offers section, under tracking links.</a><br>
                                                                        &nbsp;</li>
                                                                    <li><a href="https://mastery.m4trix.com/documentation/m4trix-offers/top-performing-offers/" target="_blank">Top Offers:</a> Finding top performing offers with M4TRIX is easy. Simply head to our <a href="https://m4trix.network/Reporting-platform/Reporting-platform.php?id=intelligence" target="_blank">intelligence </a>section to see the highest performing offers at any moment in time.<br>
                                                                        &nbsp;</li>
                                                                    <li><a href="https://m4trix.network/Reporting-platform/Reporting-platform.php?id=intelligence" target="_blank">Top Geos:</a> Similarly to finding top geos, our <a href="https://m4trix.network/Reporting-platform/Reporting-platform.php?id=intelligence" target="_blank">intelligence </a>section makes it a breeze to see which geos are performing the best at a given time, for any offer. Use this feature to your advantange.<br>
                                                                        &nbsp;</li>
                                                                    <li><a href="https://mastery.m4trix.com/documentation/traffic/what-are-the-main-traffic-sources/">Best Traffic Sources:</a> Traffic for e-commerce offers is not always a case of one-size-fits-all. Generally speaking, we see our best performance from Native (Taboola &amp; Outbrain), Social (Facebook &amp; Instagram) and search (Google &amp; Bing). Other advertising formats and channels can also be strong, but these will give you the most bang for your buck. Pick one and master it with our <a href="https://mastery.m4trix.com/documentation/traffic/" target="_blank">beginner's guides here.</a><br>
                                                                        &nbsp;</li>
                                                                    <li><a href="https://mastery.m4trix.com/documentation/payouts-account-management/" target="_blank">Getting Paid:</a> We can only send payouts to business accounts using wire transfers with SWIFT payments, or to business Payoneer accounts. In most cases our minimum payment threshold is $1,000. If you have any issues regarding payouts or updating bank details, do get in touch with us, and we'll be glad to see where we can help.<br>
                                                                        &nbsp;</li>
                                                                    <li><a href="https://mastery.m4trix.com/documentation/basic-tracking/" target="_blank">Pixels and Tracking</a>: You can track events with pixels and postbacks at various stages of your funnel. This is also great for retargeting and building custom audiences. If you ever need help solving tracking, or if you want us to fire a test conversion for you, get in touch with us and we'll be glad to help!</li>
                                                                </ul>

                                                                <p>And there we are! This covers your frequently asked questions. If you still need further assistance, once again, our team is always on hand to assist. We're here to help you succeed.</p>

                                                                <p style="margin-left:0px; margin-right:0px; text-align:start">Best regards,</p>

                                                                <p style="margin-left:0px; margin-right:0px; text-align:start"><strong>M4TRIX | Tank</strong></p>

                                                                <p style="margin-left:0px; margin-right:0px; text-align:start"><em><strong>"</strong>Self-reliance is the highest expression of self-respect"</em></p>
                                                            </div>
                                                        </div>
                                                        <div class="date pull-right"> 2023-12-22 08:26:45 </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>							</div><div class="scroll-element scroll-x scroll-scrollx_visible scroll-scrolly_visible"><div class="scroll-element_outer">    <div class="scroll-element_size"></div>    <div class="scroll-element_track"></div>    <div class="scroll-bar" style="width: 87px; left: 0px;"></div></div></div><div class="scroll-element scroll-y scroll-scrollx_visible scroll-scrolly_visible"><div class="scroll-element_outer">    <div class="scroll-element_size"></div>    <div class="scroll-element_track"></div>    <div class="scroll-bar" style="height: 163px; top: 0px;"></div></div></div></div>
                                    </div>
                                    <div class="text-center m-t-10">
                                        <a href="https://m4trix.network/Reporting-platform/Reporting-platform.php?id=account_notifications">See All</a>
                                    </div>
                                </div>
                                <div class="wait_loader" style=""><img src="/vendor/laravel-admin/home/squares-preloader-gif.svg" alt=""></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--noitificatuiions widget-->

                <!--geo day widget-->
                <!-- <div class="col-md-12 col-vlg-6 m-b-10 ">
                    <div class="tiles white m-b-10">
                        <div class="tiles-chart">
                            <div class="controller">
                                <a href="javascript:;" class="reload"></a>
                                <a href="javascript:;" class="remove"></a>
                            </div>
                            <div class="tiles-body">
                                <div class="tiles-title">GEO-LOCATIONS</div>
                                <div class="heading"> 8,545,654 <i class="fa fa-map-marker"></i> </div>
                            </div>
                            <div id="world-map" style="height:405px"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div> -->


                <!--geo day widget-->
                <div class="col-md-12">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="tiles white m-b-10 clearfix">
                                <div class="col-md-6 col-sm-12 no-padding">
                                    <div id="world_daily" style="height:360px">

                                    </div>
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
                            <div class="wait_loader" style=""><img src="/vendor/laravel-admin/home/squares-preloader-gif.svg" alt=""></div>
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
                                        <span class="country_num">22</span> Countries, <span class="offer_num">25</span> Offers Receiving Traffic
                                    </div>
                                </div>
                                <div class="tiles-body">
                                    <ul class="progress-list weekly_top_geo_per_offer">

                                        @foreach($data['offer_last_week'] as $m=>$n)
                                            <li>
                                                <div class="details-wrapper">
                                                    <div class="name">{{$n->offer_name}}</div>
                                                    <div class="description">{{$n->country_list}}</div>
                                                </div>
                                                <div class="details-status pull-right">
                                                    <span class="animate-number" data-value="{{$n->last_week_percent}}" data-animation-duration="800">{{$n->last_week_percent}}</span>%
                                                </div>
                                                <div class="clearfix">
                                                </div>
                                                <div class="progress progress-small no-radius"><div class="progress-bar animate-progress-bar" style="background-color: rgb(69, 122, 241); width: {{$n->last_week_percent}}%;" data-percentage="{{$n->last_week_percent}}%">
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach

                                        {{--                                            <li>--}}
                                        {{--                                                <div class="details-wrapper">--}}
                                        {{--                                                    <div class="name">MaxPhone</div>--}}
                                        {{--                                                    <div class="description">Israel, United States, Switzerland</div>--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="details-status pull-right">--}}
                                        {{--                                                    <span class="animate-number" data-value="15.31" data-animation-duration="800">15.31</span>--}}
                                        {{--                                                    % </div>--}}
                                        {{--                                                <div class="clearfix"></div>--}}
                                        {{--                                                <div class="progress progress-small no-radius"><div class="progress-bar animate-progress-bar" style="background-color: rgb(253, 208, 28); width: 15%;" data-percentage="15%"></div></div>--}}
                                        {{--                                            </li>--}}

                                        {{--                                            <li>--}}
                                        {{--                                                <div class="details-wrapper">--}}
                                        {{--                                                    <div class="name">ClearView</div>--}}
                                        {{--                                                    <div class="description">Canada, Australia, Argentina</div>--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="details-status pull-right"> <span class="animate-number" data-value="14.29" data-animation-duration="800">14.29</span>% </div>--}}
                                        {{--                                                <div class="clearfix"></div>--}}
                                        {{--                                                <div class="progress progress-small no-radius"><div class="progress-bar animate-progress-bar" style="background-color: rgb(243, 89, 88); width: 14%;" data-percentage="14%"></div></div>--}}
                                        {{--                                            </li>--}}

                                    </ul>
                                </div>
                            </div>
                            <div class="tiles white col-md-8 col-sm-8 no-padding">
                                <div class="tiles-chart">
                                    <div class="tiles-body">
                                        <div class="tiles-title">NETWORK WIDE DISTRIBUTION</div>
                                        <div class="heading"> Last Week Top 10 Geos <i class="fa fa-map-marker"></i> </div>
                                    </div>
                                    <div id="world_weekly" style="height:405px">

                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="wait_loader" style=""><img src="/vendor/laravel-admin/home/squares-preloader-gif.svg" alt=""></div>
                    </div>
                </div>


            </div>
        </div>


        <script src="/vendor/laravel-admin/home/jquery.easing.js" type="text/javascript"></script>
        <script src="/vendor/laravel-admin/home/jquery.mousewheel.js" type="text/javascript"></script>
        <script src="/vendor/laravel-admin/home/hammer.js" type="text/javascript"></script>
        <script src="/vendor/laravel-admin/home/mapplic.js" type="text/javascript"></script>
        <script src="/vendor/laravel-admin/home/raphael-min(1).js"></script>
        <script src="/vendor/laravel-admin/home/d3.v2.js"></script>
        <script src="/vendor/laravel-admin/home/rickshaw.min.js"></script>
        <script src="/vendor/laravel-admin/home/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="/vendor/laravel-admin/home/jquery-jvectormap-world-mill.js" type="text/javascript"></script>
        <!-- <script src="assets/js/widgets.js" type="text/javascript"></script> -->
        <script> var theme_color = 'dark';</script>
        <script src="/vendor/laravel-admin/home/home.js"></script>
    </div>







    <input type="hidden" name="_token" value="{{ csrf_token() }}" />


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
                <img src="/vendor/laravel-admin/home/squares-preloader-gif.svg" alt="">
            </div>
            <div class="input-container">
                <input type="text" id="userInput" placeholder="Type your message...">
                <button id="sendButton" '="">Send</button>
            </div>
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

<script type="text/javascript">
    var frontendData = @json($data);
</script>

<script>
    async function query(data){
        const response = await fetch(
            "https://flowise.novads.co/api/v1/prediction/cf608554-c807-477e-8916-7e00cadfc4a6",
            {
                headers: {
                    // Authorization: "Bearer ZPfTkVz8aZZhm27WX7cWQ0fbc6gsuEKjSojnefa3wW4=",
                    "Content-Type": "application/json"
                },
                method: "POST",
                body: JSON.stringify({question: data})
            }
        );
        const result = await response.json();
    }
</script>
<script>
    window.domain = "<?php echo admin_url('/'); ?>";
    // Get the necessary elements from the HTML
    const chatContainer = document.getElementById('chatContainer');
    const userInput = document.getElementById('userInput');
    const sendButton = document.getElementById('sendButton');
    const loader = document.getElementById('loader');
    const typingLoader = document.getElementById('chat-bubble-load');
    const greetingMsg = document.getElementById('greeting-msg');
    const chatElement = document.getElementById('chat-window-element');
    const userMessages = document.getElementsByClassName('user-details-wrapper pull-right');
    const netId = "6546";
    const userEMail = "nzueom@hotmail.com";
    const userName = "jun";
    const country = "";
    const mpAPIKey = "fLXbBFB4UpVTTtRvQd8W7ibe";
    const mpUrl = "https://novads.co";
    let isNotSentFirstMessage = true;
    const firstMsg = `My name is ${userName}, net is ${netId}, email is ${email}, country is ${country} please save this parameters`;

    let flowiseEndpoint = false;
    let flowiseBearer = false;


    var clipboard = new Clipboard('.copp');

    // document.addEventListener("DOMContentLoaded", (event) => {
    // 	if (isNotSentFirstMessage) {
    // 		// getAIResponse(firstMsg, true, true);
    // 	}
    // 	greetingMsg.style.display = 'flex';
    //
    // 	const historyData = {
    // 		network: netId,
    // 		email: userEMail,
    // 		url: mpUrl
    // 	};
    //
    // 	$.ajax({
    // 		method: 'post',
    // 		url: 'classes/Class.chatbot.php',
    // 		dataType: 'json',
    // 		data: {
    // 			step: 'get_first_default',
    // 		}
    // 	}).done(function (response) {
    // 		flowiseEndpoint = response[0].data;
    // 		flowiseBearer = response[0].key;
    // 	});
    //
    // 	getChatHistory(historyData);
    //
    // 	isNotSentFirstMessage = false;
    // });

    //typingLoader.style.display = 'none';
    //greetingMsg.style.display = 'none';

    function showLoader() {
        typingLoader.style.display = 'block';
        if (userMessages.length) {
            typingLoader.style.marginTop = userMessages[userMessages.length - 1].offsetHeight + 10 + 'px';
        }
        userInput.setAttribute('disabled', 'true');
        scrollToBottom();
    }

    function hideLoader() {
        typingLoader.style.display = 'none';
        userInput.removeAttribute('disabled');
    }

    // Function to create a user message in the chat
    function createUserMessage(text) {
        console.log("createUserMessage");
        return false;
        const message = document.createElement('div');
        message.className = 'user-details-wrapper pull-right';
        message.innerHTML = `
                  <div class="user-details">
                    <div class="bubble sender">
                      <p>`+text+`</p>
                    </div>
                  </div>
			  `;
        return message;
    }

    // Function to create a AI message in the chat
    function createAIMessage(text) {
        const message = document.createElement('div');
        message.className = 'user-details-wrapper answer';
        message.innerHTML = `
				<div class="user-profile">
					<img src="images/morpheus.jpg" alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35">
				</div>
				<div class="user-details">
					<div class="bubble">
						<p>`+text+`</p>
					</div>
				</div>
			  `;
        return message;
    }

    // Function to handle user input and generate AI response
    async function handleUserInput() {
        const userText = userInput.value;
        if (userText.trim() !== '') {
            const userMessage = createUserMessage(userText);
            chatContainer.appendChild(userMessage);
            scrollToBottom();
            let messageBullet = 0;
            const data = {
                apiKey: mpAPIKey,
                url: mpUrl,
                email: userEMail,
                network: netId,
                message:userText,
                message_bullet: messageBullet
            };

            if (!isNotSentFirstMessage) {
                await saveChatMsg(data);
            }

            const aiResponse = await getAIResponse(userText);

            if (!isNotSentFirstMessage) {
                data.message = aiResponse;
                data.message_bullet = 1;
                await saveChatMsg(data);
            }

            const aiMessage = createAIMessage(aiResponse);
            chatContainer.appendChild(aiMessage);

            scrollToBottom();

            userInput.value = '';
        }
    }

    // Function to scroll to the bottom of the chat container
    function scrollToBottom() {
        chatElement.scrollTop = chatElement.scrollHeight;
    }

    // Event listener for the send button click
    sendButton.addEventListener('click', handleUserInput);

    // Event listener for the Enter key press in the input field
    userInput.addEventListener('keypress', (event) => {
        if (event.key === 'Enter' && !userInput.hasAttribute('disabled')) {
            handleUserInput();
        }
    });

    // Get clickable URLS from String
    function replaceURLs(message) {
        if(!message) return;

        var urlRegex = /(((https?:\/\/)|(www\.))[^\s]+)/g;
        return message.replace(urlRegex, function (url) {
            var hyperlink = url;
            if (!hyperlink.match('^https?:\/\/')) {
                hyperlink = 'http://' + hyperlink;
            }
            return '<a href="' + hyperlink + '" target="_blank" rel="noopener noreferrer">' + url + '</a>'
        });
    }

    // Function to get AI response using Fetch API
    async function getAIResponse(userText, isFirstMsg = false, isShowLoader = true) {
        reurn false;
        if (isShowLoader) {
            showLoader();
        }
        try {
            const response = await fetch(flowiseEndpoint, {
                headers: {
                    Authorization: flowiseBearer,
                    "Content-Type": "application/json"
                },
                method: "POST",
                body: JSON.stringify({
                    question: userText
                })
            });

            if (!response.ok) {
                throw new Error('AI request failed');
            }

            const data = await response.json();
            if(isFirstMsg) {
                greetingMsg.style.display = 'flex';

                const historyData = {
                    network: netId,
                    email: userEMail,
                    url: mpUrl
                };

                await getChatHistory(historyData);
            }
            hideLoader();
            return replaceURLs(data);
        } catch (error) {
            console.error(error);
            return 'Oops! Something went wrong.';
            hideLoader();
        }
    }

    async function saveChatMsg(data) {
        const myHeaders = new Headers();
        const { network, email, message_bullet, message, url} = data;
        myHeaders.append("apiKey", "fLXbBFB4UpVTTtRvQd8W7ibe");

        const formData = new FormData();
        formData.append("network", network);
        formData.append("email", email);
        formData.append("message_bullet", message_bullet);
        formData.append("message", message);

        const requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: formData,
            // redirect: 'follow'
        };

        fetch(`${url}/api/v2/chat/`, requestOptions)
            .catch(error => console.log('error', error));
    }

    //Chat history
    async function getChatHistory(data) {
        const myHeaders = new Headers();
        const { network, email, url} = data;
        const { dateFrom, dateTo } = getDates();
        myHeaders.append("apiKey", "fLXbBFB4UpVTTtRvQd8W7ibe");
        const requestOptions = {
            method: 'GET',
            headers: myHeaders,
        };

        fetch(`${url}/api/v2/chat/?` + new URLSearchParams({
            'network': network,
            'email': email,
            'date_from': dateFrom,
            'date_to': dateTo,
        }), requestOptions).then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        }).then(res => {
            const mesAr = res.data;
            mesAr.forEach((message) => {
                const messageElementWrapper = document.createElement('div');
                const messageElementInner = document.createElement('div');
                const messageElementBubble = document.createElement('div');
                const parser = new DOMParser();
                messageElementWrapper.className = message.message_bullet === 1 ? 'user-details-wrapper answer' : 'user-details-wrapper pull-right';
                messageElementInner.className = 'user-details';
                messageElementBubble.className = message.message_bullet === 1 ? 'bubble' : 'bubble sender';
                messageElementBubble.innerHTML = message.message;
                if(message.message_bullet === 1) {
                    // messageElementWrapper.innerHTML = `<div class="user-profile">
					// 			<img src="images/morpheus.jpg" alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35">
					// 		</div>`;
                }
                chatContainer.appendChild(messageElementWrapper);
                messageElementWrapper.appendChild(messageElementInner);
                messageElementInner.appendChild(messageElementBubble);
            });
            scrollToBottom();
        })
            .catch(error => console.log('error', error));
    }
    function getDates() {
        const currentDate = new Date();
        const year = currentDate.getFullYear();
        const month = String(currentDate.getMonth() + 1).padStart(2, '0');
        const day = String(currentDate.getDate()).padStart(2, '0');
        const dateFrom = `${year}-${month}-${day} 00:00:00`;
        const dateTo = `${year}-${month}-${day} 23:59:59`;

        return {dateFrom, dateTo};
    }
</script>


