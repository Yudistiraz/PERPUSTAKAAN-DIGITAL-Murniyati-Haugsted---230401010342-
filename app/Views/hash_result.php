<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hash Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-5">
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="mb-3">Password Hash Generator</h4>
                <p><strong>Password:</strong> <?= esc($password) ?></p>
                <p><strong>Hash:</strong></p>
                <code><?= esc($hash) ?></code>
            </div>
        </div>
    </div>
</body>
</html>
