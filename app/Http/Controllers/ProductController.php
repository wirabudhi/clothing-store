<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Outlet;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()->view('product.index', [
            'product' => Product::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('product.form', [
            'outlets' => Outlet::orderBy('nama_outlet')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('gambar')) {
            $filePath = Storage::disk('public')->put('images/product/gambar', request()->file('gambar'));
            $validated['gambar'] = $filePath;
        }


        $create = Product::create($validated);

        if($create) {
            session()->flash('notif.success', 'Data product berhasil ditambahkan!');
            return redirect()->route('product.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        $product = Product::join('outlets', 'outlets.id', '=', 'products.outlets_id')
        ->select('products.*', 'outlets.nama_outlet')
        ->findOrFail($id);

        return response()->view('product.show', [
            'product' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('product.form', [
            'product' => Product::findOrFail($id),
            'outlets' => Outlet::orderBy('nama_outlet')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $validated = $request->validated();
        if ($request->hasFile('gambar')) {
            Storage::disk('public')->delete($product->gambar);
            $filePath = Storage::disk('public')->put('images/product/gambar', request()->file('gambar'), 'public');
            $validated['gambar'] = $filePath;
        }

        $update = $product->update($validated);

        if($update) {
            session()->flash('notif.success', 'Data product berhasil diupdate!');
            return redirect()->route('product.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        Storage::disk('public')->delete($product->gambar);
        $delete = $product->delete($id);
        if($delete) {
            session()->flash('notif.success', 'Data product berhasil dihapus!');
            return redirect()->route('product.index');
        }


        return abort(500);
    }
}
