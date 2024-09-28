<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Return home page view
     */
    public function index(){
        $page_index = 'home';
        return view('pages.home',compact(['page_index']));
    }

    /**
     * Return about page view
     */
    public function about(){
        $page_index = 'about';
        $brTitle = "About RentaCar";
        $brDescription = "One of the best car sharing platform in BD";
        return view('pages.about',compact(['page_index','brTitle','brDescription']));
    }

    /**
     * Return the booking page
     */
    public function booking() {
        $page_index = 'booking';
        $brTitle = "Book your Best Car";
        $brDescription = "Just give some information and get a car";
        return view('pages.booking',compact(['page_index','brTitle','brDescription']));
    }

    /**
     * Return the booking page
     */
    public function contact() {
        $page_index = 'contact';
        $brTitle = "Get In Touch";
        $brDescription = "Just send your message, we're here to give you a hand";
        return view('pages.contact',compact(['page_index','brTitle','brDescription']));
    }

    /**
     * Return the car selection page
     */
    public function cars(){
        $page_index = 'car';
        $brTitle = "Find Your Car";
        $brDescription = "Find your prefer car for your bet tripe";
        return view('pages.cars',compact(['page_index','brTitle','brDescription']));
    }

    /**
     * Return the car details page
     */
    public function carDetails($id){
        $car = Car::find($id);
        $rents = Rental::where('start_date','>',date('d-m-Y'))->get();

        $page_index = 'car_details';
        $brTitle = "Car Details";
        $brDescription = "Rent this car with fair price";

        return view('pages.details',compact(['car','rents','page_index','brTitle','brDescription']));
    }

    /**
     * Return the login page 
     */
    public function register(){
        $page_index = 'register';
        $brTitle = "Good to see you";
        $brDescription = "Create your account and get a car for your tripe";
        return view('pages.register',compact(['page_index','brTitle','brDescription']));
    }

    /**
     * Return the login page 
     */
    public function login(){
        $page_index = 'login';
        $brTitle = "Let's Start";
        $brDescription = "Just login and rent a car in second";
        return view('pages.login',compact(['page_index','brTitle','brDescription']));
    }






    /**
     * Return admin login view
     */
    public function adminLoginView(){
        return view('pages.admin.login');
    }

    /**
     * Admin Dashboard view
     */
    public function adminDashboard(){
        $page_index = 'dashboard';
        $customer = User::where('role','customer')->count();
        $cars = Car::count();
        $available_car = Car::where('availability',1)->count();
        $rents = Rental::where('status','!=','Canceled')->count();
        $revenue = Rental::where('status','=','Completed')->sum('total_cost');
        return view('pages.admin.dashboard',compact(['page_index','cars','available_car','rents','revenue']));
    }
}
