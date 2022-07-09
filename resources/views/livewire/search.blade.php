<div>
    <div class="form-group">
        <div class="{{ $count > 0 ? 'input-group' : '' }}">
            <input type="text"
                class="form-control {{ $count > 0 ? 'bg-blue' : '' }}" 
                name="" id="search-component" 
                aria-describedby="helpId" 
                placeholder="Sarch (press / to focus)"
                wire:model.{{ $debounce }}="search"
            >
            @if ($count > 0)
                <div class="input-group-btn" wire:click="$set('search', '')" title="Tab away or press enter to perform search!">
                    <button class="btn btn-defailt">X</button>
                </div>
            @endif
        </div>
        {{-- @if ($debounce == 'lazy')
            <small id="helpId" class="form-text text-muted">Tab away or press enter to perform search!</small>
        @endif --}}
    </div>
    
    <script>
        document.addEventListener('keydown', e => {
            let element = document.getElementById('search-component');
    
            if (element) {
                if (e.key === '/') {
                    e.preventDefault();
                    element.focus();
                }
            }
        })
    </script>
</div>

