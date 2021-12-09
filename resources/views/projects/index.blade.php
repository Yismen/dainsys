@php
    use Illuminate\Support\Str;
@endphp
@inject('layout', 'App\Layout')
@extends('layouts.'.$layout->app(), ['page_header'=>'Projects', 'page_description'=>'List of projects of production.'])

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="box-header with-border">
                    <h3>
                        Projects List
                        <a href="{{ route('admin.projects.create') }}" class="pull-right">
                            <i class="fa fa-plus"></i> Add
                        </a>
                    </h3>
                </div>

                <form action="/admin/projects/employees" method="POST">
                    @csrf
                    @foreach ($projects as $project)
                        @if ($project->employees->count() > 0)
                            <div class="box box-info">
                                <div class="box-header">
                                    <h4>
                                        <a href="{{ route('admin.projects.show', $project->id) }}"
                                            class="{{ $project->client == null ? 'text-danger' : '' }}"  
                                        >
                                            {{ $project->name }}, {{ optional($project->client)->name }}
                                        </a>
                                        <span class="badge bg-light-blue">{{ $project->employees->count() }}</span>
                                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="pull-right text-info">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </h4>
                                </div>

                                <?php $count = $project->employees->count() == 0 ? 0 : ceil($project->employees->count() / 2) ?>

                                <div class="box-body">
                                    <div class="row">
                                        @foreach ($project->employees->chunk($count) as $chunk)
                                            <div class="col-sm-6">
                                                @foreach ($chunk as $employee)
                                                     <employee-check-box :employee="{{ $employee }}" style="border-top: solid 1px #ccc"
                                                        >,
                                                        {{ optional($employee->supervisor)->name }} -
                                                        {{ optional($employee->position)->name }}
                                                    </employee-check-box>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    {{-- Empty projects --}}
                    <div class="col-sm-4 col-xs-7" style="position: fixed; bottom: 35%; right: 30px; padding: 15px ;  background-color: whitesmoke; border: darkgray; border-style: solid; border-width: thin; z-index: 1000">
                        <div class="input-group">
                            {{ Form::select('project', $projects->filter(function($key,$value){return ! Str::contains($key->name, 'Downtimes');})->pluck('name', 'id'), null, ['class' => 'form-control']) }}
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-info">Re-Assign</button>
                            </span>
                        </div>

                        <x-errors-div></x-errors-div>
                    </div>
                </form>

                <div class="row">
                        {{-- Empty Projects --}}
                        <div class="col-sm-12">
                            <h5>Empty Projects (Without Employees)</h5>
    
                            @foreach ($projects->split(2) as $projectsList)
                                <ul class="list-group col-sm-6">
                                    @foreach ($projectsList as $project)
                                        @if ($project->employees->count() == 0)
                                            <li class="list-group-item">
                                                <a href="{{ route('admin.projects.show', $project->id) }}" class="{{ $project->client == null ? 'text-danger' : '' }}" >
                                                    {{ $project->name }}, {{ optional($project->client)->name }}
                                                </a>
                                                <a href="{{ route('admin.projects.edit', $project->id) }}" class="pull-right text-warning"><i class="fa fa-pencil"></i></a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endforeach
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
