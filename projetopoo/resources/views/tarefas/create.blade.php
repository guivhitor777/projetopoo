<!DOCTYPE html>
<html class="dark" lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Aluno Modern | Nova Tarefa</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@500&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#adc6ff", "on-primary": "#002e69", "background": "#10131b",
                        "surface": "#10131b", "on-surface": "#e0e2ed", "on-surface-variant": "#c1c6d7",
                        "surface-container-lowest": "#0b0e16", "outline-variant": "#414755",
                        "primary-container": "#4b8eff", "tertiary-container": "#ef6719", "error": "#ffb4ab"
                    },
                    spacing: { "sidebar-width": "280px", "gutter": "24px", "container-padding-desktop": "40px" },
                    fontFamily: { "label-caps": ["Space Grotesk"], "body-md": ["Inter"] },
                    fontSize: {
                        "label-caps": ["12px", { lineHeight: "1.0", letterSpacing: "0.1em", fontWeight: "500" }],
                        "body-md": ["16px", { lineHeight: "1.6", fontWeight: "400" }],
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #10131b;
            color: #e0e2ed;
            font-family: 'Inter', sans-serif;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.07);
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
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.15), transparent);
        }

        input,
        textarea {
            background-color: rgba(0, 0, 0, 0.2) !important;
            transition: all 0.2s ease;
        }

        input:focus,
        textarea:focus {
            border-color: #4b8eff !important;
            box-shadow: 0 0 0 1px #4b8eff !important;
        }

        ::-webkit-calendar-picker-indicator {
            filter: invert(1);
            cursor: pointer;
        }
    </style>
</head>

<body class="bg-background text-on-surface overflow-x-hidden">

    <!-- Sidebar -->
    <aside
        class="fixed left-0 top-0 h-screen w-[280px] bg-surface/40 backdrop-blur-xl border-r border-white/10 flex flex-col py-6 px-4 z-50">
        <div class="mb-10 px-4">
            <h1 class="text-3xl font-bold text-primary tracking-tighter">Aluno Modern</h1>
        </div>
        <nav class="flex flex-col flex-1">
            <div class="space-y-2">
                <a href="{{ url('/painel') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-white/5 transition-colors">
                    <span class="material-symbols-outlined">dashboard</span><span>Painel</span>
                </a>
                <a href="{{ url('/alunos') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-white/5 transition-colors">
                    <span class="material-symbols-outlined">school</span><span>Alunos</span>
                </a>
                <a href="{{ url('/notas') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-white/5 transition-colors">
                    <span class="material-symbols-outlined">grade</span><span>Notas</span>
                </a>
                <a href="{{ url('/tarefas') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-primary bg-primary/10 border-l-2 border-primary transition-colors">
                    <span class="material-symbols-outlined">assignment</span><span>Tarefas</span>
                </a>
            </div>
            <a href="{{ url('/logout') }}" onclick="return confirm('Tem certeza que deseja sair?')"
                class="mt-auto flex items-center gap-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-white/5 hover:text-red-400 transition-colors">
                <span class="material-symbols-outlined">logout</span><span>Sair</span>
            </a>
        </nav>
    </aside>

    <!-- Main -->
    <main class="ml-[280px] min-h-screen p-6 md:p-12 flex items-center justify-center relative">
        <div class="absolute top-1/4 right-1/4 w-96 h-96 bg-primary/10 blur-[120px] rounded-full pointer-events-none">
        </div>

        <div class="w-full max-w-2xl">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-on-surface mb-2">Nova Tarefa</h2>
                <p class="text-on-surface-variant opacity-80">Preencha os dados para registrar a tarefa no sistema.</p>
            </div>

            @if ($errors->any())
                <div class="bg-red-500/20 border border-red-500 text-red-300 p-4 rounded-lg mb-6">
                    <ul class="list-disc list-inside space-y-1 text-sm">
                        @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                    </ul>
                </div>
            @endif

            <div class="glass-card rounded-xl p-8 shadow-2xl">
                <form action="{{ url('/tarefas') }}" method="POST" class="space-y-8">
                    @csrf

                    <!-- Disciplina -->
                    <div class="space-y-2">
                        <label class="font-label-caps text-label-caps text-on-surface-variant flex items-center gap-2">
                            <span class="material-symbols-outlined text-[14px]">school</span>
                            Disciplina
                        </label>
                        <input type="text" name="disciplina" value="{{ old('disciplina') }}" placeholder="Ex: Artes"
                            required
                            class="w-full rounded-lg border border-white/10 px-4 py-3 text-on-surface placeholder:text-on-surface-variant/30 focus:ring-0 outline-none" />
                    </div>

                    <!-- Descrição -->
                    <div class="space-y-2">
                        <label class="font-label-caps text-label-caps text-on-surface-variant flex items-center gap-2">
                            <span class="material-symbols-outlined text-[14px]">description</span>
                            Descrição da Tarefa
                        </label>
                        <textarea name="descricao" rows="5" placeholder="Descreva os objetivos e requisitos..." required
                            class="w-full rounded-lg border border-white/10 px-4 py-3 text-on-surface placeholder:text-on-surface-variant/30 focus:ring-0 resize-none outline-none">{{ old('descricao') }}</textarea>
                    </div>

                    <!-- Prazo -->
                    <div class="space-y-2">
                        <label class="font-label-caps text-label-caps text-on-surface-variant flex items-center gap-2">
                            <span class="material-symbols-outlined text-[14px]">event</span>
                            Prazo para entrega
                        </label>
                        <input type="date" name="prazo" value="{{ old('prazo') }}" required
                            class="w-full rounded-lg border border-white/10 px-4 py-3 text-on-surface focus:ring-0 outline-none" />
                    </div>

                    <div class="flex flex-col sm:flex-row items-center gap-4 pt-4">
                        <button type="submit"
                            class="w-full sm:flex-1 bg-primary text-on-primary font-label-caps text-label-caps py-4 rounded-lg hover:brightness-110 active:scale-[0.98] transition-all shadow-lg shadow-primary/20">
                            Salvar Tarefa
                        </button>
                        <a href="{{ url('/tarefas') }}"
                            class="w-full sm:w-auto px-8 py-4 border border-white/10 text-on-surface-variant font-label-caps text-label-caps rounded-lg text-center hover:bg-white/5 transition-colors">
                            Cancelar
                        </a>
                    </div>

                </form>
            </div>
        </div>

        <footer class="fixed bottom-4 left-0 right-0 flex justify-center items-center gap-8 opacity-40 text-center">
            <div class="h-[1px] w-8 bg-white/30 hidden sm:block"></div>
            <span class="text-[10px] tracking-[0.3em] uppercase">Aluno Modern</span>
            <span class="material-symbols-outlined text-[14px]">verified_user</span>
        </footer>
    </main>

    @if (session('error'))
        <script>Swal.fire({ icon: 'error', title: 'Erro!', text: '{{ session('error') }}', confirmButtonColor: '#adc6ff', background: '#10131b', color: '#e0e2ed' });</script>
    @endif

</body>

</html>