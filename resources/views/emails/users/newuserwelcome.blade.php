@component('mail::message')
# Welcome to EducationGuru 
{{$content->title}} Your User ID: {{$content->id}}

The **body** *of* _your message_.
<img src="http://ashutosh.com/storage/cover_images/{{$content->cover_image}}" style="width:200px; height:200px;">

@component('mail::button', ['url' => 'http://ashutosh.com/dashboard'])
Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
