<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login | Inventory Product Management</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
<style>
:root{--app-black:#000;--app-dark:#121212;--app-gray:#181818;--app-light-gray:#282828;--app-white:#FFF;--app-text-gray:#B3B3B3}
body{background:linear-gradient(180deg,var(--app-black) 0%,var(--app-dark) 100%);color:var(--app-white);font-family:'Inter','Helvetica Neue',Arial,sans-serif;min-height:100vh;margin:0;padding:0}
.spotify-container{min-height:100vh;display:flex;align-items:center;justify-content:center;padding:20px;background:radial-gradient(circle at 20% 30%,rgba(255,255,255,0.1) 0%,transparent 40%),radial-gradient(circle at 80% 70%,rgba(255,255,255,0.1) 0%,transparent 40%)}
.spotify-card{width:100%;max-width:450px;background:rgba(24,24,24,0.9);backdrop-filter:blur(10px);border:1px solid rgba(40,40,40,0.5);border-radius:16px;overflow:hidden;box-shadow:0 8px 32px rgba(0,0,0,0.5),0 0 0 1px rgba(255,255,255,0.05)}
.spotify-header{background:var(--app-white);padding:35px 30px;text-align:center;position:relative;overflow:hidden}
.spotify-header::before{content:'';position:absolute;top:0;left:0;right:0;bottom:0;background:linear-gradient(45deg,transparent 30%,rgba(255,255,255,0.1) 50%,transparent 70%);animation:shine 3s infinite}
@keyframes shine{0%{transform:translateX(-100%)}100%{transform:translateX(100%)}}
.logo-text{font-size:28px;font-weight:700;letter-spacing:-0.5px;margin:0;position:relative;text-shadow:0 2px 4px rgba(0,0,0,0.3)}
.spotify-body{padding:40px}
.login-title{font-size:32px;font-weight:700;text-align:center;margin-bottom:10px;background:linear-gradient(45deg,var(--app-white),var(--app-white));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text}
.login-subtitle{color:var(--app-text-gray);text-align:center;margin-bottom:30px;font-size:14px;letter-spacing:0.5px}
.form-label{color:var(--app-white);font-weight:500;font-size:14px;margin-bottom:8px;text-transform:uppercase;letter-spacing:1px}
.form-control{background:var(--app-light-gray);border:2px solid rgba(179,179,179,0.2);border-radius:8px;color:var(--app-white);padding:12px 16px;font-size:14px;transition:all 0.3s}
.form-control:hover{border-color:rgba(179,179,179,0.4)}
.form-control:focus{border-color:var(--app-white)!important;background:var(--app-light-gray);color:var(--app-white);box-shadow:0 0 0 3px rgba(255,255,255,0.2),0 0 20px rgba(255,255,255,0.1)!important;outline:none}
.form-control::placeholder{color:rgba(179,179,179,0.6)}
.btn-spotify{background:linear-gradient(135deg,var(--app-white) 0%,rgba(255,255,255,0.8) 100%);border:none;border-radius:50px;color:var(--app-black);font-weight:700;font-size:16px;padding:14px;width:100%;transition:all 0.3s;text-transform:uppercase;letter-spacing:1px;margin-top:10px;position:relative;overflow:hidden}
.btn-spotify:hover{transform:translateY(-2px);box-shadow:0 8px 20px rgba(255,255,255,0.3);color:var(--app-black)}
.btn-spotify:active{transform:translateY(0)}
.btn-spotify::after{content:'';position:absolute;top:0;left:0;right:0;bottom:0;background:linear-gradient(135deg,transparent 30%,rgba(255,255,255,0.2) 50%,transparent 70%);opacity:0;transition:opacity 0.3s}
.btn-spotify:hover::after{opacity:1}
.alert{border-radius:8px;border:none;font-size:14px;padding:12px 16px;margin-bottom:20px;animation:slideIn 0.3s}
@keyframes slideIn{from{opacity:0;transform:translateY(-10px)}to{opacity:1;transform:translateY(0)}}
.alert-danger{background:rgba(220,53,69,0.1);border:1px solid rgba(220,53,69,0.3);color:#dc3545}
.alert-success{background:rgba(255,255,255,0.1);border:1px solid rgba(255,255,255,0.3);color:var(--app-white)}
.wave-line{height:2px;background:linear-gradient(90deg,transparent,var(--app-white),transparent);margin:25px 0;opacity:0.5}
.spotify-footer{text-align:center;margin-top:25px;color:var(--app-text-gray);font-size:12px}
.spotify-footer a{color:var(--app-white);text-decoration:none;transition:color 0.3s}
.spotify-footer a:hover{color:var(--app-white)}
@media (max-width:480px){.spotify-card{border-radius:12px}.spotify-body{padding:30px 20px}.login-title{font-size:26px}}
.btn-spotify.loading{position:relative;color:transparent}
.btn-spotify.loading::before{content:'';position:absolute;top:50%;left:50%;width:20px;height:20px;margin:-10px 0 0 -10px;border:2px solid rgba(0,0,0,0.2);border-top-color:var(--app-black);border-radius:50%;animation:spin 0.6s linear infinite}
@keyframes spin{to{transform:rotate(360deg)}}
</style>
</head>
<body>
<div class="spotify-container"><div class="spotify-card"><div class="spotify-header"><h1 class="logo-text text-dark">Product Management</h1></div><div class="spotify-body"><h2 class="login-title">Welcome Back</h2><p class="login-subtitle">Sign in to manage your inventory</p>
<?php if(session()->getFlashdata('error')):?><div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div><?php endif;?>
<?php if(session()->getFlashdata('success')):?><div class="alert alert-success"><?= session()->getFlashdata('success') ?></div><?php endif;?>
<?php if(isset($_GET['logout'])&&$_GET['logout']=='1'):?><div class="alert alert-success">Successfully logged out</div><?php endif;?>
<?php if(isset($validation)&&$validation->hasError('username')):?><div class="alert alert-danger"><?= $validation->getError('username') ?></div><?php endif;?>
<?php if(isset($validation)&&$validation->hasError('password')):?><div class="alert alert-danger"><?= $validation->getError('password') ?></div><?php endif;?>
<form action="<?= base_url('/login') ?>" method="post" id="loginForm">
<div class="mb-4"><label for="username" class="form-label">Username </label><input type="text" name="username" id="username" class="form-control" required placeholder="Enter your username or email" autocomplete="username"></div>
<div class="mb-4"><label for="password" class="form-label">Password</label><input type="password" name="password" id="password" class="form-control" required placeholder="Enter your password" autocomplete="current-password"></div>
<div class="wave-line"></div>
<button type="submit" class="btn btn-spotify" id="loginButton">Sign In</button>
</form>
<div class="spotify-footer">Need help? <a href="#">Contact Support</a></div></div></div></div>
<script>
document.getElementById('loginForm').addEventListener('submit',function(e){const button=document.getElementById('loginButton');button.classList.add('loading');button.disabled=true;setTimeout(()=>{button.classList.remove('loading');button.disabled=false;},3000);});const inputs=document.querySelectorAll('.form-control');inputs.forEach(input=>{input.addEventListener('focus',function(){this.parentElement.style.transform='translateY(-2px)';});input.addEventListener('blur',function(){this.parentElement.style.transform='translateY(0)';});});
</script>
</body>
</html>