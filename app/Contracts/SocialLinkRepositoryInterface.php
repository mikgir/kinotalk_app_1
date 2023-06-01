<?php

namespace App\Contracts;

interface SocialLinkRepositoryInterface
{
    public function getAll();

    public function getOne($id);

}
