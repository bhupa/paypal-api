<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ArticleStoreRequest;
use App\Repositories\ArticlesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{

    protected $article;
    public function __construct(ArticlesRepository  $article){
        $this->article = $article;
    }

    public function store(Request $request){


//        $validator = Validator::make(['data' => $value],
//            ['title' => 'required']
//        );
//        if ($validator->fails()) {
//            return response()->json($validator->messages(), 422);
//
//        }

        $validator =  Validator::make($request->all(),[
            'title' => 'required',
        ]);


        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }
        $data = $request->except('_token');
        $data['title'] =$request->title;

        if($this->article->create($data)){
            return response()->json(['success'=>true,'message'=>'Articel created successfully'], 200);
        }


        return response()->json(['message'=>'Acrticle cannot created'], 422);

    }
}
