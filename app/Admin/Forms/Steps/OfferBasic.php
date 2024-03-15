<?php

namespace App\Admin\Forms\Steps;

//use App\Admin\Repositories\Image;
use App\Models\Geos;
use Encore\Admin\Form;
use Encore\Admin\Widgets\StepForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

//use Intervention\Image;
//use Intervention\Image\Facades\Image;


class OfferBasic extends StepForm
{
    /**
     * The form title.
     *
     * @var  string
     */
    public $title = '填写基本信息';

    /**
     * Handle the form request.
     *
     * @param  Request $request
     *
     * @return  \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request)
    {


        $res = [];
        $data = $request->all();


//        print_r(gettype($data['image']));exit;
//        print_r(session()->all('steps'));exit;

//        print_r(Session::get('steps', []));exit;

       $steps = Session::get('steps', []);


//       var_dump(strlen($data['image']));exit;
        if(!isset($data['image']) && !empty($steps['basic']['image'])){
            $data['image'] =$steps['basic']['image'];
        }


        if(gettype($data['image'])=='object'){
            $data['image'] = ltrim($this->store($data['image']),'public');
        }

//

  /*      if (request()->hasFile('image_path')) {
            // 获取上传的图片文件对象
            $image = request()->file('image_path');
            // 检查图片文件是否有效
            if ($image->isValid()) {
                // 指定图片存储路径
                $destinationPath = '/images';



                // 获取原始图片文件名
                $fileName = $image->getClientOriginalName();

                print_r($fileName);exit;


                // 移动上传的图片文件到指定路径
                $image->move($destinationPath, $fileName);
                // 将图片路径保存到数据数组中
                $data['image_path'] = $destinationPath . '/' . $fileName;
            } else {
                // 图片无效的处理逻辑
                return back()->with('error', 'Invalid image file.');
            }
        }
*/

        $res = $data;

//        print_r($res);exit;

        return $this->next($data);
    }


    public function store($image)
    {

            $path = Storage::putFile('public/images', $image);
            return $path;

    }




    /**
     * Build a form here.
     */
    public function form()
    {

        $this->text('offer_name', __('Offer name'))->required()->help('由ID、适用国家、名称组成');
        $this->text('main_country', __('Main Country'))->required()->help('适用于的主流国家');
        $this->image('image', 'Image')->required();
        $this->currency('offer_price', __('Payout'));
        $this->switch('offer_status', __('Offer status'))->default(1);
        $this->textarea('des', __('Offer Des'));
        $this->listbox('accepted_area', __('Accepted Area'))->options(Geos::all()->pluck('country', 'id'))->required();


        $this->table('category', __('Category'), function ($table) {

            $table->text('category_name');
            $table->collapsed(true);

        });



    }



}
