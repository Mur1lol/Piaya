<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnviarEmail extends Mailable {
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
   
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->from('piaya.devs@gmail.com', 'Piaya Developers')
            ->subject('Solicitação de Administração')
            ->markdown('mails.exmpl')
            ->with([
                'name' => 'Murilo',
                'link' => 'http://localhost:8000'
            ]);

        // return $this->view($this->view)
        //     ->from("bc.murilo.mbc@gmail.com", "SIG")
        //     ->subject($this->titulo)
        //     ->with('dados', $this->dados);
    }
}
