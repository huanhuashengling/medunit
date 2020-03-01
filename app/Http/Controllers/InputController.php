<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Vision\VisionClient;

use Illuminate\Support\Facades\Schema;

use App\Models\LaboratoryItem;
use App\Models\LaboratoryLog;
use App\Models\LaboratoryCommonItem;
use App\Models\LaboratoryReport;


use \Storage;

class InputController extends Controller
{
  public function index()
  {
    $laboratoryReports = LaboratoryReport::all();
    return view('input.index', compact("laboratoryReports"));
  }

  public function list()
  {
    $resultDatas = [];
    $laboratoryReports = LaboratoryReport::all();
    foreach ($laboratoryReports as $key => $laboratoryReport) {
      $commonData = [];
      $valueData = [];
      // $columns = $laboratoryReport->getTableColumns();
      $laboratoryCommonItems = LaboratoryCommonItem::all();
      foreach ($laboratoryCommonItems as $key => $commonItem) {
        $commonData[$commonItem->report_item_ch] = $laboratoryReport["$commonItem->bind_report_item_label"]; 
      }

      $laboratoryLogs = LaboratoryLog::where("laboratory_reports_id", $laboratoryReport->id)->get();
      foreach ($laboratoryLogs as $key => $laboratoryLog) {
        $laboratoryItem = LaboratoryItem::where("id", $laboratoryLog->laboratory_items_id)->first();
        $valItem = [];
        $valueItem["label"] = $laboratoryItem->laboratory_item_label;
        $valueItem["abb"] = $laboratoryItem->laboratory_item_abb;
        $valueItem["value"] = $laboratoryLog->result_value;
        $valueItem["towards"] = $laboratoryLog->towards;
        $valueItem["referStart"] = $laboratoryItem->refer_value_start;
        $valueItem["referEnd"] = $laboratoryItem->refer_value_end;
        $valueItem["unit"] = $laboratoryItem->item_unit;
        $valueData[] = $valueItem;
      }
      $resultDatas[] = ["commonData" => $commonData, "valueData" => $valueData];
      
    }

    return view('input.list', compact("resultDatas"));
  }

  public function readTextFromJsonData($jsonfilename = "test.json", $txtfilename = "first.txt")
  {
    $json_string = (Storage::disk('reports')->get($jsonfilename));
    $pages = json_decode($json_string, true);
    
    $resultLocations = $this->find_words_location($pages, "结果");

    // find barcode
    $barCodeLocation = $this->find_word_location($pages, "条形码")["vertices"];
    $barCodeWidth = 3 * ($barCodeLocation[2]["x"] - $barCodeLocation[0]["x"]);
    $barCode = $this->text_within($pages, 
                        $barCodeLocation[2]["x"] + 10, 
                        $barCodeLocation[0]["y"] - 5,
                        $barCodeLocation[2]["x"] + 10 + $barCodeWidth,
                        $barCodeLocation[2]["y"] + 5);
echo $barCode;
    $laboratoryItems = LaboratoryItem::where(["laboratory_type" => "血常规"])->get();

    $laboratoryCommonItems = LaboratoryCommonItem::all();
    $earlyText = (Storage::disk('reports')->get($txtfilename));
    echo $earlyText;
    // dd($pages);
    //find laboratoryReport by barcode makesure it's unique
    $laboratoryReport = LaboratoryReport::where(["bar_code" => $barCode])->first();

    if (isset($laboratoryReport)) {
      echo "There is an report with the same bar code!";
      return;
    }

 
    $laboratoryReport = new LaboratoryReport();
    foreach ($laboratoryCommonItems as $key => $item) {
      $preg= '/' . $item->find_by_label . '[\s\S]*?\\n/i';
      preg_match_all($preg, $earlyText, $res);
      if (isset($res[0][0])) {
        $explodeResult = explode(":", $res[0][0], 2);
        if (isset($explodeResult[1])) {
          $laboratoryReport[$item->bind_report_item_label] = trim($explodeResult[1]);
        } else {
          if (strpos($item->bind_report_item_label, "_time")) {
            $laboratoryReport[$item->bind_report_item_label] = "2020-03-01 06:22:36";
          } else {
            $laboratoryReport[$item->bind_report_item_label] = "";
          }
        }
      }
    }
    $laboratoryReport->bar_code = $barCode;
    $laboratoryReport->report_title = "中南大学湘雅二医院检验科检验报告单";
    // dd($laboratoryReport);
    $result = $laboratoryReport->save();
    $laboratoryReportId = LaboratoryReport::latest()->first()->id;
// dd($laboratoryReportId);

    foreach ($laboratoryItems as $key => $laboratoryItem) {
      $laboratory_item_abb = $laboratoryItem->laboratory_item_abb;
      $abbLocation = $this->find_word_location($pages, $laboratory_item_abb)["vertices"];
      $resultLocation = $resultLocations[$laboratoryItem->column_num]["vertices"];
      // var_dump($abbLocation);
      $resultText = $this->text_within($pages, 
                        $resultLocation[0]["x"] - 5, 
                        $abbLocation[0]["y"] - 5,
                        $resultLocation[2]["x"] + 5,
                        $abbLocation[2]["y"] + 5);
      $resultValue = floatval($resultText);
      $towards = $this->valueTowards($resultValue, $laboratoryItem->refer_value_start, $laboratoryItem->refer_value_end);
      // echo($laboratoryItem->laboratory_item_label . $laboratory_item_abb . ": " . $resultText . "    " . $towards);
      $laboratoryLog = new LaboratoryLog();
      $laboratoryLog->laboratory_reports_id = $laboratoryReportId;
      $laboratoryLog->laboratory_items_id = $laboratoryItem->id;
      $laboratoryLog->result_value = $resultValue;
      $laboratoryLog->towards = $towards;
      $laboratoryLog->save();
    }


    // dd($resultDatas);
      // die();

    return view('input.index');
  }

