<?php

namespace App\Policies;

use App\Models\Orden;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrdenPolicy
{
    use HandlesAuthorization;

    /* Verifica que los usuarios solo puedan ver las ordenes que sean de ellos */
    public function show(User $user, Orden $orden){
        if($orden->user_id == $user->id){
            return true;
        }else{
            return false;
        }
    }
    /* Verifica que al orden este en estado pendiente, para poder ser pagada */
    public function pendiente(User $user, Orden $orden){
        if ($orden->estado == 1) {
            return true;
        } else {
            return false;
        }
    }
}
