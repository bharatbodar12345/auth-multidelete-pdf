<?php

namespace App\Http\Controllers;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\User_details;

use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class NewsController extends Controller
{
    public function insert() 
    {
        $maindata = News::all();        
        return view('form' ,['data'=> $maindata]);
        // return view('form');
    } 

    public function submit(Request $request) 
    {
        
            $category_detail=[
                $file = $request->file('file'),
                $filename= $file->getClientOriginalName(),
                $file->move(public_path('/uploads'),$filename),

                'user_id' =>Auth::user()->id,
                'description'=>$request->description,
                'category_id'=>$request->category,
                'image'=>$filename,

            ];
            NewsCategory::create($category_detail);
            // dd($user_detail);
        
        return redirect()->to('/form')->with('success','data insert successfully');
    }

    public function cards() 
    {   
        $newsdata = NewsCategory::with(['category','user'])->get(); 
        
        return view("NewsShow")->with(compact(['newsdata']));
    }

    public function usernews() 
    {   
        $newsdata = NewsCategory::with(['category','user'])->where('user_id', Auth::user()->id)->get(); 
        // dd(Auth::user()->name);
        
        return view("NewsShow")->with(compact(['newsdata']));
    }

}
