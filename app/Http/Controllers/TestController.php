<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{

    public function test()
    {

        $user = \App\Models\User::firstOrCreate(
            ['email' => 'aaaa@aaaa'],
            ['name' => 'Default Name', 'password' => 'aaaa']
        );
        
        $user->name = 'Updated Name';
        $user->save();

        
        $user = \App\Models\User::where('email','like', 'aaaa@%')->update(['name'=>'asdasdasdasdsad']);
        // dd($user);

        $users = \App\Models\User::all();
        dd($users);


    }

   public function satasdasore(){
        return view('strony.index');
    }

    public function update(Request $request)
    {
        // Logika aktualizacji
        return redirect()->route('test');
   }
}
