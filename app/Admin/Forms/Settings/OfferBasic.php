<?php

namespace App\Admin\Forms\Settings;

use App\Models\Geos;
use Encore\Admin\Widgets\Form;
use Encore\Admin\Widgets\StepForm;
use Illuminate\Http\Request;

class OfferBasic extends Form
{
    /**
     * The form title.
     *
     * @var  string
     */
    public $title = 'Basic Info';

    /**
     * Handle the form request.
     *
     * @param  Request $request
     *
     * @return  \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request)
    {
//         return $this->error('Your error message.');
//        return $this->success('Processed successfully.', '/');
//        print_r($request->all());exit;

        admin_success('数据处理成功.');
        return redirect('/admin/offers/register?active=track&id=1');
//        print_r($_REQUEST);exit;
//        return $this->next($request->all());
    }

    /**
     * Build a form here.
     */
    public function form()
    {

        $this->text('offer_name', __('Offer name'))->required()->help('由ID、适用国家、名称组成');
        $this->image('image', __('Offer Image'));
        $this->currency('offer_price', __('Payout'))->help('可不选');
        $this->switch('offer_status', __('Offer status'))->default(1);
        $this->textarea('des', __('Offer Des'));
        $this->listbox('accepted_area', __('Accepted Area'))->options(Geos::all()->pluck('country', 'id'))->required();
        $this->text('main_country', __('Main Country'));

        $this->table('category', function ($table) {
            $table->text('category name');
        });


//            $form->multipleSelect('cate_id', __('Offer Category'))->options(Category::all()->pluck('category_name', 'id'));




    }
}
