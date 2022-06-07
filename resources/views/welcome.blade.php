@extends('layouts.app')
@section('content')

<div class="container">
    <form action="{{ url('create') }}" method="POST">
        @csrf
    <label for="full name">
        <input type="text" name="name">
    </label>
    <label for="email>
        <input type="text" name="email">
    </label>
    <label for="password">
        <input type="text" name="password">
    </label>
    <label for="type">
        <input type="text" name="type">
    </label>
    <label for="role">
        <input type="text" name="role">
    </label>
    <input type="submit">
    </form>
</div>

@endsection