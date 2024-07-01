<?php

namespace App\Repositories;

use App\Models\Card;

class UserRepository{

    public function all(){
        return Card::get();
    }

    public function valError(){
        return[
            "title.required" => "Başlık kısmını boş bırkamazsınız.",
            "title.min" => "Başlık kısmı en az 8 karakterli olmalı.",
            "title.max" => "Başlık kısmı en fazla 80 karakterli olmalı.",
            "description.required" => "Açıklama kısmını boş bırakamazsınız.",
            "cardId.required" => "CardId kısmını boş bırkamazsınız.",
            "cardId.integer" => "CardId kısmını sadece sayı türünden girebilirsiniz.",
            "name.required" => "İsim kısmını boş bırkamazsınız.",
            "name.min" => "İsim kısmı en az 8 karakterli olmalı.",
            "name.max" => "İsim kısmı en fazla 20 karakterli olmalı.",
            "name.unique" => "Bu isim alınmış.",
            "password.required" => "şifre kısmını boş bırakamazsınız.",
            "password.min" => "şifre kısmı en az 8 karakterli olmalı.",
            "password.max" => "şifre kısmı en fazla 20 karakterli olmalı.",
        ];
    }

}
