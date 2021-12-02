<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Dainsys Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="//cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="//unpkg.com/@highlightjs/cdn-assets@10.7.2/styles/obsidian.min.css">
    <script src="//unpkg.com/@highlightjs/cdn-assets@10.7.2/highlight.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var baseUrl = "http://localhost:8000";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("vendor/scribe/js/tryitout-3.17.0.js") }}"></script>

    <script src="{{ asset("vendor/scribe/js/theme-default-3.17.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("vendor/scribe/images/navbar.png") }}" alt="navbar-image" />
    </span>
</a>
<div class="tocify-wrapper">
            <img src="/var/www/html/public/images/logo.png" alt="logo" class="logo" style="padding-top: 10px;" width="230px"/>
    
            <div class="lang-selector">
                            <a href="#" data-language-name="bash">bash</a>
                            <a href="#" data-language-name="javascript">javascript</a>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-0" class="tocify-header">
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
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-1" class="tocify-header">
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
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-2" class="tocify-header">
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
                                                    </ul>
                            </ul>
            </div>

            <ul class="toc-footer" id="toc-footer">
                            <li><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                            <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
                    </ul>
        <ul class="toc-footer" id="last-updated">
        <li>Last updated: December 1 2021</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1>Introduction</h1>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>
<blockquote>
<p>Base URL</p>
</blockquote>
<pre><code class="language-yaml">http://localhost:8000</code></pre>

        <h1>Authenticating requests</h1>
<p>To authenticate requests, include an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer your-token"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.</p>

        <h1 id="dashboards">Dashboards</h1>

    

            <h2 id="dashboards-GETapi-dashboards-human_resources-head_counts">Dashboards Human Resources Head Counts</h2>

<p>
</p>

<p>Head Counts data for human resources dashboard</p>

<span id="example-requests-GETapi-dashboards-human_resources-head_counts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/dashboards/human_resources/head_counts?site=atque&amp;project=nesciunt&amp;department=pariatur&amp;position=voluptatem" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/dashboards/human_resources/head_counts"
);

const params = {
    "site": "atque",
    "project": "nesciunt",
    "department": "pariatur",
    "position": "voluptatem",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-dashboards-human_resources-head_counts"
               value="atque"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>project</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project"
               data-endpoint="GETapi-dashboards-human_resources-head_counts"
               value="nesciunt"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project. Example ?project=%Pub%</p>
            </p>
                    <p>
                <b><code>department</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="department"
               data-endpoint="GETapi-dashboards-human_resources-head_counts"
               value="pariatur"
               data-component="query" hidden>
    <br>
<p>Limit results to specific department. Example ?department=%Product%</p>
            </p>
                    <p>
                <b><code>position</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="position"
               data-endpoint="GETapi-dashboards-human_resources-head_counts"
               value="voluptatem"
               data-component="query" hidden>
    <br>
<p>Limit results to specific position. Example ?position=%Agente%</p>
            </p>
                </form>

            <h2 id="dashboards-GETapi-dashboards-human_resources-attritions">Dashboards Human Resources Month Attritions</h2>

<p>
</p>

<p>Collection of attritions by months, including the last 12 months for human resources dashboard</p>

<span id="example-requests-GETapi-dashboards-human_resources-attritions">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/dashboards/human_resources/attritions?site=qui&amp;project=itaque&amp;department=blanditiis&amp;position=officia" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/dashboards/human_resources/attritions"
);

const params = {
    "site": "qui",
    "project": "itaque",
    "department": "blanditiis",
    "position": "officia",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-dashboards-human_resources-attritions"
               value="qui"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>project</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project"
               data-endpoint="GETapi-dashboards-human_resources-attritions"
               value="itaque"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project. Example ?project=%Pub%</p>
            </p>
                    <p>
                <b><code>department</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="department"
               data-endpoint="GETapi-dashboards-human_resources-attritions"
               value="blanditiis"
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
</p>

<p>Collection of head counts grouped by projects for human resources dashboard</p>

<span id="example-requests-GETapi-dashboards-human_resources-hc_by_project">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/dashboards/human_resources/hc_by_project?site=architecto&amp;project=aliquid&amp;department=delectus&amp;position=omnis" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/dashboards/human_resources/hc_by_project"
);

