<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileFormRequest;
use App\Models\Article;
use App\Models\Profile;
use App\Models\SocialLink;
use App\Models\SocialType;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;

class UserProfileController extends Controller
{
    use HasRoles;
    use InteractsWithMedia;

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {

        $userId = auth('web')->id();
        $user = \auth()->user();
        $socialTypes = SocialType::all();
        $profile = Profile::with('user')->where('user_id', $userId);
        $socialLinks = SocialLink::with(['user', 'socialType'])->where('user_id', $userId);

        return view('profile.index', [
            'profile' => $profile,
            'user' => $user,
            'socialTypes' => $socialTypes,
            'socialLinks' => $socialLinks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param $id
     * @param ProfileFormRequest $request
     * @return Application|RedirectResponse|Redirector
     *
     */
    public function store($id, ProfileFormRequest $request): Redirector|RedirectResponse|Application
    {
        $user = User::with('profile')->findOrFail($id);

        $user->profile()->create($request->validated());

        return redirect('/profile', $id)->with('success', 'Profile created successful');
    }

    /**
     * Display the specified resource.
     * @param string $id
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param string $id
     * @return View
     */
    public function edit(string $id): View
    {
        $profile = Profile::with('user')->firstOrFail($id);
        return view('profile.edit', [
            'profile' => $profile
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param ProfileFormRequest $request
     * @param string $id
     * @return Redirector|Application|RedirectResponse
     */
    public function update(ProfileFormRequest $request, string $id): Redirector|Application|RedirectResponse
    {
        $profile = Profile::with('user')->findOrFail($id);
        $profile->update($request->validated());

        return redirect('/profile')->with('success', 'Profile updated successful');
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function userUpdate(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users'],
            'name' => ['nullable', 'string', 'max:255'],
        ]);
        $user = User::with('profile')->findOrFail($id);

        $user->update([
            'name' => $request->name ?? $user->name,
            'email' => $request->email ?? $user->email,
        ]);

        if ($request->hasFile('avatar')) {
            $media = $user->getMedia('avatars')->first();

            if ($media) {
                $user->clearMediaCollection('avatars');
            }

            $user->addMediaFromRequest('avatar')
                ->toMediaCollection('avatars');
        }

        return redirect('/profile')->with('success', 'Profile updated successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
