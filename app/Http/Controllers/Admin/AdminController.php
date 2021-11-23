<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Bill;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{

    //
    public function index()
    {
        $bills = $this->getManageBill();
        $data = $this->getProductSold();

        return view('admin.index', [
            'data' => json_encode($data),
            'bills' => json_encode($bills),
        ]);
    }

    public function getManageBill()
    {
        $firstDay = Carbon::now()->firstOfMonth()->format('Y-m-d');
        $lastDay = Carbon::now()->lastOfMonth()->format('Y-m-d');

        $bills = Bill::select(
            DB::raw("(sum(total_price)) as total"),
            DB::raw("(DATE_FORMAT(created_at, '%Y-%m')) as date")
        )
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"))
            ->get()
            ->map(function ($bill) {
                $data = [
                    'date'  => $bill->date,
                    'total' => $bill->total
                ];
                return $data;
            });
        return $bills;
    }

    public function manageBill(Request $request)
    {
        $now = date('Y-m');
        $data = $request->validate([
            'startMonth' => 'required|date_format:Y-m|after_or_equal:2018-01',
            'endtMonth' => 'required|date_format:Y-m|before_or_equal:' . $now,
        ]);

        $firstDay = $data['startMonth'].'-01';
        $lastDay = $data['endtMonth'].'-31';

        // dd($lastDay);

        $bills = Bill::select(
            DB::raw("(sum(total_price)) as total"),
            DB::raw("(DATE_FORMAT(created_at, '%Y-%m')) as date")
        )
            ->where('created_at','>=',$firstDay)
            ->where('created_at','<=',$lastDay)
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"))
            ->get()
            ->map(function ($bill) {
                $data = [
                    'date'  => $bill->date,
                    'total' => $bill->total
                ];
                return $data;
            });
        // dd($bills);
            
        $data = $this->getProductSold();
        return view('admin.index', [
            'data' => json_encode($data),
            'bills' => json_encode($bills),
        ]);
    }

    public function getProductSold()
    {
        $manage = Product::orderBy('quantity_product_sold', 'desc')->take(16)
            ->get(['name', 'quantity_product_sold'])
            ->map(function ($product) {
                $data = [];
                $data[$product->name] = $product->quantity_product_sold;
                return $data;
            })->collapse();
        $data = [];
        foreach ($manage as $name => $sold) {

            if ($sold > 50) {
                $color = 'rgb(255, 99, 132)';
            } else {
                $color = '#7474f0';
            }

            $data[] = [
                'name' => $name,
                'sold' => $sold,
                'color' => $color
            ];
        }

        return $data;
    }

    //product
    public function product()
    {
        $products = Product::adminGetAllProduct();
        return view('admin.product', [
            'products' => $products,
        ]);
    }

    public function formEditProduct($id)
    {
        $product = Product::findOrFail($id);

        return view('test', [
            'test' => $product,
        ]);
    }

    public function editProduct($id, ProductRequest $request)
    {
        // public function editProduct(Product $product, ProductRequest $request){
        $product = Product::findOrFail($id);

        if ($product->update($request->all())) {
            return true;
        }
        return false;
    }

    // product Type

    public function getProductByTypeId($id)
    {
        // dd(Product::where('product_type_id',$id)->get());
        $products = Product::adminGetProductByTypeId($id);

        return view('admin.product', [
            'products' => $products,
        ]);
    }

    //admin management
    public function manage()
    {

        $bills = Bill::adminGetAllBill();
        // dd($bills);
        return view('admin.manage', [
            'bills' => $bills,
        ]);
    }

    public function billDetail($id)
    {
        $bill = new Bill;
        $billDetail = $bill->getBillDetail($id);

        return view('admin.bill-detail', [
            'billDetail' => $billDetail,
        ]);
    }

    public function formNewAdmin()
    {
        return view('admin.create-admin');
    }


    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function storeNewAdmin(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],
        ]);


        $role = Role::where('role', 'admin')->first();
        // dd($data);
        $role->user()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->route('admin.formNewAdmin')->with([
            "message" => "Create New Admin's Account Successfully"
        ]);
    }

    public function manageCustomer()
    {
        $customers = User::where('role_id', 2)->get();

        return view('admin.account.customer', [
            'customers' => $customers
        ]);
    }

    public function manageAdmin()
    {
        $admin = User::where('role_id', 1)->get();

        return view('admin.account.admin', [
            'admin' => $admin
        ]);
    }
}