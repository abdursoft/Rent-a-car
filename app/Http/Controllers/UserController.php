<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\JWTAuth;
use App\Http\Controllers\Helper\Helper;
use App\Models\CustomerDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validator = Validator::make($request->all(), [
            "name" => "required|string",
            "email" => "required|email|unique:users,email",
            "password" => "required|string|min:6"
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                'message' => 'User registration failed',
                'errors' => $validator->errors()
            ], 400);
        }

        try {
            User::create(
                [
                    "name" => $request->input('name'),
                    "email" => $request->input('email'),
                    "role" => 'customer',
                    "password" => password_hash($request->input('password'), PASSWORD_DEFAULT)
                ]
            );
            return response([
                'status' => 'success',
                'message' => 'User registration successfull'
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => "fail",
                'message' => 'User registration failed',
                'errors' => $th->getMessage()
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
     * Login the user with jwt token
     */
    public function login(Request $request)
    {
        $validator = Validator(
            $request->all(),
            [
                'email' => 'required|email|exists:users,email',
                "password" => 'required'
            ]
        );

        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => 'fail',
                    'message' => "Authentication fail",
                    "errors" => $validator->errors()
                ],
                401
            );
        }

        $user = User::where('email', '=', $request->input('email'))->first();
        if($user){
            if(password_verify($request->input('password'), $user->password)){
                $token = JWTAuth::createToken('user',1,$user->id,$user->email,$user->role);
                return response()->json([
                    'status' => 'success',
                    'message' => 'Login successful',
                    'token' => $token
                ],200)->cookie($user->role."_token",$token,60,'/');
            }else{
                return response()->json([
                    'status' => 'fail',
                    'message' => 'Incorrect password'
                ],400);
            }
        }else{
            return response()->json([
                'status' => 'fail',
                'message' => 'Login failed'
            ],400);
        }
    }

    /**
     * User dashboard
     */
    public function dashboard(Request $request){
        $page_index = 'dashboard';
        $brTitle = "User Dashboard";
        $brDescription = "Welcome back, To your profile";

        $user = User::with('customer_detail')->find($request->header('id'));

        return view('pages.user.dashboard',compact(['page_index','brTitle','brDescription','user']));
    }

    /**
     * Create or update User profile
     */
    public function profile(Request $request){
        $validate = Validator::make($request->all(),[
            'email' => 'required|email|unique:customer_details,email,'.$request->header('id').',user_id',
            'name' => 'required',
            'phone' => 'required|min:11',
            'address' => 'required'
        ]);

        if($validate->fails()){
            return Helper::errors('Profile couldn\'t save',$validate->errors(),false,400);
        }

        try {
            CustomerDetail::updateOrCreate(
                [
                    "user_id" => $request->header('id')
                ],
                [
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'address' => $request->input('address'),
                    'rental_history' => null,
                    'user_id' => $request->header('id')
                ]
            );
            return Helper::response('Profile information successfully saved',true,true,200);
        } catch (\Throwable $th) {
            return Helper::errors('Profile couldn\'t save',$th->getMessage(),false,400);
        }
    }

    /**
     * Get user profile data
     */
    public function profileView(Request $request){
        try {
            $profile = CustomerDetail::where('user_id',$request->header('id'))->first();
            return Helper::response('Profile successfully retrieved',$profile,true,200);
        } catch (\Throwable $th) {
            return Helper::errors('Profile couldn\'t found',$th->getMessage(),false,400);
        }
    }


    /**
     * User logout
     */
    public function logOut(Request $request){
        $request->headers->set('customer_token' , null);
        return redirect('/login')->with('success','You have successfully logout')->cookie('customer_token','',-10,'/');
    }

    /**
     * User logout
     */
    public function adminLogOut(Request $request){
        $request->headers->set('admin_token' , null);
        return redirect('/admin/login')->with('message','You have successfully logout')->cookie('admin_token','',-10,'/');
    }
}