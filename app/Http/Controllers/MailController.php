<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailSend;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendMail;

class MailController extends Controller
{
    
    public function mailSend(Request $req){
        SendMail::dispatch($req->mail);
        
        return 'E-posta başarıyla gönderildi!';
    }
}
