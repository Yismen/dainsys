<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Dainsys Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var baseUrl = "dainsys.test";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-3.29.1.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-3.29.1.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image" />
    </span>
</a>
<div class="tocify-wrapper">
            <img src="images/logo-with-text.png" alt="logo" class="logo" style="padding-top: 10px;" width="230px"/>
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                                                                            <ul id="tocify-header-0" class="tocify-header">
                    <li class="tocify-item level-1" data-unique="introduction">
                        <a href="#introduction">Introduction</a>
                    </li>
                                            
                                                                    </ul>
                                                <ul id="tocify-header-1" class="tocify-header">
                    <li class="tocify-item level-1" data-unique="authenticating-requests">
                        <a href="#authenticating-requests">Authenticating requests</a>
                    </li>
                                            
                                                </ul>
                    
                    <ul id="tocify-header-2" class="tocify-header">
                <li class="tocify-item level-1" data-unique="dashboards">
                    <a href="#dashboards">Dashboards</a>
                </li>
                                    <ul id="tocify-subheader-dashboards" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="dashboards-GETapi-dashboards-human_resources-head_counts">
                        <a href="#dashboards-GETapi-dashboards-human_resources-head_counts">Dashboards Human Resources Head Counts</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="dashboards-GETapi-dashboards-human_resources-attritions">
                        <a href="#dashboards-GETapi-dashboards-human_resources-attritions">Dashboards Human Resources Month Attritions</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="dashboards-GETapi-dashboards-human_resources-hc_by_project">
                        <a href="#dashboards-GETapi-dashboards-human_resources-hc_by_project">Dashboards Human Resources Head Counts by Projects</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="dashboards-GETapi-dashboards-human_resources-hc_by_gender">
                        <a href="#dashboards-GETapi-dashboards-human_resources-hc_by_gender">Dashboards Human Resources Head Counts by Gender</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="dashboards-GETapi-dashboards-human_resources-hc_by_department">
                        <a href="#dashboards-GETapi-dashboards-human_resources-hc_by_department">Dashboards Human Resources Head Counts by Departments</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="dashboards-GETapi-dashboards-production-mtd_stats">
                        <a href="#dashboards-GETapi-dashboards-production-mtd_stats">Dashboards Production Month To Date Stats</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="dashboards-GETapi-dashboards-production-monthly_stats">
                        <a href="#dashboards-GETapi-dashboards-production-monthly_stats">Dashboards Production Monthly Stats</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="dashboards-GETapi-v2-dashboards-human_resources-head_counts">
                        <a href="#dashboards-GETapi-v2-dashboards-human_resources-head_counts">Dashboards Human Resources Head Counts</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="dashboards-GETapi-v2-dashboards-human_resources-attritions">
                        <a href="#dashboards-GETapi-v2-dashboards-human_resources-attritions">Dashboards Human Resources Month Attritions</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="dashboards-GETapi-v2-dashboards-human_resources-hc_by_project">
                        <a href="#dashboards-GETapi-v2-dashboards-human_resources-hc_by_project">Dashboards Human Resources Head Counts by Projects</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="dashboards-GETapi-v2-dashboards-human_resources-hc_by_gender">
                        <a href="#dashboards-GETapi-v2-dashboards-human_resources-hc_by_gender">Dashboards Human Resources Head Counts by Gender</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="dashboards-GETapi-v2-dashboards-human_resources-hc_by_department">
                        <a href="#dashboards-GETapi-v2-dashboards-human_resources-hc_by_department">Dashboards Human Resources Head Counts by Departments</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="dashboards-GETapi-v2-dashboards-production-mtd_stats">
                        <a href="#dashboards-GETapi-v2-dashboards-production-mtd_stats">Dashboards Production Month To Date Stats</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="dashboards-GETapi-v2-dashboards-production-monthly_stats">
                        <a href="#dashboards-GETapi-v2-dashboards-production-monthly_stats">Dashboards Production Monthly Stats</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-3" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-user">
                        <a href="#endpoints-GETapi-user">Authenticated User</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-afps">
                        <a href="#endpoints-POSTapi-afps">Store Afps</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-arss">
                        <a href="#endpoints-POSTapi-arss">Store Ars</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-banks">
                        <a href="#endpoints-POSTapi-banks">Store Banks</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-positions">
                        <a href="#endpoints-POSTapi-positions">Store Positions</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-supervisors">
                        <a href="#endpoints-POSTapi-supervisors">Store Supervisors</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-departments">
                        <a href="#endpoints-POSTapi-departments">Store Departmens</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-payment_frequencies">
                        <a href="#endpoints-POSTapi-payment_frequencies">Store Payment Frequencies</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-nationalities">
                        <a href="#endpoints-POSTapi-nationalities">Store Nationalities</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-employees--employee--vip">
                        <a href="#endpoints-POSTapi-employees--employee--vip">Update VIP</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-employees--employee--universal">
                        <a href="#endpoints-POSTapi-employees--employee--universal">Update Universal</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-employees">
                        <a href="#endpoints-GETapi-employees">Employees All</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-employees-all">
                        <a href="#endpoints-GETapi-employees-all">Employees All</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-employees-actives">
                        <a href="#endpoints-GETapi-employees-actives">Employees Actives</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-employees-recents">
                        <a href="#endpoints-GETapi-employees-recents">Employees Recents</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-holidays">
                        <a href="#endpoints-GETapi-holidays">Holidays Dates</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-overnight_hours">
                        <a href="#endpoints-GETapi-overnight_hours">Overnight Hours</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-notifications-unread">
                        <a href="#endpoints-GETapi-notifications-unread">Notifications Unread</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-notifications-mark-all-as-read">
                        <a href="#endpoints-POSTapi-notifications-mark-all-as-read">Notifications Mark all as Read</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-notifications-show--notification-">
                        <a href="#endpoints-GETapi-notifications-show--notification-">Notification Details</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-v2-user">
                        <a href="#endpoints-GETapi-v2-user">Authenticated User</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v2-employees--employee--vip">
                        <a href="#endpoints-POSTapi-v2-employees--employee--vip">Update VIP</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v2-notifications-mark-all-as-read">
                        <a href="#endpoints-POSTapi-v2-notifications-mark-all-as-read">Notifications Mark all as Read</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-v2-notifications-unread">
                        <a href="#endpoints-GETapi-v2-notifications-unread">Notifications Unread</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-v2-overnight_hours">
                        <a href="#endpoints-GETapi-v2-overnight_hours">Overnight Hours</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-v2-holidays">
                        <a href="#endpoints-GETapi-v2-holidays">Holidays Dates</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v2-positions">
                        <a href="#endpoints-POSTapi-v2-positions">Store Positions</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v2-payment_frequencies">
                        <a href="#endpoints-POSTapi-v2-payment_frequencies">Store Payment Frequencies</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v2-nationalities">
                        <a href="#endpoints-POSTapi-v2-nationalities">Store Nationalities</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v2-departments">
                        <a href="#endpoints-POSTapi-v2-departments">Store Departmens</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-v2-employees">
                        <a href="#endpoints-GETapi-v2-employees">Employees All</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v2-banks">
                        <a href="#endpoints-POSTapi-v2-banks">Store Banks</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v2-arss">
                        <a href="#endpoints-POSTapi-v2-arss">Store Ars</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v2-afps">
                        <a href="#endpoints-POSTapi-v2-afps">Store Afps</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v2-employees--employee--universal">
                        <a href="#endpoints-POSTapi-v2-employees--employee--universal">Update Universal</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-v2-employees-recents">
                        <a href="#endpoints-GETapi-v2-employees-recents">Employees Recents</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-v2-employees-all">
                        <a href="#endpoints-GETapi-v2-employees-all">Employees All</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-v2-employees-actives">
                        <a href="#endpoints-GETapi-v2-employees-actives">Employees Actives</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-v2-notifications-show--notification-">
                        <a href="#endpoints-GETapi-v2-notifications-show--notification-">Notification Details</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-4" class="tocify-header">
                <li class="tocify-item level-1" data-unique="performances">
                    <a href="#performances">Performances</a>
                </li>
                                    <ul id="tocify-subheader-performances" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="performances-GETapi-performances-clients">
                        <a href="#performances-GETapi-performances-clients">Performances Clients</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="performances-GETapi-performances-projects">
                        <a href="#performances-GETapi-performances-projects">Performances Projects</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="performances-GETapi-performances-campaigns">
                        <a href="#performances-GETapi-performances-campaigns">Performances Campaigns</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="performances-GETapi-performances-sites">
                        <a href="#performances-GETapi-performances-sites">Performances Sites</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="performances-GETapi-performances-supervisors">
                        <a href="#performances-GETapi-performances-supervisors">Performances Supervisors</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="performances-GETapi-performances-downtime_reasons">
                        <a href="#performances-GETapi-performances-downtime_reasons">Performances Downtime Reasons</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="performances-GETapi-performances-employees">
                        <a href="#performances-GETapi-performances-employees">Performances Employees</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="performances-GETapi-performances-downtimes">
                        <a href="#performances-GETapi-performances-downtimes">Performances Downtimes</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="performances-GETapi-performances-login_names">
                        <a href="#performances-GETapi-performances-login_names">Performances Login Names</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="performances-GETapi-performances-schedules">
                        <a href="#performances-GETapi-performances-schedules">Performances Schedules</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="performances-GETapi-performances-supervisors-actives">
                        <a href="#performances-GETapi-performances-supervisors-actives">Performances Active Supervisors</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="performances-GETapi-performances-performance_data-last--many--months">
                        <a href="#performances-GETapi-performances-performance_data-last--many--months">Performances Data</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="performances-GETapi-v2-projects">
                        <a href="#performances-GETapi-v2-projects">Performances Projects</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="performances-GETapi-v2-supervisors-actives">
                        <a href="#performances-GETapi-v2-supervisors-actives">Performances Active Supervisors</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="performances-GETapi-v2-supervisors">
                        <a href="#performances-GETapi-v2-supervisors">Performances Supervisors</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="performances-GETapi-v2-sites">
                        <a href="#performances-GETapi-v2-sites">Performances Sites</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="performances-GETapi-v2-schedules">
                        <a href="#performances-GETapi-v2-schedules">Performances Schedules</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="performances-POSTapi-v2-supervisors">
                        <a href="#performances-POSTapi-v2-supervisors">Store Supervisors</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="performances-GETapi-v2-login_names">
                        <a href="#performances-GETapi-v2-login_names">Performances Login Names</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="performances-GETapi-v2-downtimes">
                        <a href="#performances-GETapi-v2-downtimes">Performances Downtimes</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="performances-GETapi-v2-downtime_reasons">
                        <a href="#performances-GETapi-v2-downtime_reasons">Performances Downtime Reasons</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="performances-GETapi-v2-clients">
                        <a href="#performances-GETapi-v2-clients">Performances Clients</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="performances-GETapi-v2-campaigns">
                        <a href="#performances-GETapi-v2-campaigns">Performances Campaigns</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="performances-GETapi-v2-performances">
                        <a href="#performances-GETapi-v2-performances">Performances Data</a>
                    </li>
                                                    </ul>
                            </ul>
        
                        
            </div>

            <ul class="toc-footer" id="toc-footer">
                            <li><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                            <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
                    </ul>
        <ul class="toc-footer" id="last-updated">
        <li>Last updated: May 23 2022</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>
<blockquote>
<p>Base URL</p>
</blockquote>
<pre><code class="language-yaml">http://localhost:8000</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>To authenticate requests, include an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer your-token"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.</p>

        <h1 id="dashboards">Dashboards</h1>

    

            <h2 id="dashboards-GETapi-dashboards-human_resources-head_counts">Dashboards Human Resources Head Counts</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Head Counts data for human resources dashboard</p>

<span id="example-requests-GETapi-dashboards-human_resources-head_counts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/dashboards/human_resources/head_counts?site=a&amp;project=dolores&amp;department=modi&amp;position=libero" \
    --header "Authorization: Bearer 6gh4vZ38DdkbfEePVa6a5c1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/dashboards/human_resources/head_counts"
);

const params = {
    "site": "a",
    "project": "dolores",
    "department": "modi",
    "position": "libero",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer 6gh4vZ38DdkbfEePVa6a5c1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-dashboards-human_resources-head_counts">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
  &quot;head_count&quot;: 75,
  &quot;attrition_mtd&quot;: 1.33,
  &quot;hired_tm&quot;: 5,
  &quot;terminated_tm&quot;: 7,
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dashboards-human_resources-head_counts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dashboards-human_resources-head_counts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dashboards-human_resources-head_counts"></code></pre>
</span>
<span id="execution-error-GETapi-dashboards-human_resources-head_counts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dashboards-human_resources-head_counts"></code></pre>
</span>
<form id="form-GETapi-dashboards-human_resources-head_counts" data-method="GET"
      data-path="api/dashboards/human_resources/head_counts"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer 6gh4vZ38DdkbfEePVa6a5c1","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dashboards-human_resources-head_counts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dashboards-human_resources-head_counts"
                    onclick="tryItOut('GETapi-dashboards-human_resources-head_counts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dashboards-human_resources-head_counts"
                    onclick="cancelTryOut('GETapi-dashboards-human_resources-head_counts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dashboards-human_resources-head_counts" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dashboards/human_resources/head_counts</code></b>
        </p>
                <p>
            <label id="auth-GETapi-dashboards-human_resources-head_counts" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-dashboards-human_resources-head_counts"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-dashboards-human_resources-head_counts"
               value="a"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>project</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project"
               data-endpoint="GETapi-dashboards-human_resources-head_counts"
               value="dolores"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project. Example ?project=%Pub%</p>
            </p>
                    <p>
                <b><code>department</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="department"
               data-endpoint="GETapi-dashboards-human_resources-head_counts"
               value="modi"
               data-component="query" hidden>
    <br>
<p>Limit results to specific department. Example ?department=%Product%</p>
            </p>
                    <p>
                <b><code>position</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="position"
               data-endpoint="GETapi-dashboards-human_resources-head_counts"
               value="libero"
               data-component="query" hidden>
    <br>
<p>Limit results to specific position. Example ?position=%Agente%</p>
            </p>
                </form>

            <h2 id="dashboards-GETapi-dashboards-human_resources-attritions">Dashboards Human Resources Month Attritions</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of attritions by months, including the last 12 months for human resources dashboard</p>

<span id="example-requests-GETapi-dashboards-human_resources-attritions">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/dashboards/human_resources/attritions?site=expedita&amp;project=repellat&amp;department=aperiam&amp;position=officia" \
    --header "Authorization: Bearer PZbe6aDag8Vfdv5h3461ckE" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/dashboards/human_resources/attritions"
);

