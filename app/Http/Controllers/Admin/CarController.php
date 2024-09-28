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
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page_index = 'cars';
        return view('pages.admin.cars',compact(['page_index']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.car-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string',
            'brand' => 'required|unique:cars,brand',
            'model' => 'required',
            'year' => 'required',
            'car_type' => 'required',
            'price' => 'required',
            'availability' => 'required',
            'image' => 'required|file|mimes:jpeg,jpg,png'
        ]);
        if ($validate->fails()) {
            return Helper::errors('Couln\'t create new car', $validate->errors(), false, 400);
        }

        try {
            $image = Storage::disk('public')->put("uploads/" . date('Y') . "/" . date('F') . "/" . date('d'), $request->file('image'));

            Car::create([
                'name' => $request->input('name'),
                'brand' => $request->input('brand'),
                'model' => $request->input('model'),
                'year' => $request->input('year'),
                'car_type' => $request->input('car_type'),
                'daily_rent_price' => $request->input('price'),
                'availability' => $request->input('availability'),
                'image' => $image,
            ]);
            return Helper::response('Car successfully created',null,true,201);
        } catch (\Throwable $th) {
            return Helper::errors('Couln\'t create new car', $th->getMessage(), false, 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id=null)
    {
        if($id){
            return Car::find($id);
        }else{
            return Car::all();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::find($id);
        $page_index = 'cars';
        return view('pages.admin.car-edit',compact(['car','page_index']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        if($request->hasFile('image')){
            $validate = Validator::make($request->all(), [
                'name' => 'required|string',
                'brand' => 'required|unique:cars,brand,'.$request->input('car_id'),',id',
                'model' => 'required',
                'year' => 'required',
                'car_type' => 'required',
                'price' => 'required',
                'availability' => 'required',
                'image' => 'file|mimes:jpeg,jpg,png'
            ]);
        }else{
            $validate = Validator::make($request->all(), [
                'name' => 'required|string',
                'brand' => 'required|unique:cars,brand,'.$request->input('car_id'),',id',
                'model' => 'required',
                'year' => 'required',
                'car_type' => 'required',
                'price' => 'required',
                'availability' => 'required',
            ]);
        }
        if ($validate->fails()) {
            return Helper::errors('Couln\'t update the car', $validate->errors(), false, 400);
        }

        try {
            $exist = Car::find($request->input('car_id'));

            Car::where('id',$exist->id)->update([
                'name' => $request->input('name'),
                'brand' => $request->input('brand'),
                'model' => $request->input('model'),
                'year' => $request->input('year'),
                'car_type' => $request->input('car_type'),
                'daily_rent_price' => $request->input('price'),
                'availability' => $request->input('availability'),
                'image' =>$request->hasFile('image') ? (Storage::disk('public')->put("uploads/" . date('Y') . "/" . date('F') . "/" . date('d'), $request->file('image'))) : $exist->image
            ]);
            $request->hasFile('image') ? Storage::disk('public')->delete($exist->image) : null;
            return Helper::response('Car successfully updated',true,true,200);
        } catch (\Throwable $th) {
            return Helper::errors('Couln\'t create the car', $th->getMessage(), false, 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $car = Car::with('rental')->find($id);
            if($car->rental === null || count($car->rental) === 0){
                $car->delete();
                Storage::disk('public')->delete($car->image);
                return Helper::response('Car successfully Deleted',true,true,200);
            }else{
                return Helper::errors('Couln\'t delete the car, This car has some rents', $car, false, 400);
            }
        } catch (\Throwable $th) {
            return Helper::errors('Couln\'t delete the car', $th->getMessage(), false, 400);
        }
        
    }

    /**
     * Render the car analytics page
     */
    public function analytics(Request $request, $id){
        $car = Car::with('rental','rental.user.customer_detail')->find($id);
        // return response()->json($car);
        $completed = $car->rental->filter(function($rent){
            return $rent->status === 'Completed';
        });
        $ongoing = $car->rental->filter(function($rent){
            return $rent->status === 'Ongoing';
        });
        $booked = $car->rental->filter(function($rent){
            return $rent->status === 'Booked';
        });
        $total = Rental::where('car_id',$id)->where('status','=','Completed')->sum('total_cost');

        $page_index = "cars";
        return view('pages.admin.car-analytic',compact(['car','completed','ongoing','booked','total','page_index']));
    }


    
    /**
     * Rental by car
     */
    public function rentByCar($car){
        try {
            $rents = Car::with('rental','rental.user.customer_detail')->find($car);
            return Helper::response('Rental successfully retrieved',$rents,true,200);
        } catch (\Throwable $th) {
            return Helper::errors('Rental couldn\'t retrieved',false,false,400);
        }
    }

    /**
     * Return car by car type
     */
    public function getByType($type=null){
        try {
            $cars = Car::where('car_type',$type)->get();
            return Helper::response('Car successfully retrieved',$cars,true,200);
        } catch (\Throwable $th) {
            return Helper::response('Car couldn\'t found',false,false,400);
        }
    }


    /**
     * Check the car is available for book
     */
    public function carAvailability(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'start_date' => 'required',
            'end_date' => 'required',
            'car_id' => 'required|exists:cars,id'
        ]);

        if ($validate->fails()) {
            return Helper::errors('Car processing errors', $validate->errors(), false, 400);
        }

        $count = Rental::where('car_id',$request->input('car_id'))->where('end_date', '>', $request->input('start_date'))->get();
        $all = $count->filter(function($rent){
            return $rent->status === 'Booked' || $rent->status === 'Ongoing';
        });

        if (count($all) > 0) {
            return Helper::errors('This car is\'t available for the starting date', null, false, 400);
        }
        try {
            $car = Car::find($request->input('car_id'));
            $to = \Carbon\Carbon::parse($request->input('start_date'));
            $from = \Carbon\Carbon::parse($request->input('end_date'));
            $days = $to->diffInDays($from);
            $profile = CustomerDetail::where('user_id',$request->input('user_id'))->first();
            if($profile){
                if ($days > 0) {
                    DB::beginTransaction();
                    $price = $car->daily_rent_price * $days;
                    Rental::create([
                        'user_id' => $request->input('user_id'),
                        'car_id' => $car->id,
                        'days' => $days,
                        'start_date' => $request->input('start_date'),
                        'end_date' => $request->input('end_date'),
                        'total_cost' => $price
                    ]);
    
                    Car::where('id',$car->id)->update([
                        'availability' => 0
                    ]);
                    // user email notification 
                    Mail::to($profile->email)->send(new NotificationMail("Great! You booked this car for $days days","Thanks for stay with us, Be safe and have a safe journey",$profile->name,$request->getBaseUrl().Storage::url($car->image)));

                    // admin email notification 
                    Mail::to(env('MAIL_OF_ADMIN'))->send(new NotificationMail("Great! This car was booked for $days days","$profile->name has a rent for this car from $to, $from",$profile->name,$request->getBaseUrl().Storage::url($car->image)));

                    DB::commit();
                    return Helper::response("Great! You booked this car for $days days", true, true, 200);
                } else {
                    return Helper::errors('You couldn\'t book the car for 0 days', null, false, 400);
                }
            }else{
                return Helper::errors('Please update your customer profile', null, false, 400);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return Helper::errors('This car couldn\'t book for you', $th->getMessage(), false, 400);
        }
    }
}
