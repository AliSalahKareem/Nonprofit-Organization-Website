<?php
// إعدادات الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";  // قم بتغيير هذا إلى اسم مستخدم قاعدة البيانات الخاص بك
$password = "";  // قم بتغيير هذا إلى كلمة مرور قاعدة البيانات الخاصة بك
$dbname = "imdad";  // اسم قاعدة البيانات

// إنشاء الاتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// التحقق من أن الطلب تم إرساله عبر POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // استقبال البيانات من النموذج
    $name = $conn->real_escape_string($_POST['name']);
    $province = $conn->real_escape_string($_POST['province']);
    $region = $conn->real_escape_string($_POST['region']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $email = $conn->real_escape_string($_POST['email']);
    $requestType = $conn->real_escape_string($_POST['requestType']);

    // التحقق من الحقول المطلوبة (الاسم، المحافظة، الهاتف، نوع الطلب)
    if (empty($name) || empty($province) || empty($phone) || empty($requestType)) {
        echo "يرجى ملء جميع الحقول المطلوبة.";
    } else {
        // SQL لإدخال البيانات في الجدول
        $sql = "INSERT INTO requests (name, province, region, phone, email, request_type) 
                VALUES ('$name', '$province', '$region', '$phone', '$email', '$requestType')";

        if ($conn->query($sql) === TRUE) {
            echo "تم إرسال الطلب بنجاح.";
        } else {
            echo "حدث خطأ: " . $sql . "<br>" . $conn->error;
        }
    }
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>
<html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        Done
    </body>
    </html>
</html>