<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}

$pageTitle = "Home";
$isAdmin = $_SESSION["role"] === "admin";
$users = require "users.php";
$name = htmlspecialchars($_SESSION["name"], ENT_QUOTES, "UTF-8");
include "header.php";
?>
<nav class="navbar navbar-dark bg-dark">
  <div class="container">
    <span class="navbar-brand"><i class="bi bi-shield-lock me-2"></i>Login System</span>
    <a href="logout.php" class="btn btn-outline-light btn-sm">
      <i class="bi bi-box-arrow-right me-1"></i>Logout
    </a>
  </div>
</nav>

<div class="container py-5">
  <div class="card shadow-sm border-0 mb-4">
    <div class="card-body p-4">
      <h1 class="h3 mb-2">Hello, <?= $name ?>!</h1>
      <p class="text-muted mb-2">You are successfully logged in.</p>
      <span class="badge <?= $isAdmin ? 'text-bg-danger' : 'text-bg-primary' ?>">
        <?= $isAdmin ? "Administrator" : "Regular user" ?>
      </span>
    </div>
  </div>

  <?php if ($isAdmin): ?>
  <div class="card shadow-sm border-0">
    <div class="card-header bg-white fw-semibold">All Accounts</div>
    <div class="table-responsive">
      <table class="table table-hover mb-0 align-middle">
        <thead class="table-light">
          <tr><th>Name</th><th>Username</th><th>Role</th></tr>
        </thead>
        <tbody>
          <?php foreach ($users as $uname => $u): ?>
          <tr>
            <td><?= htmlspecialchars($u["name"], ENT_QUOTES, "UTF-8") ?></td>
            <td><?= htmlspecialchars($uname, ENT_QUOTES, "UTF-8") ?></td>
            <td><span class="badge <?= $u['role'] === 'admin' ? 'text-bg-danger' : 'text-bg-secondary' ?>"><?= $u["role"] ?></span></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
  <?php else: ?>
  <div class="card shadow-sm border-0">
    <div class="card-body">This is the home page for regular users.</div>
  </div>
  <?php endif; ?>
</div>
</body>
</html>
