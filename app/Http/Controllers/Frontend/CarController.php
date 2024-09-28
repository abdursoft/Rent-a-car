<?php

namespace App\Http\Controllers\Frontend;

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
     * Get the car paginator
     */
    public function carPaginator()
    {
        return Car::orderBy('daily_rent_price', 'asc')->paginate(
            $perPage = 8,
            $column = ['*'],
            $page_name = 'page'
        );
    }

    /**
     * Return the distinct car types
     */
    public function carTypes()
    {
        try {
            $types = Car::distinct()->get('car_type');
            return Helper::response('Successfully retrieved the car types', $types, true, 200);
        } catch (\Throwable $th) {
            Helper::errors('Couldn\'t retrived the car types', [], false, 400);
        }
    }

    /**
     * Return the distinct car brands
     */
    public function carBrands()
    {
        try {
            $types = Car::distinct()->get('brand');
            return Helper::response('Successfully retrieved the car brands', $types, true, 200);
        } catch (\Throwable $th) {
            Helper::errors('Couldn\'t retrived the car brands', [], false, 400);
        }
    }

    /**
     * Car search paginator 
     */
    public function searchPaginator(Request $request)
    {
        try {
            $brand = $request->input('brand');
            $type = $request->input('car_type');
            $price = $request->input('price');

            $items = 12;

            if (!empty($brand) && !empty($type) && !empty($price)) {
                return Car::where('car_type', $request->query('car_type'))
                    ->where('brand', $request->query('brand'))
                    ->where('daily_rent_price', '<=', $request->query('price'))->orderBy('daily_rent_price', 'asc')->paginate(
                        $perPage = $items,
                        $column = ['*'],
                        $page_name = 'page'
                    );
            } elseif (!empty($brand) && !empty($type)) {
                return Car::where('car_type', $request->query('car_type'))
                    ->where('brand', $request->query('brand'))->orderBy('brand', 'asc')->paginate(
                        $perPage = $items,
                        $column = ['*'],
                        $page_name = 'page'
                    );
            } elseif (!empty($brand) && !empty($price)) {
                return Car::where('brand', $request->query('brand'))
                    ->where('daily_rent_price', '<=', $request->query('price'))->orderBy('daily_rent_price', 'asc')->paginate(
                        $perPage = $items,
                        $column = ['*'],
                        $page_name = 'page'
                    );
            } elseif (!empty($type) && !empty($price)) {
                return Car::where('car_type', $request->query('car_type'))
                    ->where('daily_rent_price', '<=', $request->query('price'))->orderBy('daily_rent_price', 'asc')->paginate(
                        $perPage = $items,
                        $column = ['*'],
                        $page_name = 'page'
                    );
            } elseif (!empty($brand)) {
                return Car::where('brand', $request->query('brand'))->orderBy('brand', 'asc')->paginate(
                    $perPage = $items,
                    $column = ['*'],
                    $page_name = 'page'
                );
            } elseif (!empty($price)) {
                return Car::where('daily_rent_price', '<=', $request->query('price'))->orderBy('daily_rent_price', 'asc')->paginate(
                    $perPage = $items,
                    $column = ['*'],
                    $page_name = 'page'
                );
            } elseif (!empty($type)) {
                return Car::where('car_type', $request->query('car_type'))->orderBy('car_type', 'asc')->paginate(
                    $perPage = $items,
                    $column = ['*'],
                    $page_name = 'page'
                );
            } else {
                return Car::orderBy('daily_rent_price', 'asc')->paginate(
                    $perPage = $items,
                    $column = ['*'],
                    $page_name = 'page'
                );
            }
        } catch (\Throwable $th) {
            Helper::errors('Couldn\'t retrived the cars', [], false, 400);
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
            $profile = CustomerDetail::where('user_id',$request->header('id'))->first();
            if($profile){
                if ($days > 0) {
                    DB::beginTransaction();
                    $price = $car->daily_rent_price * $days;
                    Rental::create([
                        'user_id' => $request->header('id'),
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
