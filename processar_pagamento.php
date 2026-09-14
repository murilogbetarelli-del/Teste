<?php
// Configurações do Banco de Dados
$host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "ecommerce_db";

// Conexão
$conn = new mysqli($host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Recebendo dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $card_holder = $_POST['card_holder'];
    $card_number = $_POST['card_number'];
    $expiry_date = $_POST['expiry_date'];
    $cvv = $_POST['cvv'];
    $amount = $_POST['amount'];
    
    // Para este exemplo, simularemos um usuário logado com ID 1
    $user_id = 1; 

    // Preparando a query para evitar SQL Injection (Boa prática de DevOps/Security)
    $stmt = $conn->prepare("INSERT INTO payments (user_id, card_holder, card_number, expiry_date, cvv, amount) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssdd", $user_id, $card_holder, $card_number, $expiry_date, $cvv, $amount);

    if ($stmt->execute()) {
        echo "<h1>Pagamento Processado com Sucesso!</h1>";
        echo "<p>Os dados foram salvos no banco de dados.</p>";
        echo "<a href='index.html'>Voltar</a>";
    } else {
        echo "Erro ao processar pagamento: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>