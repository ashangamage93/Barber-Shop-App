@php
    $pageTitle = 'Empire Cuts | Admin';
    $sideBarComponent = 'image';
    $title = 'Upload Image';
    $description= 'This page upload new image';
    $url = 'images';
    $insert_component = 'insert_image';
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
                    <form action="{{ config('app.url')}}/admin/{{ $url }}/{{ $insert_component }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-input">
                            <div class="field">
                                <label class="label">Directory</label>
                                <div class="select">
                                    <select name="directory">
                                        <option value="gallery">Gallery</option>
                                        <option value="service">Service</option>
                                    </select>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Name</label>
                                <div class="control">
                                    <input class="input" type="text" name="name"
                                           value="{{ old('image') }}">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Image</label>
                                <div class="control">
                                    <input type="file" name="image" class="button" >
                                </div>
                            </div>
                        </div>
                        <div class="field is-grouped mt-5">
                            <div class="control">
                                <button class="button is-link" type="submit">Upload</button>
                            </div>
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






