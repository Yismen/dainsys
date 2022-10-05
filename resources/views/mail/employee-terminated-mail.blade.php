@component('mail::message')
# Empleado Terminado

Por este medio te notificamos que el empleado {{ $employee->full_name }} ha sido terminado, con fecha de salida {{
$employee->termination->termination_date->format('d-M-Y') }}. Para más detalles visitar su perfil.

@component('mail::button', ['url' => route('admin.employees.show', $employee->id)])
{{ $employee->full_name }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent