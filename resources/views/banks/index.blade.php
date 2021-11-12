<x-view page_header="{{ __('Banks') }}" page_description="{{ __('Banks') }} {{ __('Management') }}">
    @include('banks.create')

    <x-box type="primary">
        <x-slot name="header">
            <h3>Banks List</h3>    
        </x-slot>

        <x-table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th class="col-xs-2">
                        Edit
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($banks as $bank)
                <tr>
                    <td>{{ $bank->name }}</td>
                    <td>
                        <a href="/admin/banks/{{ $bank->id }}/edit"><i class="fa fa-edit"></i> Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </x-table>
    </x-box>
</x-view>