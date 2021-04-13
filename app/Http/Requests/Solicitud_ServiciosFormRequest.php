<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class Solicitud_ServiciosFormRequest extends FormRequest
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
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            'telefono_servicio' => 'min:7',
            'direccion_servicio' => 'min:4',
            'contacto' => 'min:3',
            $request->validate([
                'fecha_inicio' => '',
                'fecha_terminacion' => '',
                'fecha_solicitud' => ['required',
                function ($attribute, $value, $fail) use ($request) {
                    if($request['fecha_inicio']==!null || $request['fecha_terminacion']==!null){
                        if ($value > $request['fecha_inicio'] || $value > $request['fecha_terminacion']) {
                            $fail('Por favor verifique que la fecha incio y/o fecha terminacion sean posteriores o iguales a la fecha de solicitud');
                        }
                    }
                },
            ] 
           ]),
         ];
    }
}
