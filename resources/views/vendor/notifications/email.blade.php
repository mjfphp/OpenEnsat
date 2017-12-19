@component('mail::message')

<pre>
  Nos salutations ,

      Pour récupérer votre mot de passe veuillez s'il vous plait clicker le lien :
</pre>
{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
            $color = 'green';
            break;
        case 'error':
            $color = 'red';
            break;
        default:
            $color = 'blue';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

<pre>
  Website : <a href="localhost:8000/password/reset">OpenEnsat</a>
</pre>

@endcomponent
