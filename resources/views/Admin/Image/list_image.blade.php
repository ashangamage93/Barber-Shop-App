@php
    $pageTitle = 'Empire Cuts | Admin';
    $sideBarComponent = 'image';
    $title = 'Images';
    $description= 'Here is a list of available images';
    $url = 'images';
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
                    <div class="flex-center position-ref full-height">
                        <div class="content">
                            @if((session()->get('content')) && (session()->get('title')) && (session()->get('type')))
                                @if(session()->get('type') === 'success')
                                    <article class="message is-success mb-6">
                                        <div class="message-header">
                                            <p>{{ session()->get('title') }}</p>
                                        </div>
                                        <div class="message-body">
                                            {{ session()->get('content') }}
                                        </div>
                                    </article>
                                @else
                                    <article class="message is-danger mb-6">
                                        <div class="message-header">
                                            <p>{{ session()->get('title') }}</p>
                                        </div>
                                        <div class="message-body">
                                            {{ session()->get('content') }}
                                        </div>
                                    </article>
                                @endif
                            @endif
                            <div class="control mb-6">
                                <a class="button is-link is-light" href="{{ config('app.url')}}/admin/{{ $url  }}/insert">Upload Image</a>
                            </div>
                            <table class="table">
                                <thead>
                                <th scope="col">#</th>
                                <th scope="col">Directory</th>
                                <th scope="col">Image</th>
                                <th scope="col">File</th>
                                <th scope="col">Operations</th>
                                </thead>
                                <tbody>
                                @foreach ($list_image as $image)
                                    <tr>
                                        <th>{{ $image->id }}</th>
                                        <td>{{ $image->directory }}</td>
                                        <td>{{ $image->image }}</td>
                                        <td> <img src="/image/{{ $image->directory }}/{{ $image->image }}" width="150"></td>
                                        <td>
                                            <a href="{{ config('app.url')}}/admin/{{ $url  }}/view/{{ $image->id }}">View</a>
                                            <a href="{{ config('app.url')}}/admin/{{ $url  }}/delete/{{ $image->id }}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
