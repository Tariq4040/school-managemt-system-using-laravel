<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title></title>
        @include('admin.backendBody.css_js_external_files.css_js')
    </head>

</head>

<body class="bg-light-gray" id="body">

<div class="container d-flex flex-column justify-content-between vh-100">
    <div class="row justify-content-center mt-5">
        <div class="col-xl-5 col-lg-6 col-md-10">
            <div class="card">
                <div class="card-header bg-primary">
                    <div class="app-brand">
                        <a href="{{ route('dashboard') }}">
                            <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid"
                                 width="30" height="33"
                                 viewBox="0 0 30 33">
                                <g fill="none" fill-rule="evenodd">
                                    <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z"/>
                                    <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z"/>
                                </g>
                            </svg>
                            <span class="brand-name">SMS Dashboard</span>
                        </a>
                    </div>
                </div>

                <div class="mb-4 text-sm text-gray-600">
                    Forgot your password? No problem. Just let us know your email address and we will email you a
                    password reset link that will allow you to choose a new one.
                </div>

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="card-body p-5">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row">
                            <div class="form-group col-md-12 mb-4">
                                <input type="email" name="email" class="form-control input-lg"
                                       placeholder="Email" required autofocus>
                            </div>
                            <button type="submit" class="btn btn-lg btn-primary btn-block mb-4">Email Password Reset
                                Link
                            </button>
                            <p>Remember account Password ?
                                <a class="text-blue" href="{{ route('login') }}">Sign In</a>
                            </p>
                        </div>
                </div>
                </form>
            </div>

        </div>
    </div>
</div>
<div class="copyright pl-0">
    <p class="text-center">&copy; 2022 Copyright by
        <a class="text-primary" href="#" target="_blank">Tariq Ahmad</a>.
    </p>
</div>
</div>
</body>
</html>
