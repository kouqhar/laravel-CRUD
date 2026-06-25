<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index(Chirp $chirp)
    {

        $chirps = Chirp::with('user')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();
//        $chirps = Chirp::with('user')
//            ->getQuery("user", $chirp->user())
//            ->latest()
//            ->take(50)
//            ->get();
//
//
        return view('pages.profile', ['chirps' => $chirps]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
