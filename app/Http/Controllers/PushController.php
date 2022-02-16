<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use App\Notifications\Push;

class PushController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('PushNotificationAdmin.PushNotification');
    }
      public function pushstore(Request $request)
    {

        $this->validate($request,[
            'endpoint'    => 'required',
            'keys.auth'   => 'required',
            'keys.p256dh' => 'required'
        ]);
        $endpoint = $request->endpoint;
        $token = $request->keys['auth'];
        $key = $request->keys['p256dh'];
        auth()->user()->updatePushSubscription($endpoint, $key, $token);
        
        return response()->json(['success' => true],200);
    }
    public function push(Request $request){

        $Titulo = $request->titulo;
        $cuerpo = $request->mensaje;
     
        $validar=$request->validate([
            "titulo"=>['required', 'max:45'],
            "mensaje"=>['required', 'max:80']
        ],
        [
            'required'=> 'El :attribute es requerido',
            'max'=> 'El tamaño de :attribute es muy grande'
        ]);
        
        
        if($validar==true)
        {
        Notification::send(User::all(),new Push($Titulo, $cuerpo));
        return response()->json(['success' => 'Notificación enviada']);
        }
    }
}
