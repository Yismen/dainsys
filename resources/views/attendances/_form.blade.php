
<div class="row">
    <div class="col-xs-12">
        <label for="code_id">Attendance Code:</label>
        <x-fields.select
            field-name="code_id"
            :items="$attendance->codesList->pluck('name', 'id')"
        ></x-fields.select>
    </div>

    <div class="col-xs-12">
        @component('components.fields.date', [
            'value' => $attendance->date
        ])
        @endcomponent       
    </div>
    <div class="col-xs-12">
        @component('components.fields.text_area', [
            'field_name' => 'comments',
            'value' => $attendance->comments,
            'required' => false,
        ])
            Comments:
        @endcomponent       
    </div>
</div>