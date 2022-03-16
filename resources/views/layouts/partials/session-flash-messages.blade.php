{{--  @if(session()->has('alert'))
    <flash-message
        type="{{ $class }}"
        heading="{{ $title }}"
        message="{{ $message }}"
    ></flash-message>
@endif  --}}
    <!-- Global Messages to be Printed -->
	<?php
        $class = null;
        $message = null;
        $title = null;
        $icon = null;

        if (session()->has('global')) {
            $class = 'global';
            $title = 'Attention';
            $message = session()->get('global');
            $icon = 'info';
        } elseif (session()->has('info')) {
            $class = 'info';
            $title = 'Attention';
            $message = session()->get('info');
            $icon = 'info';
        } elseif (session()->has('success')) {
            $class = 'success';
            $title = 'Nice';
            $message = session()->get('success');
            $icon = 'check-circle';
        } elseif (session()->has('danger')) {
            $class = 'error';
            // $class = 'danger';
            $title = 'Oops';
            $message = session()->get('danger');
            $icon = 'exclamation-triangle';
        } elseif (session()->has('warning')) {
            $class = 'warning';
            $title = 'Warning';
            $message = session()->get('warning');
            $icon = 'exclamation-circle';
        }elseif (session()->has('question')) {
            $class = 'question';
            $title = '??';
            $message = session()->get('question');
            $icon = 'exclamation-circle';
        }
    ?>

	@if($class)
        <flash-message
            type="{{ $class }}"
            title="{{ $title }}"
            text="{{ $message }}"
            show-confirm-button="{{ false }}"
            position="{{ config('dainsys.flash_position', 'bottom-end') }}"
            toast="{{ config('dainsys.flash_as_toast', false) }}"
        ></flash-message>
	@endif
	<!-- /. Warning Messages -->
