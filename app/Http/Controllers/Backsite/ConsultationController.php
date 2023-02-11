<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\Consultation\StoreConsultationRequest;
use App\Http\Requests\Consultation\UpdateConsultationRequest;
use Illuminate\Http\RedirectResponse;
use Gate;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        abort_if(Gate::denies('consultation_access'), 403);

        $consultations = Consultation::orderBy('created_at', 'desc')->get();

        return view('pages.backsite.master-datas.consultations.index', [
            'consultations' => $consultations
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
    public function store(StoreConsultationRequest $request): RedirectResponse
    {
        Consultation::create($request->validated());

        alert()->success('Success', 'New Consultation has been created');

        return to_route('backsite.consultations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function show(Consultation $consultation): View
    {
        abort_if(Gate::denies('consultation_show'), 403);

        return view('pages.backsite.master-datas.consultations.show', [
            'consultation' => $consultation
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultation $consultation): View
    {
        abort_if(Gate::denies('consultation_edit'), 403);

        return view('pages.backsite.master-datas.consultations.edit', [
            'consultation' => $consultation
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConsultationRequest $request, Consultation $consultation): RedirectResponse
    {
        $consultation->update($request->validated());

        alert('Success', 'Consultation updated successfully');

        return to_route('backsite.consultations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultation $consultation): RedirectResponse
    {
        abort_if(Gate::denies('consultation_delete'), 403);

        $consultation->delete();

        alert('Success', 'consultation deleted successfully');

        return to_route('backsite.consultations.index');
    }
}
