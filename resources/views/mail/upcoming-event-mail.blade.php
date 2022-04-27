<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway:800">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
  font-family: 'Open Sans', sans-serif;
}
.modal-newsletter { 
  color: #9f9f9f;
  width: 525px;
  font-size: 15px;
}   
.modal-newsletter .modal-content {
  padding: 40px 50px;
  border-radius: 1px;   
  border: none;
}
.modal-newsletter .modal-header {
  border-bottom: none;   
  position: relative;
  text-align: center;
  border-radius: 5px 5px 0 0;
}
.modal-newsletter h4 {
  color: #000;
  text-align: center;
  font-family: 'Raleway', sans-serif;
  font-weight: 800;
  font-size: 30px;
  margin: 0;    
  text-transform: uppercase;
} 


.modal-newsletter .form-control, .modal-newsletter .btn {
  min-height: 46px;
  text-align: center;
  border-radius: 1px; 
}
.modal-newsletter .form-control {
  box-shadow: none;
  background: #f5f5f5;
  border-color: #d5d5d5;
}
.modal-newsletter .form-control:focus {
  border-color: #ccc;
  box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
}
.modal-newsletter .btn {
  color: #fff;
  background: #353535;
  text-decoration: none;
  transition: all 0.4s;
  line-height: normal;
  padding: 6px 20px;
  border: none;
  margin-top: 20px;
  font-family: 'Raleway', sans-serif;
  text-transform: uppercase;
}
.modal-newsletter .btn:hover, .modal-newsletter .btn:focus {
  background: #171717;
  outline: none;
  box-shadow: 0 0 8px rgba(0, 0, 0, 0.4);
}
.modal-newsletter .form-group {
  padding: 0 20px;
  margin-top: 30px;
}
.modal-newsletter .footer-link{
  margin-top: 20px;
  min-height: 25px;
}
.modal-newsletter .footer-link a {
  color: #353535;
  display: inline-block;
  border-bottom: 2px solid;
  font-weight: bold;
  text-align: center;   
  text-transform: uppercase;
  font-size: 14px;
}
.modal-newsletter .footer-link a:hover, .modal-newsletter .footer-link a:focus {
  text-decoration: none;
  border: none;
}
.hint-text {
  margin: 100px auto;
  text-align: center;
}
</style>
</head>
<body>


<div id="" class="">
  <div class="modal-dialog modal-newsletter">
    <div class="modal-content">
      <div>
        <div class="modal-header">
          <h4> Upcoming {{$data['_eventName']}}</h4>  
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span>&times;</span></button>
        </div>
        <div class="modal-body text-center">        
          <h5 >Hello dear family, please be informaed that there will be a {{$data['_eventName']}} event coming {{$data['_eventDate']}}. Details follow</h5>
          <div class="form-group">
            <ul class="list-group">
              @isset($data['_ticketPricing'])
             <li class="list-group-item"> Cost per student: {{$data['_ticketPricing']}} GHS </li>
             @endisset

              @isset($data['_eventDescription'])
             <li class="list-group-item"> Details: {{$data['_eventDescription']}} </li>
             @endisset

            </ul>
          </div>
          For extra informations please visit your dashboard 
          <div class="footer-link"><a href="{{ ('config.app')->fullUrl() }}">Dashboard </a></div>
        </div>
      </div>     
    </div>
  </div>
</div>
<!-- <p class="hint-text"><strong>Note:</strong> Please refresh the page or run the code to reload the modal.</p> -->
</body>
</html>