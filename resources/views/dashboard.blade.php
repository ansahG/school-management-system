

 @php 

// we query for the authenticated user's department from the db
  $department = auth()->user()->_department;

// then we prform a swtich case with the department so that users are shown what they have to see on login
  // Firt timw trying swtich with view and reember we did this in a php tag not neccesary laravel @awitch statement

    switch($department) 
    {
      case 'Administrator' : { echo( view('administrator.Index') ); }
      break; 
      case 'Accountant' : { echo( view('accountant.index') ); }
      break; 
      case 'Teacher' : { echo( view('Teacher.index') ); }
      break; 

      default: { echo(404); } 
      break; 
    }


     @endphp

