<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class LoginLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.login');
    }
    public function logout()
{
    Auth::logout();
    return redirect('/'); // Điều hướng người dùng đến trang chủ hoặc trang nào đó sau khi đăng xuất.
}
}