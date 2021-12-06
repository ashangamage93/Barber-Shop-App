<!DOCTYPE html>
<html lang="en" class="route-documentation">
@component('Admin.Component.head_component', ['title' => 'Auth | Sign In'])
@endcomponent
<body class="layout-documentation page-overview">
@component('Admin.Component.nav_component')
@endcomponent
<div id="newsletter" class="bd-newsletter pt-6">
    <section class="bd-index-section bd-newsletter-box">
        <div class="bd-newsletter-heading">
            @auth('users')
                <h2 class="title has-text-black mb-0 is-size-2-widescreen">
                    <div>
                        <strong>You are already sign in</strong>
                        <small>Go to the admin portal</small>
                    </div>

                    <div class="mt-5">
                        <a class="button" href="/admin/index">
                            <span>Admin</span>
                        </a>
                    </div>
                </h2>
            @endauth
            @auth('customers')
                <h2 class="title has-text-black mb-0 is-size-2-widescreen">
                    <div>
                        <strong>You are already sign in</strong>
                        <small>Go to the customer profile</small>
                    </div>

                    <div class="mt-5">
                        <a class="button" href="/shop/account">
                            <span>Customer Profile</span>
                        </a>
                    </div>
                </h2>
            @endauth
            @guest('users')
                @guest('customers')
                    <h2 class="title has-text-black mb-0 is-size-2-widescreen">
                        <strong>Sign In</strong>
                        <small>You must sign in with your username and password</small>
                    </h2>
                    <form method="POST" action="{{ config('app.url')}}/auth/sign_in_post">
                        @csrf
                        <div class="form-input">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    @if($error !== "Error")
                                        <div class="form-input">
                                            <div class="field">
                                                <article class="message is-danger mb-6">
                                                    <div class="message-header">
                                                        <p>Error</p>
                                                    </div>
                                                    <div class="message-body">
                                                        {{ $error }}
                                                    </div>
                                                </article>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            <div class="field">
                                <label class="label">Username</label>
                                <div class="control">
                                    <input class="input" type="text" name="username" value="{{ old('username') }}">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Password</label>
                                <div class="control">
                                    <input class="input" type="password" name="password" value="{{ old('password') }}">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Role</label>
                                <div class="select">
                                    <select aria-label="Role" name="role">
                                        <option value="admin">Admin</option>
                                        <option value="customer">Customer</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field is-grouped mt-5">
                            <div class="control">
                                <button class="button is-link" type="submit">Sign In</button>
                            </div>
                            <div class="control">
                                <a class="button is-link is-light" href="{{ config('app.url')}}/auth/sign_up">Sign
                                    Up</a>
                            </div>
                        </div>
                    </form>
                @endguest
            @endguest
        </div>
    </section>
</div>
@component('Admin.Component.footer_component')
@endcomponent
</body>
</html>
