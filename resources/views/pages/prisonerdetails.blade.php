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
        <h1>{{$prisoner->first_name}}{{$prisoner->lastname}}  
        </h1>
      </div>
      <br/>
    
      <fieldset>
        <legend>Criminal Record
    </legend>
        <div class="columns">
        <div class="item">
            <label for="lname">Picture<span></span></label>
            <img src="{{env('APP_URL')/$prisoner->image}}"/>
          </div>
        <div class="item">
            <label for="lname">Station<span></span></label>
            <input id="lname" placeholder="{{$prisoner->station}}" disabled/>
          </div>
          <div class="item">
            <label for="fname">Case Number<span></span></label>
            <input id="fname" placeholder="{{$prisoner->case_number}}"disabled/>
          </div>
          <div class="item">
            <label for="lname">SOC Number<span></span></label>
            <input id="lname" type="text" placeholder="{{$prisoner->soc_number}}" diasbled/>
          </div>
          <div class="item">
            <label for="address">Arrest number<span></span></label>
            <input id="address" type="text"   placeholder="{{$prisoner->arrest_number}}" disabled/>
          </div>
         
          <div class="item">
            <label for="city">First Name<span></span></label>
            <input id="city" type="text"   placeholder="{{$prisoner->first_name}}" disabled/>
          </div>
          <div class="item">
            <label for="city">Last Name<span></span></label>
            <input id="city" type="text"   placeholder="{{$prisoner->last_name}}" disabled/>
          </div>
          <div class="item">
            <label for="city">Address<span></span></label>
            <input id="city" type="text" placeholder="{{$prisoner->address}}"/>
          </div>
          <div class="item">
            <label for="state">State<span></span></label>
            <input id="state" type="text"     placeholder="{{$prisoner->state}}" disabled/>
          </div>
          <div class="item">
            <label for="eaddress">Postal Code<span></span></label>
            <input id="eaddress" type="text"     placeholder="{{$prisoner->postal_code}}" disabled/>
          </div>
          <div class="item">
            <label for="phone">Phone<span></span></label>
            <input id="phone" type="tel"   placeholder="{{$prisoner->phone}}" disabled/>
            @error('phone')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
          </div>
          <div class="item">
            <label for="phone">Identification Number/Driver Licence<span>*</span></label>
            <input id="phone" type="text"   name="{{$prisoner->identification_number}}" value="{{old('identification_number')}}"/>
          </div>
          <div class="item">
            <label for="phone">Marital Status<span>*</span></label>
            <select id="phone" type="tel"   placeholder="marital_status" style="width:450px;">Marital Status
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
            <label for="phone">Date of Birth<span></span></label>
            <input id="phone"    placeholder="{{$prisoner->date_of_birth}}" disabled/>
          </div>
          <div class="item">
            <label for="phone">Sex<span></span></label><br/>
        <div style="display:inline-block">
        <input id="phone"   placeholder="{{$prisoner->sex}}" disabled/>
        </div>
          </div>
          <div class="item">
            <label for="phone">Ethnicity<span></span></label>
            <input placeholder="{{$prisoner->ethnicity}}" disabled> 
          </div>
          <div class="item">
            <label for="phone">Place of birth<span></span></label>
            <input id="phone" type="text"   placeholder="{{$prisoner->place_of_birth}}" disabled/>
          </div>
          <div class="item">
            <label for="phone">BVN<span></span></label>
            <input id="phone" type="text"   placeholder="{{$prisoner->bvn}}" disabled/>
          </div>
      </fieldset>
      
      <br/>
      <fieldset>
      <legend>Looks</legend>
      <div class="columns">
      <div class="item">
      <label for="checkindate">Height <span>*</span></label>
      <input id="checkindate" type="text" placeholder="{{$prisoner->height}}" disabled/>
      </div>
      <div class="item">
      <label for="checkoutdate">Weight <span>*</span></label>
      <input id="checkoutdate" type="" placeholder="{{$prisoner->weight}}" disabled/>
      </div>
      <div class="item">
      <p>Apperance <span>*</span></p>
      <div class="flex">
          <input placeholder="{{$prisoner->appearance}}" disabled>
      </div>
      </div>
      <div class="item">
      <p>Hair <span>*</span></p>
      <div class="flex">
      <input placeholder="{{$prisoner->hair}}" disabled>
      </div>
      </div>
      <div class="item">
      <p>Eye Color <span>*</span></p>
      <div class="flex">
      <input placeholder="{{$prisoner->eye_color}}" disabled>
      </div>
      </div>
      <div class="item">
      <label for="checkoutdate">Description of Complexion <span>*</span></label>
      <input id="checkoutdate" type="" placeholder="{{$prisoner->description_of_complexion}}" disabled/>
      </div>    
      </fieldset>
      <br/>
      <fieldset>
      <div class="columns">
          <legend>Employer's details</legend>
          <div class="item">
      <label for="checkoutdate">Employer's Name <span>*</span></label>
      <input id="checkoutdate" type="" placeholder="{{$prisoner->employer_name}}" disabled/>
      </div>
      <div class="item">
      <label for="checkoutdate">Employer's address <span>*</span></label>
      <input id="checkoutdate" type="" placeholder="{{$prisoner->employer_address}}" disabled/>
      </div>
      <div class="item">
      <label for="checkoutdate">Employer's state <span>*</span></label>
      <input id="checkoutdate" type="" placeholder="{{$prisoner->employer_state}}" disabled/>
      </div>
      <div class="item">
      <label for="checkoutdate">Employer's postal code <span>*</span></label>
      <input id="checkoutdate" type="" placeholder="{{$prisoner->employer_postalcode}}" disabled/>
      </div>
      <div class="item">
      <label for="checkoutdate">Job title <span>*</span></label>
      <input id="checkoutdate" type="" placeholder="{{$prisoner->job_title}}" disabled/>
      </div>
      
            </div>
      </fieldset>
      <fieldset>
          <legend>Other information</legend>
          <div class="columns">
          <div class="item">
      <label for="checkoutdate">What weapon was used for the crime? <span>*</span></label>
      <input id="checkoutdate" type="" placeholder="{{$prisoner->weapon}}"diasbled/>
      </div>
      <div class="item">
      <p>Outcome <span>*</span></p>
      <input  placeholder="{{$prisoner->outcome}}" disabled>
      </div>
      <div class="item">
      <label for="checkoutdate">Recording Personnel <span>*</span></label>
      <input id="checkoutdate" type="" placeholder="{{$prisoner->personnel}}" disabled/>

      </div>
          </div>
      </fieldset>
    </form>
    </div>
</div>
   </div>
</div>
    </div>
</div>
@endsection