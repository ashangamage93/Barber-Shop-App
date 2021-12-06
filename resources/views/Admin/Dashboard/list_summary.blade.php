@php
    $pageTitle = 'Empire Cuts | Admin';
    $sideBarComponent = 'dashboard';
@endphp
        <!DOCTYPE html>
<html lang="en" class="route-documentation">
@component('Admin.Component.head_component', ['title' => $pageTitle])
@endcomponent
<body class="layout-documentation page-overview">
@component('Admin.Component.nav_component',  ['user' => $user])
@endcomponent
<div id="docs" class="bd-docs bd-is-contained">
    <nav id="docsNav" class="bd-docs-nav ">
        @component('Admin.Component.sidebar_component', ['item' => $sideBarComponent])
        @endcomponent
    </nav>
    <main class="bd-docs-main">
        <div class="container">
            <div class="bd-docs-body">
                <div class="bd-docs-content bd-content algolia-content">
                    <div class="flex-center position-ref full-height">
                        <div class="content">
                            <section class="hero is-link welcome is-small">
                                <div class="hero-body">
                                    <div class="container">
                                        <h1 class="title">
                                            @auth('users')
                                                Hello, {{ $user->username }}.
                                            @endauth
                                        </h1>
                                        <h4 class="subtitle">
                                            I hope you are having a great day!
                                        </h4>
                                    </div>
                                </div>
                            </section>
                            <section class="info-tiles mt-4">
                                <div class="tile is-ancestor has-text-centered">
                                    <div class="tile is-parent">
                                        <article class="tile is-child box">
                                            <p class="title">{{ $count_appointment }}</p>
                                            <p class="subtitle">Appointments</p>
                                        </article>
                                    </div>
                                    <div class="tile is-parent">
                                        <article class="tile is-child box">
                                            <p class="title">{{ $count_service }}</p>
                                            <p class="subtitle">Services</p>
                                        </article>
                                    </div>
                                    <div class="tile is-parent">
                                        <article class="tile is-child box">
                                            <p class="title">{{ $count_category }}</p>
                                            <p class="subtitle">Categories</p>
                                        </article>
                                    </div>
                                    <div class="tile is-parent">
                                        <article class="tile is-child box">
                                            <p class="title">{{ $count_sub_category }}</p>
                                            <p class="subtitle">Sub Categories</p>
                                        </article>
                                    </div>
                                </div>
                            </section>
                            <article class="panel is-link mt-4">
                                <p class="panel-heading">
                                    Reports
                                </p>
                                <a class="panel-block" href="{{ config('app.url')}}/admin/report/appointment/pdf">
                                    <span class="panel-icon">
                                      <i class="fas fa-book" aria-hidden="true"></i>
                                    </span>
                                    Appointment PDF
                                </a>
                                <a class="panel-block" href="{{ config('app.url')}}/admin/report/service/pdf">
                                    <span class="panel-icon">
                                      <i class="fas fa-book" aria-hidden="true"></i>
                                    </span>
                                    Service PDF
                                </a>
                                <a class="panel-block" href="{{ config('app.url')}}/admin/report/customer/pdf">
                                    <span class="panel-icon">
                                      <i class="fas fa-book" aria-hidden="true"></i>
                                    </span>
                                    Customer PDF
                                </a>
                                <a class="panel-block" href="{{ config('app.url')}}/admin/report/user/pdf">
                                    <span class="panel-icon">
                                      <i class="fas fa-book" aria-hidden="true"></i>
                                    </span>
                                    Admin PDF
                                </a>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@component('Admin.Component.footer_component')
@endcomponent
</body>
</html>
