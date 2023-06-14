<?php

namespace App\Http\Controllers;

use App\Http\Requests\Outlet\StoreRequest;
use App\Http\Requests\Outlet\UpdateRequest;
use App\Models\Outlet;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $outlets = Outlet::with(['products', 'events'])->get();

        return response()->view('outlet.index', [
            'outlet' => $outlets,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('outlet.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('gambar')) {
            $filePath = Storage::disk('public')->put('images/outlet/gambar', request()->file('gambar'));
            $validated['gambar'] = $filePath;
        }


        $create = Outlet::create($validated);

        if($create) {
            session()->flash('notif.success', 'Data outlet berhasil ditambahkan!');
            return redirect()->route('outlet.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        $outlet = Outlet::findOrFail($id);
        $products = $outlet->products()->get();
        $events = $outlet->events()->get();
        return response()->view('outlet.show', [
            'outlet' => $outlet,
            // 'outlets' => Outlet::with(['products', 'events'])->findOrFail($id)->get(),
            'products' => $products,
            'events' => $events,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('outlet.form', [
            'outlet' => Outlet::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $outlet = Outlet::findOrFail($id);
        $validated = $request->validated();
        if ($request->hasFile('gambar')) {
            Storage::disk('public')->delete($outlet->gambar);
            $filePath = Storage::disk('public')->put('images/outlet/gambar', request()->file('gambar'), 'public');
            $validated['gambar'] = $filePath;
        }

        $update = $outlet->update($validated);

        if($update) {
            session()->flash('notif.success', 'Data outlet berhasil diupdate!');
            return redirect()->route('outlet.index');
        }

        return abort(500);
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $outlet = Outlet::findOrFail($id);
        Storage::disk('public')->delete($outlet->gambar);
        $delete = $outlet->delete($id);
        if($delete) {
            session()->flash('notif.success', 'Data outlet berhasil dihapus!');
            return redirect()->route('outlet.index');
        }


        return abort(500);
    }
}
