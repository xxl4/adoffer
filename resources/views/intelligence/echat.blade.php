<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
{{--<script src="//cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>--}}
{{--<script src="https://cdn.bootcss.com/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"></script>--}}


{{--<script src="https://lib.h-ui.net/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script>--}}


{{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}


{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>--}}
{{--<script src="/vendor/laravel-admin/test/bootstrap-datepicker.js"></script>--}}
{{--<script src="/vendor/laravel-admin/test/datepicker.css"></script>--}}

<style>
    table {
        width: 50%;
        border-collapse: collapse;
        margin: 5px;
        overflow-y: auto;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .progress-bar {
        height: 5px;
        background-color: #f1f1f1;
        margin-top: 5px;
    }

    .progress-bar-fill {
        height: 100%;
        width: 50%; /* 初始进度为50% */
        background-color: #4caf50; /* 进度条颜色 */
    }
</style>


<div class="container" style="margin-left: 15px;width: 1680px;">
    <div class="grid-title no-border">
        <h4>
            <span class="semi-bold">Top Offers</span>
        </h4>
        <div class="tools">
            <a href="javascript:;" class="collapse"></a>
            <a href="javascript:;" class="remove"></a>
        </div>
    </div>
    <h4><span class="semi-bold">Top 3 Offers filtered per date and geos</span></h4>

    <p>This section allows you to view and analyse the top 3 offers distribution per any selected date and country.</p>


    <div class='col-md-5' style="width: 15%;margin-top: 15px">
        <div class="form-group">
            <div class="container mt-5">
                <div class="col-sm-4" style="width: 20%!important;">
                    <select id="geos" name="usertype" class="selectpicker show-tick form-control"
                            multiple
                            data-max-options="3"
                            data-live-search="true" data-none-selected-text="Select Offers Geos"
                            data-size="10">
                        @foreach ($category_lis as $key=>$item)
                            <option value="{{$item['id']}}"
                                    data-content="<span class='label label-success'>{{$item['country']}}</span>">{{$item['country']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class='col-md-5' style="width: 20%;margin-top: 15px">
        <div class="form-group">
            <div class='input-group date' id='datetimepicker6'>
                <input type='text' class="form-control" id="datetimepicker5"/>
                <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
            </span>
            </div>
        </div>
    </div>

    <div class='col-md-5' style="width: 20%;margin-top: 15px">
        <div class="form-group">
            <div class='input-group date' id='datetimepicker7'>
                <input type='text' class="form-control" id="datetimepicker8"/>
                <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
            </span>
            </div>
        </div>
    </div>
    {{--    <button id="searchBtn" class="btn btn-primary">搜索</button>--}}

    <div class='col-md-5' style="width: 20%;display: block">
        <button id="searchBtn" class="btn btn-primary" style="margin-top: 15px;">搜索</button>
    </div>


    <br><br><br><br>
    <div class="col-md-12">
        <div class="grid simple">
            <div class="grid-body no-border">
                <div class="row" style="margin-left: 15px;margin-right: 15px;!important;">
                    <div class="col-md-4" style="width: 30%">
                        {{--                                    <div id="myPieChart" class="col-md-12"></div>--}}


                        <canvas id="myPieChart" style="width: 484px;height:233px;"></canvas>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-8">
                        <table class="table no-more-tables offer_table" style="border:1px #000 solid; border-top:0;">
                            <thead>
                            <tr>
                                <th style="width:40%" class="text-center">Offer</th>
                                <th style="width:5%" class="text-center">Percentage</th>
                                <th style="width:20%">Distribution</th>
                            </tr>
                            </thead>
                            <tbody id="html_data">
                            @foreach ($offer_count as $key=>$item)

                                <tr>
                                    <td class="text-center">{{$item['offer_top']}}</td>
                                    <td class="text-center">{{$item['offer_percent']}}</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="30"
                                                 aria-valuemin="0"
                                                 aria-valuemax="100"
                                                 style="width: {{$item['offer_percent']}};background-color: #0090d9"></div>
                                        </div>
                                        {{--                                                    <span class="percentage">{{$item['offer_percent']}}</span>--}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--                </div>--}}

    <br>
    <hr>
    <br>
{{--    <script type="text/javascript">--}}
{{--        $(function () {--}}
{{--            $('#datetimepicker6').datetimepicker();--}}
{{--            $('#datetimepicker7').datetimepicker({--}}


{{--                useCurrent: false //Important! See issue #1075--}}
{{--            });--}}
{{--            $("#datetimepicker6").on("dp.change", function (e) {--}}

{{--                $('#datetimepicker7').data("DateTimePicker").minDate(e.date);--}}
{{--            });--}}
{{--            $("#datetimepicker7").on("dp.change", function (e) {--}}

{{--                $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}


    {{--<div class="card">--}}
    {{--    <div class="card-header">--}}
    {{--        <h4>1234556</h4>--}}
    {{--    </div>--}}
    {{--    <div class="card-body">--}}
    {{--        <canvas id="visitors-chart"></canvas>--}}
    {{--    </div>--}}
    {{--</div>--}}

    <!--
<div class="card">
{{--    <div class="card-body">--}}
    {{--        <canvas id="myPieChart" width="200" height="200"></canvas>--}}
    {{--    </div>--}}


    <table class="table table-bordered">
        <thead>
        <tr>
            <th class="text-center">OFFER</th>
            <th class="text-center">PERCENTAGE</th>
            <th class="text-center">DISTRIBUTION</th>
        </tr>
        </thead>


        <tbody id="html_data">
{{--        @foreach ($offer_count as $key=>$item)--}}

    <tr>
{{--                <td class="text-center">{{$item['offer_top']}}</td>--}}
    {{--                <td class="text-center">{{$item['offer_percent']}}</td>--}}
    <td>
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="30" aria-valuemin="0"
                 aria-valuemax="100"
{{--             style="width: {{$item['offer_percent']}};background-color: #0090d9"></div>--}}
    </div>
{{--                    <span class="percentage">{{$item['offer_percent']}}</span>--}}
    </td>
    </tr>
{{--        @endforeach--}}
    </tbody>
    </table>
    </div>
-->
    <br><br><br><br>

    {{--<div class="container">--}}
    {{--    <div class='col-md-5'>--}}
    {{--        <div class="form-group">--}}
    {{--            <div class="container mt-5">--}}
    {{--                <div class="col-sm-4" style="width: 20%!important;">--}}
    {{--                    <select id="country" name="usertype" class="selectpicker show-tick form-control" multiple--}}
    {{--                            data-max-options="3"--}}
    {{--                            data-live-search="true" data-none-selected-text="Select Offers Geos" data-size="10">--}}
    {{--                        @foreach ($category_lis as $key=>$item)--}}
    {{--                            <option value="{{$item['id']}}"--}}
    {{--                                    data-content="<span class='label label-success'>{{$item['country']}}</span>">{{$item['country']}}</option>--}}
    {{--                        @endforeach--}}
    {{--                    </select>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <hr>


    {{--</div>--}}
    {{--<div class="container">--}}
    {{--    <div class='col-md-5' style="width: 20%">--}}
    {{--        <div class="form-group">--}}
    {{--            <div class='input-group date' id='datetimepicker1'>--}}
    {{--                <input type='text' class="form-control" id="datetimepicker3"/>--}}
    {{--                <span class="input-group-addon">--}}
    {{--            <span class="glyphicon glyphicon-calendar"></span>--}}
    {{--            </span>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    {{--    <div class='col-md-5' style="width: 20%">--}}
    {{--        <div class="form-group">--}}
    {{--            <div class='input-group date' id='datetimepicker2'>--}}
    {{--                <input type='text' class="form-control" id="datetimepicker4"/>--}}
    {{--                <span class="input-group-addon">--}}
    {{--            <span class="glyphicon glyphicon-calendar"></span>--}}
    {{--            </span>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}


    {{--    <button id="countrySearchBtn" class="btn btn-primary">搜索</button>--}}


    {{--</div>--}}


{{--    <script type="text/javascript">--}}
{{--        $(function () {--}}
{{--            $('#datetimepicker1').datetimepicker();--}}
{{--            $('#datetimepicker2').datetimepicker({--}}
{{--                useCurrent: false //Important! See issue #1075--}}
{{--            });--}}
{{--            $("#datetimepicker1").on("dp.change", function (e) {--}}
{{--                $('#datetimepicker2').data("DateTimePicker").minDate(e.date);--}}
{{--            });--}}
{{--            $("#datetimepicker2").on("dp.change", function (e) {--}}
{{--                $('#datetimepicker1').data("DateTimePicker").maxDate(e.date);--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}


    <div class="col-md-12" style="margin-top: 30px">
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
                <p>This section allows you to view and analyse the top 10 countries distribution per any selected date
                    and offer.</p>


                <div class='col-md-5' style="width: 15%;margin-top: 30px;">
                    <div class="form-group">
                        <div class="container mt-5">
                            <div class="col-sm-4" style="width: 20%!important;">
                                <select id="country" name="usertype" class="selectpicker show-tick form-control"
                                        multiple
                                        data-max-options="3"
                                        data-live-search="true" data-none-selected-text="Select Offers Geos"
                                        data-size="10">
                                    @foreach ($category_lis as $key=>$item)
                                        <option value="{{$item['id']}}"
                                                data-content="<span class='label label-success'>{{$item['country']}}</span>">{{$item['country']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>


                <div class='col-md-5' style="width: 20%;margin-top: 30px;">
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='text' class="form-control" id="datetimepicker3"/>
                            <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
            </span>
                        </div>
                    </div>
                </div>

                <div class='col-md-5' style="width: 20%;margin-top: 30px;">
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker2'>
                            <input type='text' class="form-control" id="datetimepicker4"/>
                            <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
            </span>
                        </div>
                    </div>
                </div>

                <div class='col-md-5' style="width: 20%;display: block">
                    <button id="countrySearchBtn" class="btn btn-primary" style="margin-top: 30px;">搜索</button>
                </div>


                <div class="col-md-12">
                    <div class="grid simple">
                        <div class="grid-body no-border">
                            <div class="row" style="margin-left: 15px;margin-right: 15px;!important;">
                                <div class="col-md-4" style="width: 30%">
                                    {{--                                    <div id="myPieChart" class="col-md-12"></div>--}}


                                    <canvas id="myCountryPieChart" style="width: 484px;height:233px;"></canvas>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-8">
                                    <table class="table no-more-tables offer_table"
                                           style="border:1px #000 solid; border-top:0;">
                                        <thead>
                                        <tr>
                                            <th style="width:40%" class="text-center">Offer</th>
                                            <th style="width:5%" class="text-center">Percentage</th>
                                            <th style="width:20%">Distribution</th>
                                        </tr>
                                        </thead>
                                        <tbody id="html_data_country">
                                        @foreach ($country_count as $key=>$item)

                                            <tr>
                                                <td class="text-center">{{$item['country_top']}}</td>
                                                <td class="text-center">{{$item['country_percent']}}</td>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" aria-valuenow="30"
                                                             aria-valuemin="0"
                                                             aria-valuemax="100"
                                                             style="width: {{$item['country_percent']}};background-color: #0090d9"></div>
                                                    </div>

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-12">
        <div class="grid simple">
            <div class="grid-title no-border">
                <h4>Monthly <span class="semi-bold">Top 3 Offers</span></h4>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="javascript:;" class="remove"></a>
                </div>
            </div>
            <div class="grid-body no-border">
                <h4>Monthly Progression Of The Top 3 Chart</h4>
                <p>This section gives you a high level view on the top 3 offers evolution across the current year.</p>
                <br>
                <div class="row">
                    <div class="col-xs-12">
                        <canvas id="myBarChart" style="height: 100px;width: 400px!important;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="col-md-6">
    <div class="grid simple">
        <div class="grid-title no-border">
            <h4>New Offers <span class="semi-bold"></span></h4>
            <div class="tools">
                <a href="javascript:;" class="collapse"></a>
                <a href="javascript:;" class="remove"></a>
            </div>
        </div>
        <div class="grid-body no-border">
            <h4>Last Released Offers</h4>
            <p>This section display the last 3 offers added to the M4TRIX, jump in fast to profit from the first mover
                advantage. The early bird catches the worm.
            </p>
            <br>
            <div class="row">
                <div class="col-xs-12 ">
                    <table class="table table-striped table-flip-scroll cf">
                        <thead class="cf">
                        <tr>
                            <th class="text-center">Offer</th>
                            <th class="text-center">Release Date</th>
                            <th class="text-center">Payout</th>
                        </tr>
                        </thead>
                        <tbody class="new_offers">

                        @foreach ($offer_list as $key=>$item)

                            <tr>
                                <td class="text-center">{{$item['offer_name']}}</td>
                                <td class="text-center">{{$item['created_at']}}</td>
                                <td class="text-center">${{$item['offer_price']}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>


<script>

    var frontendData = @json($data);
    $(function () {
        $.get('/admin/intelligence/echat', function (e) {
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

                console.log('123', datasetsData[i])

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
                    datasets: datasets
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
                    backgroundColor: ['red', 'blue', 'green', 'yellow'],
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


        $("#searchBtn").click(function () {
            //动作触发后执行都代码
            var start_date = $("#datetimepicker5").val();
            var end_date = $("#datetimepicker8").val();
            var country = $("#geos").val();

            // 发送 AJAX 请求
            function updateOfferChartData() {

                $.ajax({
                    url: '/admin/intelligence/offerPie',
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
                    backgroundColor: generateRandomColors(10),
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


        $("#countrySearchBtn").click(function () {
            //动作触发后执行都代码
            var start_date = $("#datetimepicker3").val();
            var end_date = $("#datetimepicker4").val();
            var country = $("#country").val();

            // 发送 AJAX 请求
            function updateCountryChartData() {
                $.ajax({
                    url: '/admin/intelligence/countryPie',
                    method: 'GET',
                    dataType: 'json',
                    data: {start_date: start_date, end_date: end_date, country: country},
                    success: function (data) {

                        var res = data.data.offer_sale;
                        console.log('国家排行', res.country);

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


