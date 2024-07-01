<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\UserRepository;


class LoginController extends Controller
{

    protected $repo;

    public function __construct(UserRepository $repo){
        $this->repo = $repo;
    }

    public function login(Request $req){
        $req->validate([
            "name" => "required|min:8|max:20",
            "password" => "required|min:8|max:20",
        ], $this->repo->valError());


        $user = User::where("name", $req->name)->first();

        if($user == ""){
            return response()->json("Böyle bi kullanıcı yok");
        }
        else if($user->password == $req->password){

            $token = $user->createToken("auth_token")->plainTextToken;

            return [
                "welcome" => $req->name." Hoşgeldin",
                "token" => $token
            ];
        }
        else if($user->password != $req->password){
            return response()->json("Şifren yanlış.");
        }
    }
}