const params = {
    "site": "architecto",
    "project": "aliquid",
    "department": "delectus",
    "position": "omnis",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-dashboards-human_resources-hc_by_project"
               value="architecto"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>project</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project"
               data-endpoint="GETapi-dashboards-human_resources-hc_by_project"
               value="aliquid"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project. Example ?project=%Pub%</p>
            </p>
                    <p>
                <b><code>department</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="department"
               data-endpoint="GETapi-dashboards-human_resources-hc_by_project"
               value="delectus"
               data-component="query" hidden>
    <br>
<p>Limit results to specific department. Example ?department=%Product%</p>
            </p>
                    <p>
                <b><code>position</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="position"
               data-endpoint="GETapi-dashboards-human_resources-hc_by_project"
               value="omnis"
               data-component="query" hidden>
    <br>
<p>Limit results to specific position. Example ?position=%Agente%</p>
            </p>
                </form>

            <h2 id="dashboards-GETapi-dashboards-human_resources-hc_by_gender">Dashboards Human Resources Head Counts by Gender</h2>

<p>
</p>

<p>Collection of head count data grouped by gender for human resources dashboard</p>

<span id="example-requests-GETapi-dashboards-human_resources-hc_by_gender">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/dashboards/human_resources/hc_by_gender?site=ea&amp;project=et&amp;department=nesciunt&amp;position=ratione" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/dashboards/human_resources/hc_by_gender"
);

const params = {
    "site": "ea",
    "project": "et",
    "department": "nesciunt",
    "position": "ratione",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-dashboards-human_resources-hc_by_gender"
               value="ea"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>project</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project"
               data-endpoint="GETapi-dashboards-human_resources-hc_by_gender"
               value="et"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project. Example ?project=%Pub%</p>
            </p>
                    <p>
                <b><code>department</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="department"
               data-endpoint="GETapi-dashboards-human_resources-hc_by_gender"
               value="nesciunt"
               data-component="query" hidden>
    <br>
<p>Limit results to specific department. Example ?department=%Product%</p>
            </p>
                    <p>
                <b><code>position</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="position"
               data-endpoint="GETapi-dashboards-human_resources-hc_by_gender"
               value="ratione"
               data-component="query" hidden>
    <br>
<p>Limit results to specific position. Example ?position=%Agente%</p>
            </p>
                </form>

            <h2 id="dashboards-GETapi-dashboards-human_resources-hc_by_department">Dashboards Human Resources Head Counts by Departments</h2>

<p>
</p>

<p>Collection of head count data grouped by department for human resources dashboard</p>

<span id="example-requests-GETapi-dashboards-human_resources-hc_by_department">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/dashboards/human_resources/hc_by_department?site=qui&amp;project=ea&amp;department=voluptatem&amp;position=quis" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/dashboards/human_resources/hc_by_department"
);

const params = {
    "site": "qui",
    "project": "ea",
    "department": "voluptatem",
    "position": "quis",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-dashboards-human_resources-hc_by_department"
               value="qui"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>project</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project"
               data-endpoint="GETapi-dashboards-human_resources-hc_by_department"
               value="ea"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project. Example ?project=%Pub%</p>
            </p>
                    <p>
                <b><code>department</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="department"
               data-endpoint="GETapi-dashboards-human_resources-hc_by_department"
               value="voluptatem"
               data-component="query" hidden>
    <br>
<p>Limit results to specific department. Example ?department=%Product%</p>
            </p>
                    <p>
                <b><code>position</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="position"
               data-endpoint="GETapi-dashboards-human_resources-hc_by_department"
               value="quis"
               data-component="query" hidden>
    <br>
<p>Limit results to specific position. Example ?position=%Agente%</p>
            </p>
                </form>

            <h2 id="dashboards-GETapi-dashboards-production-mtd_stats">Dashboards Production Month To Date Stats</h2>

<p>
</p>

<p>Production MTD stats for production dashboard</p>

<span id="example-requests-GETapi-dashboards-production-mtd_stats">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/dashboards/production/mtd_stats?campaign=consequatur&amp;source=quo&amp;employee=ratione&amp;supervisor=architecto&amp;supervisor_employee=dicta&amp;project_campaign=omnis&amp;project_employee=distinctio&amp;site=mollitia&amp;client=corrupti" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/dashboards/production/mtd_stats"
);

