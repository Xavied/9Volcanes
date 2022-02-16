<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormularioMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public $filesMail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $filesMail)
    {
        $this->data = $data;
        $this->filesMail = $filesMail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->from('nanosoft101aa@gmail.com')->subject('Formulario Nuevo Emprendedor')->view('Mails.formularioEmprendedores')->with('data', $this->data);
        
        //Añade cada archivo al correo
        foreach($this->filesMail as $filePath){
            $true_path = public_path().'/storage/'.$filePath;
            $email->attach($true_path);       
        }
        return $email;
    }
}
