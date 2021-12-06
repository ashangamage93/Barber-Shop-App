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
                    <strong>View Appointment</strong>
                    <small>View your appointment {{ $appointment[0]->name }}</small>
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
                        <fieldset disabled>
                            <div class="form-input">
                                <div class="field">
                                    <label class="label">Id</label>
                                    <div class="control">
                                        <input class="input" type="text" name="id" value="{{ $appointment[0]->id }}">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Service</label>
                                    <div class="control">
                                        <input class="input" type="text" name="id" value="{{ $appointment[0]->name }}">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">User</label>
                                    <div class="control">
                                        <input class="input" type="text" name="id" value="{{ $appointment[0]->user }}">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Customer</label>
                                    <div class="control">
                                        <input class="input" type="text" name="id"
                                               value="{{ $appointment[0]->customer }}">
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
                        </fieldset>
                        <div class="field is-grouped mt-5">
                            <div class="control">
                                <a class="button is-link is-light"
                                   href="{{ config('app.url')}}/shop/account">Cancel</a>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </section>
</div>
@component('Admin.Component.footer_component')
@endcomponent
</body>
</html>
