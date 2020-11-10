<?php
namespace App\Repositories;



use App\Models\Article;

Class ArticlesRepository extends BaseRepository {

    public function __construct(Article $article){

        $this->model = $article;

    }

}
