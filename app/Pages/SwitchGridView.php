<?php

namespace App\Admin\Pages;

use Illuminate\Contracts\Support\Renderable;
class MyPage extends Pages
{
    public function render()
    {
        return admin_view('admin.pages.my-page');
    }
}
