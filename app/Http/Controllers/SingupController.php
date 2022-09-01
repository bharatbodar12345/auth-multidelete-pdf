<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\page;
use App\Models\User_details;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Hash as FacadesHash;

class SingupController extends Controller
{
    public function singup()
    {
        return view('singup');

    }

    public function insert(Request $request)
    {
        // dd($request->name);
        // dd(Auth::user()->id == $item->id)

        if(Auth::check()){
            echo "Plz logout then register";
            $data = [
                $file = $request->file('file'),
                // dd($file),
                // $destinationPath = 'uploads/',
                $filename= $file->getClientOriginalName(),
                $file->move(public_path('/uploads'),$filename),
                // dd($file),

                // Storage::disk('public')->put($destinationPath . $filename, File::get($file)),
                'user_id' => Auth::user()->id,

                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash:: make($request->password),
                'xender' => $request->xender,
                'hobbies' => implode(',' , $request->expertise),
                'file' => $filename,
            ];
               $user=  page::create($data);
                // dd(Auth::user()->id);
                $user_detail=[
                    'user_id'=>$user->id,
                    'address' =>$request->address,
                    'city' =>$request->city,
                    'state' =>$request->state,
                ];
                User_details::create($user_detail);
                // dd($user_detail);
                return redirect()->to('/datatable');


        } else {
        $data = [
            $file = $request->file('file'),
            // dd($file),
            // $destinationPath = 'uploads/',
            $filename= $file->getClientOriginalName(),
            $file->move(public_path('/uploads'),$filename),
            // dd($file),

            // Storage::disk('public')->put($destinationPath . $filename, File::get($file)),
            // 'user_id' => Auth::user()->id,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash:: make($request->password),
            'xender' => $request->xender,
            'hobbies' => implode(',' , $request->expertise),
            'file' => $filename,
        ];
           $user=  page::create($data);
            $user_detail=[
                'user_id'=>$user->id,
                'address' =>$request->address,
                'city' =>$request->city,
                'state' =>$request->state,
            ];
            User_details::create($user_detail);
            // dd($user_detail);
            return redirect()->to('/login')->with('success', "Successfully added");
        }
    }


    public function editshow($id)
    {
        $editdata = page::where('id',$id )->first();
    //    dd($editdata);

        return view('edit', ['data' => $editdata]);

    }

    public function update(Request $request, $id){
        $filename = "";
        if($request->hasFile('file')) {
            $file = $request->file('file');
            // $destinationPath = 'uploads/',
            $filename= $file->getClientOriginalName();
            $file->move(public_path('/uploads'),$filename);
        }
    //    dd($filename);

        $post = page::find($id);

        $post->id = $id;
        $post->name = $request->name;
        $post->username = $request->username;
        $post->email = $request->email;
        $post->password = $request->password;
        $post->xender = $request->xender;
        $post->hobbies = implode(',', $request->expertise);
        if($filename != "") {
        $post->file =$filename;
        }




    $post->save();

        return redirect()->back()->with('success','data update successfully');

    }


    public function destroy($id){

        $res=page::find($id)->delete();
        if ($res){
          $data=[

          'delete'=>'1',
          'msg'=>'success'
        ];
        }else{
          $data=[
          'delete'=>'0',
          'msg'=>'fail'
        ];
         }
         return  redirect()->back();
    }
}
