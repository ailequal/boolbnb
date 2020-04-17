<?php

namespace App\Http\Controllers\Account;

use App\User;
use App\Flat;
use App\Image;
use App\Message;
use App\Extra_service;
use App\Promo_service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class FlatController extends Controller
{

    private $validateRules;

    public function __construct(){

        $this->middleware('auth');

        $this->validateRules =[
        'title'=> 'required|string|max:255',
        'address'=> 'required|string|max:255',
        'rooms'=> 'required|numeric|integer',
        'mq'=> 'required|numeric|digits_between:1, 5|min:15',
        'cover'=> 'required|image',
        'guest'=> 'nullable|string|max:150',
        'description'=> 'required|string|max:501',
        'price_day'=> 'required|numeric|between:0,9999.99',
        'beds'=> 'required|numeric|integer',
        'bathrooms'=> 'required|numeric|integer',
        'hidden'=> 'required|boolean'
      ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flats = Flat::where('user_id', Auth::id())->get();
        return view('user.list', compact('flats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $extra_services = Extra_service::all();
        $promo_services = Promo_service::all();
        
        return view('user.create', compact('extra_services', 'promo_services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idUser = Auth::user()->id;
        $request->validate($this->validateRules);
        $data = $request->all();
        $path = Storage::disk('public')->put('images', $data['cover']);
        
        $newFlat = new Flat;
        $newFlat->user_id = $idUser;
        $newFlat->title = $data['title'];
        $newFlat->address = $data['address'];
        $newFlat->rooms = $data['rooms'];
        $newFlat->guest = $data['guest'];
        $newFlat->mq = $data['mq'];
        $newFlat->description = $data['description'];
        $newFlat->beds = $data['beds'];
        $newFlat->hidden = $data['hidden'];
        $newFlat->price_day = $data['price_day'];
        $newFlat->bathrooms = $data['bathrooms'];
        $newFlat->slug = Str::finish(Str::slug($newFlat->title), rand(1, 1000));
        $newFlat->cover = $path;
        $newFlat->lat = 237;
        $newFlat->long = 743;

        $saved = $newFlat->save();
        
        if(!$saved) {
            return redirect()->back();
        } 
        
        $extra = $data['extra_service'];
        if(!empty($extra)) {
            $newFlat->extra_service()->attach($extra);
        } 
        
        $promo = $data['promo_service'];
        if(!empty($promo)) {
            $newFlat->promo_service()->attach($promo);
        } 


        return redirect()->route('account.flats.show', $newFlat->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $flats = Flat::where('slug', $slug)->first();
        return view('show', compact('flats'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $flat = Flat::where('slug', $slug)->first();
        $extra_services = Extra_service::all();
        $promo_services = Promo_service::all();
        $data = [
            'flat'=> $flat,
            'extra_services'=> $extra_services,
            'promo_services'=> $promo_services
        ];
        return view('user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flat $flat)
    {
        if(empty($flat)) {
            abort(404);
        }
        if (Auth::id() !== $flat->user_id) {
            abort(500);
        }
        $flat->extra_service()->detach();
        $flat->promo_service()->detach();
        Storage::disk('public')->delete($flat->cover);
        $flat->delete();

        return redirect()->route('account.flats.index');
    }
}
