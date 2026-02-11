<?php
session_start();
session_destroy();
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Signed out</title>
	<meta http-equiv="refresh" content="4;url=login.php">
	<style>
		:root{--bg:#f4f7fb;--card:#fff;--accent:#556bff;--muted:#6b7280}
		*{box-sizing:border-box}
		body{margin:0;font-family:Inter,Segoe UI,Arial,sans-serif;background:linear-gradient(180deg,#eef2ff 0%,var(--bg) 100%);min-height:100vh;display:flex;align-items:center;justify-content:center;padding:24px}
		.container{width:100%;max-width:560px}
		.card{background:var(--card);border-radius:12px;padding:28px;box-shadow:0 8px 30px rgba(22,32,66,0.08);text-align:center}
		h2{margin:0 0 8px 0;font-size:20px;color:#0f172a}
		p.lead{margin:0 0 18px 0;color:var(--muted);font-size:14px}
		a.button{display:inline-block;padding:10px 14px;background:var(--accent);color:#fff;border-radius:8px;text-decoration:none;font-weight:600}
		.small{font-size:13px;color:var(--muted);margin-top:12px}
	</style>
	<script>
		let t = 4;
		function tick(){
			const el = document.getElementById('count');
			if(!el) return;
			t--;
			el.textContent = t;
			if(t<=0) clearInterval(timer);
		}
		let timer;
		window.addEventListener('DOMContentLoaded', ()=>{ timer = setInterval(tick,1000); });
	</script>
</head>
<body>
	<div class="container">
		<div class="card">
			<h2>Signed out</h2>
			<p class="lead">You have been signed out of your account.</p>
			<p><a class="button" href="login.php">Sign in again</a></p>
			<p class="small">Redirecting to login in <span id="count">4</span>s...</p>
		</div>
	</div>
</body>
</html>