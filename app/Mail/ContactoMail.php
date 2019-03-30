<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactoMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $mensaje, $asunto, $remitente;

    public function __construct($mensaje, $asunto, $remitente)
    {
        $this->mensaje = $mensaje;
        $this->asunto = $asunto;
        $this->remitente = $remitente;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->remitente)
            ->subject($this->asunto)
            ->view('emails.contacto');
    }
}
