<?php

namespace App\Http\Controllers;

use app\admin\model\Admin;
use App\Models\Delivery;
use App\Models\Geos;
use App\Models\Item;
use App\Models\Models\Offer;
use App\Models\OfferLog;
use App\Models\OfferTracks;
use App\Models\TrackList;
use App\Models\TrackLists;
use GeoIp2\Model\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use GeoIp2\Database\Reader;
use Illuminate\Support\Facades\Log;

//use Jenssegers\Agent\Facades\Agent;

use Jenssegers\Agent\Agent;
use Torann\GeoIP\Facades\GeoIP;

class OfferController extends Controller
{

    /**
     * @param Request $request
     * @return void
     */
    public function jump(Request $request)
    {

//        echo 123;exit;

        Log::info($request);
        Log::info('数据接收');
        $token = uniqid();
        Log::info($token);
        Log::info("生成唯一字符串");


//        print_r($_SERVER);exit;

        try {
            $current_url = $this->getpageurl();
            $current_url = parse_url($current_url);
            $queryString = parse_url($_SERVER['APP_URL'] . $_SERVER['REQUEST_URI'], PHP_URL_QUERY);


            parse_str($queryString, $paramsArray);
            $offer_id = isset($paramsArray['offer_id']) ? $paramsArray['offer_id'] : '';
            $admin_id = isset($paramsArray['admin_id']) ? $paramsArray['admin_id'] : 0;        //获取当前用户的信息
            $track_id = isset($paramsArray['track_id']) ? $paramsArray['track_id'] : '';        //获取当前链接id

            $clickid = isset($paramsArray['clickid']) ? $paramsArray['clickid'] : null;        //获取clickid

            $REQUEST_URI = !empty($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';


            Log::info($track_id);
            Log::info("记录track_id");

//            echo 123;exit;

            $res = DB::table('offer_tracks as o')
                ->where('o.id', $track_id)
                ->where('o.offer_id', $offer_id)
                ->select('o.track_link', 'o.land_page as land_link')
                ->get()->first();

//            var_dump($res);exit;

            //查询到链接关联到的落地页


            $agent = new Agent();
            $device = $agent->device();// 系统信息,浏览器引擎  (Ubuntu, Windows, OS X, ...)
            $languages = $agent->languages();
            Log::info($languages);
            $lang = !empty($languages) ? $languages[0] : null;

            $agent->browser();
            $browser = $agent->browser();// 获取浏览器
            $browser_version = $agent->version($browser);// 获取浏览器版本
            $platform = $agent->platform();// 获取系统
            $version = $agent->version($platform);// 获取系统版本

            // 是否是安卓设备
            $isAndroidOS = $agent->isAndroidOS();
            //是否是Nexus 系列
            $isNexus = $agent->isNexus();
            // 是否是Safari浏览器
            $isSafari = $agent->isSafari();
            // 是否是机器人
            $isRobot = $agent->isRobot();
            // 是否是桌面设备
            $isDesktop = $agent->isDesktop();
            // 是否是平板设备
            $isTablet = $agent->isTablet();
            // 移动设备
            $isMobile = $agent->isMobile();


            if (!empty($res)) {

                Log::info($admin_id);
                $ip = request()->getClientIp();

                $insert = [];
                $insert['track_id'] = $track_id;
                $insert['random'] = $token;
                $insert['query'] = $queryString;
                $insert['offer_id'] = $offer_id;
                $insert['admin_id'] = $admin_id;
                $insert['clickid'] = $clickid;
                $insert['ip'] = $ip;

                $insert['isAndroidOS'] = $isAndroidOS == true ? $isAndroidOS : false;
                $insert['isNexus'] = $isNexus === true ? $isNexus : false;
                $insert['isSafari'] = $isSafari === true ? $isSafari : false;
                $insert['isRobot'] = $isRobot === true ? $isRobot : false;
                $insert['isDesktop'] = $isDesktop === true ? $isDesktop : false;
                $insert['isTablet'] = $isTablet === true ? $isTablet : false;
                $insert['isMobile'] = $isMobile === true ? $isMobile : false;
                $insert['referer'] = !empty($referer) ? $referer : 0;
                $insert['lang'] = !empty($lang) ? $lang : 0;
                $insert['device'] = !empty($device) ? $device : 0;
                $insert['browser'] = !empty($browser) ? $browser : 0;
                $insert['browser_version'] = !empty($browser_version) ? $browser_version : 0;
                $insert['platform'] = !empty($platform) ? $platform : 0;
                $insert['platform_version'] = !empty($version) ? $version : 0;


                $insert['created_at'] = date('Y-m-d H:i:s');
                $insert['updated_at'] = date('Y-m-d H:i:s');

                $insertId = TrackList::insertGetId($insert);

//                var_dump($insertId);exit;

//                insertGetId
                $land_page = $res->land_link . '?refer=' . $token;

                Log::info($land_page);
                Log::info("落地页1");
                Log::info($insertId > 0);

                if ($insertId > 0) {
                    header("Location: $land_page"); //跳转到落地页
                    exit;
                } else {
                    Log::error('点击无效');
                    return $this->showMsg('1002', '点击无效');
                }
            } else {
                Log::error('链接不存在');


                $data = [
                    'msg' => '链接不存在',
                    'status'=>'1001',
                ];

                return response()->json($data);


                return $this->showMsg('1002', '链接不存在');
            }
        } catch (\Exception $exception) {
            Log::error('跳转错误' . $exception->getMessage());
            return ['status' => '1002', 'msg' => $exception->getMessage(), 'data' => null];
        }
    }


    /**
     * @param Request $request
     * @return void
     */
    public function callBack(Request $request)
    {


        Log::info($request);
        Log::info("回传接收数据");


        try {

            $refer = $request->input('refer');
            Log::info($refer);
            Log::info("回收token");

            $revenue = $request->input('revenue');
            $currency_code = $request->input('currency_code');


            $res = Db::table('track_lists as o')->where('o.random', $refer)->get()->first();

            if (!empty($res)) {
                $ip = $res->ip;
            } else {
                $ip = null;
            }

            $insert_data = [];
            $insert_data['offer_id'] = !empty($res->offer_id) ? $res->offer_id : 0;
            $insert_data['track_id'] = !empty($res->track_id) ? $res->track_id : 0;
            $insert_data['admin_id'] = !empty($res->admin_id) ? $res->admin_id : 0;

            $insert_data['ip'] = !empty($ip) ? $ip : null;
            $insert_data['revenue'] = !empty($revenue) ? $revenue : 0;
            $insert_data['currency_code'] = !empty($currency_code) ? $currency_code : 0;


            $insert_data['created_at'] = date('Y-m-d H:i:s');
            $insert_data['country_id'] = 0;
            $insert_data['token'] = $refer;
            $insert_data['status'] = !empty($res) ? 2 : 1;
            $insert_data['token_time'] = !empty($res) ? $res->created_at : null;


            $insert_data['clickid'] = !empty($res) ? $res->clickid : '';
            $insert_data['clickid_time'] = !empty($res) ? $res->created_at : null;


            $insert = OfferLog::insertGetId($insert_data);

            if (isset($res) && !empty($res->clickid)) {
                $info = $this->post("https://track.heomai2021.com/click.php?cnv_id=" . $res->clickid . "&payout=" . $revenue);
                $info1 = $this->post("https://binom.heomai.com/click.php?cnv_id=" . $res->clickid . "&payout=" . $revenue);
                Log::info($info);
                Log::info('推送BM');
                Log::info($info1);
            }


            if ($insert > 0) {
                return $this->showMsg('1001', 'success');
            } else {
                return $this->showMsg('1002', '插入失败');
            }


        } catch (\Exception $exception) {

            Log::error('回传数据错误' . $exception->getMessage());
            return ['status' => '1002', 'msg' => $exception->getMessage(), 'data' => null];
        }
    }


    /**
     *定时获取国家
     */
    public function country()
    {

        try {
            $list = OfferLog::where('status', 2)->where('country_id', 0)->whereNotNull('ip')->limit(50)->get()->toArray();

            if (!empty($list)) {

                foreach ($list as $key => $value) {

                    $country_res = geoip($value['ip'])->toArray();//根据ip获取国家
                    $country_id = Geos::where('country_iso_code', $country_res['iso_code'])->value('id');//获取国家id
                    if (!empty($country_id)) {
                        OfferLog::where('id', $value['id'])->update(['country_id' => $country_id]);
                    }
                }
            }
        } catch (\Exception $exception) {

            Log::error('ip定时获取国家错误' . $exception->getMessage());
            return ['status' => '1002', 'msg' => $exception->getMessage(), 'data' => null];
        }
    }

    protected function post($url)
    {// 初始化 curl
        $ch = curl_init();//初始化curl
        curl_setopt($ch, CURLOPT_URL, $url);//设置url属性
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);//获取数据
        curl_close($ch);//关闭curl
        return $output;

    }


