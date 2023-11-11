<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Kiểm tra xem người dùng có vai trò admin không
        if (auth()->user()->role !== 0) {
            // Nếu không phải admin, bạn có thể xử lý theo ý muốn của bạn, ví dụ chuyển hướng hoặc ném ngoại lệ
            // Ví dụ: return redirect()->route('home');
            // Hoặc throw new \Exception('Không có quyền truy cập');
            return redirect()->route('home.index')->with('error', 'Bạn không có quyền truy cập vào trang này.');
        }

        // Nếu người dùng có vai trò admin, cho phép truy cập vào tuyến đường
        return $next($request);
    }
}
