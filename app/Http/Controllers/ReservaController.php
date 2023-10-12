<?php

namespace App\Http\Controllers;

use App\Mail\AvisoReserva;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReservaController extends Controller
{
    public function index($id, $message = null)
    {
        $events = $this->buscarReservas($id);
        if(is_null($message))
        {
            return view('reserva', compact(['events', 'id']));
        }
        
        return view('reserva', compact(['events', 'id', 'message']));
    }

    public function store(Request $request){
        unset($request['_token']);
        $id = $request->hospedajes_id;
        $model = Reserva::create($request->all());
        $this->enviarMail(auth()->user()->email);
        return redirect()->route('reserva', [$id, 'Reserva realizada correctamente']);
    }

    private function buscarReservas($id){
        $reservas = Reserva::where('hospedajes_id', $id)->whereDate('start_date', '>=', date('Y-m-d'))->get();

        $events = [];

        foreach ($reservas as $reserva) {
            $events[] = [
                'title' => 'No disponible',
                'start' => $reserva->start_date,
                'end' => $reserva->end_date,
            ];
        }
        return $events;
    }

    private function enviarMail($email){
        $content = [
            'subject' => '',
            'body' => 'Su registro ah sido exitoso, muchas gracias'
        ];

        Mail::to($email)->send(new AvisoReserva($content));
    }
}
