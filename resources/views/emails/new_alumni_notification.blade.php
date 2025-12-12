<!DOCTYPE html>
<html>
<head>
    <title>New Alumni Added</title>
</head>
<body>
    <h2>New Alumni Added</h2>
    <p><strong>Name:</strong> {{ $alumni->full_name }}</p>
    <p><strong>Email:</strong> {{ $alumni->email }}</p>
    <p><strong>Graduation Year:</strong> {{ $alumni->graduation_year }}</p>
    <p><strong>Program:</strong> {{ $alumni->program }}</p>
    <p><strong>Job:</strong> {{ $alumni->job }}</p>
    <p><strong>Company:</strong> {{ $alumni->company }}</p>
    <p><strong>Phone:</strong> {{ $alumni->phone }}</p>
    <p><strong>Address:</strong> {{ $alumni->address }}</p>
</body>
</html>
