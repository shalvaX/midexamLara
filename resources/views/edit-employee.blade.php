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

        <form action="{{ route('employees.update', ['id' => $employee->id]) }}" method="POST">
            @csrf
            <ul>
                <li><input type="text" name="name" id="name" value="{{$employee->name}}"></li>
                <li><input type="text" name="lastname" id="lastname" value="{{$employee->lastname}}"></li>
                <li><input type="text" name="birthdate" id="birthdate" value="{{$employee->birthdate}}"></li>
                <li><input type="text" name="personal_id" id="personal_id" value="{{$employee->personal_id}}"></li>
                <li><input type="text" name="salary" id="salary" value="{{$employee->salary}}"></li>
                <li><button type="submit" style="background:grey;">Save</button></li>
            </ul>
        </form>
    </nav>
@endsection

