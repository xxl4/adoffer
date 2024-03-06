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

<script src="/vendor/laravel-admin/analytic/bootstrap-select.min.js"></script>
<script src="/vendor/laravel-admin/analytic/clipboard.min.js"></script>
<script src="/vendor/laravel-admin/test/chosen.jquery.js"></script>


<!-- END CONTENT -->
<!-- BEGIN CORE JS FRAMEWORK-->
<script src="/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<!-- BEGIN JS DEPENDECENCIES-->
<script src="/js/jquery-2.1.4.js"></script>


<script src="/assets/plugins/bootstrapv3/js/bootstrap.js" type="text/javascript"></script>


{{--影响下拉--}}
{{--<script src="/assets/plugins/bootstrapv3/js/bootstrap.js" type="text/javascript"></script>   --}}
<script src="/js/bootstrap-tooltip-custom-class-master/bootstrap-v3/popover/dist/js/bootstrap-popover-custom-class.min.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="/assets/plugins/jquery-block-ui/jqueryblockui.min.js" type="text/javascript"></script>
<script src="/assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>



<script src="/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
<script src="/assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="/assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="/assets/plugins/bootstrap-select2/select2.js" type="text/javascript"></script>
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

<link href="/assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
<link href="/assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen" />
<div class="sm-gutter">
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
                            <div class="col-xs-12 col-md-6 col-lg-2_min_col_lg_1 use_small_padding">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <select class="list_date_suf_ select2_list padding_left select2-hidden-accessible" data-suffix="offers" style="margin-bottom: 10px;" name="date" tabindex="-1" aria-hidden="true">
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
                                        <input type="text" class="form-control date_start_suf_ date_start_suf_offers date_pic_wid sandbox-advance_suf_offers">
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
                                        <input type="text" class="form-control date_end_suf_ date_end_suf_offers date_pic_wid sandbox-advance_suf_offers">
                                        <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-lg-2_min_col_lg_1">
                                <div class="row">
                                    <div class="col-xs-12 use_small_padding">
                                        <select class="select2_geos select2-hidden-accessible" name="geos" id="geos_offers" data-suffix="offers" multiple="" tabindex="-1" aria-hidden="true">
                                            <option value="Albania">Albania</option><option value="Algeria">Algeria</option>
                                        </select>
                                        <style>
                                            .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
                                                margin-right: 30px;
                                            }
                                            .select2-selection__choice[title="Albania"] {background-image:url(images/flags/Albania-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Algeria"] {background-image:url(images/flags/Algeria-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Andorra"] {background-image:url(images/flags/Andorra-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Angola"] {background-image:url(images/flags/Angola-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Anguilla"] {background-image:url(images/flags/Anguilla-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Antigua and Barbuda"] {background-image:url(images/flags/Antigua-and-Barbuda-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Argentina"] {background-image:url(images/flags/Argentina-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Armenia"] {background-image:url(images/flags/Armenia-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Aruba"] {background-image:url(images/flags/Aruba-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Australia"] {background-image:url(images/flags/Australia-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Austria"] {background-image:url(images/flags/Austria-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Azerbaijan"] {background-image:url(images/flags/Azerbaijan-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Bahrain"] {background-image:url(images/flags/Bahrain-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Bangladesh"] {background-image:url(images/flags/Bangladesh-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Barbados"] {background-image:url(images/flags/Barbados-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Belgium"] {background-image:url(images/flags/Belgium-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Benin"] {background-image:url(images/flags/Benin-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Bermuda"] {background-image:url(images/flags/Bermuda-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Bhutan"] {background-image:url(images/flags/Bhutan-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Brazil"] {background-image:url(images/flags/Brazil-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="British"] {background-image:url(images/flags/British-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Bulgaria"] {background-image:url(images/flags/Bulgaria-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Burkina Faso"] {background-image:url(images/flags/Burkina-Faso-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Cameroon"] {background-image:url(images/flags/Cameroon-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Canada"] {background-image:url(images/flags/Canada-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Cayman Islands"] {background-image:url(images/flags/Cayman-Islands-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Chad"] {background-image:url(images/flags/Chad-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Chile"] {background-image:url(images/flags/Chile-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="China"] {background-image:url(images/flags/China-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Christmas Island"] {background-image:url(images/flags/Christmas-Island-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Colombia"] {background-image:url(images/flags/Colombia-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Comoros"] {background-image:url(images/flags/Comoros-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Costa Rica"] {background-image:url(images/flags/Costa-Rica-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Croatia"] {background-image:url(images/flags/Croatia-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Cyprus"] {background-image:url(images/flags/Cyprus-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Czech Republic"] {background-image:url(images/flags/Czech-Republic-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Denmark"] {background-image:url(images/flags/Denmark-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Djibouti"] {background-image:url(images/flags/Djibouti-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Dominica"] {background-image:url(images/flags/Dominica-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Egypt"] {background-image:url(images/flags/Egypt-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="El Salvador"] {background-image:url(images/flags/El-Salvador-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Equatorial Guinea"] {background-image:url(images/flags/Equatorial-Guinea-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Estonia"] {background-image:url(images/flags/Estonia-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Ethiopia"] {background-image:url(images/flags/Ethiopia-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Falkland Islands"] {background-image:url(images/flags/Falkland-Islands-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Faroe Islands"] {background-image:url(images/flags/Faroe-Islands-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Finland"] {background-image:url(images/flags/Finland-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="France"] {background-image:url(images/flags/France-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="French Guiana"] {background-image:url(images/flags/French-Guiana-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Gabon"] {background-image:url(images/flags/Gabon-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Gambia"] {background-image:url(images/flags/Gambia-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Georgia"] {background-image:url(images/flags/Georgia-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Germany"] {background-image:url(images/flags/Germany-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Ghana"] {background-image:url(images/flags/Ghana-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Gibraltar"] {background-image:url(images/flags/Gibraltar-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Greece"] {background-image:url(images/flags/Greece-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Greenland"] {background-image:url(images/flags/Greenland-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Grenada"] {background-image:url(images/flags/Grenada-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Guadeloupe"] {background-image:url(images/flags/Guadeloupe-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Guam"] {background-image:url(images/flags/Guam-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Guatemala"] {background-image:url(images/flags/Guatemala-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Guernsey"] {background-image:url(images/flags/Guernsey-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Guinea"] {background-image:url(images/flags/Guinea-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Guyana"] {background-image:url(images/flags/Guyana-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Haiti"] {background-image:url(images/flags/Haiti-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Hong Kong"] {background-image:url(images/flags/Hong-Kong-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Hungary"] {background-image:url(images/flags/Hungary-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Iceland"] {background-image:url(images/flags/Iceland-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="India"] {background-image:url(images/flags/India-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Indonesia"] {background-image:url(images/flags/Indonesia-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Ireland"] {background-image:url(images/flags/Ireland-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Israel"] {background-image:url(images/flags/Israel-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Italy"] {background-image:url(images/flags/Italy-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Jamaica"] {background-image:url(images/flags/Jamaica-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Japan"] {background-image:url(images/flags/Japan-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Jersey"] {background-image:url(images/flags/Jersey-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Jordan"] {background-image:url(images/flags/Jordan-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Kazakhstan"] {background-image:url(images/flags/Kazakhstan-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Kyrgyzstan"] {background-image:url(images/flags/Kyrgyzstan-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Laos"] {background-image:url(images/flags/Laos-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Latvia"] {background-image:url(images/flags/Latvia-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Lebanon"] {background-image:url(images/flags/Lebanon-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Lesotho"] {background-image:url(images/flags/Lesotho-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Liechtenstein"] {background-image:url(images/flags/Liechtenstein-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Lithuania"] {background-image:url(images/flags/Lithuania-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Luxembourg"] {background-image:url(images/flags/Luxembourg-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Macau"] {background-image:url(images/flags/Macau-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Macedonia"] {background-image:url(images/flags/Macedonia-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Madagascar"] {background-image:url(images/flags/Madagascar-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Malawi"] {background-image:url(images/flags/Malawi-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Malaysia"] {background-image:url(images/flags/Malaysia-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Maldives"] {background-image:url(images/flags/Maldives-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Malta"] {background-image:url(images/flags/Malta-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Marshall Islands"] {background-image:url(images/flags/Marshall-Islands-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Martinique"] {background-image:url(images/flags/Martinique-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Mayotte"] {background-image:url(images/flags/Mayotte-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Mexico"] {background-image:url(images/flags/Mexico-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Monaco"] {background-image:url(images/flags/Monaco-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Montserrat"] {background-image:url(images/flags/Montserrat-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Mozambique"] {background-image:url(images/flags/Mozambique-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Namibia"] {background-image:url(images/flags/Namibia-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Nepal"] {background-image:url(images/flags/Nepal-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Netherlands"] {background-image:url(images/flags/Netherlands-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="New Caledonia"] {background-image:url(images/flags/New-Caledonia-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="New Zealand"] {background-image:url(images/flags/New-Zealand-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Nicaragua"] {background-image:url(images/flags/Nicaragua-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Niger"] {background-image:url(images/flags/Niger-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Nigeria"] {background-image:url(images/flags/Nigeria-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Norway"] {background-image:url(images/flags/Norway-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Oman"] {background-image:url(images/flags/Oman-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Pakistan"] {background-image:url(images/flags/Pakistan-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Palau"] {background-image:url(images/flags/Palau-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Palestine"] {background-image:url(images/flags/Palestine-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Paraguay"] {background-image:url(images/flags/Paraguay-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Peru"] {background-image:url(images/flags/Peru-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Philippines"] {background-image:url(images/flags/Philippines-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Poland"] {background-image:url(images/flags/Poland-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Portugal"] {background-image:url(images/flags/Portugal-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Puerto Rico"] {background-image:url(images/flags/Puerto-Rico-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Qatar"] {background-image:url(images/flags/Qatar-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Reunion"] {background-image:url(images/flags/Reunion-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Romania"] {background-image:url(images/flags/Romania-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Rwanda"] {background-image:url(images/flags/Rwanda-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="San Marino"] {background-image:url(images/flags/San-Marino-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Saudi Arabia"] {background-image:url(images/flags/Saudi-Arabia-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Senegal"] {background-image:url(images/flags/Senegal-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Singapore"] {background-image:url(images/flags/Singapore-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Sint Maarten"] {background-image:url(images/flags/Sint-Maarten-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Slovakia"] {background-image:url(images/flags/Slovakia-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Slovenia"] {background-image:url(images/flags/Slovenia-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="South Africa"] {background-image:url(images/flags/South-Africa-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="South Korea"] {background-image:url(images/flags/South-Korea-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Spain"] {background-image:url(images/flags/Spain-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="St. Pierre and Miquelon"] {background-image:url(images/flags/St.-Pierre-and-Miquelon-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="St. Vincent and Grenadines"] {background-image:url(images/flags/St.-Vincent-and-Grenadines-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Suriname"] {background-image:url(images/flags/Suriname-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Sweden"] {background-image:url(images/flags/Sweden-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Switzerland"] {background-image:url(images/flags/Switzerland-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Taiwan"] {background-image:url(images/flags/Taiwan-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Tajikistan"] {background-image:url(images/flags/Tajikistan-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Tanzania"] {background-image:url(images/flags/Tanzania-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Thailand"] {background-image:url(images/flags/Thailand-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Togo"] {background-image:url(images/flags/Togo-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Turkey"] {background-image:url(images/flags/Turkey-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Turks And Caicos Islands"] {background-image:url(images/flags/Turks-And-Caicos-Islands-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Uganda"] {background-image:url(images/flags/Uganda-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="United Arab Emirates"] {background-image:url(images/flags/United-Arab-Emirates-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="United Kingdom"] {background-image:url(images/flags/United-Kingdom-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="United States"] {background-image:url(images/flags/United-States-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Uruguay"] {background-image:url(images/flags/Uruguay-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Uzbekistan"] {background-image:url(images/flags/Uzbekistan-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Vatican"] {background-image:url(images/flags/Vatican-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Vietnam"] {background-image:url(images/flags/Vietnam-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Western Samoa"] {background-image:url(images/flags/Western-Samoa-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}.select2-selection__choice[title="Zambia"] {background-image:url(images/flags/Zambia-Flag.png);
                                                background-size: 25px;
                                                background-repeat: no-repeat;
                                                background-position: 20px 0px;}											</style>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div id="offers_date-pie" class="col-md-12" style="display: block;"><canvas width="670" height="335" style="display: inline-block; width: 670px; height: 335px; vertical-align: top;"></canvas><table style="position:absolute;top:9px;right:9px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #0aa699;overflow:hidden"></div></div></td><td class="legendLabel">MaxPhone</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #0090d9;overflow:hidden"></div></div></td><td class="legendLabel">CoolEdge</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #fdd01c;overflow:hidden"></div></div></td><td class="legendLabel">Tactic AIR Drone</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #f35958;overflow:hidden"></div></div></td><td class="legendLabel">Rest</td></tr></tbody></table></div>
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
                                <tbody><tr><td class="v-align-middle"><span class="muted">Ecommerce - MaxPhone INTL - All Languages - EXCLUSIVE</span></td><td><span class="muted">29.7 % </span></td><td class="v-align-middle"><div class="progress"><div data-percentage="29.7%" class="progress-bar animate-progress-bar" style="width: 29.661016949152543%; background-color:#0aa699"></div></div></td></tr><tr><td class="v-align-middle"><span class="muted">Ecommerce - CoolEdge INTL - All Languages - EXCLUSIVE</span></td><td><span class="muted">20.3 % </span></td><td class="v-align-middle"><div class="progress"><div data-percentage="20.3%" class="progress-bar animate-progress-bar" style="width: 20.338983050847457%; background-color:#0090d9"></div></div></td></tr><tr><td class="v-align-middle"><span class="muted">Ecommerce - Tactic AIR Drone - All Languages - EXCLUSIVE</span></td><td><span class="muted">9.3 % </span></td><td class="v-align-middle"><div class="progress"><div data-percentage="9.3%" class="progress-bar animate-progress-bar" style="width: 9.322033898305085%; background-color:#fdd01c"></div></div></td></tr></tbody>
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
                        <div class="col-xs-12">
                            <div class="col-xs-12 col-md-6 col-lg-2_min_col_lg_1 use_small_padding">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <select class="list_date_suf_ select2_list padding_left select2-hidden-accessible" data-suffix="geo" style="margin-bottom: 10px;" name="date" tabindex="-1" aria-hidden="true">
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
                                        <input type="text" class="form-control date_start_suf_ date_start_suf_geo date_pic_wid sandbox-advance_suf_geo">
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
                                        <input type="text" class="form-control date_end_suf_ date_end_suf_geo date_pic_wid sandbox-advance_suf_geo">
                                        <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-lg-2_min_col_lg_1">
                                <div class="row">
                                    <div class="col-xs-12 use_small_padding">
                                        <select class="select2_offers select2-hidden-accessible" name="offers" data-suffix="geo" id="offers_geo" multiple="" tabindex="-1" aria-hidden="true">
                                            <option value="DroneX">Ecommerce - DroneX INTL - All Languages - EXCLUSIVE</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div id="geo_date-pie" class="col-md-12" style="display: block;"><canvas width="670" height="335" style="display: inline-block; width: 670px; height: 335px; vertical-align: top;"></canvas><table style="position:absolute;top:9px;right:9px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #0aa699;overflow:hidden"></div></div></td><td class="legendLabel">Israel</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #0090d9;overflow:hidden"></div></div></td><td class="legendLabel">United States</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #fdd01c;overflow:hidden"></div></div></td><td class="legendLabel">Australia</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #f35958;overflow:hidden"></div></div></td><td class="legendLabel">United Kingdom</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #75CB64;overflow:hidden"></div></div></td><td class="legendLabel">Italy</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #FFE47E;overflow:hidden"></div></div></td><td class="legendLabel">New Zealand</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #6F22B8;overflow:hidden"></div></div></td><td class="legendLabel">Canada</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #B06094;overflow:hidden"></div></div></td><td class="legendLabel">Spain</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #304E37;overflow:hidden"></div></div></td><td class="legendLabel">Belgium</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #EA74C9;overflow:hidden"></div></div></td><td class="legendLabel">Colombia</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #7FE9C6;overflow:hidden"></div></div></td><td class="legendLabel">Rest</td></tr></tbody></table></div>
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
                                <tbody><tr><td class="v-align-middle"><span class="muted"><img style="width:25px; margin-right:5px;" src="images/flags/Israel-Flag.png">Israel</span></td><td><span class="muted">30.5 % </span></td><td class="v-align-middle"><div class="progress"><div data-percentage="30.5%" class="progress-bar animate-progress-bar" style="width: 30.508474576271187%; background-color:#0aa699"></div></div></td></tr><tr><td class="v-align-middle"><span class="muted"><img style="width:25px; margin-right:5px;" src="images/flags/United-States-Flag.png">United States</span></td><td><span class="muted">20.3 % </span></td><td class="v-align-middle"><div class="progress"><div data-percentage="20.3%" class="progress-bar animate-progress-bar" style="width: 20.338983050847457%; background-color:#0090d9"></div></div></td></tr><tr><td class="v-align-middle"><span class="muted"><img style="width:25px; margin-right:5px;" src="images/flags/Australia-Flag.png">Australia</span></td><td><span class="muted">13.6 % </span></td><td class="v-align-middle"><div class="progress"><div data-percentage="13.6%" class="progress-bar animate-progress-bar" style="width: 13.559322033898304%; background-color:#fdd01c"></div></div></td></tr><tr><td class="v-align-middle"><span class="muted"><img style="width:25px; margin-right:5px;" src="images/flags/United-Kingdom-Flag.png">United Kingdom</span></td><td><span class="muted">9.3 % </span></td><td class="v-align-middle"><div class="progress"><div data-percentage="9.3%" class="progress-bar animate-progress-bar" style="width: 9.322033898305085%; background-color:#f35958"></div></div></td></tr><tr><td class="v-align-middle"><span class="muted"><img style="width:25px; margin-right:5px;" src="images/flags/Italy-Flag.png">Italy</span></td><td><span class="muted">5.1 % </span></td><td class="v-align-middle"><div class="progress"><div data-percentage="5.1%" class="progress-bar animate-progress-bar" style="width: 5.084745762711864%; background-color:#75CB64"></div></div></td></tr><tr><td class="v-align-middle"><span class="muted"><img style="width:25px; margin-right:5px;" src="images/flags/New-Zealand-Flag.png">New Zealand</span></td><td><span class="muted">4.2 % </span></td><td class="v-align-middle"><div class="progress"><div data-percentage="4.2%" class="progress-bar animate-progress-bar" style="width: 4.237288135593221%; background-color:#FFE47E"></div></div></td></tr><tr><td class="v-align-middle"><span class="muted"><img style="width:25px; margin-right:5px;" src="images/flags/Canada-Flag.png">Canada</span></td><td><span class="muted">2.5 % </span></td><td class="v-align-middle"><div class="progress"><div data-percentage="2.5%" class="progress-bar animate-progress-bar" style="width: 2.542372881355932%; background-color:#6F22B8"></div></div></td></tr><tr><td class="v-align-middle"><span class="muted"><img style="width:25px; margin-right:5px;" src="images/flags/Spain-Flag.png">Spain</span></td><td><span class="muted">1.7 % </span></td><td class="v-align-middle"><div class="progress"><div data-percentage="1.7%" class="progress-bar animate-progress-bar" style="width: 1.694915254237288%; background-color:#B06094"></div></div></td></tr><tr><td class="v-align-middle"><span class="muted"><img style="width:25px; margin-right:5px;" src="images/flags/Belgium-Flag.png">Belgium</span></td><td><span class="muted">1.7 % </span></td><td class="v-align-middle"><div class="progress"><div data-percentage="1.7%" class="progress-bar animate-progress-bar" style="width: 1.694915254237288%; background-color:#304E37"></div></div></td></tr><tr><td class="v-align-middle"><span class="muted"><img style="width:25px; margin-right:5px;" src="images/flags/Colombia-Flag.png">Colombia</span></td><td><span class="muted">0.8 % </span></td><td class="v-align-middle"><div class="progress"><div data-percentage="0.8%" class="progress-bar animate-progress-bar" style="width: 0.847457627118644%; background-color:#EA74C9"></div></div></td></tr></tbody>
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
                        <div class="col-xs-12 opportunity-graph text-center">There is no hot opportunity today, please check back tomorrow as our algorithm will recalculate based on the new data set.</div>
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
                                <tbody class="new_offers"><tr><td>E-commerce - PostureRemind Pro INTL - All Languages - EXCLUSIVE</td><td>2024-03-05 18:02:50</td><td>$65</td></tr><tr><td>E-commerce - KneeBoost Pro INTL - All Languages - EXCLUSIVE</td><td>2024-01-23 16:02:35</td><td>$28</td></tr><tr><td>E-commerce - CozyTime Pro INTL - All Languages - EXCLUSIVE</td><td>2023-11-15 14:46:02</td><td>$40</td></tr></tbody>
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
                            <div id="placeholder-bar-chart" style="min-height: 250px; padding: 0px; position: relative;"><canvas class="base" width="2159" height="250"></canvas><canvas class="overlay" width="2159" height="250" style="position: absolute; left: 0px; top: 0px;"></canvas><div class="tickLabels" style="font-size:smaller"><div class="xAxis x1Axis" style="color:#545454"><div class="tickLabel" style="position:absolute;text-align:center;left:204px;top:234px;width:431px">Jan</div><div class="tickLabel" style="position:absolute;text-align:center;left:931px;top:234px;width:431px">Feb</div><div class="tickLabel" style="position:absolute;text-align:center;left:1611px;top:234px;width:431px">Mar</div></div><div class="yAxis y1Axis" style="color:#545454"><div class="tickLabel" style="position:absolute;text-align:right;top:217px;right:2147px;width:12px">0%</div><div class="tickLabel" style="position:absolute;text-align:right;top:180px;right:2147px;width:12px">5%</div><div class="tickLabel" style="position:absolute;text-align:right;top:143px;right:2147px;width:12px">10%</div><div class="tickLabel" style="position:absolute;text-align:right;top:107px;right:2147px;width:12px">15%</div><div class="tickLabel" style="position:absolute;text-align:right;top:70px;right:2147px;width:12px">20%</div><div class="tickLabel" style="position:absolute;text-align:right;top:33px;right:2147px;width:12px">25%</div><div class="tickLabel" style="position:absolute;text-align:right;top:-4px;right:2147px;width:12px">30%</div></div></div><div class="legend"><div style="position: absolute; width: 2159px; height: 20px; top: 9px; right: 9px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:9px;right:9px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #0aa699;overflow:hidden"></div></div></td><td class="legendLabel">ClearView</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #0090d9;overflow:hidden"></div></div></td><td class="legendLabel">MaxPhone</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #fdd01c;overflow:hidden"></div></div></td><td class="legendLabel">WIFI UltraBoost</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #f35958;overflow:hidden"></div></div></td><td class="legendLabel">TVShareMax</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #75CB64;overflow:hidden"></div></div></td><td class="legendLabel">CoolEdge</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #FFE47E;overflow:hidden"></div></div></td><td class="legendLabel">Tactic AIR Drone</td></tr></tbody></table></div></div>
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
                    <!-- <h4>Monthly Progression Of The Top 3 Chart</h4> -->
                    <!-- <p>This section give a high level view on the top 3 offers evolution across the current year.
                        Graph:
                    </p> -->
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
                    <!-- <h4>Monthly Progression Of The Top 3 Chart</h4> -->
                    <!-- <p>This section give a high level view on the top 3 offers evolution across the current year.
                        Graph:
                    </p> -->
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

        <!-- Modal -->
        <div id="ctr_modal" class="modal fade" role="dialog">
            <div class="modal-dialog offer">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 class="modal-title">CTR</h4>
                    </div>
                    <div>
                        <textarea type="text" id="ctr_content" class="form-control creative_description add_ofer_input" name="name" style="visibility: hidden; display: none;"></textarea><div id="cke_ctr_content" class="cke_1 cke cke_reset cke_chrome cke_editor_ctr_content cke_ltr cke_browser_webkit" dir="ltr" lang="en" role="application" aria-labelledby="cke_ctr_content_arialbl"><span id="cke_ctr_content_arialbl" class="cke_voice_label">Rich Text Editor, ctr_content</span><div class="cke_inner cke_reset" role="presentation"><span id="cke_1_top" class="cke_top cke_reset_all" role="presentation" style="height: auto; user-select: none;"><span id="cke_16" class="cke_voice_label">Editor toolbars</span><span id="cke_1_toolbox" class="cke_toolbox" role="group" aria-labelledby="cke_16" onmousedown="return false;"><span id="cke_18" class="cke_toolbar" aria-labelledby="cke_18_label" role="toolbar"><span id="cke_18_label" class="cke_voice_label">Clipboard/Undo</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_19" class="cke_button cke_button__copy cke_button_disabled " href="javascript:void('Copy')" title="Copy (Ctrl+C)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_19_label" aria-describedby="cke_19_description" aria-haspopup="false" aria-disabled="true" onkeydown="return CKEDITOR.tools.callFunction(2,event);" onfocus="return CKEDITOR.tools.callFunction(3,event);" onclick="CKEDITOR.tools.callFunction(4,this);return false;"><span class="cke_button_icon cke_button__copy_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -264px;background-size:auto;">&nbsp;</span><span id="cke_19_label" class="cke_button_label cke_button__copy_label" aria-hidden="false">Copy</span><span id="cke_19_description" class="cke_button_label" aria-hidden="false">Keyboard shortcut Ctrl+C</span></a><a id="cke_20" class="cke_button cke_button__paste cke_button_off" href="javascript:void('Paste')" title="Paste (Ctrl+V)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_20_label" aria-describedby="cke_20_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(5,event);" onfocus="return CKEDITOR.tools.callFunction(6,event);" onclick="CKEDITOR.tools.callFunction(7,this);return false;"><span class="cke_button_icon cke_button__paste_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -360px;background-size:auto;">&nbsp;</span><span id="cke_20_label" class="cke_button_label cke_button__paste_label" aria-hidden="false">Paste</span><span id="cke_20_description" class="cke_button_label" aria-hidden="false">Keyboard shortcut Ctrl+V</span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_21" class="cke_toolbar" aria-labelledby="cke_21_label" role="toolbar"><span id="cke_21_label" class="cke_voice_label">Editing</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_22" class="cke_button cke_button__selectall cke_button_off" href="javascript:void('Select All')" title="Select All" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_22_label" aria-describedby="cke_22_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(8,event);" onfocus="return CKEDITOR.tools.callFunction(9,event);" onclick="CKEDITOR.tools.callFunction(10,this);return false;"><span class="cke_button_icon cke_button__selectall_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -1704px;background-size:auto;">&nbsp;</span><span id="cke_22_label" class="cke_button_label cke_button__selectall_label" aria-hidden="false">Select All</span><span id="cke_22_description" class="cke_button_label" aria-hidden="false"></span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_23" class="cke_toolbar" aria-labelledby="cke_23_label" role="toolbar"><span id="cke_23_label" class="cke_voice_label">Basic Styles</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_24" class="cke_button cke_button__bold cke_button_off" href="javascript:void('Bold')" title="Bold (Ctrl+B)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_24_label" aria-describedby="cke_24_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(11,event);" onfocus="return CKEDITOR.tools.callFunction(12,event);" onclick="CKEDITOR.tools.callFunction(13,this);return false;"><span class="cke_button_icon cke_button__bold_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -24px;background-size:auto;">&nbsp;</span><span id="cke_24_label" class="cke_button_label cke_button__bold_label" aria-hidden="false">Bold</span><span id="cke_24_description" class="cke_button_label" aria-hidden="false">Keyboard shortcut Ctrl+B</span></a><a id="cke_25" class="cke_button cke_button__italic cke_button_off" href="javascript:void('Italic')" title="Italic (Ctrl+I)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_25_label" aria-describedby="cke_25_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(14,event);" onfocus="return CKEDITOR.tools.callFunction(15,event);" onclick="CKEDITOR.tools.callFunction(16,this);return false;"><span class="cke_button_icon cke_button__italic_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -48px;background-size:auto;">&nbsp;</span><span id="cke_25_label" class="cke_button_label cke_button__italic_label" aria-hidden="false">Italic</span><span id="cke_25_description" class="cke_button_label" aria-hidden="false">Keyboard shortcut Ctrl+I</span></a><a id="cke_26" class="cke_button cke_button__underline cke_button_off" href="javascript:void('Underline')" title="Underline (Ctrl+U)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_26_label" aria-describedby="cke_26_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(17,event);" onfocus="return CKEDITOR.tools.callFunction(18,event);" onclick="CKEDITOR.tools.callFunction(19,this);return false;"><span class="cke_button_icon cke_button__underline_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -144px;background-size:auto;">&nbsp;</span><span id="cke_26_label" class="cke_button_label cke_button__underline_label" aria-hidden="false">Underline</span><span id="cke_26_description" class="cke_button_label" aria-hidden="false">Keyboard shortcut Ctrl+U</span></a><a id="cke_27" class="cke_button cke_button__strike cke_button_off" href="javascript:void('Strikethrough')" title="Strikethrough" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_27_label" aria-describedby="cke_27_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(20,event);" onfocus="return CKEDITOR.tools.callFunction(21,event);" onclick="CKEDITOR.tools.callFunction(22,this);return false;"><span class="cke_button_icon cke_button__strike_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -72px;background-size:auto;">&nbsp;</span><span id="cke_27_label" class="cke_button_label cke_button__strike_label" aria-hidden="false">Strikethrough</span><span id="cke_27_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_28" class="cke_button cke_button__subscript cke_button_off" href="javascript:void('Subscript')" title="Subscript" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_28_label" aria-describedby="cke_28_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(23,event);" onfocus="return CKEDITOR.tools.callFunction(24,event);" onclick="CKEDITOR.tools.callFunction(25,this);return false;"><span class="cke_button_icon cke_button__subscript_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -96px;background-size:auto;">&nbsp;</span><span id="cke_28_label" class="cke_button_label cke_button__subscript_label" aria-hidden="false">Subscript</span><span id="cke_28_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_29" class="cke_button cke_button__superscript cke_button_off" href="javascript:void('Superscript')" title="Superscript" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_29_label" aria-describedby="cke_29_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(26,event);" onfocus="return CKEDITOR.tools.callFunction(27,event);" onclick="CKEDITOR.tools.callFunction(28,this);return false;"><span class="cke_button_icon cke_button__superscript_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -120px;background-size:auto;">&nbsp;</span><span id="cke_29_label" class="cke_button_label cke_button__superscript_label" aria-hidden="false">Superscript</span><span id="cke_29_description" class="cke_button_label" aria-hidden="false"></span></a><span class="cke_toolbar_separator" role="separator"></span><a id="cke_30" class="cke_button cke_button__copyformatting cke_button_off" href="javascript:void('Copy Formatting')" title="Copy Formatting (Ctrl+Shift+C)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_30_label" aria-describedby="cke_30_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(29,event);" onfocus="return CKEDITOR.tools.callFunction(30,event);" onclick="CKEDITOR.tools.callFunction(31,this);return false;"><span class="cke_button_icon cke_button__copyformatting_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -432px;background-size:auto;">&nbsp;</span><span id="cke_30_label" class="cke_button_label cke_button__copyformatting_label" aria-hidden="false">Copy Formatting</span><span id="cke_30_description" class="cke_button_label" aria-hidden="false">Keyboard shortcut Ctrl+Shift+C</span></a><a id="cke_31" class="cke_button cke_button__removeformat cke_button_off" href="javascript:void('Remove Format')" title="Remove Format" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_31_label" aria-describedby="cke_31_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(32,event);" onfocus="return CKEDITOR.tools.callFunction(33,event);" onclick="CKEDITOR.tools.callFunction(34,this);return false;"><span class="cke_button_icon cke_button__removeformat_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -1632px;background-size:auto;">&nbsp;</span><span id="cke_31_label" class="cke_button_label cke_button__removeformat_label" aria-hidden="false">Remove Format</span><span id="cke_31_description" class="cke_button_label" aria-hidden="false"></span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_32" class="cke_toolbar cke_toolbar_last" aria-labelledby="cke_32_label" role="toolbar"><span id="cke_32_label" class="cke_voice_label">Document</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_33" class="cke_button cke_button__source cke_button_off" href="javascript:void('Source')" title="Source" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_33_label" aria-describedby="cke_33_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(35,event);" onfocus="return CKEDITOR.tools.callFunction(36,event);" onclick="CKEDITOR.tools.callFunction(37,this);return false;"><span class="cke_button_icon cke_button__source_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -1824px;background-size:auto;">&nbsp;</span><span id="cke_33_label" class="cke_button_label cke_button__source_label" aria-hidden="false">Source</span><span id="cke_33_description" class="cke_button_label" aria-hidden="false"></span></a></span><span class="cke_toolbar_end"></span></span><span class="cke_toolbar_break"></span><span id="cke_34" class="cke_toolbar" aria-labelledby="cke_34_label" role="toolbar"><span id="cke_34_label" class="cke_voice_label">Paragraph</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_35" class="cke_button cke_button__numberedlist cke_button_off" href="javascript:void('Insert/Remove Numbered List')" title="Insert/Remove Numbered List" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_35_label" aria-describedby="cke_35_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(38,event);" onfocus="return CKEDITOR.tools.callFunction(39,event);" onclick="CKEDITOR.tools.callFunction(40,this);return false;"><span class="cke_button_icon cke_button__numberedlist_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -1320px;background-size:auto;">&nbsp;</span><span id="cke_35_label" class="cke_button_label cke_button__numberedlist_label" aria-hidden="false">Insert/Remove Numbered List</span><span id="cke_35_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_36" class="cke_button cke_button__bulletedlist cke_button_off" href="javascript:void('Insert/Remove Bulleted List')" title="Insert/Remove Bulleted List" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_36_label" aria-describedby="cke_36_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(41,event);" onfocus="return CKEDITOR.tools.callFunction(42,event);" onclick="CKEDITOR.tools.callFunction(43,this);return false;"><span class="cke_button_icon cke_button__bulletedlist_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -1272px;background-size:auto;">&nbsp;</span><span id="cke_36_label" class="cke_button_label cke_button__bulletedlist_label" aria-hidden="false">Insert/Remove Bulleted List</span><span id="cke_36_description" class="cke_button_label" aria-hidden="false"></span></a><span class="cke_toolbar_separator" role="separator"></span><a id="cke_37" class="cke_button cke_button__blockquote cke_button_off" href="javascript:void('Block Quote')" title="Block Quote" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_37_label" aria-describedby="cke_37_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(44,event);" onfocus="return CKEDITOR.tools.callFunction(45,event);" onclick="CKEDITOR.tools.callFunction(46,this);return false;"><span class="cke_button_icon cke_button__blockquote_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -216px;background-size:auto;">&nbsp;</span><span id="cke_37_label" class="cke_button_label cke_button__blockquote_label" aria-hidden="false">Block Quote</span><span id="cke_37_description" class="cke_button_label" aria-hidden="false"></span></a><span class="cke_toolbar_separator" role="separator"></span><a id="cke_38" class="cke_button cke_button__justifyleft cke_button_off" href="javascript:void('Align Left')" title="Align Left" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_38_label" aria-describedby="cke_38_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(47,event);" onfocus="return CKEDITOR.tools.callFunction(48,event);" onclick="CKEDITOR.tools.callFunction(49,this);return false;"><span class="cke_button_icon cke_button__justifyleft_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -1080px;background-size:auto;">&nbsp;</span><span id="cke_38_label" class="cke_button_label cke_button__justifyleft_label" aria-hidden="false">Align Left</span><span id="cke_38_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_39" class="cke_button cke_button__justifycenter cke_button_off" href="javascript:void('Center')" title="Center" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_39_label" aria-describedby="cke_39_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(50,event);" onfocus="return CKEDITOR.tools.callFunction(51,event);" onclick="CKEDITOR.tools.callFunction(52,this);return false;"><span class="cke_button_icon cke_button__justifycenter_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -1056px;background-size:auto;">&nbsp;</span><span id="cke_39_label" class="cke_button_label cke_button__justifycenter_label" aria-hidden="false">Center</span><span id="cke_39_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_40" class="cke_button cke_button__justifyright cke_button_off" href="javascript:void('Align Right')" title="Align Right" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_40_label" aria-describedby="cke_40_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(53,event);" onfocus="return CKEDITOR.tools.callFunction(54,event);" onclick="CKEDITOR.tools.callFunction(55,this);return false;"><span class="cke_button_icon cke_button__justifyright_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -1104px;background-size:auto;">&nbsp;</span><span id="cke_40_label" class="cke_button_label cke_button__justifyright_label" aria-hidden="false">Align Right</span><span id="cke_40_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_41" class="cke_button cke_button__justifyblock cke_button_off" href="javascript:void('Justify')" title="Justify" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_41_label" aria-describedby="cke_41_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(56,event);" onfocus="return CKEDITOR.tools.callFunction(57,event);" onclick="CKEDITOR.tools.callFunction(58,this);return false;"><span class="cke_button_icon cke_button__justifyblock_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -1032px;background-size:auto;">&nbsp;</span><span id="cke_41_label" class="cke_button_label cke_button__justifyblock_label" aria-hidden="false">Justify</span><span id="cke_41_description" class="cke_button_label" aria-hidden="false"></span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_42" class="cke_toolbar" aria-labelledby="cke_42_label" role="toolbar"><span id="cke_42_label" class="cke_voice_label">Links</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_43" class="cke_button cke_button__link cke_button_off" href="javascript:void('Link')" title="Link (Ctrl+L)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_43_label" aria-describedby="cke_43_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(59,event);" onfocus="return CKEDITOR.tools.callFunction(60,event);" onclick="CKEDITOR.tools.callFunction(61,this);return false;"><span class="cke_button_icon cke_button__link_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -1200px;background-size:auto;">&nbsp;</span><span id="cke_43_label" class="cke_button_label cke_button__link_label" aria-hidden="false">Link</span><span id="cke_43_description" class="cke_button_label" aria-hidden="false">Keyboard shortcut Ctrl+L</span></a><a id="cke_44" class="cke_button cke_button__unlink cke_button_disabled " href="javascript:void('Unlink')" title="Unlink" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_44_label" aria-describedby="cke_44_description" aria-haspopup="false" aria-disabled="true" onkeydown="return CKEDITOR.tools.callFunction(62,event);" onfocus="return CKEDITOR.tools.callFunction(63,event);" onclick="CKEDITOR.tools.callFunction(64,this);return false;"><span class="cke_button_icon cke_button__unlink_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -1224px;background-size:auto;">&nbsp;</span><span id="cke_44_label" class="cke_button_label cke_button__unlink_label" aria-hidden="false">Unlink</span><span id="cke_44_description" class="cke_button_label" aria-hidden="false"></span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_45" class="cke_toolbar cke_toolbar_last" aria-labelledby="cke_45_label" role="toolbar"><span id="cke_45_label" class="cke_voice_label">Insert</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_46" class="cke_button cke_button__image cke_button_off" href="javascript:void('Image')" title="Image" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_46_label" aria-describedby="cke_46_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(65,event);" onfocus="return CKEDITOR.tools.callFunction(66,event);" onclick="CKEDITOR.tools.callFunction(67,this);return false;"><span class="cke_button_icon cke_button__image_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -912px;background-size:auto;">&nbsp;</span><span id="cke_46_label" class="cke_button_label cke_button__image_label" aria-hidden="false">Image</span><span id="cke_46_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_47" class="cke_button cke_button__table cke_button_off" href="javascript:void('Table')" title="Table" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_47_label" aria-describedby="cke_47_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(68,event);" onfocus="return CKEDITOR.tools.callFunction(69,event);" onclick="CKEDITOR.tools.callFunction(70,this);return false;"><span class="cke_button_icon cke_button__table_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -1872px;background-size:auto;">&nbsp;</span><span id="cke_47_label" class="cke_button_label cke_button__table_label" aria-hidden="false">Table</span><span id="cke_47_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_48" class="cke_button cke_button__horizontalrule cke_button_off" href="javascript:void('Insert Horizontal Line')" title="Insert Horizontal Line" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_48_label" aria-describedby="cke_48_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(71,event);" onfocus="return CKEDITOR.tools.callFunction(72,event);" onclick="CKEDITOR.tools.callFunction(73,this);return false;"><span class="cke_button_icon cke_button__horizontalrule_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -864px;background-size:auto;">&nbsp;</span><span id="cke_48_label" class="cke_button_label cke_button__horizontalrule_label" aria-hidden="false">Insert Horizontal Line</span><span id="cke_48_description" class="cke_button_label" aria-hidden="false"></span></a></span><span class="cke_toolbar_end"></span></span><span class="cke_toolbar_break"></span><span id="cke_49" class="cke_toolbar" aria-labelledby="cke_49_label" role="toolbar"><span id="cke_49_label" class="cke_voice_label">Styles</span><span class="cke_toolbar_start"></span><span id="cke_17" class="cke_combo cke_combo__fontsize cke_combo_off" role="presentation"><span id="cke_17_label" class="cke_combo_label">Size</span><a class="cke_combo_button" title="Font Size" tabindex="-1" href="javascript:void('Font Size')" hidefocus="true" role="button" aria-labelledby="cke_17_label" aria-haspopup="true" onkeydown="return CKEDITOR.tools.callFunction(75,event,this);" onfocus="return CKEDITOR.tools.callFunction(76,event);" onclick="CKEDITOR.tools.callFunction(74,this);return false;"><span id="cke_17_text" class="cke_combo_text cke_combo_inlinelabel">Size</span><span class="cke_combo_open"><span class="cke_combo_arrow"></span></span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_50" class="cke_toolbar" aria-labelledby="cke_50_label" role="toolbar"><span id="cke_50_label" class="cke_voice_label">Colors</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_51" class="cke_button cke_button__textcolor cke_button_off" href="javascript:void('Text Color')" title="Text Color" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_51_label" aria-describedby="cke_51_description" aria-haspopup="true" onkeydown="return CKEDITOR.tools.callFunction(77,event);" onfocus="return CKEDITOR.tools.callFunction(78,event);" onclick="CKEDITOR.tools.callFunction(79,this);return false;"><span class="cke_button_icon cke_button__textcolor_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -408px;background-size:auto;">&nbsp;</span><span id="cke_51_label" class="cke_button_label cke_button__textcolor_label" aria-hidden="false">Text Color</span><span id="cke_51_description" class="cke_button_label" aria-hidden="false"></span><span class="cke_button_arrow"></span></a><a id="cke_52" class="cke_button cke_button__bgcolor cke_button_off" href="javascript:void('Background Color')" title="Background Color" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_52_label" aria-describedby="cke_52_description" aria-haspopup="true" onkeydown="return CKEDITOR.tools.callFunction(80,event);" onfocus="return CKEDITOR.tools.callFunction(81,event);" onclick="CKEDITOR.tools.callFunction(82,this);return false;"><span class="cke_button_icon cke_button__bgcolor_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -384px;background-size:auto;">&nbsp;</span><span id="cke_52_label" class="cke_button_label cke_button__bgcolor_label" aria-hidden="false">Background Color</span><span id="cke_52_description" class="cke_button_label" aria-hidden="false"></span><span class="cke_button_arrow"></span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_53" class="cke_toolbar" aria-labelledby="cke_53_label" role="toolbar"><span id="cke_53_label" class="cke_voice_label">Tools</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_54" class="cke_button cke_button__maximize cke_button_off" href="javascript:void('Maximize')" title="Maximize" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_54_label" aria-describedby="cke_54_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(83,event);" onfocus="return CKEDITOR.tools.callFunction(84,event);" onclick="CKEDITOR.tools.callFunction(85,this);return false;"><span class="cke_button_icon cke_button__maximize_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -1344px;background-size:auto;">&nbsp;</span><span id="cke_54_label" class="cke_button_label cke_button__maximize_label" aria-hidden="false">Maximize</span><span id="cke_54_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_55" class="cke_button cke_button__showblocks cke_button_off" href="javascript:void('Show Blocks')" title="Show Blocks" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_55_label" aria-describedby="cke_55_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(86,event);" onfocus="return CKEDITOR.tools.callFunction(87,event);" onclick="CKEDITOR.tools.callFunction(88,this);return false;"><span class="cke_button_icon cke_button__showblocks_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -1752px;background-size:auto;">&nbsp;</span><span id="cke_55_label" class="cke_button_label cke_button__showblocks_label" aria-hidden="false">Show Blocks</span><span id="cke_55_description" class="cke_button_label" aria-hidden="false"></span></a></span><span class="cke_toolbar_end"></span></span></span></span><div id="cke_1_contents" class="cke_contents cke_reset" role="presentation" style="height: 200px;"><span id="cke_59" class="cke_voice_label">Press ALT 0 for help</span><iframe src="" frameborder="0" class="cke_wysiwyg_frame cke_reset" title="Rich Text Editor, ctr_content" aria-describedby="cke_59" tabindex="0" allowtransparency="true" style="width: 100%; height: 100%;"></iframe></div><span id="cke_1_bottom" class="cke_bottom cke_reset_all" role="presentation" style="user-select: none;"><span id="cke_1_resizer" class="cke_resizer cke_resizer_vertical cke_resizer_ltr" title="Resize" onmousedown="CKEDITOR.tools.callFunction(1, event)">◢</span><span id="cke_1_path_label" class="cke_voice_label">Elements path</span><span id="cke_1_path" class="cke_path" role="group" aria-labelledby="cke_1_path_label"><span class="cke_path_empty">&nbsp;</span></span></span></div></div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="submit_ctr btn btn-primary btn-cons" value="submit">
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div id="traffic_sources_modal" class="modal fade" role="dialog">
            <div class="modal-dialog offer">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 class="modal-title">Traffic Sources</h4>
                    </div>
                    <div>
                        <textarea type="text" id="traffic_sources_content" class="form-control creative_description add_ofer_input" name="name" style="visibility: hidden; display: none;"></textarea><div id="cke_traffic_sources_content" class="cke_2 cke cke_reset cke_chrome cke_editor_traffic_sources_content cke_ltr cke_browser_webkit" dir="ltr" lang="en" role="application" aria-labelledby="cke_traffic_sources_content_arialbl"><span id="cke_traffic_sources_content_arialbl" class="cke_voice_label">Rich Text Editor, traffic_sources_content</span><div class="cke_inner cke_reset" role="presentation"><span id="cke_2_top" class="cke_top cke_reset_all" role="presentation" style="height: auto; user-select: none;"><span id="cke_71" class="cke_voice_label">Editor toolbars</span><span id="cke_2_toolbox" class="cke_toolbox" role="group" aria-labelledby="cke_71" onmousedown="return false;"><span id="cke_73" class="cke_toolbar" aria-labelledby="cke_73_label" role="toolbar"><span id="cke_73_label" class="cke_voice_label">Clipboard/Undo</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_74" class="cke_button cke_button__copy cke_button_disabled " href="javascript:void('Copy')" title="Copy (Ctrl+C)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_74_label" aria-describedby="cke_74_description" aria-haspopup="false" aria-disabled="true" onkeydown="return CKEDITOR.tools.callFunction(94,event);" onfocus="return CKEDITOR.tools.callFunction(95,event);" onclick="CKEDITOR.tools.callFunction(96,this);return false;"><span class="cke_button_icon cke_button__copy_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -264px;background-size:auto;">&nbsp;</span><span id="cke_74_label" class="cke_button_label cke_button__copy_label" aria-hidden="false">Copy</span><span id="cke_74_description" class="cke_button_label" aria-hidden="false">Keyboard shortcut Ctrl+C</span></a><a id="cke_75" class="cke_button cke_button__paste cke_button_off" href="javascript:void('Paste')" title="Paste (Ctrl+V)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_75_label" aria-describedby="cke_75_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(97,event);" onfocus="return CKEDITOR.tools.callFunction(98,event);" onclick="CKEDITOR.tools.callFunction(99,this);return false;"><span class="cke_button_icon cke_button__paste_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -360px;background-size:auto;">&nbsp;</span><span id="cke_75_label" class="cke_button_label cke_button__paste_label" aria-hidden="false">Paste</span><span id="cke_75_description" class="cke_button_label" aria-hidden="false">Keyboard shortcut Ctrl+V</span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_76" class="cke_toolbar" aria-labelledby="cke_76_label" role="toolbar"><span id="cke_76_label" class="cke_voice_label">Editing</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_77" class="cke_button cke_button__selectall cke_button_off" href="javascript:void('Select All')" title="Select All" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_77_label" aria-describedby="cke_77_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(100,event);" onfocus="return CKEDITOR.tools.callFunction(101,event);" onclick="CKEDITOR.tools.callFunction(102,this);return false;"><span class="cke_button_icon cke_button__selectall_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -1704px;background-size:auto;">&nbsp;</span><span id="cke_77_label" class="cke_button_label cke_button__selectall_label" aria-hidden="false">Select All</span><span id="cke_77_description" class="cke_button_label" aria-hidden="false"></span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_78" class="cke_toolbar" aria-labelledby="cke_78_label" role="toolbar"><span id="cke_78_label" class="cke_voice_label">Basic Styles</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_79" class="cke_button cke_button__bold cke_button_off" href="javascript:void('Bold')" title="Bold (Ctrl+B)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_79_label" aria-describedby="cke_79_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(103,event);" onfocus="return CKEDITOR.tools.callFunction(104,event);" onclick="CKEDITOR.tools.callFunction(105,this);return false;"><span class="cke_button_icon cke_button__bold_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -24px;background-size:auto;">&nbsp;</span><span id="cke_79_label" class="cke_button_label cke_button__bold_label" aria-hidden="false">Bold</span><span id="cke_79_description" class="cke_button_label" aria-hidden="false">Keyboard shortcut Ctrl+B</span></a><a id="cke_80" class="cke_button cke_button__italic cke_button_off" href="javascript:void('Italic')" title="Italic (Ctrl+I)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_80_label" aria-describedby="cke_80_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(106,event);" onfocus="return CKEDITOR.tools.callFunction(107,event);" onclick="CKEDITOR.tools.callFunction(108,this);return false;"><span class="cke_button_icon cke_button__italic_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -48px;background-size:auto;">&nbsp;</span><span id="cke_80_label" class="cke_button_label cke_button__italic_label" aria-hidden="false">Italic</span><span id="cke_80_description" class="cke_button_label" aria-hidden="false">Keyboard shortcut Ctrl+I</span></a><a id="cke_81" class="cke_button cke_button__underline cke_button_off" href="javascript:void('Underline')" title="Underline (Ctrl+U)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_81_label" aria-describedby="cke_81_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(109,event);" onfocus="return CKEDITOR.tools.callFunction(110,event);" onclick="CKEDITOR.tools.callFunction(111,this);return false;"><span class="cke_button_icon cke_button__underline_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -144px;background-size:auto;">&nbsp;</span><span id="cke_81_label" class="cke_button_label cke_button__underline_label" aria-hidden="false">Underline</span><span id="cke_81_description" class="cke_button_label" aria-hidden="false">Keyboard shortcut Ctrl+U</span></a><a id="cke_82" class="cke_button cke_button__strike cke_button_off" href="javascript:void('Strikethrough')" title="Strikethrough" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_82_label" aria-describedby="cke_82_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(112,event);" onfocus="return CKEDITOR.tools.callFunction(113,event);" onclick="CKEDITOR.tools.callFunction(114,this);return false;"><span class="cke_button_icon cke_button__strike_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -72px;background-size:auto;">&nbsp;</span><span id="cke_82_label" class="cke_button_label cke_button__strike_label" aria-hidden="false">Strikethrough</span><span id="cke_82_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_83" class="cke_button cke_button__subscript cke_button_off" href="javascript:void('Subscript')" title="Subscript" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_83_label" aria-describedby="cke_83_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(115,event);" onfocus="return CKEDITOR.tools.callFunction(116,event);" onclick="CKEDITOR.tools.callFunction(117,this);return false;"><span class="cke_button_icon cke_button__subscript_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -96px;background-size:auto;">&nbsp;</span><span id="cke_83_label" class="cke_button_label cke_button__subscript_label" aria-hidden="false">Subscript</span><span id="cke_83_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_84" class="cke_button cke_button__superscript cke_button_off" href="javascript:void('Superscript')" title="Superscript" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_84_label" aria-describedby="cke_84_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(118,event);" onfocus="return CKEDITOR.tools.callFunction(119,event);" onclick="CKEDITOR.tools.callFunction(120,this);return false;"><span class="cke_button_icon cke_button__superscript_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -120px;background-size:auto;">&nbsp;</span><span id="cke_84_label" class="cke_button_label cke_button__superscript_label" aria-hidden="false">Superscript</span><span id="cke_84_description" class="cke_button_label" aria-hidden="false"></span></a><span class="cke_toolbar_separator" role="separator"></span><a id="cke_85" class="cke_button cke_button__copyformatting cke_button_off" href="javascript:void('Copy Formatting')" title="Copy Formatting (Ctrl+Shift+C)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_85_label" aria-describedby="cke_85_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(121,event);" onfocus="return CKEDITOR.tools.callFunction(122,event);" onclick="CKEDITOR.tools.callFunction(123,this);return false;"><span class="cke_button_icon cke_button__copyformatting_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -432px;background-size:auto;">&nbsp;</span><span id="cke_85_label" class="cke_button_label cke_button__copyformatting_label" aria-hidden="false">Copy Formatting</span><span id="cke_85_description" class="cke_button_label" aria-hidden="false">Keyboard shortcut Ctrl+Shift+C</span></a><a id="cke_86" class="cke_button cke_button__removeformat cke_button_off" href="javascript:void('Remove Format')" title="Remove Format" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_86_label" aria-describedby="cke_86_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(124,event);" onfocus="return CKEDITOR.tools.callFunction(125,event);" onclick="CKEDITOR.tools.callFunction(126,this);return false;"><span class="cke_button_icon cke_button__removeformat_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -1632px;background-size:auto;">&nbsp;</span><span id="cke_86_label" class="cke_button_label cke_button__removeformat_label" aria-hidden="false">Remove Format</span><span id="cke_86_description" class="cke_button_label" aria-hidden="false"></span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_87" class="cke_toolbar cke_toolbar_last" aria-labelledby="cke_87_label" role="toolbar"><span id="cke_87_label" class="cke_voice_label">Document</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_88" class="cke_button cke_button__source cke_button_off" href="javascript:void('Source')" title="Source" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_88_label" aria-describedby="cke_88_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(127,event);" onfocus="return CKEDITOR.tools.callFunction(128,event);" onclick="CKEDITOR.tools.callFunction(129,this);return false;"><span class="cke_button_icon cke_button__source_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -1824px;background-size:auto;">&nbsp;</span><span id="cke_88_label" class="cke_button_label cke_button__source_label" aria-hidden="false">Source</span><span id="cke_88_description" class="cke_button_label" aria-hidden="false"></span></a></span><span class="cke_toolbar_end"></span></span><span class="cke_toolbar_break"></span><span id="cke_89" class="cke_toolbar" aria-labelledby="cke_89_label" role="toolbar"><span id="cke_89_label" class="cke_voice_label">Paragraph</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_90" class="cke_button cke_button__numberedlist cke_button_off" href="javascript:void('Insert/Remove Numbered List')" title="Insert/Remove Numbered List" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_90_label" aria-describedby="cke_90_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(130,event);" onfocus="return CKEDITOR.tools.callFunction(131,event);" onclick="CKEDITOR.tools.callFunction(132,this);return false;"><span class="cke_button_icon cke_button__numberedlist_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -1320px;background-size:auto;">&nbsp;</span><span id="cke_90_label" class="cke_button_label cke_button__numberedlist_label" aria-hidden="false">Insert/Remove Numbered List</span><span id="cke_90_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_91" class="cke_button cke_button__bulletedlist cke_button_off" href="javascript:void('Insert/Remove Bulleted List')" title="Insert/Remove Bulleted List" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_91_label" aria-describedby="cke_91_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(133,event);" onfocus="return CKEDITOR.tools.callFunction(134,event);" onclick="CKEDITOR.tools.callFunction(135,this);return false;"><span class="cke_button_icon cke_button__bulletedlist_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -1272px;background-size:auto;">&nbsp;</span><span id="cke_91_label" class="cke_button_label cke_button__bulletedlist_label" aria-hidden="false">Insert/Remove Bulleted List</span><span id="cke_91_description" class="cke_button_label" aria-hidden="false"></span></a><span class="cke_toolbar_separator" role="separator"></span><a id="cke_92" class="cke_button cke_button__blockquote cke_button_off" href="javascript:void('Block Quote')" title="Block Quote" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_92_label" aria-describedby="cke_92_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(136,event);" onfocus="return CKEDITOR.tools.callFunction(137,event);" onclick="CKEDITOR.tools.callFunction(138,this);return false;"><span class="cke_button_icon cke_button__blockquote_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -216px;background-size:auto;">&nbsp;</span><span id="cke_92_label" class="cke_button_label cke_button__blockquote_label" aria-hidden="false">Block Quote</span><span id="cke_92_description" class="cke_button_label" aria-hidden="false"></span></a><span class="cke_toolbar_separator" role="separator"></span><a id="cke_93" class="cke_button cke_button__justifyleft cke_button_off" href="javascript:void('Align Left')" title="Align Left" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_93_label" aria-describedby="cke_93_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(139,event);" onfocus="return CKEDITOR.tools.callFunction(140,event);" onclick="CKEDITOR.tools.callFunction(141,this);return false;"><span class="cke_button_icon cke_button__justifyleft_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -1080px;background-size:auto;">&nbsp;</span><span id="cke_93_label" class="cke_button_label cke_button__justifyleft_label" aria-hidden="false">Align Left</span><span id="cke_93_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_94" class="cke_button cke_button__justifycenter cke_button_off" href="javascript:void('Center')" title="Center" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_94_label" aria-describedby="cke_94_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(142,event);" onfocus="return CKEDITOR.tools.callFunction(143,event);" onclick="CKEDITOR.tools.callFunction(144,this);return false;"><span class="cke_button_icon cke_button__justifycenter_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -1056px;background-size:auto;">&nbsp;</span><span id="cke_94_label" class="cke_button_label cke_button__justifycenter_label" aria-hidden="false">Center</span><span id="cke_94_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_95" class="cke_button cke_button__justifyright cke_button_off" href="javascript:void('Align Right')" title="Align Right" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_95_label" aria-describedby="cke_95_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(145,event);" onfocus="return CKEDITOR.tools.callFunction(146,event);" onclick="CKEDITOR.tools.callFunction(147,this);return false;"><span class="cke_button_icon cke_button__justifyright_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -1104px;background-size:auto;">&nbsp;</span><span id="cke_95_label" class="cke_button_label cke_button__justifyright_label" aria-hidden="false">Align Right</span><span id="cke_95_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_96" class="cke_button cke_button__justifyblock cke_button_off" href="javascript:void('Justify')" title="Justify" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_96_label" aria-describedby="cke_96_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(148,event);" onfocus="return CKEDITOR.tools.callFunction(149,event);" onclick="CKEDITOR.tools.callFunction(150,this);return false;"><span class="cke_button_icon cke_button__justifyblock_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -1032px;background-size:auto;">&nbsp;</span><span id="cke_96_label" class="cke_button_label cke_button__justifyblock_label" aria-hidden="false">Justify</span><span id="cke_96_description" class="cke_button_label" aria-hidden="false"></span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_97" class="cke_toolbar" aria-labelledby="cke_97_label" role="toolbar"><span id="cke_97_label" class="cke_voice_label">Links</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_98" class="cke_button cke_button__link cke_button_off" href="javascript:void('Link')" title="Link (Ctrl+L)" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_98_label" aria-describedby="cke_98_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(151,event);" onfocus="return CKEDITOR.tools.callFunction(152,event);" onclick="CKEDITOR.tools.callFunction(153,this);return false;"><span class="cke_button_icon cke_button__link_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -1200px;background-size:auto;">&nbsp;</span><span id="cke_98_label" class="cke_button_label cke_button__link_label" aria-hidden="false">Link</span><span id="cke_98_description" class="cke_button_label" aria-hidden="false">Keyboard shortcut Ctrl+L</span></a><a id="cke_99" class="cke_button cke_button__unlink cke_button_disabled " href="javascript:void('Unlink')" title="Unlink" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_99_label" aria-describedby="cke_99_description" aria-haspopup="false" aria-disabled="true" onkeydown="return CKEDITOR.tools.callFunction(154,event);" onfocus="return CKEDITOR.tools.callFunction(155,event);" onclick="CKEDITOR.tools.callFunction(156,this);return false;"><span class="cke_button_icon cke_button__unlink_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -1224px;background-size:auto;">&nbsp;</span><span id="cke_99_label" class="cke_button_label cke_button__unlink_label" aria-hidden="false">Unlink</span><span id="cke_99_description" class="cke_button_label" aria-hidden="false"></span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_100" class="cke_toolbar cke_toolbar_last" aria-labelledby="cke_100_label" role="toolbar"><span id="cke_100_label" class="cke_voice_label">Insert</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_101" class="cke_button cke_button__image cke_button_off" href="javascript:void('Image')" title="Image" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_101_label" aria-describedby="cke_101_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(157,event);" onfocus="return CKEDITOR.tools.callFunction(158,event);" onclick="CKEDITOR.tools.callFunction(159,this);return false;"><span class="cke_button_icon cke_button__image_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -912px;background-size:auto;">&nbsp;</span><span id="cke_101_label" class="cke_button_label cke_button__image_label" aria-hidden="false">Image</span><span id="cke_101_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_102" class="cke_button cke_button__table cke_button_off" href="javascript:void('Table')" title="Table" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_102_label" aria-describedby="cke_102_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(160,event);" onfocus="return CKEDITOR.tools.callFunction(161,event);" onclick="CKEDITOR.tools.callFunction(162,this);return false;"><span class="cke_button_icon cke_button__table_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -1872px;background-size:auto;">&nbsp;</span><span id="cke_102_label" class="cke_button_label cke_button__table_label" aria-hidden="false">Table</span><span id="cke_102_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_103" class="cke_button cke_button__horizontalrule cke_button_off" href="javascript:void('Insert Horizontal Line')" title="Insert Horizontal Line" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_103_label" aria-describedby="cke_103_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(163,event);" onfocus="return CKEDITOR.tools.callFunction(164,event);" onclick="CKEDITOR.tools.callFunction(165,this);return false;"><span class="cke_button_icon cke_button__horizontalrule_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -864px;background-size:auto;">&nbsp;</span><span id="cke_103_label" class="cke_button_label cke_button__horizontalrule_label" aria-hidden="false">Insert Horizontal Line</span><span id="cke_103_description" class="cke_button_label" aria-hidden="false"></span></a></span><span class="cke_toolbar_end"></span></span><span class="cke_toolbar_break"></span><span id="cke_104" class="cke_toolbar" aria-labelledby="cke_104_label" role="toolbar"><span id="cke_104_label" class="cke_voice_label">Styles</span><span class="cke_toolbar_start"></span><span id="cke_72" class="cke_combo cke_combo__fontsize cke_combo_off" role="presentation"><span id="cke_72_label" class="cke_combo_label">Size</span><a class="cke_combo_button" title="Font Size" tabindex="-1" href="javascript:void('Font Size')" hidefocus="true" role="button" aria-labelledby="cke_72_label" aria-haspopup="true" onkeydown="return CKEDITOR.tools.callFunction(167,event,this);" onfocus="return CKEDITOR.tools.callFunction(168,event);" onclick="CKEDITOR.tools.callFunction(166,this);return false;"><span id="cke_72_text" class="cke_combo_text cke_combo_inlinelabel">Size</span><span class="cke_combo_open"><span class="cke_combo_arrow"></span></span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_105" class="cke_toolbar" aria-labelledby="cke_105_label" role="toolbar"><span id="cke_105_label" class="cke_voice_label">Colors</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_106" class="cke_button cke_button__textcolor cke_button_off" href="javascript:void('Text Color')" title="Text Color" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_106_label" aria-describedby="cke_106_description" aria-haspopup="true" onkeydown="return CKEDITOR.tools.callFunction(169,event);" onfocus="return CKEDITOR.tools.callFunction(170,event);" onclick="CKEDITOR.tools.callFunction(171,this);return false;"><span class="cke_button_icon cke_button__textcolor_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -408px;background-size:auto;">&nbsp;</span><span id="cke_106_label" class="cke_button_label cke_button__textcolor_label" aria-hidden="false">Text Color</span><span id="cke_106_description" class="cke_button_label" aria-hidden="false"></span><span class="cke_button_arrow"></span></a><a id="cke_107" class="cke_button cke_button__bgcolor cke_button_off" href="javascript:void('Background Color')" title="Background Color" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_107_label" aria-describedby="cke_107_description" aria-haspopup="true" onkeydown="return CKEDITOR.tools.callFunction(172,event);" onfocus="return CKEDITOR.tools.callFunction(173,event);" onclick="CKEDITOR.tools.callFunction(174,this);return false;"><span class="cke_button_icon cke_button__bgcolor_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -384px;background-size:auto;">&nbsp;</span><span id="cke_107_label" class="cke_button_label cke_button__bgcolor_label" aria-hidden="false">Background Color</span><span id="cke_107_description" class="cke_button_label" aria-hidden="false"></span><span class="cke_button_arrow"></span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_108" class="cke_toolbar" aria-labelledby="cke_108_label" role="toolbar"><span id="cke_108_label" class="cke_voice_label">Tools</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><a id="cke_109" class="cke_button cke_button__maximize cke_button_off" href="javascript:void('Maximize')" title="Maximize" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_109_label" aria-describedby="cke_109_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(175,event);" onfocus="return CKEDITOR.tools.callFunction(176,event);" onclick="CKEDITOR.tools.callFunction(177,this);return false;"><span class="cke_button_icon cke_button__maximize_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -1344px;background-size:auto;">&nbsp;</span><span id="cke_109_label" class="cke_button_label cke_button__maximize_label" aria-hidden="false">Maximize</span><span id="cke_109_description" class="cke_button_label" aria-hidden="false"></span></a><a id="cke_110" class="cke_button cke_button__showblocks cke_button_off" href="javascript:void('Show Blocks')" title="Show Blocks" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_110_label" aria-describedby="cke_110_description" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(178,event);" onfocus="return CKEDITOR.tools.callFunction(179,event);" onclick="CKEDITOR.tools.callFunction(180,this);return false;"><span class="cke_button_icon cke_button__showblocks_icon" style="background-image:url('https://m4trix.network/Reporting-platform/assets/plugins/ckeditor/plugins/icons.png?t=I5C6');background-position:0 -1752px;background-size:auto;">&nbsp;</span><span id="cke_110_label" class="cke_button_label cke_button__showblocks_label" aria-hidden="false">Show Blocks</span><span id="cke_110_description" class="cke_button_label" aria-hidden="false"></span></a></span><span class="cke_toolbar_end"></span></span></span></span><div id="cke_2_contents" class="cke_contents cke_reset" role="presentation" style="height: 200px;"><span id="cke_114" class="cke_voice_label">Press ALT 0 for help</span><iframe src="" frameborder="0" class="cke_wysiwyg_frame cke_reset" title="Rich Text Editor, traffic_sources_content" aria-describedby="cke_114" tabindex="0" allowtransparency="true" style="width: 100%; height: 100%;"></iframe></div><span id="cke_2_bottom" class="cke_bottom cke_reset_all" role="presentation" style="user-select: none;"><span id="cke_2_resizer" class="cke_resizer cke_resizer_vertical cke_resizer_ltr" title="Resize" onmousedown="CKEDITOR.tools.callFunction(93, event)">◢</span><span id="cke_2_path_label" class="cke_voice_label">Elements path</span><span id="cke_2_path" class="cke_path" role="group" aria-labelledby="cke_2_path_label"><span class="cke_path_empty">&nbsp;</span></span></span></div></div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="submit_traffic_sources btn btn-primary btn-cons" value="submit">
                    </div>
                </div>
            </div>
        </div>

        
    </div>
</div>

<script src="/assets/plugins/jquery-sparkline/jquery-sparkline.min.js"></script>
<script src="/assets/plugins/jquery-easy-pie-chart/js/jquery.easypiechart.min.js"></script>
<script src="/assets/plugins/jquery-flot/jquery.flot.js"></script>
<script src="/assets/plugins/jquery-flot/jquery.flot.time.min.js"></script>
<script src="/assets/plugins/jquery-flot/jquery.flot.selection.min.js"></script>
<script src="/assets/plugins/jquery-flot/jquery.flot.animator.min.js"></script>
<script src="/assets/plugins/jquery-flot/jquery.flot.orderBars.js"></script>
<script src="/js/functions.js?v=0.1"></script>
<script src="/js/graphics.js?v=0.1"></script>
<script src="/js/intelligence.js?v=0.2"></script>

<script type="text/javascript">
	var top_3_intl = {"main_data":{"2024-01-01":{"ClearView":19.9017199017199,"MaxPhone":17.444717444717444,"WIFI UltraBoost":5.405405405405405},"2024-02-01":{"TVShareMax":26.99724517906336,"MaxPhone":19.28374655647383,"ClearView":13.49862258953168},"2024-03-01":{"CoolEdge":25,"MaxPhone":25,"Tactic AIR Drone":10.576923076923077}},"start_date":"2023-12-15","end_date":"2024-03-15"};
	var new_offers = {"2024-03-05 18:02:50":{"offer_name":"E-commerce - PostureRemind Pro INTL - All Languages - EXCLUSIVE","release_date":"2024-03-05 18:02:50","payout":"$65","link_preview":"https:\/\/popularhitech.com\/intl\/?prod=postureremindpro&net={NETWORK}&aff={AFFID}&sid={SUBID}&cid={CLICKID}","name":"PostureRemind Pro"},"2024-01-23 16:02:35":{"offer_name":"E-commerce - KneeBoost Pro INTL - All Languages - EXCLUSIVE","release_date":"2024-01-23 16:02:35","payout":"$28","link_preview":"https:\/\/popularhitech.com\/intl\/?prod=kneeboostpro&net={NETWORK}&aff={AFFID}&sid={SUBID}&cid={CLICKID}","name":"KneeBoost Pro"},"2023-11-15 14:46:02":{"offer_name":"E-commerce - CozyTime Pro INTL - All Languages - EXCLUSIVE","release_date":"2023-11-15 14:46:02","payout":"$40","link_preview":"https:\/\/popularhitech.com\/intl\/?prod=cozytimepro&net={NETWORK}&aff={AFFID}&sid={SUBID}&cid={CLICKID}","name":"CozyTime Pro"}};

	intelligence.intelligence_top_3_offers(top_3_intl);
	intelligence.intelligence_new_offers(new_offers);
</script>