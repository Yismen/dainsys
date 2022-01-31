<div class="modal fade" tabindex="-1" data-bs-backdrop="static" wire:ignore.self>
    @if($component)
        @livewire($component, $params)
    @endif
</div>

@push('scripts')
    <script>
        let modalElement = $('.modal');

        // document.addEventListener('hidden.bs.modal', () => {
        //     Livewire.emit('resetModal');
        // });        

        Livewire.on('showBootstrapModal', () => {
            let modal = modalElement.modal('show');
        });

        Livewire.on('hideModal', () => {
            let modal = modalElement.modal('hide');
        });
    </script>
@endpush
