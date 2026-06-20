<!DOCTYPE html>
<html class="dark" lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Aluno Modern | Centro de Comando</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Space+Grotesk:wght@500&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Space+Grotesk:wght@100..900&display=swap" rel="stylesheet" />

    <style>
        :root {
            --sidebar-width: 280px;
        }

        body {
            background-color: #0b0e16;
            color: #e0e2ed;
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            overflow: hidden;
        }

        .glass-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(173, 198, 255, 0.3), transparent);
        }
    </style>

    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary-container": "#4b8eff",
                        "tertiary-container": "#ef6719",
                        "primary": "#adc6ff",
                        "surface": "#10131b",
                        "surface-variant": "#31353d",
                        "surface-container": "#1c2028",
                        "background": "#10131b",
                        "surface-container-low": "#181c23",
                        "surface-container-high": "#272a32",
                        "on-secondary-container": "#b6b8c1",
                        "on-primary": "#002e69",
                        "error": "#ffb4ab",
                        "success": "#9ad19a",
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    spacing: {
                        "unit": "4px",
                        "gutter": "24px",
                        "container-padding-desktop": "40px",
                        "container-padding-mobile": "20px",
                        "sidebar-width": "280px"
                    },
                    fontFamily: {
                        "display-lg": ["Inter"],
                        "body-md": ["Inter"],
                        "body-lg": ["Inter"],
                        "label-caps": ["Space Grotesk"],
                        "headline-lg-mobile": ["Inter"],
                        "headline-md": ["Inter"],
                        "headline-lg": ["Inter"]
                    },
                    fontSize: {
                        "display-lg": ["48px", { "lineHeight": "1.1", "letterSpacing": "-0.02em", "fontWeight": "700" }],
                        "body-md": ["16px", { "lineHeight": "1.6", "fontWeight": "400" }],
                        "body-lg": ["18px", { "lineHeight": "1.6", "fontWeight": "400" }],
                        "label-caps": ["12px", { "lineHeight": "1.0", "letterSpacing": "0.1em", "fontWeight": "500" }],
                        "headline-lg-mobile": ["24px", { "lineHeight": "1.2", "fontWeight": "600" }],
                        "headline-md": ["24px", { "lineHeight": "1.3", "fontWeight": "600" }],
                        "headline-lg": ["32px", { "lineHeight": "1.2", "letterSpacing": "-0.01em", "fontWeight": "600" }]
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-background text-on-background min-h-screen">

    <!-- Sidebar -->
    <aside class="fixed left-0 top-0 h-screen w-sidebar-width bg-surface/40 backdrop-blur-xl border-r border-white/10 flex flex-col py-gutter px-4 z-50">

        <div class="mb-10 px-4">
            <h1 class="text-3xl font-bold text-primary tracking-tighter">
                Aluno Modern
            </h1>
        </div>

        <nav class="flex flex-col flex-1">
            <div class="space-y-2">
                <a href="{{ url('/painel') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-primary bg-primary/10 border-l-2 border-primary transition-colors">
                    <span class="material-symbols-outlined">dashboard</span>
                    <span>Painel</span>
                </a>

                <a href="{{ url('/alunos') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-400 hover:text-primary hover:bg-primary/10 border-l-2 border-transparent hover:border-primary transition-colors">
                    <span class="material-symbols-outlined">school</span>
                    <span>Alunos</span>
                </a>

                <a href="{{ url('/notas') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-400 hover:text-primary hover:bg-primary/10 border-l-2 border-transparent hover:border-primary transition-colors">
                    <span class="material-symbols-outlined">grade</span>
                    <span>Notas</span>
                </a>

                <a href="{{ url('/tarefas') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-400 hover:text-primary hover:bg-primary/10 border-l-2 border-transparent hover:border-primary transition-colors">
                    <span class="material-symbols-outlined">assignment</span>
                    <span>Tarefas</span>
                </a>
            </div>

            <a href="{{ url('/logout') }}"
                onclick="return confirm('Tem certeza que deseja sair do sistema?')"
                class="mt-auto flex items-center gap-3 px-4 py-3 rounded-lg text-slate-400 hover:bg-white/5 hover:text-red-400 transition-colors">
                <span class="material-symbols-outlined">logout</span>
                <span>Sair</span>
            </a>
        </nav>

    </aside>

    <!-- Main -->
    <main class="ml-[280px] min-h-screen">

        <!-- Header -->
        <header class="h-16 flex justify-between items-center px-container-padding-desktop bg-surface/30 backdrop-blur-lg border-b border-white/5 sticky top-0 z-40">
            <div></div>
            <div class="flex items-center gap-3 pl-4 border-l border-white/10">
                <div class="text-right">
                    <p class="font-label-caps text-[10px] text-primary">Nível Máx.</p>
                    <p class="font-body-md text-sm font-bold">{{ Session::get('usuario_nome', 'Administrador') }}</p>
                </div>
            </div>
        </header>

        <div class="p-gutter max-w-[1440px] mx-auto space-y-gutter">

            <!-- Título -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <h2 class="font-display-lg text-display-lg text-white">Bem-vindo ao Aluno Modern</h2>
                    <div class="flex items-center gap-4 mt-2">
                        <span class="flex items-center gap-1.5 px-3 py-1 bg-primary/10 border border-primary/20 rounded-full text-[10px] font-label-caps text-primary">
                            <span class="w-1.5 h-1.5 bg-primary rounded-full animate-pulse"></span>
                            Sincronização Ativa
                        </span>
                    </div>
                </div>
            </div>

            <!-- Métricas -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter">

                <div class="glass-card p-6 rounded-xl">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-on-secondary-container text-xs uppercase tracking-widest">Total de Alunos</span>
                        <span class="material-symbols-outlined text-primary text-xl">school</span>
                    </div>
                    <p class="text-4xl font-bold text-white">{{ $totalAlunos }}</p>
                </div>

                <div class="glass-card p-6 rounded-xl">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-on-secondary-container text-xs uppercase tracking-widest">Notas Lançadas</span>
                        <span class="material-symbols-outlined text-primary text-xl">grade</span>
                    </div>
                    <p class="text-4xl font-bold text-white">{{ $totalNotas }}</p>
                </div>

                <div class="glass-card p-6 rounded-xl">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-on-secondary-container text-xs uppercase tracking-widest">Tarefas Ativas</span>
                        <span class="material-symbols-outlined text-tertiary-container text-xl">assignment</span>
                    </div>
                    <p class="text-4xl font-bold text-white">{{ $totalTarefas }}</p>
                </div>

                <div class="glass-card p-6 rounded-xl">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-on-secondary-container text-xs uppercase tracking-widest">Média Geral</span>
                        <span class="material-symbols-outlined text-success text-xl">trending_up</span>
                    </div>
                    <p class="text-4xl font-bold text-white">{{ $mediaGeral ? number_format($mediaGeral, 1) : '—' }}</p>
                </div>

            </div>

            <!-- Gráfico + Tarefas próximas -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-gutter">

                <!-- Gráfico de médias por disciplina -->
                <div class="glass-card p-6 rounded-xl lg:col-span-2">
                    <h3 class="text-lg font-bold text-white mb-1">Média por disciplina</h3>
                    <p class="text-on-secondary-container text-sm mb-4">Desempenho médio das notas lançadas no sistema.</p>

                    @if ($notasPorDisciplina->count() > 0)
                        <div style="position: relative; width: 100%; height: 280px;">
                            <canvas id="chartDisciplinas" role="img" aria-label="Gráfico de barras mostrando a média de notas por disciplina">
                                @foreach ($notasPorDisciplina as $n)
                                    {{ $n->disciplina }}: {{ number_format($n->media, 1) }}
                                @endforeach
                            </canvas>
                        </div>
                    @else
                        <div class="py-16 text-center text-on-secondary-container">
                            Nenhuma nota cadastrada ainda.
                        </div>
                    @endif
                </div>

                <!-- Tarefas próximas -->
                <div class="glass-card p-6 rounded-xl">
                    <h3 class="text-lg font-bold text-white mb-1">Próximas tarefas</h3>
                    <p class="text-on-secondary-container text-sm mb-4">Prazos mais próximos cadastrados.</p>

                    <div class="space-y-3">
                        @forelse ($tarefasProximas as $tarefa)
                            <div class="flex items-start gap-3 p-3 rounded-lg bg-white/[0.03] border border-white/5">
                                <span class="material-symbols-outlined text-tertiary-container text-lg mt-0.5">event</span>
                                <div class="flex-1">
                                    <p class="text-sm font-bold text-white">{{ $tarefa->disciplina }}</p>
                                    <p class="text-xs text-on-secondary-container">{{ \Carbon\Carbon::parse($tarefa->prazo)->format('d/m/Y') }}</p>
                                </div>
                            </div>
                        @empty
                            <p class="text-on-secondary-container text-sm py-8 text-center">Nenhuma tarefa pendente.</p>
                        @endforelse
                    </div>

                    <a href="{{ url('/tarefas') }}" class="mt-4 flex items-center justify-center gap-2 text-primary text-sm font-medium hover:underline">
                        Ver todas as tarefas
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </a>
                </div>

            </div>

            <!-- Cards de navegação -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">

                <div class="glass-card p-6 rounded-xl group hover:border-primary/40 transition-all duration-500 relative">
                    <a href="{{ url('/alunos') }}"
                        class="absolute top-4 right-4 px-4 py-2 bg-primary text-on-primary rounded-lg transition-all hover:brightness-110 shadow-sm shadow-primary/20 flex items-center gap-2 font-medium">
                        Acessar Alunos
                        <span class="material-symbols-outlined text-sm">north_east</span>
                    </a>
                    <div class="flex items-end justify-between">
                        <h3 class="font-display-lg text-4xl text-primary font-bold">Alunos</h3>
                    </div>
                    <div class="w-full bg-white/5 h-1 mt-4 rounded-full overflow-hidden">
                        <div class="bg-primary h-full w-full shadow-[0_0_8px_#adc6ff]"></div>
                    </div>
                </div>

                <div class="glass-card p-6 rounded-xl group hover:border-primary/40 transition-all duration-500 relative">
                    <a href="{{ url('/notas') }}"
                        class="absolute top-4 right-4 px-4 py-2 bg-primary text-on-primary rounded-lg transition-all hover:brightness-110 shadow-sm shadow-primary/20 flex items-center gap-2 font-medium">
                        Acessar Notas
                        <span class="material-symbols-outlined text-sm">north_east</span>
                    </a>
                    <div class="flex items-end justify-between">
                        <h3 class="font-display-lg text-4xl text-white font-bold">Notas</h3>
                    </div>
                    <div class="w-full bg-white/5 h-1 mt-4 rounded-full overflow-hidden">
                        <div class="bg-white/40 h-full w-full"></div>
                    </div>
                </div>

                <div class="glass-card p-6 rounded-xl group hover:border-primary/40 transition-all duration-500 relative">
                    <a href="{{ url('/tarefas') }}"
                        class="absolute top-4 right-4 px-4 py-2 bg-primary text-on-primary rounded-lg transition-all hover:brightness-110 shadow-sm shadow-primary/20 flex items-center gap-2 font-medium">
                        Acessar Tarefas
                        <span class="material-symbols-outlined text-sm">north_east</span>
                    </a>
                    <div class="flex items-end justify-between">
                        <h3 class="font-display-lg text-4xl text-tertiary-container font-bold">Tarefas</h3>
                    </div>
                    <div class="w-full bg-white/5 h-1 mt-4 rounded-full overflow-hidden">
                        <div class="bg-tertiary-container h-full w-full shadow-[0_0_8px_#ef6719]"></div>
                    </div>
                </div>

            </div>

        </div>

        <!-- Footer -->
        <footer class="py-8 flex flex-col sm:flex-row justify-center items-center gap-4 sm:gap-8 opacity-40 text-center">
            <div class="flex items-center gap-4">
                <div class="h-[1px] w-8 bg-white/30 hidden sm:block"></div>
                <span class="font-label-caps text-[10px] tracking-[0.3em] text-on-surface uppercase">Aluno Modern</span>
            </div>
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-[14px]">verified_user</span>
            </div>
        </footer>

    </main>

    @if ($notasPorDisciplina->count() > 0)
    <script>
        const ctx = document.getElementById('chartDisciplinas');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [@foreach ($notasPorDisciplina as $n)'{{ $n->disciplina }}',@endforeach],
                datasets: [{
                    label: 'Média',
                    data: [@foreach ($notasPorDisciplina as $n){{ number_format($n->media, 2) }},@endforeach],
                    backgroundColor: '#4b8eff',
                    borderRadius: 6,
                    maxBarThickness: 48
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 10,
                        ticks: { color: '#9ba1ad' },
                        grid: { color: 'rgba(255,255,255,0.05)' }
                    },
                    x: {
                        ticks: { color: '#9ba1ad' },
                        grid: { display: false }
                    }
                }
            }
        });
    </script>
    @endif

</body>

</html>