const params = {
    "site": "expedita",
    "project": "repellat",
    "department": "aperiam",
    "position": "officia",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer PZbe6aDag8Vfdv5h3461ckE",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-dashboards-human_resources-attritions">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">[
    {
        &quot;month&quot;: &quot;2021-01&quot;,
        &quot;head_count&quot;: 10,
        &quot;terminations&quot;: 0,
        &quot;attrition&quot;: &quot;0.00&quot;
    },
    {
        &quot;month&quot;: &quot;2021-02&quot;,
        &quot;head_count&quot;: 10,
        &quot;terminations&quot;: 0,
        &quot;attrition&quot;: &quot;0.00&quot;
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dashboards-human_resources-attritions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dashboards-human_resources-attritions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dashboards-human_resources-attritions"></code></pre>
</span>
<span id="execution-error-GETapi-dashboards-human_resources-attritions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dashboards-human_resources-attritions"></code></pre>
</span>
<form id="form-GETapi-dashboards-human_resources-attritions" data-method="GET"
      data-path="api/dashboards/human_resources/attritions"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer PZbe6aDag8Vfdv5h3461ckE","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dashboards-human_resources-attritions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dashboards-human_resources-attritions"
                    onclick="tryItOut('GETapi-dashboards-human_resources-attritions');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dashboards-human_resources-attritions"
                    onclick="cancelTryOut('GETapi-dashboards-human_resources-attritions');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dashboards-human_resources-attritions" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dashboards/human_resources/attritions</code></b>
        </p>
                <p>
            <label id="auth-GETapi-dashboards-human_resources-attritions" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-dashboards-human_resources-attritions"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-dashboards-human_resources-attritions"
               value="expedita"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>project</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project"
               data-endpoint="GETapi-dashboards-human_resources-attritions"
               value="repellat"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project. Example ?project=%Pub%</p>
            </p>
                    <p>
                <b><code>department</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="department"
               data-endpoint="GETapi-dashboards-human_resources-attritions"
               value="aperiam"
               data-component="query" hidden>
    <br>
<p>Limit results to specific department. Example ?department=%Product%</p>
            </p>
                    <p>
                <b><code>position</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="position"
               data-endpoint="GETapi-dashboards-human_resources-attritions"
               value="officia"
               data-component="query" hidden>
    <br>
<p>Limit results to specific position. Example ?position=%Agente%</p>
            </p>
                </form>

            <h2 id="dashboards-GETapi-dashboards-human_resources-hc_by_project">Dashboards Human Resources Head Counts by Projects</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of head counts grouped by projects for human resources dashboard</p>

<span id="example-requests-GETapi-dashboards-human_resources-hc_by_project">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/dashboards/human_resources/hc_by_project?site=ullam&amp;project=eos&amp;department=deserunt&amp;position=sequi" \
    --header "Authorization: Bearer fkda5e1hPb48a3cE6vVZgD6" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/dashboards/human_resources/hc_by_project"
);

const params = {
    "site": "ullam",
    "project": "eos",
    "department": "deserunt",
    "position": "sequi",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer fkda5e1hPb48a3cE6vVZgD6",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-dashboards-human_resources-hc_by_project">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">[
    {
        &quot;id&quot;: 13,
        &quot;name&quot;: &quot;Vincenzo Rolfson IV&quot;,
        &quot;client_id&quot;: 1,
        &quot;created_at&quot;: &quot;2021-11-19T16:49:20.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2021-11-19T16:49:20.000000Z&quot;,
        &quot;employees_count&quot;: 1
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dashboards-human_resources-hc_by_project" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dashboards-human_resources-hc_by_project"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dashboards-human_resources-hc_by_project"></code></pre>
</span>
<span id="execution-error-GETapi-dashboards-human_resources-hc_by_project" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dashboards-human_resources-hc_by_project"></code></pre>
</span>
<form id="form-GETapi-dashboards-human_resources-hc_by_project" data-method="GET"
      data-path="api/dashboards/human_resources/hc_by_project"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer fkda5e1hPb48a3cE6vVZgD6","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dashboards-human_resources-hc_by_project', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dashboards-human_resources-hc_by_project"
                    onclick="tryItOut('GETapi-dashboards-human_resources-hc_by_project');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dashboards-human_resources-hc_by_project"
                    onclick="cancelTryOut('GETapi-dashboards-human_resources-hc_by_project');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dashboards-human_resources-hc_by_project" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dashboards/human_resources/hc_by_project</code></b>
        </p>
                <p>
            <label id="auth-GETapi-dashboards-human_resources-hc_by_project" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-dashboards-human_resources-hc_by_project"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-dashboards-human_resources-hc_by_project"
               value="ullam"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>project</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project"
               data-endpoint="GETapi-dashboards-human_resources-hc_by_project"
               value="eos"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project. Example ?project=%Pub%</p>
            </p>
                    <p>
                <b><code>department</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="department"
               data-endpoint="GETapi-dashboards-human_resources-hc_by_project"
               value="deserunt"
               data-component="query" hidden>
    <br>
<p>Limit results to specific department. Example ?department=%Product%</p>
            </p>
                    <p>
                <b><code>position</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="position"
               data-endpoint="GETapi-dashboards-human_resources-hc_by_project"
               value="sequi"
               data-component="query" hidden>
    <br>
<p>Limit results to specific position. Example ?position=%Agente%</p>
            </p>
                </form>

            <h2 id="dashboards-GETapi-dashboards-human_resources-hc_by_gender">Dashboards Human Resources Head Counts by Gender</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of head count data grouped by gender for human resources dashboard</p>

<span id="example-requests-GETapi-dashboards-human_resources-hc_by_gender">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/dashboards/human_resources/hc_by_gender?site=est&amp;project=beatae&amp;department=adipisci&amp;position=quis" \
    --header "Authorization: Bearer g45aZ16edVDbvf6Ec3k8Pha" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/dashboards/human_resources/hc_by_gender"
);

const params = {
    "site": "est",
    "project": "beatae",
    "department": "adipisci",
    "position": "quis",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer g45aZ16edVDbvf6Ec3k8Pha",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-dashboards-human_resources-hc_by_gender">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">[
    {
        &quot;id&quot;: 3,
        &quot;name&quot;: &quot;Male&quot;,
        &quot;created_at&quot;: &quot;2021-11-19T16:49:21.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2021-11-19T16:49:21.000000Z&quot;,
        &quot;employees_count&quot;: 1
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dashboards-human_resources-hc_by_gender" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dashboards-human_resources-hc_by_gender"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dashboards-human_resources-hc_by_gender"></code></pre>
</span>
<span id="execution-error-GETapi-dashboards-human_resources-hc_by_gender" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dashboards-human_resources-hc_by_gender"></code></pre>
</span>
<form id="form-GETapi-dashboards-human_resources-hc_by_gender" data-method="GET"
      data-path="api/dashboards/human_resources/hc_by_gender"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer g45aZ16edVDbvf6Ec3k8Pha","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dashboards-human_resources-hc_by_gender', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dashboards-human_resources-hc_by_gender"
                    onclick="tryItOut('GETapi-dashboards-human_resources-hc_by_gender');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dashboards-human_resources-hc_by_gender"
                    onclick="cancelTryOut('GETapi-dashboards-human_resources-hc_by_gender');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dashboards-human_resources-hc_by_gender" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dashboards/human_resources/hc_by_gender</code></b>
        </p>
                <p>
            <label id="auth-GETapi-dashboards-human_resources-hc_by_gender" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-dashboards-human_resources-hc_by_gender"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-dashboards-human_resources-hc_by_gender"
               value="est"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>project</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project"
               data-endpoint="GETapi-dashboards-human_resources-hc_by_gender"
               value="beatae"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project. Example ?project=%Pub%</p>
            </p>
                    <p>
                <b><code>department</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="department"
               data-endpoint="GETapi-dashboards-human_resources-hc_by_gender"
               value="adipisci"
               data-component="query" hidden>
    <br>
<p>Limit results to specific department. Example ?department=%Product%</p>
            </p>
                    <p>
                <b><code>position</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="position"
               data-endpoint="GETapi-dashboards-human_resources-hc_by_gender"
               value="quis"
               data-component="query" hidden>
    <br>
<p>Limit results to specific position. Example ?position=%Agente%</p>
            </p>
                </form>

            <h2 id="dashboards-GETapi-dashboards-human_resources-hc_by_department">Dashboards Human Resources Head Counts by Departments</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of head count data grouped by department for human resources dashboard</p>

<span id="example-requests-GETapi-dashboards-human_resources-hc_by_department">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/dashboards/human_resources/hc_by_department?site=ut&amp;project=qui&amp;department=voluptates&amp;position=commodi" \
    --header "Authorization: Bearer 1k85evcEgfd6h3aZaDb4VP6" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/dashboards/human_resources/hc_by_department"
);

const params = {
    "site": "ut",
    "project": "qui",
    "department": "voluptates",
    "position": "commodi",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer 1k85evcEgfd6h3aZaDb4VP6",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-dashboards-human_resources-hc_by_department">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">[
    {
        &quot;id&quot;: 5,
        &quot;name&quot;: &quot;Luis McClure&quot;,
        &quot;created_at&quot;: &quot;2021-11-19T16:49:18.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2021-11-19T16:49:18.000000Z&quot;,
        &quot;employees_count&quot;: 1
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dashboards-human_resources-hc_by_department" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dashboards-human_resources-hc_by_department"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dashboards-human_resources-hc_by_department"></code></pre>
</span>
<span id="execution-error-GETapi-dashboards-human_resources-hc_by_department" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dashboards-human_resources-hc_by_department"></code></pre>
</span>
<form id="form-GETapi-dashboards-human_resources-hc_by_department" data-method="GET"
      data-path="api/dashboards/human_resources/hc_by_department"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer 1k85evcEgfd6h3aZaDb4VP6","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dashboards-human_resources-hc_by_department', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dashboards-human_resources-hc_by_department"
                    onclick="tryItOut('GETapi-dashboards-human_resources-hc_by_department');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dashboards-human_resources-hc_by_department"
                    onclick="cancelTryOut('GETapi-dashboards-human_resources-hc_by_department');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dashboards-human_resources-hc_by_department" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dashboards/human_resources/hc_by_department</code></b>
        </p>
                <p>
            <label id="auth-GETapi-dashboards-human_resources-hc_by_department" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-dashboards-human_resources-hc_by_department"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-dashboards-human_resources-hc_by_department"
               value="ut"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>project</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project"
               data-endpoint="GETapi-dashboards-human_resources-hc_by_department"
               value="qui"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project. Example ?project=%Pub%</p>
            </p>
                    <p>
                <b><code>department</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="department"
               data-endpoint="GETapi-dashboards-human_resources-hc_by_department"
               value="voluptates"
               data-component="query" hidden>
    <br>
<p>Limit results to specific department. Example ?department=%Product%</p>
            </p>
                    <p>
                <b><code>position</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="position"
               data-endpoint="GETapi-dashboards-human_resources-hc_by_department"
               value="commodi"
               data-component="query" hidden>
    <br>
<p>Limit results to specific position. Example ?position=%Agente%</p>
            </p>
                </form>

            <h2 id="dashboards-GETapi-dashboards-production-mtd_stats">Dashboards Production Month To Date Stats</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Production MTD stats for production dashboard</p>

<span id="example-requests-GETapi-dashboards-production-mtd_stats">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/dashboards/production/mtd_stats?campaign=itaque&amp;source=ex&amp;employee=ratione&amp;supervisor=sint&amp;supervisor_employee=dolorum&amp;project_campaign=eveniet&amp;project_employee=rerum&amp;site=sint&amp;client=asperiores" \
    --header "Authorization: Bearer 4k1hDdfVce3P68bZag6E5va" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/dashboards/production/mtd_stats"
);

const params = {
    "campaign": "itaque",
    "source": "ex",
    "employee": "ratione",
    "supervisor": "sint",
    "supervisor_employee": "dolorum",
    "project_campaign": "eveniet",
    "project_employee": "rerum",
    "site": "sint",
    "client": "asperiores",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer 4k1hDdfVce3P68bZag6E5va",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-dashboards-production-mtd_stats">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;revenue_mtd&quot;: &quot;0.00&quot;,
    &quot;login_hours_mtd&quot;: &quot;8.00&quot;,
    &quot;production_hours_mtd&quot;: &quot;0.00&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dashboards-production-mtd_stats" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dashboards-production-mtd_stats"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dashboards-production-mtd_stats"></code></pre>
</span>
<span id="execution-error-GETapi-dashboards-production-mtd_stats" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dashboards-production-mtd_stats"></code></pre>
</span>
<form id="form-GETapi-dashboards-production-mtd_stats" data-method="GET"
      data-path="api/dashboards/production/mtd_stats"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer 4k1hDdfVce3P68bZag6E5va","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dashboards-production-mtd_stats', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dashboards-production-mtd_stats"
                    onclick="tryItOut('GETapi-dashboards-production-mtd_stats');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dashboards-production-mtd_stats"
                    onclick="cancelTryOut('GETapi-dashboards-production-mtd_stats');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dashboards-production-mtd_stats" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dashboards/production/mtd_stats</code></b>
        </p>
                <p>
            <label id="auth-GETapi-dashboards-production-mtd_stats" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-dashboards-production-mtd_stats"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>campaign</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="campaign"
               data-endpoint="GETapi-dashboards-production-mtd_stats"
               value="itaque"
               data-component="query" hidden>
    <br>
<p>Limit results to specific campaign. Example ?campaign=%Santiago%</p>
            </p>
                    <p>
                <b><code>source</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="source"
               data-endpoint="GETapi-dashboards-production-mtd_stats"
               value="ex"
               data-component="query" hidden>
    <br>
<p>Limit results to specific source. Example ?source=%Santiago%</p>
            </p>
                    <p>
                <b><code>employee</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="employee"
               data-endpoint="GETapi-dashboards-production-mtd_stats"
               value="ratione"
               data-component="query" hidden>
    <br>
<p>Limit results to specific employee. Example ?employee=%Santiago%</p>
            </p>
                    <p>
                <b><code>supervisor</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="supervisor"
               data-endpoint="GETapi-dashboards-production-mtd_stats"
               value="sint"
               data-component="query" hidden>
    <br>
<p>Limit results to specific supervisor. Example ?supervisor=%Santiago%</p>
            </p>
                    <p>
                <b><code>supervisor_employee</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="supervisor_employee"
               data-endpoint="GETapi-dashboards-production-mtd_stats"
               value="dolorum"
               data-component="query" hidden>
    <br>
<p>Limit results to specific supervisor_employee. Example ?supervisor_employee=%Santiago%</p>
            </p>
                    <p>
                <b><code>project_campaign</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project_campaign"
               data-endpoint="GETapi-dashboards-production-mtd_stats"
               value="eveniet"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project_campaign. Example ?project_campaign=%Santiago%</p>
            </p>
                    <p>
                <b><code>project_employee</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project_employee"
               data-endpoint="GETapi-dashboards-production-mtd_stats"
               value="rerum"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project_employee. Example ?project_employee=%Santiago%</p>
            </p>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-dashboards-production-mtd_stats"
               value="sint"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>client</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="client"
               data-endpoint="GETapi-dashboards-production-mtd_stats"
               value="asperiores"
               data-component="query" hidden>
    <br>
<p>Limit results to specific client. Example ?client=%Pub%</p>
            </p>
                </form>

            <h2 id="dashboards-GETapi-dashboards-production-monthly_stats">Dashboards Production Monthly Stats</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Production Monthly stats for production dashboard</p>

<span id="example-requests-GETapi-dashboards-production-monthly_stats">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/dashboards/production/monthly_stats?campaign=magni&amp;source=voluptatem&amp;employee=et&amp;supervisor=voluptas&amp;supervisor_employee=nobis&amp;project_campaign=voluptatum&amp;project_employee=quidem&amp;site=placeat&amp;client=sapiente" \
    --header "Authorization: Bearer 5v6aZha14d6cg83EePkVfbD" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/dashboards/production/monthly_stats"
);

const params = {
    "campaign": "magni",
    "source": "voluptatem",
    "employee": "et",
    "supervisor": "voluptas",
    "supervisor_employee": "nobis",
    "project_campaign": "voluptatum",
    "project_employee": "quidem",
    "site": "placeat",
    "client": "sapiente",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer 5v6aZha14d6cg83EePkVfbD",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-dashboards-production-monthly_stats">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">[
    {
        &quot;revenue&quot;: 0,
        &quot;login_time&quot;: 5,
        &quot;rph&quot;: 0,
        &quot;sales&quot;: &quot;0&quot;,
        &quot;production_time&quot;: 0,
        &quot;sph&quot;: null,
        &quot;efficiency&quot;: 0,
        &quot;sph_goal&quot;: null,
        &quot;month&quot;: &quot;2021-Oct&quot;
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-dashboards-production-monthly_stats" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-dashboards-production-monthly_stats"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dashboards-production-monthly_stats"></code></pre>
</span>
<span id="execution-error-GETapi-dashboards-production-monthly_stats" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dashboards-production-monthly_stats"></code></pre>
</span>
<form id="form-GETapi-dashboards-production-monthly_stats" data-method="GET"
      data-path="api/dashboards/production/monthly_stats"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer 5v6aZha14d6cg83EePkVfbD","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-dashboards-production-monthly_stats', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-dashboards-production-monthly_stats"
                    onclick="tryItOut('GETapi-dashboards-production-monthly_stats');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-dashboards-production-monthly_stats"
                    onclick="cancelTryOut('GETapi-dashboards-production-monthly_stats');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-dashboards-production-monthly_stats" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/dashboards/production/monthly_stats</code></b>
        </p>
                <p>
            <label id="auth-GETapi-dashboards-production-monthly_stats" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-dashboards-production-monthly_stats"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>campaign</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="campaign"
               data-endpoint="GETapi-dashboards-production-monthly_stats"
               value="magni"
               data-component="query" hidden>
    <br>
<p>Limit results to specific campaign. Example ?campaign=%Santiago%</p>
            </p>
                    <p>
                <b><code>source</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="source"
               data-endpoint="GETapi-dashboards-production-monthly_stats"
               value="voluptatem"
               data-component="query" hidden>
    <br>
<p>Limit results to specific source. Example ?source=%Santiago%</p>
            </p>
                    <p>
                <b><code>employee</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="employee"
               data-endpoint="GETapi-dashboards-production-monthly_stats"
               value="et"
               data-component="query" hidden>
    <br>
<p>Limit results to specific employee. Example ?employee=%Santiago%</p>
            </p>
                    <p>
                <b><code>supervisor</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="supervisor"
               data-endpoint="GETapi-dashboards-production-monthly_stats"
               value="voluptas"
               data-component="query" hidden>
    <br>
<p>Limit results to specific supervisor. Example ?supervisor=%Santiago%</p>
            </p>
                    <p>
                <b><code>supervisor_employee</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="supervisor_employee"
               data-endpoint="GETapi-dashboards-production-monthly_stats"
               value="nobis"
               data-component="query" hidden>
    <br>
<p>Limit results to specific supervisor_employee. Example ?supervisor_employee=%Santiago%</p>
            </p>
                    <p>
                <b><code>project_campaign</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project_campaign"
               data-endpoint="GETapi-dashboards-production-monthly_stats"
               value="voluptatum"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project_campaign. Example ?project_campaign=%Santiago%</p>
            </p>
                    <p>
                <b><code>project_employee</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project_employee"
               data-endpoint="GETapi-dashboards-production-monthly_stats"
               value="quidem"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project_employee. Example ?project_employee=%Santiago%</p>
            </p>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-dashboards-production-monthly_stats"
               value="placeat"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>client</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="client"
               data-endpoint="GETapi-dashboards-production-monthly_stats"
               value="sapiente"
               data-component="query" hidden>
    <br>
<p>Limit results to specific client. Example ?client=%Pub%</p>
            </p>
                </form>

            <h2 id="dashboards-GETapi-v2-dashboards-human_resources-head_counts">Dashboards Human Resources Head Counts</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Head Counts data for human resources dashboard</p>

<span id="example-requests-GETapi-v2-dashboards-human_resources-head_counts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/v2/dashboards/human_resources/head_counts?site=quisquam&amp;project=numquam&amp;department=ab&amp;position=ipsa" \
    --header "Authorization: Bearer ZDEk6gc13fvadh46ePba8V5" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/dashboards/human_resources/head_counts"
);

const params = {
    "site": "quisquam",
    "project": "numquam",
    "department": "ab",
    "position": "ipsa",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer ZDEk6gc13fvadh46ePba8V5",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v2-dashboards-human_resources-head_counts">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
  &quot;head_count&quot;: 75,
  &quot;attrition_mtd&quot;: 1.33,
  &quot;hired_tm&quot;: 5,
  &quot;terminated_tm&quot;: 7,
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v2-dashboards-human_resources-head_counts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v2-dashboards-human_resources-head_counts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v2-dashboards-human_resources-head_counts"></code></pre>
</span>
<span id="execution-error-GETapi-v2-dashboards-human_resources-head_counts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v2-dashboards-human_resources-head_counts"></code></pre>
</span>
<form id="form-GETapi-v2-dashboards-human_resources-head_counts" data-method="GET"
      data-path="api/v2/dashboards/human_resources/head_counts"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer ZDEk6gc13fvadh46ePba8V5","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v2-dashboards-human_resources-head_counts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v2-dashboards-human_resources-head_counts"
                    onclick="tryItOut('GETapi-v2-dashboards-human_resources-head_counts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v2-dashboards-human_resources-head_counts"
                    onclick="cancelTryOut('GETapi-v2-dashboards-human_resources-head_counts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v2-dashboards-human_resources-head_counts" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v2/dashboards/human_resources/head_counts</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v2-dashboards-human_resources-head_counts" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v2-dashboards-human_resources-head_counts"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-v2-dashboards-human_resources-head_counts"
               value="quisquam"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>project</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project"
               data-endpoint="GETapi-v2-dashboards-human_resources-head_counts"
               value="numquam"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project. Example ?project=%Pub%</p>
            </p>
                    <p>
                <b><code>department</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="department"
               data-endpoint="GETapi-v2-dashboards-human_resources-head_counts"
               value="ab"
               data-component="query" hidden>
    <br>
<p>Limit results to specific department. Example ?department=%Product%</p>
            </p>
                    <p>
                <b><code>position</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="position"
               data-endpoint="GETapi-v2-dashboards-human_resources-head_counts"
               value="ipsa"
               data-component="query" hidden>
    <br>
<p>Limit results to specific position. Example ?position=%Agente%</p>
            </p>
                </form>

            <h2 id="dashboards-GETapi-v2-dashboards-human_resources-attritions">Dashboards Human Resources Month Attritions</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of attritions by months, including the last 12 months for human resources dashboard</p>

<span id="example-requests-GETapi-v2-dashboards-human_resources-attritions">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/v2/dashboards/human_resources/attritions?site=laborum&amp;project=sunt&amp;department=cupiditate&amp;position=ad" \
    --header "Authorization: Bearer 466aEa85ZVdPkv1fceg3bDh" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/dashboards/human_resources/attritions"
);

const params = {
    "site": "laborum",
    "project": "sunt",
    "department": "cupiditate",
    "position": "ad",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer 466aEa85ZVdPkv1fceg3bDh",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v2-dashboards-human_resources-attritions">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">[
    {
        &quot;month&quot;: &quot;2021-01&quot;,
        &quot;head_count&quot;: 10,
        &quot;terminations&quot;: 0,
        &quot;attrition&quot;: &quot;0.00&quot;
    },
    {
        &quot;month&quot;: &quot;2021-02&quot;,
        &quot;head_count&quot;: 10,
        &quot;terminations&quot;: 0,
        &quot;attrition&quot;: &quot;0.00&quot;
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v2-dashboards-human_resources-attritions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v2-dashboards-human_resources-attritions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v2-dashboards-human_resources-attritions"></code></pre>
</span>
<span id="execution-error-GETapi-v2-dashboards-human_resources-attritions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v2-dashboards-human_resources-attritions"></code></pre>
</span>
<form id="form-GETapi-v2-dashboards-human_resources-attritions" data-method="GET"
      data-path="api/v2/dashboards/human_resources/attritions"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer 466aEa85ZVdPkv1fceg3bDh","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v2-dashboards-human_resources-attritions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v2-dashboards-human_resources-attritions"
                    onclick="tryItOut('GETapi-v2-dashboards-human_resources-attritions');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v2-dashboards-human_resources-attritions"
                    onclick="cancelTryOut('GETapi-v2-dashboards-human_resources-attritions');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v2-dashboards-human_resources-attritions" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v2/dashboards/human_resources/attritions</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v2-dashboards-human_resources-attritions" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v2-dashboards-human_resources-attritions"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-v2-dashboards-human_resources-attritions"
               value="laborum"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>project</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project"
               data-endpoint="GETapi-v2-dashboards-human_resources-attritions"
               value="sunt"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project. Example ?project=%Pub%</p>
            </p>
                    <p>
                <b><code>department</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="department"
               data-endpoint="GETapi-v2-dashboards-human_resources-attritions"
               value="cupiditate"
               data-component="query" hidden>
    <br>
<p>Limit results to specific department. Example ?department=%Product%</p>
            </p>
                    <p>
                <b><code>position</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="position"
               data-endpoint="GETapi-v2-dashboards-human_resources-attritions"
               value="ad"
               data-component="query" hidden>
    <br>
<p>Limit results to specific position. Example ?position=%Agente%</p>
            </p>
                </form>

            <h2 id="dashboards-GETapi-v2-dashboards-human_resources-hc_by_project">Dashboards Human Resources Head Counts by Projects</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of head counts grouped by projects for human resources dashboard</p>

<span id="example-requests-GETapi-v2-dashboards-human_resources-hc_by_project">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/v2/dashboards/human_resources/hc_by_project?site=eius&amp;project=sed&amp;department=unde&amp;position=accusantium" \
    --header "Authorization: Bearer g3f1Da8V54k6P6bvZheEcda" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/dashboards/human_resources/hc_by_project"
);

const params = {
    "site": "eius",
    "project": "sed",
    "department": "unde",
    "position": "accusantium",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer g3f1Da8V54k6P6bvZheEcda",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v2-dashboards-human_resources-hc_by_project">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">[
    {
        &quot;id&quot;: 13,
        &quot;name&quot;: &quot;Vincenzo Rolfson IV&quot;,
        &quot;client_id&quot;: 1,
        &quot;created_at&quot;: &quot;2021-11-19T16:49:20.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2021-11-19T16:49:20.000000Z&quot;,
        &quot;employees_count&quot;: 1
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v2-dashboards-human_resources-hc_by_project" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v2-dashboards-human_resources-hc_by_project"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v2-dashboards-human_resources-hc_by_project"></code></pre>
</span>
<span id="execution-error-GETapi-v2-dashboards-human_resources-hc_by_project" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v2-dashboards-human_resources-hc_by_project"></code></pre>
</span>
<form id="form-GETapi-v2-dashboards-human_resources-hc_by_project" data-method="GET"
      data-path="api/v2/dashboards/human_resources/hc_by_project"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer g3f1Da8V54k6P6bvZheEcda","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v2-dashboards-human_resources-hc_by_project', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v2-dashboards-human_resources-hc_by_project"
                    onclick="tryItOut('GETapi-v2-dashboards-human_resources-hc_by_project');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v2-dashboards-human_resources-hc_by_project"
                    onclick="cancelTryOut('GETapi-v2-dashboards-human_resources-hc_by_project');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v2-dashboards-human_resources-hc_by_project" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v2/dashboards/human_resources/hc_by_project</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v2-dashboards-human_resources-hc_by_project" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v2-dashboards-human_resources-hc_by_project"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-v2-dashboards-human_resources-hc_by_project"
               value="eius"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>project</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project"
               data-endpoint="GETapi-v2-dashboards-human_resources-hc_by_project"
               value="sed"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project. Example ?project=%Pub%</p>
            </p>
                    <p>
                <b><code>department</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="department"
               data-endpoint="GETapi-v2-dashboards-human_resources-hc_by_project"
               value="unde"
               data-component="query" hidden>
    <br>
<p>Limit results to specific department. Example ?department=%Product%</p>
            </p>
                    <p>
                <b><code>position</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="position"
               data-endpoint="GETapi-v2-dashboards-human_resources-hc_by_project"
               value="accusantium"
               data-component="query" hidden>
    <br>
<p>Limit results to specific position. Example ?position=%Agente%</p>
            </p>
                </form>

            <h2 id="dashboards-GETapi-v2-dashboards-human_resources-hc_by_gender">Dashboards Human Resources Head Counts by Gender</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of head count data grouped by gender for human resources dashboard</p>

<span id="example-requests-GETapi-v2-dashboards-human_resources-hc_by_gender">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/v2/dashboards/human_resources/hc_by_gender?site=quisquam&amp;project=qui&amp;department=aut&amp;position=qui" \
    --header "Authorization: Bearer Eag68aekVfPdvb6h14Z5D3c" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/dashboards/human_resources/hc_by_gender"
);

const params = {
    "site": "quisquam",
    "project": "qui",
    "department": "aut",
    "position": "qui",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer Eag68aekVfPdvb6h14Z5D3c",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v2-dashboards-human_resources-hc_by_gender">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">[
    {
        &quot;id&quot;: 3,
        &quot;name&quot;: &quot;Male&quot;,
        &quot;created_at&quot;: &quot;2021-11-19T16:49:21.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2021-11-19T16:49:21.000000Z&quot;,
        &quot;employees_count&quot;: 1
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v2-dashboards-human_resources-hc_by_gender" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v2-dashboards-human_resources-hc_by_gender"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v2-dashboards-human_resources-hc_by_gender"></code></pre>
</span>
<span id="execution-error-GETapi-v2-dashboards-human_resources-hc_by_gender" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v2-dashboards-human_resources-hc_by_gender"></code></pre>
</span>
<form id="form-GETapi-v2-dashboards-human_resources-hc_by_gender" data-method="GET"
      data-path="api/v2/dashboards/human_resources/hc_by_gender"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer Eag68aekVfPdvb6h14Z5D3c","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v2-dashboards-human_resources-hc_by_gender', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v2-dashboards-human_resources-hc_by_gender"
                    onclick="tryItOut('GETapi-v2-dashboards-human_resources-hc_by_gender');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v2-dashboards-human_resources-hc_by_gender"
                    onclick="cancelTryOut('GETapi-v2-dashboards-human_resources-hc_by_gender');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v2-dashboards-human_resources-hc_by_gender" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v2/dashboards/human_resources/hc_by_gender</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v2-dashboards-human_resources-hc_by_gender" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v2-dashboards-human_resources-hc_by_gender"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-v2-dashboards-human_resources-hc_by_gender"
               value="quisquam"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>project</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project"
               data-endpoint="GETapi-v2-dashboards-human_resources-hc_by_gender"
               value="qui"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project. Example ?project=%Pub%</p>
            </p>
                    <p>
                <b><code>department</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="department"
               data-endpoint="GETapi-v2-dashboards-human_resources-hc_by_gender"
               value="aut"
               data-component="query" hidden>
    <br>
<p>Limit results to specific department. Example ?department=%Product%</p>
            </p>
                    <p>
                <b><code>position</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="position"
               data-endpoint="GETapi-v2-dashboards-human_resources-hc_by_gender"
               value="qui"
               data-component="query" hidden>
    <br>
<p>Limit results to specific position. Example ?position=%Agente%</p>
            </p>
                </form>

            <h2 id="dashboards-GETapi-v2-dashboards-human_resources-hc_by_department">Dashboards Human Resources Head Counts by Departments</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of head count data grouped by department for human resources dashboard</p>

<span id="example-requests-GETapi-v2-dashboards-human_resources-hc_by_department">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/v2/dashboards/human_resources/hc_by_department?site=blanditiis&amp;project=recusandae&amp;department=possimus&amp;position=nostrum" \
    --header "Authorization: Bearer 6cP6k4Vfd1Egaae35Zv8hDb" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/dashboards/human_resources/hc_by_department"
);

const params = {
    "site": "blanditiis",
    "project": "recusandae",
    "department": "possimus",
    "position": "nostrum",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer 6cP6k4Vfd1Egaae35Zv8hDb",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v2-dashboards-human_resources-hc_by_department">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">[
    {
        &quot;id&quot;: 5,
        &quot;name&quot;: &quot;Luis McClure&quot;,
        &quot;created_at&quot;: &quot;2021-11-19T16:49:18.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2021-11-19T16:49:18.000000Z&quot;,
        &quot;employees_count&quot;: 1
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v2-dashboards-human_resources-hc_by_department" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v2-dashboards-human_resources-hc_by_department"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v2-dashboards-human_resources-hc_by_department"></code></pre>
</span>
<span id="execution-error-GETapi-v2-dashboards-human_resources-hc_by_department" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v2-dashboards-human_resources-hc_by_department"></code></pre>
</span>
<form id="form-GETapi-v2-dashboards-human_resources-hc_by_department" data-method="GET"
      data-path="api/v2/dashboards/human_resources/hc_by_department"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer 6cP6k4Vfd1Egaae35Zv8hDb","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v2-dashboards-human_resources-hc_by_department', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v2-dashboards-human_resources-hc_by_department"
                    onclick="tryItOut('GETapi-v2-dashboards-human_resources-hc_by_department');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v2-dashboards-human_resources-hc_by_department"
                    onclick="cancelTryOut('GETapi-v2-dashboards-human_resources-hc_by_department');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v2-dashboards-human_resources-hc_by_department" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v2/dashboards/human_resources/hc_by_department</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v2-dashboards-human_resources-hc_by_department" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v2-dashboards-human_resources-hc_by_department"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-v2-dashboards-human_resources-hc_by_department"
               value="blanditiis"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>project</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project"
               data-endpoint="GETapi-v2-dashboards-human_resources-hc_by_department"
               value="recusandae"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project. Example ?project=%Pub%</p>
            </p>
                    <p>
                <b><code>department</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="department"
               data-endpoint="GETapi-v2-dashboards-human_resources-hc_by_department"
               value="possimus"
               data-component="query" hidden>
    <br>
<p>Limit results to specific department. Example ?department=%Product%</p>
            </p>
                    <p>
                <b><code>position</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="position"
               data-endpoint="GETapi-v2-dashboards-human_resources-hc_by_department"
               value="nostrum"
               data-component="query" hidden>
    <br>
<p>Limit results to specific position. Example ?position=%Agente%</p>
            </p>
                </form>

            <h2 id="dashboards-GETapi-v2-dashboards-production-mtd_stats">Dashboards Production Month To Date Stats</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Production MTD stats for production dashboard</p>

<span id="example-requests-GETapi-v2-dashboards-production-mtd_stats">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/v2/dashboards/production/mtd_stats?campaign=provident&amp;source=non&amp;employee=eius&amp;supervisor=eos&amp;supervisor_employee=iure&amp;project_campaign=ab&amp;project_employee=totam&amp;site=non&amp;client=qui" \
    --header "Authorization: Bearer 3P5ZEaV8aD61bdh4cegvf6k" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/dashboards/production/mtd_stats"
);

const params = {
    "campaign": "provident",
    "source": "non",
    "employee": "eius",
    "supervisor": "eos",
    "supervisor_employee": "iure",
    "project_campaign": "ab",
    "project_employee": "totam",
    "site": "non",
    "client": "qui",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer 3P5ZEaV8aD61bdh4cegvf6k",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v2-dashboards-production-mtd_stats">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;revenue_mtd&quot;: &quot;0.00&quot;,
    &quot;login_hours_mtd&quot;: &quot;8.00&quot;,
    &quot;production_hours_mtd&quot;: &quot;0.00&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v2-dashboards-production-mtd_stats" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v2-dashboards-production-mtd_stats"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v2-dashboards-production-mtd_stats"></code></pre>
</span>
<span id="execution-error-GETapi-v2-dashboards-production-mtd_stats" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v2-dashboards-production-mtd_stats"></code></pre>
</span>
<form id="form-GETapi-v2-dashboards-production-mtd_stats" data-method="GET"
      data-path="api/v2/dashboards/production/mtd_stats"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer 3P5ZEaV8aD61bdh4cegvf6k","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v2-dashboards-production-mtd_stats', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v2-dashboards-production-mtd_stats"
                    onclick="tryItOut('GETapi-v2-dashboards-production-mtd_stats');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v2-dashboards-production-mtd_stats"
                    onclick="cancelTryOut('GETapi-v2-dashboards-production-mtd_stats');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v2-dashboards-production-mtd_stats" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v2/dashboards/production/mtd_stats</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v2-dashboards-production-mtd_stats" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v2-dashboards-production-mtd_stats"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>campaign</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="campaign"
               data-endpoint="GETapi-v2-dashboards-production-mtd_stats"
               value="provident"
               data-component="query" hidden>
    <br>
<p>Limit results to specific campaign. Example ?campaign=%Santiago%</p>
            </p>
                    <p>
                <b><code>source</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="source"
               data-endpoint="GETapi-v2-dashboards-production-mtd_stats"
               value="non"
               data-component="query" hidden>
    <br>
<p>Limit results to specific source. Example ?source=%Santiago%</p>
            </p>
                    <p>
                <b><code>employee</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="employee"
               data-endpoint="GETapi-v2-dashboards-production-mtd_stats"
               value="eius"
               data-component="query" hidden>
    <br>
<p>Limit results to specific employee. Example ?employee=%Santiago%</p>
            </p>
                    <p>
                <b><code>supervisor</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="supervisor"
               data-endpoint="GETapi-v2-dashboards-production-mtd_stats"
               value="eos"
               data-component="query" hidden>
    <br>
<p>Limit results to specific supervisor. Example ?supervisor=%Santiago%</p>
            </p>
                    <p>
                <b><code>supervisor_employee</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="supervisor_employee"
               data-endpoint="GETapi-v2-dashboards-production-mtd_stats"
               value="iure"
               data-component="query" hidden>
    <br>
<p>Limit results to specific supervisor_employee. Example ?supervisor_employee=%Santiago%</p>
            </p>
                    <p>
                <b><code>project_campaign</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project_campaign"
               data-endpoint="GETapi-v2-dashboards-production-mtd_stats"
               value="ab"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project_campaign. Example ?project_campaign=%Santiago%</p>
            </p>
                    <p>
                <b><code>project_employee</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project_employee"
               data-endpoint="GETapi-v2-dashboards-production-mtd_stats"
               value="totam"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project_employee. Example ?project_employee=%Santiago%</p>
            </p>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-v2-dashboards-production-mtd_stats"
               value="non"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>client</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="client"
               data-endpoint="GETapi-v2-dashboards-production-mtd_stats"
               value="qui"
               data-component="query" hidden>
    <br>
<p>Limit results to specific client. Example ?client=%Pub%</p>
            </p>
                </form>

            <h2 id="dashboards-GETapi-v2-dashboards-production-monthly_stats">Dashboards Production Monthly Stats</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Production Monthly stats for production dashboard</p>

<span id="example-requests-GETapi-v2-dashboards-production-monthly_stats">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/v2/dashboards/production/monthly_stats?campaign=consectetur&amp;source=odit&amp;employee=sunt&amp;supervisor=corporis&amp;supervisor_employee=qui&amp;project_campaign=sed&amp;project_employee=tenetur&amp;site=voluptate&amp;client=suscipit" \
    --header "Authorization: Bearer k6aZDva6c8431d5hVEPbegf" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/dashboards/production/monthly_stats"
);

const params = {
    "campaign": "consectetur",
    "source": "odit",
    "employee": "sunt",
    "supervisor": "corporis",
    "supervisor_employee": "qui",
    "project_campaign": "sed",
    "project_employee": "tenetur",
    "site": "voluptate",
    "client": "suscipit",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer k6aZDva6c8431d5hVEPbegf",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v2-dashboards-production-monthly_stats">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">[
    {
        &quot;revenue&quot;: 0,
        &quot;login_time&quot;: 5,
        &quot;rph&quot;: 0,
        &quot;sales&quot;: &quot;0&quot;,
        &quot;production_time&quot;: 0,
        &quot;sph&quot;: null,
        &quot;efficiency&quot;: 0,
        &quot;sph_goal&quot;: null,
        &quot;month&quot;: &quot;2021-Oct&quot;
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v2-dashboards-production-monthly_stats" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v2-dashboards-production-monthly_stats"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v2-dashboards-production-monthly_stats"></code></pre>
</span>
<span id="execution-error-GETapi-v2-dashboards-production-monthly_stats" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v2-dashboards-production-monthly_stats"></code></pre>
</span>
<form id="form-GETapi-v2-dashboards-production-monthly_stats" data-method="GET"
      data-path="api/v2/dashboards/production/monthly_stats"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer k6aZDva6c8431d5hVEPbegf","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v2-dashboards-production-monthly_stats', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v2-dashboards-production-monthly_stats"
                    onclick="tryItOut('GETapi-v2-dashboards-production-monthly_stats');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v2-dashboards-production-monthly_stats"
                    onclick="cancelTryOut('GETapi-v2-dashboards-production-monthly_stats');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v2-dashboards-production-monthly_stats" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v2/dashboards/production/monthly_stats</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v2-dashboards-production-monthly_stats" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v2-dashboards-production-monthly_stats"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>campaign</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="campaign"
               data-endpoint="GETapi-v2-dashboards-production-monthly_stats"
               value="consectetur"
               data-component="query" hidden>
    <br>
<p>Limit results to specific campaign. Example ?campaign=%Santiago%</p>
            </p>
                    <p>
                <b><code>source</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="source"
               data-endpoint="GETapi-v2-dashboards-production-monthly_stats"
               value="odit"
               data-component="query" hidden>
    <br>
<p>Limit results to specific source. Example ?source=%Santiago%</p>
            </p>
                    <p>
                <b><code>employee</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="employee"
               data-endpoint="GETapi-v2-dashboards-production-monthly_stats"
               value="sunt"
               data-component="query" hidden>
    <br>
<p>Limit results to specific employee. Example ?employee=%Santiago%</p>
            </p>
                    <p>
                <b><code>supervisor</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="supervisor"
               data-endpoint="GETapi-v2-dashboards-production-monthly_stats"
               value="corporis"
               data-component="query" hidden>
    <br>
<p>Limit results to specific supervisor. Example ?supervisor=%Santiago%</p>
            </p>
                    <p>
                <b><code>supervisor_employee</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="supervisor_employee"
               data-endpoint="GETapi-v2-dashboards-production-monthly_stats"
               value="qui"
               data-component="query" hidden>
    <br>
<p>Limit results to specific supervisor_employee. Example ?supervisor_employee=%Santiago%</p>
            </p>
                    <p>
                <b><code>project_campaign</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project_campaign"
               data-endpoint="GETapi-v2-dashboards-production-monthly_stats"
               value="sed"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project_campaign. Example ?project_campaign=%Santiago%</p>
            </p>
                    <p>
                <b><code>project_employee</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project_employee"
               data-endpoint="GETapi-v2-dashboards-production-monthly_stats"
               value="tenetur"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project_employee. Example ?project_employee=%Santiago%</p>
            </p>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-v2-dashboards-production-monthly_stats"
               value="voluptate"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>client</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="client"
               data-endpoint="GETapi-v2-dashboards-production-monthly_stats"
               value="suscipit"
               data-component="query" hidden>
    <br>
<p>Limit results to specific client. Example ?client=%Pub%</p>
            </p>
                </form>

        <h1 id="endpoints">Endpoints</h1>

    

            <h2 id="endpoints-GETapi-user">Authenticated User</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Return information of the authenticated user</p>

<span id="example-requests-GETapi-user">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/user" \
    --header "Authorization: Bearer a8536khVDcvaPE4fb1de6Zg" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/user"
);

const headers = {
    "Authorization": "Bearer a8536khVDcvaPE4fb1de6Zg",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-user">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;id&quot;: 1,
    &quot;name&quot;: &quot;Yismen Jorge&quot;,
    &quot;email&quot;: &quot;yismen.jorge@gmail.com&quot;,
    &quot;is_active&quot;: 1,
    &quot;is_admin&quot;: 1,
    &quot;username&quot;: &quot;yjorge&quot;,
    &quot;created_at&quot;: &quot;2021-11-19T15:09:09.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2021-11-19T15:09:09.000000Z&quot;,
    &quot;deleted_at&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-user" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-user"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user"></code></pre>
</span>
<span id="execution-error-GETapi-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user"></code></pre>
</span>
<form id="form-GETapi-user" data-method="GET"
      data-path="api/user"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer a8536khVDcvaPE4fb1de6Zg","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-user', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-user"
                    onclick="tryItOut('GETapi-user');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-user"
                    onclick="cancelTryOut('GETapi-user');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-user" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/user</code></b>
        </p>
                <p>
            <label id="auth-GETapi-user" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-user"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTapi-afps">Store Afps</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Save a Afp model to database.</p>

<span id="example-requests-POSTapi-afps">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "dainsys.test/api/afps" \
    --header "Authorization: Bearer bkfg6EZV68vPdDe13ch5a4a" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"porro\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/afps"
);

const headers = {
    "Authorization": "Bearer bkfg6EZV68vPdDe13ch5a4a",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "porro"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-afps">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;name&quot;: &quot;Asdfasdf&quot;,
    &quot;slug&quot;: &quot;asdfasdf&quot;,
    &quot;updated_at&quot;: &quot;2021-12-01T19:05:29.000000Z&quot;,
    &quot;created_at&quot;: &quot;2021-12-01T19:05:29.000000Z&quot;,
    &quot;id&quot;: 12
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-afps" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-afps"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-afps"></code></pre>
</span>
<span id="execution-error-POSTapi-afps" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-afps"></code></pre>
</span>
<form id="form-POSTapi-afps" data-method="POST"
      data-path="api/afps"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer bkfg6EZV68vPdDe13ch5a4a","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-afps', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-afps"
                    onclick="tryItOut('POSTapi-afps');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-afps"
                    onclick="cancelTryOut('POSTapi-afps');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-afps" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/afps</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-afps" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-afps"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-afps"
               value="porro"
               data-component="body" hidden>
    <br>
<p>The name of the Afp</p>
        </p>
        </form>

            <h2 id="endpoints-POSTapi-arss">Store Ars</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Save a Ars model to database.</p>

<span id="example-requests-POSTapi-arss">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "dainsys.test/api/arss" \
    --header "Authorization: Bearer fkav4hPa1DVe6E6c85gb3Zd" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"quis\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/arss"
);

const headers = {
    "Authorization": "Bearer fkav4hPa1DVe6E6c85gb3Zd",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "quis"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-arss">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;name&quot;: &quot;Asdfasdf&quot;,
    &quot;slug&quot;: &quot;asdfasdf&quot;,
    &quot;updated_at&quot;: &quot;2021-12-01T19:05:29.000000Z&quot;,
    &quot;created_at&quot;: &quot;2021-12-01T19:05:29.000000Z&quot;,
    &quot;id&quot;: 12
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-arss" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-arss"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-arss"></code></pre>
</span>
<span id="execution-error-POSTapi-arss" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-arss"></code></pre>
</span>
<form id="form-POSTapi-arss" data-method="POST"
      data-path="api/arss"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer fkav4hPa1DVe6E6c85gb3Zd","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-arss', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-arss"
                    onclick="tryItOut('POSTapi-arss');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-arss"
                    onclick="cancelTryOut('POSTapi-arss');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-arss" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/arss</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-arss" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-arss"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-arss"
               value="quis"
               data-component="body" hidden>
    <br>
<p>The name of the Ars</p>
        </p>
        </form>

            <h2 id="endpoints-POSTapi-banks">Store Banks</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Save a Banks model to database.</p>

<span id="example-requests-POSTapi-banks">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "dainsys.test/api/banks" \
    --header "Authorization: Bearer 6P1hakV3ZdEa5cfe4bDv86g" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"dolor\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/banks"
);

const headers = {
    "Authorization": "Bearer 6P1hakV3ZdEa5cfe4bDv86g",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "dolor"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-banks">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
     &quot;name&quot;: &quot;Asdfasdf&quot;,
 }</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-banks" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-banks"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-banks"></code></pre>
</span>
<span id="execution-error-POSTapi-banks" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-banks"></code></pre>
</span>
<form id="form-POSTapi-banks" data-method="POST"
      data-path="api/banks"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer 6P1hakV3ZdEa5cfe4bDv86g","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-banks', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-banks"
                    onclick="tryItOut('POSTapi-banks');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-banks"
                    onclick="cancelTryOut('POSTapi-banks');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-banks" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/banks</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-banks" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-banks"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-banks"
               value="dolor"
               data-component="body" hidden>
    <br>
<p>The name of the Banks</p>
        </p>
        </form>

            <h2 id="endpoints-POSTapi-positions">Store Positions</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Save a Position model to database.</p>

<span id="example-requests-POSTapi-positions">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "dainsys.test/api/positions" \
    --header "Authorization: Bearer D6bv4cd1aaVZ5hfkPe6g8E3" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"cumque\",
    \"department_id\": \"provident\",
    \"payment_type_id\": \"ea\",
    \"payment_frequency_id\": \"nihil\",
    \"salary\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/positions"
);

const headers = {
    "Authorization": "Bearer D6bv4cd1aaVZ5hfkPe6g8E3",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "cumque",
    "department_id": "provident",
    "payment_type_id": "ea",
    "payment_frequency_id": "nihil",
    "salary": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-positions">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;name&quot;: &quot;Asdfasdf&quot;,
    &quot;department_id&quot;: 1,
    &quot;payment_type_id&quot;: 1,
    &quot;payment_frequency_id&quot;: 1,
    &quot;salary&quot;: 150,
    &quot;updated_at&quot;: &quot;2021-12-01T19:18:45.000000Z&quot;,
    &quot;created_at&quot;: &quot;2021-12-01T19:18:45.000000Z&quot;,
    &quot;id&quot;: 14,
    &quot;name_and_department&quot;: &quot;Administration-Asdfasdf&quot;,
    &quot;pay_per_hours&quot;: 150,
    &quot;department&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Administration&quot;,
        &quot;created_at&quot;: &quot;2021-11-19T15:09:20.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2021-11-19T15:09:20.000000Z&quot;
    },
    &quot;payment_type&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;By Hours&quot;,
        &quot;slug&quot;: &quot;by-hours&quot;,
        &quot;created_at&quot;: &quot;2021-11-19T15:09:42.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2021-11-19T15:09:42.000000Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-positions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-positions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-positions"></code></pre>
</span>
<span id="execution-error-POSTapi-positions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-positions"></code></pre>
</span>
<form id="form-POSTapi-positions" data-method="POST"
      data-path="api/positions"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer D6bv4cd1aaVZ5hfkPe6g8E3","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-positions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-positions"
                    onclick="tryItOut('POSTapi-positions');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-positions"
                    onclick="cancelTryOut('POSTapi-positions');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-positions" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/positions</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-positions" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-positions"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-positions"
               value="cumque"
               data-component="body" hidden>
    <br>
<p>The name of the Position</p>
        </p>
                <p>
            <b><code>department_id</code></b>&nbsp;&nbsp;<small>numeric</small>  &nbsp;
                <input type="text"
               name="department_id"
               data-endpoint="POSTapi-positions"
               value="provident"
               data-component="body" hidden>
    <br>
<p>The department_id of the Position</p>
        </p>
                <p>
            <b><code>payment_type_id</code></b>&nbsp;&nbsp;<small>numeric</small>  &nbsp;
                <input type="text"
               name="payment_type_id"
               data-endpoint="POSTapi-positions"
               value="ea"
               data-component="body" hidden>
    <br>
<p>The payment_type_id of the Position</p>
        </p>
                <p>
            <b><code>payment_frequency_id</code></b>&nbsp;&nbsp;<small>numeric</small>  &nbsp;
                <input type="text"
               name="payment_frequency_id"
               data-endpoint="POSTapi-positions"
               value="nihil"
               data-component="body" hidden>
    <br>
<p>The payment_frequency_id of the Position</p>
        </p>
                <p>
            <b><code>salary</code></b>&nbsp;&nbsp;<small>numeric</small>  &nbsp;
                <input type="text"
               name="salary"
               data-endpoint="POSTapi-positions"
               value="consequatur"
               data-component="body" hidden>
    <br>
<p>The salary of the Position</p>
        </p>
        </form>

            <h2 id="endpoints-POSTapi-supervisors">Store Supervisors</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Save a Supervisor model to database.</p>

<span id="example-requests-POSTapi-supervisors">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "dainsys.test/api/supervisors" \
    --header "Authorization: Bearer a6Db8PdV453f16hckZgvaEe" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"omnis\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/supervisors"
);

const headers = {
    "Authorization": "Bearer a6Db8PdV453f16hckZgvaEe",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "omnis"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-supervisors">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;name&quot;: &quot;Asdfasdf&quot;,
    &quot;updated_at&quot;: &quot;2021-12-01T19:05:29.000000Z&quot;,
    &quot;created_at&quot;: &quot;2021-12-01T19:05:29.000000Z&quot;,
    &quot;id&quot;: 12
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-supervisors" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-supervisors"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-supervisors"></code></pre>
</span>
<span id="execution-error-POSTapi-supervisors" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-supervisors"></code></pre>
</span>
<form id="form-POSTapi-supervisors" data-method="POST"
      data-path="api/supervisors"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer a6Db8PdV453f16hckZgvaEe","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-supervisors', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-supervisors"
                    onclick="tryItOut('POSTapi-supervisors');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-supervisors"
                    onclick="cancelTryOut('POSTapi-supervisors');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-supervisors" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/supervisors</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-supervisors" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-supervisors"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-supervisors"
               value="omnis"
               data-component="body" hidden>
    <br>
<p>The name of the Supervisor</p>
        </p>
        </form>

            <h2 id="endpoints-POSTapi-departments">Store Departmens</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Save a Department model to database.</p>

<span id="example-requests-POSTapi-departments">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "dainsys.test/api/departments" \
    --header "Authorization: Bearer 8d4aPh56c3EDVZ16efakvbg" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"provident\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/departments"
);

const headers = {
    "Authorization": "Bearer 8d4aPh56c3EDVZ16efakvbg",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "provident"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-departments">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;name&quot;: &quot;Asdfasdf&quot;,
    &quot;updated_at&quot;: &quot;2021-12-01T19:05:29.000000Z&quot;,
    &quot;created_at&quot;: &quot;2021-12-01T19:05:29.000000Z&quot;,
    &quot;id&quot;: 12
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-departments" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-departments"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-departments"></code></pre>
</span>
<span id="execution-error-POSTapi-departments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-departments"></code></pre>
</span>
<form id="form-POSTapi-departments" data-method="POST"
      data-path="api/departments"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer 8d4aPh56c3EDVZ16efakvbg","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-departments', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-departments"
                    onclick="tryItOut('POSTapi-departments');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-departments"
                    onclick="cancelTryOut('POSTapi-departments');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-departments" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/departments</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-departments" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-departments"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-departments"
               value="provident"
               data-component="body" hidden>
    <br>
<p>The name of the Department</p>
        </p>
        </form>

            <h2 id="endpoints-POSTapi-payment_frequencies">Store Payment Frequencies</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Save a Payment Frequency model to database.</p>

<span id="example-requests-POSTapi-payment_frequencies">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "dainsys.test/api/payment_frequencies" \
    --header "Authorization: Bearer aZvD16cPagh586kb3EfV4de" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"ipsam\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/payment_frequencies"
);

const headers = {
    "Authorization": "Bearer aZvD16cPagh586kb3EfV4de",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "ipsam"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-payment_frequencies">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;name&quot;: &quot;Asdfasdf&quot;,
    &quot;updated_at&quot;: &quot;2021-12-01T19:05:29.000000Z&quot;,
    &quot;created_at&quot;: &quot;2021-12-01T19:05:29.000000Z&quot;,
    &quot;id&quot;: 12
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-payment_frequencies" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-payment_frequencies"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-payment_frequencies"></code></pre>
</span>
<span id="execution-error-POSTapi-payment_frequencies" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-payment_frequencies"></code></pre>
</span>
<form id="form-POSTapi-payment_frequencies" data-method="POST"
      data-path="api/payment_frequencies"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer aZvD16cPagh586kb3EfV4de","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-payment_frequencies', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-payment_frequencies"
                    onclick="tryItOut('POSTapi-payment_frequencies');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-payment_frequencies"
                    onclick="cancelTryOut('POSTapi-payment_frequencies');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-payment_frequencies" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/payment_frequencies</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-payment_frequencies" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-payment_frequencies"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-payment_frequencies"
               value="ipsam"
               data-component="body" hidden>
    <br>
<p>The name of the Payment Frequency</p>
        </p>
        </form>

            <h2 id="endpoints-POSTapi-nationalities">Store Nationalities</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Save a Nationality model to database.</p>

<span id="example-requests-POSTapi-nationalities">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "dainsys.test/api/nationalities" \
    --header "Authorization: Bearer PVch664eZEfD1gb8v5akd3a" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"corrupti\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/nationalities"
);

const headers = {
    "Authorization": "Bearer PVch664eZEfD1gb8v5akd3a",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "corrupti"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-nationalities">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
     &quot;name&quot;: &quot;Asdfasdf&quot;,
 }</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-nationalities" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-nationalities"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-nationalities"></code></pre>
</span>
<span id="execution-error-POSTapi-nationalities" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-nationalities"></code></pre>
</span>
<form id="form-POSTapi-nationalities" data-method="POST"
      data-path="api/nationalities"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer PVch664eZEfD1gb8v5akd3a","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-nationalities', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-nationalities"
                    onclick="tryItOut('POSTapi-nationalities');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-nationalities"
                    onclick="cancelTryOut('POSTapi-nationalities');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-nationalities" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/nationalities</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-nationalities" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-nationalities"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-nationalities"
               value="corrupti"
               data-component="body" hidden>
    <br>
<p>The name of the Nationality     *</p>
        </p>
        </form>

            <h2 id="endpoints-POSTapi-employees--employee--vip">Update VIP</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Update VIP information for a given employee.</p>

<span id="example-requests-POSTapi-employees--employee--vip">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "dainsys.test/api/employees/11/vip" \
    --header "Authorization: Bearer PE15dba3hck6fgva8eD4Z6V" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"is_vip\": true
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/employees/11/vip"
);

const headers = {
    "Authorization": "Bearer PE15dba3hck6fgva8eD4Z6V",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "is_vip": true
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-employees--employee--vip">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;id&quot;: 10006,
    &quot;first_name&quot;: &quot;August&quot;,
    &quot;second_first_name&quot;: &quot;Nicklaus&quot;,
    &quot;last_name&quot;: &quot;Schaefer&quot;,
    &quot;second_last_name&quot;: &quot;Wuckert&quot;,
    &quot;full_name&quot;: &quot;August Nicklaus Schaefer Wuckert&quot;,
    &quot;hire_date&quot;: &quot;1990-08-30&quot;,
    &quot;personal_id&quot;: &quot;40546748566&quot;,
    &quot;passport&quot;: null,
    &quot;date_of_birth&quot;: &quot;1996-10-15&quot;,
    &quot;cellphone_number&quot;: &quot;8095607690&quot;,
    &quot;secondary_phone&quot;: null,
    &quot;site&quot;: &quot;Prof. Quincy Lockman DVM&quot;,
    &quot;project&quot;: &quot;Gustave Homenick&quot;,
    &quot;position&quot;: &quot;Dr. Arlo Walter Dds&quot;,
    &quot;salary&quot;: 125,
    &quot;salary_type&quot;: &quot;Kaylah Ratke&quot;,
    &quot;pay_per_hours&quot;: 125,
    &quot;department&quot;: &quot;Malachi Feeney I&quot;,
    &quot;supervisor&quot;: &quot;Yismen Jorge&quot;,
    &quot;gender&quot;: &quot;Ms. Kamille Hagenes MD&quot;,
    &quot;marital&quot;: &quot;Miss Brenda Will&quot;,
    &quot;ars&quot;: &quot;Adan Friesen&quot;,
    &quot;afp&quot;: &quot;Devonte Goyette DDS&quot;,
    &quot;nationality&quot;: &quot;Guam_662326&quot;,
    &quot;has_kids&quot;: 0,
    &quot;photo&quot;: &quot;storage/images/employees/10006.png&quot;,
    &quot;active&quot;: true,
    &quot;status&quot;: &quot;Active&quot;,
    &quot;punch&quot;: null,
    &quot;account_number&quot;: null,
    &quot;is_vip&quot;: true,
    &quot;is_universal&quot;: false,
    &quot;termination_date&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-employees--employee--vip" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-employees--employee--vip"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-employees--employee--vip"></code></pre>
</span>
<span id="execution-error-POSTapi-employees--employee--vip" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-employees--employee--vip"></code></pre>
</span>
<form id="form-POSTapi-employees--employee--vip" data-method="POST"
      data-path="api/employees/{employee}/vip"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer PE15dba3hck6fgva8eD4Z6V","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-employees--employee--vip', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-employees--employee--vip"
                    onclick="tryItOut('POSTapi-employees--employee--vip');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-employees--employee--vip"
                    onclick="cancelTryOut('POSTapi-employees--employee--vip');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-employees--employee--vip" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/employees/{employee}/vip</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-employees--employee--vip" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-employees--employee--vip"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>employee</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="employee"
               data-endpoint="POSTapi-employees--employee--vip"
               value="11"
               data-component="url" hidden>
    <br>

            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>is_vip</code></b>&nbsp;&nbsp;<small>boolean</small>  &nbsp;
                <label data-endpoint="POSTapi-employees--employee--vip" hidden>
            <input type="radio" name="is_vip"
                   value="true"
                   data-endpoint="POSTapi-employees--employee--vip"
                   data-component="body"
            >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-employees--employee--vip" hidden>
            <input type="radio" name="is_vip"
                   value="false"
                   data-endpoint="POSTapi-employees--employee--vip"
                   data-component="body"
            >
            <code>false</code>
        </label>
    <br>
<p>Indicates if the employee should be added to or removed from the Vip list</p>
        </p>
        </form>

            <h2 id="endpoints-POSTapi-employees--employee--universal">Update Universal</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Update Universal information for a given employee.</p>

<span id="example-requests-POSTapi-employees--employee--universal">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "dainsys.test/api/employees/9/universal" \
    --header "Authorization: Bearer P31bdfhgc46E5a6k8DvaZeV" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"is_vip\": false
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/employees/9/universal"
);

const headers = {
    "Authorization": "Bearer P31bdfhgc46E5a6k8DvaZeV",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "is_vip": false
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-employees--employee--universal">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;id&quot;: 10006,
    &quot;first_name&quot;: &quot;August&quot;,
    &quot;second_first_name&quot;: &quot;Nicklaus&quot;,
    &quot;last_name&quot;: &quot;Schaefer&quot;,
    &quot;second_last_name&quot;: &quot;Wuckert&quot;,
    &quot;full_name&quot;: &quot;August Nicklaus Schaefer Wuckert&quot;,
    &quot;hire_date&quot;: &quot;1990-08-30&quot;,
    &quot;personal_id&quot;: &quot;40546748566&quot;,
    &quot;passport&quot;: null,
    &quot;date_of_birth&quot;: &quot;1996-10-15&quot;,
    &quot;cellphone_number&quot;: &quot;8095607690&quot;,
    &quot;secondary_phone&quot;: null,
    &quot;site&quot;: &quot;Prof. Quincy Lockman DVM&quot;,
    &quot;project&quot;: &quot;Gustave Homenick&quot;,
    &quot;position&quot;: &quot;Dr. Arlo Walter Dds&quot;,
    &quot;salary&quot;: 125,
    &quot;salary_type&quot;: &quot;Kaylah Ratke&quot;,
    &quot;pay_per_hours&quot;: 125,
    &quot;department&quot;: &quot;Malachi Feeney I&quot;,
    &quot;supervisor&quot;: &quot;Yismen Jorge&quot;,
    &quot;gender&quot;: &quot;Ms. Kamille Hagenes MD&quot;,
    &quot;marital&quot;: &quot;Miss Brenda Will&quot;,
    &quot;ars&quot;: &quot;Adan Friesen&quot;,
    &quot;afp&quot;: &quot;Devonte Goyette DDS&quot;,
    &quot;nationality&quot;: &quot;Guam_662326&quot;,
    &quot;has_kids&quot;: 0,
    &quot;photo&quot;: &quot;storage/images/employees/10006.png&quot;,
    &quot;active&quot;: true,
    &quot;status&quot;: &quot;Active&quot;,
    &quot;punch&quot;: null,
    &quot;account_number&quot;: null,
    &quot;is_vip&quot;: true,
    &quot;is_universal&quot;: false,
    &quot;termination_date&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-employees--employee--universal" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-employees--employee--universal"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-employees--employee--universal"></code></pre>
</span>
<span id="execution-error-POSTapi-employees--employee--universal" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-employees--employee--universal"></code></pre>
</span>
<form id="form-POSTapi-employees--employee--universal" data-method="POST"
      data-path="api/employees/{employee}/universal"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer P31bdfhgc46E5a6k8DvaZeV","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-employees--employee--universal', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-employees--employee--universal"
                    onclick="tryItOut('POSTapi-employees--employee--universal');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-employees--employee--universal"
                    onclick="cancelTryOut('POSTapi-employees--employee--universal');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-employees--employee--universal" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/employees/{employee}/universal</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-employees--employee--universal" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-employees--employee--universal"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>employee</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="employee"
               data-endpoint="POSTapi-employees--employee--universal"
               value="9"
               data-component="url" hidden>
    <br>

            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>is_vip</code></b>&nbsp;&nbsp;<small>boolean</small>  &nbsp;
                <label data-endpoint="POSTapi-employees--employee--universal" hidden>
            <input type="radio" name="is_vip"
                   value="true"
                   data-endpoint="POSTapi-employees--employee--universal"
                   data-component="body"
            >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-employees--employee--universal" hidden>
            <input type="radio" name="is_vip"
                   value="false"
                   data-endpoint="POSTapi-employees--employee--universal"
                   data-component="body"
            >
            <code>false</code>
        </label>
    <br>
<p>Indicates if the employee should be added to or removed from the Universal list</p>
        </p>
        </form>

            <h2 id="endpoints-GETapi-employees">Employees All</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of employees registered.</p>

<span id="example-requests-GETapi-employees">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/employees?site=fugiat&amp;project=dolore&amp;department=tenetur&amp;position=laborum" \
    --header "Authorization: Bearer cV65PvkfZDad6heb8Ega143" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/employees"
);

const params = {
    "site": "fugiat",
    "project": "dolore",
    "department": "tenetur",
    "position": "laborum",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer cV65PvkfZDad6heb8Ega143",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-employees">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 10006,
            &quot;first_name&quot;: &quot;August&quot;,
            &quot;second_first_name&quot;: &quot;Nicklaus&quot;,
            &quot;last_name&quot;: &quot;Schaefer&quot;,
            &quot;second_last_name&quot;: &quot;Wuckert&quot;,
            &quot;full_name&quot;: &quot;August Nicklaus Schaefer Wuckert&quot;,
            &quot;hire_date&quot;: &quot;1990-08-30&quot;,
            &quot;personal_id&quot;: &quot;40546748566&quot;,
            &quot;passport&quot;: null,
            &quot;date_of_birth&quot;: &quot;1996-10-15&quot;,
            &quot;cellphone_number&quot;: &quot;8095607690&quot;,
            &quot;secondary_phone&quot;: null,
            &quot;site&quot;: &quot;Prof. Quincy Lockman DVM&quot;,
            &quot;project&quot;: &quot;Gustave Homenick&quot;,
            &quot;position&quot;: &quot;Dr. Arlo Walter Dds&quot;,
            &quot;salary&quot;: 125,
            &quot;salary_type&quot;: &quot;Kaylah Ratke&quot;,
            &quot;pay_per_hours&quot;: 125,
            &quot;department&quot;: &quot;Malachi Feeney I&quot;,
            &quot;supervisor&quot;: &quot;Yismen Jorge&quot;,
            &quot;gender&quot;: &quot;Ms. Kamille Hagenes MD&quot;,
            &quot;marital&quot;: &quot;Miss Brenda Will&quot;,
            &quot;ars&quot;: &quot;Adan Friesen&quot;,
            &quot;afp&quot;: &quot;Devonte Goyette DDS&quot;,
            &quot;nationality&quot;: &quot;Guam_662326&quot;,
            &quot;has_kids&quot;: 0,
            &quot;photo&quot;: &quot;storage/images/employees/10006.png&quot;,
            &quot;active&quot;: true,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;punch&quot;: null,
            &quot;account_number&quot;: null,
            &quot;is_vip&quot;: true,
            &quot;is_universal&quot;: false,
            &quot;termination_date&quot;: null
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-employees" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-employees"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-employees"></code></pre>
</span>
<span id="execution-error-GETapi-employees" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-employees"></code></pre>
</span>
<form id="form-GETapi-employees" data-method="GET"
      data-path="api/employees"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer cV65PvkfZDad6heb8Ega143","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-employees', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-employees"
                    onclick="tryItOut('GETapi-employees');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-employees"
                    onclick="cancelTryOut('GETapi-employees');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-employees" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/employees</code></b>
        </p>
                <p>
            <label id="auth-GETapi-employees" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-employees"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-employees"
               value="fugiat"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>project</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project"
               data-endpoint="GETapi-employees"
               value="dolore"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project. Example ?project=%Pub%</p>
            </p>
                    <p>
                <b><code>department</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="department"
               data-endpoint="GETapi-employees"
               value="tenetur"
               data-component="query" hidden>
    <br>
<p>Limit results to specific department. Example ?department=%Product%</p>
            </p>
                    <p>
                <b><code>position</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="position"
               data-endpoint="GETapi-employees"
               value="laborum"
               data-component="query" hidden>
    <br>
<p>Limit results to specific position. Example ?position=%Agente%</p>
            </p>
                </form>

            <h2 id="endpoints-GETapi-employees-all">Employees All</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of employees registered.</p>

<span id="example-requests-GETapi-employees-all">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/employees/all?site=maxime&amp;project=et&amp;department=deserunt&amp;position=voluptatem" \
    --header "Authorization: Bearer afgV6h58D1v6cdZebaPkE43" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/employees/all"
);

const params = {
    "site": "maxime",
    "project": "et",
    "department": "deserunt",
    "position": "voluptatem",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer afgV6h58D1v6cdZebaPkE43",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-employees-all">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 10006,
            &quot;first_name&quot;: &quot;August&quot;,
            &quot;second_first_name&quot;: &quot;Nicklaus&quot;,
            &quot;last_name&quot;: &quot;Schaefer&quot;,
            &quot;second_last_name&quot;: &quot;Wuckert&quot;,
            &quot;full_name&quot;: &quot;August Nicklaus Schaefer Wuckert&quot;,
            &quot;hire_date&quot;: &quot;1990-08-30&quot;,
            &quot;personal_id&quot;: &quot;40546748566&quot;,
            &quot;passport&quot;: null,
            &quot;date_of_birth&quot;: &quot;1996-10-15&quot;,
            &quot;cellphone_number&quot;: &quot;8095607690&quot;,
            &quot;secondary_phone&quot;: null,
            &quot;site&quot;: &quot;Prof. Quincy Lockman DVM&quot;,
            &quot;project&quot;: &quot;Gustave Homenick&quot;,
            &quot;position&quot;: &quot;Dr. Arlo Walter Dds&quot;,
            &quot;salary&quot;: 125,
            &quot;salary_type&quot;: &quot;Kaylah Ratke&quot;,
            &quot;pay_per_hours&quot;: 125,
            &quot;department&quot;: &quot;Malachi Feeney I&quot;,
            &quot;supervisor&quot;: &quot;Yismen Jorge&quot;,
            &quot;gender&quot;: &quot;Ms. Kamille Hagenes MD&quot;,
            &quot;marital&quot;: &quot;Miss Brenda Will&quot;,
            &quot;ars&quot;: &quot;Adan Friesen&quot;,
            &quot;afp&quot;: &quot;Devonte Goyette DDS&quot;,
            &quot;nationality&quot;: &quot;Guam_662326&quot;,
            &quot;has_kids&quot;: 0,
            &quot;photo&quot;: &quot;storage/images/employees/10006.png&quot;,
            &quot;active&quot;: true,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;punch&quot;: null,
            &quot;account_number&quot;: null,
            &quot;is_vip&quot;: true,
            &quot;is_universal&quot;: false,
            &quot;termination_date&quot;: null
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-employees-all" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-employees-all"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-employees-all"></code></pre>
</span>
<span id="execution-error-GETapi-employees-all" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-employees-all"></code></pre>
</span>
<form id="form-GETapi-employees-all" data-method="GET"
      data-path="api/employees/all"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer afgV6h58D1v6cdZebaPkE43","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-employees-all', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-employees-all"
                    onclick="tryItOut('GETapi-employees-all');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-employees-all"
                    onclick="cancelTryOut('GETapi-employees-all');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-employees-all" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/employees/all</code></b>
        </p>
                <p>
            <label id="auth-GETapi-employees-all" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-employees-all"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-employees-all"
               value="maxime"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>project</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project"
               data-endpoint="GETapi-employees-all"
               value="et"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project. Example ?project=%Pub%</p>
            </p>
                    <p>
                <b><code>department</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="department"
               data-endpoint="GETapi-employees-all"
               value="deserunt"
               data-component="query" hidden>
    <br>
<p>Limit results to specific department. Example ?department=%Product%</p>
            </p>
                    <p>
                <b><code>position</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="position"
               data-endpoint="GETapi-employees-all"
               value="voluptatem"
               data-component="query" hidden>
    <br>
<p>Limit results to specific position. Example ?position=%Agente%</p>
            </p>
                </form>

            <h2 id="endpoints-GETapi-employees-actives">Employees Actives</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of employees actives. This is any employee without a termination.</p>

<span id="example-requests-GETapi-employees-actives">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/employees/actives?site=inventore&amp;project=et&amp;department=aliquam&amp;position=architecto" \
    --header "Authorization: Bearer E4f8aeVa56Db6v31PZcgkdh" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/employees/actives"
);

const params = {
    "site": "inventore",
    "project": "et",
    "department": "aliquam",
    "position": "architecto",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer E4f8aeVa56Db6v31PZcgkdh",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-employees-actives">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 10006,
            &quot;first_name&quot;: &quot;August&quot;,
            &quot;second_first_name&quot;: &quot;Nicklaus&quot;,
            &quot;last_name&quot;: &quot;Schaefer&quot;,
            &quot;second_last_name&quot;: &quot;Wuckert&quot;,
            &quot;full_name&quot;: &quot;August Nicklaus Schaefer Wuckert&quot;,
            &quot;hire_date&quot;: &quot;1990-08-30&quot;,
            &quot;personal_id&quot;: &quot;40546748566&quot;,
            &quot;passport&quot;: null,
            &quot;date_of_birth&quot;: &quot;1996-10-15&quot;,
            &quot;cellphone_number&quot;: &quot;8095607690&quot;,
            &quot;secondary_phone&quot;: null,
            &quot;site&quot;: &quot;Prof. Quincy Lockman DVM&quot;,
            &quot;project&quot;: &quot;Gustave Homenick&quot;,
            &quot;position&quot;: &quot;Dr. Arlo Walter Dds&quot;,
            &quot;salary&quot;: 125,
            &quot;salary_type&quot;: &quot;Kaylah Ratke&quot;,
            &quot;pay_per_hours&quot;: 125,
            &quot;department&quot;: &quot;Malachi Feeney I&quot;,
            &quot;supervisor&quot;: &quot;Yismen Jorge&quot;,
            &quot;gender&quot;: &quot;Ms. Kamille Hagenes MD&quot;,
            &quot;marital&quot;: &quot;Miss Brenda Will&quot;,
            &quot;ars&quot;: &quot;Adan Friesen&quot;,
            &quot;afp&quot;: &quot;Devonte Goyette DDS&quot;,
            &quot;nationality&quot;: &quot;Guam_662326&quot;,
            &quot;has_kids&quot;: 0,
            &quot;photo&quot;: &quot;storage/images/employees/10006.png&quot;,
            &quot;active&quot;: true,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;punch&quot;: null,
            &quot;account_number&quot;: null,
            &quot;is_vip&quot;: true,
            &quot;is_universal&quot;: false,
            &quot;termination_date&quot;: null
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-employees-actives" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-employees-actives"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-employees-actives"></code></pre>
</span>
<span id="execution-error-GETapi-employees-actives" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-employees-actives"></code></pre>
</span>
<form id="form-GETapi-employees-actives" data-method="GET"
      data-path="api/employees/actives"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer E4f8aeVa56Db6v31PZcgkdh","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-employees-actives', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-employees-actives"
                    onclick="tryItOut('GETapi-employees-actives');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-employees-actives"
                    onclick="cancelTryOut('GETapi-employees-actives');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-employees-actives" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/employees/actives</code></b>
        </p>
                <p>
            <label id="auth-GETapi-employees-actives" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-employees-actives"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-employees-actives"
               value="inventore"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>project</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project"
               data-endpoint="GETapi-employees-actives"
               value="et"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project. Example ?project=%Pub%</p>
            </p>
                    <p>
                <b><code>department</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="department"
               data-endpoint="GETapi-employees-actives"
               value="aliquam"
               data-component="query" hidden>
    <br>
<p>Limit results to specific department. Example ?department=%Product%</p>
            </p>
                    <p>
                <b><code>position</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="position"
               data-endpoint="GETapi-employees-actives"
               value="architecto"
               data-component="query" hidden>
    <br>
<p>Limit results to specific position. Example ?position=%Agente%</p>
            </p>
                </form>

            <h2 id="endpoints-GETapi-employees-recents">Employees Recents</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of recent employees. Recents are all active imployees plus any inactive employee with a termination date greater than 30 days ago.</p>

<span id="example-requests-GETapi-employees-recents">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/employees/recents?site=cupiditate&amp;project=et&amp;department=quia&amp;position=eos" \
    --header "Authorization: Bearer ebPh4k1Efv653cg6Zaa8VDd" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/employees/recents"
);

const params = {
    "site": "cupiditate",
    "project": "et",
    "department": "quia",
    "position": "eos",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer ebPh4k1Efv653cg6Zaa8VDd",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-employees-recents">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 10006,
            &quot;first_name&quot;: &quot;August&quot;,
            &quot;second_first_name&quot;: &quot;Nicklaus&quot;,
            &quot;last_name&quot;: &quot;Schaefer&quot;,
            &quot;second_last_name&quot;: &quot;Wuckert&quot;,
            &quot;full_name&quot;: &quot;August Nicklaus Schaefer Wuckert&quot;,
            &quot;hire_date&quot;: &quot;1990-08-30&quot;,
            &quot;personal_id&quot;: &quot;40546748566&quot;,
            &quot;passport&quot;: null,
            &quot;date_of_birth&quot;: &quot;1996-10-15&quot;,
            &quot;cellphone_number&quot;: &quot;8095607690&quot;,
            &quot;secondary_phone&quot;: null,
            &quot;site&quot;: &quot;Prof. Quincy Lockman DVM&quot;,
            &quot;project&quot;: &quot;Gustave Homenick&quot;,
            &quot;position&quot;: &quot;Dr. Arlo Walter Dds&quot;,
            &quot;salary&quot;: 125,
            &quot;salary_type&quot;: &quot;Kaylah Ratke&quot;,
            &quot;pay_per_hours&quot;: 125,
            &quot;department&quot;: &quot;Malachi Feeney I&quot;,
            &quot;supervisor&quot;: &quot;Yismen Jorge&quot;,
            &quot;gender&quot;: &quot;Ms. Kamille Hagenes MD&quot;,
            &quot;marital&quot;: &quot;Miss Brenda Will&quot;,
            &quot;ars&quot;: &quot;Adan Friesen&quot;,
            &quot;afp&quot;: &quot;Devonte Goyette DDS&quot;,
            &quot;nationality&quot;: &quot;Guam_662326&quot;,
            &quot;has_kids&quot;: 0,
            &quot;photo&quot;: &quot;storage/images/employees/10006.png&quot;,
            &quot;active&quot;: true,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;punch&quot;: null,
            &quot;account_number&quot;: null,
            &quot;is_vip&quot;: true,
            &quot;is_universal&quot;: false,
            &quot;termination_date&quot;: null
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-employees-recents" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-employees-recents"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-employees-recents"></code></pre>
</span>
<span id="execution-error-GETapi-employees-recents" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-employees-recents"></code></pre>
</span>
<form id="form-GETapi-employees-recents" data-method="GET"
      data-path="api/employees/recents"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer ebPh4k1Efv653cg6Zaa8VDd","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-employees-recents', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-employees-recents"
                    onclick="tryItOut('GETapi-employees-recents');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-employees-recents"
                    onclick="cancelTryOut('GETapi-employees-recents');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-employees-recents" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/employees/recents</code></b>
        </p>
                <p>
            <label id="auth-GETapi-employees-recents" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-employees-recents"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-employees-recents"
               value="cupiditate"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>project</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project"
               data-endpoint="GETapi-employees-recents"
               value="et"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project. Example ?project=%Pub%</p>
            </p>
                    <p>
                <b><code>department</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="department"
               data-endpoint="GETapi-employees-recents"
               value="quia"
               data-component="query" hidden>
    <br>
<p>Limit results to specific department. Example ?department=%Product%</p>
            </p>
                    <p>
                <b><code>position</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="position"
               data-endpoint="GETapi-employees-recents"
               value="eos"
               data-component="query" hidden>
    <br>
<p>Limit results to specific position. Example ?position=%Agente%</p>
            </p>
                </form>

            <h2 id="endpoints-GETapi-holidays">Holidays Dates</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of holidays. If year is not especified in the query string, it will return all holidays for previous year, current year and futuristic holidays.</p>

<span id="example-requests-GETapi-holidays">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/holidays?year=qui" \
    --header "Authorization: Bearer Zae4D6Vf315hk8dva6PbcgE" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/holidays"
);

const params = {
    "year": "qui",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer Zae4D6Vf315hk8dva6PbcgE",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-holidays">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;date&quot;: &quot;2021-07-04&quot;,
            &quot;name&quot;: &quot;Independence Day&quot;,
            &quot;description&quot;: &quot;Day of idenpendence in USA.&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-holidays" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-holidays"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-holidays"></code></pre>
</span>
<span id="execution-error-GETapi-holidays" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-holidays"></code></pre>
</span>
<form id="form-GETapi-holidays" data-method="GET"
      data-path="api/holidays"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer Zae4D6Vf315hk8dva6PbcgE","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-holidays', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-holidays"
                    onclick="tryItOut('GETapi-holidays');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-holidays"
                    onclick="cancelTryOut('GETapi-holidays');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-holidays" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/holidays</code></b>
        </p>
                <p>
            <label id="auth-GETapi-holidays" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-holidays"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>year</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="year"
               data-endpoint="GETapi-holidays"
               value="qui"
               data-component="query" hidden>
    <br>
<p>Limit the results to a specific year. Default to previous year. Example ?year=2021.</p>
            </p>
                </form>

            <h2 id="endpoints-GETapi-overnight_hours">Overnight Hours</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of all the overnight hours</p>

<span id="example-requests-GETapi-overnight_hours">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/overnight_hours?date=et&amp;months=12&amp;days=3" \
    --header "Authorization: Bearer dk4eh615fgZDbavcP3aV68E" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/overnight_hours"
);

const params = {
    "date": "et",
    "months": "12",
    "days": "3",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer dk4eh615fgZDbavcP3aV68E",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-overnight_hours">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;date&quot;: &quot;2021-12-01&quot;,
            &quot;employee_id&quot;: 10009,
            &quot;name&quot;: &quot;Clifford Odell Jerde Vandervort&quot;,
            &quot;hours&quot;: 8
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-overnight_hours" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-overnight_hours"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-overnight_hours"></code></pre>
</span>
<span id="execution-error-GETapi-overnight_hours" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-overnight_hours"></code></pre>
</span>
<form id="form-GETapi-overnight_hours" data-method="GET"
      data-path="api/overnight_hours"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer dk4eh615fgZDbavcP3aV68E","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-overnight_hours', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-overnight_hours"
                    onclick="tryItOut('GETapi-overnight_hours');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-overnight_hours"
                    onclick="cancelTryOut('GETapi-overnight_hours');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-overnight_hours" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/overnight_hours</code></b>
        </p>
                <p>
            <label id="auth-GETapi-overnight_hours" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-overnight_hours"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>date</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="date"
               data-endpoint="GETapi-overnight_hours"
               value="et"
               data-component="query" hidden>
    <br>
<p>Limit the results ot a specific date. Example ?date=2021-11-24.</p>
            </p>
                    <p>
                <b><code>months</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="months"
               data-endpoint="GETapi-overnight_hours"
               value="12"
               data-component="query" hidden>
    <br>
<p>Defines how many months back should the data limited to. Example ?months=2 will get data between current date and last two months.</p>
            </p>
                    <p>
                <b><code>days</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="days"
               data-endpoint="GETapi-overnight_hours"
               value="3"
               data-component="query" hidden>
    <br>
<p>Defines how many days back should the data limited to. Example ?days=2 will get data between current date and last two days.</p>
            </p>
                </form>

            <h2 id="endpoints-GETapi-notifications-unread">Notifications Unread</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Return a list of unread notifications for the authenticated user.</p>

<span id="example-requests-GETapi-notifications-unread">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/notifications/unread?max_items=17" \
    --header "Authorization: Bearer egvcD13P5khVd4a68baZEf6" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/notifications/unread"
);

const params = {
    "max_items": "17",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer egvcD13P5khVd4a68baZEf6",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-notifications-unread">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">[
    {
        &quot;id&quot;: &quot;d8e62834-828a-482d-a279-bb113fcaaa53&quot;,
        &quot;type&quot;: &quot;App\\Notifications\\UserCreatedNotification&quot;,
        &quot;notifiable_type&quot;: &quot;App\\User&quot;,
        &quot;notifiable_id&quot;: 1,
        &quot;data&quot;: [],
        &quot;read_at&quot;: null,
        &quot;created_at&quot;: &quot;2021-11-24T14:33:44.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2021-11-24T14:33:44.000000Z&quot;
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-notifications-unread" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-notifications-unread"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-notifications-unread"></code></pre>
</span>
<span id="execution-error-GETapi-notifications-unread" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-notifications-unread"></code></pre>
</span>
<form id="form-GETapi-notifications-unread" data-method="GET"
      data-path="api/notifications/unread"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer egvcD13P5khVd4a68baZEf6","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-notifications-unread', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-notifications-unread"
                    onclick="tryItOut('GETapi-notifications-unread');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-notifications-unread"
                    onclick="cancelTryOut('GETapi-notifications-unread');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-notifications-unread" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/notifications/unread</code></b>
        </p>
                <p>
            <label id="auth-GETapi-notifications-unread" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-notifications-unread"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>max_items</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="max_items"
               data-endpoint="GETapi-notifications-unread"
               value="17"
               data-component="query" hidden>
    <br>
<p>Max amount of notifications to take. Default is 25.</p>
            </p>
                </form>

            <h2 id="endpoints-POSTapi-notifications-mark-all-as-read">Notifications Mark all as Read</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Cleans the unread notifications for the user</p>

<span id="example-requests-POSTapi-notifications-mark-all-as-read">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "dainsys.test/api/notifications/mark-all-as-read?max_items=19" \
    --header "Authorization: Bearer 65D6k4aPfEcbhga3Vdve18Z" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/notifications/mark-all-as-read"
);

const params = {
    "max_items": "19",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer 65D6k4aPfEcbhga3Vdve18Z",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-notifications-mark-all-as-read">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">[
    {
        &quot;id&quot;: &quot;d8e62834-828a-482d-a279-bb113fcaaa53&quot;,
        &quot;type&quot;: &quot;App\\Notifications\\UserCreatedNotification&quot;,
        &quot;notifiable_type&quot;: &quot;App\\User&quot;,
        &quot;notifiable_id&quot;: 1,
        &quot;data&quot;: [],
        &quot;read_at&quot;: null,
        &quot;created_at&quot;: &quot;2021-11-24T14:33:44.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2021-11-24T14:33:44.000000Z&quot;
    }
]</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-notifications-mark-all-as-read" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-notifications-mark-all-as-read"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-notifications-mark-all-as-read"></code></pre>
</span>
<span id="execution-error-POSTapi-notifications-mark-all-as-read" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-notifications-mark-all-as-read"></code></pre>
</span>
<form id="form-POSTapi-notifications-mark-all-as-read" data-method="POST"
      data-path="api/notifications/mark-all-as-read"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer 65D6k4aPfEcbhga3Vdve18Z","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-notifications-mark-all-as-read', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-notifications-mark-all-as-read"
                    onclick="tryItOut('POSTapi-notifications-mark-all-as-read');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-notifications-mark-all-as-read"
                    onclick="cancelTryOut('POSTapi-notifications-mark-all-as-read');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-notifications-mark-all-as-read" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/notifications/mark-all-as-read</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-notifications-mark-all-as-read" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-notifications-mark-all-as-read"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>max_items</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="max_items"
               data-endpoint="POSTapi-notifications-mark-all-as-read"
               value="19"
               data-component="query" hidden>
    <br>
<p>Max amount of notifications to mark as read. Default is 25. This will also affect the amount of
unread notifications to return. Also, this will return the next batch of unread notifications for the authenticated user.</p>
            </p>
                </form>

            <h2 id="endpoints-GETapi-notifications-show--notification-">Notification Details</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Show details for a user notification. This will also mark the given notification as read.</p>

<span id="example-requests-GETapi-notifications-show--notification-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/notifications/show/iste" \
    --header "Authorization: Bearer 3hg1f5aEakP6vVc8ZdD4b6e" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/notifications/show/iste"
);

const headers = {
    "Authorization": "Bearer 3hg1f5aEakP6vVc8ZdD4b6e",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-notifications-show--notification-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;id&quot;: &quot;d8e62834-828a-482d-a279-bb113fcaaa53&quot;,
    &quot;type&quot;: &quot;App\\Notifications\\UserCreatedNotification&quot;,
    &quot;notifiable_type&quot;: &quot;App\\User&quot;,
    &quot;notifiable_id&quot;: 1,
    &quot;data&quot;: &quot;[]&quot;,
    &quot;read_at&quot;: &quot;2021-12-01T22:29:34.797992Z&quot;,
    &quot;created_at&quot;: &quot;2021-11-24T14:33:44.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2021-12-01T22:29:34.000000Z&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-notifications-show--notification-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-notifications-show--notification-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-notifications-show--notification-"></code></pre>
</span>
<span id="execution-error-GETapi-notifications-show--notification-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-notifications-show--notification-"></code></pre>
</span>
<form id="form-GETapi-notifications-show--notification-" data-method="GET"
      data-path="api/notifications/show/{notification}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer 3hg1f5aEakP6vVc8ZdD4b6e","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-notifications-show--notification-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-notifications-show--notification-"
                    onclick="tryItOut('GETapi-notifications-show--notification-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-notifications-show--notification-"
                    onclick="cancelTryOut('GETapi-notifications-show--notification-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-notifications-show--notification-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/notifications/show/{notification}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-notifications-show--notification-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-notifications-show--notification-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>notification</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="notification"
               data-endpoint="GETapi-notifications-show--notification-"
               value="iste"
               data-component="url" hidden>
    <br>
<p>Uuid of the stored notification</p>
            </p>
                    </form>

            <h2 id="endpoints-GETapi-v2-user">Authenticated User</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Return information of the authenticated user</p>

<span id="example-requests-GETapi-v2-user">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/v2/user" \
    --header "Authorization: Bearer V6cdh6egEP8Z3aDf51ak4vb" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/user"
);

const headers = {
    "Authorization": "Bearer V6cdh6egEP8Z3aDf51ak4vb",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v2-user">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;id&quot;: 1,
    &quot;name&quot;: &quot;Yismen Jorge&quot;,
    &quot;email&quot;: &quot;yismen.jorge@gmail.com&quot;,
    &quot;is_active&quot;: 1,
    &quot;is_admin&quot;: 1,
    &quot;username&quot;: &quot;yjorge&quot;,
    &quot;created_at&quot;: &quot;2021-11-19T15:09:09.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2021-11-19T15:09:09.000000Z&quot;,
    &quot;deleted_at&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v2-user" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v2-user"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v2-user"></code></pre>
</span>
<span id="execution-error-GETapi-v2-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v2-user"></code></pre>
</span>
<form id="form-GETapi-v2-user" data-method="GET"
      data-path="api/v2/user"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer V6cdh6egEP8Z3aDf51ak4vb","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v2-user', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v2-user"
                    onclick="tryItOut('GETapi-v2-user');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v2-user"
                    onclick="cancelTryOut('GETapi-v2-user');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v2-user" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v2/user</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v2-user" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v2-user"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="endpoints-POSTapi-v2-employees--employee--vip">Update VIP</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Update VIP information for a given employee.</p>

<span id="example-requests-POSTapi-v2-employees--employee--vip">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "dainsys.test/api/v2/employees/10/vip" \
    --header "Authorization: Bearer 3gZvdchb68aEVeP1k4f5D6a" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"is_vip\": false
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/employees/10/vip"
);

const headers = {
    "Authorization": "Bearer 3gZvdchb68aEVeP1k4f5D6a",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "is_vip": false
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v2-employees--employee--vip">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;id&quot;: 10006,
    &quot;first_name&quot;: &quot;August&quot;,
    &quot;second_first_name&quot;: &quot;Nicklaus&quot;,
    &quot;last_name&quot;: &quot;Schaefer&quot;,
    &quot;second_last_name&quot;: &quot;Wuckert&quot;,
    &quot;full_name&quot;: &quot;August Nicklaus Schaefer Wuckert&quot;,
    &quot;hire_date&quot;: &quot;1990-08-30&quot;,
    &quot;personal_id&quot;: &quot;40546748566&quot;,
    &quot;passport&quot;: null,
    &quot;date_of_birth&quot;: &quot;1996-10-15&quot;,
    &quot;cellphone_number&quot;: &quot;8095607690&quot;,
    &quot;secondary_phone&quot;: null,
    &quot;site&quot;: &quot;Prof. Quincy Lockman DVM&quot;,
    &quot;project&quot;: &quot;Gustave Homenick&quot;,
    &quot;position&quot;: &quot;Dr. Arlo Walter Dds&quot;,
    &quot;salary&quot;: 125,
    &quot;salary_type&quot;: &quot;Kaylah Ratke&quot;,
    &quot;pay_per_hours&quot;: 125,
    &quot;department&quot;: &quot;Malachi Feeney I&quot;,
    &quot;supervisor&quot;: &quot;Yismen Jorge&quot;,
    &quot;gender&quot;: &quot;Ms. Kamille Hagenes MD&quot;,
    &quot;marital&quot;: &quot;Miss Brenda Will&quot;,
    &quot;ars&quot;: &quot;Adan Friesen&quot;,
    &quot;afp&quot;: &quot;Devonte Goyette DDS&quot;,
    &quot;nationality&quot;: &quot;Guam_662326&quot;,
    &quot;has_kids&quot;: 0,
    &quot;photo&quot;: &quot;storage/images/employees/10006.png&quot;,
    &quot;active&quot;: true,
    &quot;status&quot;: &quot;Active&quot;,
    &quot;punch&quot;: null,
    &quot;account_number&quot;: null,
    &quot;is_vip&quot;: true,
    &quot;is_universal&quot;: false,
    &quot;termination_date&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v2-employees--employee--vip" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v2-employees--employee--vip"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v2-employees--employee--vip"></code></pre>
</span>
<span id="execution-error-POSTapi-v2-employees--employee--vip" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v2-employees--employee--vip"></code></pre>
</span>
<form id="form-POSTapi-v2-employees--employee--vip" data-method="POST"
      data-path="api/v2/employees/{employee}/vip"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer 3gZvdchb68aEVeP1k4f5D6a","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v2-employees--employee--vip', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v2-employees--employee--vip"
                    onclick="tryItOut('POSTapi-v2-employees--employee--vip');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v2-employees--employee--vip"
                    onclick="cancelTryOut('POSTapi-v2-employees--employee--vip');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v2-employees--employee--vip" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v2/employees/{employee}/vip</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-v2-employees--employee--vip" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-v2-employees--employee--vip"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>employee</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="employee"
               data-endpoint="POSTapi-v2-employees--employee--vip"
               value="10"
               data-component="url" hidden>
    <br>

            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>is_vip</code></b>&nbsp;&nbsp;<small>boolean</small>  &nbsp;
                <label data-endpoint="POSTapi-v2-employees--employee--vip" hidden>
            <input type="radio" name="is_vip"
                   value="true"
                   data-endpoint="POSTapi-v2-employees--employee--vip"
                   data-component="body"
            >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-v2-employees--employee--vip" hidden>
            <input type="radio" name="is_vip"
                   value="false"
                   data-endpoint="POSTapi-v2-employees--employee--vip"
                   data-component="body"
            >
            <code>false</code>
        </label>
    <br>
<p>Indicates if the employee should be added to or removed from the Vip list</p>
        </p>
        </form>

            <h2 id="endpoints-POSTapi-v2-notifications-mark-all-as-read">Notifications Mark all as Read</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Cleans the unread notifications for the user</p>

<span id="example-requests-POSTapi-v2-notifications-mark-all-as-read">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "dainsys.test/api/v2/notifications/mark-all-as-read?max_items=8" \
    --header "Authorization: Bearer 4gcaEPdvDhba86eVZk51f63" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/notifications/mark-all-as-read"
);

const params = {
    "max_items": "8",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer 4gcaEPdvDhba86eVZk51f63",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v2-notifications-mark-all-as-read">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">[
    {
        &quot;id&quot;: &quot;d8e62834-828a-482d-a279-bb113fcaaa53&quot;,
        &quot;type&quot;: &quot;App\\Notifications\\UserCreatedNotification&quot;,
        &quot;notifiable_type&quot;: &quot;App\\User&quot;,
        &quot;notifiable_id&quot;: 1,
        &quot;data&quot;: [],
        &quot;read_at&quot;: null,
        &quot;created_at&quot;: &quot;2021-11-24T14:33:44.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2021-11-24T14:33:44.000000Z&quot;
    }
]</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v2-notifications-mark-all-as-read" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v2-notifications-mark-all-as-read"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v2-notifications-mark-all-as-read"></code></pre>
</span>
<span id="execution-error-POSTapi-v2-notifications-mark-all-as-read" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v2-notifications-mark-all-as-read"></code></pre>
</span>
<form id="form-POSTapi-v2-notifications-mark-all-as-read" data-method="POST"
      data-path="api/v2/notifications/mark-all-as-read"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer 4gcaEPdvDhba86eVZk51f63","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v2-notifications-mark-all-as-read', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v2-notifications-mark-all-as-read"
                    onclick="tryItOut('POSTapi-v2-notifications-mark-all-as-read');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v2-notifications-mark-all-as-read"
                    onclick="cancelTryOut('POSTapi-v2-notifications-mark-all-as-read');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v2-notifications-mark-all-as-read" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v2/notifications/mark-all-as-read</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-v2-notifications-mark-all-as-read" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-v2-notifications-mark-all-as-read"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>max_items</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="max_items"
               data-endpoint="POSTapi-v2-notifications-mark-all-as-read"
               value="8"
               data-component="query" hidden>
    <br>
<p>Max amount of notifications to mark as read. Default is 25. This will also affect the amount of
unread notifications to return. Also, this will return the next batch of unread notifications for the authenticated user.</p>
            </p>
                </form>

            <h2 id="endpoints-GETapi-v2-notifications-unread">Notifications Unread</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Return a list of unread notifications for the authenticated user.</p>

<span id="example-requests-GETapi-v2-notifications-unread">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/v2/notifications/unread?max_items=14" \
    --header "Authorization: Bearer fcgPkE1aDdeZ3Vh6b5va648" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/notifications/unread"
);

const params = {
    "max_items": "14",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer fcgPkE1aDdeZ3Vh6b5va648",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v2-notifications-unread">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">[
    {
        &quot;id&quot;: &quot;d8e62834-828a-482d-a279-bb113fcaaa53&quot;,
        &quot;type&quot;: &quot;App\\Notifications\\UserCreatedNotification&quot;,
        &quot;notifiable_type&quot;: &quot;App\\User&quot;,
        &quot;notifiable_id&quot;: 1,
        &quot;data&quot;: [],
        &quot;read_at&quot;: null,
        &quot;created_at&quot;: &quot;2021-11-24T14:33:44.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2021-11-24T14:33:44.000000Z&quot;
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v2-notifications-unread" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v2-notifications-unread"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v2-notifications-unread"></code></pre>
</span>
<span id="execution-error-GETapi-v2-notifications-unread" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v2-notifications-unread"></code></pre>
</span>
<form id="form-GETapi-v2-notifications-unread" data-method="GET"
      data-path="api/v2/notifications/unread"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer fcgPkE1aDdeZ3Vh6b5va648","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v2-notifications-unread', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v2-notifications-unread"
                    onclick="tryItOut('GETapi-v2-notifications-unread');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v2-notifications-unread"
                    onclick="cancelTryOut('GETapi-v2-notifications-unread');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v2-notifications-unread" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v2/notifications/unread</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v2-notifications-unread" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v2-notifications-unread"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>max_items</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="max_items"
               data-endpoint="GETapi-v2-notifications-unread"
               value="14"
               data-component="query" hidden>
    <br>
<p>Max amount of notifications to take. Default is 25.</p>
            </p>
                </form>

            <h2 id="endpoints-GETapi-v2-overnight_hours">Overnight Hours</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of all the overnight hours</p>

<span id="example-requests-GETapi-v2-overnight_hours">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/v2/overnight_hours?date=magni&amp;months=15&amp;days=10" \
    --header "Authorization: Bearer ZE4g6dvD13P6cfhbaae85Vk" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/overnight_hours"
);

const params = {
    "date": "magni",
    "months": "15",
    "days": "10",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer ZE4g6dvD13P6cfhbaae85Vk",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v2-overnight_hours">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;date&quot;: &quot;2021-12-01&quot;,
            &quot;employee_id&quot;: 10009,
            &quot;name&quot;: &quot;Clifford Odell Jerde Vandervort&quot;,
            &quot;hours&quot;: 8
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v2-overnight_hours" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v2-overnight_hours"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v2-overnight_hours"></code></pre>
</span>
<span id="execution-error-GETapi-v2-overnight_hours" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v2-overnight_hours"></code></pre>
</span>
<form id="form-GETapi-v2-overnight_hours" data-method="GET"
      data-path="api/v2/overnight_hours"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer ZE4g6dvD13P6cfhbaae85Vk","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v2-overnight_hours', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v2-overnight_hours"
                    onclick="tryItOut('GETapi-v2-overnight_hours');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v2-overnight_hours"
                    onclick="cancelTryOut('GETapi-v2-overnight_hours');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v2-overnight_hours" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v2/overnight_hours</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v2-overnight_hours" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v2-overnight_hours"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>date</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="date"
               data-endpoint="GETapi-v2-overnight_hours"
               value="magni"
               data-component="query" hidden>
    <br>
<p>Limit the results ot a specific date. Example ?date=2021-11-24.</p>
            </p>
                    <p>
                <b><code>months</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="months"
               data-endpoint="GETapi-v2-overnight_hours"
               value="15"
               data-component="query" hidden>
    <br>
<p>Defines how many months back should the data limited to. Example ?months=2 will get data between current date and last two months.</p>
            </p>
                    <p>
                <b><code>days</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="days"
               data-endpoint="GETapi-v2-overnight_hours"
               value="10"
               data-component="query" hidden>
    <br>
<p>Defines how many days back should the data limited to. Example ?days=2 will get data between current date and last two days.</p>
            </p>
                </form>

            <h2 id="endpoints-GETapi-v2-holidays">Holidays Dates</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of holidays. If year is not especified in the query string, it will return all holidays for previous year, current year and futuristic holidays.</p>

<span id="example-requests-GETapi-v2-holidays">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/v2/holidays?year=dolorem" \
    --header "Authorization: Bearer 4Zve1a6h3DVcgEa8P6f5dkb" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/holidays"
);

const params = {
    "year": "dolorem",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer 4Zve1a6h3DVcgEa8P6f5dkb",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v2-holidays">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;date&quot;: &quot;2021-07-04&quot;,
            &quot;name&quot;: &quot;Independence Day&quot;,
            &quot;description&quot;: &quot;Day of idenpendence in USA.&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v2-holidays" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v2-holidays"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v2-holidays"></code></pre>
</span>
<span id="execution-error-GETapi-v2-holidays" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v2-holidays"></code></pre>
</span>
<form id="form-GETapi-v2-holidays" data-method="GET"
      data-path="api/v2/holidays"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer 4Zve1a6h3DVcgEa8P6f5dkb","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v2-holidays', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v2-holidays"
                    onclick="tryItOut('GETapi-v2-holidays');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v2-holidays"
                    onclick="cancelTryOut('GETapi-v2-holidays');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v2-holidays" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v2/holidays</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v2-holidays" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v2-holidays"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>year</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="year"
               data-endpoint="GETapi-v2-holidays"
               value="dolorem"
               data-component="query" hidden>
    <br>
<p>Limit the results to a specific year. Default to previous year. Example ?year=2021.</p>
            </p>
                </form>

            <h2 id="endpoints-POSTapi-v2-positions">Store Positions</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Save a Position model to database.</p>

<span id="example-requests-POSTapi-v2-positions">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "dainsys.test/api/v2/positions" \
    --header "Authorization: Bearer 6PcadeE48hDkVab1vfZ6g53" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"optio\",
    \"department_id\": \"qui\",
    \"payment_type_id\": \"similique\",
    \"payment_frequency_id\": \"voluptas\",
    \"salary\": \"praesentium\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/positions"
);

const headers = {
    "Authorization": "Bearer 6PcadeE48hDkVab1vfZ6g53",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "optio",
    "department_id": "qui",
    "payment_type_id": "similique",
    "payment_frequency_id": "voluptas",
    "salary": "praesentium"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v2-positions">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;name&quot;: &quot;Asdfasdf&quot;,
    &quot;department_id&quot;: 1,
    &quot;payment_type_id&quot;: 1,
    &quot;payment_frequency_id&quot;: 1,
    &quot;salary&quot;: 150,
    &quot;updated_at&quot;: &quot;2021-12-01T19:18:45.000000Z&quot;,
    &quot;created_at&quot;: &quot;2021-12-01T19:18:45.000000Z&quot;,
    &quot;id&quot;: 14,
    &quot;name_and_department&quot;: &quot;Administration-Asdfasdf&quot;,
    &quot;pay_per_hours&quot;: 150,
    &quot;department&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Administration&quot;,
        &quot;created_at&quot;: &quot;2021-11-19T15:09:20.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2021-11-19T15:09:20.000000Z&quot;
    },
    &quot;payment_type&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;By Hours&quot;,
        &quot;slug&quot;: &quot;by-hours&quot;,
        &quot;created_at&quot;: &quot;2021-11-19T15:09:42.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2021-11-19T15:09:42.000000Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v2-positions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v2-positions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v2-positions"></code></pre>
</span>
<span id="execution-error-POSTapi-v2-positions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v2-positions"></code></pre>
</span>
<form id="form-POSTapi-v2-positions" data-method="POST"
      data-path="api/v2/positions"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer 6PcadeE48hDkVab1vfZ6g53","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v2-positions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v2-positions"
                    onclick="tryItOut('POSTapi-v2-positions');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v2-positions"
                    onclick="cancelTryOut('POSTapi-v2-positions');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v2-positions" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v2/positions</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-v2-positions" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-v2-positions"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-v2-positions"
               value="optio"
               data-component="body" hidden>
    <br>
<p>The name of the Position</p>
        </p>
                <p>
            <b><code>department_id</code></b>&nbsp;&nbsp;<small>numeric</small>  &nbsp;
                <input type="text"
               name="department_id"
               data-endpoint="POSTapi-v2-positions"
               value="qui"
               data-component="body" hidden>
    <br>
<p>The department_id of the Position</p>
        </p>
                <p>
            <b><code>payment_type_id</code></b>&nbsp;&nbsp;<small>numeric</small>  &nbsp;
                <input type="text"
               name="payment_type_id"
               data-endpoint="POSTapi-v2-positions"
               value="similique"
               data-component="body" hidden>
    <br>
<p>The payment_type_id of the Position</p>
        </p>
                <p>
            <b><code>payment_frequency_id</code></b>&nbsp;&nbsp;<small>numeric</small>  &nbsp;
                <input type="text"
               name="payment_frequency_id"
               data-endpoint="POSTapi-v2-positions"
               value="voluptas"
               data-component="body" hidden>
    <br>
<p>The payment_frequency_id of the Position</p>
        </p>
                <p>
            <b><code>salary</code></b>&nbsp;&nbsp;<small>numeric</small>  &nbsp;
                <input type="text"
               name="salary"
               data-endpoint="POSTapi-v2-positions"
               value="praesentium"
               data-component="body" hidden>
    <br>
<p>The salary of the Position</p>
        </p>
        </form>

            <h2 id="endpoints-POSTapi-v2-payment_frequencies">Store Payment Frequencies</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Save a Payment Frequency model to database.</p>

<span id="example-requests-POSTapi-v2-payment_frequencies">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "dainsys.test/api/v2/payment_frequencies" \
    --header "Authorization: Bearer E6ZVdekcPf4186ghvb3a5aD" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"et\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/payment_frequencies"
);

const headers = {
    "Authorization": "Bearer E6ZVdekcPf4186ghvb3a5aD",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "et"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v2-payment_frequencies">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;name&quot;: &quot;Asdfasdf&quot;,
    &quot;updated_at&quot;: &quot;2021-12-01T19:05:29.000000Z&quot;,
    &quot;created_at&quot;: &quot;2021-12-01T19:05:29.000000Z&quot;,
    &quot;id&quot;: 12
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v2-payment_frequencies" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v2-payment_frequencies"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v2-payment_frequencies"></code></pre>
</span>
<span id="execution-error-POSTapi-v2-payment_frequencies" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v2-payment_frequencies"></code></pre>
</span>
<form id="form-POSTapi-v2-payment_frequencies" data-method="POST"
      data-path="api/v2/payment_frequencies"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer E6ZVdekcPf4186ghvb3a5aD","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v2-payment_frequencies', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v2-payment_frequencies"
                    onclick="tryItOut('POSTapi-v2-payment_frequencies');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v2-payment_frequencies"
                    onclick="cancelTryOut('POSTapi-v2-payment_frequencies');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v2-payment_frequencies" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v2/payment_frequencies</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-v2-payment_frequencies" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-v2-payment_frequencies"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-v2-payment_frequencies"
               value="et"
               data-component="body" hidden>
    <br>
<p>The name of the Payment Frequency</p>
        </p>
        </form>

            <h2 id="endpoints-POSTapi-v2-nationalities">Store Nationalities</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Save a Nationality model to database.</p>

<span id="example-requests-POSTapi-v2-nationalities">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "dainsys.test/api/v2/nationalities" \
    --header "Authorization: Bearer hvgfd6bPa36aDZ4E81kceV5" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"omnis\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/nationalities"
);

const headers = {
    "Authorization": "Bearer hvgfd6bPa36aDZ4E81kceV5",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "omnis"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v2-nationalities">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
     &quot;name&quot;: &quot;Asdfasdf&quot;,
 }</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v2-nationalities" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v2-nationalities"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v2-nationalities"></code></pre>
</span>
<span id="execution-error-POSTapi-v2-nationalities" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v2-nationalities"></code></pre>
</span>
<form id="form-POSTapi-v2-nationalities" data-method="POST"
      data-path="api/v2/nationalities"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer hvgfd6bPa36aDZ4E81kceV5","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v2-nationalities', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v2-nationalities"
                    onclick="tryItOut('POSTapi-v2-nationalities');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v2-nationalities"
                    onclick="cancelTryOut('POSTapi-v2-nationalities');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v2-nationalities" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v2/nationalities</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-v2-nationalities" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-v2-nationalities"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-v2-nationalities"
               value="omnis"
               data-component="body" hidden>
    <br>
<p>The name of the Nationality     *</p>
        </p>
        </form>

            <h2 id="endpoints-POSTapi-v2-departments">Store Departmens</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Save a Department model to database.</p>

<span id="example-requests-POSTapi-v2-departments">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "dainsys.test/api/v2/departments" \
    --header "Authorization: Bearer ca4dbEZk8a3DVe1fhgv5P66" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"ad\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/departments"
);

const headers = {
    "Authorization": "Bearer ca4dbEZk8a3DVe1fhgv5P66",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "ad"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v2-departments">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;name&quot;: &quot;Asdfasdf&quot;,
    &quot;updated_at&quot;: &quot;2021-12-01T19:05:29.000000Z&quot;,
    &quot;created_at&quot;: &quot;2021-12-01T19:05:29.000000Z&quot;,
    &quot;id&quot;: 12
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v2-departments" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v2-departments"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v2-departments"></code></pre>
</span>
<span id="execution-error-POSTapi-v2-departments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v2-departments"></code></pre>
</span>
<form id="form-POSTapi-v2-departments" data-method="POST"
      data-path="api/v2/departments"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer ca4dbEZk8a3DVe1fhgv5P66","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v2-departments', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v2-departments"
                    onclick="tryItOut('POSTapi-v2-departments');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v2-departments"
                    onclick="cancelTryOut('POSTapi-v2-departments');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v2-departments" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v2/departments</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-v2-departments" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-v2-departments"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-v2-departments"
               value="ad"
               data-component="body" hidden>
    <br>
<p>The name of the Department</p>
        </p>
        </form>

            <h2 id="endpoints-GETapi-v2-employees">Employees All</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of employees registered.</p>

<span id="example-requests-GETapi-v2-employees">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/v2/employees?site=illum&amp;project=delectus&amp;department=et&amp;position=sit" \
    --header "Authorization: Bearer Phak813bDcZE6favVd4ge65" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/employees"
);

const params = {
    "site": "illum",
    "project": "delectus",
    "department": "et",
    "position": "sit",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer Phak813bDcZE6favVd4ge65",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v2-employees">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 10006,
            &quot;first_name&quot;: &quot;August&quot;,
            &quot;second_first_name&quot;: &quot;Nicklaus&quot;,
            &quot;last_name&quot;: &quot;Schaefer&quot;,
            &quot;second_last_name&quot;: &quot;Wuckert&quot;,
            &quot;full_name&quot;: &quot;August Nicklaus Schaefer Wuckert&quot;,
            &quot;hire_date&quot;: &quot;1990-08-30&quot;,
            &quot;personal_id&quot;: &quot;40546748566&quot;,
            &quot;passport&quot;: null,
            &quot;date_of_birth&quot;: &quot;1996-10-15&quot;,
            &quot;cellphone_number&quot;: &quot;8095607690&quot;,
            &quot;secondary_phone&quot;: null,
            &quot;site&quot;: &quot;Prof. Quincy Lockman DVM&quot;,
            &quot;project&quot;: &quot;Gustave Homenick&quot;,
            &quot;position&quot;: &quot;Dr. Arlo Walter Dds&quot;,
            &quot;salary&quot;: 125,
            &quot;salary_type&quot;: &quot;Kaylah Ratke&quot;,
            &quot;pay_per_hours&quot;: 125,
            &quot;department&quot;: &quot;Malachi Feeney I&quot;,
            &quot;supervisor&quot;: &quot;Yismen Jorge&quot;,
            &quot;gender&quot;: &quot;Ms. Kamille Hagenes MD&quot;,
            &quot;marital&quot;: &quot;Miss Brenda Will&quot;,
            &quot;ars&quot;: &quot;Adan Friesen&quot;,
            &quot;afp&quot;: &quot;Devonte Goyette DDS&quot;,
            &quot;nationality&quot;: &quot;Guam_662326&quot;,
            &quot;has_kids&quot;: 0,
            &quot;photo&quot;: &quot;storage/images/employees/10006.png&quot;,
            &quot;active&quot;: true,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;punch&quot;: null,
            &quot;account_number&quot;: null,
            &quot;is_vip&quot;: true,
            &quot;is_universal&quot;: false,
            &quot;termination_date&quot;: null
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v2-employees" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v2-employees"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v2-employees"></code></pre>
</span>
<span id="execution-error-GETapi-v2-employees" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v2-employees"></code></pre>
</span>
<form id="form-GETapi-v2-employees" data-method="GET"
      data-path="api/v2/employees"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer Phak813bDcZE6favVd4ge65","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v2-employees', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v2-employees"
                    onclick="tryItOut('GETapi-v2-employees');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v2-employees"
                    onclick="cancelTryOut('GETapi-v2-employees');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v2-employees" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v2/employees</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v2-employees" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v2-employees"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-v2-employees"
               value="illum"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>project</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project"
               data-endpoint="GETapi-v2-employees"
               value="delectus"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project. Example ?project=%Pub%</p>
            </p>
                    <p>
                <b><code>department</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="department"
               data-endpoint="GETapi-v2-employees"
               value="et"
               data-component="query" hidden>
    <br>
<p>Limit results to specific department. Example ?department=%Product%</p>
            </p>
                    <p>
                <b><code>position</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="position"
               data-endpoint="GETapi-v2-employees"
               value="sit"
               data-component="query" hidden>
    <br>
<p>Limit results to specific position. Example ?position=%Agente%</p>
            </p>
                </form>

            <h2 id="endpoints-POSTapi-v2-banks">Store Banks</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Save a Banks model to database.</p>

<span id="example-requests-POSTapi-v2-banks">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "dainsys.test/api/v2/banks" \
    --header "Authorization: Bearer E84V3he65k6dfvDPgb1Zaca" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"amet\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/banks"
);

const headers = {
    "Authorization": "Bearer E84V3he65k6dfvDPgb1Zaca",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "amet"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v2-banks">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
     &quot;name&quot;: &quot;Asdfasdf&quot;,
 }</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v2-banks" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v2-banks"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v2-banks"></code></pre>
</span>
<span id="execution-error-POSTapi-v2-banks" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v2-banks"></code></pre>
</span>
<form id="form-POSTapi-v2-banks" data-method="POST"
      data-path="api/v2/banks"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer E84V3he65k6dfvDPgb1Zaca","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v2-banks', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v2-banks"
                    onclick="tryItOut('POSTapi-v2-banks');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v2-banks"
                    onclick="cancelTryOut('POSTapi-v2-banks');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v2-banks" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v2/banks</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-v2-banks" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-v2-banks"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-v2-banks"
               value="amet"
               data-component="body" hidden>
    <br>
<p>The name of the Banks</p>
        </p>
        </form>

            <h2 id="endpoints-POSTapi-v2-arss">Store Ars</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Save a Ars model to database.</p>

<span id="example-requests-POSTapi-v2-arss">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "dainsys.test/api/v2/arss" \
    --header "Authorization: Bearer Pka65eZ6cd3vfgEVbh4a1D8" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"dignissimos\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/arss"
);

const headers = {
    "Authorization": "Bearer Pka65eZ6cd3vfgEVbh4a1D8",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "dignissimos"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v2-arss">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;name&quot;: &quot;Asdfasdf&quot;,
    &quot;slug&quot;: &quot;asdfasdf&quot;,
    &quot;updated_at&quot;: &quot;2021-12-01T19:05:29.000000Z&quot;,
    &quot;created_at&quot;: &quot;2021-12-01T19:05:29.000000Z&quot;,
    &quot;id&quot;: 12
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v2-arss" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v2-arss"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v2-arss"></code></pre>
</span>
<span id="execution-error-POSTapi-v2-arss" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v2-arss"></code></pre>
</span>
<form id="form-POSTapi-v2-arss" data-method="POST"
      data-path="api/v2/arss"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer Pka65eZ6cd3vfgEVbh4a1D8","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v2-arss', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v2-arss"
                    onclick="tryItOut('POSTapi-v2-arss');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v2-arss"
                    onclick="cancelTryOut('POSTapi-v2-arss');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v2-arss" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v2/arss</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-v2-arss" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-v2-arss"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-v2-arss"
               value="dignissimos"
               data-component="body" hidden>
    <br>
<p>The name of the Ars</p>
        </p>
        </form>

            <h2 id="endpoints-POSTapi-v2-afps">Store Afps</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Save a Afp model to database.</p>

<span id="example-requests-POSTapi-v2-afps">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "dainsys.test/api/v2/afps" \
    --header "Authorization: Bearer DPfhcVd1egk4E66a3b85Zav" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"eius\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/afps"
);

const headers = {
    "Authorization": "Bearer DPfhcVd1egk4E66a3b85Zav",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "eius"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v2-afps">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;name&quot;: &quot;Asdfasdf&quot;,
    &quot;slug&quot;: &quot;asdfasdf&quot;,
    &quot;updated_at&quot;: &quot;2021-12-01T19:05:29.000000Z&quot;,
    &quot;created_at&quot;: &quot;2021-12-01T19:05:29.000000Z&quot;,
    &quot;id&quot;: 12
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v2-afps" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v2-afps"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v2-afps"></code></pre>
</span>
<span id="execution-error-POSTapi-v2-afps" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v2-afps"></code></pre>
</span>
<form id="form-POSTapi-v2-afps" data-method="POST"
      data-path="api/v2/afps"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer DPfhcVd1egk4E66a3b85Zav","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v2-afps', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v2-afps"
                    onclick="tryItOut('POSTapi-v2-afps');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v2-afps"
                    onclick="cancelTryOut('POSTapi-v2-afps');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v2-afps" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v2/afps</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-v2-afps" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-v2-afps"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-v2-afps"
               value="eius"
               data-component="body" hidden>
    <br>
<p>The name of the Afp</p>
        </p>
        </form>

            <h2 id="endpoints-POSTapi-v2-employees--employee--universal">Update Universal</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Update Universal information for a given employee.</p>

<span id="example-requests-POSTapi-v2-employees--employee--universal">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "dainsys.test/api/v2/employees/10/universal" \
    --header "Authorization: Bearer acV4fdkeD1avgE3hZb566P8" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"is_vip\": false
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/employees/10/universal"
);

const headers = {
    "Authorization": "Bearer acV4fdkeD1avgE3hZb566P8",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "is_vip": false
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v2-employees--employee--universal">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;id&quot;: 10006,
    &quot;first_name&quot;: &quot;August&quot;,
    &quot;second_first_name&quot;: &quot;Nicklaus&quot;,
    &quot;last_name&quot;: &quot;Schaefer&quot;,
    &quot;second_last_name&quot;: &quot;Wuckert&quot;,
    &quot;full_name&quot;: &quot;August Nicklaus Schaefer Wuckert&quot;,
    &quot;hire_date&quot;: &quot;1990-08-30&quot;,
    &quot;personal_id&quot;: &quot;40546748566&quot;,
    &quot;passport&quot;: null,
    &quot;date_of_birth&quot;: &quot;1996-10-15&quot;,
    &quot;cellphone_number&quot;: &quot;8095607690&quot;,
    &quot;secondary_phone&quot;: null,
    &quot;site&quot;: &quot;Prof. Quincy Lockman DVM&quot;,
    &quot;project&quot;: &quot;Gustave Homenick&quot;,
    &quot;position&quot;: &quot;Dr. Arlo Walter Dds&quot;,
    &quot;salary&quot;: 125,
    &quot;salary_type&quot;: &quot;Kaylah Ratke&quot;,
    &quot;pay_per_hours&quot;: 125,
    &quot;department&quot;: &quot;Malachi Feeney I&quot;,
    &quot;supervisor&quot;: &quot;Yismen Jorge&quot;,
    &quot;gender&quot;: &quot;Ms. Kamille Hagenes MD&quot;,
    &quot;marital&quot;: &quot;Miss Brenda Will&quot;,
    &quot;ars&quot;: &quot;Adan Friesen&quot;,
    &quot;afp&quot;: &quot;Devonte Goyette DDS&quot;,
    &quot;nationality&quot;: &quot;Guam_662326&quot;,
    &quot;has_kids&quot;: 0,
    &quot;photo&quot;: &quot;storage/images/employees/10006.png&quot;,
    &quot;active&quot;: true,
    &quot;status&quot;: &quot;Active&quot;,
    &quot;punch&quot;: null,
    &quot;account_number&quot;: null,
    &quot;is_vip&quot;: true,
    &quot;is_universal&quot;: false,
    &quot;termination_date&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v2-employees--employee--universal" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v2-employees--employee--universal"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v2-employees--employee--universal"></code></pre>
</span>
<span id="execution-error-POSTapi-v2-employees--employee--universal" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v2-employees--employee--universal"></code></pre>
</span>
<form id="form-POSTapi-v2-employees--employee--universal" data-method="POST"
      data-path="api/v2/employees/{employee}/universal"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer acV4fdkeD1avgE3hZb566P8","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v2-employees--employee--universal', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v2-employees--employee--universal"
                    onclick="tryItOut('POSTapi-v2-employees--employee--universal');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v2-employees--employee--universal"
                    onclick="cancelTryOut('POSTapi-v2-employees--employee--universal');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v2-employees--employee--universal" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v2/employees/{employee}/universal</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-v2-employees--employee--universal" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-v2-employees--employee--universal"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>employee</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="employee"
               data-endpoint="POSTapi-v2-employees--employee--universal"
               value="10"
               data-component="url" hidden>
    <br>

            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>is_vip</code></b>&nbsp;&nbsp;<small>boolean</small>  &nbsp;
                <label data-endpoint="POSTapi-v2-employees--employee--universal" hidden>
            <input type="radio" name="is_vip"
                   value="true"
                   data-endpoint="POSTapi-v2-employees--employee--universal"
                   data-component="body"
            >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-v2-employees--employee--universal" hidden>
            <input type="radio" name="is_vip"
                   value="false"
                   data-endpoint="POSTapi-v2-employees--employee--universal"
                   data-component="body"
            >
            <code>false</code>
        </label>
    <br>
<p>Indicates if the employee should be added to or removed from the Universal list</p>
        </p>
        </form>

            <h2 id="endpoints-GETapi-v2-employees-recents">Employees Recents</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of recent employees. Recents are all active imployees plus any inactive employee with a termination date greater than 30 days ago.</p>

<span id="example-requests-GETapi-v2-employees-recents">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/v2/employees/recents?site=molestiae&amp;project=et&amp;department=voluptatem&amp;position=aspernatur" \
    --header "Authorization: Bearer 3VdcDvb6E1Za65agh4Pk8ef" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/employees/recents"
);

const params = {
    "site": "molestiae",
    "project": "et",
    "department": "voluptatem",
    "position": "aspernatur",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer 3VdcDvb6E1Za65agh4Pk8ef",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v2-employees-recents">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 10006,
            &quot;first_name&quot;: &quot;August&quot;,
            &quot;second_first_name&quot;: &quot;Nicklaus&quot;,
            &quot;last_name&quot;: &quot;Schaefer&quot;,
            &quot;second_last_name&quot;: &quot;Wuckert&quot;,
            &quot;full_name&quot;: &quot;August Nicklaus Schaefer Wuckert&quot;,
            &quot;hire_date&quot;: &quot;1990-08-30&quot;,
            &quot;personal_id&quot;: &quot;40546748566&quot;,
            &quot;passport&quot;: null,
            &quot;date_of_birth&quot;: &quot;1996-10-15&quot;,
            &quot;cellphone_number&quot;: &quot;8095607690&quot;,
            &quot;secondary_phone&quot;: null,
            &quot;site&quot;: &quot;Prof. Quincy Lockman DVM&quot;,
            &quot;project&quot;: &quot;Gustave Homenick&quot;,
            &quot;position&quot;: &quot;Dr. Arlo Walter Dds&quot;,
            &quot;salary&quot;: 125,
            &quot;salary_type&quot;: &quot;Kaylah Ratke&quot;,
            &quot;pay_per_hours&quot;: 125,
            &quot;department&quot;: &quot;Malachi Feeney I&quot;,
            &quot;supervisor&quot;: &quot;Yismen Jorge&quot;,
            &quot;gender&quot;: &quot;Ms. Kamille Hagenes MD&quot;,
            &quot;marital&quot;: &quot;Miss Brenda Will&quot;,
            &quot;ars&quot;: &quot;Adan Friesen&quot;,
            &quot;afp&quot;: &quot;Devonte Goyette DDS&quot;,
            &quot;nationality&quot;: &quot;Guam_662326&quot;,
            &quot;has_kids&quot;: 0,
            &quot;photo&quot;: &quot;storage/images/employees/10006.png&quot;,
            &quot;active&quot;: true,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;punch&quot;: null,
            &quot;account_number&quot;: null,
            &quot;is_vip&quot;: true,
            &quot;is_universal&quot;: false,
            &quot;termination_date&quot;: null
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v2-employees-recents" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v2-employees-recents"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v2-employees-recents"></code></pre>
</span>
<span id="execution-error-GETapi-v2-employees-recents" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v2-employees-recents"></code></pre>
</span>
<form id="form-GETapi-v2-employees-recents" data-method="GET"
      data-path="api/v2/employees/recents"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer 3VdcDvb6E1Za65agh4Pk8ef","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v2-employees-recents', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v2-employees-recents"
                    onclick="tryItOut('GETapi-v2-employees-recents');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v2-employees-recents"
                    onclick="cancelTryOut('GETapi-v2-employees-recents');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v2-employees-recents" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v2/employees/recents</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v2-employees-recents" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v2-employees-recents"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-v2-employees-recents"
               value="molestiae"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>project</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project"
               data-endpoint="GETapi-v2-employees-recents"
               value="et"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project. Example ?project=%Pub%</p>
            </p>
                    <p>
                <b><code>department</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="department"
               data-endpoint="GETapi-v2-employees-recents"
               value="voluptatem"
               data-component="query" hidden>
    <br>
<p>Limit results to specific department. Example ?department=%Product%</p>
            </p>
                    <p>
                <b><code>position</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="position"
               data-endpoint="GETapi-v2-employees-recents"
               value="aspernatur"
               data-component="query" hidden>
    <br>
<p>Limit results to specific position. Example ?position=%Agente%</p>
            </p>
                </form>

            <h2 id="endpoints-GETapi-v2-employees-all">Employees All</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of employees registered.</p>

<span id="example-requests-GETapi-v2-employees-all">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/v2/employees/all?site=non&amp;project=facilis&amp;department=quia&amp;position=blanditiis" \
    --header "Authorization: Bearer aDv1g5dE4k6Pf6e8V3Zchba" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/employees/all"
);

const params = {
    "site": "non",
    "project": "facilis",
    "department": "quia",
    "position": "blanditiis",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer aDv1g5dE4k6Pf6e8V3Zchba",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v2-employees-all">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 10006,
            &quot;first_name&quot;: &quot;August&quot;,
            &quot;second_first_name&quot;: &quot;Nicklaus&quot;,
            &quot;last_name&quot;: &quot;Schaefer&quot;,
            &quot;second_last_name&quot;: &quot;Wuckert&quot;,
            &quot;full_name&quot;: &quot;August Nicklaus Schaefer Wuckert&quot;,
            &quot;hire_date&quot;: &quot;1990-08-30&quot;,
            &quot;personal_id&quot;: &quot;40546748566&quot;,
            &quot;passport&quot;: null,
            &quot;date_of_birth&quot;: &quot;1996-10-15&quot;,
            &quot;cellphone_number&quot;: &quot;8095607690&quot;,
            &quot;secondary_phone&quot;: null,
            &quot;site&quot;: &quot;Prof. Quincy Lockman DVM&quot;,
            &quot;project&quot;: &quot;Gustave Homenick&quot;,
            &quot;position&quot;: &quot;Dr. Arlo Walter Dds&quot;,
            &quot;salary&quot;: 125,
            &quot;salary_type&quot;: &quot;Kaylah Ratke&quot;,
            &quot;pay_per_hours&quot;: 125,
            &quot;department&quot;: &quot;Malachi Feeney I&quot;,
            &quot;supervisor&quot;: &quot;Yismen Jorge&quot;,
            &quot;gender&quot;: &quot;Ms. Kamille Hagenes MD&quot;,
            &quot;marital&quot;: &quot;Miss Brenda Will&quot;,
            &quot;ars&quot;: &quot;Adan Friesen&quot;,
            &quot;afp&quot;: &quot;Devonte Goyette DDS&quot;,
            &quot;nationality&quot;: &quot;Guam_662326&quot;,
            &quot;has_kids&quot;: 0,
            &quot;photo&quot;: &quot;storage/images/employees/10006.png&quot;,
            &quot;active&quot;: true,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;punch&quot;: null,
            &quot;account_number&quot;: null,
            &quot;is_vip&quot;: true,
            &quot;is_universal&quot;: false,
            &quot;termination_date&quot;: null
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v2-employees-all" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v2-employees-all"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v2-employees-all"></code></pre>
</span>
<span id="execution-error-GETapi-v2-employees-all" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v2-employees-all"></code></pre>
</span>
<form id="form-GETapi-v2-employees-all" data-method="GET"
      data-path="api/v2/employees/all"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer aDv1g5dE4k6Pf6e8V3Zchba","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v2-employees-all', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v2-employees-all"
                    onclick="tryItOut('GETapi-v2-employees-all');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v2-employees-all"
                    onclick="cancelTryOut('GETapi-v2-employees-all');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v2-employees-all" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v2/employees/all</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v2-employees-all" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v2-employees-all"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-v2-employees-all"
               value="non"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>project</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project"
               data-endpoint="GETapi-v2-employees-all"
               value="facilis"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project. Example ?project=%Pub%</p>
            </p>
                    <p>
                <b><code>department</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="department"
               data-endpoint="GETapi-v2-employees-all"
               value="quia"
               data-component="query" hidden>
    <br>
<p>Limit results to specific department. Example ?department=%Product%</p>
            </p>
                    <p>
                <b><code>position</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="position"
               data-endpoint="GETapi-v2-employees-all"
               value="blanditiis"
               data-component="query" hidden>
    <br>
<p>Limit results to specific position. Example ?position=%Agente%</p>
            </p>
                </form>

            <h2 id="endpoints-GETapi-v2-employees-actives">Employees Actives</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of employees actives. This is any employee without a termination.</p>

<span id="example-requests-GETapi-v2-employees-actives">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/v2/employees/actives?site=quia&amp;project=hic&amp;department=ex&amp;position=sapiente" \
    --header "Authorization: Bearer 3abc4feD81gPvd65kha6EVZ" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/employees/actives"
);

const params = {
    "site": "quia",
    "project": "hic",
    "department": "ex",
    "position": "sapiente",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer 3abc4feD81gPvd65kha6EVZ",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v2-employees-actives">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 10006,
            &quot;first_name&quot;: &quot;August&quot;,
            &quot;second_first_name&quot;: &quot;Nicklaus&quot;,
            &quot;last_name&quot;: &quot;Schaefer&quot;,
            &quot;second_last_name&quot;: &quot;Wuckert&quot;,
            &quot;full_name&quot;: &quot;August Nicklaus Schaefer Wuckert&quot;,
            &quot;hire_date&quot;: &quot;1990-08-30&quot;,
            &quot;personal_id&quot;: &quot;40546748566&quot;,
            &quot;passport&quot;: null,
            &quot;date_of_birth&quot;: &quot;1996-10-15&quot;,
            &quot;cellphone_number&quot;: &quot;8095607690&quot;,
            &quot;secondary_phone&quot;: null,
            &quot;site&quot;: &quot;Prof. Quincy Lockman DVM&quot;,
            &quot;project&quot;: &quot;Gustave Homenick&quot;,
            &quot;position&quot;: &quot;Dr. Arlo Walter Dds&quot;,
            &quot;salary&quot;: 125,
            &quot;salary_type&quot;: &quot;Kaylah Ratke&quot;,
            &quot;pay_per_hours&quot;: 125,
            &quot;department&quot;: &quot;Malachi Feeney I&quot;,
            &quot;supervisor&quot;: &quot;Yismen Jorge&quot;,
            &quot;gender&quot;: &quot;Ms. Kamille Hagenes MD&quot;,
            &quot;marital&quot;: &quot;Miss Brenda Will&quot;,
            &quot;ars&quot;: &quot;Adan Friesen&quot;,
            &quot;afp&quot;: &quot;Devonte Goyette DDS&quot;,
            &quot;nationality&quot;: &quot;Guam_662326&quot;,
            &quot;has_kids&quot;: 0,
            &quot;photo&quot;: &quot;storage/images/employees/10006.png&quot;,
            &quot;active&quot;: true,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;punch&quot;: null,
            &quot;account_number&quot;: null,
            &quot;is_vip&quot;: true,
            &quot;is_universal&quot;: false,
            &quot;termination_date&quot;: null
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v2-employees-actives" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v2-employees-actives"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v2-employees-actives"></code></pre>
</span>
<span id="execution-error-GETapi-v2-employees-actives" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v2-employees-actives"></code></pre>
</span>
<form id="form-GETapi-v2-employees-actives" data-method="GET"
      data-path="api/v2/employees/actives"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer 3abc4feD81gPvd65kha6EVZ","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v2-employees-actives', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v2-employees-actives"
                    onclick="tryItOut('GETapi-v2-employees-actives');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v2-employees-actives"
                    onclick="cancelTryOut('GETapi-v2-employees-actives');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v2-employees-actives" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v2/employees/actives</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v2-employees-actives" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v2-employees-actives"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-v2-employees-actives"
               value="quia"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>project</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project"
               data-endpoint="GETapi-v2-employees-actives"
               value="hic"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project. Example ?project=%Pub%</p>
            </p>
                    <p>
                <b><code>department</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="department"
               data-endpoint="GETapi-v2-employees-actives"
               value="ex"
               data-component="query" hidden>
    <br>
<p>Limit results to specific department. Example ?department=%Product%</p>
            </p>
                    <p>
                <b><code>position</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="position"
               data-endpoint="GETapi-v2-employees-actives"
               value="sapiente"
               data-component="query" hidden>
    <br>
<p>Limit results to specific position. Example ?position=%Agente%</p>
            </p>
                </form>

            <h2 id="endpoints-GETapi-v2-notifications-show--notification-">Notification Details</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Show details for a user notification. This will also mark the given notification as read.</p>

<span id="example-requests-GETapi-v2-notifications-show--notification-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/v2/notifications/show/repellendus" \
    --header "Authorization: Bearer 84hk6ZV1f6gdD3e5vcPEbaa" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/notifications/show/repellendus"
);

const headers = {
    "Authorization": "Bearer 84hk6ZV1f6gdD3e5vcPEbaa",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v2-notifications-show--notification-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;id&quot;: &quot;d8e62834-828a-482d-a279-bb113fcaaa53&quot;,
    &quot;type&quot;: &quot;App\\Notifications\\UserCreatedNotification&quot;,
    &quot;notifiable_type&quot;: &quot;App\\User&quot;,
    &quot;notifiable_id&quot;: 1,
    &quot;data&quot;: &quot;[]&quot;,
    &quot;read_at&quot;: &quot;2021-12-01T22:29:34.797992Z&quot;,
    &quot;created_at&quot;: &quot;2021-11-24T14:33:44.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2021-12-01T22:29:34.000000Z&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v2-notifications-show--notification-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v2-notifications-show--notification-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v2-notifications-show--notification-"></code></pre>
</span>
<span id="execution-error-GETapi-v2-notifications-show--notification-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v2-notifications-show--notification-"></code></pre>
</span>
<form id="form-GETapi-v2-notifications-show--notification-" data-method="GET"
      data-path="api/v2/notifications/show/{notification}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer 84hk6ZV1f6gdD3e5vcPEbaa","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v2-notifications-show--notification-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v2-notifications-show--notification-"
                    onclick="tryItOut('GETapi-v2-notifications-show--notification-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v2-notifications-show--notification-"
                    onclick="cancelTryOut('GETapi-v2-notifications-show--notification-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v2-notifications-show--notification-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v2/notifications/show/{notification}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v2-notifications-show--notification-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v2-notifications-show--notification-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>notification</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="notification"
               data-endpoint="GETapi-v2-notifications-show--notification-"
               value="repellendus"
               data-component="url" hidden>
    <br>
<p>Uuid of the stored notification</p>
            </p>
                    </form>

        <h1 id="performances">Performances</h1>

    

            <h2 id="performances-GETapi-performances-clients">Performances Clients</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of clients information</p>

<span id="example-requests-GETapi-performances-clients">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/performances/clients" \
    --header "Authorization: Bearer 5cv8Ea6D4bhPef63gVaZd1k" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/performances/clients"
);

const headers = {
    "Authorization": "Bearer 5cv8Ea6D4bhPef63gVaZd1k",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-performances-clients">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Miss Ericka Medhurst&quot;,
            &quot;contact_name&quot;: &quot;Roel Harvey&quot;,
            &quot;main_phone&quot;: &quot;(954) 631-9605&quot;,
            &quot;email&quot;: &quot;toy.raquel@hotmail.com&quot;,
            &quot;secondary_phone&quot;: &quot;+14408935480&quot;,
            &quot;account_number&quot;: &quot;929-384-1946&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-performances-clients" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-performances-clients"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-performances-clients"></code></pre>
</span>
<span id="execution-error-GETapi-performances-clients" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-performances-clients"></code></pre>
</span>
<form id="form-GETapi-performances-clients" data-method="GET"
      data-path="api/performances/clients"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer 5cv8Ea6D4bhPef63gVaZd1k","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-performances-clients', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-performances-clients"
                    onclick="tryItOut('GETapi-performances-clients');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-performances-clients"
                    onclick="cancelTryOut('GETapi-performances-clients');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-performances-clients" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/performances/clients</code></b>
        </p>
                <p>
            <label id="auth-GETapi-performances-clients" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-performances-clients"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="performances-GETapi-performances-projects">Performances Projects</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of performances data for many months back.</p>

<span id="example-requests-GETapi-performances-projects">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/performances/projects" \
    --header "Authorization: Bearer Vf8aakZ6Pg1db64Eehv3c5D" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/performances/projects"
);

const headers = {
    "Authorization": "Bearer Vf8aakZ6Pg1db64Eehv3c5D",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-performances-projects">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Administracion&quot;,
            &quot;client&quot;: null
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-performances-projects" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-performances-projects"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-performances-projects"></code></pre>
</span>
<span id="execution-error-GETapi-performances-projects" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-performances-projects"></code></pre>
</span>
<form id="form-GETapi-performances-projects" data-method="GET"
      data-path="api/performances/projects"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer Vf8aakZ6Pg1db64Eehv3c5D","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-performances-projects', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-performances-projects"
                    onclick="tryItOut('GETapi-performances-projects');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-performances-projects"
                    onclick="cancelTryOut('GETapi-performances-projects');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-performances-projects" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/performances/projects</code></b>
        </p>
                <p>
            <label id="auth-GETapi-performances-projects" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-performances-projects"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="performances-GETapi-performances-campaigns">Performances Campaigns</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of camaigns information</p>

<span id="example-requests-GETapi-performances-campaigns">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/performances/campaigns" \
    --header "Authorization: Bearer 6Pg5hkD4ab1dfZa3ecV6Ev8" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/performances/campaigns"
);

const headers = {
    "Authorization": "Bearer 6Pg5hkD4ab1dfZa3ecV6Ev8",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-performances-campaigns">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;asdfasfas-downtimes&quot;,
            &quot;project_id&quot;: 1,
            &quot;source_id&quot;: 5,
            &quot;revenue_type_id&quot;: 1,
            &quot;sph_goal&quot;: 24,
            &quot;rate&quot;: 40
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-performances-campaigns" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-performances-campaigns"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-performances-campaigns"></code></pre>
</span>
<span id="execution-error-GETapi-performances-campaigns" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-performances-campaigns"></code></pre>
</span>
<form id="form-GETapi-performances-campaigns" data-method="GET"
      data-path="api/performances/campaigns"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer 6Pg5hkD4ab1dfZa3ecV6Ev8","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-performances-campaigns', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-performances-campaigns"
                    onclick="tryItOut('GETapi-performances-campaigns');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-performances-campaigns"
                    onclick="cancelTryOut('GETapi-performances-campaigns');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-performances-campaigns" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/performances/campaigns</code></b>
        </p>
                <p>
            <label id="auth-GETapi-performances-campaigns" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-performances-campaigns"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="performances-GETapi-performances-sites">Performances Sites</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of employees' sites.</p>

<span id="example-requests-GETapi-performances-sites">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/performances/sites" \
    --header "Authorization: Bearer agZ3VvDhf86eac61kbPd5E4" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/performances/sites"
);

const headers = {
    "Authorization": "Bearer agZ3VvDhf86eac61kbPd5E4",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-performances-sites">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
     &quot;data&quot;: [
         {
             &quot;id&quot;: 1,
             &quot;name&quot;: &quot;Yismen Jorge&quot;,
         }
     ]
 }</code>
 </pre>
    </span>
<span id="execution-results-GETapi-performances-sites" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-performances-sites"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-performances-sites"></code></pre>
</span>
<span id="execution-error-GETapi-performances-sites" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-performances-sites"></code></pre>
</span>
<form id="form-GETapi-performances-sites" data-method="GET"
      data-path="api/performances/sites"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer agZ3VvDhf86eac61kbPd5E4","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-performances-sites', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-performances-sites"
                    onclick="tryItOut('GETapi-performances-sites');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-performances-sites"
                    onclick="cancelTryOut('GETapi-performances-sites');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-performances-sites" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/performances/sites</code></b>
        </p>
                <p>
            <label id="auth-GETapi-performances-sites" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-performances-sites"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="performances-GETapi-performances-supervisors">Performances Supervisors</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of employees' supervisors.</p>

<span id="example-requests-GETapi-performances-supervisors">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/performances/supervisors" \
    --header "Authorization: Bearer 4VePD8bgEacdafk3656Z1hv" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/performances/supervisors"
);

const headers = {
    "Authorization": "Bearer 4VePD8bgEacdafk3656Z1hv",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-performances-supervisors">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
     &quot;data&quot;: [
         {
             &quot;id&quot;: 1,
             &quot;name&quot;: &quot;Yismen Jorge&quot;,
             &quot;active&quot;: 1,
         }
     ]
 }</code>
 </pre>
    </span>
<span id="execution-results-GETapi-performances-supervisors" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-performances-supervisors"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-performances-supervisors"></code></pre>
</span>
<span id="execution-error-GETapi-performances-supervisors" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-performances-supervisors"></code></pre>
</span>
<form id="form-GETapi-performances-supervisors" data-method="GET"
      data-path="api/performances/supervisors"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer 4VePD8bgEacdafk3656Z1hv","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-performances-supervisors', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-performances-supervisors"
                    onclick="tryItOut('GETapi-performances-supervisors');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-performances-supervisors"
                    onclick="cancelTryOut('GETapi-performances-supervisors');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-performances-supervisors" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/performances/supervisors</code></b>
        </p>
                <p>
            <label id="auth-GETapi-performances-supervisors" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-performances-supervisors"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="performances-GETapi-performances-downtime_reasons">Performances Downtime Reasons</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of downtime reasons</p>

<span id="example-requests-GETapi-performances-downtime_reasons">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/performances/downtime_reasons" \
    --header "Authorization: Bearer g8hP5dcbf6EeZa6kva4V13D" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/performances/downtime_reasons"
);

const headers = {
    "Authorization": "Bearer g8hP5dcbf6EeZa6kva4V13D",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-performances-downtime_reasons">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Falta De Trabajo&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-performances-downtime_reasons" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-performances-downtime_reasons"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-performances-downtime_reasons"></code></pre>
</span>
<span id="execution-error-GETapi-performances-downtime_reasons" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-performances-downtime_reasons"></code></pre>
</span>
<form id="form-GETapi-performances-downtime_reasons" data-method="GET"
      data-path="api/performances/downtime_reasons"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer g8hP5dcbf6EeZa6kva4V13D","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-performances-downtime_reasons', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-performances-downtime_reasons"
                    onclick="tryItOut('GETapi-performances-downtime_reasons');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-performances-downtime_reasons"
                    onclick="cancelTryOut('GETapi-performances-downtime_reasons');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-performances-downtime_reasons" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/performances/downtime_reasons</code></b>
        </p>
                <p>
            <label id="auth-GETapi-performances-downtime_reasons" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-performances-downtime_reasons"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="performances-GETapi-performances-employees">Performances Employees</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of employees formated for downtimes</p>

<span id="example-requests-GETapi-performances-employees">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/performances/employees?site=perferendis&amp;project=aut&amp;department=cupiditate&amp;position=consectetur" \
    --header "Authorization: Bearer PDvVgadh364f1abcZ58e6kE" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/performances/employees"
);

const params = {
    "site": "perferendis",
    "project": "aut",
    "department": "cupiditate",
    "position": "consectetur",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer PDvVgadh364f1abcZ58e6kE",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-performances-employees">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 10011,
            &quot;full_name&quot;: &quot;Charley Gregory Considine Balistreri&quot;,
            &quot;supervisor_id&quot;: 12,
            &quot;site_id&quot;: 13,
            &quot;punch&quot;: &quot;00005&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-performances-employees" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-performances-employees"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-performances-employees"></code></pre>
</span>
<span id="execution-error-GETapi-performances-employees" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-performances-employees"></code></pre>
</span>
<form id="form-GETapi-performances-employees" data-method="GET"
      data-path="api/performances/employees"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer PDvVgadh364f1abcZ58e6kE","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-performances-employees', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-performances-employees"
                    onclick="tryItOut('GETapi-performances-employees');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-performances-employees"
                    onclick="cancelTryOut('GETapi-performances-employees');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-performances-employees" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/performances/employees</code></b>
        </p>
                <p>
            <label id="auth-GETapi-performances-employees" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-performances-employees"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-performances-employees"
               value="perferendis"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>project</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project"
               data-endpoint="GETapi-performances-employees"
               value="aut"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project. Example ?project=%Santiago%</p>
            </p>
                    <p>
                <b><code>department</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="department"
               data-endpoint="GETapi-performances-employees"
               value="cupiditate"
               data-component="query" hidden>
    <br>
<p>Limit results to specific department. Example ?department=%Santiago%</p>
            </p>
                    <p>
                <b><code>position</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="position"
               data-endpoint="GETapi-performances-employees"
               value="consectetur"
               data-component="query" hidden>
    <br>
<p>Limit results to specific position. Example ?position=%Santiago%</p>
            </p>
                </form>

            <h2 id="performances-GETapi-performances-downtimes">Performances Downtimes</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of dowtimes</p>

<span id="example-requests-GETapi-performances-downtimes">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/performances/downtimes?campaign=porro&amp;source=et&amp;employee=porro&amp;supervisor=occaecati&amp;supervisor_employee=eveniet&amp;project_campaign=molestiae&amp;project_employee=et&amp;site=eveniet&amp;client=dolorem" \
    --header "Authorization: Bearer a6ghfdV83baD4P15ZEc6vke" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/performances/downtimes"
);

const params = {
    "campaign": "porro",
    "source": "et",
    "employee": "porro",
    "supervisor": "occaecati",
    "supervisor_employee": "eveniet",
    "project_campaign": "molestiae",
    "project_employee": "et",
    "site": "eveniet",
    "client": "dolorem",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer a6ghfdV83baD4P15ZEc6vke",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-performances-downtimes">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
     &quot;data&quot;: [
         {
              &quot;unique_id&quot;: &quot;unique-id-1-dsf-3&quot;,
              &quot;date&quot;: &quot;2021-05-17&quot;,
              &quot;employee_id&quot;: 50001,
              &quot;campaign&quot;: &quot;Some Campaign&quot;,
              &quot;project_performance&quot;: &quot;Some Project&quot;,
              &quot;employee_name&quot;: &quot;Some Employee&quot;,
              &quot;login_time&quot;: 8.21,
              &quot;downtime_reason&quot;: &quot;falta de Trabajo&quot;,
              &quot;reported_by&quot;: &quot;Yismen Jorge&quot;,
         }
     ]
 }</code>
 </pre>
    </span>
<span id="execution-results-GETapi-performances-downtimes" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-performances-downtimes"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-performances-downtimes"></code></pre>
</span>
<span id="execution-error-GETapi-performances-downtimes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-performances-downtimes"></code></pre>
</span>
<form id="form-GETapi-performances-downtimes" data-method="GET"
      data-path="api/performances/downtimes"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer a6ghfdV83baD4P15ZEc6vke","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-performances-downtimes', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-performances-downtimes"
                    onclick="tryItOut('GETapi-performances-downtimes');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-performances-downtimes"
                    onclick="cancelTryOut('GETapi-performances-downtimes');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-performances-downtimes" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/performances/downtimes</code></b>
        </p>
                <p>
            <label id="auth-GETapi-performances-downtimes" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-performances-downtimes"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>campaign</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="campaign"
               data-endpoint="GETapi-performances-downtimes"
               value="porro"
               data-component="query" hidden>
    <br>
<p>Limit results to specific campaign. Example ?campaign=%Santiago%</p>
            </p>
                    <p>
                <b><code>source</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="source"
               data-endpoint="GETapi-performances-downtimes"
               value="et"
               data-component="query" hidden>
    <br>
<p>Limit results to specific source. Example ?source=%Santiago%</p>
            </p>
                    <p>
                <b><code>employee</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="employee"
               data-endpoint="GETapi-performances-downtimes"
               value="porro"
               data-component="query" hidden>
    <br>
<p>Limit results to specific employee. Example ?employee=%Santiago%</p>
            </p>
                    <p>
                <b><code>supervisor</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="supervisor"
               data-endpoint="GETapi-performances-downtimes"
               value="occaecati"
               data-component="query" hidden>
    <br>
<p>Limit results to specific supervisor. Example ?supervisor=%Santiago%</p>
            </p>
                    <p>
                <b><code>supervisor_employee</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="supervisor_employee"
               data-endpoint="GETapi-performances-downtimes"
               value="eveniet"
               data-component="query" hidden>
    <br>
<p>Limit results to specific supervisor_employee. Example ?supervisor_employee=%Santiago%</p>
            </p>
                    <p>
                <b><code>project_campaign</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project_campaign"
               data-endpoint="GETapi-performances-downtimes"
               value="molestiae"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project_campaign. Example ?project_campaign=%Santiago%</p>
            </p>
                    <p>
                <b><code>project_employee</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project_employee"
               data-endpoint="GETapi-performances-downtimes"
               value="et"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project_employee. Example ?project_employee=%Santiago%</p>
            </p>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-performances-downtimes"
               value="eveniet"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>client</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="client"
               data-endpoint="GETapi-performances-downtimes"
               value="dolorem"
               data-component="query" hidden>
    <br>
<p>Limit results to specific client. Example ?client=%Pub%</p>
            </p>
                </form>

            <h2 id="performances-GETapi-performances-login_names">Performances Login Names</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Return a collection of login names.</p>

<span id="example-requests-GETapi-performances-login_names">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/performances/login_names?recents=exercitationem" \
    --header "Authorization: Bearer eZbhPc8Edg56a46v1VkD3af" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/performances/login_names"
);

const params = {
    "recents": "exercitationem",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer eZbhPc8Edg56a46v1VkD3af",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-performances-login_names">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
 &quot;employee_id&quot;: 10001,
 &quot;employee_name&quot;: Yismen Jorge,
 &quot;login&quot;: yjorge,
 &quot;supervisor_id&quot;: 1
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-performances-login_names" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-performances-login_names"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-performances-login_names"></code></pre>
</span>
<span id="execution-error-GETapi-performances-login_names" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-performances-login_names"></code></pre>
</span>
<form id="form-GETapi-performances-login_names" data-method="GET"
      data-path="api/performances/login_names"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer eZbhPc8Edg56a46v1VkD3af","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-performances-login_names', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-performances-login_names"
                    onclick="tryItOut('GETapi-performances-login_names');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-performances-login_names"
                    onclick="cancelTryOut('GETapi-performances-login_names');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-performances-login_names" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/performances/login_names</code></b>
        </p>
                <p>
            <label id="auth-GETapi-performances-login_names" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-performances-login_names"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>recents</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="recents"
               data-endpoint="GETapi-performances-login_names"
               value="exercitationem"
               data-component="query" hidden>
    <br>
<p>optional When present, only login names for employees labeled as recents will be included. Default is true. Example ?recents=true</p>
            </p>
                </form>

            <h2 id="performances-GETapi-performances-schedules">Performances Schedules</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of employees' schedules, filtered by many days ago.</p>

<span id="example-requests-GETapi-performances-schedules">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/performances/schedules?daysago=7" \
    --header "Authorization: Bearer E1bfcek66V3gZ584avDPadh" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/performances/schedules"
);

const params = {
    "daysago": "7",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer E1bfcek66V3gZ584avDPadh",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-performances-schedules">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
     &quot;data&quot;: [
         {
             &quot;employee_id&quot;: 50001,
             &quot;employee_name&quot;: &quot;Yismen Jorge&quot;,
             &quot;supervisor&quot;: &quot;Supervisor Name&quot;,
             &quot;date&quot;: &quot;2021-05-19&quot;,
             &quot;hours&quot;: 5.75,
         }
     ]
 }</code>
 </pre>
    </span>
<span id="execution-results-GETapi-performances-schedules" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-performances-schedules"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-performances-schedules"></code></pre>
</span>
<span id="execution-error-GETapi-performances-schedules" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-performances-schedules"></code></pre>
</span>
<form id="form-GETapi-performances-schedules" data-method="GET"
      data-path="api/performances/schedules"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer E1bfcek66V3gZ584avDPadh","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-performances-schedules', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-performances-schedules"
                    onclick="tryItOut('GETapi-performances-schedules');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-performances-schedules"
                    onclick="cancelTryOut('GETapi-performances-schedules');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-performances-schedules" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/performances/schedules</code></b>
        </p>
                <p>
            <label id="auth-GETapi-performances-schedules" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-performances-schedules"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>daysago</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="daysago"
               data-endpoint="GETapi-performances-schedules"
               value="7"
               data-component="query" hidden>
    <br>
<p>The amount of days to filter back. Default 90. Example daysago=45</p>
            </p>
                </form>

            <h2 id="performances-GETapi-performances-supervisors-actives">Performances Active Supervisors</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of employees' Actives supervisors.</p>

<span id="example-requests-GETapi-performances-supervisors-actives">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/performances/supervisors/actives" \
    --header "Authorization: Bearer ak6EdaV13c6DhbfPZ45ev8g" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/performances/supervisors/actives"
);

