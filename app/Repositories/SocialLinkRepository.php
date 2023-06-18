<?php

namespace App\Repositories;

use App\Contracts\SocialLinkRepositoryInterface;
use App\Http\Requests\StoreSocialLinkRequest;
use App\Http\Requests\UpdateSocialLinkRequest;
use App\Models\SocialLink;
use App\Models\SocialType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class SocialLinkRepository implements SocialLinkRepositoryInterface
{
    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return SocialLink::with(['user', 'socialType'])->get();

    }

    /**
     * @param $id
     * @return Model|Collection|Builder|null
     */
    public function getOne($id): Model|Collection|Builder|null
    {
        return SocialLink::with(['user', 'socialType'])->findOrFail($id);

    }

    /**
     * @param StoreSocialLinkRequest $request
     * @return void
     */
    public function createSocialLink(StoreSocialLinkRequest $request): void
    {
        $socialLink = new SocialLink;

        $socialLink->user_id = auth('web')->id();
        $socialLink->social_type_id = $request->social_type;
        $socialLink->link = $request->social_link;

        $socialLink->save();
    }

    /**
     * @param $id
     * @param UpdateSocialLinkRequest $request
     * @return void
     */
    public function updateSocialLink($id, UpdateSocialLinkRequest $request): void
    {
        $socialLink = SocialLink::with(['user', 'socialType'])->findOrFail($id);
        $socialTypeId = SocialType::where('name', $request->social_type)->pluck('id')->first();

        $socialLink->update([
            'social_type_id' => $socialTypeId,
            'link' => $request->social_link
        ]);

    }
}
