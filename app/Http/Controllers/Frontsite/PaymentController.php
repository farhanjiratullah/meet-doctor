<?php

namespace App\Http\Controllers\Frontsite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Appointment;
use App\Models\ConfigPayment;
use App\Models\Transaction;
use App\Http\Requests\Frontsite\Payment\StorePaymentRequest;
use Illuminate\Http\RedirectResponse;

class PaymentController extends Controller
{
    public function store(StorePaymentRequest $request, Appointment $appointment): RedirectResponse {
        Transaction::create($request->validated());

        $appointment->update([
            'status' => 1
        ]);

        $request->session()->flash('success_payment', "Success Payment for appointment id {$appointment->id}");

        return to_route('payment.success');
    }

    public function payment(Appointment $appointment): View
    {
        $appointment->load(['doctor' => ['specialist'], 'consultation']);
        $config_payment = ConfigPayment::first();

        $specialist_fee = $appointment->doctor->specialist->price;
        $doctor_fee = $appointment->doctor->fee;
        $hospital_fee = $config_payment->fee;
        $hospital_vat = $config_payment->vat;

        $total = $specialist_fee + $doctor_fee + $hospital_fee;

        $total_with_vat = (int) ($total * $hospital_vat) / 100;
        $grand_total = (int) $total + $total_with_vat;

        return view('pages.frontsite.payment.index', [
            'appointment' => $appointment,
            'config_payment' => $config_payment,
            'total_with_vat' => $total_with_vat,
            'grand_total' => $grand_total,
        ]);
    }

    public function success()
    {
        abort_if(!session()->has('success_payment'), 403);

        return view('pages.frontsite.success.payment');
    }
}
