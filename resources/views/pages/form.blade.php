@extends('partials.master')
@section('content')
<div id="wrapper">

    <!-- Sidebar -->
   @include('partials.nav')
   <div id="content-wrapper">

<div class="container-fluid">
<div class="testbox">
    <form method="post" enctype="multipart/form-data">
        @csrf
      <div class="banner">
        <h1>New Registration</h1>
      </div>
      <br/>
    
      <fieldset>
        <legend>Enter Criminal Record
    </legend>
        <div class="columns">
        <div class="item">
            <label for="zip">Recording Station<span>*</span></label>
            <select id="zip" type="text"   name="station" value="{{old('station')}}">
                <option>The Nigerian Police, Osisioma Aba</option>
                <option>The Nigerian Divisional Police Headquarters,Ariaria</option>
                <option>Central Police Station Umuahia command, Ohafia</option>
                <option>Federal Zone 9 Command,Umuahia</option>
                <option>State Police Command,Umuahia</option>
                <option>Umuobiakwa Police Station</option>
                <option>The Nigerian Police Railway Police Divisional Headquarters,Railway station Aba</option>
                <option>Uzuakoli Divisional Police Headquarters</option>
                <option>Eziukwu Rd.Police station</option>
            </select>
            @error('station')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
          </div>
          <div class="item">
            <label for="fname">Case Number<span>*</span></label>
            <input id="fname" type="text" name="case_number" value="{{old('case_number')}}"/>
            @error('case_number')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
          </div>
          <div class="item">
            <label for="lname">SOC Number<span>*</span></label>
            <input id="lname" type="text" name="soc_number" value="{{old('soc_number')}}"/>
            @error('soc_number')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
          </div>
          <div class="item">
            <label for="address">Arrest number<span>*</span></label>
            <input id="address" type="text"   name="arrest_number" value="{{old('arrest_number')}}"/>
            @error('arrest_number')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
          </div>
         
          <div class="item">
            <label for="city">First Name<span>*</span></label>
            <input id="city" type="text"   name="first_name" value="{{old('first_name')}}"/>
            @error('first_name')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
          </div>
          <div class="item">
            <label for="city">Last Name<span>*</span></label>
            <input id="city" type="text"   name="last_name" value="{{old('last_name')}}"/>
            @error('last_name')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
          </div>
          <div class="item">
            <label for="city">Address<span>*</span></label>
            <input id="city" type="text"   name="address" value="{{old('address')}}"/>
            @error('address')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
          </div>
          <div class="item">
            <label for="state">State<span>*</span></label>
            <input id="state" type="text"     name="state" value="{{old('state')}}"/>
            @error('state')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
          </div>
          <div class="item">
            <label for="eaddress">Postal Code<span>*</span></label>
            <input id="eaddress" type="text"     name="postal_code" value="{{old('postal_code')}}"/>
            @error('postal_code')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
          </div>
          <div class="item">
            <label for="phone">Phone<span>*</span></label>
            <input id="phone" type="tel"   name="phone" value="{{old('phone')}}"/>
            @error('phone')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
          </div>
          <div class="item">
            <label for="phone">Identification Number/Driver Licence<span>*</span></label>
            <input id="phone" type="text"   name="identification_number" value="{{old('identification_number')}}"/>
            @error('identification_number')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
          </div>
          <div class="item">
            <label for="phone">Marital Status<span>*</span></label>
            <select id="phone" type="tel"   name="marital_status" style="width:450px;">Marital Status
                <option>Single</option>
                <option>Married</option>
                <option>Divorced</option>
            </select>
            @error('marital_status')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
          </div>
          <div class="item">
            <label for="phone">Date of Birth<span>*</span></label>
            <input id="phone" type="date"   name="date_of_birth" value="{{old('date_of_birth')}}"/>
            @error('date_of_birth')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
          </div>
          <div class="item">
            <label for="phone">Sex<span>*</span></label><br/>
        <div style="display:inline-block">
            <label style="width:20%;">Male<input id="phone" type="radio" style="display:block;box-shadow:4px 4px 8px white"  name="sex" value="male"/></label>
            <label>Female<input id="phone" type="radio"  style="display:block; box-shadow:4px 4px 8px white" name="sex" value="female"/></label>
        </div>
            @error('sex')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
          </div>
          <div class="item">
            <label for="phone">Ethnicity<span>*</span></label>
            <input id="phone" type="checkbox" style="display:block; box-shadow:4px 4px 8px white"  name="ethnicity" value="1">Hausa
            <input id="phone" type="checkbox"  style="display:block; box-shadow:4px 4px 8px white" name="ethnicity" value="2">Yoruba
            <input id="phone" type="checkbox"  style="display:block;box-shadow:4px 4px 8px white" name="ethnicity" value="3">Igbo
            <input id="pho" type="checkbox"  style="display:block;box-shadow:4px 4px 8px white" name="ethnicity" value="4">Other
            <!-- <input id="phones" type="text" style="display:none;" name="ethnicity"> -->
            <script>
                var t=document.getElementById("pho");
                var c=document.getElementById('phones');
                
                t.addEventListener("click",function(){
                    if(t.checked=true){
                        c.style.display="block";
                    }
                   
                    
                })
            </script>
            @error('ethnicity')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
          </div>
          <div class="item">
            <label for="phone">Place of birth<span>*</span></label>
            <input id="phone" type="text"   name="place_of_birth" value="{{old('place_of_birth')}}"/>
            @error('place_of_birth')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
          </div>
          <div class="item">
            <label for="phone">BVN<span>*</span></label>
            <input id="phone" type="text"   name="bvn" value="{{old('bvn')}}"/>
            @error('bvn')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
          </div>
      </fieldset>
      
      <br/>
      <fieldset>
      <legend>Looks</legend>
      <div class="columns">
      <div class="item">
      <label for="checkindate">Height <span>*</span></label>
      <input id="checkindate" type="text" name="height" value="{{old('height')}}"/>
            @error('height')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
      </div>
      <div class="item">
      <label for="checkoutdate">Weight <span>*</span></label>
      <input id="checkoutdate" type="" name="weight" value="{{old('weight')}}"/>
            @error('weight')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
      </div>
      <div class="item">
      <p>Apperance <span>*</span></p>
      <div class="flex">
      <label style="width:30%">Scars<input type="checkbox" name="appearance" style="display:block; box-shadow:4px 4px 8px white" value="Scars"/></label>
      <label style="width:30%">Tattoos<input type="checkbox" name="appearance" style="display:block; box-shadow:4px 4px 8px white" value="Tattoos"/></label>
      <label style="width:33%">Marks<input type="checkbox" name="appearance" style="display:block; box-shadow:4px 4px 8px white" value="Marks"/></label>
      </div>
      @error('appearance')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
      </div>
      <div class="item">
      <p>Hair <span>*</span></p>
      <div class="flex">
      <label style="width:25%">Low cut<input type="radio" name="hair" style="display:block; box-shadow:4px 4px 8px white" value="Low cut"/></label>
      <label style="width:25%">Full hair<input type="radio" name="hair" style="display:block; box-shadow:4px 4px 8px white" value="full hair"/></label>
      <label style="width:25%">Dreadlocks<input type="radio" name="hair" style="display:block; box-shadow:4px 4px 8px white" value="dreadlock"/></label>
      <label style="width:25%">Weaved<input type="radio" name="hair" style="display:block; box-shadow:4px 4px 8px white" value="weaved"/></label>
      <label style="width:25%">Plaited<input type="radio" name="hair" style="display:block; box-shadow:4px 4px 8px white" value="plaited"/></label>
      <label style="width:25%">Skin<input type="radio" name="hair" style="display:block; box-shadow:4px 4px 8px white" value="skin"/></label>
      </div>
      @error('hair')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
      </div>
      <div class="item">
      <p>Eye Color <span>*</span></p>
      <div class="flex">
      <label style="width:25%">Black<input type="radio" name="eye_color" style="display:block; box-shadow:4px 4px 8px white" value="black"/></label>
      <label style="width:25%">Brown<input type="radio" name="eye_color" style="display:block; box-shadow:4px 4px 8px white" value="brown"/></label>
      <label style="width:25%">Others<input type="radio" name="eye_color" style="display:block; box-shadow:4px 4px 8px white" value="other"/></label>
      
      </div>
      @error('hair')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
      </div>
      
      <div class="item">
      <label for="checkoutdate">Description of Complexion <span>*</span></label>
      <input id="checkoutdate" type="" name="description_of_complexion" value="{{old('description_of_complexion')}}"/>
            @error('description_of_complexion')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
      </div>    
      </fieldset>
      <br/>
      <fieldset>
      <div class="columns">
          <legend>Employer's details</legend>
          <div class="item">
      <label for="checkoutdate">Employer's Name <span>*</span></label>
      <input id="checkoutdate" type="" name="employer_name" value="{{old('employer_name')}}"/>
            @error('employer_name')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
      </div>
      <div class="item">
      <label for="checkoutdate">Employer's address <span>*</span></label>
      <input id="checkoutdate" type="" name="employer_address" value="{{old('employer_address')}}"/>
            @error('employer_address')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
      </div>
      <div class="item">
      <label for="checkoutdate">Employer's state <span>*</span></label>
      <input id="checkoutdate" type="" name="employer_state" value="{{old('employer_state')}}"/>
            @error('employer_state')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
      </div>
      <div class="item">
      <label for="checkoutdate">Employer's postal code <span>*</span></label>
      <input id="checkoutdate" type="" name="employer_postalcode" value="{{old('employer_postalcode')}}"/>
            @error('employer_postalcode')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
      </div>
      <div class="item">
      <label for="checkoutdate">Job title <span>*</span></label>
      <input id="checkoutdate" type="" name="job_title" value="{{old('job_title')}}"/>
            @error('job_title')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
      </div>
      
      
            </div>
      </fieldset>
      <fieldset>
          <legend>Other information</legend>
          <div class="columns">
          <div class="item">
      <label for="checkoutdate">What weapon was used for the crime? <span>*</span></label>
      <input id="checkoutdate" type="" name="weapon" value="{{old('weapon')}}"/>
            @error('weapon')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
      </div>
      <div class="item">
      <p>Outcome <span>*</span></p>
      <select name="outcome">
      <option>Discharged and acquinted</option>
      <option>Convicted(fine)</option>
      <option>Charged to court</option>
      <option>Remanded in prison</option>
      <option>Police bail</option>
      <option>Court bail</option>
      <option>Others</option>
      </select>
      @error('outcome')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
      </div>
      <div class="item">
      <label for="checkoutdate">Recording Personnel <span>*</span></label>
      <input id="checkoutdate" type="" name="personnel" value="{{old('personnel')}}"/>
            @error('personnel')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
      </div>
          </div>
      </fieldset>
      <br/>
      <fieldset>
          <legend>Uploads</legend>
          <div class="columns">
          <div class="item">
      <label for="checkoutdate">Upload Picture <span>*</span></label>

    <input type="file" name="image" capture >
            @error('personnel')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
    <div>
        if you don't have a picture, click <a href="#myModal" data-toggle="modal">here</a>to take a picture
    </div>
      </div>
      <div class="item">
      <label for="checkoutdate">Take Fingerprint <span>*</span></label>

      <!-- <input id="vid-take" type="button" value="Take Photo"/> -->
      <!-- <input type="file" accept="image/*;capture=camera"> -->
      {{ flexcodesdk::getRegistrationLink(1) }}
            @error('personnel')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
      </div>
          </div>
      </fieldset>
      <div class="btn-block">
      <input type="submit">
      </div>
    </form>
    </div>
