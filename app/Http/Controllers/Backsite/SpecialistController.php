<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use App\Models\Specialist;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\Specialist\StoreSpecialistRequest;
use App\Http\Requests\Specialist\UpdateSpecialistRequest;
use Illuminate\Http\RedirectResponse;

class SpecialistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $specialists = Specialist::orderBy('created_at', 'desc')->get();

        return view('pages.backsite.master-datas.specialists.index', [
            'specialists' => $specialists
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpecialistRequest $request): RedirectResponse
    {
        Specialist::create($request->validate());

        alert()->success('Success', 'New Specialist has been created');

        return to_route('backsite.specialists.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Specialist  $specialist
     * @return \Illuminate\Http\Response
     */
    public function show(Specialist $specialist): View
    {
        return view('pages.backsite.master-datas.specialists.show', [
            'specialist' => $specialist
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Specialist  $specialist
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialist $specialist): View
    {
        return view('pages.backsite.master-datas.specialists.edit', [
            'specialist' => $specialist
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Specialist  $specialist
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpecialistRequest $request, Specialist $specialist): RedirectResponse
    {
        $specialist->update($request->validate());

        alert('Success', 'Specialist updated successfully');

        return to_route('backsite.specialists.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Specialist  $specialist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialist $specialist): RedirectResponse
    {
        $specialist->delete();

        alert('Success', 'Specialist deleted successfully');

        return to_route('backsite.specialists.index');
    }
}