const headers = {
    "Authorization": "Bearer ak6EdaV13c6DhbfPZ45ev8g",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-performances-supervisors-actives">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
     &quot;data&quot;: [
         {
             &quot;id&quot;: 1,
             &quot;name&quot;: &quot;Yismen Jorge&quot;,
             &quot;active&quot;: 1,
         }
     ]
 }</code>
 </pre>
    </span>
<span id="execution-results-GETapi-performances-supervisors-actives" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-performances-supervisors-actives"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-performances-supervisors-actives"></code></pre>
</span>
<span id="execution-error-GETapi-performances-supervisors-actives" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-performances-supervisors-actives"></code></pre>
</span>
<form id="form-GETapi-performances-supervisors-actives" data-method="GET"
      data-path="api/performances/supervisors/actives"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer ak6EdaV13c6DhbfPZ45ev8g","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-performances-supervisors-actives', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-performances-supervisors-actives"
                    onclick="tryItOut('GETapi-performances-supervisors-actives');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-performances-supervisors-actives"
                    onclick="cancelTryOut('GETapi-performances-supervisors-actives');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-performances-supervisors-actives" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/performances/supervisors/actives</code></b>
        </p>
                <p>
            <label id="auth-GETapi-performances-supervisors-actives" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-performances-supervisors-actives"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="performances-GETapi-performances-performance_data-last--many--months">Performances Data</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of performances data for many months back.</p>

