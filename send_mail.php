<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $to = filter_var($_POST['to'], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    
    // Additional headers
    $headers = "From: saurabhvishwakarma131@gmail.com\r\n";
    $headers .= "Reply-To: saurabhvishwakarma131@gmail.com\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Email body
    $emailBody = "
    <html>
    <head>
        <title>{$subject}</title>
    </head>
    <body>
        <h2>You have a new message</h2>
        <p><strong>Message:</strong></p>
        <p>{$message}</p>
    </body>
    </html>
    ";

    // Send email
    if (mail($to, $subject, $emailBody, $headers)) {
        echo "Email sent successfully to {$to}";
    } else {
        echo "Failed to send the email.";
    }
} else {
    echo "Invalid request method.";
}
?>
