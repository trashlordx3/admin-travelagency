<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// // Handle preflight requests
// if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
//     http_response_code(200);
//     exit;
// }

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "thankyoutrip";

// $response = ['success' => false, 'message' => ''];

// try {
//     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//         // Validate and process form data
//         $name = $_POST['activity-name'] ?? '';
//         $description = $_POST['activity-description'] ?? '';
        
//         // File upload handling
//         if (empty($name) || empty($description)) {
//             throw new Exception('All fields are required');
//         }
//     // Handle file upload
//         $target_dir = "uploads/activities/";
//         if (!file_exists($target_dir)) {
//             mkdir($target_dir, 0777, true);
//         }
        
//         $target_file = $target_dir . basename($_FILES["activity-image"]["name"]);
//         $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
//     // Check if image file is valid
//         $check = getimagesize($_FILES["activity-image"]["tmp_name"]);
//         if ($check === false) {
//             $_SESSION['message'] = "File is not an image";
//             $_SESSION['message_type'] = 'error';
//             header("Location: create-activity.html");
//             exit();
//         }
    
//     // Allow certain file formats
//         if (!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
//             $_SESSION['message'] = "Only JPG, JPEG, PNG & GIF files are allowed";
//             $_SESSION['message_type'] = 'error';
//             header("Location: create-activity.html");
//             exit();
//         }
    
//     // Check file size (5MB limit)
//         if ($_FILES["activity-image"]["size"] > 5000000) {
//             $_SESSION['message'] = "File is too large (max 5MB)";
//             $_SESSION['message_type'] = 'error';
//             header("Location: create-activity.html");
//             exit();
//         }
    
//     // Generate unique filename
//         $new_filename = uniqid() . '.' . $imageFileType;
//         $target_path = $target_dir . $new_filename;

//     // Move uploaded file
//         if (move_uploaded_file($_FILES["activity-image"]["tmp_name"], $target_path)) {
//         // Prepare SQL statement
//         $stmt = $conn->prepare("INSERT INTO activity 
//                               (act_name, act_desc, act_image, created_at)
//                               VALUES (?, ?, ?, NOW())");
//         $stmt->execute([$name, $description, $target_path]);

//         $response['success'] = true;
//         $response['message'] = 'Activity created successfully';
//     }
// }
// } catch (Exception $e) {
//     $response['message'] = $e->getMessage();
// } finally {
//     $conn = null;
//     echo json_encode($response);
// }

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

$response = ['success' => false, 'message' => ''];

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Method not allowed', 405);
    }

    // Validate inputs
    if (empty($_POST['activity-name']) || empty($_POST['activity-description'])) {
        throw new Exception('All fields are required');
    }

    // Process data (temporarily skip file upload)
    $response['success'] = true;
    $response['message'] = 'Test success without file upload';

} catch (Exception $e) {
    http_response_code($e->getCode() ?: 500);
    $response['message'] = $e->getMessage();
}

echo json_encode($response);
exit;
?>