<span id="example-requests-GETapi-performances-performance_data-last--many--months">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/performances/performance_data/last/7/months?date=ducimus&amp;dates_between=quidem&amp;campaign=similique&amp;employee=quos&amp;supervisor=laborum&amp;project_campaign=laborum&amp;project_employee=omnis&amp;site=eum&amp;source=eaque&amp;client=sed&amp;supervisor_employee=a" \
    --header "Authorization: Bearer aEVa1ecDg6b35PdfZv648kh" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/performances/performance_data/last/7/months"
);

const params = {
    "date": "ducimus",
    "dates_between": "quidem",
    "campaign": "similique",
    "employee": "quos",
    "supervisor": "laborum",
    "project_campaign": "laborum",
    "project_employee": "omnis",
    "site": "eum",
    "source": "eaque",
    "client": "sed",
    "supervisor_employee": "a",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer aEVa1ecDg6b35PdfZv648kh",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-performances-performance_data-last--many--months">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;unique_id&quot;: &quot;2021-11-01-10007-1&quot;,
            &quot;away_time&quot;: 0,
            &quot;billable_hours&quot;: 0,
            &quot;break_time&quot;: 0,
            &quot;calls&quot;: 0,
            &quot;campaign_sph_goal&quot;: 0,
            &quot;campaign&quot;: &quot;asdfasfas-downtimes&quot;,
            &quot;cc_sales&quot;: 0,
            &quot;client&quot;: null,
            &quot;contacts&quot;: 0,
            &quot;date&quot;: &quot;2021-11-01&quot;,
            &quot;department&quot;: &quot;Sarah Schmeler&quot;,
            &quot;dontime_reason&quot;: &quot;Falta De Trabajo&quot;,
            &quot;employee_id&quot;: 10007,
            &quot;employee_name&quot;: &quot;Dorcas Iliana Turner Robel&quot;,
            &quot;first_name&quot;: &quot;Dorcas&quot;,
            &quot;hire_date&quot;: &quot;2004-08-04&quot;,
            &quot;last_name&quot;: &quot;Turner&quot;,
            &quot;login_time&quot;: 8,
            &quot;lunch_time&quot;: 0,
            &quot;off_hook_time&quot;: 0,
            &quot;pending_dispo_time&quot;: 0,
            &quot;production_time&quot;: 0,
            &quot;project_employee&quot;: &quot;Jaycee Kris&quot;,
            &quot;project_performance&quot;: &quot;Administracion&quot;,
            &quot;punch_id&quot;: null,
            &quot;reported_by&quot;: &quot;Bianka Quitzon&quot;,
            &quot;revenue&quot;: 0,
            &quot;salary&quot;: 125,
            &quot;sales&quot;: 0,
            &quot;second_first_name&quot;: &quot;Iliana&quot;,
            &quot;second_last_name&quot;: &quot;Robel&quot;,
            &quot;site&quot;: &quot;Anabel Hammes&quot;,
            &quot;source&quot;: &quot;Data Entry&quot;,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;supervisor_employee&quot;: &quot;Kiley Kirlin&quot;,
            &quot;supervisor_performance&quot;: &quot;Kiley Kirlin&quot;,
            &quot;talk_time&quot;: 0,
            &quot;training_time&quot;: 0,
            &quot;upsales&quot;: 0
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-performances-performance_data-last--many--months" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-performances-performance_data-last--many--months"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-performances-performance_data-last--many--months"></code></pre>
</span>
<span id="execution-error-GETapi-performances-performance_data-last--many--months" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-performances-performance_data-last--many--months"></code></pre>
</span>
<form id="form-GETapi-performances-performance_data-last--many--months" data-method="GET"
      data-path="api/performances/performance_data/last/{many}/months"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer aEVa1ecDg6b35PdfZv648kh","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-performances-performance_data-last--many--months', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-performances-performance_data-last--many--months"
                    onclick="tryItOut('GETapi-performances-performance_data-last--many--months');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-performances-performance_data-last--many--months"
                    onclick="cancelTryOut('GETapi-performances-performance_data-last--many--months');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-performances-performance_data-last--many--months" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/performances/performance_data/last/{many}/months</code></b>
        </p>
                <p>
            <label id="auth-GETapi-performances-performance_data-last--many--months" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-performances-performance_data-last--many--months"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>many</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="many"
               data-endpoint="GETapi-performances-performance_data-last--many--months"
               value="7"
               data-component="url" hidden>
    <br>
<p>The amount of months back to filter data. Example /performances/performance_data/last/3/months</p>
            </p>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>date</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="date"
               data-endpoint="GETapi-performances-performance_data-last--many--months"
               value="ducimus"
               data-component="query" hidden>
    <br>
<p>Filter data for specific date. Date must be included within the amount of months filtere, therefore should be used in combinaton.</p>
            </p>
                    <p>
                <b><code>dates_between</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="dates_between"
               data-endpoint="GETapi-performances-performance_data-last--many--months"
               value="quidem"
               data-component="query" hidden>
    <br>
<p>Filter data for specific date range. Example ?dates_between=2022-05-21,2022-05-24. Date must be included within the amount of months filtere, therefore should be used in combinaton.</p>
            </p>
                    <p>
                <b><code>campaign</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="campaign"
               data-endpoint="GETapi-performances-performance_data-last--many--months"
               value="similique"
               data-component="query" hidden>
    <br>
<p>Filter data by campaign name. Example ?campaign=%POL-%.</p>
            </p>
                    <p>
                <b><code>employee</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="employee"
               data-endpoint="GETapi-performances-performance_data-last--many--months"
               value="quos"
               data-component="query" hidden>
    <br>
<p>Filter data by employee name. Example ?employee=%Yismen Jore%.</p>
            </p>
                    <p>
                <b><code>supervisor</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="supervisor"
               data-endpoint="GETapi-performances-performance_data-last--many--months"
               value="laborum"
               data-component="query" hidden>
    <br>
<p>Filter data by supervisor name. Example ?supervisor=%Yismen Jore%.</p>
            </p>
                    <p>
                <b><code>project_campaign</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project_campaign"
               data-endpoint="GETapi-performances-performance_data-last--many--months"
               value="laborum"
               data-component="query" hidden>
    <br>
<p>Filter data by project_campaign name. Example ?project_campaign=%blackhawk%.</p>
            </p>
                    <p>
                <b><code>project_employee</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project_employee"
               data-endpoint="GETapi-performances-performance_data-last--many--months"
               value="omnis"
               data-component="query" hidden>
    <br>
<p>Filter data by project_employee name. Example ?project_campaign=%blackhawk%.</p>
            </p>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-performances-performance_data-last--many--months"
               value="eum"
               data-component="query" hidden>
    <br>
<p>Filter data by site name. Example ?site=%Santiago HQ%.</p>
            </p>
                    <p>
                <b><code>source</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="source"
               data-endpoint="GETapi-performances-performance_data-last--many--months"
               value="eaque"
               data-component="query" hidden>
    <br>
<p>Filter data by source name. Example ?source=%Santiago HQ%.</p>
            </p>
                    <p>
                <b><code>client</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="client"
               data-endpoint="GETapi-performances-performance_data-last--many--months"
               value="sed"
               data-component="query" hidden>
    <br>
<p>Filter data by client name. Example ?client=%blackhawk%.</p>
            </p>
                    <p>
                <b><code>supervisor_employee</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="supervisor_employee"
               data-endpoint="GETapi-performances-performance_data-last--many--months"
               value="a"
               data-component="query" hidden>
    <br>
<p>Filter data by supervisor_employee name. Example ?supervisor_employee=%Yismen Jore%.</p>
            </p>
                </form>

            <h2 id="performances-GETapi-v2-projects">Performances Projects</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of performances data for many months back.</p>

<span id="example-requests-GETapi-v2-projects">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/v2/projects" \
    --header "Authorization: Bearer 8a3ZDb6aEk16fgdvVhceP45" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/projects"
);

