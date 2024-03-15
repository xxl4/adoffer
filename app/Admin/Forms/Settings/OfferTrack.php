<?php

namespace App\Admin\Forms\Settings;

use App\Models\OfferTracksCates;
use Encore\Admin\Widgets\Form;
use Encore\Admin\Widgets\StepForm;
use Illuminate\Http\Request;

class OfferTrack extends Form
{
    /**
     * The form title.
     *
     * @var  string
     */
    public $title = 'Track Link';

    /**
     * Handle the form request.
     *
     * @param  Request $request
     *
     * @return  \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request)
    {


        print_r($request->all());exit;

        return $this->next($request->all());
    }

    /**
     * Build a form here.
     */
    public function form()
    {

        $this->table('track', __('Track Tab'), function ($table) {
            $table->text('track tab');
            $table->text('track link');
            $table->text('track name');
            $table->text('track land');

        });

        $this->textarea('track_des', __('Track Des'));
        $this->multipleSelect('track_cate_id', __('Track Cate'))->options(OfferTracksCates::all()->pluck('track_cate', 'id'))
            ->required();

    }
}
