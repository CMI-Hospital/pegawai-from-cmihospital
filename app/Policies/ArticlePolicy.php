<?php

namespace App\Policies;

use App\Models\Pegawai;
use App\Models\User;
use App\Models\Article;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function update(Pegawai $user, Article $article)
    {
        return $user->id === $article->pegawai_id;
    }
}
