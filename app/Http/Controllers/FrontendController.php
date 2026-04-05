<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Type;
use App\Models\Roomstatus;

class FrontendController extends Controller
{
    public function frontend(){
        $typeData = Type::where('status', 'active')->get();
        $satusData = Roomstatus::where('status', 'active')->get();
        $allRoomData = Room::get();
       return view('frontend.index',compact('typeData','satusData','allRoomData'));
    }
    public function frontendRoom(){
        $typeData = Type::where('status', 'active')->get();
        $satusData = Roomstatus::where('status', 'active')->get();
        $allRoomData = Room::get();
       return view('frontend.room',compact('typeData','satusData','allRoomData'));
    }

    public function frontendAbout(){
        return view('frontend.abount');
    }
    public function frontendContact(){
        return view('frontend.contact_us');
    }
}