    /**
     *检测追踪链接
     */
    public function offerTrack()
    {

        $list = OfferTracks::all();

        try {


            // 检查是否有记录
            if (!$list->isEmpty()) {

                $list = $list->toArray();
                $deliver_list = Delivery::where('status', 1)->get()->toArray();
                foreach ($deliver_list as $k => $v) {
                    foreach ($list as $value) {

                        $param = '/api/offers/jump?admin_id=1&offer_id=' . $value['offer_id'] . '&track_id=' . $value['id'];
                        $formal_url = 'http://clicks.btkua.com' . $param;

                        $formal_url = 'http://127.0.0.1:8000' . $param;


//                        echo $formal_url;exit;

                        $formal_url = "http://clicks.btkua.com/api/offers/jump?admin_id=1&offer_id=90&track_id=100";


                        $data = $this->curl_get_request($formal_url);


//                        $data = file_get_contents($formal_url);

                        var_dump($data);exit;


                        if ($data['status'] == '1002') {
                            Log::error($data['message']);
                        }
                    }
                }
            }
        } catch (\Exception $exception) {
            Log::error('监控错误' . $exception->getMessage());
        }

    }


   public function curl_get_request($url)
    {


        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 5,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'get',
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,

    ));


        $response = curl_exec($curl);

//        print_r(curl_getinfo($curl));exit;

        curl_close($curl);

//        $data = "curl Error:" . curl_error($curl);

//        Log::info($data);
        echo $response;

    }


    protected function getpageurl()
    {
        $pageURL = 'http';
        if (isset($_SERVER['HTTPS']) && $_SERVER["HTTPS"] == "on") {
            $pageURL .= "s";
        }
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        }
        return $pageURL;

    }
}
