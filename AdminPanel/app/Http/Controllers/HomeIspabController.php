<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Event;
use App\Models\Member;
use App\Models\Notice;
use App\Models\Gallery;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeIspabController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //Create Noctice Form call
    public function createNotice()
    {

        return view('notices.createNotice');
    }

    ///// store notice into database 
    public function storeNotice(Request $request)
    {
        //
        Auth::user()->notices()->create($request->all());
        return redirect('/listNotice');
    }
    //list all notice 
    public function listNotice()
    {

        $notices = Notice::all();
        return view('notices.listNotice', compact('notices'));
    }

    //Create News Form call
    public function createNews()
    {

        return view('newses.createNews');
    }

    ///// store notice into database 
    public function storeNews(Request $request)
    {
        //
        Auth::user()->newses()->create($request->all());
        return redirect('/listNews');
    }
    //list all notice 
    public function listNews()
    {

        $newses = News::all();
        return view('newses.listNews', compact('newses'));
    }

    //Create News Form call
    public function createService()
    {

        return view('services.createServices');
    }

    ///// store notice into database 
    public function storeService(Request $request)
    {
        //
        Service::create($request->all());
        return redirect('/listServices');
    }
    //list all notice 
    public function listServices()
    {

        $services = Service::all();
        return view('services.listServices', compact('services'));
    }

    //Create News Form call
    public function createEvent()
    {

        return view('events.createEvents');
    }

    ///// store notice into database 
    public function storeEvent(Request $request)
    {
        //
        Event::create($request->all());
        return redirect('/listEvents');
    }
    //list all notice 
    public function listEvent()
    {

        $events = Event::all();
        return view('events.listEvents', compact('events'));
    }

    /////memebre section start

    public function createMember()
    {

        return view('members.createMember');
    }

    ///// store notice into database 
    public function storeMember(Request $request)
    {
        //
        $imagePath = request('image')->store('profile_images', 'public');
        Member::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'image' => $imagePath,

        ]);
        return redirect('/listMembers');
    }
    //list all notice 
    public function listMembers()
    {

        $members = Member::all();
        return view('members.listMember', compact('members'));
    }

    ////member section finished
    ///gallery
    public function addImage()
    {
        return view('gallery.addImage');
    }

    public function gallery(Request $request)
    {

        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);
        $imagePath = request('image')->store('uploads', 'public');


        Gallery::create([
            'caption' => $request->caption,
            'image' => $imagePath,
        ]);
        return redirect('/listImages');
    }
    public function listImages()
    {

        $images = Gallery::all();

        return view('gallery.listImage', compact('images'));
    }
}
