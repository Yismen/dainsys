<div>
    <div class="modal fade" tabindex="-1" role="dialog" id="dispositionModal" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        @if ($editing)
                        Edit Disposition {{ $name }}
                        @else
                        Adding Disposition {{ $name }}
                        @endif
                    </h4>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                                    placeholder="" wire:model='name'>

                                @error('name')
                                <span class="text-red text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="contacts">Contacts</label>
                                <input type="number" class="form-control" id="firstModalElement"
                                    aria-describedby="helpId" placeholder="" min="0" max="10" step="1"
                                    wire:model='contacts'>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="sales">Sales</label>
                                <input type="number" class="form-control" id="sales" aria-describedby="helpId"
                                    placeholder="" min="0" max="10" step="1" wire:model='sales'>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="upsales">Upsales</label>
                                <input type="number" class="form-control" id="upsales" aria-describedby="helpId"
                                    placeholder="" min="0" max="10" step="1" wire:model='upsales'>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="cc_sales">CC Sales</label>
                                <input type="number" class="form-control" id="cc_sales" aria-describedby="helpId"
                                    placeholder="" min="0" max="10" step="1" wire:model='cc_sales'>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}

                    @if ($editing)
                    <button type="submit" class="btn btn-warning" wire:click='update'>Update</button>
                    @else
                    <button type="submit" class="btn btn-primary" wire:click='create'>Create</button>
                    @endif
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    @push('scripts')
    <script>
        document.addEventListener('showDispositionModal', e => {
            $('#dispositionModal').modal('show');
            $('#firstModalElement').focus();
        })
        document.addEventListener('closeDispositionModal', e => {
            $('#dispositionModal').modal('hide');
        })
    </script>
    @endpush
</div>