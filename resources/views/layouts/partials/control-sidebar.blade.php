<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li class="active">
            <a href="#control-sidebar-theme-demo-options-tab" data-toggle="tab">
                <i class="fa fa-wrench"></i>
            </a>
        </li>
        <li>
            <a href="#control-sidebar-home-tab" data-toggle="tab">
                <i class="fa fa-home"></i>
            </a>
        </li>
        <li>
            <a href="#control-sidebar-settings-tab" data-toggle="tab">
                <i class="fa fa-gears"></i>
            </a>
        </li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane" id="control-sidebar-home-tab">
            <h4 class="control-sidebar-heading">Available Space</h4>
            <div class="form-group">
                Content Here
            </div>
        </div>
        <div id="control-sidebar-theme-demo-options-tab" class="tab-pane active">
            <h4 class="control-sidebar-heading">Layout Options</h4>
            {!! Form::model($settings, ['route'=>['admin.users.settings']]) !!}
                {{--  /Default Route  --}}
                <div class="form-group">
                    <label>Layouts</label>
                    <div class="btn-group btn-group-xs" data-toggle="buttons">
                        <label class="btn btn-primary {{ isset($settings->layout) && $settings->layout == 'default' ? 'active' : '' }}">
                            {!! Form::radio('layout', 'default', null, []) !!} Default
                        </label>
                        <label class="btn btn-primary {{ isset($settings->layout) && $settings->layout == 'fixed' ? 'active' : '' }}">
                            {!! Form::radio('layout', 'fixed', null, ['id'=>'fixed']) !!} Fixed
                        </label>
                        <label class="btn btn-primary {{ isset($settings->layout) && $settings->layout == 'layout-boxed' ? 'active' : '' }}">
                            {!! Form::radio('layout', 'layout-boxed', null, ['id'=>'layout-boxed']) !!} Boxed
                        </label>
                        <label class="btn btn-primary {{ isset($settings->layout) && $settings->layout == 'layout-top-nav' ? 'active' : '' }}">
                            {!! Form::radio('layout', 'layout-top-nav', null, ['id'=>'layout-top-nav']) !!} Top Nav
                        </label>
                    </div>
                    {{--  {!! $errors->first('layout', '<span class="text-danger">:message</span>') !!}  --}}
                </div>
                {{--  /Layouts  --}}
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('sidebar', 'sidebar-collapse', null, []) !!}
                            Hide Side Bar
                        </label>
                    </div>
                </div>
                {{--  /Side Bar  --}}
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('sidebar_mini', 'sidebar-mini', null, []) !!}
                            Keep Mini Side Bar
                        </label>
                    </div>
                </div>
                {{--  /Mini Side Bar  --}}
                <div class="form-group">
                    <label>Skins</label>
                    <div class="btn-group btn-group-xs" data-toggle="buttons">
                        <label class="btn btn-primary {{  isset($settings->skin) && $settings->skin == 'skin-blue' ? 'active' : '' }}">
                            {!! Form::radio('skin', 'skin-blue', null, []) !!}
                            <span class="px-2 py-1 bg-blue"> Blue</span>
                        </label>
                        <label class="btn btn-primary {{ isset($settings->skin) && $settings->skin == 'skin-green' ? 'active' : '' }}">
                            {!! Form::radio('skin', 'skin-green', null, []) !!}
                            <span class="px-2 py-1 bg-green"> Green</span>
                        </label>
                        <label class="btn btn-primary {{ isset($settings->skin) && $settings->skin == 'skin-black' ? 'active' : '' }}">
                            {!! Form::radio('skin', 'skin-black', null, []) !!}
                            <span class="px-2 py-1 bg-black"> Black</span>
                        </label>
                        <label class="btn btn-primary {{ isset($settings->skin) && $settings->skin == 'skin-purple' ? 'active' : '' }}">
                            {!! Form::radio('skin', 'skin-purple', null, []) !!}
                            <span class="px-2 py-1 bg-purple"> Purple</span>
                        </label>
                        <label class="btn btn-primary {{ isset($settings->skin) && $settings->skin == 'skin-yellow' ? 'active' : '' }}">
                            {!! Form::radio('skin', 'skin-yellow', null, []) !!}
                            <span class="px-2 py-1 bg-yellow"> Yellow</span>
                        </label>
                        <label class="btn btn-primary {{ isset($settings->skin) && $settings->skin == 'skin-red' ? 'active' : '' }}">
                            {!! Form::radio('skin', 'skin-red', null, []) !!}
                            <span class="px-2 py-1 bg-red"> Red</span>
                        </label>

                        <label class="btn btn-primary {{ isset($settings->skin) && $settings->skin == 'skin-blue-light' ? 'active' : '' }}">
                            {!! Form::radio('skin', 'skin-blue-light', null, []) !!}
                            <span class="px-2 py-1 bg-blue"> Blue Light</span>
                        </label>
                        <label class="btn btn-primary {{ isset($settings->skin) && $settings->skin == 'skin-green-light' ? 'active' : '' }}">
                            {!! Form::radio('skin', 'skin-green-light', null, []) !!}
                            <span class="px-2 py-1 bg-green"> Green Light</span>
                        </label>
                        <label class="btn btn-primary {{ isset($settings->skin) && $settings->skin == 'skin-black-light' ? 'active' : '' }}">
                            {!! Form::radio('skin', 'skin-black-light', null, []) !!}
                            <span class="px-2 py-1 bg-black"> Black Light</span>
                        </label>
                        <label class="btn btn-primary {{ isset($settings->skin) && $settings->skin == 'skin-purple-light' ? 'active' : '' }}">
                            {!! Form::radio('skin', 'skin-purple-light', null, []) !!}
                            <span class="px-2 py-1 bg-purple"> Purple Light</span>
                        </label>
                        <label class="btn btn-primary {{ isset($settings->skin) && $settings->skin == 'skin-yellow-light' ? 'active' : '' }}">
                            {!! Form::radio('skin', 'skin-yellow-light', null, []) !!}
                            <span class="px-2 py-1 bg-yellow"> Yellow Light</span>
                        </label>
                        <label class="btn btn-primary {{ isset($settings->skin) && $settings->skin == 'skin-red-light' ? 'active' : '' }}">
                            {!! Form::radio('skin', 'skin-red-light', null, []) !!}
                            <span class="px-2 py-1 bg-red"> Red Light</span>
                        </label>
                    </div>
                </div>
                {{--  /Skins  --}}
                <div class="form-group">
                    <button class="btn btn-success">Save</button>
                </div>
                {{--  /Mini Side Bar  --}}
            {!! Form::close() !!}
            {{--  {!!dd(json_decode($user->settings->data))!!}  --}}
        </div>
        <!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
            <h4 class="control-sidebar-heading">Available Space 2...</h4>
            <div class="form-group">
                Content Here
            </div>
        </div>
        <!-- /.tab-pane -->
    </div>
</aside>