</div>
   </div>
</div>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Take Photo</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            <div id="vid-controls">
<video id="video" width="360" height="360" autoplay="true"></video>
      <input id="vid-take" type="button" value="Take Photo"/>
      <!-- <input id="vid" type="button" value="Upload Photo"/> -->
      <!-- <input type="file" accept="image/*;capture=camera"> -->
      <div id="vid-canvas" style="width:400px; height:400px; border:20px solid grey;"></div><hr/>
    </div>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> -->
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>
<script>
    'use strict';

const video = document.querySelector('video');
const canvas = document.getElementById('canvas');
const snap = document.getElementById("snap");
const errorMsgElement = document.querySelector('span#errorMsg');
const vendorUrl=window.URL||window.webkitURL;

navigator.getMedia=navigator.getUserMedia||navigator.webkitGetUserMedia||
                    navigator.mozGetUserMedia ||
                    navigator.msGetUserMedia;

// if (navigator.mediaDevices.getUserMedia) {
//   navigator.mediaDevices.getUserMedia({ video: true })
//     .then(function (stream) {
//       video.srcObject = stream;
//     })
//     .catch(function (error) {
//       console.log("Something went wrong!");
//     });
// }
// function stop(e) {
//   var stream = video.srcObject;
//   var tracks = stream.getTracks();

