<?php
session_start();
$pageTitle = "Login";

if (isset($_SESSION["username"])) {
    header("Location: home.php");
    exit;
}

$users = require "users.php";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $password = $_POST["password"] ?? "";

    if ($username === "" || $password === "") {
        $error = "Please enter both your username and password.";
    } elseif (isset($users[$username]) && hash_equals($users[$username]["password"], $password)) {
        session_regenerate_id(true);
        $_SESSION["username"] = $username;
        $_SESSION["name"]     = $users[$username]["name"];
        $_SESSION["role"]     = $users[$username]["role"];
        header("Location: home.php");
        exit;
    } else {
        $error = "Incorrect username or password.";
    }
}
include "header.php";
?>
<div class="container d-flex align-items-center justify-content-center min-vh-100 py-4">
  <div class="card auth-card shadow-lg w-100">
    <div class="card-body p-4 p-md-5">
      <div class="d-flex flex-column align-items-center mb-4">
        <div class="brand-icon mb-3"><i class="bi bi-shield-lock"></i></div>
        <h1 class="h4 mb-1">Welcome back</h1>
        <p class="text-muted small mb-0">Log in to continue</p>
      </div>

      <?php if ($error): ?>
        <div class="alert alert-danger py-2"><?= htmlspecialchars($error, ENT_QUOTES, "UTF-8") ?></div>
      <?php endif; ?>

      <form method="POST" novalidate>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="username" name="username"
                 placeholder="Username" value="<?= htmlspecialchars($_POST['username'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
          <label for="username">Username</label>
        </div>
        <div class="form-floating mb-4">
          <input type="password" class="form-control" id="password" name="password"
                 placeholder="Password" required>
          <label for="password">Password</label>
        </div>
        <button class="btn btn-success w-100 py-2" type="submit">Log In</button>
      </form>
    </div>
  </div>
</div>
</body>
</html>
