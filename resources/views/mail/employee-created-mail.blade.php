@component('mail::message')
# Empleado Creado

Por este medio te notificamos que el empleado {{ $employee->full_name }} ha sido agregado al sistema, con fecha de
entrada {{
$employee->hire_date->format('d-M-Y') }}. Para más detalles visitar su perfil.

@component('mail::button', ['url' => route('admin.employees.show', $employee->id)])
{{ $employee->full_name }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent