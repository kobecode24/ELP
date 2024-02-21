<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Models\Course;
use App\Models\ProgrammingLanguage;
use App\Models\SpokenLanguage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programmingLanguages = ProgrammingLanguage::all();
        $spokenLanguages = SpokenLanguage::all();

        // Pass programming and spoken languages to the view for dropdowns
        return view('courses.create', compact('programmingLanguages', 'spokenLanguages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $response = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $publicId = Cloudinary::getPublicId();
        }

        $validated['creator_id'] = Auth::id();
        $validated['image_url'] = $response;
        $validated['image_public_id'] = $publicId;
        Course::create($validated);

        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
