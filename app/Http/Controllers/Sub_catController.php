<?php

namespace App\Http\Controllers;
use App\Models\Sub_cat;
use App\Models\Onl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class Sub_catController extends Controller
{
    //fetching data 
    function classi()
    {
        $cacheKey = 'parts';
        $expire = now()->addMinutes(120); // Use Laravel's helper function for current time
        // Check if the cache has data
        $nob = Cache::get('acc_nob');
        

        if ($nob === null) {
            // Cache the accessories query if data is not in the cache
            $ac = DB::table('onls')
                ->where('fs', 1)
                ->select('id', 'descrip', 'picf', 'folder', 'cat', 'price')
                ->take(8)
                ->inRandomOrder()
                ->get();
            // Map the accessories data
            $nob = $ac->map(function ($post) {
                return [
                    'id' => $post->id,
                    'descrip' => $post->descrip,
                    'picf' => $post->picf,
                    'folder' => $post->folder,
                    'cat' => $post->cat,
                    'price' => $post->price,
                    'url' => '/car-accessories/' . $post->folder . '/' . strtolower(str_replace(' ', '-', $post->descrip)),
                ];
            });
            // Save the mapped data into the cache
            Cache::put('acc_nob', $nob, $expire);
          
        }
       
        
      
        // Check if the cache exists
        if (!Cache::has($cacheKey)) 
        {
             $chunkSize = 1000; // Define the chunk size
             $allParts = collect(); // Initialize an empty collection

             // Fetch and collect data in chunks
            Sub_cat::chunk($chunkSize, function ($parts) use (&$allParts) 
            {
                 $allParts = $allParts->merge($parts);
            });

            // Cache the entire collection in Redis
            Cache::put($cacheKey, $allParts, $expire);
            $parts = $allParts;
        } else 
        {
            // Retrieve data from cache
            $parts = Cache::get($cacheKey);
        }

        // exit;
       
        return view('userpanel.parts', compact('nob','parts'));

    }
    
}
