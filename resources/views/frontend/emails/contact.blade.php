<!-- resources/views/emails/contact.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title>
</head>
<body>
    <h1>Contact Form Submission</h1>
    <p><strong>Name:</strong> {{ $full_name }}</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Contact:</strong> {{ $contact }}</p>
    <p><strong>City:</strong> {{ $city }}</p>
    <p><strong>Type:</strong> {{ $type }}</p>
    <p><strong>Brand:</strong> {{ $brand }}</p>
    <p><strong>Message OR Issue:</strong> {{ $issue }}</p>
</body>
</html>
