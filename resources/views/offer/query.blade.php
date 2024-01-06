
    <form method="POST" id="form_id">


    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}"/>
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
                                            <li><a href="#tab0Tracking_<?php echo $key;?>" role="tab" data-toggle="tab">Tracking Links</a></li>
                                            <li><a href="#tab0Creative_<?php echo $key;?>" role="tab" data-toggle="tab">Creatives</a></li>
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
                                                                        </div>
                                                                    </div>
                                                                </div>


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

                                            <div class="tab-pane" id="tab0Creative_<?php echo $key;?>">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        @foreach ($item['creatives'] as $k1=>$i1)
                                                        <p></p><p>{{$i1['name']}}</p>
                                        <p><a href="https://www.dropbox.com/scl/fo/fyoovooys02dhqnd4tcy3/h?rlkey=1jyre8331r9m5y723ztcudped&amp;dl=0" target="_blank">{{$i1['link']}}</a></p>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   @endforeach
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>





