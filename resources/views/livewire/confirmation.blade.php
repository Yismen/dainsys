<div style="color: #000!important;">    
    <a class="{{ $button_class }}" wire:click.prevent="show()">
        <i class="{{ $icon }}"></i>
        {{ $button_text }}
    </a>
    
    <div class="modal fade" id="confirmation-{{ $name }}-{{ $model_id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">{{ $title }}</h4>
                </div>
                <div class="modal-body">
                    {{ $message }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" wire:click="cancelled">Close</button>
                    <button type="button" class="btn btn-danger" wire:click="confirmed()">
                        Confirm
                    </button>
                </div>
            </div>
        </div>
    </div>

        <script>            
            (function() {
                window.addEventListener("show{{ $name }}{{ $model_id }}Confirmation", event => {
                    $("#confirmation-{{ $name }}-{{ $model_id }}").modal('show');
                });
                
                window.addEventListener("hide{{ $name }}{{ $model_id }}Confirmation", event => {
                    $("#confirmation-{{ $name }}-{{ $model_id }}").modal('hide');
                });
            })();
        </script>
    
</div>