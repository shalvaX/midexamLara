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
        @foreach($companies as $cp)

                <ul>
                    <li>{{$cp->name}}</li>
                    <li class="active">{{$cp->code}}</li>
                    <li>{{$cp->address}}</li>
                    <li>{{$cp->city}}</li>
                    <li>{{$cp->country}}</li>
                    <li><a href="/companies/{{$cp->id}}/edit" style="background-color:#bfb9b9; border-radius:5px; font-size:14px;color:white">Edit</a></li>
                    <form action="{{ route('companies.delete') }}" method="post">
                        @csrf
                        <input type="hidden" name="company_id" value="{{ $cp->id }}">

                        <button class="btn btn-danger" style="background-color:#bfb9b9; border-radius:5px; font-size:14px;color:white">Delete</button>
                    </form>
                </ul>

        @endforeach
            <form action="/companies/save" method="POST">
                @csrf
                <ul>
                    <li><input type="text" name="name" id="name"></li>
                    <li><input type="text" name="code" id="code"></li>
                    <li><input type="text" name="address" id="address"></li>
                    <li><input type="text" name="city" id="city"></li>
                    <li><input type="text" name="country" id="country"></li>
                    <li><button type="submit" style="background:grey;">Save</button></li>
                </ul>
            </form>
    </nav>
@endsection

