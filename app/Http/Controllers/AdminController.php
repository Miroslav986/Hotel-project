<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Gallery;
use App\Models\Contact;
use Notification;
use App\Notifications\SendEmailNotification;



class AdminController extends Controller
{
    public function index() 
    {
       if(Auth::id()){


            $usertype = Auth()->user()->usertype;
            if($usertype == 'user')
            {   
                $active = 'home';
                $gallery = Gallery::all();
                $rooms = Room::all();
                return view('home.index',compact('rooms','gallery','active'));
            }
            else if($usertype == 'admin')
            {
                return view('admin.index');
            }

            else
            {
                return redirect()->back();
            }
           
        }
        
    }

    public function home()
    {
        $active = 'home';
        $gallery = Gallery::all();
        $rooms = Room::all();
        return view('home.index',compact('rooms','gallery','active'));
    }


    public function create_room() 
    {

        return view ('admin.create_room');

    }

    public function add_room(Request $request)
    {
        $room = new Room;

        $room->room_title = $request->title;
        $room->description = $request->description;
        $room->price = $request->price;
        $room->wifi = $request->wifi;
        $room->room_type = $request->type;

        $image = $request->image;
        if($image)
        {
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('room',$imageName);
            $room->image = $imageName;
        }
        
        $room->save();

        return redirect()->back();
        
    }
    public function view_room() 
    {

        $rooms = Room::all();    
        return view('admin.view_room',compact('rooms'));
    }

    public function room_delete($id)
    {
        $room = Room::find($id);

        $room->delete();

        return redirect()->back();
    }

    public function room_update($id)
    {
        $room = Room::find($id);
        return view('admin.update_room',compact('room'));
    }

    public function edit_room(Request $request,$id)
    {
        $data = Room::find($id);

        $data->room_title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->wifi = $request->wifi;
        $data->room_type = $request->type;
        $image = $request->image;

        if($image) 
        {
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('room',$imageName);
            $data->image = $imageName;
        }

        $data->save();

        return redirect()->back();

    }

    public function bookings()
    {

        $data = Booking::all();
        return view('admin.booking',compact('data'));
    }

    public function delete_booking($id)
    {
        $data = Booking::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function approve_book($id) 
    {
        $booking = Booking::find($id);
        $booking->status = 'approve';
        $booking->save();

        return redirect()->back();
    }

    public function reject_book($id) 
    {
        $booking = Booking::find($id);
        $booking->status = 'reject';
        $booking->save();

        return redirect()->back();

    }

    public function view_gallery()
    {
        $gallery = Gallery::all();
        return view('admin.gallery',compact('gallery'));
    }

    public function upload_gallery(Request $request) 
    {
        $data = new Gallery;

        $image = $request->image;

        if($image)
        {
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('gallery',$imageName);
            $data->image = $imageName;
            $data->save();

            return redirect()->back();
        }
    }

    public function delete_image($id) 
    {
        $image = Gallery::find($id);
        $image->delete();
        return redirect()->back();
    }

    public function all_messages()
    {
        $messages = Contact::all();
        return view('admin.all_message',compact('messages'));
    }

    public function delete_message($id) 
    {
        $message = Contact::find($id);
        $message->delete();

        return redirect()->back();
    }

    public function send_email(Request $request,$id) 
    {
        $data = Contact::find($id);

        return view('admin.send_email',compact('data'));
    }

    public function email(Request $request,$id) 
    {
        $data = Contact::find($id);
        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'action_text' => $request->action_text,
            'action_url' => $request->action_url,
            'end_line' => $request->end_line,

        ];

        Notification::send($data,new SendEmailNotification($details));

        return redirect()->back()->with('message','Send Email Successfully.');

    }


}
