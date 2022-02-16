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
        //dd($data, $attachments);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->from('nanosoft101aa@gmail.com')->subject('Formulario Nuevo Emprendedor')->view('Mails.formularioEmprendedores')->with('data', $this->data);
        //return $this->subject('Formulario Nuevo Emprendedor')->view('Mails.formularioEmprendedores')->with('data', $this->data);
    
        $email = $this->from('nanosoft101aa@gmail.com')->subject('Formulario Nuevo Emprendedor')->view('Mails.formularioEmprendedores')->with('data', $this->data);
        
        //dd($this->filesMail);
        //$filesMail is an array with file paths of filesMail
        foreach($this->filesMail as $filePath){
            //dd($filePath);
            //$true_path = public_path().'/storage/'.$filePath;
        
            $email->attachFromStorage($filePath);
        
        }
        //dd($email);
        return $email;
    }
}
