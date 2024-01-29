<x-mail::message>
# Hello You Have Got Enquiry!

<h1>First name: {{ $data['Firstname'] }}</h1>
<h1>Last name: {{ $data['Lastname'] }}</h1>
<h2>Email: {{ $data['email']  }}</h2>
<p>{{ $data['message']  }}</p>

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
