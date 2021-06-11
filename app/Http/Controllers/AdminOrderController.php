<?php

namespace App\Http\Controllers;

use App\Http\Requests\adminSetCostRequest;
use App\Models\Order;
use App\Orders\DeleteOrder;
use App\Orders\SetCost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Orders');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::with(['orderDetails','user'])->find($id);
        return view('Admin.ShowOrder' ,compact('order') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orderId = $id;
        return view('Admin.EditOrder' , compact('orderId'));
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
    public function destroy($id,DeleteOrder $deleteOrder)
    {
        $deleteOrder->delete($id);
        return redirect('admin/orders')->with('status' , __('Deleting the order was successful'));
    }

    public function setCost($id)
    {
        return view('Admin.setCost' , ['order_id' => $id]);
    }

    public function storeCost($id , Order $order , adminSetCostRequest $request,SetCost $setCost)
    {
        $setCost->set($request->id, $request->cost, $request->date);
        return redirect('/admin/orders/'. $id)->with(['status'=> __('Pricing was successful') ]);
    }

    public function download($id , Request $request)
    {
        $file = str_replace('storage/','',json_decode($request->file));
        return Storage::disk('public')->download($file);
    }

    public function showReject($id)
    {
        return view('Admin.rejectOrder' , compact('id'));
    }

        
    public function reject($id, Request $request)
    {
        $reject = new \App\Orders\Reject;
        $reject->reject($id , $request->message);
        return redirect('/admin/orders')->with('status',__('rejecting the order was successful'));
    }
}