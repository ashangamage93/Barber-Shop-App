<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="/">
                Home
            </a>
        </div>

        <div class="navbar-end">
            <form method="POST" action="{{ config('app.url')}}/auth/sign_out_post">
                @csrf
                <div class="form-input">
                    @auth('users')
                        <div class="navbar-item">
                            <div class="buttons">
                                <button class="button is-sponsor" type="submit">
                                    <span>Sign Out</span>
                                </button>
                            </div>
                        </div>
                    @endauth

                    @auth('customers')
                            <div class="navbar-item">
                                <div class="buttons">
                                    <button class="button is-sponsor" type="submit">
                                        <span>Sign Out</span>
                                    </button>
                                </div>
                            </div>
                    @endauth

                    @guest('users')
                        @guest('customers')
                                <div class="navbar-item">
                                    <div class="buttons">
                                        <a class="button is-primary" href="/auth/sign_up">
                                            <strong>Sign up</strong>
                                        </a>
                                        <a class="button is-light" href="/auth/sign_in">
                                            Log in
                                        </a>
                                    </div>
                                </div>
                        @endguest
                    @endguest
                </div>
            </form>
        </div>
    </div>
</nav>
