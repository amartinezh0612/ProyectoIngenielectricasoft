<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class PedidosFormRequest extends FormRequest
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
            'fecha_elaboracion' => 'required',
            'fecha_inicio_pedido' => 'required',
            'fecha_final_pedido' => 'required',
            'monto_total' => 'required',
            $request->validate([
                'fecha_inicio_pedido' => '',
                'fecha_final_pedido' => '',
                'fecha_elaboracion' => ['required',
                function ($attribute, $value, $fail) use ($request) {
                    if ($request['fecha_final_pedido'] == !null) {
                        if ($value > $request['fecha_inicio_pedido'] || $value > $request['fecha_final_pedido']) {
                            $fail('Por favor verifique que la fecha incio y/o fecha final sean posteriores o iguales a la fecha de solicitud');
                        }
                    }
                },
            ],
           ]),
        ];
    }
}
