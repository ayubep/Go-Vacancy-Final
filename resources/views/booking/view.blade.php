@extends('layouts.master')

@section('Digital shop', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h3>booking num : {{$booking->id}}</h3>
            <h3>Made on : {{$booking->created_at}}</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th class="col-sm-4">Name</th>
                    <th class="col-sm-4">File</th>
                    <th class="col-sm-2">Price</th>
                </tr>
                </thead>
                @foreach($booking->bookingItems as $item)
                    <tr>
                        <td>{{$item->packet->name}}</td>
                        <td><a href="/download/{{$booking->id}}/{{$item->file->filename}}"> {{$item->file->filename}}</a></td>
                        <td>$ {{number_format($item->packet->price,2,',','')}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection