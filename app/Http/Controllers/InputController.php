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
  // $location=$this->find_word_location($pages,'2');
  // $location=$this->find_text_location($pages,'');
//   $location=$this->find_text_location($pages,'2');
//         echo "location";      
// var_dump($location);

// $resultText1 = $this->text_within($pages, 300, 280, 370, 300);
// $resultText2 = $this->text_within($pages, 300, 300, 370, 330);
// $resultText3 = $this->text_within($pages, 300, 330, 370, 360);
// $resultText4 = $this->text_within($pages, 860, 280, 947, 320);

// echo $resultText1;
// echo "\n";
// echo $resultText2;
// echo "\n";
// echo $resultText3;
// echo "\n";
// echo $resultText4;






$select = $annotation->fullText(); 
file_put_contents(public_path('test.json'), json_encode($pages));
// $file = fopen(public_path('test.txt'), "a"); 
// fwrite($file, json_encode($pages)); 
// fclose($file);
dd($pages);
dd($pages[0]["blocks"][0]["paragraphs"][0]["words"][0]);

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
    $bounding_boxs = [];
    foreach($pages as $page){
      foreach($page["blocks"] as $block) {
        foreach($block["paragraphs"] as $paragraph) {
          foreach($paragraph["words"] as $word) {
            foreach($word["symbols"] as $symbol) {

            // $assembled_word=$this->assemble_word($word);
            // if($assembled_word==$word_to_find) {
            //     $bounding_boxs[] = $word["boundingBox"];
            //     break;
            // }
            }
          }
        }
      }
    }
    return $bounding_boxs;
  }

  public function find_text_location($pages, $text_to_find)
  {
    $bounding_boxs = [];
    foreach($pages as $page){
      foreach($page["blocks"] as $block) {
        foreach($block["paragraphs"] as $paragraph) {
          foreach($paragraph["words"] as $word) {
            foreach($word["symbols"] as $symbol) {
              if ($symbol["text"] == $text_to_find) {
                $bounding_boxs[] = $word["boundingBox"];
                break;
              }
            // $assembled_word=$this->assemble_word($word);
            // if($assembled_word==$word_to_find) {
            //     $bounding_boxs[] = $word["boundingBox"];
            //     break;
            // }
            }
          }
        }
      }
    }
    return $bounding_boxs;
  }

  public function text_within($pages, $x1, $y1, $x2, $y2)
  {
    $text="";
    foreach($pages as $page) {
      foreach($page["blocks"] as $block) {
        foreach($block["paragraphs"] as $paragraph) {
          foreach($paragraph["words"] as $word) {
            foreach($word["symbols"] as $symbol) {
              $symbolBBV = $symbol["boundingBox"]["vertices"];
              $min_x=min($symbolBBV[0]["x"],$symbolBBV[1]["x"],$symbolBBV[2]["x"],$symbolBBV[3]["x"]);
              $max_x=max($symbolBBV[0]["x"],$symbolBBV[1]["x"],$symbolBBV[2]["x"],$symbolBBV[3]["x"]);
              $min_y=min($symbolBBV[0]["y"],$symbolBBV[1]["y"],$symbolBBV[2]["y"],$symbolBBV[3]["y"]);
              $max_y=max($symbolBBV[0]["y"],$symbolBBV[1]["y"],$symbolBBV[2]["y"],$symbolBBV[3]["y"]);

              if($min_x >= $x1 and $max_x <= $x2 and $min_y >= $y1 and $max_y <= $y2) {
              // if($symbolBBV[0]["x"] >= $x1 and $symbolBBV[2]["x"] <= $x2 and $symbolBBV[0]["y"] >= $y1 and $symbolBBV[2]["y"] <= $y2) {
                // echo "input " . $x1 ." ". $y1 ." ". $x2 ." ". $y2;
              // var_dump($symbolBBV);
                $text .= $symbol["text"];
                // var_dump($symbol);
                // if ($symbol["property"]["detectedBreak"]["type"]) {
                //   $symbolPDBT = $symbol["property"]["detectedBreak"]["type"];
                //   if($symbolPDBT==1 or $symbolPDBT==3) {
                //     $text .=' ';
                //   }
                //   if($symbolPDBT==2) {
                //     $text .='\t';
                //   }
                //   if($symbolPDBT==5){
                //     $text .='\n';
                //   }
                // }
              }
            }
          }
        }
      }
    }
    return $text;
  }
}
