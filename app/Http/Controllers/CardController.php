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


        $status = $this->repo->cardAdd($req->all());

        return [
            "message" => "Başarıyla eklendi.",
            "status" => $status
        ];

    }    

    public function cardDelete($id){  
        $this->repo->cardDelete($id);
    }

    public function cardUpdate(Request $req){
        $req->validate([
            "id" => "required|exists:card,id",
            "title" => "required|min:8|max:80",
            "description" => "required",
            "cardId" => "required|integer",
        ], $this->repo->valError());


        $this->repo->cardUpdate($req->all(), $req->id);

        return response()->json("Başarıyla update ettin.", 200);
    }

    public function cardFirstGet($id){
        return Card::whereId($id)->first();
    }
    
}
