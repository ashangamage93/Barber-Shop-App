<!DOCTYPE html>
<html lang="en" class="route-documentation">
@component('Admin.Component.head_component', [
   'title' => 'Auth | Sign Up'
])
@endcomponent
<body class="layout-documentation page-overview">
@component('Admin.Component.nav_component')
@endcomponent
<div id="newsletter" class="bd-newsletter pt-6">
    <section class="bd-index-section bd-newsletter-box">
        <div class="bd-newsletter-heading">
            <h2 class="title has-text-black mb-0 is-size-2-widescreen">
                <strong>Sign Up</strong>
                <small>You can create new account</small>
            </h2>

            <form method="POST" action="{{ config('app.url')}}/auth/sign_up_post">
                @csrf
                <div class="form-input">
                    <div class="field">
                        <label class="label">Username</label>
                        <div class="control has-icons-left has-icons-right">
                            <span class="icon is-small is-left">
                              <i class="fas fa-user"></i>
                            </span>
                            <input class="input" type="text" name="username">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">E-mail</label>
                        <div class="control has-icons-left has-icons-right">
                              <span class="icon is-small is-left">
                             <i class="fas fa-at"></i>
                            </span>
                            <input class="input" type="email" name="email">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Password</label>
                        <div class="control has-icons-left has-icons-right">
                              <span class="icon is-small is-left">
                              <i class="fas fa-key"></i>
                            </span>
                            <input class="input" type="password" name="password">
                        </div>
                    </div>
                </div>
                <div class="field is-grouped mt-5">
                    <div class="control">
                        <button class="button is-link" type="submit">Sign Up</button>
                    </div>
                    <div class="control">
                        <a class="button is-link is-light" href="{{ config('app.url')}}/auth/sign_in">Sign In</a>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

@component('Admin.Component.footer_component', [
              'title' => 'Edit Ad post'
           ])
@endcomponent

</body>
</html>
