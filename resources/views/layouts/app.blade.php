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
                <a href="/" class="navbar-brand">Bula Central School</a>
            </div>
            <ul class="nav navbar-nav narbar-right">
                <li><a href="#login" class="btn btn-primary mx-2 rounded-pill" data-bs-toggle="modal"><span
                            class="fa fa-sign-in me-2"></span>Login</a></li>
                <li><a href="#signup" class="btn btn-primary mx-2 rounded-pill" data-bs-toggle="modal"><span
                            class="fa fa-user me-2"></span>Signup</a></li>
            </ul>
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
                <form action="">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-2">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter Email Address">
                        </div>
                        <div class="mb-2">
                            <label for="password">Password</label>
                            <input type="empasswordail" class="form-control" id="password" name="password"
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
                <form action="">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-2">
                            <div class="row">
                                <div class="col">
                                    <label for="type">*Create as:</label>
                                    <select name="type" id="typee" class="form-control form-select"
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
                            <label for="fname">*First Name</label>
                            <input type="text" class="form-control" id="fname" name="fname"
                                placeholder="Enter First Name">
                        </div>
                        <div class="mb-2">
                            <label for="mname">Middle Name</label>
                            <input type="text" class="form-control" id="mname" name="mname"
                                placeholder="Enter Middle Name">
                        </div>
                        <div class="mb-2">
                            <label for="lname">*Last Name</label>
                            <input type="text" class="form-control" id="lname" name="lname"
                                placeholder="Enter Last Name">
                        </div>
                        <div class="mb-2">
                            <label for="email">*Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter Email Address">

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
</body>

</html>
