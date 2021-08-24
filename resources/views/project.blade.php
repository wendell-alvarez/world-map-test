@extends('layout.layout')
@section('content')    

<h2>World Map</h2>

<div class="row">
    You are located at &nbsp;<span id="current_location"></span> 
</div>

<div class="row">
    <form class="form-inline">
        <div class="form-group">
            <label for="latitude">Latitude</label>
            <input type="text" id="latitude" class="form-control mx-sm-3" name="latitude" required>
          </div>

          <span>and &nbsp;</span>
          <div class="form-group">
            <label for="longitude">Longitude</label>
            <input type="text" id="longitude" class="form-control mx-sm-3" name="longitude" required>
          </div>
      
        <button type="button" id="submitCoor" class="btn btn-primary mb-2">Submit</button>
      </form>
</div>

<div class="row">
    <div class="red-font">Invalid Latitude/Longitude </div>
</div>

<div class="row">
    <div id="mapid"></div>
</div>

@endsection

@section('extra_css')
<!-- Styles -->
<style>
    #mapid { 
        height: 1000px; 
        width: 1000px;
    }

    .red-font {
        color: red;
    }
</style>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
  integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
  crossorigin=""/>
  <link
  rel="stylesheet"
/>
@endsection

@section('extra_js')
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
  integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
  crossorigin=""></script>     

<script language="JavaScript" src="http://www.geoplugin.net/javascript.gp" type="text/javascript"></script>
<script src="{{asset('js/project.js')}}"></script>
@endsection