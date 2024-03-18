<?php

namespace App\Admin\Forms\Steps;

use App\Models\Category;
use App\Models\Creatives;
use App\Models\Offer;
use Encore\Admin\Widgets\StepForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfferSet extends StepForm
{
    /**
     * The form title.
     *
     * @var  string
     */
    public $title = 'Offer配置';

    /**
     * Handle the form request.
     *
     * @param Request $request
     *
     * @return  \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request)
    {


        $request_info = $this->all();

//        print_r($request_info);

//        var_dump(session()->remove('steps'));exit;
//        print_r($request_info);
//        return $this->clear('steps');
//        var_dump($this->clear());exit;

            $cate_ids = '';
//            if(isset($request_info['basic']['category']) && !empty($request_info['basic']['category'])){
//                $category = $request_info['basic']['category'];
//                foreach ($category as $key => $value) {
//                    $category_id = Category::insertGetId(['category_name' => $value['category_name']]);
//                    $cate_ids .= $category_id . ',';
//                }
//            }

        $track_content_info = '';
        if(isset($request_info['track']['track_content']) && !empty($request_info['track']['track_content'])){
            $track_content_info = $request_info['track']['track_content'];
        }

//            print_r($cate_list);exit;

         if ($request_info['basic']['offer_status'] == 'on') {
                $request_info['basic']['offer_status'] = 1;
            } else {
                $request_info['basic']['offer_status'] = 0;
            }
/*
            $offer = Offer::orderBy('id','desc')->select('id')->get()->first();

            if(!empty($offer)){

                $offer_name_id = $offer['id']+1;
            }else{
                $offer_name_id = 1;
            }
*/

            $basic_info = [];
            $basic_info['short_name'] = $request_info['basic']['offer_name'];
            $basic_info['offer_name'] = $request_info['basic']['offer_name'];
            $basic_info['main_country'] = $request_info['basic']['main_country'];
            $basic_info['offer_price'] = $request_info['basic']['offer_price'];
            $basic_info['offer_status'] = $request_info['basic']['offer_status'];
            $basic_info['des'] = $request_info['basic']['des'];
            $basic_info['accepted_area'] = trim(implode(',', $request_info['basic']['accepted_area']), ',');


            $basic_info['cate_id'] =  trim(implode(',', $request_info['basic']['cate_id']), ',');



//        trim($cate_ids, ',');

            $basic_info['image'] = $request_info['basic']['image'];



            $basic_info['track_des'] = $request_info['track']['track_des'];
            $basic_info['track_content'] = json_encode($track_content_info);

//            $basic_info['creative'] =   $request_info['other']['creative'];
//            $basic_info['offers_domain'] =   !empty($request_info['other']['offers_domain']) ? json_encode
//    ($request_info['other']['offers_domain']) : '';

            $basic_info['creative_content'] = !empty($request_info['other']['creative_content']) ? json_encode
            ($request_info['other']['creative_content']) : '';
            $basic_info['admin_roles_id'] =   trim(implode(',', $request_info['other']['admin_roles_id']), ',');
            $basic_info['created_at'] = date('Y-m-d H:i:s');


//            print_r($request_info['track']['track_content']);exit;



//            print_r($basic_info);exit;

            $offer_id = Offer::insertGetId($basic_info);


//            var_dump($offer_id);exit;
            if($offer_id>0){


                $offer_track = DB::table('offer_tracks')->where('offer_id',$offer_id)->get()->toArray();


                if(!empty($request_info['track']['track_content']) || empty($request_info['track']['track_content']['new_1']['tab'])){

                    sort($request_info['track']['track_content']);

                    $track_list = [];
                    foreach ($request_info['track']['track_content'] as $x=>$y){

                        $track_list[$x]['tab'] =$y['tab'];
                        $track_list[$x]['track_name'] =$y['track_name'];
                        $track_list[$x]['land_page'] =$y['land_link'];
                        $track_list[$x]['offer_id'] =$offer_id;
                        $track_list[$x]['random'] =uniqid();
                        $track_list[$x]['created_at'] =date('Y-m-d H:i:s');

                    }
                    $res = DB::table('offer_tracks')->insert($track_list);

                }else{
                    $track_list = [];
                }

                session()->remove('steps');
                return redirect('/admin/offer');
            }
            session()->remove('steps');

    }

    /**
     * Build a form here.Creatives
     */
    public function form()
    {

//        $this->textarea('creative', __('Creative'));
        $this->table('creative_content', __('Creatives Info'), function ($table) {
            $table->text('creatives_name');
            $table->url('creatives_link');
        });

//        $this->table('offers_domain', __('Offer Domain'), function ($table) {
//            $table->url('offers_domain_link');
//        });

        $this->multipleSelect('admin_roles_id', __('Roles'))->options(\Encore\Admin\Auth\Database\Role::all()->pluck('name', 'id'))->required();


    }
}
