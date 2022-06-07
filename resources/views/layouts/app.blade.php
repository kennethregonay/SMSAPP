<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SMS</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <div class="navbar-header">
                <img src="{{ asset('img/logo.png') }}" class="rounded-circle" style="width: 50px;">
                <a href="/" class="navbar-brand">Bula Central School</a>
            </div>
            @auth
                {{-- Index Navbar --}}
                <ul class="nav navbar-nav narbar-right">
                    <li><a href="#login" class="btn btn-primary mx-2 rounded-pill" data-bs-toggle="modal"><span
                                class="fa fa-sign-in me-2"></span>Login</a></li>
                    <li><a href="#signup" class="btn btn-primary mx-2 rounded-pill" data-bs-toggle="modal"><span
                                class="fa fa-user me-2"></span>Signup</a></li>
                </ul>
            @else
                {{-- Dashboard Navbar --}}
                <ul class="nav navbar-nav me-auto">
                    <li class="nav-item">
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">Section Management</a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item"><a href="{{ url('section') }}"
                                    class="text-decoration-none text-black">Sectioning</a></li>
                            <li class="dropdown-item"><a href="{{ url('masterlist') }}"
                                    class="text-decoration-none text-black">Master
                                    List</a></li>
                        </ul>
                    </li>
                    </li>
                    <li class="nav-item"><a href="{{ url('brigada') }}" class="nav-link">Brigada</a></li>
                    <li class="nav-item"><a href="{{ url('noticeboard') }}" class="nav-link">Notice Board</a></li>
                    <li class="nav-item"><a href="{{ url('registerformlist') }}" class="nav-link">Register
                            Management</a>
                    </li>
                    <li class="nav-item">
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">Account Management</a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item"><a href="{{ url('account') }}"
                                    class="text-decoration-none text-black">Account</a>
                            </li>
                            <li class="dropdown-item"><a href="{{ url('request') }}"
                                    class="text-decoration-none text-black">Request</a>
                            </li>
                        </ul>
                    </li>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                            {{-- {{ Auth()->user()->name }} --}}
                        </a>
                        <ul class="dropdown-menu" style="width: 100%">
                            <li class="dropdown-item"><a href="#" class="text-decoration-none text-black">Profile</a>
                            </li>
                            <form action="{{ url('user/logout') }}" method="POST">
                                @csrf
                                <input type="submit" value="Logout">
                            </form>
                        </ul>
                    </li>
                </ul>
            @endauth


        </div>
    </nav>


    @yield('content')

    <div class="modal" id="login">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Login Account</h2>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="user/login" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-2">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter Email Address">
                        </div>
                        <div class="mb-2">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter Password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit" data-bs-dismiss="modal">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal" id="signup">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Signup</h2>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="user/create" method="POST">
                    @csrf
                    <div class="modal-body">
                        @csrf
                        <div class="mb-2">
                            <div class="row">
                                <div class="col">
                                    <label for="type">* Create as:</label>
                                    <select name="type" id="type" class="form-control form-select"
                                        onchange="changefunc(this.value)">
                                        <option selected hidden></option>
                                        <option value="Teacher">Teacher</option>
                                        <option value="Parent">Parent</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="type">Position:</label>
                                    <select id="position" name="position" class="form-control form-select">
                                        <option selected hidden></option>
                                        <option value="Teacher I">Teacher I</option>
                                        <option value="Teacher II">Teacher II</option>
                                        <option value="Teacher III">Teacher III</option>
                                        <option value="Master Teacher I">Master Teacher I</option>
                                        <option value="Master Teacher II">Master Teacher II</option>
                                        <option value="Master Teacher III">Master Teacher III</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="row">
                                <div class="col">
                                    <label for="fullName">* Full Name</label>
                                    <input type="text" class="form-control" id="fullName" name="name"
                                        placeholder="Enter your Full Name">
                                </div>
                                <div class="col">
                                    <label for="gender">Gender</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option selected hidden></option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="email">*Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter Email Address">
                        </div>
                        <div class="mb-2">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit" data-bs-dismiss="modal">Signup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function changefunc(value) {
            if (value == "Parent") {
                document.getElementById("position").disabled = true;
            } else {
                document.getElementById("position").disabled = false;
            }
        }
    </script>

{{-- @if ($errors->any())
{
    <p>{{ $message }}</p>
}
@endif --}}
</body>


</html>
