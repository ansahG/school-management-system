<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title> {{ config('app.name') }}</title>
  </head>
  <body>
   
	<div class="container" style="padding-top:30px">

		<h4 style="text-align: center;"> Changes in Ward's School Fees Account </h4>

	
		<div class="card" style="text-align:center">

			<p class="card-body" style="text-align:  center"> Dear sir/madam, this is to remind you that a change was made to the school fees account of your ward(( {{ $data['studentname'] }})) at {{ config('app.name') }}</p>

			<h5 style="text-align: center;text-decoration: underline;"> Run down is as follow: </h5>

			@isset($data['lastPayment'])
			<div class="row"> 
				<div class="col-4" style="text-align:right">
					<h4> Last changes :</h4>
				</div>
				<div class="col-6">
					<h4> 
						{{ $data['lastPayment'] }}
						<hr>
					</h4>
				</div>
			</div>
			@endisset

			@isset($data['availableBalance'])
			<div class="row"> 
				<div class="col-4" style="text-align:right">
					<h4> available Balance :</h4>
				</div>
				<div class="col-6">
					<h4> 
						{{  $data['availableBalance'] }}
						<hr>
					</h4>
				</div>
			</div>
			@endisset

			@isset($data['amount'])
			<div class="row"> 
				<div class="col-4" style="text-align:right">
					<h4> Current Fee Balance :</h4>
				</div>
				<div class="col-6">
					<h4> 
						{{  $data['amount'] }}
						<hr>
					</h4>
				</div>
			</div>
			@endisset
		

		</div>{{-- /main card --}}

	</div>{{-- /container --}}
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>