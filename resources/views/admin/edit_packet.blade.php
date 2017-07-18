@extends('layouts.master')

@section('New Packet', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('content')
	<div class="span3">
		<h2>Edit Paket</h2>
		<form method="POST" action="{{ route('proseseditpacket',['id'=>$editpacket->id])}}">
		{!! csrf_field() !!}
                <fieldset>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Name</label>
                        <div class="col-md-9">
                            <input id="name" name="name" type="text" placeholder="Packet name" class="form-control input-md" value="{{$editpacket->name}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="textarea">Description</label>
                        <div class="col-md-9">
                            <input class="form-control" id="textarea" name="description" value="{{$editpacket->description}}"></input>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="price">Price</label>
                        <div class="col-md-9">
                            <input id="price" name="price" type="text" placeholder="Packet price" class="form-control input-md" value="{{$editpacket->price}}">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="imageurl">Image URL</label>
                        <div class="col-md-9">
                            <input id="imageurl" name="imageurl" type="text" placeholder="Image URL" class="form-control input-md" value="{{$editpacket->imageurl}}">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="file">File Brochure</label>
                        <div class="col-md-9">
                            <input id="file" name="file" class="input-file" type="file">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="submit"></label>
                        <div class="col-md-9">
                            <button id="submit" value="Update Packet" name="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>

                </fieldset>
		</form>
	</div>
@endsection