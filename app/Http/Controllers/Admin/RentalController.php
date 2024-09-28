<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\Helper;
use App\Mail\NotificationMail;
use App\Models\Car;
use App\Models\CustomerDetail;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page_index = "rental";
        return view('pages.admin.rental',compact(['page_index']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( $id =null)
    {
        if($id !== null){
            return Rental::with('car','user','user.customer_detail')->find($id);
        }else{
            return Rental::with('car','user','user.customer_detail')->get();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

        /**
     * Delete user rents
     */
    public function cancel(Request $request){
        $rent = Rental::with('car')->where('user_id',$request->input('customer'))->where('id',$request->input('id'))->first();
        if($rent){
            try {
                DB::beginTransaction();
                Rental::where('id',$rent->id)->update([
                    'status' => 'Canceled'
                ]);

                $count = Rental::where('car_id',$rent->car_id)->where('end_date', '>', date("Y-m-d"))->get();
                $all = $count->filter(function($rent){
                    return $rent->status === 'Booked' || $rent->status === 'Ongoing';
                });

                $profile = CustomerDetail::where('user_id',$request->input('customer'))->first();

                if (count($all) < 1) {
                    Car::where('id',$rent->car_id)->update([
                        'availability' => 1
                    ]);
                }
                // admin email notification 
                Mail::to($profile->email)->send(new NotificationMail("Sorry! $profile->name Your rent has been canceled by admin","We are sorry for the inconvinence",$profile->name,$request->getBaseUrl().Storage::url($rent->car->image)));
                DB::commit();
                return Helper::response('Rents successfully Canceled',true,true,200);
            } catch (\Throwable $th) {
                DB::rollBack();
                return Helper::errors('Couldn\'t cancel the rent',$th->getMessage(),false,400);
            }
        }else{
            return Helper::errors('Unauthorized or rent id not found',false,false,400);
        }
    }
}