const params = {
    "campaign": "consequatur",
    "source": "quo",
    "employee": "ratione",
    "supervisor": "architecto",
    "supervisor_employee": "dicta",
    "project_campaign": "omnis",
    "project_employee": "distinctio",
    "site": "mollitia",
    "client": "corrupti",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>campaign</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="campaign"
               data-endpoint="GETapi-dashboards-production-mtd_stats"
               value="consequatur"
               data-component="query" hidden>
    <br>
<p>Limit results to specific campaign. Example ?campaign=%Santiago%</p>
            </p>
                    <p>
                <b><code>source</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="source"
               data-endpoint="GETapi-dashboards-production-mtd_stats"
               value="quo"
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
               value="architecto"
               data-component="query" hidden>
    <br>
<p>Limit results to specific supervisor. Example ?supervisor=%Santiago%</p>
            </p>
                    <p>
                <b><code>supervisor_employee</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="supervisor_employee"
               data-endpoint="GETapi-dashboards-production-mtd_stats"
               value="dicta"
               data-component="query" hidden>
    <br>
<p>Limit results to specific supervisor_employee. Example ?supervisor_employee=%Santiago%</p>
            </p>
                    <p>
                <b><code>project_campaign</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project_campaign"
               data-endpoint="GETapi-dashboards-production-mtd_stats"
               value="omnis"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project_campaign. Example ?project_campaign=%Santiago%</p>
            </p>
                    <p>
                <b><code>project_employee</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project_employee"
               data-endpoint="GETapi-dashboards-production-mtd_stats"
               value="distinctio"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project_employee. Example ?project_employee=%Santiago%</p>
            </p>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-dashboards-production-mtd_stats"
               value="mollitia"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>client</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="client"
               data-endpoint="GETapi-dashboards-production-mtd_stats"
               value="corrupti"
               data-component="query" hidden>
    <br>
<p>Limit results to specific client. Example ?client=%Pub%</p>
            </p>
                </form>

            <h2 id="dashboards-GETapi-dashboards-production-monthly_stats">Dashboards Production Monthly Stats</h2>

<p>
</p>

<p>Production Monthly stats for production dashboard</p>

<span id="example-requests-GETapi-dashboards-production-monthly_stats">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/dashboards/production/monthly_stats?campaign=sed&amp;source=excepturi&amp;employee=doloremque&amp;supervisor=ut&amp;supervisor_employee=dolore&amp;project_campaign=et&amp;project_employee=nesciunt&amp;site=omnis&amp;client=possimus" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/dashboards/production/monthly_stats"
);

const params = {
    "campaign": "sed",
    "source": "excepturi",
    "employee": "doloremque",
    "supervisor": "ut",
    "supervisor_employee": "dolore",
    "project_campaign": "et",
    "project_employee": "nesciunt",
    "site": "omnis",
    "client": "possimus",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>campaign</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="campaign"
               data-endpoint="GETapi-dashboards-production-monthly_stats"
               value="sed"
               data-component="query" hidden>
    <br>
<p>Limit results to specific campaign. Example ?campaign=%Santiago%</p>
            </p>
                    <p>
                <b><code>source</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="source"
               data-endpoint="GETapi-dashboards-production-monthly_stats"
               value="excepturi"
               data-component="query" hidden>
    <br>
<p>Limit results to specific source. Example ?source=%Santiago%</p>
            </p>
                    <p>
                <b><code>employee</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="employee"
               data-endpoint="GETapi-dashboards-production-monthly_stats"
               value="doloremque"
               data-component="query" hidden>
    <br>
<p>Limit results to specific employee. Example ?employee=%Santiago%</p>
            </p>
                    <p>
                <b><code>supervisor</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="supervisor"
               data-endpoint="GETapi-dashboards-production-monthly_stats"
               value="ut"
               data-component="query" hidden>
    <br>
<p>Limit results to specific supervisor. Example ?supervisor=%Santiago%</p>
            </p>
                    <p>
                <b><code>supervisor_employee</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="supervisor_employee"
               data-endpoint="GETapi-dashboards-production-monthly_stats"
               value="dolore"
               data-component="query" hidden>
    <br>
<p>Limit results to specific supervisor_employee. Example ?supervisor_employee=%Santiago%</p>
            </p>
                    <p>
                <b><code>project_campaign</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project_campaign"
               data-endpoint="GETapi-dashboards-production-monthly_stats"
               value="et"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project_campaign. Example ?project_campaign=%Santiago%</p>
            </p>
                    <p>
                <b><code>project_employee</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project_employee"
               data-endpoint="GETapi-dashboards-production-monthly_stats"
               value="nesciunt"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project_employee. Example ?project_employee=%Santiago%</p>
            </p>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-dashboards-production-monthly_stats"
               value="omnis"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>client</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="client"
               data-endpoint="GETapi-dashboards-production-monthly_stats"
               value="possimus"
               data-component="query" hidden>
    <br>
<p>Limit results to specific client. Example ?client=%Pub%</p>
            </p>
                </form>

        <h1 id="endpoints">Endpoints</h1>

    

            <h2 id="endpoints-GETapi-user">Authenticated User</h2>

<p>
</p>

<p>Return information of the authenticated user</p>

<span id="example-requests-GETapi-user">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/user" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/user"
);

