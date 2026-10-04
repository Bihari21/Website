<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/bootstrap.php';

if (nova_is_authenticated()) {
    header('Location: account.php');
    exit;
}

$name = '';
$email = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim((string) ($_POST['name'] ?? ''));
    $email = strtolower(trim((string) ($_POST['email'] ?? '')));
    $password = (string) ($_POST['password'] ?? '');
    $passwordConfirmation = (string) ($_POST['password_confirmation'] ?? '');

    if (!nova_verify_csrf($_POST['csrf_token'] ?? null)) {
        $error = 'Your session expired. Refresh the page and try again.';
    } elseif ($name === '' || mb_strlen($name) > 120) {
        $error = 'Enter your name (up to 120 characters).';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 254) {
        $error = 'Enter a valid email address.';
    } elseif (strlen($password) < 10) {
        $error = 'Choose a password with at least 10 characters.';
    } elseif ($password !== $passwordConfirmation) {
        $error = 'Those passwords do not match.';
    } else {
        try {
            $statement = nova_database()->prepare(
                'INSERT INTO users (name, email, password_hash) VALUES (:name, :email, :password_hash)'
            );
            $statement->execute([
                'name' => $name,
                'email' => $email,
                'password_hash' => password_hash($password, PASSWORD_DEFAULT),
            ]);
            nova_login_user([
                'id' => (int) nova_database()->lastInsertId(),
                'name' => $name,
                'email' => $email,
            ]);
            header('Location: account.php');
            exit;
        } catch (PDOException $exception) {
            if ($exception->getCode() === '23000') {
                $error = 'An account with that email already exists. Try logging in instead.';
            } else {
                error_log('NOVA sign-up failed: ' . $exception->getMessage());
                $error = 'We could not create your account just now. Please try again.';
            }
        } catch (RuntimeException $exception) {
            $error = $exception->getMessage();
        }
    }
}

$pageTitle = 'Create an account — NOVA';
require __DIR__ . '/includes/auth-header.php';
?>
<p class="eyebrow">MAKE YOURSELF AT HOME</p>
<h1>Good things start <em>here.</em></h1>
<p class="auth-intro">Create an account to keep your NOVA details close.</p>
<?php if ($error !== ''): ?><p class="auth-message auth-error" role="alert"><?= nova_escape($error) ?></p><?php endif; ?>
<form class="auth-form" method="post" action="signup.php">
  <?= nova_csrf_field() ?>
  <div class="form-field">
    <label for="name">Your name</label>
    <input id="name" name="name" type="text" autocomplete="name" maxlength="120" value="<?= nova_escape($name) ?>" required autofocus>
  </div>
  <div class="form-field">
    <label for="email">Email address</label>
    <input id="email" name="email" type="email" autocomplete="email" maxlength="254" value="<?= nova_escape($email) ?>" required>
  </div>
  <div class="form-field">
    <label for="password">Password <span>10 characters minimum</span></label>
    <input id="password" name="password" type="password" autocomplete="new-password" minlength="10" required>
  </div>
  <div class="form-field">
    <label for="password-confirmation">Confirm password</label>
    <input id="password-confirmation" name="password_confirmation" type="password" autocomplete="new-password" minlength="10" required>
  </div>
  <button class="button button-dark auth-submit" type="submit">Create account <span aria-hidden="true">↗</span></button>
</form>
<p class="auth-switch">Already a NOVA person? <a href="login.php">Log in</a></p>
<?php require __DIR__ . '/includes/auth-footer.php'; ?>