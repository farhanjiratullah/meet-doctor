<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\Doctor\StoreDoctorRequest;
use App\Http\Requests\Doctor\UpdateDoctorRequest;
use App\Models\Specialist;
use Illuminate\Http\RedirectResponse;
use Gate;
use File;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        abort_if(Gate::denies('doctor_access'), 403);

        $doctors = Doctor::with('specialist')->orderBy('created_at', 'desc')->get();
        $specialists = Specialist::all();

        return view('pages.backsite.operationals.doctors.index', [
            'doctors' => $doctors,
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
    public function store(StoreDoctorRequest $request): RedirectResponse
    {
        $data = $request->validated();
        
        if( $request->hasFile('photo') ) {
            $data['photo'] = $request->file('photo')->store('assets/doctors', 'public');
        }

        Doctor::create($data);

        alert()->success('Success', 'New Doctor has been created');

        return to_route('backsite.doctors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor): View
    {
        abort_if(Gate::denies('doctor_show'), 403);

        return view('pages.backsite.operationals.doctors.show', [
            'doctor' => $doctor
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor): View
    {
        abort_if(Gate::denies('doctor_edit'), 403);

        $specialists = Specialist::all();

        return view('pages.backsite.operationals.doctors.edit', [
            'doctor' => $doctor,
            'specialists' => $specialists
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorRequest $request, Doctor $doctor): RedirectResponse
    {
        $data = $request->validated();
        
        if( $request->hasFile('photo') ) {
            $old_file = "storage/{$doctor->photo}";

            if( File::exists(public_path($old_file)) ) {
                File::delete($old_file);
            }
            
            $data['photo'] = $request->file('photo')->store('assets/doctors', 'public');
        }

        $doctor->update($data);

        alert('Success', 'Doctor updated successfully');

        return to_route('backsite.doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        abort_if(Gate::denies('doctor_delete'), 403);
        
        $doctor->delete();

        alert('Success', 'Doctor deleted successfully');

        return to_route('backsite.doctors.index');
    }
}
