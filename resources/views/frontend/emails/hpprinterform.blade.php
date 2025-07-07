<!-- resources/views/emails/contact.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title>
</head>
<body>
    <h1>Form Submission</h1>
    <p><strong>Model Number:</strong> {{ $model_number }}</p>
    <p><strong>Full Name:</strong> {{ $full_name }}</p>
    <p><strong>Phone Number:</strong> {{ $phone_number }}</p>
    <p><strong>Issue:</strong> {{ $issue }}</p>
</body>
</html>
