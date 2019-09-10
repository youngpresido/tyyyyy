<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Fingerprint\Fleskcodesdk;
use Config;
use Event;
class flexcodeSDKController extends Controller
{
    public function status()
    {
    	$data = Flexcodesdk::getDevice();
    	return $data;
    }
    public function ac()
    {
    	echo env('FLEXCODE_AC') . env('FLEXCODE_SN');
    }
    public function register($id)
    {
    	echo Flexcodesdk::registerUrl($id);
    }
    public function save(Request $request, $id)
    {
    	$result = Flexcodesdk::register($id, $request->input('RegTemp'));
        $response = Event::fire('fingerprints.register', array($result));
    }
    public function verify(Request $request, $id)
    {
    	$user = \App\User::findOrFail($id);
        echo Flexcodesdk::verificationUrl($user, $request->all());
    }
    public function saveverify(Request $request, $id)
    {
    	$result = Flexcodesdk::verify($id, $request->input('VerPas'));
        // set action for this verification, default to login
        $result['extras'] = $request->all();
        // Let's tell laravel result of our verification
        $response = Event::fire('fingerprints.verify', array($result));
    }
}
