<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Country;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $country_id = $request->country_id;
        $current_address = $request->current_address == 'on' ? true : false;

        if ($current_address) {
            Address::where('user_id', Auth::id())->update(['current_address' => false]);
        }

        $address = Address::create([
            'user_id'         => Auth::id(),
            'country_id'      => $country_id,
            'current_address' => $current_address,
        ]);

        event(new Registered($address));

        Session::flash('message', 'Successfully created address!');

        return Redirect::to(url()->previous());
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Address $address
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Address $address
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        $countries = Country::All();

        return view('addresses.edit', compact('address', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Address      $address
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        $country = $request->country_id;
        $current_address = $request->current_address == 'on' ? true : false;
        if ($current_address) {
            Address::where('user_id', Auth::id())->update(['current_address' => false]);
        }
        $address->country_id = $country;
        $address->current_address = $current_address;
        $address->save();

        return Redirect::to('/students/'.$address->user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Address $address
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = Address::findOrFail($id);
        $address->delete();
        Session::flash('message', 'Successfully deleted address');

        return Redirect::to(url()->previous());
    }
}
