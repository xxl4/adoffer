<?php

namespace App\Admin\Forms\Settings;

use App\Models\Creatives;
use Dcat\Admin\Models\Role;
use Encore\Admin\Widgets\Form;
use Encore\Admin\Widgets\StepForm;
use Illuminate\Http\Request;

class OfferSet extends Form
{
    /**
     * The form title.
     *
     * @var  string
     */
    public $title = 'Other Set';

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
//        $this->text('username');
//        $this->email('email');


        $this->textarea('creative', __('Creative Des'));
        $this->multipleSelect('creatives_id', __('Creatives'))->options(Creatives::all()->pluck('name', 'id'))->required();
        $this->multipleSelect('admin_roles_id', __('Roles'))->options(\Encore\Admin\Auth\Database\Role::all()->pluck('name', 'id'))->required();


    }
}
