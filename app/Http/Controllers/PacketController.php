<?php

namespace App\Http\Controllers;

use App\Packet;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Request;
use Validator;

use Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Redirect;
use Datatables;


class PacketController extends Controller
{

    public function index(){
        $packets = Packet::all();
        return view('admin.packets',compact('packets'));
    }

    public function destroy($id){

        Packet::destroy($id);
        return redirect('/admin/packets');
    }

    public function newPacket(){
        return view('admin.new');
    }

    public function add(Request $request) {

        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));

        $entry = new \App\File();
        $entry->mime = $file->getClientMimeType();
        $entry->original_filename = $file->getClientOriginalName();
        $entry->filename = $file->getFilename().'.'.$extension;

        $entry->save();

        $packet  = new Packet();
        $packet->file_id=$entry->id;
        $packet->name =$request->input('name');
        $packet->description =$request->input('description');
        $packet->price =$request->input('price');
        $packet->imageurl =$request->input('imageurl');

        $packet->save();
		
		$this->validate($request, [
			'name' => 'required',
			'description' => 'required',
			'price' => 'required',
			'imageurl' => 'required',
			'file' => 'required|mimes:png,jpg,jpeg',
		]);

        return redirect('/admin/packets');
		
    }

    public function search(Request $request){
        $cari = $request->input('search');
               
        $packetss = Packet::where('name', 'LIKE', '%'.$cari.'%')->get();
        if(!empty($packetss)){
            return view('main.index',compact('packetss'));
        }
        else{
            return redirect()->back();
		}
	}

	public function tampilaneditpacket($id)
    {
        $packetz=Packet::find($id);
        return view('admin.edit_packet', ['editpacket'=>$packetz]);
    }

    public function editpacket(Request $request, $id)
    {
        $packetz=Packet::find($id);
        $packetz->name =$request->input('name');
        $packetz->description =$request->input('description');
        $packetz->price =$request->input('price');
        $packetz->imageurl =$request->input('imageurl');
        $packetz->save();

        $packetz=Packet::all();
        return redirect('/admin/packets');
    }
    
	public function data(Request $request)
    {
        // cek ajax request   
        if($request->ajax()){
            $packetzz = Packet::select('name', 'description', 'price', 'imageurl')->get();
            return Datatables::of($packetzz)
                    // tambah kolom untuk aksi edit dan hapus
                    ->addColumn('action', 
                    '<a href="#" title="Edit" class="btn-sm btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                    
                    <form style="display: inline">
                        <input name="_method" type="hidden" value="DELETE">
                        <input name="_token" type="hidden" value="{!! csrf_token() !!}">
                        <button class="btn-sm btn-danger" type="button" style="border: none"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                    </form>')
                    ->make(true);
        } else {
            exit("Not an AJAX request -_-");
        }
    }
    
    
}
