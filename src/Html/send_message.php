<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<HEader>
<h1>Resultado</h1>
</HEader>
   

<main>
<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Verifica se todos os campos foram preenchidos
    if (isset($_GET['name']) && isset($_GET['email']) && isset($_GET['subject']) && isset($_GET['message'])) {
        // Recolher os dados do formulário
        $name = $_GET['name'];
        $email = $_GET['email'];
        $subject = $_GET['subject'];
        $message = $_GET['message'];
        
        // Verifica se foi enviado um arquivo
        if(isset($_FILES['fileToUpload'])){
            // Diretório onde os arquivos serão salvos
            $target_dir = "uploads/";
            // Caminho completo para o arquivo
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            // Move o arquivo para o diretório especificado
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "O arquivo ". basename( $_FILES["fileToUpload"]["name"]). " foi enviado.";
            } else {
                echo "Sorry, there was a problem uploading the file.";
            }
        }
        
        // Envia o email com os dados do formulário
        $to = "info@muskwall.com"; // Coloque o seu endereço de email aqui
        $email_subject = "New Contact Form: $subject";
        $email_body = "You have received a new contact message.\n\n".
                      "Nome: $name\n".
                      "Email: $email\n".
                      "Assunto: $subject\n".
                      "Mensagem:\n$message\n";
        
        // Envia o email
        mail($to,$email_subject,$email_body);
        echo "Thanks for contacting us. We will respond soon!";
    } else {
        echo "Please fill in all fields on the form.";
    }
}
?>

</main>
    
</body>
</html>