const headers = {
    "Authorization": "Bearer 8a3ZDb6aEk16fgdvVhceP45",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v2-projects">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Administracion&quot;,
            &quot;client&quot;: null
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v2-projects" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v2-projects"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v2-projects"></code></pre>
</span>
<span id="execution-error-GETapi-v2-projects" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v2-projects"></code></pre>
</span>
<form id="form-GETapi-v2-projects" data-method="GET"
      data-path="api/v2/projects"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer 8a3ZDb6aEk16fgdvVhceP45","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v2-projects', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v2-projects"
                    onclick="tryItOut('GETapi-v2-projects');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v2-projects"
                    onclick="cancelTryOut('GETapi-v2-projects');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v2-projects" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v2/projects</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v2-projects" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v2-projects"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="performances-GETapi-v2-supervisors-actives">Performances Active Supervisors</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of employees' Actives supervisors.</p>

<span id="example-requests-GETapi-v2-supervisors-actives">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/v2/supervisors/actives" \
    --header "Authorization: Bearer e8Z5fPa1dD63gbEac4vhk6V" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/supervisors/actives"
);

const headers = {
    "Authorization": "Bearer e8Z5fPa1dD63gbEac4vhk6V",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v2-supervisors-actives">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
     &quot;data&quot;: [
         {
             &quot;id&quot;: 1,
             &quot;name&quot;: &quot;Yismen Jorge&quot;,
             &quot;active&quot;: 1,
         }
     ]
 }</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v2-supervisors-actives" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v2-supervisors-actives"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v2-supervisors-actives"></code></pre>
