@extends('layouts.master')

@section('Liburanku', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Your Bookings</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th class="col-sm-2">Id</th>
                    <th class="col-sm-4">Order Date</th>
                    <th class="col-sm-2"></th>
                </tr>
                </thead>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{$booking->id}}</td>
                        <td><a href="/booking/{{$booking->id}}"> {{$booking->created_at}}</a></td>
                        <td><a href="/booking/{{$booking->id}}"><i class="fa fa-search-plus"></i></a></td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
@endsection