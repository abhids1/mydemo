<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{

    /**
     *      * Display a listing of the prducts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$products = Product::all();
        //return view('products.index',compact('products'));
        return view('products.index');
    } 

    /**
     * Show the step One Form for creating a new product.
     * @return \Illuminate\Http\Response
     */

    public function createStepOne(Request $request)
    {
        $product = $request->session()->get('product');
        return view('products.create-step-one',compact('product'));
    }

    /**  
     * Post Request to store step1 info in session
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function postCreateStepOne(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:products',
            'amount' => 'required|numeric',
            'description' => 'required',
        ]);
        if(empty($request->session()->get('product'))){
            $product = new Product();
            $product->fill($validatedData);
            $request->session()->put('product', $product);
        }else{
            $product = $request->session()->get('product');
            $product->fill($validatedData);
            $request->session()->put('product', $product);
        }
        return redirect()->route('products.create.step.two');
    }  

    /**
     * Show the step One Form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */

    public function createStepTwo(Request $request)
    {
        $product = $request->session()->get('product');
        return view('products.create-step-two',compact('product'));
    }
    /**
     * Show the step One Form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */

    public function postCreateStepTwo(Request $request)
    {
        $validatedData = $request->validate([
            'stock' => 'required',
            'status' => 'required',
        ]);
        $product = $request->session()->get('product');
        $product->fill($validatedData);
        $request->session()->put('product', $product);
        return redirect()->route('products.create.step.three');
    }
    /**
     * Show the step One Form for creating a new product.
     * @return \Illuminate\Http\Response
     */
    public function createStepThree(Request $request)
    {
        $product = $request->session()->get('product');
        return view('products.create-step-three',compact('product'));
    }
    /**
     * Show the step One Form for creating a new product.
     *
     * @return \Illuminate\Http\Response
    */

    public function postCreateStepThree(Request $request)
    {
        $product = $request->session()->get('product');
        $product->save();
        $request->session()->forget('product');
        return redirect()->route('products.index');
    }








    /*
   AJAX request
   */
   public function getProducts(Request $request){

    ## Read value
    $draw = $request->get('draw');
    $start = $request->get("start");
    $rowperpage = $request->get("length"); // Rows display per page

    $columnIndex_arr = $request->get('order');
    $columnName_arr = $request->get('columns');
    $order_arr = $request->get('order');
    $search_arr = $request->get('search');

    $columnIndex = $columnIndex_arr[0]['column']; // Column index
    $columnName = $columnName_arr[$columnIndex]['data']; // Column name
    $columnSortOrder = $order_arr[0]['dir']; // asc or desc
    $searchValue = $search_arr['value']; // Search value

    // Total records
    $totalRecords = Product::select('count(*) as allcount')->count();
    $totalRecordswithFilter = Product::select('count(*) as allcount')->where('name', 'like', '%' .$searchValue . '%')->count();

    // Fetch records
    $records = Product::orderBy($columnName,$columnSortOrder)
      ->where('products.name', 'like', '%' .$searchValue . '%')
      ->select('products.*')
      ->skip($start)
      ->take($rowperpage)
      ->get();

    $data_arr = array();
    
    foreach($records as $record){
       $id = $record->id;
       $name = $record->name;
       $amount = $record->amount;
       $stock = $record->stock;

       $data_arr[] = array(
         "id" => $id,
         "name" => $name,
         "amount" => $amount,
         "stock" => $stock
       );
    }

    $response = array(
       "draw" => intval($draw),
       "iTotalRecords" => $totalRecords,
       "iTotalDisplayRecords" => $totalRecordswithFilter,
       "aaData" => $data_arr
    );

    echo json_encode($response);
    exit;
  
    }
}