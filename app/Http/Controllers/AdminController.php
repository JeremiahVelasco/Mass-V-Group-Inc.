<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batteries;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
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
            'image' => 'required',
            'name' => 'required',
            'mvgi' => 'required',
            'jis_type' => 'required',
            'warranty' => 'required',
            'description' => 'required',
        ]);

        $data = [
            'image' => $request->input('date'),
            'name' => $request->input('name'),
            'mvgi' => $request->input('mvgi'),
            'jis_type' => $request->input('jis_type'),
            'warranty' => $request->input('warranty'),
            'description' => $request->input('description'),
        ];

        $result = $this->insertProduct($data);

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

        $patient = DB::table('batteries')
            ->where('name', $name)
            ->first();

        if ($patient) {
            $result = DB::table('batteries')
                ->where('name', $name)
                ->delete();

            if ($result) {
                return response()->json(['success' => true]);
            } else {
                return response()->json(['message' => 'Failed to delete product'], 500);
            }
        } else {
            return response()->json(['message' => 'Product not found'], 404);
        }
    }
}
