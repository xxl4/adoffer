<?php

namespace App\Http\Controllers;

use app\admin\model\Admin;
use App\Models\Geos;
use App\Models\Item;
use App\Models\Models\Offer;
use App\Models\OfferLog;
use App\Models\OfferTracks;
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
        try {

            $current_url = $this->getpageurl();
            $current_url = parse_url($current_url);
            $queryString = parse_url($_SERVER['APP_URL'] . $_SERVER['REQUEST_URI'], PHP_URL_QUERY);

//            print_r("<pre/>");
//            print_r($_SERVER['REQUEST_URI']);
//            exit;

            parse_str($queryString, $paramsArray);
            $offer_id = isset($paramsArray['offer_id']) ? $paramsArray['offer_id'] : '';
            $admin_id = isset($paramsArray['admin_id']) ? $paramsArray['admin_id'] : 0;        //获取当前用户的信息
            $track_id = isset($paramsArray['track_id']) ? $paramsArray['track_id'] : '';        //获取当前链接id
            $APP_URL = $_SERVER['APP_URL'];
            $REQUEST_URI = !empty($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';


            $res = DB::table('offer_tracks as o')
                ->join('land_pages as l', 'o.land_id', '=', 'l.id')
                ->where('o.id', $track_id)
                ->select('o.track_link', 'l.land_link')
                ->get()->first();           //查询到链接关联到的落地页


            if (!empty($res)) {
//                $token = md5($offer_id . '/' . $admin_id . '/' . $track_id);
                $token = uniqid();
                Log::info($token);
                Log::info("唯一字符串");
                Log::info($admin_id);

                $update_data = OfferTracks::where('id', $track_id)->update(['random' => $token, 'query' => $queryString, 'offer_id' => $offer_id, 'admin_id' => $admin_id]); //把生成的token和传递过来的参数保存
                $land_page = $res->land_link . '?refer=' . $token;

                Log::info($land_page);
                Log::info("落地页1");
                Log::info($update_data > 0);

                if ($update_data > 0) {
                    header("Location: $land_page"); //跳转到落地页
                    exit;
                } else {
                    return $this->showMsg('1002', 'error');
                }
            }
        } catch (\Exception $exception) {
            return ['status' => '1002', 'msg' => $exception->getMessage(), 'data' => null];
        }
    }


    /**
     * @param Request $request
     * @return void
     */

    public function callBack(Request $request)
    {

        try {
            $referrer = $request->header('referer');
            $referer = $request->headers->get('referer');
            $agent = new Agent();
            $device = $agent->device();// 系统信息,浏览器引擎  (Ubuntu, Windows, OS X, ...)
            $languages = $agent->languages();
            $lang = $languages[0];//语言



            $agent->browser();
            $browser = $agent->browser();// 获取浏览器
            $browser_version = $agent->version($browser);// 获取浏览器版本
            $platform = $agent->platform();// 获取系统版本
            $version = $agent->version($platform);


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

            $refer = $request->input('refer');
            $revenue = $request->input('revenue');


            $ip = request()->ip();
            $country_res = geoip($ip)->toArray();//根据ip获取国家

            $country_id = Geos::where('country', $country_res['country'])->value('id');//获取国家ip
            $res = Db::table('offer_tracks as o')->where('o.random', $refer)->get()->first();


            if (!empty($res)) {

                $insert_data = [];
                $insert_data['offer_id'] = $res->offer_id;
                $insert_data['track_id'] = $res->id;
                $insert_data['ip'] = $ip;
                $insert_data['revenue'] = !empty($revenue) ? $revenue : 0;
                $insert_data['isAndroidOS'] = $isAndroidOS==true ? $isAndroidOS : false;
                $insert_data['isNexus'] = $isNexus===true ? $isNexus : false;
                $insert_data['isSafari'] = $isSafari===true ? $isSafari : false;
                $insert_data['isRobot'] = $isRobot===true ? $isRobot : false;
                $insert_data['isDesktop'] = $isDesktop===true ? $isDesktop : false;
                $insert_data['isTablet'] = $isTablet===true ? $isTablet : false;
                $insert_data['isMobile'] = $isMobile===true ? $isMobile : false;
                $insert_data['referer'] = !empty($referer) ? $referer : 0;
                $insert_data['lang'] = !empty($lang) ? $lang : 0;
                $insert_data['device'] = !empty($device) ? $device : 0;
                $insert_data['browser'] = !empty($browser) ? $browser : 0;
                $insert_data['browser_version'] = !empty($browser_version) ? $browser_version : 0;
                $insert_data['platform'] = !empty($platform) ? $platform : 0;
                $insert_data['platform_version'] = !empty($version) ? $version : 0;
                $insert_data['created_at'] = date('Y-m-d H:i:s');
                $insert_data['country_id'] = !empty($country_id) ? $country_id : 0;




                $insert = OfferLog::insertGetId($insert_data);

                if ($insert > 0) {
                    return $this->showMsg('1001', 'success');
                } else {
                    return $this->showMsg('1002', '插入失败');
                }

            } else {
                return $this->showMsg('1002', 'token不能为空');

            }

        } catch (\Exception $exception) {
            return ['status' => '1002', 'msg' => $exception->getMessage(), 'data' => null];
        }

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
