<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Caminho;
use App\Models\Via;

class MapController extends Controller
{
    // Função que exibe a view 'mapa' na route /mapa
    function show_p()
    {
        return view('mapa');
    }

    // Função que retorna os dados referentes aos pontos na route /mapa/get_pontos
    function get_data_vias()
    {   
        $data_vias = Via::all();
        echo $data_vias;
    }

    // Função que retorna os dados referentes aos pontos na route /mapa/get_predios
    function get_data_caminhos()
    {   
        $data_caminhos = Caminho::all();
        echo $data_caminhos;
    }

    function get_rota($a)
    {
        $a = explode("_", $a);
        $rota = DB::select( 
                        DB::raw("select 
                            di.seq,
                            di.node, 
                            di.edge, 
                            ST_AsGeoJSON(vi.geom) as geom
                        FROM 
                            pgr_dijkstra ('select id, source, target, ST_Length(geom) + cond as cost FROM vias', {$a[0]}, {$a[1]}, false) di 
                        JOIN 
                            vias vi
                        ON 
                            di.edge = vi.id;")
                        );
        echo json_encode($rota);
    }
    
}


