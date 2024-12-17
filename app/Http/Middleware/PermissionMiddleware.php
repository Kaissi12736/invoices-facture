<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $permission
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, $permission): Response
    {
        // التحقق من أن المستخدم مسجل الدخول ولديه الصلاحية المطلوبة
        if (!Auth::check() || !Auth::user()->can($permission)) {
            // إذا لم يكن لدى المستخدم الصلاحية، ارجاع استجابة 403
            abort(403, 'Unauthorized');
        }

        return $next($request);  // السماح للطلب بالمرور إذا كانت الصلاحية موجودة
    }
}
