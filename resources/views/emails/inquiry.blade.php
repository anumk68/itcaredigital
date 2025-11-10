@component('mail::message')
# New Customer Inquiry

**Brand:** {{ $inquiry->brand }}  
**Model Number:** {{ $inquiry->model_number }}  
**Name:** {{ $inquiry->name }}  
**Email:** {{ $inquiry->email }}  
**Country Code:** {{ $inquiry->country_code }}  
**Phone Number:** {{ $inquiry->phone_number }}  
**Issue Description:**  
{{ $inquiry->issue_description }}

@if($inquiry->service_slug)
**Service Slug:** {{ $inquiry->service_slug }}
@endif

@endcomponent