</span>
<span id="execution-error-GETapi-v2-supervisors-actives" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v2-supervisors-actives"></code></pre>
</span>
<form id="form-GETapi-v2-supervisors-actives" data-method="GET"
      data-path="api/v2/supervisors/actives"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer e8Z5fPa1dD63gbEac4vhk6V","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v2-supervisors-actives', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v2-supervisors-actives"
                    onclick="tryItOut('GETapi-v2-supervisors-actives');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v2-supervisors-actives"
                    onclick="cancelTryOut('GETapi-v2-supervisors-actives');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v2-supervisors-actives" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v2/supervisors/actives</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v2-supervisors-actives" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v2-supervisors-actives"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="performances-GETapi-v2-supervisors">Performances Supervisors</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of employees' supervisors.</p>

<span id="example-requests-GETapi-v2-supervisors">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/v2/supervisors" \
    --header "Authorization: Bearer ag3E416VD6kve8Pf5bacZdh" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/supervisors"
);

const headers = {
    "Authorization": "Bearer ag3E416VD6kve8Pf5bacZdh",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v2-supervisors">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
     &quot;data&quot;: [
         {
             &quot;id&quot;: 1,
             &quot;name&quot;: &quot;Yismen Jorge&quot;,
             &quot;active&quot;: 1,
         }
     ]
 }</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v2-supervisors" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v2-supervisors"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v2-supervisors"></code></pre>
