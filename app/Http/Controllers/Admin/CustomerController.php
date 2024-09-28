<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\Helper;
use App\Models\CustomerDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Customer index view
     */
    public function index(){
        $page_index = 'customer';
        return view('pages.admin.customer',compact('page_index'));
    }

    /**
     * Return the customer data
     */
    public function show($id=null){
        if($id){
            return User::with('customer_detail')->find($id);
        }else{
            return User::with('customer_detail')->where('role','customer')->get();
        }
    }

    /**
     * create new customer
     */
    public function customer(Request $request){
        $valicate = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:4'
        ]);

        if($valicate->fails()){
            return Helper::errors('Customer couldn\'t create',$valicate->errors(),false,400);
        }

        try {
            DB::beginTransaction();

            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'role' => 'customer',
                'password' => bcrypt($request->input('password')),
            ]);

            CustomerDetail::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'user_id' => $user->id,
            ]);
            DB::commit();
            return Helper::response('Customer Successfully created',true,true,201);

        } catch (\Throwable $th) {
            DB::rollBack();
            return Helper::errors('Customer couldn\'t create',$th->getMessage(),false,400);
        }
    }
}