const headers = {
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                    </form>

            <h2 id="endpoints-POSTapi-afps">Store Afps</h2>

<p>
</p>

<p>Save a Afp model to database.</p>

<span id="example-requests-POSTapi-afps">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/afps" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"laboriosam\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/afps"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "laboriosam"
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-afps"
               value="laboriosam"
               data-component="body" hidden>
    <br>
<p>The name of the Afp</p>
        </p>
        </form>

            <h2 id="endpoints-POSTapi-arss">Store Ars</h2>

<p>
</p>

<p>Save a Ars model to database.</p>

<span id="example-requests-POSTapi-arss">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/arss" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"voluptatibus\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/arss"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "voluptatibus"
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-arss"
               value="voluptatibus"
               data-component="body" hidden>
    <br>
<p>The name of the Ars</p>
        </p>
        </form>

            <h2 id="endpoints-POSTapi-banks">Store Banks</h2>

<p>
</p>

<p>Save a Banks model to database.</p>

<span id="example-requests-POSTapi-banks">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/banks" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"doloremque\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/banks"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "doloremque"
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-banks"
               value="doloremque"
               data-component="body" hidden>
    <br>
<p>The name of the Banks</p>
        </p>
        </form>

            <h2 id="endpoints-POSTapi-positions">Store Positions</h2>

<p>
</p>

<p>Save a Position model to database.</p>

<span id="example-requests-POSTapi-positions">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/positions" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"possimus\",
    \"department_id\": \"qui\",
    \"payment_type_id\": \"at\",
    \"payment_frequency_id\": \"illum\",
    \"salary\": \"enim\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/positions"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "possimus",
    "department_id": "qui",
    "payment_type_id": "at",
    "payment_frequency_id": "illum",
    "salary": "enim"
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-positions"
               value="possimus"
               data-component="body" hidden>
    <br>
<p>The name of the Position</p>
        </p>
                <p>
            <b><code>department_id</code></b>&nbsp;&nbsp;<small>numeric</small>  &nbsp;
                <input type="text"
               name="department_id"
               data-endpoint="POSTapi-positions"
               value="qui"
               data-component="body" hidden>
    <br>
<p>The department_id of the Position</p>
        </p>
                <p>
            <b><code>payment_type_id</code></b>&nbsp;&nbsp;<small>numeric</small>  &nbsp;
                <input type="text"
               name="payment_type_id"
               data-endpoint="POSTapi-positions"
               value="at"
               data-component="body" hidden>
    <br>
<p>The payment_type_id of the Position</p>
        </p>
                <p>
            <b><code>payment_frequency_id</code></b>&nbsp;&nbsp;<small>numeric</small>  &nbsp;
                <input type="text"
               name="payment_frequency_id"
               data-endpoint="POSTapi-positions"
               value="illum"
               data-component="body" hidden>
    <br>
<p>The payment_frequency_id of the Position</p>
        </p>
                <p>
            <b><code>salary</code></b>&nbsp;&nbsp;<small>numeric</small>  &nbsp;
                <input type="text"
               name="salary"
               data-endpoint="POSTapi-positions"
               value="enim"
               data-component="body" hidden>
    <br>
<p>The salary of the Position</p>
        </p>
        </form>

            <h2 id="endpoints-POSTapi-supervisors">Store Supervisors</h2>

<p>
</p>

<p>Save a Supervisor model to database.</p>

<span id="example-requests-POSTapi-supervisors">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/supervisors" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"neque\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/supervisors"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "neque"
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-supervisors"
               value="neque"
               data-component="body" hidden>
    <br>
<p>The name of the Supervisor</p>
        </p>
        </form>

            <h2 id="endpoints-POSTapi-departments">Store Departmens</h2>

<p>
</p>

<p>Save a Department model to database.</p>

<span id="example-requests-POSTapi-departments">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/departments" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"rerum\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/departments"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "rerum"
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-departments"
               value="rerum"
               data-component="body" hidden>
    <br>
<p>The name of the Department</p>
        </p>
        </form>

            <h2 id="endpoints-POSTapi-payment_frequencies">Store Payment Frequencies</h2>

<p>
</p>

<p>Save a Payment Frequency model to database.</p>

<span id="example-requests-POSTapi-payment_frequencies">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/payment_frequencies" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"ullam\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/payment_frequencies"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "ullam"
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-payment_frequencies"
               value="ullam"
               data-component="body" hidden>
    <br>
<p>The name of the Payment Frequency</p>
        </p>
        </form>

            <h2 id="endpoints-POSTapi-nationalities">Store Nationalities</h2>

<p>
</p>

<p>Save a Nationality model to database.</p>

<span id="example-requests-POSTapi-nationalities">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/nationalities" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"illo\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/nationalities"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "illo"
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-nationalities"
               value="illo"
               data-component="body" hidden>
    <br>
<p>The name of the Nationality     *</p>
        </p>
        </form>

            <h2 id="endpoints-POSTapi-employees--employee--vip">Update VIP</h2>

<p>
</p>

<p>Update VIP information for a given employee.</p>

<span id="example-requests-POSTapi-employees--employee--vip">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/employees/13/vip" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"is_vip\": false
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/employees/13/vip"
);

