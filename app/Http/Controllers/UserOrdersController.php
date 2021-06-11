<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserOrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('orderForUser')->only(['payment', 'show' , 'download']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orders.Orders');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.CreateOrder');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::with('orderDetails')->find($id);
        return view('orders.ShowOrder' ,compact('order') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
    public function destroy($id)
    {
        //
    }

    public function download($id , Request $request)
    {
        $file = str_replace('storage/','',json_decode($request->file));
        return Storage::disk('public')->download($file);
    }

    public function showPayment($id)
    {
        $order = Order::with('orderDetails')->find($id);
        return view('orders.Payment', compact('order'));
    }

    public function payment($id)
    {
        // in here you can do what ever you want for payment process
        // by default it just change the status
        Order::find($id)->update(['status_id'=> 3]);
    

        return redirect('/orders')->with('status' , __('payment was successful'));
    }
}
