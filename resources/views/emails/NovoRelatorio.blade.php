@component('mail::message')
<h2>Oi {{$body['name']}},</h2>
<p>Foi feito uma nova manutenção, os detalhes você pode acessar pelo link abaixo: 

@component('mail::button', ['url' => $body['url_a']]) Detalhes
@endcomponent</p>
 


 
 
Espero que goste!<br>


@endcomponent