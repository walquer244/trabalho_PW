<!DOCTYPE html>

<html class="light" lang="pt-BR"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<style>
        @font-face {
            font-family: 'geist';
            src: url('https://fonts.googleapis.com/css2?family=Geist:wght@100..900&display=swap');
        }
        body { font-family: 'geist', sans-serif; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
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
</head>
<body class="bg-background text-on-background min-h-screen">
<!-- SideNavBar -->
<aside class="fixed left-0 top-0 h-screen w-sidebar-width z-50 bg-primary dark:bg-primary-container flex flex-col h-full">
<div class="px-6 py-8">
<h1 class="font-headline-sm text-headline-sm font-bold text-on-primary">EventHub Pro</h1>
<p class="text-on-primary-container/60 font-label-sm text-label-sm uppercase tracking-wider">Management Console</p>
</div>
<nav class="flex-grow">
<ul class="space-y-1">
<li>
<a class="text-on-primary-container/70 px-6 py-4 flex items-center gap-3 hover:bg-white/5 transition-all duration-200" href="#">
<span class="material-symbols-outlined" data-icon="event">event</span>
<span class="font-label-md text-label-md">Eventos</span>
</a>
</li>
<li>
<a class="text-tertiary-fixed font-bold border-l-4 border-tertiary-fixed bg-white/10 px-6 py-4 flex items-center gap-3 hover:bg-white/5 transition-all duration-200" href="#">
<span class="material-symbols-outlined" data-icon="groups">groups</span>
<span class="font-label-md text-label-md">Participantes</span>
</a>
</li>
<li>
<a class="text-on-primary-container/70 px-6 py-4 flex items-center gap-3 hover:bg-white/5 transition-all duration-200" href="#">
<span class="material-symbols-outlined" data-icon="analytics">analytics</span>
<span class="font-label-md text-label-md">Relatórios</span>
</a>
</li>
</ul>
</nav>
<div class="mt-auto border-t border-white/10 pt-4 pb-8">
<ul class="space-y-1">
<li>
<a class="text-on-primary-container/70 px-6 py-4 flex items-center gap-3 hover:bg-white/5 transition-all duration-200" href="#">
<span class="material-symbols-outlined" data-icon="settings">settings</span>
<span class="font-label-md text-label-md">Configurações</span>
</a>
</li>
<li>
<a class="text-on-primary-container/70 px-6 py-4 flex items-center gap-3 hover:bg-white/5 transition-all duration-200" href="#">
<span class="material-symbols-outlined" data-icon="logout">logout</span>
<span class="font-label-md text-label-md">Sair</span>
</a>
</li>
</ul>
</div>
</aside>
<!-- Main Content Area -->
<div class="ml-[280px] min-h-screen flex flex-col">
<!-- TopAppBar -->
<header class="fixed top-0 right-0 left-[280px] h-16 z-40 bg-surface dark:bg-surface-dim border-b border-outline-variant dark:border-outline flex justify-between items-center px-gutter w-full">
<div class="flex items-center gap-4">
<h2 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Participantes</h2>
</div>
<div class="flex items-center gap-4">
<div class="relative group">
<button class="p-2 hover:bg-surface-container-high dark:hover:bg-surface-variant rounded-full transition-colors relative">
<span class="material-symbols-outlined" data-icon="notifications">notifications</span>
<span class="absolute top-2 right-2 w-2 h-2 bg-error rounded-full"></span>
</button>
</div>
<button class="p-2 hover:bg-surface-container-high dark:hover:bg-surface-variant rounded-full transition-colors">
<span class="material-symbols-outlined" data-icon="help">help</span>
</button>
<div class="h-8 w-8 rounded-full bg-primary-fixed overflow-hidden border border-outline-variant">
<img alt="User Profile" class="h-full w-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAp3csdx8s3BM2kP_Km5Bg02ZhZJdwTHlx2ymVxZx18pZF1E2roa1lT7DK_yO3vk1YlX6Wi5K72POvxLP1rJ1WUqasyujacyvR-mtRTzSfGC1hOQdL0IZ1TXsJZKg73iXdbG7a4kG3SG1Q76Rvq2sIGH2HdG953b3vwzSkCEeHk1JCWycWsRx7dPaoKjfIAJ0XWkkSXe9Xx4Fl6U3iq8dmxtPXA1hynJlBHdMDQ3pQCUFQSdm5DoorF1yNnWGvTxdAdlnzheJrnEN4"/>
</div>
</div>
</header>
<!-- Content Canvas -->
<main class="mt-16 p-gutter flex-grow">
<!-- Header Section -->
<div class="mb-stack-lg flex flex-col md:flex-row md:items-center justify-between gap-4">
<div>
<h3 class="font-headline-md text-headline-md text-on-surface">Gestão de Participantes</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Visualize e gerencie todos os inscritos em seus eventos.</p>
</div>
<button class="bg-primary text-on-primary px-6 py-2.5 rounded-lg flex items-center gap-2 font-label-md text-label-md hover:bg-primary/90 transition-all active:scale-[0.98]">
<span class="material-symbols-outlined text-[20px]" data-icon="add">add</span>
                    Adicionar Participante
                </button>
</div>
<!-- Filter & Search Bar -->
<div class="bg-surface-container-lowest p-4 rounded-xl border border-outline-variant mb-stack-lg flex flex-col lg:flex-row gap-4">
<div class="relative flex-grow">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant" data-icon="search">search</span>
<input class="w-full pl-10 pr-4 py-2 bg-white border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all font-body-sm text-body-sm" placeholder="Buscar por nome ou e-mail..." type="text"/>
</div>
<div class="flex flex-wrap gap-3">
<div class="relative min-w-[200px]">
<select class="w-full appearance-none pl-3 pr-10 py-2 bg-white border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all font-body-sm text-body-sm">
<option value="">Filtrar por Evento</option>
<option value="1">Conferência Tech 2024</option>
<option value="2">Workshop UX Design</option>
<option value="3">Summit Marketing Digital</option>
</select>
<span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-on-surface-variant" data-icon="expand_more">expand_more</span>
</div>
<div class="relative min-w-[150px]">
<select class="w-full appearance-none pl-3 pr-10 py-2 bg-white border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all font-body-sm text-body-sm">
<option value="">Status</option>
<option value="active">Ativo</option>
<option value="pending">Pendente</option>
</select>
<span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-on-surface-variant" data-icon="filter_list">filter_list</span>
</div>
<button class="p-2 border border-outline-variant rounded-lg hover:bg-surface-container-low transition-colors">
<span class="material-symbols-outlined" data-icon="file_download">file_download</span>
</button>
</div>
</div>
<!-- Participants Table Card -->
<div class="bg-surface-container-lowest rounded-xl border border-outline-variant overflow-hidden">
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-low border-b border-outline-variant">
<th class="px-6 py-4 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Participante</th>
<th class="px-6 py-4 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">E-mail</th>
<th class="px-6 py-4 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Status</th>
<th class="px-6 py-4 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Eventos Inscritos</th>
<th class="px-6 py-4 font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider text-right">Ações</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant/30">
<!-- Row 1 -->
<tr class="hover:bg-surface-container-low transition-colors group">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="h-10 w-10 rounded-full bg-secondary-fixed flex items-center justify-center text-on-secondary-fixed font-bold">
                                            AM
                                        </div>
<div>
<p class="font-label-md text-label-md text-on-surface">Ana Martins</p>
<p class="text-[12px] text-on-surface-variant">Inscrita em 12/03/2024</p>
</div>
</div>
</td>
<td class="px-6 py-4 font-body-sm text-body-sm text-on-surface-variant">ana.martins@exemplo.com</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[12px] font-medium bg-secondary-container/20 text-on-secondary-container border border-on-secondary-container/10">
                                        Ativo
                                    </span>
</td>
<td class="px-6 py-4">
<div class="flex flex-wrap gap-1">
<span class="px-2 py-0.5 bg-surface-container-high rounded text-[11px] font-medium text-on-surface-variant border border-outline-variant">Tech 2024</span>
<span class="px-2 py-0.5 bg-surface-container-high rounded text-[11px] font-medium text-on-surface-variant border border-outline-variant">UX Workshop</span>
</div>
</td>
<td class="px-6 py-4 text-right">
<button class="p-1.5 hover:bg-surface-container-highest rounded transition-colors text-on-surface-variant">
<span class="material-symbols-outlined" data-icon="more_vert">more_vert</span>
</button>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-surface-container-low transition-colors group">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="h-10 w-10 rounded-full bg-primary-fixed flex items-center justify-center text-on-primary-fixed font-bold">
                                            RS
                                        </div>
<div>
<p class="font-label-md text-label-md text-on-surface">Ricardo Silva</p>
<p class="text-[12px] text-on-surface-variant">Inscrito em 15/03/2024</p>
</div>
</div>
</td>
<td class="px-6 py-4 font-body-sm text-body-sm text-on-surface-variant">r.silva@corporate.com</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[12px] font-medium bg-error-container/20 text-error border border-error/10">
                                        Pendente
                                    </span>
</td>
<td class="px-6 py-4">
<div class="flex flex-wrap gap-1">
<span class="px-2 py-0.5 bg-surface-container-high rounded text-[11px] font-medium text-on-surface-variant border border-outline-variant">Summit Marketing</span>
</div>
</td>
<td class="px-6 py-4 text-right">
<button class="p-1.5 hover:bg-surface-container-highest rounded transition-colors text-on-surface-variant">
<span class="material-symbols-outlined" data-icon="more_vert">more_vert</span>
</button>
</td>
</tr>
<!-- Row 3 -->
<tr class="hover:bg-surface-container-low transition-colors group">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="h-10 w-10 rounded-full bg-tertiary-fixed-dim flex items-center justify-center text-on-tertiary-fixed-variant font-bold">
                                            BP
                                        </div>
<div>
<p class="font-label-md text-label-md text-on-surface">Beatriz Pinheiro</p>
<p class="text-[12px] text-on-surface-variant">Inscrita em 18/03/2024</p>
</div>
</div>
</td>
<td class="px-6 py-4 font-body-sm text-body-sm text-on-surface-variant">bea_pinheiro@web.io</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[12px] font-medium bg-secondary-container/20 text-on-secondary-container border border-on-secondary-container/10">
                                        Ativo
                                    </span>
</td>
<td class="px-6 py-4">
<div class="flex flex-wrap gap-1">
<span class="px-2 py-0.5 bg-surface-container-high rounded text-[11px] font-medium text-on-surface-variant border border-outline-variant">UX Workshop</span>
<span class="px-2 py-0.5 bg-surface-container-high rounded text-[11px] font-medium text-on-surface-variant border border-outline-variant">+2</span>
</div>
</td>
<td class="px-6 py-4 text-right">
<button class="p-1.5 hover:bg-surface-container-highest rounded transition-colors text-on-surface-variant">
<span class="material-symbols-outlined" data-icon="more_vert">more_vert</span>
</button>
</td>
</tr>
<!-- Row 4 -->
<tr class="hover:bg-surface-container-low transition-colors group">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="h-10 w-10 rounded-full bg-surface-variant flex items-center justify-center text-on-primary-fixed-variant font-bold">
                                            LF
                                        </div>
<div>
<p class="font-label-md text-label-md text-on-surface">Lucas Ferreira</p>
<p class="text-[12px] text-on-surface-variant">Inscrito em 20/03/2024</p>
</div>
</div>
</td>
<td class="px-6 py-4 font-body-sm text-body-sm text-on-surface-variant">lucas.ferreira@cloud.com</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[12px] font-medium bg-secondary-container/20 text-on-secondary-container border border-on-secondary-container/10">
                                        Ativo
                                    </span>
</td>
<td class="px-6 py-4">
<div class="flex flex-wrap gap-1">
<span class="px-2 py-0.5 bg-surface-container-high rounded text-[11px] font-medium text-on-surface-variant border border-outline-variant">Tech 2024</span>
</div>
</td>
<td class="px-6 py-4 text-right">
<button class="p-1.5 hover:bg-surface-container-highest rounded transition-colors text-on-surface-variant">
<span class="material-symbols-outlined" data-icon="more_vert">more_vert</span>
</button>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination -->
<div class="px-6 py-4 bg-surface border-t border-outline-variant flex items-center justify-between">
<p class="font-body-sm text-body-sm text-on-surface-variant">Mostrando 1-4 de 1.240 participantes</p>
<div class="flex gap-2">
<button class="p-2 border border-outline-variant rounded-lg hover:bg-surface-container-low disabled:opacity-30 disabled:cursor-not-allowed" disabled="">
<span class="material-symbols-outlined" data-icon="chevron_left">chevron_left</span>
</button>
<button class="px-4 py-2 border border-outline-variant bg-primary text-on-primary rounded-lg font-label-md text-label-md">1</button>
<button class="px-4 py-2 border border-outline-variant hover:bg-surface-container-low rounded-lg font-label-md text-label-md">2</button>
<button class="px-4 py-2 border border-outline-variant hover:bg-surface-container-low rounded-lg font-label-md text-label-md">3</button>
<button class="p-2 border border-outline-variant rounded-lg hover:bg-surface-container-low">
<span class="material-symbols-outlined" data-icon="chevron_right">chevron_right</span>
</button>
</div>
</div>
</div>
<!-- Dashboard Stats Summary (Bento Grid Style) -->
<div class="mt-gutter grid grid-cols-1 md:grid-cols-3 gap-gutter">
<div class="bg-white p-6 rounded-xl border border-outline-variant shadow-sm flex items-center gap-4">
<div class="h-12 w-12 rounded-full bg-secondary-container/20 flex items-center justify-center text-on-secondary-container">
<span class="material-symbols-outlined text-[28px]" data-icon="person_check">person_check</span>
</div>
<div>
<p class="text-on-surface-variant font-label-sm text-label-sm uppercase tracking-wider">Total Ativos</p>
<p class="text-headline-sm font-headline-sm text-on-surface">1,120</p>
</div>
</div>
<div class="bg-white p-6 rounded-xl border border-outline-variant shadow-sm flex items-center gap-4">
<div class="h-12 w-12 rounded-full bg-error-container/20 flex items-center justify-center text-error">
<span class="material-symbols-outlined text-[28px]" data-icon="hourglass_empty">hourglass_empty</span>
</div>
<div>
<p class="text-on-surface-variant font-label-sm text-label-sm uppercase tracking-wider">Pendentes</p>
<p class="text-headline-sm font-headline-sm text-on-surface">120</p>
</div>
</div>
<div class="bg-primary-container p-6 rounded-xl border border-outline-variant shadow-sm flex items-center gap-4">
<div class="h-12 w-12 rounded-full bg-tertiary-fixed/20 flex items-center justify-center text-tertiary-fixed">
<span class="material-symbols-outlined text-[28px]" data-icon="calendar_today">calendar_today</span>
</div>
<div>
<p class="text-on-primary-container font-label-sm text-label-sm uppercase tracking-wider">Eventos Ativos</p>
<p class="text-headline-sm font-headline-sm text-white">8</p>
</div>
</div>
</div>
</main>
</div>
<script>
        // Simple search interaction simulation
        const searchInput = document.querySelector('input[type="text"]');
        searchInput.addEventListener('input', (e) => {
            console.log('Filtrando por:', e.target.value);
            // logic would go here to filter table rows
        });

        // Dropdown interactions
        const selects = document.querySelectorAll('select');
        selects.forEach(select => {
            select.addEventListener('change', (e) => {
                console.log('Filtro alterado:', e.target.value);
            });
        });
    </script>
</body></html>