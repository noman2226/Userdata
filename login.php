<?php
session_start();
$error = '';
if(isset($_POST['login'])){

        $username = isset($_POST['username']) ? trim($_POST['username']) : '';
        $password = isset($_POST['password']) ? trim($_POST['password']) : '';

        $users = @file("users.txt") ?: [];

        foreach($users as $user){

                $data = explode("|", trim($user));

                if(isset($data[2]) && isset($data[3]) && $data[2] == $username && $data[3] == $password){

                        $_SESSION['user'] = $username;

                        header("Location: dashboard.php");
                        exit();
                }
        }

        $error = "Invalid username or password.";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login</title>
    <style>
        :root{--bg:#f4f7fb;--card:#fff;--accent:#556bff;--muted:#6b7280}
        *{box-sizing:border-box}
        body{margin:0;font-family:Inter,Segoe UI,Arial,sans-serif;background:linear-gradient(180deg,#eef2ff 0%,var(--bg) 100%);min-height:100vh;display:flex;align-items:center;justify-content:center;padding:24px}
        .container{width:100%;max-width:420px}
        .card{background:var(--card);border-radius:12px;padding:28px;box-shadow:0 8px 30px rgba(22,32,66,0.08)}
        h2{margin:0 0 8px 0;font-size:20px;color:#0f172a}
        p.lead{margin:0 0 18px 0;color:var(--muted);font-size:14px}
        form .field{margin-bottom:14px}
        label{display:block;font-size:13px;color:var(--muted);margin-bottom:6px}
        input[type=text],input[type=password]{width:100%;padding:10px 12px;border:1px solid #e6e9f2;border-radius:8px;font-size:14px}
        input[type=submit]{width:100%;padding:11px;background:var(--accent);color:#fff;border:0;border-radius:8px;font-weight:600;cursor:pointer;margin-top:8px}
        .meta{display:flex;justify-content:space-between;align-items:center;margin-top:12px}
        a.link{color:var(--accent);text-decoration:none;font-size:13px}
        .small{font-size:13px;color:var(--muted)}
        .error{background:#fff1f0;color:#991b1b;padding:10px;border-radius:8px;border:1px solid #ffccd5;margin-bottom:12px}
        @media (max-width:420px){.card{padding:20px}}
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>Welcome back</h2>
            <p class="lead">Log in to your account to continue.</p>

            <?php if($error): ?>
                <div class="error"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>

            <form method="POST" novalidate>
                <div class="field">
                    <label for="username">Username</label>
                    <input id="username" name="username" type="text" placeholder="your username" required>
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" placeholder="your password" required>
                </div>

                <input type="submit" name="login" value="Sign in">
            </form>

            <div class="meta">
                <span class="small">Don't have an account?</span>
                <a class="link" href="signup.php">Create account</a>
            </div>
        </div>
    </div>
</body>
</html>
