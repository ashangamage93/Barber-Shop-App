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
                    <strong>Edit Appointment</strong>
                    <small>Edit your appointment {{ $appointment[0]->id }}</small>
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
                    <form method="POST" action="{{ config('app.url')}}/shop/appointment/edit_appointment">
                        @csrf
                        <div class="form-input">
                            <div class="field">
                                <label class="label">Id</label>
                                <div class="control">
                                    <input class="input" type="text" name="id" value="{{ $appointment[0]->id }}" readonly>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Service</label>
                                <div class="select">
                                    <select name="service_id" class="is-focused">
                                        @foreach ($list_services as $service)
                                            @if ($appointment[0]->service_id === $service->id)
                                                <option value="{{ $service->id }}" selected>{{ $service->name }}</option>
                                            @else
                                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">User</label>
                                <div class="select">
                                    <select name="user_id">
                                        @foreach ($list_users as $user)
                                            @if ($appointment[0]->user_id === $user->id)
                                                <option value="{{ $user->id }}" selected>{{ $user->username }}</option>
                                            @else
                                                <option value="{{ $user->id }}">{{ $user->username }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Time Start</label>
                                <div class="control">
                                    <input class="input" type="datetime-local" name="time_start"
                                           value="{{ date('Y-m-d\TH:i:s', strtotime($appointment[0]->time_start)) }}">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Time End</label>
                                <div class="control">
                                    <input class="input" type="datetime-local" name="time_end"
                                           value="{{ date('Y-m-d\TH:i:s', strtotime($appointment[0]->time_end)) }}">
                                </div>
                            </div>
                        </div>
                        <div class="field is-grouped mt-5">
                            <div class="control">
                                <button class="button is-link" type="submit">Update</button>
                            </div>
                            <div class="control">
                                <a class="button is-link is-light" href="{{ config('app.url')}}/shop/account">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@component('Admin.Component.footer_component')
@endcomponent
</body>
</html>
