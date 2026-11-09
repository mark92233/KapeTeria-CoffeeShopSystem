<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#17110d">
<title>Sign In | BeanVista Coffee Co.</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">
<style>
:root{--bg:#17110d;--cream:#f8f1e8;--muted:#c5b6a5;--gold:#e8bc82;--line:rgba(232,188,130,.24);--width:min(90vw,1500px);--header:clamp(72px,6vw,100px)}
*{box-sizing:border-box}html,body{min-height:100%;margin:0}body{min-height:100vh;background:var(--bg);color:var(--cream);font-family:"DM Sans",sans-serif;overflow-x:hidden}a{color:inherit;text-decoration:none}button,input{font:inherit}
.header{position:absolute;z-index:5;inset:0 0 auto;height:var(--header);display:flex;align-items:center;border-bottom:1px solid rgba(248,241,232,.1);background:linear-gradient(180deg,rgba(16,11,8,.72),transparent)}
.header-inner{width:var(--width);margin:auto;display:flex;align-items:center;justify-content:space-between;gap:20px}
.brand{display:inline-flex;align-items:center;gap:12px}.brand-mark{width:clamp(38px,3.2vw,52px)}.brand-name{display:block;font-size:clamp(20px,1.5vw,26px);font-weight:800;letter-spacing:-.055em;line-height:1}.brand-sub{display:block;margin-top:5px;font-size:9px;font-weight:700;letter-spacing:.28em}
.back-link{display:flex;align-items:center;gap:9px;color:var(--muted);font-size:14px;transition:color .2s}.back-link:hover{color:var(--gold)}
.login-layout{min-height:100vh;display:grid;grid-template-columns:minmax(0,1.08fr) minmax(420px,.92fr)}
.visual-panel{position:relative;isolation:isolate;min-height:100vh;display:flex;align-items:flex-end;padding:clamp(42px,7vw,110px);overflow:hidden;background:#291a11}
.visual-panel:before{content:"";position:absolute;z-index:-2;inset:0;background:linear-gradient(0deg,rgba(15,9,6,.88),rgba(15,9,6,.25) 58%,rgba(15,9,6,.12)),linear-gradient(90deg,rgba(15,9,6,.18),transparent 80%),url("images/coffee-hero.jpg") center/cover no-repeat;transform:scale(1.04);animation:imageReveal 1.4s both}
.visual-panel:after{content:"";position:absolute;z-index:-1;inset:0;background:radial-gradient(circle at 75% 20%,rgba(232,188,130,.13),transparent 34%);pointer-events:none}
.visual-copy{max-width:660px;animation:riseIn .9s .18s both}.eyebrow{margin:0 0 18px;color:var(--gold);font-size:clamp(10px,.8vw,13px);font-weight:800;letter-spacing:.32em;text-transform:uppercase}
.visual-copy h1{margin:0;font-size:clamp(46px,6.2vw,100px);line-height:.98;letter-spacing:-.075em}.visual-copy h1 em{display:block;color:var(--gold);font-family:"Playfair Display",serif;font-weight:600;letter-spacing:-.055em}
.visual-copy>p:last-child{max-width:460px;margin:24px 0 0;color:rgba(248,241,232,.82);font-size:clamp(14px,1.1vw,18px);line-height:1.75}
.form-panel{min-height:100vh;display:flex;align-items:center;justify-content:center;padding:calc(var(--header) + 48px) clamp(28px,6vw,100px) 48px;background:radial-gradient(ellipse at 80% 12%,rgba(105,64,36,.2),transparent 38%),#1b140f}
.form-wrap{width:100%;max-width:480px;animation:riseIn .85s .12s both}.form-heading{margin-bottom:clamp(28px,3.5vw,44px)}.form-heading .eyebrow{margin-bottom:12px}
.form-heading h2{margin:0;font-size:clamp(36px,3.5vw,54px);line-height:1.05;letter-spacing:-.065em}.form-heading>p:last-child{margin:13px 0 0;color:var(--muted);font-size:15px;line-height:1.6}
.field{margin-bottom:21px}.field label{display:block;margin-bottom:9px;color:rgba(248,241,232,.92);font-size:13px;font-weight:700;letter-spacing:.02em}
.input-shell{position:relative}.input-shell input{width:100%;height:58px;padding:0 18px;border:1px solid rgba(248,241,232,.2);border-radius:9px;outline:none;color:var(--cream);background:rgba(255,255,255,.045);font-size:15px;transition:border-color .2s,background .2s,box-shadow .2s}
.input-shell input::placeholder{color:#88796b}.input-shell input:focus{border-color:var(--gold);background:rgba(255,255,255,.065);box-shadow:0 0 0 3px rgba(232,188,130,.1)}.password-input{padding-right:58px!important}
.password-toggle{position:absolute;top:50%;right:13px;width:36px;height:36px;display:grid;place-items:center;padding:0;border:0;border-radius:7px;color:#bca995;background:transparent;cursor:pointer;transform:translateY(-50%);transition:color .2s,background .2s}.password-toggle:hover{color:var(--gold);background:rgba(232,188,130,.09)}.password-toggle svg{width:20px;height:20px}
.form-options{display:flex;align-items:center;justify-content:space-between;gap:16px;margin:4px 0 28px}.remember{display:inline-flex;align-items:center;gap:10px;color:var(--muted);font-size:13px;cursor:pointer;user-select:none}.remember input{width:17px;height:17px;margin:0;accent-color:var(--gold);cursor:pointer}
.forgot{color:var(--gold);font-size:13px;font-weight:700;transition:color .2s}.forgot:hover{color:#f5d7ae;text-decoration:underline;text-underline-offset:4px}
.submit-btn{width:100%;min-height:58px;display:flex;align-items:center;justify-content:center;gap:12px;border:0;border-radius:999px;color:#21150f;background:var(--gold);font-size:14px;font-weight:800;letter-spacing:.025em;cursor:pointer;transition:transform .25s,background .25s,box-shadow .25s}.submit-btn:hover{transform:translateY(-3px);background:#f4d2a4;box-shadow:0 12px 28px rgba(0,0,0,.22)}.submit-btn:active{transform:translateY(-1px)}
.form-message{min-height:20px;margin:13px 0 0;color:var(--gold);font-size:12px;line-height:1.5}.form-footnote{margin:38px 0 0;padding-top:22px;border-top:1px solid rgba(248,241,232,.12);color:#9e8e7e;font-size:12px;line-height:1.7;text-align:center}
@keyframes riseIn{from{opacity:0;transform:translateY(24px)}to{opacity:1;transform:translateY(0)}}@keyframes imageReveal{from{opacity:.5;transform:scale(1.1)}to{opacity:1;transform:scale(1.04)}}
@media(max-width:900px){.login-layout{grid-template-columns:1fr}.visual-panel{min-height:34vh;padding:130px 7vw 44px}.visual-panel:before{background-position:center 58%}.visual-copy h1{font-size:clamp(42px,8vw,68px)}.visual-copy>p:last-child{margin-top:13px}.form-panel{min-height:66vh;padding:58px 7vw 72px}.form-wrap{max-width:520px}}
@media(max-width:520px){:root{--header:70px}.header-inner{width:88vw}.brand-mark{width:36px}.brand-name{font-size:19px}.brand-sub{font-size:8px}.back-link{font-size:12px}.visual-panel{min-height:31vh;padding:112px 6vw 34px}.visual-copy h1{font-size:clamp(40px,11vw,58px)}.visual-copy>p:last-child{max-width:330px;font-size:13px}.form-panel{padding:48px 6vw 58px}.form-heading h2{font-size:38px}.input-shell input{height:55px}}
@media(prefers-reduced-motion:reduce){*,*:before,*:after{animation-duration:.01ms!important;transition-duration:.01ms!important}}
</style>
</head>
<body>
<header class="header"><div class="header-inner">
<a class="brand" href="landing.html" aria-label="BeanVista home">
<svg class="brand-mark" viewBox="0 0 64 64" fill="none" aria-hidden="true"><path d="M19 25h26l-2.5 19a7 7 0 0 1-7 6h-7a7 7 0 0 1-7-6L19 25Z" stroke="currentColor" stroke-width="2.5"/><path d="M45 29h5a6 6 0 0 1 0 12h-7M25 20c-5-5 5-7 0-13M35 19c-5-5 5-7 0-13M16 56h34" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/><path d="M24 32c5 5 11 5 16 0" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
<span><span class="brand-name">KapeTeria</span><span class="brand-sub">COFFEE CO.</span></span></a>
<a class="back-link" href="landing.html"><span aria-hidden="true">←</span> Back to home</a>
</div></header>
<main class="login-layout">
<section class="visual-panel" aria-label="Welcome to BeanVista"><div class="visual-copy">
<p class="eyebrow">Your coffee corner awaits</p><h1>Good to see<em>you again.</em></h1>
<p>Come on in. Your favorite brews, familiar faces, and a little moment for yourself are just around the corner.</p>
</div></section>
<section class="form-panel"><div class="form-wrap">
<div class="form-heading"><p class="eyebrow">Welcome back</p><h2>Sign in to your account</h2><p>Enter your details below to continue to BeanVista.</p></div>
<form id="loginForm" action="{{ route('login.process') }}" method="POST">
    @csrf
<div class="field"><label for="username">Username</label><div class="input-shell"><input
    type="text"
    id="username"
    name="username"
    value="{{ old('username') }}"
    placeholder="Enter your username"
    autocomplete="username"
    required
></div></div>
<div class="field"><label for="password">Password</label><div class="input-shell">
<input class="password-input" type="password" id="password" name="password" placeholder="Enter your password" autocomplete="current-password" required>
<button class="password-toggle" type="button" id="togglePassword" aria-label="Show password" aria-pressed="false">
<svg id="eyeIcon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12Z"/><circle cx="12" cy="12" r="3"/></svg>
</button></div></div>
<div class="form-options"><label class="remember" for="remember"><input type="checkbox" id="remember" name="remember"><span>Remember me</span></label><a class="forgot" href="forgot-password.html">Forgot password?</a></div>
<button class="submit-btn" type="submit">Sign In <span aria-hidden="true">→</span></button><p class="form-message" id="formMessage" role="status" aria-live="polite"></p>
</form>
<p class="form-footnote">© 2025 KapeTeria Coffee Co. · Crafted for your everyday coffee moments.</p>
</div></section>
</main>
<script>
const passwordInput=document.getElementById("password");
const togglePassword=document.getElementById("togglePassword");
const eyeIcon=document.getElementById("eyeIcon");
togglePassword.addEventListener("click",()=>{
  const show=passwordInput.type==="password";
  passwordInput.type=show?"text":"password";
  togglePassword.setAttribute("aria-pressed",String(show));
  togglePassword.setAttribute("aria-label",show?"Hide password":"Show password");
  eyeIcon.innerHTML=show
    ? '<path d="M3 3l18 18"/><path d="M10.6 10.6a2 2 0 0 0 2.8 2.8"/><path d="M9.9 5.2A10.8 10.8 0 0 1 12 5c6.4 0 10 7 10 7a15.8 15.8 0 0 1-3 3.8"/><path d="M6.2 6.2C3.5 8.1 2 12 2 12s3.6 7 10 7c1.2 0 2.3-.2 3.3-.6"/>'
    : '<path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12Z"/><circle cx="12" cy="12" r="3"/>';
});
</script>
</body>
</html>