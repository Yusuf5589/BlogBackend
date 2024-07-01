<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\UserRepository;

class RegisterController extends Controller
{
    protected $repo;
    public function __construct(UserRepository $repo){
        $this->repo = $repo;
    }

    public function register(Request $req){

        $req->validate([
            "name" => "required|min:8|max:20|unique:user,name",
            "password" => "required|min:8|max:20",
        ], $this->repo->valError());


        User::create([
            "name" => $req->name,
            "password" => $req->password,
        ], $this->valError());

        return response()->json($req->name." başarıyla kayıt oldun.", 200);
    }
}