const headers = {
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>employee</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="employee"
               data-endpoint="POSTapi-employees--employee--vip"
               value="13"
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
</p>

<p>Update Universal information for a given employee.</p>

<span id="example-requests-POSTapi-employees--employee--universal">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/employees/1/universal" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"is_vip\": false
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/employees/1/universal"
);

const headers = {
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>employee</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="employee"
               data-endpoint="POSTapi-employees--employee--universal"
               value="1"
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
</p>

<p>Collection of employees registered.</p>

<span id="example-requests-GETapi-employees">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/employees?site=voluptatem&amp;project=et&amp;department=saepe&amp;position=eaque" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/employees"
);

const params = {
    "site": "voluptatem",
    "project": "et",
    "department": "saepe",
    "position": "eaque",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-employees"
               value="voluptatem"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>project</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project"
               data-endpoint="GETapi-employees"
               value="et"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project. Example ?project=%Pub%</p>
            </p>
                    <p>
                <b><code>department</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="department"
               data-endpoint="GETapi-employees"
               value="saepe"
               data-component="query" hidden>
    <br>
<p>Limit results to specific department. Example ?department=%Product%</p>
            </p>
                    <p>
                <b><code>position</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="position"
               data-endpoint="GETapi-employees"
               value="eaque"
               data-component="query" hidden>
    <br>
<p>Limit results to specific position. Example ?position=%Agente%</p>
            </p>
                </form>

            <h2 id="endpoints-GETapi-employees-all">Employees All</h2>

<p>
</p>

<p>Collection of employees registered.</p>

<span id="example-requests-GETapi-employees-all">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/employees/all?site=eaque&amp;project=itaque&amp;department=et&amp;position=quia" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/employees/all"
);

const params = {
    "site": "eaque",
    "project": "itaque",
    "department": "et",
    "position": "quia",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-employees-all"
               value="eaque"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>project</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project"
               data-endpoint="GETapi-employees-all"
               value="itaque"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project. Example ?project=%Pub%</p>
            </p>
                    <p>
                <b><code>department</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="department"
               data-endpoint="GETapi-employees-all"
               value="et"
               data-component="query" hidden>
    <br>
<p>Limit results to specific department. Example ?department=%Product%</p>
            </p>
                    <p>
                <b><code>position</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="position"
               data-endpoint="GETapi-employees-all"
               value="quia"
               data-component="query" hidden>
    <br>
<p>Limit results to specific position. Example ?position=%Agente%</p>
            </p>
                </form>

            <h2 id="endpoints-GETapi-employees-actives">Employees Actives</h2>

<p>
</p>

<p>Collection of employees actives. This is any employee without a termination.</p>

<span id="example-requests-GETapi-employees-actives">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/employees/actives?site=omnis&amp;project=officia&amp;department=rem&amp;position=ab" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/employees/actives"
);

const params = {
    "site": "omnis",
    "project": "officia",
    "department": "rem",
    "position": "ab",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-employees-actives"
               value="omnis"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>project</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project"
               data-endpoint="GETapi-employees-actives"
               value="officia"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project. Example ?project=%Pub%</p>
            </p>
                    <p>
                <b><code>department</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="department"
               data-endpoint="GETapi-employees-actives"
               value="rem"
               data-component="query" hidden>
    <br>
<p>Limit results to specific department. Example ?department=%Product%</p>
            </p>
                    <p>
                <b><code>position</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="position"
               data-endpoint="GETapi-employees-actives"
               value="ab"
               data-component="query" hidden>
    <br>
<p>Limit results to specific position. Example ?position=%Agente%</p>
            </p>
                </form>

            <h2 id="endpoints-GETapi-employees-recents">Employees Recents</h2>

<p>
</p>

<p>Collection of recent employees. Recents are all active imployees plus any inactive employee with a termination date greater than 30 days ago.</p>

<span id="example-requests-GETapi-employees-recents">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/employees/recents?site=necessitatibus&amp;project=veniam&amp;department=consequatur&amp;position=fugiat" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/employees/recents"
);

const params = {
    "site": "necessitatibus",
    "project": "veniam",
    "department": "consequatur",
    "position": "fugiat",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-employees-recents"
               value="necessitatibus"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>project</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project"
               data-endpoint="GETapi-employees-recents"
               value="veniam"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project. Example ?project=%Pub%</p>
            </p>
                    <p>
                <b><code>department</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="department"
               data-endpoint="GETapi-employees-recents"
               value="consequatur"
               data-component="query" hidden>
    <br>
<p>Limit results to specific department. Example ?department=%Product%</p>
            </p>
                    <p>
                <b><code>position</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="position"
               data-endpoint="GETapi-employees-recents"
               value="fugiat"
               data-component="query" hidden>
    <br>
<p>Limit results to specific position. Example ?position=%Agente%</p>
            </p>
                </form>

            <h2 id="endpoints-GETapi-holidays">Holidays Dates</h2>

<p>
</p>

<p>Collection of holidays. If year is not especified in the query string, it will return all holidays for previous year, current year and futuristic holidays.</p>

<span id="example-requests-GETapi-holidays">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/holidays?year=et" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/holidays"
);

