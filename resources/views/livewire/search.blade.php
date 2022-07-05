<div>
    <div class="form-group">
        <div class="{{ $count > 0 ? 'input-group' : '' }}">
            <input type="text"
                class="form-control {{ $count > 0 ? 'bg-blue' : '' }}" 
                name="" id="" 
                aria-describedby="helpId" 
                placeholder="Sarch"
                wire:model.{{ $debounce }}="search"
            >
            @if ($count > 0)
                <div class="input-group-btn" wire:click="$set('search', '')">
                    <button class="btn btn-defailt">X</button>
                </div>
            @endif
        </div>
        @if ($debounce == 'lazy')
            <small id="helpId" class="form-text text-muted">Tab away or press enter to perform search!</small>
        @endif
    </div>
</div>