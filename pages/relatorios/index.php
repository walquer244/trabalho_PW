<!DOCTYPE html>

<html class="light" lang="pt-BR"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://cdn.jsdelivr.net/npm/geist@1.3.0/dist/fonts/geist.css" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "tertiary-container": "#25005a",
                    "on-surface": "#0b1c30",
                    "surface-container-highest": "#d3e4fe",
                    "surface-container-low": "#eff4ff",
                    "outline-variant": "#c6c6cd",
                    "inverse-surface": "#213145",
                    "tertiary-fixed": "#eaddff",
                    "primary": "#000000",
                    "on-tertiary": "#ffffff",
                    "surface-container-lowest": "#ffffff",
                    "outline": "#76777d",
                    "error-container": "#ffdad6",
                    "on-secondary-fixed": "#002113",
                    "on-background": "#0b1c30",
                    "tertiary-fixed-dim": "#d2bbff",
                    "on-secondary": "#ffffff",
                    "background": "#f8f9ff",
                    "secondary-fixed-dim": "#4edea3",
                    "surface-dim": "#cbdbf5",
                    "on-primary-fixed-variant": "#3f465c",
                    "on-tertiary-fixed-variant": "#5a00c6",
                    "surface-variant": "#d3e4fe",
                    "surface-container-high": "#dce9ff",
                    "surface-tint": "#565e74",
                    "on-primary-container": "#7c839b",
                    "inverse-on-surface": "#eaf1ff",
                    "primary-container": "#131b2e",
                    "on-tertiary-container": "#9863ff",
                    "error": "#ba1a1a",
                    "secondary": "#006c49",
                    "tertiary": "#000000",
                    "on-error-container": "#93000a",
                    "surface-container": "#e5eeff",
                    "surface": "#f8f9ff",
                    "surface-bright": "#f8f9ff",
                    "on-tertiary-fixed": "#25005a",
                    "on-surface-variant": "#45464d",
                    "on-primary": "#ffffff",
                    "secondary-container": "#6cf8bb",
                    "on-primary-fixed": "#131b2e",
                    "on-secondary-container": "#00714d",
                    "on-error": "#ffffff",
                    "primary-fixed-dim": "#bec6e0",
                    "inverse-primary": "#bec6e0",
                    "secondary-fixed": "#6ffbbe",
                    "on-secondary-fixed-variant": "#005236",
                    "primary-fixed": "#dae2fd"
            },
            "borderRadius": {
                    "DEFAULT": "0.125rem",
                    "lg": "0.25rem",
                    "xl": "0.5rem",
                    "full": "0.75rem"
            },
            "spacing": {
                    "stack-md": "16px",
                    "gutter": "24px",
                    "stack-lg": "24px",
                    "unit": "8px",
                    "stack-sm": "8px",
                    "container-padding": "32px",
                    "sidebar-width": "280px"
            },
            "fontFamily": {
                    "body-md": ["geist"],
                    "body-lg": ["geist"],
                    "label-sm": ["geist"],
                    "headline-sm": ["geist"],
                    "headline-md": ["geist"],
                    "headline-lg": ["geist"],
                    "display": ["geist"],
                    "label-md": ["geist"],
                    "body-sm": ["geist"],
                    "headline-lg-mobile": ["geist"]
            },
            "fontSize": {
                    "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                    "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                    "label-sm": ["12px", {"lineHeight": "16px", "letterSpacing": "0.05em", "fontWeight": "600"}],
                    "headline-sm": ["20px", {"lineHeight": "28px", "fontWeight": "600"}],
                    "headline-md": ["24px", {"lineHeight": "32px", "fontWeight": "600"}],
                    "headline-lg": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "600"}],
                    "display": ["48px", {"lineHeight": "56px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                    "label-md": ["14px", {"lineHeight": "20px", "fontWeight": "500"}],
                    "body-sm": ["14px", {"lineHeight": "20px", "fontWeight": "400"}],
                    "headline-lg-mobile": ["24px", {"lineHeight": "32px", "fontWeight": "600"}]
            }
          }
        }
      }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        body { font-family: 'geist', sans-serif; }
        .bento-grid {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            gap: 24px;
        }
        .chart-bar {
            transition: height 1s ease-in-out;
        }
    </style>
