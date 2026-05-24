<!DOCTYPE html>

<html lang="pt-BR"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://cdn.jsdelivr.net/npm/geist@1.3.0/dist/fonts/geist.min.css" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-surface-variant": "#45464d",
                        "outline-variant": "#c6c6cd",
                        "surface-container": "#e5eeff",
                        "tertiary-fixed": "#eaddff",
                        "on-surface": "#0b1c30",
                        "surface-tint": "#565e74",
                        "surface-bright": "#f8f9ff",
                        "on-secondary": "#ffffff",
                        "surface-container-high": "#dce9ff",
                        "surface": "#f8f9ff",
                        "secondary-container": "#6cf8bb",
                        "error-container": "#ffdad6",
                        "on-primary-container": "#7c839b",
                        "primary-fixed": "#dae2fd",
                        "on-error": "#ffffff",
                        "inverse-primary": "#bec6e0",
                        "tertiary-container": "#25005a",
                        "primary": "#000000",
                        "on-secondary-fixed-variant": "#005236",
                        "inverse-on-surface": "#eaf1ff",
                        "surface-dim": "#cbdbf5",
                        "primary-fixed-dim": "#bec6e0",
                        "surface-container-highest": "#d3e4fe",
                        "primary-container": "#131b2e",
                        "on-primary-fixed": "#131b2e",
                        "surface-variant": "#d3e4fe",
                        "error": "#ba1a1a",
                        "outline": "#76777d",
                        "surface-container-low": "#eff4ff",
                        "secondary-fixed": "#6ffbbe",
                        "on-tertiary": "#ffffff",
                        "on-error-container": "#93000a",
                        "background": "#f8f9ff",
                        "secondary-fixed-dim": "#4edea3",
                        "tertiary": "#000000",
                        "on-primary-fixed-variant": "#3f465c",
                        "secondary": "#006c49",
                        "inverse-surface": "#213145",
                        "on-tertiary-container": "#9863ff",
                        "on-primary": "#ffffff",
                        "on-background": "#0b1c30",
                        "on-secondary-fixed": "#002113",
                        "on-secondary-container": "#00714d",
                        "surface-container-lowest": "#ffffff",
                        "on-tertiary-fixed": "#25005a",
                        "on-tertiary-fixed-variant": "#5a00c6",
                        "tertiary-fixed-dim": "#d2bbff"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.125rem",
                        "lg": "0.25rem",
                        "xl": "0.5rem",
                        "full": "0.75rem"
                    },
                    "spacing": {
                        "gutter": "24px",
                        "stack-sm": "8px",
                        "stack-md": "16px",
                        "container-padding": "32px",
                        "sidebar-width": "280px",
                        "stack-lg": "24px",
                        "unit": "8px"
                    },
                    "fontFamily": {
                        "body-sm": ["geist"],
                        "headline-lg": ["geist"],
                        "headline-lg-mobile": ["geist"],
                        "body-md": ["geist"],
                        "label-sm": ["geist"],
                        "headline-md": ["geist"],
                        "display": ["geist"],
                        "label-md": ["geist"],
                        "body-lg": ["geist"],
                        "headline-sm": ["geist"]
                    },
                    "fontSize": {
                        "body-sm": ["14px", {"lineHeight": "20px", "fontWeight": "400"}],
                        "headline-lg": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "600"}],
                        "headline-lg-mobile": ["24px", {"lineHeight": "32px", "fontWeight": "600"}],
                        "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                        "label-sm": ["12px", {"lineHeight": "16px", "letterSpacing": "0.05em", "fontWeight": "600"}],
                        "headline-md": ["24px", {"lineHeight": "32px", "fontWeight": "600"}],
                        "display": ["48px", {"lineHeight": "56px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                        "label-md": ["14px", {"lineHeight": "20px", "fontWeight": "500"}],
                        "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                        "headline-sm": ["20px", {"lineHeight": "28px", "fontWeight": "600"}]
                    }
                },
            },
        }
    </script>
