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
use GuzzleHttp\Client;
// use Intervention\Image\Facades\Image as Image;
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
        $files="";
        if ($request->has('image')) {
            $image = $request->file('image');
            $name = str_slug($request->first_name).'_'.time();
            $folder = '/uploads/images/';
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            $this->uploadOne($image, $folder, 'public', $name);
            // dd($this->uploadOne($image, $folder, 'public', $name));
            $files=$filePath;
            $facess=env('APP_URL')."{$filePath}";
            // dd($facess);
            $sc="{$request->firstname}".uniqid();
            // dd($sc);
            // dd($facess);
            $result=$this->addfacetoken($facess);
            // $result=$this->kairosenrol($facess,$sc);   
            // dd($result->status()->description());
            // if($result->status()->description()=="Ok"){
            //     $image=$result->get()[0]->id();
            //     // dd($image);
            // }
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
            'ethnicity'=>$request->ethnicity,
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
            'image_id'=>$image,
            'image'=>$files
        ]);
        if($prisoner->save()){
            return "saved successfully";
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
    public function faceSearch($test)
    {
                
        $client = new ClarifaiClient('f0a6f4493bc945a29a494d59f752e1f0');

        $response = $client->searchInputs(
                SearchBy::imageURL($test))
            ->executeSync();
        
            dd($response);
        if($response-> isSuccessful()) {

            /** @var SearchInputsResult $    */
            $result = $response->get();
            foreach ($result->searchHits() as $searchHit) {
                echo $searchHit->input()->id() . ' ' . $searchHit->score() . "\n";
                if($searchHit->score()>=0.8000000){
                    return $searchHit->input()->id();
                }
            }
        } else {
            echo "Response is not successful. Reason: \n";
            echo $response->status()->description() . "\n";
            echo $response->status()->errorDetails() . "\n";
            echo "Status code: " . $response->status()->statusCode();
        }
            }
        public function facetsearch(Request $request)
        {
            // dd($request->has('image'));
            if ($request->has('image')) {
                $image = $request->file('image');
                $name = time();
                $folder = '/uploads/images/search/';
                $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
                $this->uploadOne($image, $folder, 'public', $name);
                $files=$filePath;

                // $location = base_path().'/public/uploads/images' . $name;
            // Image::make($image)->resize(950, 700)->save($location);
            // $admin->admin_pro_pic = $name; 
                // $prisoner=Prisoner::whereId(1)->first();
                // $face1=env('APP_URL')."/uploads/images/segun_1567771035.jpeg";
                $facess=env('APP_URL')."{$filePath}";
                $result=$this->kairosearch($facess);
                // dd($facess);
                // $result=$this->facesearch($facess);   
                // dd($result->status()->description());
                // if($result->status()->description()=="Ok"){
                //     $image=$result->get()[0]->id();
                //     // dd($image);
                // }
                // $prisoner_images=Prisoner::all();
            //     $myImage="";
            //     foreach($prisoner_images as $prisoner_image){
            //         $result=$this->facex($facess,env('APP_URL').$prisoner_image->image);
            //         if($result->confidence>=0.6){
            //             $myImage=$prisoner_image->id;
            //             break;
            //         }
            //     }
            //     if($myImage!=""){
            //         $myResult=Prisoner::whereId($myImage)->first();
            //         return $myResult;
            //     }
            //     return "no account for this person";
                
            }   
        }
        public function facex($m1,$m2)
        {
            $headers = [
                'Content-Type' => 'application/json',
                'user_id'=>'229e1de8b60a841ca29c',
                'user_key'=>'2b6b6c489d8410a3eed8'
            ];
            $client = new GuzzleClient([
                'headers' => $headers
            ]);

            $body = '{
                "img_1" : '.$m1.',
                "img_2" : '.$m2.',
            }';
            $r = $client->request('POST', 'http://www.facexapi.com/compare_faces?face_det=1', [
                'body' => $body
            ]);
            $response = $r->getBody()->getContents();
            dd($response);
        }


        public function addperson($person){
            $curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://api.luxand.cloud/subject",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => [ "name" => $person], 
	CURLOPT_HTTPHEADER => array(
		"token: 129e7db4f08940a2873d7b25842f20ab"
	),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}
        }



        public function addface($id,$url)
        {
            $curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://api.luxand.cloud/subject/".$id,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	// CURLOPT_POSTFIELDS => [ "photo" => curl_file_create("photo.jpg")], 
	// or use URL
	CURLOPT_POSTFIELDS => [ "photo" => $url ], 
	CURLOPT_HTTPHEADER => array(
		"token: 129e7db4f08940a2873d7b25842f20ab"
	),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}
        }


        public function verifyface($id,$url){

$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://api.luxand.cloud/photo/verify/".$id,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	// CURLOPT_POSTFIELDS => [ "photo" => curl_file_create("photo.jpg")], 
	// or use URL
	CURLOPT_POSTFIELDS => [ "photo" => $url ], 
	CURLOPT_HTTPHEADER => array(
		"token: 129e7db4f08940a2873d7b25842f20ab"
	),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}
        }



        public function kairosenrol($m1,$name)
        {
            $headers = [
                'Content-Type' => 'application/json',
                'app_id'=> "e28ce17f",
                'app_key'=> "dffd35811459f63b747e3ed15eaf8efb"

            ];
            $client = new GuzzleClient([
                'headers' => $headers
            ]);
            $myWork='myWork';

            $body = '{
                "image" : '.$m1.',
                "gallery_name" : '.$myWork.',
                "subject_id":'.$name.'
            }';
            $r = $client->request('POST', 'http://api.kairos.com/enroll', [
                'body' => $body
            ]);
            $response = $r->getBody()->getContents();
            dd($response);
        }
        public function kairosearch($url)
        {
            $headers = [
                'Content-Type' => 'application/json',
                'app_id'=> "e28ce17f",
                'app_key'=> "dffd35811459f63b747e3ed15eaf8efb"

            ];
            $client = new GuzzleClient([
                'headers' => $headers
            ]);
            $myWork='myWork';

            $body = '{
                "image" : '.$url.',
                "gallery_name" : '.$myWork.',
        
            }';
            $r = $client->request('POST', 'http://api.kairos.com/recognize', [
                'body' => $body
            ]);
            $response = $r->getBody()->getContents();
            dd($response);
        }
        public function detectface($url)
        {
            $data = array(
                "api_key"=>"md-UGvEKzPVwzYNwWkGXMMKRZoVl5dVc",
                "api_secret"=>"i6aysWk3H2h6LNgAqJhhar7SBEjUz7NC",
                "image_url" => $url,
);
            
                        
            $client = new Client();
$response = $client->post('https://api-us.faceplusplus.com/facepp/v3/detect', ['body' => $data]);

$result = $response->getBody()->getContents();
dd($result);
            

        }

        public function addfacetoken($urls)
        {
            $token=$this->detectface($urls);
            $headers = [
                'Content-Type' => 'application/json',
            ];
            $client = new GuzzleClient([
                'headers' => $headers
            ]);
            $myWork='myWork';

            $body = '{
                "api_key":"md-UGvEKzPVwzYNwWkGXMMKRZoVl5dVc",
                "api_secret":"i6aysWk3H2h6LNgAqJhhar7SBEjUz7NC",
                "face_tokens" : '.$token.',
                "faceset_token":"2812bbd19aa1c8c9dc2aa0f018c336c6",

        
            }';
            $r = $client->request('POST', 'https://api-us.faceplusplus.com/facepp/v3/faceset/addface', [
                'body' => $body
            ]);
            $response = $r->getBody()->getContents();
            dd($response);


        }
        public function faceplussearch($url)
        {
            // $token=$this->detectface($urls);
            $headers = [
                'Content-Type' => 'application/json',
            ];
            $client = new GuzzleClient([
                'headers' => $headers
            ]);
            $myWork='myWork';

            $body = '{
                "api_key":"md-UGvEKzPVwzYNwWkGXMMKRZoVl5dVc",
                "api_secret":"i6aysWk3H2h6LNgAqJhhar7SBEjUz7NC",
                "image_url" : '.$url.',
                "faceset_token":"2812bbd19aa1c8c9dc2aa0f018c336c6",

        
            }';
            $r = $client->request('POST', 'https://api-us.faceplusplus.com/facepp/v3/search', [
                'body' => $body
            ]);
            $response = $r->getBody()->getContents();
            dd($response);
        }
}
