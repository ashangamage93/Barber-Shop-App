<!DOCTYPE html>
<html lang="en" class="route-documentation">
@component('Admin.Component.head_component', ['title' => 'Auth | Profile'])
@endcomponent
<body class="layout-documentation page-overview">
@component('Admin.Component.nav_component')
@endcomponent
<div id="newsletter" class="bd-newsletter pt-6">
    <section class="bd-index-section bd-newsletter-box">
        <div class="bd-newsletter-heading">
            <h2 class="title has-text-black mb-0 is-size-2-widescreen">
                <div class="p-2">
                    <strong>Create Appointment</strong>
                    <small>Create your appointment</small>
                </div>
            </h2>

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
                    <form method="POST" action="{{ config('app.url')}}/shop/appointment/insert_appointment">
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
                                <label class="label">User Id</label>
                                <div class="select">
                                    <select name="user_id" class="input">
                                        @foreach ($list_users as $user)
                                            <option value="{{ $user->id }}">{{ $user->username }}</option>
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
                                   href="{{ config('app.url')}}/shop/account">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </section>
</div>
@component('Admin.Component.footer_component')
@endcomponent
</body>
</html>
