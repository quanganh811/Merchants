<?php

namespace App\Http\Controllers;

use App\Models\Merchants;
use Request;
use Validator;
use Redirect;
use Session;


class MerchantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the sharks
        $merchants = merchants::all();

        // load the view and pass the sharks
        return view('merchants.index')
            ->with('merchants', $merchants);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('merchants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'address'      => 'required',
            'categories' => 'required|numeric'
        );
        $validator = Validator::make($request::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('Merchants/create')
                ->withErrors($validator)
                ->withInput($request::except('password'));
        } else {
            // store
            $merchants = new Merchants();
            $merchants->name       = $request::get('name');
            $merchants->address      = $request::get('address');
            $merchants->categories = $request::get('categories');
            $merchants->save();

            // redirect
            Session::flash('message', 'Successfully created merchant!');
            return Redirect::to('merchants');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Merchants  $merchants
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $merchants = Merchants::find($id);

         // show the view and pass the shark to it
         return view('merchants.show')
             ->with('merchants', $merchants);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Merchants  $merchants
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $merchants = Merchants::find($id);

         // show the view and pass the shark to it
         return view('merchants.edit')
             ->with('merchants', $merchants);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Merchants  $merchants
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'address'      => 'required',
            'categories' => 'required|numeric'
        );
        $validator = Validator::make(Request::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('merchants/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Request::except('password'));
        } else {
            // store
            $merchants = Merchants::find($id);
            $merchants->name       = Request::get('name');
            $merchants->address      = Request::get('address');
            $merchants->categories = Request::get('categories');
            $merchants->save();


            // redirect
            Session::flash('message', 'Successfully updated merchant!');
            return Redirect::to('merchants');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merchants  $merchants
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $merchants = Merchants::find($id);
        $merchants->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the merchant!');
        return Redirect::to('merchants');
    }
}
