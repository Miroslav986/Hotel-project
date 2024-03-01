<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallery;


class HomeController extends Controller
{
    public function room_details($id) 
    {
        $active = 'rooms';
        $room = Room::find($id);

        return view('home.room_details',compact('room','active'));
    }

    public function add_booking(Request $request,$id) 
    {

       $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'startDate' => 'required|date',
            'endDate' => 'date|after:startDate' //validiramo da posetioc ne bi mogao da izabere isti datum kao pocetni. 

       ]); 

       $data = new Booking;
       
       $data->room_id = $id;
       $data->name = $request->name;
       $data->email = $request->email;
       $data->phone = $request->phone;



       $startDate = $request->startDate;
       $endDate = $request->endDate;
       $isBooked = Booking::where('room_id',$id)->where('start_date','<=',$endDate)->where('end_date','>=',$startDate)->exists();

       if($isBooked)
       {
          return redirect()->back()->with('message2','Room is alredy Booked, please try different date.');
  
       } else{

       $data->start_date = $request->startDate;
       $data->end_date = $request->endDate;

       $data->save();

       return redirect()->back()->with('message','Room Booked Successfully!');

       }       

    }

    public function contact(Request $request) 
    {
        $contact = new Contact;

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;

        $contact->save();

        return redirect()->back()->with('message','Message sent successfully.');
    }

    public function our_rooms() 
    {
        $active = 'rooms';
        $rooms = Room::all();
        return view('home.our_rooms',compact('rooms','active'));
    }

    public function hotel_gallery() 
    {
        $active = 'gallery';
        $gallery = Gallery::all();
        return view('home.hotel_gallery',compact('gallery','active'));
    }

    public function contact_us() 
    {
        $active = 'contact';
        $messages = Contact::all();
        return view('home.contact_us',compact('messages','active'));
    }


}
