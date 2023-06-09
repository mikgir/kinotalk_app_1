<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;

class RegisteredUserController extends Controller
{
    use HasRoles;
    use InteractsWithMedia;
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if ($request->hasFile('avatar')) {

            $user->addMediaFromRequest('avatar')
                ->toMediaCollection('avatars');
        }

        $user->assignRole('user');

        event(new Registered($user));

        Auth::login($user);

        // Если пользователь хотел оставить комментарий, перенаправляем его на страницу с комментарием
        if ($request->session()->has('redirect_url')) {
            $redirectUrl = $request->session()->get('redirect_url');
            $request->session()->forget('redirect_url');

            return redirect($redirectUrl);
        }
        $request->session()->regenerate();

        // Если пользователь регистрируется без намерения оставить комментарий, перенаправляем его на главную страницу
        return redirect(RouteServiceProvider::ACCOUNT);
    }
}
