
@extends('construction_theme.home_master')

@section('title')
    Contact Us
 @endsection

<!DOCTYPE html>
<html>
  <head>
    <title>Contact Us Form In Materialize CSS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round&display=swap" rel="stylesheet">
    <style type="text/css">
      body{
      font-family: 'Varela Round', sans-serif;
      }
      h1{
      text-align: center;
      color: #000;
      }
      img{
      width: 100%;
      padding: 30px 30px 30px 0;
      }
      .center{
      display: flex;
      align-content: center;
      justify-content: center;
      height: 365px;
      }
      .btn{
      background-color: #2c3e50;
      }
      .btn:hover{
      background-color: #34495e;
      }
      .container{
      border: 1px solid #f2f2f2; 
      margin-top: 30px;
      margin-bottom: 30px;
      border-radius: 4px;
      }
      .col.s6{
      padding: 40px;
      }
      .mb-0{
      margin-bottom: 0;
      }
      .mt-25{
      margin-top: 25px;
      }
      button, input,{
      border-bottom-color: #fff !important;
      }
      .row{
      margin: 0;
      }
      input:not([type]), input[type=text]:not(.browser-default), input[type=password]:not(.browser-default), input[type=email]:not(.browser-default), input[type=url]:not(.browser-default), input[type=time]:not(.browser-default), input[type=date]:not(.browser-default), input[type=datetime]:not(.browser-default), input[type=datetime-local]:not(.browser-default), input[type=tel]:not(.browser-default), input[type=number]:not(.browser-default), input[type=search]:not(.browser-default), textarea.materialize-textarea,input:not([type]):focus:not([readonly]), input[type=text]:not(.browser-default):focus:not([readonly]), input[type=password]:not(.browser-default):focus:not([readonly]), input[type=email]:not(.browser-default):focus:not([readonly]), input[type=url]:not(.browser-default):focus:not([readonly]), input[type=time]:not(.browser-default):focus:not([readonly]), input[type=date]:not(.browser-default):focus:not([readonly]), input[type=datetime]:not(.browser-default):focus:not([readonly]), input[type=datetime-local]:not(.browser-default):focus:not([readonly]), input[type=tel]:not(.browser-default):focus:not([readonly]), input[type=number]:not(.browser-default):focus:not([readonly]), input[type=search]:not(.browser-default):focus:not([readonly]), textarea.materialize-textarea:focus:not([readonly]){
      box-shadow: none !important;
      border-bottom:2px solid #2c3e50 !important; 
      }
      textarea.materialize-textarea{
      height: 6rem;
      }
      .bg-main{
      background-color: #3f3d56;
      }
      @media(max-width: 992px){
      .s6:nth-child(1){
      display: none;
      }
      .s6{
      width: 100% !important;
      padding: 20px !important;
      }
      }
    </style>
  </head>

  @section('body_content')
  <body>
    <header>
      <h1>Contact Us Form</h1>
    </header>
    <div class="container pt-60">
      <div class="row">
        <div class="col s6">
          <div class="center">
            <img src="{{ asset('frontend/assets/img/bg.svg') }}">
          </div>
        </div>
        <div class="col s6 bg-main">
          <form action="#">
            <div class="row">
              <div class="input-field col s12">
                <input id="last_name" type="text" class="validate">
                <label for="last_name">Full Name</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="email" type="email" class="validate">
                <label for="email">Email</label>
              </div>
            </div>
            <div class="row mb-0">
              <div class="input-field col s12">
                <textarea id="textarea1" class="materialize-textarea"></textarea>
                <label for="textarea1">Address</label>
              </div>
            </div>
            <div class="row">
              <div class="col s12 mt-25">
                <button class="btn waves-effect waves-light" type="submit">Send
                <i class="material-icons right">send</i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js" type="text/javascript"></script>
  </body>
  @endsection
</html>