</head>
<body class="bg-background text-on-background min-h-screen">
<!-- SideNavBar Shell -->
<aside class="fixed left-0 top-0 h-screen w-sidebar-width z-50 bg-primary dark:bg-primary-container flex flex-col h-full shadow-xl">
<div class="px-6 py-8">
<h1 class="font-headline-sm text-headline-sm font-bold text-on-primary">EventHub Pro</h1>
<p class="font-label-sm text-label-sm text-on-primary/60">Management Console</p>
</div>
<nav class="flex-1 space-y-1">
<a class="text-on-primary-container/70 px-6 py-4 flex items-center gap-3 hover:bg-white/5 transition-all duration-200 active:scale-[0.98]" href="#">
<span class="material-symbols-outlined" data-icon="event">event</span>
<span class="font-body-md text-body-md">Eventos</span>
</a>
<a class="text-on-primary-container/70 px-6 py-4 flex items-center gap-3 hover:bg-white/5 transition-all duration-200 active:scale-[0.98]" href="#">
<span class="material-symbols-outlined" data-icon="groups">groups</span>
<span class="font-body-md text-body-md">Participantes</span>
</a>
<a class="text-tertiary-fixed font-bold border-l-4 border-tertiary-fixed bg-white/10 px-6 py-4 flex items-center gap-3 hover:bg-white/5 transition-all duration-200 active:scale-[0.98]" href="#">
<span class="material-symbols-outlined" data-icon="analytics">analytics</span>
<span class="font-body-md text-body-md">Relatórios</span>
</a>
</nav>
<div class="mt-auto border-t border-white/10">
<a class="text-on-primary-container/70 px-6 py-4 flex items-center gap-3 hover:bg-white/5 transition-all duration-200" href="#">
<span class="material-symbols-outlined" data-icon="settings">settings</span>
<span class="font-body-md text-body-md">Configurações</span>
</a>
<a class="text-on-primary-container/70 px-6 py-4 flex items-center gap-3 hover:bg-white/5 transition-all duration-200" href="#">
<span class="material-symbols-outlined" data-icon="logout">logout</span>
<span class="font-body-md text-body-md">Sair</span>
</a>
</div>
</aside>
<!-- Main Canvas -->
<main class="ml-[280px]">
<!-- TopAppBar Shell -->
<header class="fixed top-0 right-0 left-[280px] h-16 z-40 bg-surface dark:bg-surface-dim border-b border-outline-variant dark:border-outline flex justify-between items-center px-gutter w-full">
<div class="flex items-center gap-4 flex-1">
<span class="font-headline-sm text-headline-sm text-on-surface font-semibold">Dashboard</span>
<div class="relative w-full max-w-md">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
<input class="w-full bg-surface-container-low border-none rounded-full py-2 pl-10 pr-4 text-label-md focus:ring-2 focus:ring-primary/20 transition-all" placeholder="Pesquisar relatórios..." type="text"/>
</div>
</div>
<div class="flex items-center gap-2">
<button class="p-2 hover:bg-surface-container-high rounded-full transition-colors">
<span class="material-symbols-outlined" data-icon="notifications">notifications</span>
</button>
<button class="p-2 hover:bg-surface-container-high rounded-full transition-colors">
<span class="material-symbols-outlined" data-icon="help">help</span>
</button>
<button class="p-2 hover:bg-surface-container-high rounded-full transition-colors">
<span class="material-symbols-outlined" data-icon="apps">apps</span>
</button>
<div class="ml-4 flex items-center gap-3 cursor-pointer hover:bg-surface-container-high p-1 pr-3 rounded-full transition-colors">
<img class="w-8 h-8 rounded-full border border-outline-variant object-cover" data-alt="A professional headshot of a female event manager with a warm smile, set against a blurred modern office background. The lighting is soft and corporate, utilizing a bright and clean light-mode aesthetic. The color palette is composed of natural skin tones and professional neutrals, conveying reliability and modern sophistication." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAEamf8HBPyiZ7AX6nOB6v_ZoCt2RcXGylPqAAjR7FliJe8y_FBbgoesk2ST_SoKk1s3r4l0XVDcqbbKXf9qj_itGvUnmrk52v09TKk38Xm3dpiKxk4Mw9YVGsRnW9tSPCwRDayo9lQuvg5Xg0daoCoScHx6KjNrckyIK05mzydI8SRI74fc7RwtP7ZBQvVWVE39tY04A_97d28NvZLLljF38JZfRwEvOLKn2DZFcQQ4TJwxrIXHpnDqufkIzIIYlHsUa9aywCEwD8"/>
<span class="font-label-md text-label-md text-on-surface">Mariana Silva</span>
</div>
</div>
</header>
<!-- Content Area -->
<div class="pt-24 px-container-padding pb-gutter">
<!-- Header Section -->
<div class="flex justify-between items-end mb-stack-lg">
<div>
<h2 class="font-headline-lg text-headline-lg text-on-surface">Relatórios de Desempenho</h2>
<p class="font-body-md text-body-md text-on-surface-variant">Visão consolidada de métricas e conversões do evento selecionado.</p>
</div>
<div class="flex items-center gap-3">
<div class="flex flex-col">
<label class="font-label-sm text-label-sm text-on-surface-variant mb-1">Selecionar Evento</label>
<select class="bg-white border border-outline-variant rounded-lg px-4 py-2 font-label-md text-label-md focus:ring-2 focus:ring-primary/20">
<option>Tech Summit 2024</option>
<option>Workshop de Liderança</option>
<option>Webinar IA Generativa</option>
</select>
</div>
<button class="mt-auto h-[42px] bg-primary text-on-primary px-6 rounded-lg font-label-md text-label-md flex items-center gap-2 hover:opacity-90 transition-opacity">
<span class="material-symbols-outlined" data-icon="download">download</span>
                        Exportar Relatório
                    </button>
