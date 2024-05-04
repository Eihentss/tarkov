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
                description
                basePrice
                properties {
                    ... on ItemPropertiesAmmo {
                        caliber
                        damage
                        penetrationPower
                        fragmentationChance
                        armorDamage
                    }
                }
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
            // Get all items
            $ammoItems = $result['data']['items'];
            
            // Define allowed and disallowed phrases
            $allowedPhrases = ['12/70', '9x18mm', '23x75mm','7.62x25mm','9x19mm','.45 ACP','9x21mm','.357 Magnum','5.7x28mm','4.6x30mm','9x39mm','.366 TKM','5.45x39mm','5.56x45mm','7.62x39mm','.300','6.8x51mm','7.62x51mm','7.62x54mm','12.7x55mm','.338 Lapua'];
            $disallowedPhrases = ['shotgun', 'ammo','carbine','muzzle','rifle','magazine','pistol','barrel','Default','gun','flash','receiver','suppressor','compensator','10 pcs','protection'];
    
            // Filter items based on allowed and disallowed phrases
            $filteredItems = array_filter($ammoItems, function($item) use ($allowedPhrases, $disallowedPhrases) {
                foreach ($allowedPhrases as $phrase) {
                    if (stripos($item['name'], $phrase) !== false) {
                        foreach ($disallowedPhrases as $disphrase) {
                            if (stripos($item['name'], $disphrase) !== false) {
                                return false; // If a disallowed phrase is found, skip this item
                            }
                        }
                        return true; // If only allowed phrases are found, keep this item
                    }
                }
                return false; // If none of the allowed phrases are found, skip this item
            });
    
            // Sort filtered items alphabetically by name
            usort($filteredItems, function($a, $b) {
                return strcmp($a['name'], $b['name']);
            });
    
            $ammoItems = $filteredItems; // Update ammo items with filtered and sorted data
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
                basePrice
                weight


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
    
    public function index()
    {
        
        $headers = ['Content-Type: application/json'];

        $query = 'query {
            items {
                id
                name
                shortName
                wikiLink
                iconLink
                basePrice
                weight


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
        
        return view('tarkov.index')->with('items', $items);
        
    }

    public function fetchTasks()
{
    $headers = ['Content-Type: application/json'];

    $query = 'query {
        tasks {
            id
            name
            taskImageLink
            trader {
                id
                name
                imageLink
            }
            TaskStatusRequirement{
                task
            }
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
 dd($data);
    // Check if 'tasks' key exists in the response and if it's not empty
    if (isset($result['data']['tasks']) && !empty($result['data']['tasks'])) {
        $tasks = $result['data']['tasks'];
    } else {
        $tasks = []; // or handle the absence of data as needed
    }

    return view('tarkov.tasks')->with('tasks', $tasks);
}
        
}

    

