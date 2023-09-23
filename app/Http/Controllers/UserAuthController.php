<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Post;
use Hash;
use Session;

class UserAuthController extends Controller
{
    public function login(){
        return view("user.login");
    }

    public function registration(){
        return view("user.registration");
    }

    public function registerUser(Request $request){
       $request->validate([
        'firstname' => 'required',
        'lastname' => 'required',
        'email' => 'required|email|unique:people',
        'mobile' => 'required|digits:10',
        'password' => 'required|min:5|max:12'
       ]);

       $person = New Person();
       $person->firstname = $request->firstname;
       $person->lastname = $request->lastname;
       $person->email = $request->email;
       $person->mobile = $request->mobile;
       $person->password = Hash::make($request->password);
       $res = $person->save();
       if($res){
        return back()->with('success','you have register successfully');
       }else{
        return back()->with('failed','something is worng');
       }
    }

    public function loginUser(Request $request){
        $request->validate([
        'mobile' => 'required|digits:10',
        'password' => 'required|min:5|max:12'
       ]);

       $user = Person::where('mobile','=',$request->mobile)->first();
       if($user){
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('loginId',$user->id);
                return redirect('posts');
            }else{
                return back()->with('failed','Password not matches');
            }
       }else{
         return back()->with('failed','Mobile is not registered');
       }
    }


     public function blogPost() {
        $post = "My first blog vikas!";
        return view('posts.post');
    }

    public function blogerPost(Request $request){
        $request->validate([
        'title' => 'required',
        'description' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post = new Post();

         $file_name = time() . '.' . request()->image->getClientOriginalExtension();
         request()->image->move(public_path('images'), $file_name);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $file_name;
        $result = $post->save();
        if($result){
             return redirect('showPost')->with('success', 'Post created successfully.');
        }else{
             return back()->with('failed','something went wrong');
        }
    }

    public function showPost(){
       $posts = Post::orderBy('created_at', 'desc')->get();

        return view("posts.showPost", ['posts' => $posts]);
    }
}
