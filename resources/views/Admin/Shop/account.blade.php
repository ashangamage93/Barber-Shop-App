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
                <div>
                    <strong>Account</strong>
                    <small>Manage your appointments</small>
                </div>

                <div class="mt-5">
                    <a class="button" href="/shop/appointment/insert">
                        <span>Create Appointment</span>
                    </a>
                </div>
            </h2>
            <table class="table">
                <thead>
                <th scope="col">#</th>
                <th scope="col">Service</th>
                <th scope="col">User</th>
                <th scope="col">Customer</th>
                <th scope="col">Time Start</th>
                <th scope="col">Time End</th>
                <th scope="col">Operations</th>
                </thead>
                <tbody>
                @foreach ($list_appointment as $appointment)
                    <tr>
                        <th>{{ $appointment->id }}</th>
                        <td>{{ $appointment->name }}</td>
                        <td>{{ $appointment->user }}</td>
                        <td>{{ $appointment->customer }}</td>
                        <td class="inner-table">{{ $appointment->time_start }}</td>
                        <td class="inner-table">{{ $appointment->time_end }}</td>
                        <td class="inner-table">
                            <a href="{{ config('app.url')}}/shop/appointment/view/{{ $appointment->id }}">View</a>
                            <a href="{{ config('app.url')}}/shop/appointment/edit/{{ $appointment->id }}">Edit</a>
                            <a href="{{ config('app.url')}}/shop/appointment/delete/{{ $appointment->id }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>
@component('Admin.Component.footer_component')
@endcomponent
</body>
</html>
