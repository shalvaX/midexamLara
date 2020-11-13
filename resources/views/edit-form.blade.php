@extends('layouts.main')
@section('content')
    <nav>
        <ul>
            <li>Name</li>
            <li class="active">Code</li>
            <li>Address</li>
            <li>City</li>
            <li>Country</li>
        </ul>
    </nav>
    <nav>

        <form action="{{ route('companies.update', ['id' => $company->id]) }}" method="POST">
            @csrf
            <ul>
                <li><input type="text" name="name" id="name" value="{{$company->name}}"></li>
                <li><input type="text" name="code" id="code" value="{{$company->code}}"></li>
                <li><input type="text" name="address" id="address" value="{{$company->address}}"></li>
                <li><input type="text" name="city" id="city" value="{{$company->city}}"></li>
                <li><input type="text" name="country" id="country" value="{{$company->country}}"></li>
                <li><button type="submit" style="background:grey;">Save</button></li>

            </ul>
        </form>
    </nav>
    <a href="/companies/save">Create new</a>
@endsection

