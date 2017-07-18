@extends('layouts.master')

@section('Liburanku', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('content')

<!-- Form Pencarian -->
            <div class="col-md-12">
                <form class="form-inline" name="cari" action="caripacket" role="search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" name="search" placeholder="Search...">
                    <span class="input-group-btn">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> Search</button>
                         </span>
                     </span>
                 </div>
                 </form>
            </div>
        </div><br>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if($packetss)
                @foreach ($packetss as $packet)

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail" >
                            <img src="{{$packet->imageurl}}" class="img-responsive">
                            <div class="caption">
                                <div class="row">
                                    <div class="col-md-6 col-xs-6">
                                        <h3>{{$packet->name}}</h3>
                                    </div>
                                    <div class="col-md-6 col-xs-6 price">
                                        <h3>
                                            <label>${{$packet->price}}</label></h3>
                                    </div>
                                </div>
                                <p>{{$packet->description}}</p>
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="/addpacket/{{$packet->id}}" class="btn btn-success btn-packet"><span class="fa fa-shopping-cart"></span> Pesan Sekarang</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @else
                    
                    @foreach ($packets as $packet)

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail" >
                            <img src="{{$packet->imageurl}}" class="img-responsive " style="min-heigth:30px" >
                            <div class="caption">
                                <div class="row">
                                    <div class="col-md-6 col-xs-6">
                                        <h3>{{$packet->name}}</h3>
                                    </div>
                                    <div class="col-md-6 col-xs-6 price">
                                        <h3>
                                            <label>${{$packet->price}}</label></h3>
                                    </div>
                                </div>
                                <p>{{$packet->description}}</p>
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-4">
                                        <a href="/addpacket/{{$packet->id}}" class="btn btn-success btn-packet"><span class="fa fa-shopping-cart"></span> Booking Now</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


                @endif
            </div>
        </div>
    </div>

@endsection