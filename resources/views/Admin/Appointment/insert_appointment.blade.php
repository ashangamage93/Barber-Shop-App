@php
    $pageTitle = 'Empire Cuts | Admin';
    $sideBarComponent = 'appointment';
    $title = 'Create Appointment';
    $description= 'This page create new appointment';
    $url = 'appointment';
    $insert_component = 'insert_appointment';
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
                    <form method="POST" action="{{ config('app.url')}}/admin/{{ $url }}/{{ $insert_component }}">
                        @csrf
                        <div class="form-input">
                            <div class="field">
                                <label class="label">Service Id</label>
                                <div class="select">
                                    <select name="service_id" class="is-focused">
                                        @foreach ($list_services as $service)
                                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Admin Id</label>
                                <div class="select">
                                    <select name="user_id" class="input">
                                        @foreach ($list_users as $user)
                                            <option value="{{ $user->id }}">{{ $user->username }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Customer Id</label>
                                <div class="select">
                                    <select name="customer_id">
                                        @foreach ($list_customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->username }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Time Start</label>
                                <div class="control">
                                    <input class="input" type="datetime-local" name="time_start"
                                           value="{{ date('Y-m-d\TH:i:s', strtotime(old('time_start'))) }}">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Time End</label>
                                <div class="control">
                                    <input class="input" type="datetime-local" name="time_end"
                                           value="{{ date('Y-m-d\TH:i:s', strtotime(old('time_end'))) }}">
                                </div>
                            </div>
                        </div>
                        <div class="field is-grouped mt-5">
                            <div class="control">
                                <button class="button is-link" type="submit">Create</button>
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






