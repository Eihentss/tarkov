<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TarkovController extends Controller
{
    public function fetchAmmo()
    {
        $headers = ['Content-Type: application/json'];
    
        $query = 'query {
            items {
                id
                name
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
            // Filter items to include only those with specific phrases in their name
            $ammoItems = array_filter($result['data']['items'], function($item) {
                // Define an array of allowed phrases
                $allowedPhrases = ['12/70', '9x18mm', '23x75mm','7.62x25mm','9x19mm','.45 ACP','9x21mm','.357 Magnum','5.7x28mm','4.6x30mm','9x39mm','.366 TKM','5.45x39mm','5.56x45mm','7.62x39mm','.300','6.8x51mm','7.62x51mm','7.62x54mm','12.7x55mm','.338 Lapua']; // Add other allowed phrases here
                $disallowedPhrases = ['shotgun', 'ammo','carbine','muzzle','rifle','magazine','pistol','barrel','Default','gun','flash','receiver','suppressor','compensator','10 pcs','protection']; // Add other disallowed phrases here
    
                // Check if any of the allowed phrases are present in the name and none of the disallowed phrases are
                foreach ($allowedPhrases as $phrase) {
                    if (stripos($item['name'], $phrase) !== false) {
                        foreach ($disallowedPhrases as $disphrase) {
                            if (stripos($item['name'], $disphrase) !== false) {
                                return false;
                            }
                        }
                        return true;
                    }
                }
    
                return false;
            });
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
