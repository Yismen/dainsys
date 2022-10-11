<div>

    <x-card type="danger">
        <x-slot name="header">
            <div class="d-flex justify-space-between">
                <div>
                    Pending Identification
                    <span class="badge bg-red">{{ $dispositions->total() }}</span>
                </div>

                <div class="w-40">
                    <input type="search" class="form-control w-50" wire:model='search'>
                </div>
            </div>
        </x-slot>

        <table class="table table-hover table-xs table-condensed">
            <thead>
                <tr>
                    <th wire:click='orderBy("agent_disposition")' style="cursor: pointer">Name</th>
                    <th wire:click='orderBy("dial_group_prefix")' style="cursor: pointer">Dial Group</th>
                    <th>Records</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dispositions as $disposition)
                <tr>
                    <td>{{ $disposition->agent_disposition }}</td>
                    <td>{{ $disposition->dial_group_prefix }}</td>
                    <td>{{ $disposition->records }}</td>
                    <td>
                        <button class="btn btn-primary btn-xs"
                            wire:click='$emit("wantsCreate", {{ $disposition }})'>Add</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            {{ $dispositions->links('layouts.pagination') }}
        </div>

    </x-card>

</div>