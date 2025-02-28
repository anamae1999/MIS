<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Auth;

class AttendanceController extends Controller
{

     public function store(Request $request) {
      $id = $request->get('id');

       $insertIn= [
            'user_id' => Auth::user()->id,
            'user_name' => Auth::user()->first_name .' '.Auth::user()->last_name,
            'time_in' => \Carbon\carbon::now(), 
            'status' => 1,  
      ];
      
      DB::table('attendance')->insert( $insertIn);
       Session::flash('msg', 'Successfully!');
        return redirect()->back();

    }

     function out(Request $request)
    {

         $current_time =\Carbon\carbon::now();
         $id = $request->get('id');
         $status = 2;
          DB::update('update attendance set time_out= ?, status=? where user_id = ?',[$current_time,$status,$id]);
          Session::flash('msg', 'You Have Successfully Added the user!');
          return redirect()->back();
    }
}
