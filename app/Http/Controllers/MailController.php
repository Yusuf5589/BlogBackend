<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailSend;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function mailSend(Request $req){
        Mail::to($req->mail)->send(new MailSend());
        return 'E-posta başarıyla gönderildi!';
    }
}
