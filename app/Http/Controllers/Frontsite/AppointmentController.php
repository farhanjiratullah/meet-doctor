<?php

namespace App\Http\Controllers\Frontsite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Consultation;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Http\Requests\Frontsite\Appointment\StoreAppointmentRequest;

class AppointmentController extends Controller
{
    public function store(StoreAppointmentRequest $request) {
        $appointment = Appointment::create($request->validated());

        return to_route('payment', $appointment->id);
    }

    public function appointment(Doctor $doctor): View
    {
        $doctor->load('specialist');
        $consultations = Consultation::all();

        return view('pages.frontsite.appointment.index', compact('doctor', 'consultations'));
    }
}
