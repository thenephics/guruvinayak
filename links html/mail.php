<?php

    
    $name = strip_tags(trim($_POST["name"]));
    $name = str_replace(array("\r","\n"),array(" "," "),$name);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    
    if (empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: https://thenephics.github.io/guruvinayak/links%20html/contact.php?success=-1");
        exit;
    }

    
    $recipient = "info@guruvinayak.com";

    
    $subject = "New message from $name on your website";

    
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n\n\n Reply on $email\n";

    
    $email_headers = "From: $name <$email>";

    
    mail($recipient, $subject, $email_content, $email_headers);
    
    
    header("Location: https://thenephics.github.io/guruvinayak/links%20html/contact.php?success=1");

?>