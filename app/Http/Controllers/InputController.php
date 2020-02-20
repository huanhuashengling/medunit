<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Vision\VisionClient;

class InputController extends Controller
{
    public function imageUploadPost(Request $request) 
    {
      // dd("asassa");

      // $imageName = time().'.'.request()->image->getClientOriginalExtension();
      // request()->image->move(public_path('images'), $imageName);
      
      // $image = $request->image;  // your base64 encoded
      // $image = str_replace('data:image/png;base64,', '', $image);
      // $image = str_replace(' ', '+', $image);
      // $imageName = str_random(10).'.'.'png';  216.58.200.234  www.googleapis.com 
      // dd($request->file('image')->getRealPath());
      // $base64image = base64_encode(file_get_contents($request->file('image')->getRealPath()));
      // \File::put(storage_path(). '/' . $imageName, base64_decode($image));
// $base64image = base64_encode(file_get_contents('https://media.geeksforgeeks.org/wp-content/uploads/geeksforgeeks-22.png')); 
  
// Encode the image string data into base64 
// $base64image = base64_encode($img);
      // $base64image = base64_encode(file_get_contents(public_path('bgd.png')));

// dd($base64image);


      $vision = new VisionClient(['keyFile' => json_decode(file_get_contents(env('GOOGLE_APPLICATION_CREDENTIALS')), true)]); 
      // $image = $vision->image($base64image, 
      //   [
      //       'TEXT_DETECTION'
      //   ]);

      $image = $vision->image(
          fopen(public_path('bgd.png'), 'r'),
          ['TEXT_DETECTION']
      );
        
        $result = $vision->annotate($image);
        dd($result); 
        $texts = $result->text();
        $web = $result->web();
        foreach($texts as $key=>$text)
        {
            $description[]=$text->description();
        }
        // fetch text from image //
        print_r($description[0]);
        foreach ($web->entities() as $key=>$entity)
        {
            $entity_per=number_format(@$entity->info()['score'] * 100 , 2);
            if(isset($entity->info()['description']))
            {
                $match_condition[$entity_per]=['Identity'=>ucfirst($entity->info()['description'])];
            }
            else
            { 
                $match_condition[$entity_per]=['Identity'=>'N/A']; 
                
            }
        }
        //print best match//

       $best_match = current($match_condition);
     } 
}
