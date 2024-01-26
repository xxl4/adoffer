<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Models\Offer;
use App\Models\OfferLog;
use App\Models\OfferTracks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfferController extends Controller
{
    public function index(Request $request)
    {


        $randomString = uniqid();


        $current_url = $this->getpageurl();
        $current_url = parse_url($current_url);
        $queryString = $_SERVER['QUERY_STRING'];

        $current_url = 'https://www.baidu.com/1';//测试链接


//        $res = OfferTracks::where('track_link', $current_url)->first()->toArray();


        $res = DB::table('offer_tracks as o')
            ->join('land_pages as l', 'o.land_id', '=', 'l.id')
            ->where('o.track_link', $current_url)
            ->select('o.track_link', 'l.land_link')
            ->get();


        if (!empty($res)) {
            $token = md5($current_url);
            $update_data = OfferTracks::where('track_link', $current_url)->update(['random' => $token, '$queryString' => $queryString]);

            if ($update_data > 0) {
                header("Location: {$res['land_link']}");
            } else {
                header("Location: 404}");
            }
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
