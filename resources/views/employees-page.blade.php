@extends('layouts.main')
@section('content')
    <nav>
        <ul>
            <li>Name</li>
            <li class="active">Lastname</li>
            <li>Birthdate</li>
            <li>Personal_id</li>
            <li>Salary</li>
        </ul>
    </nav>
    <nav>
        @foreach($employees as $emp)

            <ul>
                <li>{{$emp->name}}</li>
                <li>{{$emp->lastname}}</li>
                <li>{{$emp->birthdate}}</li>
                <li>{{$emp->personal_id}}</li>
                <li>{{$emp->salary}}</li>
                <li><a href="/employees/{{$emp->id}}/edit" style="background-color:#bfb9b9; border-radius:5px; font-size:14px;color:white">Edit</a></li>
                <form action="{{ route('employees.delete') }}" method="post">
                    @csrf
                    <input type="hidden" name="employee_id" value="{{ $emp->id }}">

                    <button class="btn btn-danger" style="background-color:#bfb9b9; border-radius:5px; font-size:14px;color:white">Delete</button>
                </form>
            </ul>

        @endforeach
        <form action="/employees/save" method="POST">
            @csrf
            <ul>
                <li><input type="text" name="name" id="name"></li>
                <li><input type="text" name="lastname" id="lastname"></li>
                <li><input type="text" name="birthdate" id="birthdate"></li>
                <li><input type="text" name="personal_id" id="personal_id"></li>
                <li><input type="text" name="salary" id="salary"></li>
                <li><button type="submit" style="background:grey;">Save</button></li>
            </ul>
        </form>
    </nav>
@endsection

