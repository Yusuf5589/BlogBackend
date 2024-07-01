<?php

namespace App\Repositories;

use App\Models\Card;
use App\Models\User;

class UserRepository{

    public function all(){
        return Card::get();
    }

    public function valError(){
        return[
            "id.required" => "İd kısmını boş bırakamazsınız.",
            "id.exists" => "böyle bi id yok.",
            "title.required" => "Başlık kısmını boş bırakamazsınız.",
            "title.min" => "Başlık kısmı en az 8 karakterli olmalı.",
            "title.max" => "Başlık kısmı en fazla 80 karakterli olmalı.",
            "description.required" => "Açıklama kısmını boş bırakamazsınız.",
            "cardId.required" => "CardId kısmını boş bırakamazsınız.",
            "cardId.integer" => "CardId kısmını sadece sayı türünden girebilirsiniz.",
            "name.required" => "İsim kısmını boş bırakamazsınız.",
            "name.min" => "İsim kısmı en az 8 karakterli olmalı.",
            "name.max" => "İsim kısmı en fazla 20 karakterli olmalı.",
            "name.unique" => "Bu isim alınmış.",
            "password.required" => "şifre kısmını boş bırakamazsınız.",
            "password.min" => "şifre kısmı en az 8 karakterli olmalı.",
            "password.max" => "şifre kısmı en fazla 20 karakterli olmalı.",
        ];
    }

    public function register(array $req){
        return User::create($req);
    }


    public function cardAdd(array $req){
        return Card::create($req);
    }


    public function cardDelete($card){
        return Card::whereId($card)->delete();
    }


    public function cardUpdate(array $req, $id){
        return Card::whereId($id)->update($req);
    }

}
