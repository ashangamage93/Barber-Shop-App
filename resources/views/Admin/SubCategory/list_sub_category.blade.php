@php
    $pageTitle = 'Empire Cuts | Admin';
    $sideBarComponent = 'sub_category';
    $title = 'Sub Categories';
    $description= 'Here is a list of available sub categories';
    $url = 'sub_category';
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
                                <a class="button is-link is-light" href="{{ config('app.url')}}/admin/{{ $url  }}/insert">Create New Sub Category</a>
                            </div>
                            <table class="table">
                                <thead>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Category</th>
                                </thead>
                                <tbody>
                                @foreach ($list_sub_category as $sub_category)
                                    <tr>
                                        <th>{{ $sub_category->id }}</th>
                                        <td>{{ $sub_category->name }}</td>
                                        <td>{{ $sub_category->category }}</td>
                                        <td>
                                            <a href="{{ config('app.url')}}/admin/{{ $url  }}/view/{{ $sub_category->id }}">View</a>
                                            <a href="{{ config('app.url')}}/admin/{{ $url  }}/edit/{{ $sub_category->id }}">Edit</a>
                                            <a href="{{ config('app.url')}}/admin/{{ $url  }}/delete/{{ $sub_category->id }}">Delete</a>
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
