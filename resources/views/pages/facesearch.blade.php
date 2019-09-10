@extends('partials.master')
@section('content')
<div id="wrapper">

    <!-- Sidebar -->
   @include('partials.nav')
   <div id="content-wrapper">

<div class="container-fluid">
<div class="row">
    <div class="col-6" style="border:0px;">
<form method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image">
    <input type="submit">
</div>
</form>
</div>
    <div class="col-6" style="border:0px;">
    Dont have an image click <a href="#myModal" data-toggle="modal">here</a>
    </div>
</div>
<hr>
<div class="container">
<div class="row">
    <div class="col-6" style="border:0px;">
@if(isset($prisoner))
{{var_dump(type($prisoner))}}
@if(is_array($prisoner))
<?php
$url=env('APP_URL');
$prisoner_image=$prisoner->image;
$image=$url.$prisoner_image;
?>
<div class="card">
  <img src="{{$image}}" class="card-img-top" alt="..." style="margin:0 auto; width:100px; height:100px;">
  <div class="card-body">
    <h5 class="card-title"><b>Name:</b> {{$prisoner->first_name}} {{$prisoner->last_name}}</h5>
    <p class="card-text"><b>Status:</b>{{$prisoner->outcome}}</p>
    <a href="{{route('ki',$prisoner->id)}}" class="btn btn-primary">Check details
    </a>
  </div>
</div>
</div>
@else
<div class="alert alert-info">
    No face match
</div>
@endif
@endif
</div>
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