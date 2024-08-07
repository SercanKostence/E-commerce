<?php
namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function PostContactDetails(Request $request) {
        $mobile_number = $request->input('mobil_number'); 
        $email = $request->input('email');
        $name = $request->input('name');
        $message = $request->input('message');
        date_default_timezone_set('UTC');
        $contact_time = date("h:i:sa");
        $contact_date = date("d-m-Y");

       
        $request->validate([
            'name' => 'required|string|max:255',
            'mobil_number' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $result = Contact::create([ 
            'mobile_number' => $mobile_number,
            'email' => $email,
            'name' => $name,
            'message' => $message,
            'contact_time' => $contact_time,
            'contact_date' => $contact_date
        ]);

        return response()->json(['status' => 1], 200);

        
    }
}