</span>
<span id="execution-error-GETapi-v2-supervisors" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v2-supervisors"></code></pre>
</span>
<form id="form-GETapi-v2-supervisors" data-method="GET"
      data-path="api/v2/supervisors"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer ag3E416VD6kve8Pf5bacZdh","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v2-supervisors', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v2-supervisors"
                    onclick="tryItOut('GETapi-v2-supervisors');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v2-supervisors"
                    onclick="cancelTryOut('GETapi-v2-supervisors');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v2-supervisors" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v2/supervisors</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v2-supervisors" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v2-supervisors"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="performances-GETapi-v2-sites">Performances Sites</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of employees' sites.</p>

<span id="example-requests-GETapi-v2-sites">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/v2/sites" \
    --header "Authorization: Bearer Va8ekEhgfbd6v6DPcZ3a154" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/sites"
);

const headers = {
    "Authorization": "Bearer Va8ekEhgfbd6v6DPcZ3a154",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v2-sites">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
     &quot;data&quot;: [
         {
             &quot;id&quot;: 1,
             &quot;name&quot;: &quot;Yismen Jorge&quot;,
         }
     ]
 }</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v2-sites" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v2-sites"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v2-sites"></code></pre>
</span>
<span id="execution-error-GETapi-v2-sites" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v2-sites"></code></pre>
</span>
<form id="form-GETapi-v2-sites" data-method="GET"
      data-path="api/v2/sites"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer Va8ekEhgfbd6v6DPcZ3a154","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v2-sites', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v2-sites"
                    onclick="tryItOut('GETapi-v2-sites');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v2-sites"
                    onclick="cancelTryOut('GETapi-v2-sites');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v2-sites" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v2/sites</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v2-sites" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v2-sites"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="performances-GETapi-v2-schedules">Performances Schedules</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of employees' schedules, filtered by many days ago.</p>

