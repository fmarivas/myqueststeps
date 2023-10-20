<?php
// Include Google OAuth library and initialize session
require_once 'config.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['access_token'])) {
    header('Location: index.php');
    exit();
}

// Get user data from Google
$google_client->setAccessToken($_SESSION['access_token']);
$user_info = $google_service->userinfo->get();

// Display user data
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2>User Profile</h2>
                <img src="<?php echo $user_info->picture; ?>" alt="Profile Picture" class="img-fluid rounded-circle">
                <p>Name: <?php echo $user_info->name; ?></p>
                <p>Email: <?php echo $user_info->email; ?></p>
                <form action="logout.php" method="post">
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger btn-block">Logout</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
