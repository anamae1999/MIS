<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;
use Auth;

class BootstrapTables extends Component
{
    public function render()
    {
       $att = DB::table('attendance')->where('user_id', Auth::user()->id,)->get();
        return view('bootstrap-tables', ['att' => $att]);
    }
}
