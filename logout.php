<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !nova_verify_csrf($_POST['csrf_token'] ?? null)) {
    http_response_code(405);
    header('Allow: POST');
    exit('This action could not be completed. Return to your account and try again.');
}

nova_logout_user();
header('Location: login.php');
exit;