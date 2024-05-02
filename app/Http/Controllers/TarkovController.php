<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TarkovController extends Controller
{
    public function fetchAmmo()
{
    $headers = ['Content-Type: application/json'];

    $query = 'query {
        ammo {
            id
            name
            shortName
            wikiLink
            iconLink
        }
    }';

    $data = @file_get_contents('https://api.tarkov.dev/graphql', false, stream_context_create([
        'http' => [
            'method' => 'POST',
            'header' => $headers,
            'content' => json_encode(['query' => $query]),
        ]
    ]));

    $result = json_decode($data, true);

    // Check if 'ammo' key exists in the response and if it's not empty
    if (isset($result['data']['ammo']) && !empty($result['data']['ammo'])) {
        $ammoItems = $result['data']['ammo'];
    } else {
        $ammoItems = []; // or handle the absence of data as needed
    }

    return view('tarkov.ammo')->with('ammoItems', $ammoItems);
}


    public function items()
    {
        $headers = ['Content-Type: application/json'];

        $query = 'query {
            items {
                id
                name
                shortName
                wikiLink
                iconLink
            }
        }';
        
        $data = @file_get_contents('https://api.tarkov.dev/graphql', false, stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => $headers,
                'content' => json_encode(['query' => $query]),
            ]
        ]));
        
        $result = json_decode($data, true);
        
        // Check if 'items' key exists in the response and if it's not empty
        if (isset($result['data']['items']) && !empty($result['data']['items'])) {
            $items = $result['data']['items'];
        } else {
            $items = []; // or handle the absence of data as needed
        }
        
        return view('tarkov.items')->with('items', $items);
        
    }

    
}
