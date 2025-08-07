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
                                placeholder="" wire:model.lazy="fields.name" {{ $is_showing ? 'disabled readonly' : '' }}>
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
                                placeholder="" wire:model.lazy="fields.key"  {{ $is_showing ? 'disabled readonly' : '' }}>
                            @error('fields.name')
                            <div class="help-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        {{-- Active --}}

                        <div class="form-group @error('fields.default') has-error @enderror">
                            <div class="radio"  {{ $is_showing ? 'disabled readonly' : '' }}>
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
                                placeholder="" wire:model.lazy="fields.description"  {{ $is_showing ? 'disabled readonly' : '' }}>
                            </textarea>
                            @error('fields.description')
                            <div class="help-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>



                        {{-- Recipients --}}
                        <div class="form-group @error('fields.title') has-error @enderror" style="max-height: 200px; overflow-y: auto;">
                            <label for="title">Recipients</label>
                            <br>
                            @if ($report && $report?->recipients->isEmpty() == false)
                                @if ($this->is_showing )
                                    @foreach ($report->recipients as $recipient)
                                        <span class="badge badge-info">{{ $recipient->name }}</span>

                                    @endforeach
                                @else
                                    @foreach ($this->fields['all_recipients'] as $id => $name)
                                        <label for="report_{{ $id }}">
                                            <input type="checkbox" name="recipients[]" value="{{ $id }}"
                                            id="report_{{ $id }}"
                                                wire:model.lazy="fields.recipients" {{ in_array($id, $this->fields['recipients']) ? 'checked' : '' }}
                                                wire:key="{{ $id }}">
                                            {{ $name }}
                                        </label>
                                        <br>
                                    @endforeach

                                @endif

                            @endif
                        </div>

                    </div>

                    <div class="modal-footer">
                        @unless ($is_showing)
                            @if ($is_editing)
                            <button type="submit" class="btn btn-warning">Update</button>
                            @else
                            <button type="submit" class="btn btn-primary">Create</button>
                            @endif

                        @endunless

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
