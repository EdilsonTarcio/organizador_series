<x-layout title="Login">
        <div class="row">
            <div class="col-md-6 p-5">
                <div class="mx-auto mb-5">
                </div>
                <h6 class="h5 mb-0 mt-4">Welcome back!</h6>
                <form class="authentication-form" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label">Email Address</label>
                        <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail icon-dual"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                </span>
                            </div>
                            <input type="email" class="form-control" name="email" id="email" placeholder="hello@coderthemes.com">
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <label class="form-control-label">Password</label>
                        <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock icon-dual"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                </span>
                            </div>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
                        </div>
                    </div>
                    <div class="form-group mb-0 text-center">
                        <button class="btn btn-primary btn-block" type="submit"> Log In
                        </button>
                    </div>
                    <br>
                    <div class="form-group mb-0 text-center">
                        <a href="{{ route('users.create') }}" class="btn btn-secondary btn-block" type="submit"> Registrar
                        </a>
                    </div>
                </form>
                
            </div>
    </div>
</x-layout>