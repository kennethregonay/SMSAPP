<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    {{--  SIGN UP / FORM --}}
    <h1> SIGN UP FORM </h1>
    <form action="{{ url('user/create') }}" method="post">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name">
        </div>
           @error('name')
            <p>{{ $message}}</p>
           @enderror 
        <div> 
            <label for="gender">Gender</label>
            <select name="gender" id="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
        <div>
            <label for="position">Position</label>
            <input type="text" name="position" id="position">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="password">password</label>
            <input type="password" name="password" id="password">
        </div>
        @error('password')
            <p>{{ $message}}</p>
           @enderror 
        <div>
            <label for="type">type</label>
            <select name="type" id="type">
                <option value="Teacher">Teacher</option>
                <option value="Principal">Principal</option>
            </select>
        </div>
        <input type="submit" value="Submit">
    </form>


      {{-- LOGIN FORM --}}
      <h2>LOGIN FORM</h2>
      <form action="user/login" method="POST">
          @csrf
        <div>
            <label for="name">Email</label>
            <input type="text" name="email" id="name">
        </div>
        <div>
            <label for="name">Password</label>
            <input type="password" name="password" id="password">
        </div>
            <input type="submit" value = "Submit">
      </form>

      {{-- ENLISTING FORM --}}
      <h2>ENROLLMENT FORM </h2>
      <form action="user/register" method="POST">
        @csrf
      <div>
          <label for="name">FullName</label>
          <input type="text" name="name" id="name">
      </div>
      <div>
          <label for="LRN">LRN</label>
          <input type="text" name="LRN">
      </div>
          <input type="submit" value = "Submit">
    </form>

{{--  --}}



</body>
</html>