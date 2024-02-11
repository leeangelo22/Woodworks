<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if recipient email and feedback message are provided
    if (isset($_POST["recipient_email"]) && isset($_POST["feedback_message"])) {
        // Sanitize input data
        $recipient_email = filter_var($_POST["recipient_email"], FILTER_SANITIZE_EMAIL);
        $feedback_message = htmlspecialchars($_POST["feedback_message"]);

        // Validate recipient email
        if (!filter_var($recipient_email, FILTER_VALIDATE_EMAIL)) {
            // Invalid email format
            echo "Invalid recipient email format.";
            exit();
        }

        // Email details
        $to = $recipient_email;
        $subject = "Feedback from P.R.S. Woodworks";
        $message = $feedback_message;
        $headers = "From: admin@example.com\r\n";
        $headers .= "Reply-To: admin@example.com\r\n";
        $headers .= "Content-type: text/html\r\n";

        // Send email
        if (mail($to, $subject, $message, $headers)) {
            echo "Feedback sent successfully!";
        } else {
            echo "Failed to send feedback. Please try again later.";
        }
    } else {
        echo "Recipient email and feedback message are required.";
    }
} else {
    // Redirect if accessed directly
    header("Location: ../admin_dashboard.php");
    exit();
}
?>
