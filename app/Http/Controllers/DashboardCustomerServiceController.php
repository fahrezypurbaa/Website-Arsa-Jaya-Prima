<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerService;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardCustomerServiceController extends Controller
{
    public function index()
    {
        $staff = CustomerService::all();
        return view('dashboard.customerservice.index', [
            'title' => 'Daftar Staff WhatsApp',
        ], compact('staff'));
    }

    public function create()
    {
        $status = ['1', '0'];
        return view('dashboard.customerservice.create', [
            'title' => "Tambah Staff",
        ], compact('status'));
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name'  => 'required|max:255',
            'slug'  =>  'required|unique:customer_services',
            'phone'  => '',
            'image' => 'image|file|max:1024',
            'status' => 'required',
            'jabatan' => ''
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('cs->images');
        }

        CustomerService::create($validatedData);

        return redirect('/dashboard/customer-service')->with('success', 'Staff WhatsApp berhasil ditambahkan');
    }

    public function edit(CustomerService $customerService)
    {
        $status = ['1', '0'];
        return view('dashboard.customerservice.edit', [
            'title' => "Edit Staff WhatsApp",
            'staff' => $customerService
        ], compact('status'));
    }

    public function update(Request $request, CustomerService $customerService)
    {
        $rules = [
            'name'  => 'required|max:255',
            'phone'  => 'required',
            'image' => 'image|file|max:1024',
            'status' => 'required',
            'jabatan' => ''
        ];

        if ($request->slug != $customerService->slug) {
            $rules['slug'] = 'required|unique:customer_services';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('cs->images');
        }

        CustomerService::where('id', $customerService->id)->update($validatedData);

        return redirect('/dashboard/customer-service')->with('success', 'Staff WhatsApp berhasil diperbaharui!');
        // $validatedData = $request->validate([
    }

    public function destroy($id)
    {
        $staff = CustomerService::findOrFail($id);

        if ($staff->image) {
            Storage::delete($staff->image);
        }

        CustomerService::destroy($staff->id);

        return redirect('/dashboard/customer-service')->with('success', 'Staff WhatsApp berhasil dihapus');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(CustomerService::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
