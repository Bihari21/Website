<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/bootstrap.php';

if (nova_is_authenticated()) {
    header('Location: account.php');
    exit;
}

$email = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = strtolower(trim((string) ($_POST['email'] ?? '')));
    $password = (string) ($_POST['password'] ?? '');

    if (!nova_verify_csrf($_POST['csrf_token'] ?? null)) {
        $error = 'Your session expired. Refresh the page and try again.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) || $password === '') {
        $error = 'Enter a valid email and password.';
    } else {
        try {
            $statement = nova_database()->prepare('SELECT id, name, email, password_hash FROM users WHERE email = :email LIMIT 1');
            $statement->execute(['email' => $email]);
            $user = $statement->fetch();

            if ($user && password_verify($password, $user['password_hash'])) {
                if (password_needs_rehash($user['password_hash'], PASSWORD_DEFAULT)) {
                    $update = nova_database()->prepare('UPDATE users SET password_hash = :password_hash WHERE id = :id');
                    $update->execute([
                        'password_hash' => password_hash($password, PASSWORD_DEFAULT),
                        'id' => $user['id'],
                    ]);
                }
                nova_login_user($user);
                header('Location: account.php');
                exit;
            }

            $error = 'That email and password combination was not recognized.';
        } catch (RuntimeException $exception) {
            $error = $exception->getMessage();
        }
    }
}

$pageTitle = 'Log in — NOVA';
require __DIR__ . '/includes/auth-header.php';
?>
<p class="eyebrow">WELCOME BACK</p>
<h1>Good to see <em>you.</em></h1>
<p class="auth-intro">Sign in to pick up where you left off.</p>
<?php if ($error !== ''): ?><p class="auth-message auth-error" role="alert"><?= nova_escape($error) ?></p><?php endif; ?>
<form class="auth-form" method="post" action="login.php">
  <?= nova_csrf_field() ?>
  <div class="form-field">
    <label for="email">Email address</label>
    <input id="email" name="email" type="email" autocomplete="email" value="<?= nova_escape($email) ?>" required autofocus>
  </div>
  <div class="form-field">
    <label for="password">Password</label>
    <input id="password" name="password" type="password" autocomplete="current-password" required>
  </div>
  <button class="button button-dark auth-submit" type="submit">Log in <span aria-hidden="true">↗</span></button>
</form>
<p class="auth-switch">New around here? <a href="signup.php">Create an account</a></p>
<?php require __DIR__ . '/includes/auth-footer.php'; ?>