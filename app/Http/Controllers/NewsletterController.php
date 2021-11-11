<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index()
    {
        return \view('NewsLe/indexnews');

    }
    public function envio(Request $request)
    {  
    $subject = "Probando el newsletter";
    $for = ['alexort2396@gmail.com'];
    Mail::send(("NewsLe/news"),$request->all(), function($mensaje) use($subject,$for){
        $mensaje->from("nanosoft101aa@gmail.com");
        $mensaje->subject($subject);
        $mensaje->to($for);
    });
    return view('welcome');
    }
}
