<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        // Если пользователь хотел оставить комментарий, перенаправляем его на страницу с комментарием
        if ($request->session()->has('redirect_url')) {
            $redirectUrl = $request->session()->get('redirect_url');
            $request->session()->forget('redirect_url');
            $request->session()->regenerate();

            return redirect($redirectUrl);
        }
        $request->session()->regenerate();

        // Если пользователь зашел на сайт без намерения оставить комментарий, перенаправляем его на главную страницу
        return redirect('/');

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
