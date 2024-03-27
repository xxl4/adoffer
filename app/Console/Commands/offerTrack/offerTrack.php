<?php
namespace App\Console\Commands\offerTrack;
use App\Models\OfferTracks;
use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Shopify\Rest\Admin2023_10\Product;
use Shopify\Utils;

class offerTrack extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'offerTrack:offerTrack';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'offerTrack';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {

        $list = OfferTracks::all();
        try {
            // 检查是否有记录
            if (!$list->isEmpty()) {
                $list = $list->toArray();

                foreach ($list as $value) {


                    $offer_info = DB::table('offers')->where('id',$value['offer_id'])->select('id','offer_name')
                        ->get()->first();

                    $param = '/api/offers/jump?admin_id=1&offer_id=' . $value['offer_id'] . '&track_id=' . $value['id'];
                    $formal_url = 'https://clicks.btkua.com' . $param;

//                        $formal_url = "https://clicks.btkua.com/api/offers/jump?admin_id=1&offer_id=90&track_id=10000";

//                    echo '456-'.$value['offer_id'];
                    $data = $this->curl_get_request($formal_url,'','GET');

                    Log::info(!empty($data));



                    if(!empty($data)){
                        Log::info('返回状态1122');
                        $data = json_decode($data,true);

//                        echo '123-'.$formal_url.',';

                        Log::info('返回状态链接：'.$formal_url);

                        if ($data['status'] == '1002') {

                            $this->send($data['msg'].'<br>offer_id:'.$offer_info->id.';<br>offer_name:'
                                .$offer_info->offer_name,'text');

                        }


                    }


//                        var_dump($data['status']=='1001');exit;


                    Log::info('返回状态11');





//                        print_r($value);
                }


            }
        } catch (\Exception $exception) {
            Log::error('监控错误' . $exception->getMessage());
        }

    }


//    public function offerTrack()
//    {
//
//
//    }


    public function curl_get_request($url,$array,$method)
    {


        $ch = curl_init();//初始化curl

        if($method=="POST"){//4.post方式的时候添加数据
            curl_setopt($ch,CURLOPT_POSTFIELDS,$array);
        }

        curl_setopt($ch, CURLOPT_URL, $url);//设置url属性
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $output = curl_exec($ch);//获取数据
        curl_close($ch);//关闭curl


//        print_r(curl_getinfo($ch));exit;

        return $output;
    }



    public function send($text,$msgtype="text") {

        $url = 'https://qyapi.weixin.qq.com/cgi-bin/webhook/send?key=8c08b9ca-a604-47da-9168-4013856e5f78';
//        var_dump($url);exit;
        if(empty($url)) return false;
        echo $url."\r\n";

        $argc = [];
        $argc['msgtype'] = $msgtype;
        $argc['text'] = [
            'content' => $text
        ];
        $header = [];
        $header[] = "Content-Type:application/json";
        $argc = json_encode($argc);
        $res = $this->curl_get_request($url,$argc,'POST');


        return false;

        //var_dump($response, $argc);
    }


}
