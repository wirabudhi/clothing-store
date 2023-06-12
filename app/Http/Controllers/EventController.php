<?php

namespace App\Http\Controllers;

use App\Http\Requests\Event\StoreRequest;
use App\Http\Requests\Event\UpdateRequest;
use App\Models\Event;
use App\Models\Outlet;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()->view('event.index', [
            'event' => Event::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('event.form', [
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
            $filePath = Storage::disk('public')->put('images/event/gambar', request()->file('gambar'));
            $validated['gambar'] = $filePath;
        }


        $create = Event::create($validated);

        if($create) {
            session()->flash('notif.success', 'Data event berhasil ditambahkan!');
            return redirect()->route('event.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        $event = Event::join('outlets', 'outlets.id', '=', 'events.outlets_id')
        ->select('events.*', 'outlets.nama_outlet')
        ->findOrFail($id);

        return response()->view('event.show', [
            'event' => $event,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('event.form', [
            'event' => Event::findOrFail($id),
            'outlets' => Outlet::orderBy('nama_outlet')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $event = Event::findOrFail($id);
        $validated = $request->validated();
        if ($request->hasFile('gambar')) {
            Storage::disk('public')->delete($event->gambar);
            $filePath = Storage::disk('public')->put('images/event/gambar', request()->file('gambar'), 'public');
            $validated['gambar'] = $filePath;
        }

        $update = $event->update($validated);

        if($update) {
            session()->flash('notif.success', 'Data event berhasil diupdate!');
            return redirect()->route('event.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $event = Event::findOrFail($id);
        Storage::disk('public')->delete($event->gambar);
        $delete = $event->delete($id);
        if($delete) {
            session()->flash('notif.success', 'Data event berhasil dihapus!');
            return redirect()->route('event.index');
        }


        return abort(500);
    }
}
