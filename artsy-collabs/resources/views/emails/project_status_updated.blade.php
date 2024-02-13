<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Status Updated</title>
</head>
<body>
    @if($userProject->user)
        <p>Dear {{ $userProject->user->name }},</p>
    @else
        <p>Dear User,</p>
    @endif

    @if($userProject->project)
        <p>We are writing to inform you that the status of the project "{{ $userProject->project->title }}" has been {{ $userProject->response_status }}.</p>
    @else
        <p>We are writing to inform you that the status of a project has been updated to {{ $userProject->response_status }}.</p>
    @endif

    <p>Thank you.</p>
</body>
</html>