//   for (var i = 0; i < tracks.length; i++) {
//     var track = tracks[i];
//     track.stop();
//   }

//   video.srcObject = null;
// }
window.addEventListener("load", function(){
  // [1] GET ALL THE HTML ELEMENTS
  var video = document.getElementById("video"),
      canvas = document.getElementById("vid-canvas"),
      take = document.getElementById("vid-take"),
      upload = document.getElementById("vid");

  // [2] ASK FOR USER PERMISSION TO ACCESS CAMERA
  // WILL FAIL IF NO CAMERA IS ATTACHED TO COMPUTER
  navigator.mediaDevices.getUserMedia({ video : true })
  .then(function(stream) {
    // [3] SHOW VIDEO STREAM ON VIDEO TAG
    video.srcObject = stream;
    video.play();

    // [4] WHEN WE CLICK ON "TAKE PHOTO" BUTTON
    take.addEventListener("click", function(){
      // Create snapshot from video
      var draw = document.createElement("canvas");
      draw.width = video.videoWidth;
      draw.height = video.videoHeight;
      var context2D = draw.getContext("2d");
      context2D.drawImage(video, 0, 0, 360,360);
      // Output as file
    //   console.log(video.videoWidth);
  
    // canvas.removeChild()
    if(canvas.hasChildNodes()){
        canvas.removeChild(canvas.firstChild);
      }
            
      var anchor = document.createElement("img");
      anchor.src = draw.toDataURL("image/png");
      anchor.download = "webcam.png";
      anchor.innerHTML = "Click to download";
      canvas.innerHTML = "";
      var anchors = document.createElement("a");
      anchors.href = draw.toDataURL("image/png");
      anchors.download = "webcam.png";
      anchors.innerHTML = "Click to download";
      canvas.innerHTML = "";
        canvas.appendChild(anchors);
        
        canvas.appendChild(anchor);

    //   upload.style.display='block';
    //   console.log(canvas);
    });
  })
  .catch(function(err) {
    document.getElementById("vid-controls").innerHTML = "Please enable access and attach a camera";
  });
});

    </script>
@endsection