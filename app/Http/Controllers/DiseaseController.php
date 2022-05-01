<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiseaseRequest;
use App\Models\Disease;
use App\Models\Doctor;
use App\Services\FileService;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    public function index()
    {
        $diseases = Disease::with('doctor')->get();
        return view('disease.index', compact('diseases'));
    }

    public function show(Disease $disease)
    {
        return view('disease.show', compact('disease'));
    }

    public function create(Doctor $doctor)
    {
        return view('disease.create', compact('doctor'));
    }

    public function store(DiseaseRequest $request, Doctor $doctor)
    {
        $data = $request->validated();
        $data['image'] = FileService::getBaseImageUrl($request->file('image'));
        $doctor->diseases()->create($data);

        return redirect()->route('diseases.index');
    }

    public function edit(Disease $disease)
    {
        return view('disease.edit', compact('disease'));
    }

    public function update(DiseaseRequest $request, Disease $disease)
    {

        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = FileService::getBaseImageUrl($request->file('image'));
        }

        $disease->update($data);

        return redirect()->route('diseases.index');
    }
}
