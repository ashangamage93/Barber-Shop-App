<aside class="menu p-2">
    <p class="menu-label">
        General
    </p>
    <ul class="menu-list">
        @if($item === 'dashboard')
            <li><a class="is-active" href="{{ config('app.url')}}/admin/index">Dashboard</a></li>
        @else
            <li><a href="{{ config('app.url')}}/admin/index">Dashboard</a></li>
        @endif
    </ul>
    <p class="menu-label">
        Administration
    </p>
    <ul class="menu-list">
        @if($item === 'appointment')
            <li><a class="is-active" href="{{ config('app.url')}}/admin/appointment">Appointment</a></li>
        @else
            <li><a href="{{ config('app.url')}}/admin/appointment">Appointment</a></li>
        @endif
        @if($item === 'service')
            <li><a class="is-active" href="{{ config('app.url')}}/admin/service">Service</a></li>
        @else
            <li><a href="{{ config('app.url')}}/admin/service">Service</a></li>
        @endif
        @if($item === 'category')
            <li><a class="is-active" href="{{ config('app.url')}}/admin/category">Category</a></li>
        @else
            <li><a href="{{ config('app.url')}}/admin/category">Category</a></li>
        @endif
        @if($item === 'sub_category')
            <li><a class="is-active" href="{{ config('app.url')}}/admin/sub_category">Sub Category</a></li>
        @else
            <li><a href="{{ config('app.url')}}/admin/sub_category">Sub Category</a></li>
        @endif
    </ul>
    <p class="menu-label">
        Files
    </p>
    <ul class="menu-list">
        @if($item === 'image')
            <li><a class="is-active" href="{{ config('app.url')}}/admin/images">Image</a></li>
        @else
            <li><a href="{{ config('app.url')}}/admin/images">Image</a></li>
        @endif
    </ul>
    <p class="menu-label">
        Settings
    </p>
    <ul class="menu-list">
        @if($item === 'contact')
            <li><a class="is-active" href="{{ config('app.url')}}/admin/contact">Contact</a></li>
        @else
            <li><a href="{{ config('app.url')}}/admin/contact">Contact</a></li>
        @endif
        @if($item === 'event')
            <li><a class="is-active" href="{{ config('app.url')}}/admin/event">Event</a></li>
        @else
            <li><a href="{{ config('app.url')}}/admin/event">Event</a></li>
        @endif
        @if($item === 'post')
            <li><a class="is-active" href="{{ config('app.url')}}/admin/post">Post</a></li>
        @else
            <li><a href="{{ config('app.url')}}/admin/post">Post</a></li>
        @endif
        @if($item === 'customer')
            <li><a class="is-active" href="{{ config('app.url')}}/admin/customer">Customers</a></li>
        @else
            <li><a href="{{ config('app.url')}}/admin/customer">Customers</a></li>
        @endif
        @if($item === 'user')
            <li><a class="is-active" href="{{ config('app.url')}}/admin/user">Admins</a></li>
        @else
            <li><a href="{{ config('app.url')}}/admin/user">Admins</a></li>
        @endif
            @if($item === 'adpost')
                <li><a class="is-active" href="{{ config('app.url')}}/admin/adpost">Ad Post</a></li>

            @else
                <li><a href="{{ config('app.url')}}/admin/adpost">Ad Post</a></li>
            @endif
    </ul>
</aside>
