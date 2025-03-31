<!DOCTYPE html>
<html>
<head>
<title>Employee Manager</title>
<!-- css file not properly linked to -->
<!-- <link rel="stylesheet" href="app.css"> -->
<link rel="stylesheet" href="frontend/css/app.css">
</head>
<body>
    <h1>Demo</h1>
    <ul>
        <li><a href="/frontend/login.html">Login</a></li>
        <li><a href="/frontend/employee_edit.html">Edit Profile</a></li>
    </ul>
    <p style="color:white"><?php echo password_hash('letmein2025!', PASSWORD_DEFAULT) ?></p>
</body>