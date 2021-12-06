@php
    $pageTitle = 'Empire Cuts | Admin';
    $sideBarComponent = 'service';
    $title = 'Edit Service';
    $description= 'This page edit the service '.$service[0]->id;
    $url = 'service';
    $update_component = 'edit_service';
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
                    <form method="POST" action="{{ config('app.url')}}/admin/{{ $url }}/{{ $update_component }}">
                        @csrf
                        <div class="form-input">
                            <div class="field">
                                <label class="label">Id</label>
                                <div class="control">
                                    <input class="input" type="text" name="id" value="{{ $service[0]->id }}" readonly>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Service Name</label>
                                <div class="control">
                                    <input class="input" type="text" name="name"
                                           value="{{ $service[0]->name }}">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Amount</label>
                                <div class="control">
                                    <input class="input" type="number" name="amount"
                                           value="{{ $service[0]->amount}}">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Status</label>
                                <div class="select">
                                    <select name="status">
                                        @if ($service[0]->status === "ENABLE")
                                            <option value="ENABLE" selected>ENABLE</option>
                                            <option value="DISABLE">DISABLE</option>
                                        @else
                                            <option value="ENABLE">ENABLE</option>
                                            <option value="DISABLE" selected>DISABLE</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">User Id</label>
                                <div class="select">
                                    <select name="user_id" class="input">
                                        @foreach ($list_users as $user)
                                            @if ($service[0]->user_id === $user->id)
                                                <option value="{{ $user->id }}" selected>{{ $user->username }}</option>
                                            @else
                                                <option value="{{ $user->id }}">{{ $user->username }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Sub Category</label>
                                <div class="select">
                                    <select name="sub_category_id" class="is-focused">
                                        @foreach ($list_sub_categories as $sub_category)
                                            @if ($service[0]->sub_category_id === $sub_category->id)
                                                <option value="{{ $sub_category->id }}" selected>{{ $sub_category->name }}</option>
                                            @else
                                                <option value="{{ $sub_category->id }}">{{ $sub_category->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Image</label>
                                <div class="select">
                                    <select name="image_id">
                                        @foreach ($list_images as $image)
                                            @if ($service[0]->user_id === $image->id)
                                                <option value="{{ $image->id }}" selected>{{ $image->image }}</option>
                                            @else
                                                <option value="{{ $image->id }}">{{ $image->image }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field is-grouped mt-5">
                            <div class="control">
                                <button class="button is-link" type="submit">Update</button>
                            </div>
                            <div class="control">
                                <a class="button is-link is-light" href="{{ config('app.url')}}/admin/{{ $url }}">Cancel</a>
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
