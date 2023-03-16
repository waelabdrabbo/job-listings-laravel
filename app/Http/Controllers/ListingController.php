<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use function GuzzleHttp\Promise\all;

class ListingController extends Controller
{
    // Get All Listing
    public function index()
    {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(8)
        ]);
    }

    // Get Single Listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // Show Create Form
    public function create()
    {
        return view('listings.create');
    }

    // Store Listing Form Data
    public function store(Request $request)
    {
        $formFields = $request->validate(([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings')],
            'location' => 'required',
            'website' => 'required',
            'tags' => 'required',
            'email' => ['required', 'email'],
            'description' => 'required',
        ]));
        if ($request->hasFile('imageUrl')) {
            $formFields['imageUrl'] = $request->file('imageUrl')->store('images', 'public');
        }
        $formFields['user_id'] = auth()->id();
        Listing::create($formFields);
        return redirect('/')->with('message', 'Job Created Successfully');
    }

    // Show Edit From

    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }


    // Update Listing Form Data
    public function update(Request $request, Listing $listing)
    {
        // ownership

        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Request');
        }

        $formFields = $request->validate(([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'tags' => 'required',
            'email' => ['required', 'email'],
            'description' => 'required',
        ]));
        if ($request->hasFile('imageUrl')) {
            $formFields['imageUrl'] = $request->file('imageUrl')->store('images', 'public');
        }
        $listing->update($formFields);
        return back()->with('message', 'Job Updated Successfully');
    }

    // Delete Lisitng Item

    public function destroy(Listing $listing)
    {
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Request');
        }
        $listing->delete();
        return redirect('/')->with('message', 'Job Deleted Successfully');
    }

    // Manage Listings

    public function manage()
    {
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }
}