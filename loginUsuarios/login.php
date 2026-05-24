<!DOCTYPE html>

<html class="light" lang="pt-br"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>EventHub Pro - Login Seguro</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<style>
        @import url('https://fonts.googleapis.com/css2?family=Geist:wght@100..900&display=swap');
        
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        body {
            font-family: 'Geist', sans-serif;
            background-image: radial-gradient(circle at 2px 2px, rgba(118, 119, 125, 0.05) 1px, transparent 0);
            background-size: 24px 24px;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(226, 232, 240, 1);
        }

        .login-input:focus {
            outline: none;
            border-color: #000000;
            box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.05);
        }
    </style>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-surface": "#0b1c30",
                        "surface": "#f8f9ff",
                        "on-primary": "#ffffff",
                        "outline": "#76777d",
                        "outline-variant": "#c6c6cd",
                        "primary": "#000000",
                        "surface-container": "#e5eeff",
                        "surface-container-low": "#eff4ff",
                        "tertiary": "#000000",
                        "tertiary-fixed": "#eaddff",
                    },
                    "borderRadius": {
                        "DEFAULT": "0.125rem",
                        "lg": "0.25rem",
                        "xl": "0.5rem",
                        "full": "0.75rem"
                    },
                    "spacing": {
                        "unit": "8px",
                        "stack-sm": "8px",
                        "stack-md": "16px",
                        "stack-lg": "24px",
                    },
                    "fontFamily": {
                        "label-md": ["Geist"],
                        "body-sm": ["Geist"],
                        "headline-sm": ["Geist"],
                        "headline-md": ["Geist"],
                        "headline-lg": ["Geist"],
                    },
                    "fontSize": {
                        "label-md": ["14px", {"lineHeight": "20px", "fontWeight": "500"}],
                        "body-sm": ["14px", {"lineHeight": "20px", "fontWeight": "400"}],
                        "headline-sm": ["20px", {"lineHeight": "28px", "fontWeight": "600"}],
                        "headline-md": ["24px", {"lineHeight": "32px", "fontWeight": "600"}],
                        "headline-lg": ["32px", {"lineHeight": "40px", "fontWeight": "600"}],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-surface min-h-screen flex items-center justify-center p-container-padding overflow-x-hidden">
<!-- Background Atmospheric Elements -->
<div class="fixed inset-0 pointer-events-none overflow-hidden">
<div class="absolute -top-[10%] -left-[5%] w-[40%] h-[40%] bg-surface-container rounded-full blur-[120px] opacity-60"></div>
<div class="absolute top-[60%] -right-[10%] w-[50%] h-[50%] bg-surface-container-low rounded-full blur-[100px] opacity-40"></div>
</div>
<!-- Login Container -->
<main class="relative z-10 w-full max-w-[440px] animate-in fade-in slide-in-from-bottom-4 duration-700">
<!-- Header/Brand Area -->
<div class="flex flex-col items-center mb-stack-lg space-y-unit">
<div class="w-12 h-12 bg-primary rounded-lg flex items-center justify-center text-on-primary mb-2 shadow-xl shadow-primary/10">
<span class="material-symbols-outlined text-headline-md" data-icon="event">event</span>
</div>
<h1 class="font-headline-md text-headline-md text-on-surface tracking-tight">EventHub Pro</h1>
<p class="font-body-sm text-body-sm text-outline text-center px-4">Management Console — Solução corporativa para coordenação de eventos de alta escala.</p>
</div>
<!-- Login Card -->
<div class="glass-card p-8 rounded-xl shadow-2xl shadow-on-surface/[0.03]">
<form action="#" class="space-y-stack-lg" id="loginForm" method="POST">
<!-- Email Field -->
<div class="space-y-2">
<label class="font-label-md text-label-md text-on-surface block" for="username">E-mail ou Nome de Usuário</label>
<div class="relative group">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-[20px] transition-colors group-focus-within:text-primary">person</span>
<input class="login-input w-full pl-10 pr-4 py-3 bg-white border border-outline-variant rounded-lg font-body-md text-on-surface transition-all" id="username" name="username" placeholder="exemplo@eventhub.com" required="" type="text"/>
</div>
</div>
<!-- Password Field -->
<div class="space-y-2">
<div class="flex justify-between items-center">
<label class="font-label-md text-label-md text-on-surface" for="password">Senha</label>
<a class="font-label-sm text-label-sm text-primary hover:underline transition-all" href="#">Esqueceu a senha?</a>
</div>
<div class="relative group">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-[20px] transition-colors group-focus-within:text-primary">lock</span>
<input class="login-input w-full pl-10 pr-4 py-3 bg-white border border-outline-variant rounded-lg font-body-md text-on-surface transition-all" id="password" name="password" placeholder="••••••••" required="" type="password"/>
<button class="absolute right-3 top-1/2 -translate-y-1/2 text-outline hover:text-on-surface-variant transition-colors" onclick="togglePassword()" type="button">
<span class="material-symbols-outlined text-[20px]" id="passIcon">visibility</span>
</button>
</div>
</div>
<!-- Submit Button -->
<button class="w-full bg-primary text-on-primary font-label-md text-label-md py-4 rounded-lg hover:opacity-90 active:scale-[0.98] transition-all shadow-lg shadow-primary/10 flex items-center justify-center gap-2" type="submit">
<span>Entrar</span>
<span class="material-symbols-outlined text-[18px]">login</span>
</button>
<!-- Divider -->
<div class="relative flex items-center py-2">
<div class="flex-grow border-t border-outline-variant"></div>
<span class="flex-shrink mx-4 font-label-sm text-label-sm text-outline uppercase tracking-widest">Ou continue com</span>
<div class="flex-grow border-t border-outline-variant"></div>
</div>
<!-- Social Logins -->
<div class="grid grid-cols-2 gap-stack-md">
<button class="flex items-center justify-center gap-2 py-3 border border-outline-variant rounded-lg bg-white hover:bg-surface-container-low transition-colors font-label-md text-label-md text-on-surface" type="button">
<img alt="Google" class="w-5 h-5" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC7zeIs4mmbPFq2HQqhjOCsTV2TEzJoSQV4e86U0yVWYb9cA7BsF30eJsFCoTFxDt4dEKHqrQuiSe9O1VguXAXtTF1DTpnNUOIu96icep6iejFCpNOKFElvxAJs852J7RvOrQChhA2O9-inWivSkIcvGpUOFQCv4waGi7SZVsE8kA2XLFi6yKWD4hy0WQgbtISJD9XU4cMsra1vjIUBhmzKEBkulh1yeQGrlVxxOho63-4eFim-bR4K_b7aJTACMmDrMlsMLD4gZzM"/>
<span>Google</span>
</button>
<button class="flex items-center justify-center gap-2 py-3 border border-outline-variant rounded-lg bg-white hover:bg-surface-container-low transition-colors font-label-md text-label-md text-on-surface" type="button">
<span class="material-symbols-outlined text-primary text-[20px]" data-icon="terminal">terminal</span>
<span>SSO</span>
</button>
</div>
</form>
</div>
<!-- Footer Info -->
<footer class="mt-stack-lg text-center space-y-2">
<p class="font-body-sm text-body-sm text-outline">
                Ainda não tem acesso? <a class="text-primary font-bold hover:underline" href="#">Contate o administrador</a>
</p>
<div class="flex items-center justify-center gap-2 py-4 px-6 bg-surface-container-low rounded-full inline-flex mx-auto border border-outline-variant/30">
<span class="material-symbols-outlined text-[16px] text-primary" data-weight="fill">database</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Pronto para conexão MySQL backend</span>
</div>
</footer>
</main>
<!-- Side Image Decor (Mobile Hidden) -->
<div class="hidden lg:block fixed right-0 top-0 bottom-0 w-[40%] h-full">
<div class="w-full h-full relative overflow-hidden">
<img alt="Event Management Context" class="w-full h-full object-cover" data-alt="A professional high-angle shot of a corporate tech conference stage with modern blue ambient lighting and massive LED screens showing abstract geometric patterns. The atmosphere is sophisticated and quiet, conveying operational excellence and high-end event management. The visual style is clean, sharp, and modern with a deep navy and cool white color palette." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDHnZAZlw9KRCWHh3XK-zd7n6pKBx4qN08SIQjAkkqhMzopQMnqhV5jyXti4kCyAUCp_AJ-SEqC11Wu9jmin_3qPidG4GqC6FX1HAnfQJdaqbZ80PYxc10vgwVVGyRc6vtFIWT498zVv62C8zysFxTzmPqF7pgxGOu3qZmk7RjCxMiI-negR8a_GQxAyPnvzXCz6Ud8ZuNYELHkAAPwOdZ4pgJsSJUWQSfD_8782WrZCrsp8UzTlnhYeimzALGIQa1rHpb9XuF5hXw"/>
<div class="absolute inset-0 bg-gradient-to-l from-transparent via-transparent to-surface"></div>
<div class="absolute bottom-12 left-12 max-w-md">
<div class="bg-white/10 backdrop-blur-md p-8 rounded-xl border border-white/20">
<span class="material-symbols-outlined text-tertiary-fixed text-[40px] mb-4">verified_user</span>
<h3 class="font-headline-sm text-headline-sm text-white mb-2">Segurança de Nível Empresarial</h3>
<p class="font-body-sm text-body-sm text-white/80 leading-relaxed">
                        Acesso protegido por criptografia de ponta a ponta e auditoria constante de integridade de dados para todos os seus eventos.
                    </p>
</div>
</div>
</div>
</div>
<script>
        function togglePassword() {
            const input = document.getElementById('password');
            const icon = document.getElementById('passIcon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.textContent = 'visibility_off';
            } else {
                input.type = 'password';
                icon.textContent = 'visibility';
            }
        }

        // Lightweight entrance interaction
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('loginForm');
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                const btn = form.querySelector('button[type="submit"]');
                const originalText = btn.innerHTML;
                
                btn.disabled = true;
                btn.innerHTML = `
                    <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>Verificando...</span>
                `;

                // Simulate backend delay
                setTimeout(() => {
                    alert('Backend connection required. Credentials ready for MySQL verification.');
                    btn.disabled = false;
                    btn.innerHTML = originalText;
                }, 1500);
            });
        });
    </script>
</body></html>