const params = {
    "year": "et",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>year</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="year"
               data-endpoint="GETapi-holidays"
               value="et"
               data-component="query" hidden>
    <br>
<p>Limit the results to a specific year. Default to previous year. Example ?year=2021.</p>
            </p>
                </form>

            <h2 id="endpoints-GETapi-overnight_hours">Overnight Hours</h2>

<p>
</p>

<p>Collection of all the overnight hours</p>

<span id="example-requests-GETapi-overnight_hours">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/overnight_hours?date=consequatur&amp;months=12&amp;days=20" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/overnight_hours"
);

const params = {
    "date": "consequatur",
    "months": "12",
    "days": "20",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>date</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="date"
               data-endpoint="GETapi-overnight_hours"
               value="consequatur"
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
               value="20"
               data-component="query" hidden>
    <br>
<p>Defines how many days back should the data limited to. Example ?days=2 will get data between current date and last two days.</p>
            </p>
                </form>

            <h2 id="endpoints-GETapi-notifications-unread">Notifications Unread</h2>

<p>
</p>

<p>Return a list of unread notifications for the authenticated user.</p>

<span id="example-requests-GETapi-notifications-unread">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/notifications/unread?max_items=2" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/notifications/unread"
);

const params = {
    "max_items": "2",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>max_items</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="max_items"
               data-endpoint="GETapi-notifications-unread"
               value="2"
               data-component="query" hidden>
    <br>
<p>Max amount of notifications to take. Default is 25.</p>
            </p>
                </form>

            <h2 id="endpoints-POSTapi-notifications-mark-all-as-read">Notifications Mark all as Read</h2>

<p>
</p>

<p>Cleans the unread notifications for the user</p>

<span id="example-requests-POSTapi-notifications-mark-all-as-read">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/notifications/mark-all-as-read?max_items=15" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/notifications/mark-all-as-read"
);

const params = {
    "max_items": "15",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>max_items</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="max_items"
               data-endpoint="POSTapi-notifications-mark-all-as-read"
               value="15"
               data-component="query" hidden>
    <br>
<p>Max amount of notifications to mark as read. Default is 25. This will also affect the amount of
unread notifications to return. Also, this will return the next batch of unread notifications for the authenticated user.</p>
            </p>
                </form>

            <h2 id="endpoints-GETapi-notifications-show--notification-">Notification Details</h2>

<p>
</p>

<p>Show details for a user notification. This will also mark the given notification as read.</p>

<span id="example-requests-GETapi-notifications-show--notification-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/notifications/show/illo" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/notifications/show/illo"
);

const headers = {
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>notification</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="notification"
               data-endpoint="GETapi-notifications-show--notification-"
               value="illo"
               data-component="url" hidden>
    <br>
<p>Uuid of the stored notification</p>
            </p>
                    </form>

        <h1 id="performances">Performances</h1>

    

            <h2 id="performances-GETapi-performances-clients">Performances Clients</h2>

<p>
</p>

<p>Collection of clients information</p>

<span id="example-requests-GETapi-performances-clients">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/performances/clients" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/performances/clients"
);

const headers = {
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                    </form>

            <h2 id="performances-GETapi-performances-projects">Performances Projects</h2>

<p>
</p>

<p>Collection of performances data for many months back.</p>

<span id="example-requests-GETapi-performances-projects">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/performances/projects" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/performances/projects"
);

const headers = {
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                    </form>

            <h2 id="performances-GETapi-performances-campaigns">Performances Campaigns</h2>

<p>
</p>

<p>Collection of camaigns information</p>

<span id="example-requests-GETapi-performances-campaigns">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/performances/campaigns" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/performances/campaigns"
);

const headers = {
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                    </form>

            <h2 id="performances-GETapi-performances-sites">Performances Sites</h2>

<p>
</p>

<p>Collection of employees' sites.</p>

<span id="example-requests-GETapi-performances-sites">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/performances/sites" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/performances/sites"
);

const headers = {
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                    </form>

            <h2 id="performances-GETapi-performances-supervisors">Performances Supervisors</h2>

<p>
</p>

<p>Collection of employees' supervisors.</p>

<span id="example-requests-GETapi-performances-supervisors">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/performances/supervisors" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/performances/supervisors"
);

