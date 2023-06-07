<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSocialLinkRequest;
use App\Http\Requests\UpdateSocialLinkRequest;
use App\Models\SocialLink;
use App\Models\SocialType;
use App\Models\User;
use App\Repositories\SocialLinkRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class SocialLinkController extends Controller
{
    protected $socialLinkRepository;

    public function __construct(SocialLinkRepository $socialLinkRepository)
    {
        $this->socialLinkRepository = $socialLinkRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     * @return Factory|Application|View
     */
    public function create(): Factory|Application|View
    {
        $socialTypes = SocialType::all();

        return view('social.create', [
            'socialTypes'=>$socialTypes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreSocialLinkRequest $request
     * @return RedirectResponse
     */
    public function store(StoreSocialLinkRequest $request): RedirectResponse
    {
        $this->socialLinkRepository->createSocialLink($request);

        return redirect('/profile')->with('success', 'Ссылка успешно добавлена');
    }

    /**
     * Display the specified resource.
     */
    public function show(SocialLink $socialLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param $id
     * @return Factory|Application|View
     */
    public function edit($id): Factory|Application|View
    {
        $socialLink = $this->socialLinkRepository->getOne($id);

        return \view('social.edit', [
            'socialLink'=>$socialLink
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateSocialLinkRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(UpdateSocialLinkRequest $request, $id): RedirectResponse
    {
        $this->socialLinkRepository->updateSocialLink($id, $request);

        return redirect('/profile')->with('success', 'Ссылка успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $socialLink = $this->socialLinkRepository->getOne($id);
        $socialLink->delete();

        return redirect('/profile')->with('success', 'Запись удалена');

    }
}
