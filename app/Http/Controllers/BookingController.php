<?php

namespace App\Http\Controllers;

use App\BookingItem;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use App\Cart;
use App\Booking;
use App\CartItem;


class BookingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkout(Request $request)
    {
        $token = $request->input('stripeToken');

        //Retriieve cart information
        $cart = Cart::where('user_id',Auth::user()->id)->first();
        $items = $cart->cartItems;
        $total=0;
        foreach($items as $item){
            $total+=$item->packet->price;
        }


        if(
            Auth::user()->charge($total*100, [
            'source' => $token,
            'receipt_email' => Auth::user()->email,
        ])){

            $booking = new Booking();
            $booking->total_paid= $total;
            $booking->user_id=Auth::user()->id;
            $booking->save();

            foreach($items as $item){
                $bookingItem = new BookingItem();
                $bookingItem->booking_id=$booking->id;
                $bookingItem->packet_id=$item->packet->id;
                $bookingItem->file_id=$item->packet->file->id;
                $bookingItem->save();

                CartItem::destroy($item->id);
        }
            return redirect('/booking/'.$booking->id);

        }else{
            return redirect('/cart');
        }

    }

    public function index(){
        $bookings = Booking::where('user_id',Auth::user()->id)->get();

        return view('booking.list',['bookings'=>$bookings]);
    }

    public function viewbooking($bookingId){
        $booking = Booking::find($bookingId);
        return view('booking.view',['booking'=>$booking]);
    }


    public function download($bookingId,$filename){

        $fileid=\App\File::where('filename',$filename)->first();

        $bookingItem = BookingItem::where('booking_id','=',$bookingId)->where('file_id',$fileid->id)->first();


        if(!$bookingItem){
            redirect('/failed');
        }

        $entry = \App\File::where('filename',$filename)->first();
        $file = Storage::disk('local')->get($entry->filename);

        return (new Response($file, 200))
            ->header('Content-Type', $entry->mime);

    }
}
