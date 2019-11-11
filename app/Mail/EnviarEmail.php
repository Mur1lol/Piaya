<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnviarEmail extends Mailable {
    use Queueable, SerializesModels;
    public $email;
    public $nome;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $nome)
    {
        $this->email = $email;
        $this->nome = $nome;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->from($this->email, $this->nome)
            ->subject('Solicitação de Administração')
            ->markdown('mails.exmpl')
            ->with([
                'name' => 'Murilo',
                'link' => 'http://localhost:8000'
            ]);

        // return $this->view($this->view)
        //     ->from($this->email, $this->nome)
        //     ->subject($this->titulo)
        //     ->with('dados', $this->dados);
    }
}
