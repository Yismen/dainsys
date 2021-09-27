@include('dashboards.human_resources._doughnut_chart', [
    'title' => __('HC')." ". __('By') . " ".__('Sites'),
    'data_key' => 'by_site',
    'link_route' => route('admin.sites.index')
])

@include('dashboards.human_resources._doughnut_chart', [
    'title' => __('HC')." ". __('By') . " ".__('Project')."s",
    'data_key' => 'by_project',
    'link_route' => route('admin.projects.index')
])

@include('dashboards.human_resources._doughnut_chart', [
    'title' => __('HC')." ". __('By') . " ".__('Gender'),
    'data_key' => 'by_gender',
    'link_route' => "#"
])

@include('dashboards.human_resources._doughnut_chart', [
    'title' => __('HC')." ". __('By') . " ".__('Department')."s",
    'data_key' => 'by_department',
    'link_route' => route('admin.departments.index')
])

@include('dashboards.human_resources._doughnut_chart', [
    'title' => __('HC')." ". __('By') . " ".__('Positions'),
    'data_key' => 'by_position',
    'link_route' => route('admin.positions.index')
])

@include('dashboards.human_resources._doughnut_chart', [
    'title' => __('HC')." ". __('By') . " ".__('Supervisors'),
    'data_key' => 'by_supervisor',
    'link_route' => route('admin.supervisors.index')
])

@include('dashboards.human_resources._doughnut_chart', [
    'title' => __('HC')." ". __('By') . " ".__('Nationality'),
    'data_key' => 'by_nationality',
    'link_route' => route('admin.nationalities.index')
])