@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                           
                        </div>
                    @endif

                    You are logged in Admin!
                </div>
                <table>
                    <thead>
                        <tr>
                            <th width="5"> No.</th>
                            <th> Member Name</th>
                            <th> Member Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $row =>$value)
                        <tr>
                            <td> {{$row+1}}</td>
                            <td> {{$value->name}}</td>
                            <td> {{$value->email}}</td>
                        </tr>
                         @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