<style>
        body { font-family: 'Geist', sans-serif; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .sidebar-active-indicator {
            box-shadow: -4px 0 0 0 #eaddff inset;
        }
    </style>
</head>
<body class="bg-background text-on-background antialiased overflow-x-hidden">
<!-- SideNavBar -->
<aside class="fixed left-0 top-0 h-screen w-[280px] z-50 bg-primary-container flex flex-col">
<div class="px-6 py-8">
<h1 class="font-headline-sm text-headline-sm font-bold text-on-primary">EventHub Pro</h1>
<p class="font-label-sm text-label-sm text-on-primary-container opacity-70">Management Console</p>
</div>
<nav class="flex-grow flex flex-col">
<a class="text-tertiary-fixed font-bold border-l-4 border-tertiary-fixed bg-white/10 px-6 py-4 flex items-center gap-3 transition-all duration-200 hover:bg-white/5 active:scale-[0.98]" href="#">
<span class="material-symbols-outlined">dashboard</span>
<span class="font-body-md text-body-md">Dashboard</span>
</a>
<a class="text-on-primary-container/70 px-6 py-4 flex items-center gap-3 transition-all duration-200 hover:bg-white/5 active:scale-[0.98]" href="#">
<span class="material-symbols-outlined">event</span>
<span class="font-body-md text-body-md">Eventos</span>
</a>
<a class="text-on-primary-container/70 px-6 py-4 flex items-center gap-3 transition-all duration-200 hover:bg-white/5 active:scale-[0.98]" href="#">
<span class="material-symbols-outlined">groups</span>
<span class="font-body-md text-body-md">Participantes</span>
</a>
<a class="text-on-primary-container/70 px-6 py-4 flex items-center gap-3 transition-all duration-200 hover:bg-white/5 active:scale-[0.98]" href="#">
<span class="material-symbols-outlined">analytics</span>
<span class="font-body-md text-body-md">Relatórios</span>
</a>
</nav>
<div class="mt-auto border-t border-white/5 flex flex-col py-4">
<a class="text-on-primary-container/70 px-6 py-4 flex items-center gap-3 transition-all duration-200 hover:bg-white/5 active:scale-[0.98]" href="#">
<span class="material-symbols-outlined">settings</span>
<span class="font-body-md text-body-md">Configurações</span>
</a>
<a class="text-on-primary-container/70 px-6 py-4 flex items-center gap-3 transition-all duration-200 hover:bg-white/5 active:scale-[0.98]" href="#">
<span class="material-symbols-outlined">logout</span>
<span class="font-body-md text-body-md">Sair</span>
</a>
</div>
</aside>
<!-- TopAppBar -->
<header class="fixed top-0 right-0 left-[280px] h-16 z-40 bg-surface border-b border-outline-variant flex justify-between items-center px-gutter">
<div class="flex items-center gap-4 flex-grow max-w-xl">
<div class="relative w-full focus-within:ring-2 focus-within:ring-primary/20 transition-all rounded-full bg-surface-container-low px-4 py-2 flex items-center gap-2">
<span class="material-symbols-outlined text-outline">search</span>
<input class="bg-transparent border-none focus:ring-0 w-full text-label-md font-label-md text-on-surface" placeholder="Buscar eventos, participantes..." type="text"/>
</div>
</div>
<div class="flex items-center gap-4">
<button class="p-2 hover:bg-surface-container-high rounded-full transition-colors relative">
<span class="material-symbols-outlined text-on-surface-variant">notifications</span>
<span class="absolute top-2 right-2 w-2 h-2 bg-error rounded-full"></span>
</button>
<button class="p-2 hover:bg-surface-container-high rounded-full transition-colors">
<span class="material-symbols-outlined text-on-surface-variant">help</span>
</button>
<div class="h-8 w-[1px] bg-outline-variant mx-2"></div>
<div class="flex items-center gap-3 cursor-pointer group">
<div class="text-right hidden lg:block">
<p class="font-label-md text-label-md text-on-surface font-semibold leading-none">Admin User</p>
<p class="font-label-sm text-label-sm text-on-surface-variant opacity-70">Event Manager</p>
</div>
<img alt="User Profile" class="w-10 h-10 rounded-full object-cover border border-outline-variant group-hover:border-primary transition-colors" data-alt="A professional headshot of a smiling corporate manager in a high-key lighting environment. The background is a soft, blurred modern office setting with cool blue and white tones. The lighting is clean and professional, creating a polished, authoritative look consistent with a high-end dashboard interface." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCShkZ-ofHv7_Mz3cSrIljJv0RFbBx5iApXX_rHA_8wxmUBesPiPjby_Yw7SAdL-uP_ZTBKUcEqDduGZeGiSVf8xMdjvJ8pt_lUqIU98233YSpeiFA0dfBuTUI4kH2rlcTqI2Oxnbf5-L9cOWQBvvAgJ0dQX4uWhGQwPW8OlfNMUoqITsrwdm5SWb-7yi7mjw1vSdETVqucg9j496gaxTXAwbT1Ji2S1zmDcO6wpDLX-M22XlwxBT8uYf45WKy-eHS6EPWcMjxGCCU"/>
</div>
</div>
</header>
<!-- Main Content -->
<main class="ml-[280px] pt-16 min-h-screen p-container-padding">
<!-- Welcome Header -->
<header class="mb-stack-lg">
<h2 class="font-headline-lg text-headline-lg text-on-surface mb-1">Bem-vindo ao Console de Eventos</h2>
<p class="font-body-md text-body-md text-on-surface-variant">Aqui está o resumo da sua operação para hoje.</p>
</header>
<!-- Stats Overview Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-stack-lg mb-stack-lg">
<div class="bg-surface p-6 rounded-xl border border-outline-variant shadow-sm hover:shadow-md transition-shadow">
<div class="flex items-center justify-between mb-4">
<div class="p-3 bg-primary-container text-tertiary-fixed rounded-lg">
<span class="material-symbols-outlined">event_available</span>
</div>
<span class="font-label-sm text-label-sm text-secondary font-bold">+12% vs mês anterior</span>
</div>
<p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider mb-1">Total de Eventos</p>
<p class="font-display text-display text-on-surface">42</p>
</div>
<div class="bg-surface p-6 rounded-xl border border-outline-variant shadow-sm hover:shadow-md transition-shadow">
<div class="flex items-center justify-between mb-4">
<div class="p-3 bg-secondary-container text-on-secondary-container rounded-lg">
<span class="material-symbols-outlined">group</span>
</div>
<span class="font-label-sm text-label-sm text-secondary font-bold">+8.4k inscritos</span>
</div>
<p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider mb-1">Participantes Ativos</p>
<p class="font-display text-display text-on-surface">12.850</p>
</div>
<div class="bg-surface p-6 rounded-xl border border-outline-variant shadow-sm hover:shadow-md transition-shadow">
<div class="flex items-center justify-between mb-4">
<div class="p-3 bg-tertiary-container text-tertiary-fixed rounded-lg">
<span class="material-symbols-outlined">payments</span>
</div>
<span class="font-label-sm text-label-sm text-secondary font-bold">+R$ 15k hoje</span>
</div>
<p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider mb-1">Receita Mensal</p>
<p class="font-display text-display text-on-surface">R$ 284k</p>
</div>
</div>
<!-- Bento Grid Section -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-stack-lg items-start">
<!-- Table Container: Upcoming Events -->
<section class="lg:col-span-8 bg-surface rounded-xl border border-outline-variant overflow-hidden">
<div class="px-6 py-5 border-b border-outline-variant flex justify-between items-center bg-surface-container-lowest">
<h3 class="font-headline-sm text-headline-sm text-on-surface">Próximos Eventos</h3>
<button class="text-primary font-label-md text-label-md hover:underline">Ver todos</button>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left">
<thead class="bg-surface-container-low border-b border-outline-variant">
<tr>
<th class="px-6 py-4 font-label-sm text-label-sm text-on-surface-variant uppercase">Evento</th>
<th class="px-6 py-4 font-label-sm text-label-sm text-on-surface-variant uppercase">Data</th>
<th class="px-6 py-4 font-label-sm text-label-sm text-on-surface-variant uppercase">Local</th>
<th class="px-6 py-4 font-label-sm text-label-sm text-on-surface-variant uppercase">Status</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant">
<tr class="hover:bg-surface-container-low/50 transition-colors cursor-pointer">
<td class="px-6 py-5">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded bg-primary-container flex items-center justify-center text-on-primary text-xs font-bold">TECH</div>
<span class="font-label-md text-label-md text-on-surface">Tech Summit 2024</span>
</div>
</td>
<td class="px-6 py-5 font-body-sm text-body-sm text-on-surface-variant">15 Out, 2024</td>
<td class="px-6 py-5 font-body-sm text-body-sm text-on-surface-variant">São Paulo, SP</td>
<td class="px-6 py-5">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-secondary-fixed/20 text-on-secondary-container">
                                        Vendas Abertas
                                    </span>
</td>
</tr>
<tr class="hover:bg-surface-container-low/50 transition-colors cursor-pointer">
<td class="px-6 py-5">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded bg-tertiary-container flex items-center justify-center text-on-tertiary-container text-xs font-bold">MKT</div>
<span class="font-label-md text-label-md text-on-surface">Marketing Trends</span>
</div>
</td>
<td class="px-6 py-5 font-body-sm text-body-sm text-on-surface-variant">22 Out, 2024</td>
<td class="px-6 py-5 font-body-sm text-body-sm text-on-surface-variant">Rio de Janeiro, RJ</td>
<td class="px-6 py-5">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary-fixed/30 text-on-primary-fixed">
                                        Planejamento
                                    </span>
</td>
</tr>
<tr class="hover:bg-surface-container-low/50 transition-colors cursor-pointer">
<td class="px-6 py-5">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded bg-secondary-container flex items-center justify-center text-on-secondary-container text-xs font-bold">MED</div>
<span class="font-label-md text-label-md text-on-surface">Congresso de Medicina</span>
</div>
</td>
<td class="px-6 py-5 font-body-sm text-body-sm text-on-surface-variant">05 Nov, 2024</td>
<td class="px-6 py-5 font-body-sm text-body-sm text-on-surface-variant">Belo Horizonte, MG</td>
<td class="px-6 py-5">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-error-container/40 text-on-error-container">
                                        Esgotado
                                    </span>
</td>
</tr>
<tr class="hover:bg-surface-container-low/50 transition-colors cursor-pointer">
<td class="px-6 py-5">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded bg-outline-variant flex items-center justify-center text-on-surface-variant text-xs font-bold">EXP</div>
<span class="font-label-md text-label-md text-on-surface">Expo Agro 2024</span>
</div>
</td>
<td class="px-6 py-5 font-body-sm text-body-sm text-on-surface-variant">12 Nov, 2024</td>
<td class="px-6 py-5 font-body-sm text-body-sm text-on-surface-variant">Curitiba, PR</td>
<td class="px-6 py-5">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-secondary-fixed/20 text-on-secondary-container">
                                        Vendas Abertas
                                    </span>
</td>
</tr>
</tbody>
</table>
</div>
</section>
<!-- Activity Feed -->
<section class="lg:col-span-4 space-y-stack-lg">
<div class="bg-surface rounded-xl border border-outline-variant p-6 h-full">
<h3 class="font-headline-sm text-headline-sm text-on-surface mb-6">Atividades Recentes</h3>
<div class="relative">
<!-- Timeline Line -->
<div class="absolute left-3 top-0 bottom-0 w-[2px] bg-outline-variant"></div>
<div class="space-y-8 relative">
<div class="flex gap-4 pl-8 relative">
<div class="absolute left-[-2px] top-1.5 w-3.5 h-3.5 bg-primary rounded-full border-2 border-white"></div>
<div>
<p class="font-label-md text-label-md text-on-surface">Novo participante inscrito</p>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Carlos Eduardo se inscreveu no Tech Summit 2024.</p>
<span class="font-label-sm text-label-sm text-on-surface-variant opacity-60 mt-2 block">Há 5 minutos</span>
</div>
</div>
<div class="flex gap-4 pl-8 relative">
<div class="absolute left-[-2px] top-1.5 w-3.5 h-3.5 bg-secondary rounded-full border-2 border-white"></div>
<div>
<p class="font-label-md text-label-md text-on-surface">Pagamento confirmado</p>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Inscrição #A9432 processada com sucesso via Cartão.</p>
<span class="font-label-sm text-label-sm text-on-surface-variant opacity-60 mt-2 block">Há 22 minutos</span>
</div>
</div>
<div class="flex gap-4 pl-8 relative">
<div class="absolute left-[-2px] top-1.5 w-3.5 h-3.5 bg-tertiary-container rounded-full border-2 border-white"></div>
<div>
<p class="font-label-md text-label-md text-on-surface">Evento atualizado</p>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Local do evento Marketing Trends alterado para Sala B.</p>
<span class="font-label-sm text-label-sm text-on-surface-variant opacity-60 mt-2 block">Há 2 horas</span>
</div>
</div>
<div class="flex gap-4 pl-8 relative">
<div class="absolute left-[-2px] top-1.5 w-3.5 h-3.5 bg-outline rounded-full border-2 border-white"></div>
<div>
<p class="font-label-md text-label-md text-on-surface">Relatório gerado</p>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">O relatório mensal de Setembro está pronto para download.</p>
<span class="font-label-sm text-label-sm text-on-surface-variant opacity-60 mt-2 block">Há 4 horas</span>
</div>
</div>
</div>
</div>
<button class="w-full mt-8 py-3 bg-surface-container-low text-on-surface font-label-md text-label-md rounded-lg hover:bg-surface-container-high transition-colors">
                        Ver histórico completo
                    </button>
</div>
</section>
</div>
<!-- Quick Action Floating Button (Contextual) -->
<button class="fixed bottom-10 right-10 w-14 h-14 bg-primary text-on-primary rounded-full shadow-2xl flex items-center justify-center hover:scale-110 active:scale-95 transition-all z-50">
<span class="material-symbols-outlined">add</span>
</button>
</main>
<script>
        // Micro-interactions and subtle effects
        document.querySelectorAll('a, button').forEach(el => {
            el.addEventListener('click', (e) => {
                // Simple ripple effect or interaction feedback could go here
            });
        });

        // Search bar focus effect
        const searchInput = document.querySelector('input[type="text"]');
        searchInput.addEventListener('focus', () => {
            searchInput.parentElement.classList.add('ring-2', 'ring-primary/20');
        });
        searchInput.addEventListener('blur', () => {
            searchInput.parentElement.classList.remove('ring-2', 'ring-primary/20');
        });
    </script>
</body></html>