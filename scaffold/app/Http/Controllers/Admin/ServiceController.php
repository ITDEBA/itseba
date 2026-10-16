<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->paginate(15);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:services,slug',
            'excerpt' => 'nullable|string',
            'description' => 'nullable|string',
            'is_active' => 'sometimes|boolean',
        ]);

        Service::create($data);

        return redirect()->route('admin.services.index')->with('success','Service created.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:services,slug,'.$service->id,
            'excerpt' => 'nullable|string',
            'description' => 'nullable|string',
            'is_active' => 'sometimes|boolean',
        ]);

        $service->update($data);

        return redirect()->route('admin.services.index')->with('success','Service updated.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success','Service deleted.');
    }
}
