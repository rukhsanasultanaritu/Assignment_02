<?php
session_start();

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $experience = $_POST['experience'];
    $description = $_POST['description'];
    $project = $_POST['project'];
    $profile_image = $_FILES['profile_image'];

    if(empty($name) || empty($email) || empty($phone) || empty($experience) ||
       empty($description) || empty($project) || empty($profile_image['name']))
    {
        $_SESSION['error'] = 'All fields are required';
        header("Location: ../index.php");
        exit();
    }

    // File upload
    $target_dir = "../uploads/";
    if(!is_dir($target_dir)){
        mkdir($target_dir, 0777, true);
    }
    $target_file = $target_dir . basename($profile_image["name"]);
    move_uploaded_file($profile_image["tmp_name"], $target_file);

    // Database logic placeholder (insert into DB)
    $_SESSION['success'] = "User added successfully!";
    header("Location: ../index.php");
    exit();
}
?>