const headers = {
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                    </form>

            <h2 id="performances-GETapi-performances-downtime_reasons">Performances Downtime Reasons</h2>

<p>
</p>

<p>Collection of downtime reasons</p>

<span id="example-requests-GETapi-performances-downtime_reasons">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/performances/downtime_reasons" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/performances/downtime_reasons"
);

const headers = {
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                    </form>

            <h2 id="performances-GETapi-performances-employees">Performances Employees</h2>

<p>
</p>

<p>Collection of employees formated for downtimes</p>

<span id="example-requests-GETapi-performances-employees">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/performances/employees?site=molestias&amp;project=tenetur&amp;department=numquam&amp;position=deserunt" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/performances/employees"
);

const params = {
    "site": "molestias",
    "project": "tenetur",
    "department": "numquam",
    "position": "deserunt",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-performances-employees"
               value="molestias"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>project</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project"
               data-endpoint="GETapi-performances-employees"
               value="tenetur"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project. Example ?project=%Santiago%</p>
            </p>
                    <p>
                <b><code>department</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="department"
               data-endpoint="GETapi-performances-employees"
               value="numquam"
               data-component="query" hidden>
    <br>
<p>Limit results to specific department. Example ?department=%Santiago%</p>
            </p>
                    <p>
                <b><code>position</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="position"
               data-endpoint="GETapi-performances-employees"
               value="deserunt"
               data-component="query" hidden>
    <br>
<p>Limit results to specific position. Example ?position=%Santiago%</p>
            </p>
                </form>

            <h2 id="performances-GETapi-performances-downtimes">Performances Downtimes</h2>

<p>
</p>

<p>Collection of dowtimes</p>

<span id="example-requests-GETapi-performances-downtimes">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/performances/downtimes?campaign=explicabo&amp;source=corporis&amp;employee=sit&amp;supervisor=in&amp;supervisor_employee=ab&amp;project_campaign=magnam&amp;project_employee=corporis&amp;site=minima&amp;client=qui" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/performances/downtimes"
);

const params = {
    "campaign": "explicabo",
    "source": "corporis",
    "employee": "sit",
    "supervisor": "in",
    "supervisor_employee": "ab",
    "project_campaign": "magnam",
    "project_employee": "corporis",
    "site": "minima",
    "client": "qui",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>campaign</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="campaign"
               data-endpoint="GETapi-performances-downtimes"
               value="explicabo"
               data-component="query" hidden>
    <br>
<p>Limit results to specific campaign. Example ?campaign=%Santiago%</p>
            </p>
                    <p>
                <b><code>source</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="source"
               data-endpoint="GETapi-performances-downtimes"
               value="corporis"
               data-component="query" hidden>
    <br>
<p>Limit results to specific source. Example ?source=%Santiago%</p>
            </p>
                    <p>
                <b><code>employee</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="employee"
               data-endpoint="GETapi-performances-downtimes"
               value="sit"
               data-component="query" hidden>
    <br>
<p>Limit results to specific employee. Example ?employee=%Santiago%</p>
            </p>
                    <p>
                <b><code>supervisor</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="supervisor"
               data-endpoint="GETapi-performances-downtimes"
               value="in"
               data-component="query" hidden>
    <br>
<p>Limit results to specific supervisor. Example ?supervisor=%Santiago%</p>
            </p>
                    <p>
                <b><code>supervisor_employee</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="supervisor_employee"
               data-endpoint="GETapi-performances-downtimes"
               value="ab"
               data-component="query" hidden>
    <br>
<p>Limit results to specific supervisor_employee. Example ?supervisor_employee=%Santiago%</p>
            </p>
                    <p>
                <b><code>project_campaign</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project_campaign"
               data-endpoint="GETapi-performances-downtimes"
               value="magnam"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project_campaign. Example ?project_campaign=%Santiago%</p>
            </p>
                    <p>
                <b><code>project_employee</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project_employee"
               data-endpoint="GETapi-performances-downtimes"
               value="corporis"
               data-component="query" hidden>
    <br>
<p>Limit results to specific project_employee. Example ?project_employee=%Santiago%</p>
            </p>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-performances-downtimes"
               value="minima"
               data-component="query" hidden>
    <br>
<p>Limit results to specific site. Example ?site=%Santiago%</p>
            </p>
                    <p>
                <b><code>client</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="client"
               data-endpoint="GETapi-performances-downtimes"
               value="qui"
               data-component="query" hidden>
    <br>
<p>Limit results to specific client. Example ?client=%Pub%</p>
            </p>
                </form>

            <h2 id="performances-GETapi-performances-login_names">Performances Login Names</h2>

<p>
</p>

<p>Return a collection of login names.</p>

<span id="example-requests-GETapi-performances-login_names">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/performances/login_names?recents=quis" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/performances/login_names"
);

