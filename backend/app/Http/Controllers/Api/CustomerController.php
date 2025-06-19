<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Customer::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'plate_number' => 'required|string',
            'car_model' => 'required|string',
            'problem' => 'nullable|string',
        ]);
    
        $customer = Customer::create($validated);
        return response()->json($customer, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::find($id);
        if(!$customer){
            return response()->json(['message' => 'Customer not found'], 404);
        }
        return response()->json($customer, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = Customer::find($id);
        if(!$customer){
            return response()->json(['message' => 'Customer not found'], 404);
        }
        $validated = $request->validate([
            'name' => 'sometimes|string',
            'phone' => 'sometimes|string',
            'plate_number' => 'sometimes|string',
            'car_model' => 'sometimes|string',
            'problem' => 'nullable|string',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->update($validated);
        return response()->json($customer, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::find($id);
        if(!$customer){
            return response()->json(['message' => 'Customer not found'], 404);
        }
        $customer->delete();
        return response()->json(['message' => 'Customer Deleted!']);
    }
}
