<x-mail::message>
# Hello You Have Got Enquiry!

<h1>First name: {{ $data['firstName'] }}</h1>
<h1>Last name: {{ $data['lastName'] }}</h1>
<h2>Email: {{ $data['email']  }}</h2>
<p>Message: {{ $data['message']  }}</p>

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
