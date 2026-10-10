<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($pageTitle ?? "Login", ENT_QUOTES, "UTF-8") ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <style>
    body { background: linear-gradient(135deg, #0f766e, #134e4a); min-height: 100vh; }
    .auth-card { max-width: 420px; border: 0; border-radius: 1rem; }
    .brand-icon { width: 56px; height: 56px; border-radius: 50%;
                  background: #ccfbf1; color: #0f766e; font-size: 1.6rem;
                  display: flex; align-items: center; justify-content: center; }
  </style>
</head>
<body>
