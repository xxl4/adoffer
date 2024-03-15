<?php
use App\Admin\Forms\Setting;
use App\Http\Controllers\Controller;
use Encore\Admin\Layout\Content;

class UserController extends Controller
{
    public function setting(Content $content)
    {
        return $content
            ->title('网站设置')
            ->body(new Setting());
    }

    public function handle(Request $request)
    {
        // 从$request对象中获取数据来处理...

        // 加入一个成功提示
        admin_success('数据处理成功.');

        // 或者一个错误提示
        admin_success('数据处理成功失败.');

        // 处理完成之后回到原来的表单页面，或者通过返回`redirect()`方法跳转到其它页面
        return back();
    }


}
