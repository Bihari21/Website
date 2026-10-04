<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/bootstrap.php';

if (!nova_is_authenticated()) {
    header('Location: login.php');
    exit;
}

$pageTitle = 'Your account — NOVA';
require __DIR__ . '/includes/auth-header.php';
?>
<p class="eyebrow">YOUR NOVA ACCOUNT</p>
<h1>Hello, <em><?= nova_escape(explode(' ', $_SESSION['user_name'])[0]) ?>.</em></h1>
<p class="auth-intro">You are signed in with <?= nova_escape($_SESSION['user_email']) ?>.</p>
<div class="account-actions">
  <a class="button button-dark" href="index.php">Back to the shop <span aria-hidden="true">↗</span></a>
  <a class="button button-outline" href="wishlist.php">Your wishlist <span aria-hidden="true">↗</span></a>
  <form method="post" action="logout.php">
    <?= nova_csrf_field() ?>
    <button class="text-button" type="submit">Log out</button>
  </form>
</div>
<?php require __DIR__ . '/includes/auth-footer.php'; ?>