<?php

namespace App\Http\Controllers;

use App\Prisoner;
use Illuminate\Http\Request;
use DataTables;
use App\DataTables\PrisonersDataTable;
use \Clarifai\API\ClarifaiClient;
use \Clarifai\DTOs\Inputs\ClarifaiURLImage;
use Clarifai\DTOs\Searches\SearchBy;
use Clarifai\DTOs\Searches\SearchInputsResult;
use App\Traits\UploadTrait;
class PrisonerController extends Controller
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PrisonersDataTable $dataTable)
    {
        return $dataTable->render('pages.prisoners');
    }
    public function create() {
        $model = Prisoner::query();
    
        return DataTables::eloquent($model)
                    ->addColumn('pages.form', 'pages.form')
                    ->make(true);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'case_number'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'soc_number'=>'required',
            'arrest_number'=>'required',
            'address'=>'required',
            'state'=>'required',
            'postal_code'=>'required',
            'phone'=>'required',
            'identification_number'=>'required',
            'marital_status'=>'required',
            'date_of_birth'=>'required',
            'sex'=>'required',
            'ethnicity'=>'required',
            'height'=>'required',
            'weight'=>'required',
            'place_of_birth'=>'required',
            'job_title'=>'required',
            'appearance'=>'required',
            'hair'=>'required',
            'eye_color'=>'required',
            'bvn'=>'required',
            'description_of_complexion'=>'required',
            'station'=>'required',
            'outcome'=>'required',
            'weapon'=>'required',
            'personnel'=>'required',
            
            'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $image="";
        if ($request->has('image')) {
            $image = $request->file('image');
            $name = str_slug($request->first_name).'_'.time();
            $folder = '/uploads/images/';
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            $this->uploadOne($image, $folder, 'public', $name);
            $facess=env('APP_URL')."{$filePath}";
            // dd($facess);
            $result=$this->face($facess);
            // dd($result);
            if($result->status()->description()=="ok"){
                $image=$result->inputs();
                dd($image);
            }
        }

        $prisoner=new Prisoner([
            'case_number'=>$request->case_number,
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'soc_number'=>$request->soc_number,
            'arrest_number'=> $request->arrest_number,
            'address'=>$request->address,
            'state'=>$request->state,
            'postal_code'=>$request->postal_code,
            'phone'=>$request->phone,
            'identification_number'=>$request->identification_number,
            'marital_status'=>$request->marital_status,
            'date_of_birth'=>$request->date_of_birth,
            'sex'=>$request->sex,
            'ethnicity'=>$request->esthnicity,
            'height'=>$request->height,
            'weight'=>$request->weight,
            'place_of_birth'=>$request->place_of_birth,
            'employer_name'=>$request->employer_name,
            'employer_address'=>$request->employer_address,
            'employer_state'=>$request->employer_state,
            'employer_postalcode'=>$request->employer_postalcode,
            'job_title'=>$request->job_title,
            'appearance'=>$request->appearance,
            'hair'=>$request->hair,
            'eye_color'=>$request->eye_color,
            'bvn'=>$request->bvn,
            'description_of_complexion'=>$request->description_of_complexion,
            'station'=>$request->station,
            'outcome'=>$request->outcome,
            'weapon'=>$request->weapon,
            'personnel'=>$request->personnel,
            'finger_print'=>$request->fingerprint,
            'image'=>$image
        ]);
        if($prisoner->save()){
            return;
        }
    }
    
    
    
    
    public function face($result)
    {
        $client = new ClarifaiClient('f0a6f4493bc945a29a494d59f752e1f0');

$response = $client->addInputs([
    new ClarifaiURLImage($result),
])->executeSync();

        //  dd($response-> isSuccessful());
        if ($response-> isSuccessful()) {
            // echo "Response is successful.\n";
            // dd($response->isSuccessful());
            return $response;
        } else {
            echo "Response is not successful. Reason: \n";
            echo $response->status()->description() . "\n";
            echo $response->status()->errorDetails() . "\n";
            echo "Status code: " . $response->status()->statusCode();
        }
    }
    public function faceSearch()
    {
                
        $client = new ClarifaiClient('f0a6f4493bc945a29a494d59f752e1f0');

        $response = $client->searchInputs(
                SearchBy::imageURL('https://samples.clarifai.com/metro-north.jpg'))
            ->executeSync();

        if ($response-> isSuccessful()) {

            /** @var SearchInputsResult $result */
            $result = $response->get();
            foreach ($result->searchHits() as $searchHit) {
                echo $searchHit->input()->id() . ' ' . $searchHit->score() . "\n";
            }
        } else {
            echo "Response is not successful. Reason: \n";
            echo $response->status()->description() . "\n";
            echo $response->status()->errorDetails() . "\n";
            echo "Status code: " . $response->status()->statusCode();
        }
            }
}
