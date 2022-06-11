<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
//use Request;
use App\Models\Country;
use App\Models\Age;
use App\Models\User;
use App\Models\UserDetail;
use DB;
class UsersController extends Controller
{
    public function index(){
       // $users = User::find()->user_detail;
        $users = User::select('*')->with('user_detail','user_detail.country')->where([['is_admin', '=', 0]])->get();        
        $breadCrumb = ["Users List"];
        $ageList = Age::getAge()->toArray();           
        $countryList = DB::table('countries')->pluck('name','id')->toArray();        
        return view('admin/users/index',compact('users','breadCrumb','ageList','countryList'));
    }
    public function create()
    {
        $countryList = Country::getCountryData();
        $ageList = Age::getAge();                
        $skillsList = ["PHP","Java","Laravel","Cakephp","Node","Angular","Other"];
        $breadCrumb = ["Add User"];
        return view('admin/users/create',compact('countryList','ageList','skillsList','breadCrumb'));
    }

    public function store(Request $request)
    {
        //echo $method = $request->method();die;
        if ($request->isMethod('post')){
            $validatedData = $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'password' => 'required|min:5',
                'email' => 'required|email|unique:users',
                'contact_no' => 'required',
            ], [
                'first_name.required' => 'Name field is required.',
                'last_name.required' => 'Name field is required.',
                'password.required' => 'Password field is required.',
                'email.required' => 'Email field is required.',
                'email.email' => 'Email field must be email address.',
                'contact_no.required' => 'Contact field is required'
            ]);
            $password = bcrypt($validatedData['password']);
            $userId = User::insertGetId([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => $password,
            ]);
            if($userId > 0){
                UserDetail::insert([
                    'user_id' => $userId,
                    'country_id' => $request->country_id,
                    'age' => $request->age,
                    'contact_no' => $request->contact_no,
                    'skills' =>implode(',', $request->skills),
                ]);                
                return back()->with('success', 'User created successfully.');
            }            
        }
    }

    public function edit($id=null){
        //return true and false;
        //$users = User::select('*')->with('user_detail','user_detail.country')->where([['id', '=',5]])->exists();
         
        //return object;
        //$users = User::select('*')->with('user_detail','user_detail.country')->where([['id', '=',5]])->get(); 

        //return array;

        $countryList = Country::getCountryData();
        $ageList = Age::getAge();                
        $skillsList = ["PHP","Java","Laravel","Cakephp","Node","Angular","Other"];
        $breadCrumb = ["Edit User"];
        $user = User::select('*')->with('user_detail','user_detail.country')->where([['id', '=',5]])->first()->toArray();         
        return view('admin/users/edit',compact('user','countryList','ageList','skillsList','breadCrumb'));
        // dd($users);
        // //if($users->isEmpty()){


        // if($users->isEmpty()){
        //     die("empty");
        // }
        // else{
        //     die("not empty");
        // }


    }

    public function update(Request $request,$id=null){
        if ($request->isMethod('post')){
            $validatedData = $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'password' => 'required|min:5',
                'email' => 'required|email|unique:users',
                'contact_no' => 'required',
            ], [
                'first_name.required' => 'Name field is required.',
                'last_name.required' => 'Name field is required.',
                'password.required' => 'Password field is required.',
                'email.required' => 'Email field is required.',
                'email.email' => 'Email field must be email address.',
                'contact_no.required' => 'Contact field is required'
            ]);
        } 
    }
    public function form(){
        return view('admin/users/multi-step-form');
    }
    public function formSubmit(Request $request){
        return $request->all();
    }
}
