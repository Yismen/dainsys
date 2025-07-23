<div class="container">
    <!-- Modal -->
    <div class="modal fade" id="recipientModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <form wire:submit.prevent="{{ $is_editing ? 'update' : 'store' }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            @if ($is_editing)
                            Update Recipient {{ $fields['name'] }}
                            @else
                            Adding New Recipient
                            @endif
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        {{-- Name --}}
                        <div class="form-group @error('fields.name') has-error @enderror">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" required
                                placeholder="" wire:model.lazy="fields.name">
                            @error('fields.name')
                            <div class="help-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="form-group @error('fields.email') has-error @enderror">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" required name="email" id="email" aria-describedby="helpId"
                                placeholder="" wire:model.lazy="fields.email">
                            @error('fields.name')
                            <div class="help-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        {{-- Title --}}
                        <div class="form-group @error('fields.title') has-error @enderror">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId"
                                placeholder="" wire:model.lazy="fields.title">
                            @error('fields.title')
                            <div class="help-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        @if ($is_editing)
                        <button type="submit" class="btn btn-warning">Update</button>
                        @else
                        <button type="submit" class="btn btn-primary">Create</button>
                        @endif
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>




    @push('scripts')
    <script>
        (function() {
            document.addEventListener('showRecipientModal', () => {
                $('#recipientModal').modal('show');
            });

            document.addEventListener('hideRecipientModal', () => {
                $('#recipientModal').modal('hide');
            });
        })()
    </script>
    @endpush
</div>
