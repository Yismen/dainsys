<div>
    <x-card type="primary">
        <x-slot name="header">
            <div class="d-flex justify-space-between">
                <div>
                    Dispositions List
                    <span class="badge bg-blue">{{ $dispositions->total() }}</span>
                </div>

                <div class="w-40">
                    <input type="search" class="form-control w-50" wire:model='search'>
                </div>
            </div>

        </x-slot>

        <table class="table table-hover table-xs table-condensed">
            <thead>
                <tr>
                    <th wire:click='orderBy("name")' style="cursor: pointer">Name</th>
                    <th wire:click='orderBy("contacts")' style="cursor: pointer">Contacts</th>
                    <th wire:click='orderBy("sales")' style="cursor: pointer">Sales</th>
                    <th wire:click='orderBy("upsales")' style="cursor: pointer">Upsales</th>
                    <th wire:click='orderBy("cc_sales")' style="cursor: pointer">CC Sales</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dispositions as $disposition)
                <tr>
                    <td>{{ $disposition->name }}</td>
                    <td>{{ $disposition->contacts }}</td>
                    <td>{{ $disposition->sales }}</td>
                    <td>{{ $disposition->upsales }}</td>
                    <td>{{ $disposition->cc_sales }}</td>
                    <td>
                        <button class="btn btn-warning btn-xs"
                            wire:click='$emit("wantsEdit", {{ $disposition }})'>Edit</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <x-slot name="footer">

            {{ $dispositions->links('layouts.pagination') }}
        </x-slot>

    </x-card>

</div>