</div>
</div>
<!-- Bento Metrics Grid -->
<div class="bento-grid mb-stack-lg">
<!-- Stat 1 -->
<div class="col-span-3 bg-white p-6 rounded-xl border border-outline-variant flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-4">
<span class="p-2 bg-surface-container-low rounded-lg">
<span class="material-symbols-outlined text-primary" data-icon="person_add">person_add</span>
</span>
<span class="bg-secondary/10 text-secondary font-label-sm text-label-sm px-2 py-1 rounded-full">+12%</span>
</div>
<span class="font-label-md text-label-md text-on-surface-variant">Total de Inscritos</span>
</div>
<div class="mt-2">
<span class="font-headline-md text-headline-md text-on-surface">1,284</span>
</div>
</div>
<!-- Stat 2 -->
<div class="col-span-3 bg-white p-6 rounded-xl border border-outline-variant flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-4">
<span class="p-2 bg-surface-container-low rounded-lg">
<span class="material-symbols-outlined text-primary" data-icon="payments">payments</span>
</span>
<span class="bg-secondary/10 text-secondary font-label-sm text-label-sm px-2 py-1 rounded-full">+8.4%</span>
</div>
<span class="font-label-md text-label-md text-on-surface-variant">Receita Gerada</span>
</div>
<div class="mt-2">
<span class="font-headline-md text-headline-md text-on-surface">R$ 42.600,00</span>
</div>
</div>
<!-- Stat 3 -->
<div class="col-span-3 bg-white p-6 rounded-xl border border-outline-variant flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-4">
<span class="p-2 bg-surface-container-low rounded-lg">
<span class="material-symbols-outlined text-primary" data-icon="how_to_reg">how_to_reg</span>
</span>
<span class="bg-error/10 text-error font-label-sm text-label-sm px-2 py-1 rounded-full">-2.1%</span>
</div>
<span class="font-label-md text-label-md text-on-surface-variant">Check-ins Realizados</span>
</div>
<div class="mt-2">
<span class="font-headline-md text-headline-md text-on-surface">856 / 1284</span>
</div>
</div>
<!-- Stat 4 -->
<div class="col-span-3 bg-white p-6 rounded-xl border border-outline-variant flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-4">
<span class="p-2 bg-surface-container-low rounded-lg">
<span class="material-symbols-outlined text-primary" data-icon="ads_click">ads_click</span>
</span>
<span class="bg-secondary/10 text-secondary font-label-sm text-label-sm px-2 py-1 rounded-full">+4.2%</span>
</div>
<span class="font-label-md text-label-md text-on-surface-variant">Taxa de Conversão</span>
</div>
<div class="mt-2">
<span class="font-headline-md text-headline-md text-on-surface">18.5%</span>
</div>
</div>
<!-- Sales Growth Chart -->
<div class="col-span-8 bg-white p-8 rounded-xl border border-outline-variant">
<div class="flex justify-between items-center mb-8">
<h3 class="font-headline-sm text-headline-sm text-on-surface">Desempenho de Vendas</h3>
<div class="flex gap-2">
<button class="text-label-sm text-label-sm px-3 py-1 bg-surface-container-low rounded text-primary">7 Dias</button>
<button class="text-label-sm text-label-sm px-3 py-1 hover:bg-surface-container-low rounded">30 Dias</button>
<button class="text-label-sm text-label-sm px-3 py-1 hover:bg-surface-container-low rounded">Ano</button>
</div>
</div>
<div class="h-64 flex items-end justify-between gap-4">
<!-- Bar chart mockup -->
<div class="flex flex-col items-center flex-1 gap-2">
<div class="w-full bg-primary/10 hover:bg-primary/20 transition-colors rounded-t-lg chart-bar" style="height: 40%"></div>
<span class="text-label-sm text-label-sm text-on-surface-variant">Seg</span>
</div>
<div class="flex flex-col items-center flex-1 gap-2">
<div class="w-full bg-primary/10 hover:bg-primary/20 transition-colors rounded-t-lg chart-bar" style="height: 65%"></div>
<span class="text-label-sm text-label-sm text-on-surface-variant">Ter</span>
</div>
<div class="flex flex-col items-center flex-1 gap-2">
<div class="w-full bg-primary/10 hover:bg-primary/20 transition-colors rounded-t-lg chart-bar" style="height: 55%"></div>
<span class="text-label-sm text-label-sm text-on-surface-variant">Qua</span>
</div>
<div class="flex flex-col items-center flex-1 gap-2">
<div class="w-full bg-primary/10 hover:bg-primary/20 transition-colors rounded-t-lg chart-bar" style="height: 85%"></div>
<span class="text-label-sm text-label-sm text-on-surface-variant">Qui</span>
</div>
<div class="flex flex-col items-center flex-1 gap-2">
<div class="w-full bg-primary hover:bg-primary/90 transition-colors rounded-t-lg chart-bar" style="height: 95%"></div>
<span class="text-label-sm text-label-sm font-bold text-on-surface">Hoje</span>
</div>
<div class="flex flex-col items-center flex-1 gap-2">
<div class="w-full bg-primary/5 hover:bg-primary/10 transition-colors rounded-t-lg chart-bar" style="height: 10%"></div>
<span class="text-label-sm text-label-sm text-on-surface-variant">Sáb</span>
</div>
<div class="flex flex-col items-center flex-1 gap-2">
<div class="w-full bg-primary/5 hover:bg-primary/10 transition-colors rounded-t-lg chart-bar" style="height: 5%"></div>
<span class="text-label-sm text-label-sm text-on-surface-variant">Dom</span>
</div>
</div>
</div>
<!-- Export & Actions -->
<div class="col-span-4 bg-primary-container p-8 rounded-xl border border-outline flex flex-col justify-between">
<div>
<h3 class="font-headline-sm text-headline-sm text-white mb-2">Exportar Dados</h3>
<p class="font-body-sm text-body-sm text-white/70 mb-6">Selecione o formato desejado para baixar o relatório completo detalhado por participante.</p>
<div class="space-y-3">
<button class="w-full bg-white/10 hover:bg-white/20 text-white rounded-lg p-4 flex items-center justify-between transition-colors group">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-tertiary-fixed" data-icon="picture_as_pdf">picture_as_pdf</span>
<span class="font-label-md text-label-md">Documento PDF</span>
</div>
<span class="material-symbols-outlined opacity-0 group-hover:opacity-100 transition-opacity" data-icon="arrow_forward">arrow_forward</span>
</button>
<button class="w-full bg-white/10 hover:bg-white/20 text-white rounded-lg p-4 flex items-center justify-between transition-colors group">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-secondary-fixed" data-icon="csv">csv</span>
<span class="font-label-md text-label-md">Planilha CSV</span>
</div>
<span class="material-symbols-outlined opacity-0 group-hover:opacity-100 transition-opacity" data-icon="arrow_forward">arrow_forward</span>
</button>
</div>
</div>
<div class="mt-8 pt-8 border-t border-white/10">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-white/50">Última atualização</span>
<span class="font-label-sm text-label-sm text-white">Há 5 minutos</span>
</div>
</div>
</div>
</div>
<!-- Detailed Data Table Section -->
<div class="bg-white rounded-xl border border-outline-variant overflow-hidden">
<div class="px-8 py-6 border-b border-outline-variant flex justify-between items-center">
<h3 class="font-headline-sm text-headline-sm text-on-surface">Vendas Recentes</h3>
<button class="text-primary font-label-md text-label-md hover:underline">Ver tudo</button>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left">
<thead class="bg-surface-container-low border-b border-outline-variant">
<tr>
<th class="px-8 py-4 font-label-sm text-label-sm text-on-surface-variant uppercase">Participante</th>
<th class="px-8 py-4 font-label-sm text-label-sm text-on-surface-variant uppercase">Tipo de Ingresso</th>
<th class="px-8 py-4 font-label-sm text-label-sm text-on-surface-variant uppercase">Data da Compra</th>
<th class="px-8 py-4 font-label-sm text-label-sm text-on-surface-variant uppercase">Valor</th>
<th class="px-8 py-4 font-label-sm text-label-sm text-on-surface-variant uppercase">Status</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant">
<tr class="hover:bg-surface-container-low transition-colors cursor-pointer">
<td class="px-8 py-4">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-tertiary-fixed text-tertiary font-bold flex items-center justify-center text-label-sm">RA</div>
<span class="font-label-md text-label-md text-on-surface">Ricardo Almeida</span>
</div>
</td>
<td class="px-8 py-4 font-body-sm text-body-sm">VIP Experience</td>
<td class="px-8 py-4 font-body-sm text-body-sm text-on-surface-variant">14 Out, 2023 • 14:32</td>
<td class="px-8 py-4 font-label-md text-label-md">R$ 450,00</td>
<td class="px-8 py-4">
<span class="px-3 py-1 bg-secondary/10 text-secondary rounded-full font-label-sm text-label-sm">Confirmado</span>
</td>
</tr>
<tr class="hover:bg-surface-container-low transition-colors cursor-pointer">
<td class="px-8 py-4">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-primary-fixed text-primary font-bold flex items-center justify-center text-label-sm">JS</div>
<span class="font-label-md text-label-md text-on-surface">Juliana Santos</span>
</div>
</td>
<td class="px-8 py-4 font-body-sm text-body-sm">General Admission</td>
<td class="px-8 py-4 font-body-sm text-body-sm text-on-surface-variant">14 Out, 2023 • 12:15</td>
<td class="px-8 py-4 font-label-md text-label-md">R$ 150,00</td>
<td class="px-8 py-4">
<span class="px-3 py-1 bg-secondary/10 text-secondary rounded-full font-label-sm text-label-sm">Confirmado</span>
</td>
</tr>
<tr class="hover:bg-surface-container-low transition-colors cursor-pointer">
<td class="px-8 py-4">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-outline-variant text-on-surface-variant font-bold flex items-center justify-center text-label-sm">FB</div>
<span class="font-label-md text-label-md text-on-surface">Felipe Barbosa</span>
</div>
</td>
<td class="px-8 py-4 font-body-sm text-body-sm">VIP Experience</td>
<td class="px-8 py-4 font-body-sm text-body-sm text-on-surface-variant">14 Out, 2023 • 09:44</td>
<td class="px-8 py-4 font-label-md text-label-md">R$ 450,00</td>
<td class="px-8 py-4">
<span class="px-3 py-1 bg-surface-container-high text-on-surface-variant rounded-full font-label-sm text-label-sm">Pendente</span>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</main>
<script>
        // Simple interactive effect for chart bars
        document.querySelectorAll('.chart-bar').forEach(bar => {
            bar.addEventListener('mouseenter', () => {
                bar.classList.add('scale-x-105');
            });
            bar.addEventListener('mouseleave', () => {
                bar.classList.remove('scale-x-105');
            });
        });

        // Search bar interaction
        const searchInput = document.querySelector('input[type="text"]');
        searchInput.addEventListener('focus', () => {
            searchInput.parentElement.classList.add('scale-[1.02]');
        });
        searchInput.addEventListener('blur', () => {
            searchInput.parentElement.classList.remove('scale-[1.02]');
        });
    </script>
</body></html>