<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Models\User;
// use App\Models\Doctor;



class HomeController extends Controller
{
    public function redirect(){
        if (Auth::id()) {
            if (Auth::user()->user_type=='0') {
                return view('admin.dashboard');
            }
            else{
                return view('admin.dashboard'); 
            }
        } 
        else{
            return redirect()->back();
        }
    }

    public function index(){
        // $doctors_record = doctor::all();
        // $data['doctors_record'] = $doctors_record;
        // return view('user.index', compact('doctors_record'));
        return view('user.index');
    }
    // public function about(){
    //     return view('user.about');
    // }
    // public function doctors(){
    //     return view('user.doctors');
    // }
    // public function blog(){
    //     return view('user.blog');
    // }
    // public function contact(){
    //     return view('user.contact');
    // }
}
