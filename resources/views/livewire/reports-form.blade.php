<div class="container">
    <!-- Modal -->
    <div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <form wire:submit.prevent="{{ $is_editing ? 'update' : 'store' }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            @if ($is_editing)
                            Update Report {{ $fields['name'] }}
                            @else
                            Adding New Report
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

                        {{-- Key --}}
                        <div class="form-group @error('fields.key') has-error @enderror">
                            <label for="key">Key</label>
                            <input type="text" class="form-control" required name="key" id="key" aria-describedby="helpId"
                                placeholder="" wire:model.lazy="fields.key">
                            @error('fields.name')
                            <div class="help-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        {{-- Active --}}

                        <div class="form-group @error('fields.default') has-error @enderror">
                            <div class="radio">
                                Is Active:
                                <label>
                                    <input type="radio" name="active" id="active-yes" value="1"
                                        wire:model="fields.active">
                                    Yes
                                </label>
                                <label>
                                    <input type="radio" name="active" id="active-yes" value="0"
                                        wire:model="fields.active">
                                    No
                                </label>
                            </div>
                            @error('fields.message')
                            <div class="help-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        {{-- Description --}}
                        <div class="form-group @error('fields.description') has-error @enderror">
                            <label for="description">Description</label>
                            <textarea type="text" class="form-control" name="description" id="description" aria-describedby="helpId"
                                placeholder="" wire:model.lazy="fields.description">
                            </textarea>
                            @error('fields.description')
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
            document.addEventListener('showReportModal', () => {
                $('#reportModal').modal('show');
            });

            document.addEventListener('hideReportModal', () => {
                $('#reportModal').modal('hide');
            });
        })()
    </script>
    @endpush
</div>