const params = {
    "recents": "quis",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>recents</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="recents"
               data-endpoint="GETapi-performances-login_names"
               value="quis"
               data-component="query" hidden>
    <br>
<p>optional When present, only login names for employees labeled as recents will be included. Default is true. Example ?recents=true</p>
            </p>
                </form>

            <h2 id="performances-GETapi-performances-schedules">Performances Schedules</h2>

<p>
</p>

<p>Collection of employees' schedules, filtered by many days ago.</p>

<span id="example-requests-GETapi-performances-schedules">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/performances/schedules?daysago=2" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/performances/schedules"
);

const params = {
    "daysago": "2",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>daysago</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="daysago"
               data-endpoint="GETapi-performances-schedules"
               value="2"
               data-component="query" hidden>
    <br>
<p>The amount of days to filter back. Default 90. Example daysago=45</p>
            </p>
                </form>

            <h2 id="performances-GETapi-performances-supervisors-actives">Performances Active Supervisors</h2>

<p>
</p>

<p>Collection of employees' Actives supervisors.</p>

<span id="example-requests-GETapi-performances-supervisors-actives">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/performances/supervisors/actives" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/performances/supervisors/actives"
);

const headers = {
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                    </form>

            <h2 id="performances-GETapi-performances-performance_data-last--many--months">Performances Data</h2>

<p>
</p>

<p>Collection of performances data for many months back.</p>

<span id="example-requests-GETapi-performances-performance_data-last--many--months">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/performances/performance_data/last/3/months?campaign=explicabo&amp;employee=voluptates&amp;supervisor=tempore&amp;project_campaign=consequatur&amp;project_employee=reprehenderit&amp;site=sed&amp;source=voluptatem&amp;client=nobis&amp;supervisor_employee=quis" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/performances/performance_data/last/3/months"
);

const params = {
    "campaign": "explicabo",
    "employee": "voluptates",
    "supervisor": "tempore",
    "project_campaign": "consequatur",
    "project_employee": "reprehenderit",
    "site": "sed",
    "source": "voluptatem",
    "client": "nobis",
    "supervisor_employee": "quis",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
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
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
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
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>many</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="many"
               data-endpoint="GETapi-performances-performance_data-last--many--months"
               value="3"
               data-component="url" hidden>
    <br>
<p>The amount of months back to filter data. Example /performances/performance_data/last/3/months</p>
            </p>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>campaign</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="campaign"
               data-endpoint="GETapi-performances-performance_data-last--many--months"
               value="explicabo"
               data-component="query" hidden>
    <br>
<p>Filter data by campaign name. Example ?campaign=%POL-%.</p>
            </p>
                    <p>
                <b><code>employee</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="employee"
               data-endpoint="GETapi-performances-performance_data-last--many--months"
               value="voluptates"
               data-component="query" hidden>
    <br>
<p>Filter data by employee name. Example ?employee=%Yismen Jore%.</p>
            </p>
                    <p>
                <b><code>supervisor</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="supervisor"
               data-endpoint="GETapi-performances-performance_data-last--many--months"
               value="tempore"
               data-component="query" hidden>
    <br>
<p>Filter data by supervisor name. Example ?supervisor=%Yismen Jore%.</p>
            </p>
                    <p>
                <b><code>project_campaign</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project_campaign"
               data-endpoint="GETapi-performances-performance_data-last--many--months"
               value="consequatur"
               data-component="query" hidden>
    <br>
<p>Filter data by project_campaign name. Example ?project_campaign=%blackhawk%.</p>
            </p>
                    <p>
                <b><code>project_employee</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="project_employee"
               data-endpoint="GETapi-performances-performance_data-last--many--months"
               value="reprehenderit"
               data-component="query" hidden>
    <br>
<p>Filter data by project_employee name. Example ?project_campaign=%blackhawk%.</p>
            </p>
                    <p>
                <b><code>site</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="site"
               data-endpoint="GETapi-performances-performance_data-last--many--months"
               value="sed"
               data-component="query" hidden>
    <br>
<p>Filter data by site name. Example ?site=%Santiago HQ%.</p>
            </p>
                    <p>
                <b><code>source</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="source"
               data-endpoint="GETapi-performances-performance_data-last--many--months"
               value="voluptatem"
               data-component="query" hidden>
    <br>
<p>Filter data by source name. Example ?source=%Santiago HQ%.</p>
            </p>
                    <p>
                <b><code>client</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="client"
               data-endpoint="GETapi-performances-performance_data-last--many--months"
               value="nobis"
               data-component="query" hidden>
    <br>
<p>Filter data by client name. Example ?client=%blackhawk%.</p>
            </p>
                    <p>
                <b><code>supervisor_employee</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="supervisor_employee"
               data-endpoint="GETapi-performances-performance_data-last--many--months"
               value="quis"
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
