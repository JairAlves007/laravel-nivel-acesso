<?php

namespace App\Http\Controllers;

use App\Models\Edital;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index() {

        $editais = Edital::all();

        $users_credentials = DB::table('users')
        ->join('nivel_de_acesso', 'users.nivel_id', 'nivel_de_acesso.id')
        ->where('users.pode_acessar', '0')
        ->get();

        $user_id = auth()->user()->id;

        $query = DB::table('users')
        ->join('nivel_de_acesso', 'users.nivel_id', 'nivel_de_acesso.id')
        ->where('users.id', $user_id)
        ->get();
        
        $user_infos = $query[0];
        $nivel = $query[0]->nivel;

        if($query[0]->pode_acessar === 0) {
            return redirect('/');
        } else {
            return view('dashboard', [
                'user_infos' => $user_infos, 
                'nivel' => $nivel, 
                'users' => $users_credentials,
                'editais' => $editais
            ]);
        }
    }

    public function authorizeUser($id){
        $user = User::findOrFail($id);

        $user->pode_acessar = 1;

        $user->save();

        return redirect('/dashboard');
    }
}
