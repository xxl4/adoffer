<style>
    .skin-black .content-header {
        display: none;
    }
</style>


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


<!--	<script src="assets/plugins/bootstrapv3/js/bootstrap.min.js" type="text/javascript"></script>-->


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



<input hidden class="for_relogin" type="text" name="user_login_name" value="jun">
<input hidden class="for_relogin" type="text" name="user_login_email" value="nzueom@hotmail.com">
<input hidden class="for_relogin" type="text" name="user_login_logo" value="defoult.jpg">


<script>var switch_theme = 0;</script>
<link href="/css/network.css?v=0.1" rel="stylesheet" type="text/css" />
	<script type="text/javascript">
		var current_network ='6546';	</script>


        <div class="col-md-12">
            <div class="row">
                <div class="grid simple">
                    <div class="grid-title no-border offer">
                        <div class="col-md-6 col-lg-3">
                            <select class="select2_category select2-hidden-accessible" name="offer_category" id="offer_category" multiple="" tabindex="-1" aria-hidden="true">


{{--                                --}}
{{--                                <option value="1">Top Offers</option>--}}
{{--                                <option value="2">High Payout</option>--}}
{{--                                <option value="3">Cool Tech Gadgets</option>--}}
{{--                                <option value="4">Drone</option>--}}
{{--                                <option value="5">Smartphone</option>--}}
{{--                                <option value="6">Smart Home</option>--}}
{{--                                <option value="7">Sound</option>--}}
{{--                                <option value="8">Well-Being</option>--}}
{{--                                <option value="9">Snoring Aid</option>--}}
{{--                                <option value="10">Sleeping Aid</option>--}}
{{--                                <option value="11">Fitness</option>--}}
{{--                                <option value="12">Dental Care</option>--}}
{{--                                <option value="13">Mosquito Repellent</option>--}}
{{--                                <option value="14">Tactical Gear</option>--}}



                                @foreach ($data['category_list'] as $key=>$item)
                                    <option value="{{$item['id']}}">{{$item['category_name']}}</option>
                                @endforeach



                            </select>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <select class="select2_geos select2-hidden-accessible" name="offer_geos" id="offer_geos" multiple="" tabindex="-1" aria-hidden="true">

                                @foreach ($data['geos_list'] as $key=>$item)
                                    <option value="{{$item['country']}}">{{$item['country']}}</option>
                                @endforeach

                                <!--
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Angola">Angola</option>
                                <option value="Anguilla">Anguilla</option>
                                <option value="Antigua and Barbuda">Antigua and Barbuda</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Aruba">Aruba</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Azerbaijan">Azerbaijan</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Belgium">Belgium</option><option value="Benin">Benin</option><option value="Bermuda">Bermuda</option><option value="Bhutan">Bhutan</option><option value="Brazil">Brazil</option><option value="British">British</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Cameroon">Cameroon</option><option value="Canada">Canada</option><option value="Cayman Islands">Cayman Islands</option><option value="Chad">Chad</option><option value="Chile">Chile</option><option value="China">China</option><option value="Christmas Island">Christmas Island</option><option value="Colombia">Colombia</option><option value="Comoros">Comoros</option><option value="Costa Rica">Costa Rica</option><option value="Croatia">Croatia</option><option value="Cyprus">Cyprus</option><option value="Czech Republic">Czech Republic</option><option value="Denmark">Denmark</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Egypt">Egypt</option><option value="El Salvador">El Salvador</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Estonia">Estonia</option><option value="Ethiopia">Ethiopia</option><option value="Falkland Islands">Falkland Islands</option><option value="Faroe Islands">Faroe Islands</option><option value="Finland">Finland</option><option value="France">France</option><option value="French Guiana">French Guiana</option><option value="Gabon">Gabon</option><option value="Gambia">Gambia</option><option value="Georgia">Georgia</option><option value="Germany">Germany</option><option value="Ghana">Ghana</option><option value="Gibraltar">Gibraltar</option><option value="Greece">Greece</option><option value="Greenland">Greenland</option><option value="Grenada">Grenada</option><option value="Guadeloupe">Guadeloupe</option><option value="Guam">Guam</option><option value="Guatemala">Guatemala</option><option value="Guernsey">Guernsey</option><option value="Guinea">Guinea</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Hong Kong">Hong Kong</option><option value="Hungary">Hungary</option><option value="Iceland">Iceland</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Ireland">Ireland</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Jersey">Jersey</option><option value="Jordan">Jordan</option><option value="Kazakhstan">Kazakhstan</option><option value="Kyrgyzstan">Kyrgyzstan</option><option value="Laos">Laos</option><option value="Latvia">Latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option><option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Macau">Macau</option><option value="Macedonia">Macedonia</option><option value="Madagascar">Madagascar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldives">Maldives</option><option value="Malta">Malta</option><option value="Marshall Islands">Marshall Islands</option><option value="Martinique">Martinique</option><option value="Mayotte">Mayotte</option><option value="Mexico">Mexico</option><option value="Monaco">Monaco</option><option value="Montserrat">Montserrat</option><option value="Mozambique">Mozambique</option><option value="Namibia">Namibia</option><option value="Nepal">Nepal</option><option value="Netherlands">Netherlands</option><option value="New Caledonia">New Caledonia</option><option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nigeria">Nigeria</option><option value="Norway">Norway</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option><option value="Palau">Palau</option><option value="Palestine">Palestine</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Puerto Rico">Puerto Rico</option><option value="Qatar">Qatar</option><option value="Reunion">Reunion</option><option value="Romania">Romania</option><option value="Rwanda">Rwanda</option><option value="San Marino">San Marino</option><option value="Saudi Arabia">Saudi Arabia</option><option value="Senegal">Senegal</option><option value="Singapore">Singapore</option><option value="Sint Maarten">Sint Maarten</option><option value="Slovakia">Slovakia</option><option value="Slovenia">Slovenia</option><option value="South Africa">South Africa</option><option value="South Korea">South Korea</option><option value="Spain">Spain</option><option value="St. Pierre and Miquelon">St. Pierre and Miquelon</option><option value="St. Vincent and Grenadines">St. Vincent and Grenadines</option><option value="Suriname">Suriname</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Taiwan">Taiwan</option><option value="Tajikistan">Tajikistan</option><option value="Tanzania">Tanzania</option><option value="Thailand">Thailand</option><option value="Togo">Togo</option><option value="Turkey">Turkey</option><option value="Turks And Caicos Islands">Turks And Caicos Islands</option><option value="Uganda">Uganda</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom">United Kingdom</option><option value="United States">United States</option><option value="Uruguay">Uruguay</option><option value="Uzbekistan">Uzbekistan</option>
                                <option value="Vatican">Vatican</option><option value="Vietnam">Vietnam</option>
                                <option value="Western Samoa">Western Samoa</option><option value="Zambia">Zambia</option>

                                -->

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
                                    background-position: 20px 0px;}					</style>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <select class="select2_offer_sort select2-hidden-accessible" style="margin: 2px;" name="offer_sort" id="offer_sort" tabindex="-1" aria-hidden="true">
                            <option value=""></option>
                            <option value="dateNewest">Release Date (Newest on Top)</option>
                            <option value="dateOldest">Release Date (Oldest on Top)</option>
                            <option value="payoutHigh">Payout (High to Low)</option>
                            <option value="payoutLow">Payout (Low to High)</option>
                        </select>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="has-feedback">
                            <input type="text" id="search_field" style="width: 100%; padding-left: 10px;" class="search_field" name="" placeholder="Keyword Search">
                        </div>
                    </div>
                    <div class="row"></div>
                </div>
            </div>
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



                            </div>
                        </div>
                    </div>


                    <div class="col-mlg-6">
                        <div class="row">
                            <!--内容开始-->
                            <div class="categories_offer_right"></div>
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

    <script src="/js/js_offer_top_geos.js?v=0.1"></script>
	<script src="/js/offer.js?v=0.3"></script>


            <script>
	$.fn.select2.amd.require(['select2/selection/search'], function (Search) {
		var oldRemoveChoice = Search.prototype.searchRemoveChoice;

		Search.prototype.searchRemoveChoice = function () {
			oldRemoveChoice.apply(this, arguments);
			this.$search.val('');
		};

		function formatState (state) {
			if(state.text != 'Searching…'){
				var country_falg = $('<span style="background-image: url(images/flags/'+state.text.replace(/ /g,'-')+'-Flag.png); margin-right: 5px; display:inline-block; background-size:25px; background-repeat: no-repeat; width:25px;height:25px; vertical-align: middle;"></span><span style="vertical-align: middle; display:inline-block;">'+state.text+'</span>');
				return country_falg;
			}else{
				return state.text;
			}
		};

		$(".select2_category").select2({
			placeholder: "Select Offers Categories",
		});
		$(".select2_offer_sort").select2({
			placeholder: "Order By",
		});
		$(".select2_geos").select2({
			placeholder: "Select Offers Geos",
			templateResult: formatState,
		});
	});
