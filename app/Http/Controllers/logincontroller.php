<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\page;
use App\Models\users;
use PDF;

// use FusionAuth\FusionAuthClient;
use Illuminate\Support\Facades\Auth;


class logincontroller extends Controller
{

    // private $authClient;

    // public function __construct($authClient)
    // {
    //   $this->authClient = $authClient;
    // }
    public function login() 
    {
        return view('login');
     

    } 
    public function tableshow(Request $request) 
    
    {
      
        $uid = Auth::user()->id;
        $maindata = page::where('id', $uid)->orWhere('user_id', $uid)->get();        
        // dd($maindata);
        // load the view and pass the sharks
        return view("tableshow")->with(compact('maindata'));

    } 

    protected function credentials(Request $request) 
    {
        $data = [
            'username' => $request->username,
            'password'=>$request->password,
        ];
        // dd(Auth::attempt($data));
        if (Auth::attempt($data)) {
         echo    ' Authentication was successful..';
            return redirect('/datatable')->with('success','Login successfully');
            
        }else {
            echo"Authentication not successful..";
            return redirect('/login')->with('success','login not successfully');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/login')->with('success','logout successfully');
      }


      public function pdfview()  
    { 
        // $items = data_table::get();
        // view()->share($items);  
        // dd($items);

        $items = page::all();

        
    // if($request->has('download')){  
        $pdf = PDF::loadView('pdf', ["items"=> $items]);
        // dd($items);
        return $pdf->download('pdfview.pdf');  
     
}

public function deleteAll(Request $request)  
{  
   
    // dd($request->all())  ;
    page::whereIn('id',explode(",",$request->deleteid))->delete();  
    return response()->json(['success'=>"Data Deleted successfully."]);  
}


}
