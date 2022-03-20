@component('mail::message')

Hello there, thanks for registering your ward at {{ config('app.name') }} <br>
You provided the following information on the date of registring your ward. <br>
Make sure to cross check for perusal.

@isset($data)
	Student Information
	ward Name: {{ $data['_firstName']}} {{ $data['_lastName']}} {{ $data['_otherName']}} 
	ward Date of birth: {{ $data['_birthDate'] }} 
	ward Ghana Identity: {{ $data['_ghanaCard'] }} 
	ward Gender: {{ $data['_gender'] }} 
	ward Religion: {{ $data['_religion'] }} 
	ward Additional Info: {{ $data['_moreInfo'] }} 

			 Guardian Information  
	Guardian Name: {{ $data['_parentName'] }} 
	Guardian Email: {{ $data['_parentEmail'] }} 
	Guardian Phone: {{ $data['_parentPhone'] }} 
	Guardian Identity: {{ $data['_parentGhanaCard'] }} 

	Do cross check and condirm if this was your intended information, else please call for update. 
		Leave this message if it matches your expectation.

@endisset
Thanks,<br>
{{ config('app.name') }}
@endcomponent
