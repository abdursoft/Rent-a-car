<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\Helper;
use App\Mail\NotificationMail;
use App\Models\Car;
use App\Models\CustomerDetail;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class RentalController extends Controller
{

    /**
     * Retun user rents view
     */
    public function rentsView(Request $request){
        $page_index = 'Rent History';
        $brTitle = "Your Rent list";
        $brDescription = "Your all rental history at all";

        $user = User::with('customer_detail')->find($request->header('id'));

        return view('pages.user.rents',compact(['page_index','brTitle','brDescription','user']));
    }

    /**
     * Return user rents list
     */
    public function getRents(Request $request){
        try {
            $profile = Rental::where('user_id',$request->header('id'))->get();
            return Helper::response('Rents successfully retrieved',$profile,true,200);
        } catch (\Throwable $th) {
            return Helper::errors('Rents couldn\'t found',$th->getMessage(),false,400);
        }
    }

    /**
     * Delete user rents
     */
    public function cancel(Request $request){
        $rent = Rental::with('car')->where('user_id',$request->header('id'))->where('id',$request->input('id'))->first();
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

                $profile = CustomerDetail::where('user_id',$request->header('id'))->first();

                if (count($all) < 1) {
                    Car::where('id',$rent->car_id)->update([
                        'availability' => 1
                    ]);
                }
                // admin email notification 
                Mail::to(env('MAIL_OF_ADMIN'))->send(new NotificationMail("Gah! $profile->name has cancel the rent","The car ".$rent->car->name." has lost a rent",$profile->name,$request->getBaseUrl().Storage::url($rent->car->image)));
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

    /**
     * Delete user rents
     */
    public function delete(Request $request, $id){
        $rent = Rental::where('user_id',$request->header('id'))->where('id',$id)->first();
        if($rent){
            $rent->delete();
            return Helper::response('Rents successfully deleted',true,true,200);
        }else{
            return Helper::errors('Unauthorized or rent id not found',false,false,400);
        }
    }
}
