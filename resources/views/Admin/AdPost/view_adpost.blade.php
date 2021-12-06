@php
    $pageTitle = 'Empire Cuts | Admin';
    $sideBarComponent = 'adpost';
    $title = 'View Ad Post';
    $description= 'This page view the ad post '.$adpost[0]->content;
    $url = 'adpost';
    $view_component = 'view_adpost';
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
            @component('Admin.Component.title_component', [
               'title' => $title,
               'description' => $description
            ])
            @endcomponent
            <div class="bd-docs-body">
                <div class="bd-docs-content bd-content algolia-content">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <article class="message is-warning mb-6">
                                <div class="message-header">
                                    <p>Warning</p>
                                </div>
                                <div class="message-body">
                                    {{ $error }}
                                </div>
                            </article>
                        @endforeach
                    @endif
                    <form method="POST" action="{{ config('app.url')}}/admin/{{ $url }}/{{ $view_component }}">
                        @csrf
                        <fieldset disabled>
                            <div class="form-input">
                                <div class="field">
                                    <label class="label">Id</label>
                                    <div class="control">
                                        <input class="input" type="text" name="id" value="{{ $adpost[0]->id }}">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Content</label>
                                    <div class="control">
                                        <input class="input" type="text" name="content"
                                               value="{{ $adpost[0]->content }}">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Time Start</label>
                                    <div class="control">
                                        <input class="input" type="datetime-local" name="time_start"
                                               value="{{ date('Y-m-d\TH:i:s', strtotime($adpost[0]->time_start)) }}">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Time End</label>
                                    <div class="control">
                                        <input class="input" type="datetime-local" name="time_end"
                                               value="{{ date('Y-m-d\TH:i:s', strtotime($adpost[0]->time_end)) }}">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="field is-grouped mt-5">
                            <div class="control">
                                <a class="button is-link is-light"
                                   href="{{ config('app.url')}}/admin/{{ $url }}">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
@component('Admin.Component.footer_component')
@endcomponent
</body>
</html>


