<?php
require_once 'config.php';

// Verifica se a variável $google_client está definida
if (isset($google_client)) {
    // Generate login URL and redirect
    $login_url = $google_client->createAuthUrl();
    header('Location: ' . filter_var($login_url, FILTER_SANITIZE_URL));
} else {
    echo "Erro: Configuração do Google Client ausente. Verifique o arquivo config.php.";
}
?>
