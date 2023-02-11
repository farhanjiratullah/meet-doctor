<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use App\Models\ConfigPayment;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\ConfigPayment\UpdateConfigPaymentRequest;
use Illuminate\Http\RedirectResponse;
use Gate;

class ConfigPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        abort_if(Gate::denies('config_payment_access'), 403);

        $config_payment = ConfigPayment::first();

        return view('pages.backsite.master-datas.config-payment.index', [
            'config_payment' => $config_payment
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ConfigPayment  $configPayment
     * @return \Illuminate\Http\Response
     */
    public function show(ConfigPayment $configPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ConfigPayment  $configPayment
     * @return \Illuminate\Http\Response
     */
    public function edit(ConfigPayment $configPayment): View
    {
        abort_if(Gate::denies('config_payment_edit'), 403);

        return view('pages.backsite.master-datas.config-payment.edit',[
            'configPayment' => $configPayment
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ConfigPayment  $configPayment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConfigPaymentRequest $request, ConfigPayment $configPayment): RedirectResponse
    {
        $configPayment->update($request->validated());

        alert('Success', 'Config Payment updated successfully');

        return to_route('backsite.config-payment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConfigPayment  $configPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConfigPayment $configPayment)
    {
        //
    }
}
