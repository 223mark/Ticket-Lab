<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        // return [
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'customerNrc' => 'required',
        //     'paymentMethod' => 'required',
        //     'departureDate' => 'required',
        //     'ticketId' => 'required'
        // ];
    }
    // protected function prepareForValidation()
    // {
    //     $this->merge([
    //         'customer_name' => $this->name,
    //         'customer_nrc_number' =>  $this->customerNrc,
    //         'payment_method' => $this->paymentMethod,
    //         'departure_date' =>  $this->departureDate,
    //         'ticket_id' => $this->ticketId,
    //         'customer_email' => $this->email
    //     ]);
    // }
}
