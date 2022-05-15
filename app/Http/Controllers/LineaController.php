<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Linea;
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
}
