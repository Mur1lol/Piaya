@component('mail::message')
Olá **{{$name}}**,  {{-- use double space for line break --}}
Obrigado por utilizar o Piaya!

@component('mail::button', ['url' => $link])
Entrar no site
@endcomponent
Atenciosamente,  
Piaya team.
@endcomponent