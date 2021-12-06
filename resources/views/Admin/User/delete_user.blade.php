@php
    $pageTitle = 'Empire Cuts | Admin';
    $sideBarComponent = 'user';
    $title = 'Delete User';
    $description= 'This page delete the user '.$admin[0]->id;
    $url = 'user';
    $delete_component = 'delete_user';
@endphp
        <!DOCTYPE html>
<html lang="en" class="route-documentation">
@component('Admin.Component.head_component', ['title' => $title])
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
                    <form method="POST" action="{{ config('app.url')}}/admin/{{$url}}/{{$delete_component}}">
                        @csrf
                        <div class="form-input">
                            <div class="field">
                                <label class="label">Id</label>
                                <div class="control">
                                    <input class="input" type="text" name="id" value="{{ $admin[0]->id }}" readonly>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Username</label>
                                <div class="control">
                                    <input class="input" type="text" name="username" value="{{ $admin[0]->username }}"
                                           readonly>
                                </div>
                            </div>
                            <div class="field is-grouped mt-5">
                                <div class="control">
                                    <button class="button is-link" type="submit">Delete</button>
                                </div>
                                <div class="control">
                                    <a class="button is-link is-light"
                                       href="{{ config('app.url')}}/admin/{{$url}}">Cancel</a>
                                </div>
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



