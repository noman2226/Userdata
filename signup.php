<?php
session_start();

if(isset($_POST['signup'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

   
    if($name && $email && $username && $password && $phone){

     
        $data = $name."|".$email."|".$username."|".$password."|".$phone."\n";

        file_put_contents("users.txt", $data, FILE_APPEND);

        header("Location: login.php");
        exit();
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Signup</title>
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
        input[type=text],input[type=email],input[type=password],input[type=tel]{width:100%;padding:10px 12px;border:1px solid #e6e9f2;border-radius:8px;font-size:14px}
        input[type=submit]{width:100%;padding:11px;background:var(--accent);color:#fff;border:0;border-radius:8px;font-weight:600;cursor:pointer;margin-top:8px}
        .meta{display:flex;justify-content:space-between;align-items:center;margin-top:12px}
        a.link{color:var(--accent);text-decoration:none;font-size:13px}
        .small{font-size:13px;color:var(--muted)}
        @media (max-width:420px){.card{padding:20px}}
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>Create your account</h2>
            <p class="lead">Join us — it only takes a minute. Your data is stored locally in this demo.</p>

            <form method="POST" novalidate>
                <div class="field">
                    <label for="name">Full name</label>
                    <input id="name" name="name" type="text" placeholder="Jane Doe" required>
                </div>

                <div class="field">
                    <label for="email">Email address</label>
                    <input id="email" name="email" type="email" placeholder="you@example.com" required>
                </div>

                <div class="field">
                    <label for="username">Username</label>
                    <input id="username" name="username" type="text" placeholder="username" required>
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" placeholder="Create a password" required>
                </div>

                <div class="field">
                    <label for="phone">Phone</label>
                    <input id="phone" name="phone" type="tel" placeholder="(123) 456-7890" pattern="[0-9\-\s()+]*" required>
                </div>

                <input type="submit" name="signup" value="Sign up">
            </form>

            <div class="meta">
                <span class="small">By signing up you agree to our terms.</span>
                <a class="link" href="login.php">Already have an account?</a>
            </div>
        </div>
    </div>
</body>
</html>
