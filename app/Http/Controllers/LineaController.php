<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Linea;
use App\Models\Micro;
use finfo;
use http\Env\Url;

class LineaController extends Controller
{
    public function getLineas() {
        $list = new Linea();
        $list = $list->getLineas();

        $lineas = [];
        foreach ($list as $item) {
            $item['linea'] = strip_tags($item['linea']);
            $item['linea']=$Content = preg_replace("/&#?[a-z0-9]+;/i"," ",$item['linea']);

            $linea = new \stdClass();
            $linea->id = $item->id;
            $linea->linea = $item->linea;
            array_push($lineas, $linea);
        }

        return response()->json($lineas);
    }

    public function getLineasAll() {
        $lineas = new Linea();
        $lineas = $lineas->getLineas();

        return response()->json($lineas);
    }

    public function createBus(Request $request)
    {
        $request->validate([
            'placa' => 'required',
            //'modelo' => 'string|max:100',
            //'servicios' => 'string|max:100',
            'interno' => 'required',
            //'capacidad' => 'integer',
            'conductor_id' => 'required',
            'linea_id' => 'required'
        ]);

        $bus = new Micro();
        $bus->placa = $request->placa;
        $bus->modelo = $request->modelo;
        $bus->servicios = $request->servicios;
        $bus->interno = $request->interno;
        $bus->capacidad = $request->capacidad;
        $bus->conductor_id = $request->conductor_id;
        $bus->linea_id = $request->linea_id;
        $bus->save();

        return response()->json([
            'message' => 'Micro creado',
            'bus' => $bus
        ], 401);
    }
}
