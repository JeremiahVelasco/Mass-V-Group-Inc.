<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batteries;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    public function home()
    {
        $manufacturers=['ALFA ROMEO', 'ACURA', 'AUDI', 'BENTLEY', 'BMW', 'BUILD YOUR DREAM (BYD)', 'CHERRY CARS', 
            'CHEVROLET', 'CHRYSLER', 'DAEWOO', 'DAIHATSU', 'DODGE', 'FERRARI', 'FIAT UNO', 'FORD', 'FOTON',
            'GAC (Legado Motors)', 'GEELY', 'HAIMA', 'HONDA', 'HYUNDAI', 'ISUZU', 'JAGUAR', 'KIA', 'LAMBORGHINI',
            'LAND ROVER', 'LEXUS', 'MAHINDRA', 'MASERATI', 'MAXUS', 'MAZDA', 'MERCEDES BENZ', 'MG (Morris Garage)',
            'MINI', 'MITSUBISHI', 'NISSAN', 'OPEL', 'PEUGEOT', 'PORSCHE', 'PROTON WIRA', 'SSANGYONG', 'SUBARU',
            'SUZUKI', 'TATA', 'TOYOTA', 'VOLKSWAGEN', 'VOLVO', 'JEEP', 'GMC'];
        $data = DB::table('batteries')
            ->where('saved_slot', '!=', 0)
            ->orderBy('saved_slot', 'asc')
            ->get();

        return view('main.index', ['products' => $data, 'vehicles' => $manufacturers]);
    }

    public function showModel(Request $request){
        $sent_car=$request->input('manufacturer');
        $data = DB::table('manufacturers')
            ->select('model')
            ->where('name',$sent_car)
            ->get();
        return response()->json(['message'=>$data]);
    }

    public function showYear(Request $request){
        $model=$request->input('model');
        $car=$request->input('car');
        $data = DB::table('manufacturers')
            ->select('year')
            ->where('name',$car)
            ->where('model',$model)
            ->get();
        return response()->json(['message'=>$data]);
    }

    public function loginAdmin(Request $request){
        $credentials=$request->validate([
            'user'=>'required',
            'password'=>'required',
        ]);
        if(Auth::guard('admins')->attempt($credentials)){
            //user is within the table database keep that in mind and user() represent userdata
            $user_role=Auth::guard('admins')->user()->role;
            $session_success_name="";
            switch($user_role){
                case 1:
                    $request->session()->put("mastersuccess",true);
                    break;
                case 2:
                    $request->session()->put("adminsuccess",true);
                    break;
            }
            return response()->json(['success'=>true,'role'=>$user_role]);
        }
        return response()->json(['success'=>false]);
    }

    public function logoutAdmin(){
        Session::forget('adminsuccess');
        return redirect('/admin');
    }

    public function admindashboard(Request $request)
    {
        $products = DB::table('batteries')->get();
        $featured = DB::table('batteries')
            ->where('saved_slot','!=',0)
            ->orderBy('saved_slot','asc')
            ->get();
        $product_count=DB::table('batteries')->count(); 
        return view('admin.dashboard', ['batteries'=>$products,
        'battery_count'=>$product_count,'featured_batteries'=>$featured]);
    }


    public function adminproducts(Request $request)
    {
        if ($request->ajax()) {
            return Batteries::select("name as value", "name")
                ->get();
        }
        $batteries = Batteries::simplePaginate(10);

        return view('admin.products', compact('batteries'));
    }

    public function addProduct(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
            'name' => 'required',
            'mvgi' => 'required',
            'jis_type' => 'required',
            'warranty' => 'required',
            'description' => 'required',
        ]);
        $data = [
            'image' => '',
            'name' => $request->input('name'),
            'mvgi' => $request->input('mvgi'),
            'jis_type' => $request->input('jis_type'),
            'warranty' => $request->input('warranty'),
            'description' => $request->input('description'),
        ];
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $request->input('name') . '.' . $image->getClientOriginalExtension();
            $imagePath = 'assets/' . $imageName;
            $image->move('assets/', $imageName);
            $data['image'] = $imagePath;
            $result = $this->insertProduct($data);
        }
        if ($result) {
            return response()->json(['message' => 'Product Added Successfully'], 200);
        } else {
            return response()->json(['message' => 'Failed to Add Product'], 500);
        }
    }

    public function insertProduct(array $data)
    {
        return DB::table('batteries')
            ->insert([
                'image' => $data['image'],
                'name' => $data['name'],
                'mvgi' => $data['mvgi'],
                'jis_type' => $data['jis_type'],
                'warranty' => $data['warranty'],
                'description' => $data['description'],
                'saved_slot' => 0,
            ]);
    }

    public function adminfeaturedproducts(Request $request)
    {
        if ($request->ajax()) {
            return Batteries::select("name as value", "name")
                ->get();
        }
        $batteries = Batteries::simplePaginate(10);

        return view('admin.featuredproducts', compact('batteries'));
    }

    public function deleteProduct(Request $request)
    {
        $name = $request->input('name');
        $result=DB::table('batteries')
            ->where('name',$name)
            ->delete();
        return response()->json(['success'=>true]);
    }
    public function getDetails($id)
    {
        $battery = Batteries::find($id);

        return response()->json($battery);
    }

    public function getSavedData()
    {
        $batteries = DB::table('batteries')
            ->where('saved_slot', '!=', 0)
            ->get();
        if (!$batteries) {
            return response()->json(['success' => false, 'data' => 'No Saved Batteries!']);
        }
        return response()->json(['success' => true, 'data' => $batteries]);
    }

    public function overwriteSavedBatteryData($id, $slot, $resultID)
    {
        //Set the state of the previous id's saved slot to 0
        DB::table('batteries')
            ->where('id', $resultID)
            ->update(['saved_slot' => 0]);
        //Set the new id to the given slot
        $this->saveBatteryData($id, $slot);
    }

    public function saveBatteryData($id, $slot)
    {
        DB::table('batteries')
            ->where('id', $id)
            ->update(['saved_slot' => $slot]);
    }

    public function saveBattery($id, $slot)
    {
        //check if there are exisiting id for the saved_slot
        $result = DB::table('batteries')
            ->select('id')
            ->where('saved_slot', $slot)
            ->first();
        if ($result) {
            $resultID = $result->id;
            $this->overwriteSavedBatteryData($id, $slot, $resultID);
            return response()->json(['success' => true, 'message' => 'Overwritten saved slot ' . $slot]);
        }
        $this->saveBatteryData($id, $slot);
        return response()->json(['success' => true, 'message' => 'Saved on slot' . $slot]);
    }

    public function usernameExists(Request $request){
        $username=$request->input('username');
        $result=DB::table('admins')
            ->where('user',$username)
            ->first();
        if($result){
            return response()->json(['success'=>true]);
        }
        return response()->json(['success'=>false]);
    }

    public function registerAdmin(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);
        $data=[
            'username'=>$request->input('username'),
            'password'=>bcrypt($request->input('password'))
        ];
        $this->insertAdmin($data);
        return response()->json(['success'=>true]);
    }
    public function insertAdmin($data){
        DB::table('admins')
            ->insert([
                'user'=>$data['username'],
                'password'=>$data['password'],
                'role'=>0
            ]);
    }
}
