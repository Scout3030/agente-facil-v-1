@component('mail::message')

# {{ __("¡Nueva operación registrada en el sistema!") }}

@component('mail::button', ['url' => url('/operation/'.$operation->id), 'color' => 'success'])
Ver operación
@endcomponent

@endcomponent