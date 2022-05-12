<!DOCTYPE html>
<html>
<head>
    @livewireStyles

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> </title>


  <style type="text/css">
    
body {
    background: rgb(99, 39, 120)
}

.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}

  </style>
</head>
<body>


<div class="container rounded bg-white mt-5 mb-5">
    <a class="btn btn-info" href="{{url()->previous()}}"> Go back</a>
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="{{ asset('/storage/studentAvatars/'.$admin_student->_studentAvatar) }}">
                <span class="font-weight-bold">{{ $admin_student->_firstName }}</span>
                <span class="text-black-100"> {{$age}} yrs </span>
                <span> </span></div>
        </div>
        <div class="col-md-6 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Information</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label>First Name</label>
                        <input  value="{{ $admin_student->_firstName }}" class="form-control" disabled>
                    </div>


                      <div class="col-md-6"><label> Surname</label>
                            <input  value="{{ $admin_student->_lastName }}" class="form-control" disabled>
                      </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label>Birthdate</label>
                        <input  value="{{ $admin_student->_birthDate }}" class="form-control" disabled>
                    </div>

                    <div class="col-md-6"><label>GH card/ ID</label>
                        <input  value="{{ $admin_student->_ghanaCard }}" class="form-control" disabled>
                    </div>

                     <div class="col-md-6"><label>Gender</label>
                        <input  value="{{ $admin_student->_gender }}" class="form-control" disabled>
                    </div>

                     <div class="col-md-6"><label>Religion</label>
                        <input  value="{{ $admin_student->_religion }}" class="form-control" disabled>
                    </div>

                    @isset($$admin_student->_moreInfo )
                    <div class="col-md-12"><label>Additional Info</label>
                        <textarea  value="" class="form-control" disabled> {{ $admin_student->_moreInfo }} </textarea>
                    </div>
                    @endisset



                    <h3 style="text-align: center;"> parent Information</h3>


                    <div class="col-md-12"><label>Parent Name</label>
                        <input  value="{{ $admin_student->_parentName }}" class="form-control" disabled>
                    </div>
                     <div class="col-md-12"><label>Parent Email</label>
                        <input  value="{{ $admin_student->_parentEmail }}" class="form-control" disabled>
                    </div>
                     <div class="col-md-12"><label>Parent Phone</label>
                        <input  value="{{ $admin_student->_parentPhone }}" class="form-control" disabled>
                    </div>

                    <div class="col-md-12"><label>Parent ID</label>
                        <input  value="{{ $admin_student->_parentGhanaCard }}" class="form-control" disabled>
                    </div>

                </div>




                <div class="row mt-3">
                    
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"> @livewire('administrator.students.trash-student', ['student' => $admin_student])
                </div><br>
            </div>
        </div>
    </div>
</div>
</div>
</div>

@livewireScripts
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>