  public function valueTowards($value, $start, $end)
  {
    // return "";
    if ($value > $end) {
      return "high";
    } else if ($value < $start) {
      return "low";
    } else {
      return "-";
    }
  }

  public function imageUploadPost(Request $request) 
  {
    // $ext = $request->file('image')->extension();
    $file = $request->file('image');
    $originalName = $file->getClientOriginalName();
    // $bytes = File::size($filename);
    // 扩展名
    $ext = $file->getClientOriginalExtension();
    // $originalName = str_replace($originalName, ".".$ext);
    // MimeType
    $type = $file->getClientMimeType();
    // dd($originalName);
    // 临时绝对路径
    $realPath = $file->getRealPath();

    $uniqid = uniqid();
    $filename = $uniqid . '.' . $ext;

    $bool = Storage::disk('reports')->put($filename, file_get_contents($realPath));
    // return strval(public_path("reports/" . $filename)); 
    return $this->requestToGoogleAPI($uniqid, public_path("reports/" . $filename));
  }

  public function requestToGoogleAPI($uniqid, $filePath)
  {
    // get pages data from googleapis
    
    $vision = new VisionClient(['keyFile' => json_decode(file_get_contents(env('GOOGLE_APPLICATION_CREDENTIALS')), true)]); 

    $image = $vision->image(
      fopen($filePath, 'r'),
      ['TEXT_DETECTION']
    );
        
    $annotation = $vision->annotate($image);
    $earlyText = $annotation->text()[0]->description();
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






    // $select = $annotation->fullText(); 
    file_put_contents(public_path('gstest.json'), json_encode($pages));
    $jsonfilename = $uniqid . ".json";
    $txtfilename = $uniqid . ".txt";
    $bool = Storage::disk('reports')->put($jsonfilename, json_encode($pages));
    $bool = Storage::disk('reports')->put($txtfilename, $text);
    // dd($earlyText);
    // dd($pages[0]["blocks"][0]["paragraphs"][0]["words"][0]);

    $this->readTextFromJsonData($jsonfilename, $txtfilename);

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
  }

  public function find_texts_location($pages, $text_to_find)
  {
    $bounding_boxs = [];
    foreach($pages as $page){
      foreach($page["blocks"] as $block) {
        foreach($block["paragraphs"] as $paragraph) {
          foreach($paragraph["words"] as $word) {
            foreach($word["symbols"] as $symbol) {
              if ($text_to_find == $symbol["text"]) {
                $bounding_boxs[] = $symbol["boundingBox"];
              }
            }
          }
        }
      }
    }
    return $bounding_boxs;
  }

  public function find_words_location($pages, $word_to_find)
  {
    $bounding_boxs = [];
    foreach($pages as $page){
      foreach($page["blocks"] as $block) {
        foreach($block["paragraphs"] as $paragraph) {
          foreach($paragraph["words"] as $word) {
            $assembled_word=$this->assemble_word($word);
            if($assembled_word==$word_to_find) {
                $bounding_boxs[] = $word["boundingBox"];
                break;
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
              // echo "<p />";

                // echo "input " . $x1 ." ". $y1 ." ". $x2 ." ". $y2;
              // var_dump($symbolBBV);
              // echo "<p />";
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
