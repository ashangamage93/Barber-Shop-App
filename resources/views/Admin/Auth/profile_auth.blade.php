<!DOCTYPE html>
<html lang="en" class="route-documentation">
@component('Admin.Component.head_component', ['title' => 'Auth | Profile'])
@endcomponent
<body class="layout-documentation page-overview">
<div id="newsletter" class="bd-newsletter pt-6">
    <section class="bd-index-section bd-newsletter-box">
        <div class="bd-newsletter-heading">
            <h2 class="title has-text-black mb-0 is-size-2-widescreen">
                <strong>Profile</strong>
                @auth('users')
                    <small>auth admin</small>
                    <form method="POST" action="{{ config('app.url')}}/auth/sign_out_post">
                        @csrf
                        <button class="button is-sponsor is-light" type="submit">
                            <span>Sign Out</span>
                        </button>
                    </form>
                @endauth

                @auth('customers')
                    <small>auth customers</small>
                    <form method="POST" action="{{ config('app.url')}}/auth/sign_out_post">
                        @csrf
                        <button class="button is-sponsor is-light" type="submit">
                            <span>Sign Out</span>
                        </button>
                    </form>
                @endauth
                @guest('users')
                    @guest('customers')
                        <a class="button is-link is-light" href="/auth/sign_in">
                            <span>Sign In</span>
                        </a>
                    @endguest
                @endguest
            </h2>
        </div>
    </section>
</div>
@component('Admin.Component.footer_component')
@endcomponent
</body>
</html>
