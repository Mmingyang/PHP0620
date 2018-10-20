<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Fenlei;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends Controller
{
    //
    public function index()
    {
//        $articles=Article::all();
//
//        return view("article/index",compact("articles"));

        $rows=DB::table("articles")
            ->join("fenleis","fenleis.id","=","articles.fenleis_id")
            ->select("articles.*","fenleis.fenleiN")
            ->get();

//        dd($rows);

        return view("article/index",compact("rows"));

    }


    public function add(Request $request)
    {
        if ($request->isMethod("post")){

            $this->validate($request,[
                "name"=>"required|max:8|min:2",
                "author"=>"required|max:8|min:2",
                "content"=>"required|max:45|min:2",
                "fenleis_id"=>"required",
            ]);

            if (Article::create($request->post())){
                session()->flash("success","添加成功");
                return redirect("article/index");
            }

        }

        $rows=DB::select("select * from fenleis");

        return view("article.add",compact("rows"));
    }


    public function edit(Request $request,$id)
    {

        $article=Article::find($id);

        if($request->isMethod("post")){

            $data=$request->post();

            if($article->update($data)){
                session()->flash("success","编辑成功");
                return redirect("article/index");

            }


        }

        $rows=Fenlei::all();

        return view("article.edit",compact("article","rows"));

    }


    public function del($id)
    {
        $article=Article::find($id);

        if($article->delete()){
            session()->flash("success","删除成功");
            return view("article.index");
        }

    }







}
