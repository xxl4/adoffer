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
use Torann\GeoIP\Facades\GeoIP;

class OfferController extends Controller
{
    /**
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {

//        $randomString = uniqid();

        $current_url = $this->getpageurl();
        $current_url = parse_url($current_url);
        $queryString = parse_url($_SERVER['APP_URL'] . $_SERVER['REQUEST_URI'], PHP_URL_QUERY);
        parse_str($queryString, $paramsArray);
        $offer_id = isset($paramsArray['offer_id']) ? $paramsArray['offer_id'] : '';        //获取当前链接的信息
        $admin_id = isset($paramsArray['admin_id']) ? $paramsArray['admin_id'] : '';        //获取当前链接的信息


        $res = DB::table('offer_tracks as o')
            ->join('land_pages as l', 'o.land_id', '=', 'l.id')
            ->where('o.offer_id', $offer_id)
            ->select('o.track_link', 'l.land_link')
            ->get()->first();           //查询到链接关联到的落地页


        if (!empty($res)) {
            $token = md5($offer_id . '/' . $admin_id);
            $update_data = OfferTracks::where('offer_id', $offer_id)->update(['random' => $token, 'queryString' => $queryString]); //把生成的token和传递过来的参数保存
            $land_page = $res['land_link'] . '?token=' . $token;


            if ($update_data > 0) {
                header("Location: {$land_page}"); //跳转到落地页
            } else {
                header("Location: 404}");
            }
        }
    }


    /**
     * @param Request $request
     * @return void
     */

    public function callBack(Request $request)
    {

        $data = [];
        $token = $request->input('token');
        $revenue = $request->input('revenue');
        $ip = request()->ip();
        $country_res = geoip($ip)->toArray();//根据ip获取国家
        $country_id = Geos::where('country',$country_res['country'])->value('id');//获取国家ip


        $res = Db::table('offer_tracks as o')
            ->leftJoin('offers as f', 'f.id', '=', 'o.offer_id')
            ->where('o.random', $token)->select('o.offer_id', '')->get()->first();



        if (!empty($res)) {

            $insert_data = [];
            $insert_data['offer_id'] = $res->offer_id;
            $insert_data['ip'] = $ip;
            $insert_data['revenue'] = !empty($revenue) ? $revenue : 0;
            $insert_data['created_at'] = date('Y-m-d H:i:s');
            $insert_data['country_id'] = !empty($country_id) ? $country_id :'';


            $insert = OfferLog::insertGetId($insert_data);

            if ($insert > 0) {
                return $this->showMsg('1001', 'success');
            } else {
                return $this->showMsg('1002', '插入失败');
            }

        } else {
            return $this->showMsg('1002', 'token不能为空');

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