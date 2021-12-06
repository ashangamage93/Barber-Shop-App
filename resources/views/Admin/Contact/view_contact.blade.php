@php
    $pageTitle = 'Empire Cuts | Admin';
    $sideBarComponent = 'contact';
    $title = 'View Contact';
    $description= 'This page view the contact '.$contact[0]->name;
    $url = 'contact';
    $view_component = 'view_contact';
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
                                    <input class="input" type="text" name="id" value="{{ $contact[0]->id }}">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Name</label>
                                <div class="control">
                                    <input class="input" type="text" name="name" value="{{ $contact[0]->name }}">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Telephone</label>
                                <div class="control">
                                    <input class="input" type="number" name="telephone" value="{{ $contact[0]->telephone }}">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Message</label>
                                <div class="control">
                                    <textarea  class="textarea" type="text" name="message">{{ $contact[0]->message }}</textarea>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Created</label>
                                <div class="control">
                                    <input class="input" type="text" name="created" value="{{ $contact[0]->created }}">
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


