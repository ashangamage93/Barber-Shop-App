@php
    $pageTitle = 'Empire Cuts | Admin';
    $sideBarComponent = 'customer';
    $title = 'View Customer';
    $description= 'This page view the customer '.$customer[0]->username;
    $url = 'customer';
    $view_component = 'view_customer';
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
                    <fieldset disabled>
                        <div class="form-input">
                            <div class="field">
                                <label class="label">Id</label>
                                <div class="control">
                                    <input class="input" type="text" name="id" value="{{ $customer[0]->id }}">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Name</label>
                                <div class="control">
                                    <input class="input" type="text" name="username" value="{{ $customer[0]->username }}">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Email</label>
                                <div class="control">
                                    <input class="input" type="email" name="email" value="{{ $customer[0]->email }}">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Created</label>
                                <div class="control">
                                    <input class="input" type="text" name="created" value="{{ $customer[0]->created }}">
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
                </div>
            </div>
        </div>
    </main>
</div>
@component('Admin.Component.footer_component')
@endcomponent
</body>
</html>


