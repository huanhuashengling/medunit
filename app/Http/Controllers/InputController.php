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
        
        $annotation = $vision->annotate($image);
        $earlyText = $annotation->text()[0]->description();
// echo "earlyText";
// var_dump($earlyText);
        // dd($result); 
        $document = $annotation->fullText();
        $pages = $document->pages();
        $info = $document->info();
        $text = $document->text();
//   $location=$this->find_word_location($pages,'WBC');
//         echo "location";      
// var_dump($location);
// dd($document);

        // echo "document";
// var_dump($document);
// echo "info";
// var_dump($info);
// echo "text";
// var_dump($text);
// echo "pages";
// foreach($pages as $page){
//   dd($page["blocks"][0]["paragraphs"][0]["words"][0]);
//   }
// dd($pages);
  $location=$this->find_word_location($pages,'WBC');
        echo "location";      
var_dump($location);
dd($pages);
//text_within(document, location.vertices[1].x, location.vertices[1].y, 30+location.vertices[1].x+(location.vertices[1].x-location.vertices[0].x),location.vertices[2].y)

        foreach($texts as $key=>$text)
        {
            $description[]=$text->description();
        }
        // fetch text from image //
        var_dump($description[0]);
        //print best match//
        dd($result); 

       // $best_match = current($match_condition);

     } 

     //TODO
     //1. store item in database
     //2. for loop out WBC, find the bound of "WBC"
     //3. move the bound to right and find the text in the new bound
     //then out put 
     //
     //
  public function assemble_word($word)
  {
    $assembled_word="";
    foreach($word["symbols"] as $symbol) {
      $assembled_word .= $symbol["text"];
    }
    return $assembled_word;
  }
  
  public function find_word_location($pages, $word_to_find)
  {
    $bounding_box = [];
    foreach($pages as $page){
      foreach($page["blocks"] as $block) {
        foreach($block["paragraphs"] as $paragraph) {
          foreach($paragraph["words"] as $word) {
            $assembled_word=$this->assemble_word($word);
            if($assembled_word==$word_to_find) {
                return $word["boundingBox"];
            }
          }
        }
      }
    }
    return $bounding_box;
  }

  public function text_within($pages, $x1, $y1, $x2, $y2)
  {
    $text="";
    foreach($pages as $page) {
      foreach($page->getBlocks() as $block) {
        foreach($block->getParagraphs() as $paragraph) {
          foreach($paragraph->getWords() as $word) {
            foreach($word->getSymbols() as $symbol) {
              $symbolBBV = $symbol->getBoundingBox()->getVertices();
                $min_x=min($symbolBBV[0]->getX(),$symbolBBV[1]->getX(),$symbolBBV[2]->getX(),$symbolBBV[3]->getX());
              $max_x=max($symbolBBV[0]->getX(),$symbolBBV[1]->getX(),$symbolBBV[2]->getX(),$symbolBBV[3]->getX());
              $min_y=min($symbolBBV[0]->getY(),$symbolBBV[1]->getY(),$symbolBBV[2]->getY(),$symbolBBV[3]->getY());
              $max_y=max($symbolBBV[0]->getY(),$symbolBBV[1]->getY(),$symbolBBV[2]->getY(),$symbolBBV[3]->getY());
              if($min_x >= $x1 and $max_x <= $x2 and $min_y >= $y1 and $max_y <= $y2) {
                $text+=$symbol->getText();
                $symbolPDBT = $symbol->getProperty()->getDetectedBreak()->getType();
                if($symbolPDBT==1 or $symbolPDBT==3) {
                  $text .=' ';
                }
                if($symbolPDBT==2) {
                  $text .='\t';
                }
                if($symbolPDBT==5){
                  $text .='\n';
                }
              }
            }
          }
        }
      }
    }
    return $text;
  }
}
