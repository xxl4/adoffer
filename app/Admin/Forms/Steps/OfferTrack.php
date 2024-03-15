<?php

namespace App\Admin\Forms\Steps;

use App\Models\TabType;
use Encore\Admin\Widgets\StepForm;
use Illuminate\Http\Request;

class OfferTrack extends StepForm
{
    /**
     * The form title.
     *
     * @var  string
     */
    public $title = 'Offer Track Link';

    /**
     * Handle the form request.
     *
     * @param  Request $request
     *
     * @return  \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request)
    {

        return $this->next($request->all());
    }

    /**
     * Build a form here.
     */
    public function form()
    {

        $this->textarea('track_des', __('Track Des'));

        $this->table('track_content', __('Track Content'), function ($table) {
            $table->select('tab')->options(TabType::all()->pluck('tab_name', 'tab_name'))->required();
             $table->text('track_name');
             $table->url('land_link');

        });

    }
}