</script>

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






        </div>



<script type="text/javascript">
    $(function() {
        $('[title="clickable_optgroup"]').addClass('chosen-container-optgroup-clickable');
    });
    $(document).on('click', '[title="clickable_optgroup"] .group-result', function() {
        var unselected = $(this).nextUntil('.group-result').not('.result-selected');
        if(unselected.length) {
            unselected.trigger('mouseup');
        } else {
            $(this).nextUntil('.group-result').each(function() {
                $('a.search-choice-close[data-option-array-index="' + $(this).data('option-array-index') + '"]').trigger('click');
            });
        }
    });
</script>

<script >
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

    typingLoader.style.display = 'none';
    greetingMsg.style.display = 'none';

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
                        messageElementWrapper.innerHTML = `<div class="user-profile">
                            <img src="images/morpheus.jpg" alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35">
                        </div>`;
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

<script>



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


    // $(document).ready(function () {
    //     // 初始化 Clipboard.js
    //     var clipboard = new ClipboardJS('.copy-button');
    //     // 处理复制成功事件
    //     clipboard.on('success', function (e) {
    //         alert('复制成功!');
    //         e.clearSelection(); // 清除选定文本
    //     });
    //     // 处理复制失败事件
    //     clipboard.on('error', function (e) {
    //         alert('Copy failed. Please try again.');
    //     });
    // });
    //
    //
    // $(document).ready(function () {
    //     // 初始化 Clipboard.js
    //     var clipboard = new ClipboardJS('.copy-button2');
    //     // 处理复制成功事件
    //     clipboard.on('success', function (e) {
    //         alert('复制成功1!');
    //         e.clearSelection(); // 清除选定文本
    //     });
    //
    //     // 处理复制失败事件
    //     clipboard.on('error', function (e) {
    //         alert('Copy failed. Please try again.');
    //     });
    // });

    $('#searchBtn').click(function (e) {

        e.preventDefault();
        var formData = $('#form_id').serialize();
        var keyword = $('#keyword').val();
        var _token = $('#_token').val();
        var category = $('.category').val();
        var geos = $('.geos').val();
        var sort = $('.sort').val();

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
