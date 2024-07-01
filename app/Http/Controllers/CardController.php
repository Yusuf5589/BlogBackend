<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use App\Repositories\UserRepository;

class CardController extends Controller
{

    protected $repo;

    public function __construct(UserRepository $repo){
        $this->repo = $repo;
    }

    public function cardGetAll(){
        return $this->repo->all();
    }



    public function cardAdd(Request $req){
        $req->validate([
            "title" => "required|min:8|max:80",
            "description" => "required",
            "cardId" => "required|integer",
        ], $this->repo->valError());

        Card::create([
            "title" => $req->title,
            "description" => $req->description,
            "cardId" => $req->cardId,
        ]);


        return response()->json("Başarıyla card eklendi.");

    }    
}
