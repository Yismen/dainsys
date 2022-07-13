<div class="container">
    <!-- Modal -->
    <div
        class="modal fade"
        id="stepModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="modelTitleId"
        aria-hidden="true"
        wire:ignore.self
    >
        <div class="modal-dialog" role="document">
            <form wire:submit.prevent="{{ $is_editing ? 'update' : 'store' }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            @if ($is_editing)
                                Update Step {{ $fields['name'] }}
                            @else
                                Adding New Step
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
                            <input
                                type="text"
                                class="form-control"
                                name="name"
                                id="name"
                                aria-describedby="helpId"
                                placeholder=""
                                wire:model.lazy="fields.name"
                            >
                            @error('fields.name')
                                <div class="help-block">
                                    {{ $message }}
                                </div>                          
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-sm-6">                        
                                {{-- Process --}}
                                <div class="form-group @error('fields.process_id') has-error @enderror">
                                    <label for="process_id">Process</label>
                                    <select
                                        class="form-control"
                                        id="process_id"
                                        wire:model.lazy="fields.process_id"
                                    >
                                        <option value=""></option>
                                        @foreach ($processes as $process)
                                            <option value="{{ $process->id }}" wire:key="{{ $process->id }}">{{ $process->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('fields.process_id')
                                        <div class="help-block">
                                            {{ $message }}
                                        </div>                          
                                    @enderror
                                </div>

                            </div>
                            <div class="col-sm-6">                        
                                {{-- Order --}}
                                <div class="form-group @error('fields.order') has-error @enderror">
                                    <label for="order">Order</label>
                                    <input
                                        type="number"
                                        step="1"
                                        min="0"
                                        class="form-control"
                                        id="order"
                                        aria-describedby="helpId"
                                        placeholder=""
                                        wire:model.lazy="fields.order"
                                    >
                                    @error('fields.order')
                                        <div class="help-block">
                                            {{ $message }}
                                        </div>                          
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        {{-- Description --}}
                        <div class="form-group @error('fields.description') has-error @enderror">
                            <label for="description">Description</label>
                            <textarea
                                type="text"
                                class="form-control"
                                id="description"
                                aria-describedby="helpId"
                                rows="5"
                                wire:model.lazy="fields.description"
                            ></textarea>
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
</div>


@push('scripts')
<script>
    (function() {
        document.addEventListener('showStepModal', () => {
            $('#stepModal').modal('show');
        });
        
        document.addEventListener('hideStepModal', () => {
            $('#stepModal').modal('hide');
        });
    })()
</script>
@endpush