<span id="example-requests-GETapi-v2-schedules">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/v2/schedules?daysago=14" \
    --header "Authorization: Bearer EadhkbV6ZD1g8f6Pev4c53a" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/schedules"
);

const params = {
    "daysago": "14",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer EadhkbV6ZD1g8f6Pev4c53a",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v2-schedules">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
     &quot;data&quot;: [
         {
             &quot;employee_id&quot;: 50001,
             &quot;employee_name&quot;: &quot;Yismen Jorge&quot;,
             &quot;supervisor&quot;: &quot;Supervisor Name&quot;,
             &quot;date&quot;: &quot;2021-05-19&quot;,
             &quot;hours&quot;: 5.75,
         }
     ]
 }</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v2-schedules" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v2-schedules"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v2-schedules"></code></pre>
</span>
<span id="execution-error-GETapi-v2-schedules" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v2-schedules"></code></pre>
</span>
<form id="form-GETapi-v2-schedules" data-method="GET"
      data-path="api/v2/schedules"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer EadhkbV6ZD1g8f6Pev4c53a","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v2-schedules', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v2-schedules"
                    onclick="tryItOut('GETapi-v2-schedules');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v2-schedules"
                    onclick="cancelTryOut('GETapi-v2-schedules');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v2-schedules" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v2/schedules</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v2-schedules" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v2-schedules"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>daysago</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="daysago"
               data-endpoint="GETapi-v2-schedules"
               value="14"
               data-component="query" hidden>
    <br>
<p>The amount of days to filter back. Default 90. Example daysago=45</p>
            </p>
                </form>

            <h2 id="performances-POSTapi-v2-supervisors">Store Supervisors</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Save a Supervisor model to database.</p>

<span id="example-requests-POSTapi-v2-supervisors">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "dainsys.test/api/v2/supervisors" \
    --header "Authorization: Bearer 4deaP1Dgkhabc6f86EvV53Z" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"explicabo\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/supervisors"
);

const headers = {
    "Authorization": "Bearer 4deaP1Dgkhabc6f86EvV53Z",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "explicabo"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v2-supervisors">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;name&quot;: &quot;Asdfasdf&quot;,
    &quot;updated_at&quot;: &quot;2021-12-01T19:05:29.000000Z&quot;,
    &quot;created_at&quot;: &quot;2021-12-01T19:05:29.000000Z&quot;,
    &quot;id&quot;: 12
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v2-supervisors" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v2-supervisors"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v2-supervisors"></code></pre>
</span>
<span id="execution-error-POSTapi-v2-supervisors" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v2-supervisors"></code></pre>
</span>
<form id="form-POSTapi-v2-supervisors" data-method="POST"
      data-path="api/v2/supervisors"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer 4deaP1Dgkhabc6f86EvV53Z","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v2-supervisors', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v2-supervisors"
                    onclick="tryItOut('POSTapi-v2-supervisors');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v2-supervisors"
                    onclick="cancelTryOut('POSTapi-v2-supervisors');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v2-supervisors" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v2/supervisors</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-v2-supervisors" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-v2-supervisors"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-v2-supervisors"
               value="explicabo"
               data-component="body" hidden>
    <br>
<p>The name of the Supervisor</p>
        </p>
        </form>

            <h2 id="performances-GETapi-v2-login_names">Performances Login Names</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Return a collection of login names.</p>

<span id="example-requests-GETapi-v2-login_names">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/v2/login_names?recents=nam" \
    --header "Authorization: Bearer kg6bcZf5aE46Vav1hPDde38" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/login_names"
);

const params = {
    "recents": "nam",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer kg6bcZf5aE46Vav1hPDde38",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v2-login_names">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
 &quot;employee_id&quot;: 10001,
 &quot;employee_name&quot;: Yismen Jorge,
 &quot;login&quot;: yjorge,
 &quot;supervisor_id&quot;: 1
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v2-login_names" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v2-login_names"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v2-login_names"></code></pre>
</span>
<span id="execution-error-GETapi-v2-login_names" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v2-login_names"></code></pre>
</span>
<form id="form-GETapi-v2-login_names" data-method="GET"
      data-path="api/v2/login_names"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer kg6bcZf5aE46Vav1hPDde38","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v2-login_names', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v2-login_names"
                    onclick="tryItOut('GETapi-v2-login_names');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v2-login_names"
                    onclick="cancelTryOut('GETapi-v2-login_names');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v2-login_names" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v2/login_names</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v2-login_names" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v2-login_names"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>recents</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="recents"
               data-endpoint="GETapi-v2-login_names"
               value="nam"
               data-component="query" hidden>
    <br>
<p>optional When present, only login names for employees labeled as recents will be included. Default is true. Example ?recents=true</p>
            </p>
                </form>

            <h2 id="performances-GETapi-v2-downtimes">Performances Downtimes</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of dowtimes</p>

<span id="example-requests-GETapi-v2-downtimes">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/v2/downtimes?campaign=expedita&amp;client=non&amp;employee=non&amp;project_campaign=aliquam&amp;site=tenetur&amp;source=qui&amp;supervisor=aperiam" \
    --header "Authorization: Bearer gc6kDZh3e84avE5aV6bfPd1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/downtimes"
);

const params = {
    "campaign": "expedita",
    "client": "non",
    "employee": "non",
    "project_campaign": "aliquam",
    "site": "tenetur",
    "source": "qui",
    "supervisor": "aperiam",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer gc6kDZh3e84avE5aV6bfPd1",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v2-downtimes">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
     &quot;data&quot;: [
         {
              &quot;unique_id&quot;: &quot;unique-id-1-dsf-3&quot;,
              &quot;date&quot;: &quot;2021-05-17&quot;,
              &quot;employee_id&quot;: 50001,
              &quot;campaign&quot;: &quot;Some Campaign&quot;,
              &quot;project_campaign&quot;: &quot;Some Project&quot;,
              &quot;employee_name&quot;: &quot;Some Employee&quot;,
              &quot;login_time&quot;: 8.21,
              &quot;downtime_reason&quot;: &quot;falta de Trabajo&quot;,
              &quot;reported_by&quot;: &quot;Yismen Jorge&quot;,
         }
     ]
 }</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v2-downtimes" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v2-downtimes"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v2-downtimes"></code></pre>
</span>
<span id="execution-error-GETapi-v2-downtimes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v2-downtimes"></code></pre>
</span>
<form id="form-GETapi-v2-downtimes" data-method="GET"
      data-path="api/v2/downtimes"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer gc6kDZh3e84avE5aV6bfPd1","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v2-downtimes', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v2-downtimes"
                    onclick="tryItOut('GETapi-v2-downtimes');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v2-downtimes"
                    onclick="cancelTryOut('GETapi-v2-downtimes');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v2-downtimes" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v2/downtimes</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v2-downtimes" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v2-downtimes"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>campaign</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="campaign"
               data-endpoint="GETapi-v2-downtimes"
               value="expedita"
               data-component="query" hidden>
    <br>
<p>Limit results to specific campaign. Example ?campaign=%Santiago%</p>
            </p>
                    <p>
                <b><code>client</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="client"
               data-endpoint="GETapi-v2-downtimes"
               value="non"
               data-component="query" hidden>
    <br>
<p>Limit results to specific client. Example ?client=%Pub%</p>
            </p>
                    <p>
                <b><code>employee</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="employee"
               data-endpoint="GETapi-v2-downtimes"
               value="non"
               data-component="query" hidden>
    <br>
<p>Limit results to specific employee. Example ?employee=%Santiago%</p>
            </p>
                    <p>
                <b><code>project_campaign</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project_campaign"
               data-endpoint="GETapi-v2-downtimes"
               value="aliquam"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project_campaign. Example ?project_campaign=%Santiago%</p>
            </p>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-v2-downtimes"
               value="tenetur"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>source</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="source"
               data-endpoint="GETapi-v2-downtimes"
               value="qui"
               data-component="query" hidden>
    <br>
<p>Limit results to specific source. Example ?source=%Santiago%</p>
            </p>
                    <p>
                <b><code>supervisor</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="supervisor"
               data-endpoint="GETapi-v2-downtimes"
               value="aperiam"
               data-component="query" hidden>
    <br>
<p>Limit results to specific supervisor. Example ?supervisor=%Santiago%</p>
            </p>
                </form>

            <h2 id="performances-GETapi-v2-downtime_reasons">Performances Downtime Reasons</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of downtime reasons</p>

<span id="example-requests-GETapi-v2-downtime_reasons">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/v2/downtime_reasons" \
    --header "Authorization: Bearer P63hevZ645DaVfgbEkdc81a" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/downtime_reasons"
);

const headers = {
    "Authorization": "Bearer P63hevZ645DaVfgbEkdc81a",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v2-downtime_reasons">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Falta De Trabajo&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v2-downtime_reasons" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v2-downtime_reasons"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v2-downtime_reasons"></code></pre>
</span>
<span id="execution-error-GETapi-v2-downtime_reasons" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v2-downtime_reasons"></code></pre>
</span>
<form id="form-GETapi-v2-downtime_reasons" data-method="GET"
      data-path="api/v2/downtime_reasons"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer P63hevZ645DaVfgbEkdc81a","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v2-downtime_reasons', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v2-downtime_reasons"
                    onclick="tryItOut('GETapi-v2-downtime_reasons');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v2-downtime_reasons"
                    onclick="cancelTryOut('GETapi-v2-downtime_reasons');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v2-downtime_reasons" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v2/downtime_reasons</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v2-downtime_reasons" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v2-downtime_reasons"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="performances-GETapi-v2-clients">Performances Clients</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of clients information</p>

<span id="example-requests-GETapi-v2-clients">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/v2/clients" \
    --header "Authorization: Bearer 4h31cefDVkaZPavd5668Ebg" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/clients"
);

const headers = {
    "Authorization": "Bearer 4h31cefDVkaZPavd5668Ebg",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v2-clients">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Miss Ericka Medhurst&quot;,
            &quot;contact_name&quot;: &quot;Roel Harvey&quot;,
            &quot;main_phone&quot;: &quot;(954) 631-9605&quot;,
            &quot;email&quot;: &quot;toy.raquel@hotmail.com&quot;,
            &quot;secondary_phone&quot;: &quot;+14408935480&quot;,
            &quot;account_number&quot;: &quot;929-384-1946&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v2-clients" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v2-clients"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v2-clients"></code></pre>
</span>
<span id="execution-error-GETapi-v2-clients" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v2-clients"></code></pre>
</span>
<form id="form-GETapi-v2-clients" data-method="GET"
      data-path="api/v2/clients"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer 4h31cefDVkaZPavd5668Ebg","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v2-clients', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v2-clients"
                    onclick="tryItOut('GETapi-v2-clients');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v2-clients"
                    onclick="cancelTryOut('GETapi-v2-clients');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v2-clients" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v2/clients</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v2-clients" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v2-clients"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="performances-GETapi-v2-campaigns">Performances Campaigns</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of camaigns information</p>

<span id="example-requests-GETapi-v2-campaigns">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/v2/campaigns" \
    --header "Authorization: Bearer Zfb8akEe6463P5d1avcVhgD" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/campaigns"
);

const headers = {
    "Authorization": "Bearer Zfb8akEe6463P5d1avcVhgD",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v2-campaigns">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;asdfasfas-downtimes&quot;,
            &quot;project_id&quot;: 1,
            &quot;source_id&quot;: 5,
            &quot;revenue_type_id&quot;: 1,
            &quot;sph_goal&quot;: 24,
            &quot;rate&quot;: 40
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v2-campaigns" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v2-campaigns"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v2-campaigns"></code></pre>
</span>
<span id="execution-error-GETapi-v2-campaigns" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v2-campaigns"></code></pre>
</span>
<form id="form-GETapi-v2-campaigns" data-method="GET"
      data-path="api/v2/campaigns"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer Zfb8akEe6463P5d1avcVhgD","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v2-campaigns', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v2-campaigns"
                    onclick="tryItOut('GETapi-v2-campaigns');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v2-campaigns"
                    onclick="cancelTryOut('GETapi-v2-campaigns');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v2-campaigns" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v2/campaigns</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v2-campaigns" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v2-campaigns"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="performances-GETapi-v2-performances">Performances Data</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Collection of performances data for many months back.</p>

<span id="example-requests-GETapi-v2-performances">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "dainsys.test/api/v2/performances?months=14&amp;date=aliquid&amp;dates_between=cumque&amp;campaign=quo&amp;employee=alias&amp;supervisor=ducimus&amp;project_campaign=at&amp;project_employee=fuga&amp;site=deleniti&amp;source=voluptatum&amp;client=iste&amp;supervisor_employee=pariatur" \
    --header "Authorization: Bearer ZkcPde53va168ghfaEV6Db4" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "dainsys.test/api/v2/performances"
);

const params = {
    "months": "14",
    "date": "aliquid",
    "dates_between": "cumque",
    "campaign": "quo",
    "employee": "alias",
    "supervisor": "ducimus",
    "project_campaign": "at",
    "project_employee": "fuga",
    "site": "deleniti",
    "source": "voluptatum",
    "client": "iste",
    "supervisor_employee": "pariatur",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Authorization": "Bearer ZkcPde53va168ghfaEV6Db4",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v2-performances">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;unique_id&quot;: &quot;2021-11-01-10007-1&quot;,
            &quot;away_time&quot;: 0,
            &quot;billable_hours&quot;: 0,
            &quot;break_time&quot;: 0,
            &quot;calls&quot;: 0,
            &quot;campaign_sph_goal&quot;: 0,
            &quot;campaign&quot;: &quot;asdfasfas-downtimes&quot;,
            &quot;cc_sales&quot;: 0,
            &quot;client&quot;: null,
            &quot;contacts&quot;: 0,
            &quot;date&quot;: &quot;2021-11-01&quot;,
            &quot;department&quot;: &quot;Sarah Schmeler&quot;,
            &quot;dontime_reason&quot;: &quot;Falta De Trabajo&quot;,
            &quot;employee_id&quot;: 10007,
            &quot;employee_name&quot;: &quot;Dorcas Iliana Turner Robel&quot;,
            &quot;first_name&quot;: &quot;Dorcas&quot;,
            &quot;hire_date&quot;: &quot;2004-08-04&quot;,
            &quot;last_name&quot;: &quot;Turner&quot;,
            &quot;login_time&quot;: 8,
            &quot;lunch_time&quot;: 0,
            &quot;off_hook_time&quot;: 0,
            &quot;pending_dispo_time&quot;: 0,
            &quot;production_time&quot;: 0,
            &quot;project_employee&quot;: &quot;Jaycee Kris&quot;,
            &quot;project_performance&quot;: &quot;Administracion&quot;,
            &quot;punch_id&quot;: null,
            &quot;reported_by&quot;: &quot;Bianka Quitzon&quot;,
            &quot;revenue&quot;: 0,
            &quot;salary&quot;: 125,
            &quot;sales&quot;: 0,
            &quot;second_first_name&quot;: &quot;Iliana&quot;,
            &quot;second_last_name&quot;: &quot;Robel&quot;,
            &quot;site&quot;: &quot;Anabel Hammes&quot;,
            &quot;source&quot;: &quot;Data Entry&quot;,
            &quot;status&quot;: &quot;Active&quot;,
            &quot;supervisor_employee&quot;: &quot;Kiley Kirlin&quot;,
            &quot;supervisor_performance&quot;: &quot;Kiley Kirlin&quot;,
            &quot;talk_time&quot;: 0,
            &quot;training_time&quot;: 0,
            &quot;upsales&quot;: 0
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v2-performances" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v2-performances"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v2-performances"></code></pre>
</span>
<span id="execution-error-GETapi-v2-performances" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v2-performances"></code></pre>
</span>
<form id="form-GETapi-v2-performances" data-method="GET"
      data-path="api/v2/performances"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer ZkcPde53va168ghfaEV6Db4","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v2-performances', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v2-performances"
                    onclick="tryItOut('GETapi-v2-performances');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v2-performances"
                    onclick="cancelTryOut('GETapi-v2-performances');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v2-performances" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v2/performances</code></b>
        </p>
                <p>
            <label id="auth-GETapi-v2-performances" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-v2-performances"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>months</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="months"
               data-endpoint="GETapi-v2-performances"
               value="14"
               data-component="query" hidden>
    <br>
<p>Filter data for many months old. Default is 2.</p>
            </p>
                    <p>
                <b><code>date</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="date"
               data-endpoint="GETapi-v2-performances"
               value="aliquid"
               data-component="query" hidden>
    <br>
<p>Filter data for specific date. Date must be included within the amount of months filtere, therefore should be used in combinaton.</p>
            </p>
                    <p>
                <b><code>dates_between</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="dates_between"
               data-endpoint="GETapi-v2-performances"
               value="cumque"
               data-component="query" hidden>
    <br>
<p>Filter data for specific date range. Example ?dates_between=2022-05-21,2022-05-24. Date must be included within the amount of months filtere, therefore should be used in combinaton.</p>
            </p>
                    <p>
                <b><code>campaign</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="campaign"
               data-endpoint="GETapi-v2-performances"
               value="quo"
               data-component="query" hidden>
    <br>
<p>Filter data by campaign name. Example ?campaign=%POL-%.</p>
            </p>
                    <p>
                <b><code>employee</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="employee"
               data-endpoint="GETapi-v2-performances"
               value="alias"
               data-component="query" hidden>
    <br>
<p>Filter data by employee name. Example ?employee=%Yismen Jore%.</p>
            </p>
                    <p>
                <b><code>supervisor</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="supervisor"
               data-endpoint="GETapi-v2-performances"
               value="ducimus"
               data-component="query" hidden>
    <br>
<p>Filter data by supervisor name. Example ?supervisor=%Yismen Jore%.</p>
            </p>
                    <p>
                <b><code>project_campaign</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project_campaign"
               data-endpoint="GETapi-v2-performances"
               value="at"
               data-component="query" hidden>
    <br>
<p>Filter data by project_campaign name. Example ?project_campaign=%blackhawk%.</p>
            </p>
                    <p>
                <b><code>project_employee</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project_employee"
               data-endpoint="GETapi-v2-performances"
               value="fuga"
               data-component="query" hidden>
    <br>
<p>Filter data by project_employee name. Example ?project_campaign=%blackhawk%.</p>
            </p>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-v2-performances"
               value="deleniti"
               data-component="query" hidden>
    <br>
<p>Filter data by site name. Example ?site=%Santiago HQ%.</p>
            </p>
                    <p>
                <b><code>source</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="source"
               data-endpoint="GETapi-v2-performances"
               value="voluptatum"
               data-component="query" hidden>
    <br>
<p>Filter data by source name. Example ?source=%Santiago HQ%.</p>
            </p>
                    <p>
                <b><code>client</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="client"
               data-endpoint="GETapi-v2-performances"
               value="iste"
               data-component="query" hidden>
    <br>
<p>Filter data by client name. Example ?client=%blackhawk%.</p>
            </p>
                    <p>
                <b><code>supervisor_employee</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="supervisor_employee"
               data-endpoint="GETapi-v2-performances"
               value="pariatur"
               data-component="query" hidden>
    <br>
<p>Filter data by supervisor_employee name. Example ?supervisor_employee=%Yismen Jore%.</p>
            </p>
                </form>

    

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
