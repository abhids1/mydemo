<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
class HomeController extends Controller
{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware('auth');

    }

  

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

    public function index()

    {
        die("Home page INdex");
        return view('home');

    } 

  

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

    public function adminHome()
    {       
        return view('admin/home/dashboard');

    }
public function abc()
    {       die("ABC");
        return view('admin/home/dashboard');

    }
  

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

    public function managerHome()

    {

        return view('managerHome');

    }

}