<!DOCTYPE html>
<html class="dark" lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Aluno Modern - Editar Tarefa</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Space+Grotesk:wght@500;700&display=swap"
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

        .glass-panel {
            background: rgba(255, 255, 255, 0.04);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .input-focus-glow:focus-within {
            box-shadow: 0 0 12px rgba(173, 198, 255, 0.2);
            border-color: #adc6ff;
        }

        ::-webkit-calendar-picker-indicator {
            filter: invert(1);
            cursor: pointer;
        }
    </style>
</head>

<body class="bg-background text-on-surface min-h-screen overflow-x-hidden">

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

    <!-- Header -->
    <header
        class="ml-[280px] h-16 flex justify-between items-center px-10 bg-surface/30 backdrop-blur-lg border-b border-white/5 sticky top-0 z-40">
        <div></div>
        <div class="flex items-center gap-3 pl-4 border-l border-white/10">
            <div class="text-right">
                <p class="text-[10px] text-primary uppercase tracking-widest">Nível Máx.</p>
                <p class="text-sm font-bold">{{ Session::get('usuario_nome', 'Administrador') }}</p>
            </div>
        </div>
    </header>

    <!-- Main -->
    <main class="ml-[280px] p-6 min-h-[calc(100vh-64px)] flex flex-col items-center justify-center">
        <div class="w-full max-w-2xl mb-8">
            <h2 class="text-3xl font-bold text-on-surface">Editar Tarefa</h2>
            <p class="text-on-surface-variant mt-1">Atualize as informações da tarefa abaixo.</p>
        </div>

        @if ($errors->any())
            <div class="w-full max-w-2xl bg-red-500/20 border border-red-500 text-red-300 p-4 rounded-lg mb-6">
                <ul class="list-disc list-inside space-y-1 text-sm">
                    @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                </ul>
            </div>
        @endif

        <div class="w-full max-w-2xl glass-panel rounded-xl p-10">
            <form action="{{ url('/tarefas/' . $tarefa->id) }}" method="POST" id="edit-form">
                @csrf
                @method('PUT')

                <!-- Disciplina -->
                <div class="space-y-3 mb-6">
                    <label
                        class="font-label-caps text-[11px] tracking-[0.2em] text-primary/70 uppercase">Disciplina</label>
                    <div
                        class="relative flex items-center bg-surface-container-lowest border border-white/10 rounded-lg input-focus-glow transition-all">
                        <span
                            class="material-symbols-outlined absolute left-4 text-on-surface-variant/50">menu_book</span>
                        <input type="text" name="disciplina" value="{{ old('disciplina', $tarefa->disciplina) }}"
                            placeholder="Digite a disciplina..." required
                            class="w-full bg-transparent border-none focus:ring-0 pl-12 pr-4 py-4 text-on-surface placeholder:text-on-surface-variant/30 outline-none" />
                    </div>
                </div>

                <!-- Descrição -->
                <div class="space-y-3 mb-6">
                    <label
                        class="font-label-caps text-[11px] tracking-[0.2em] text-primary/70 uppercase">Descrição</label>
                    <div
                        class="relative flex items-start bg-surface-container-lowest border border-white/10 rounded-lg input-focus-glow transition-all">
                        <span
                            class="material-symbols-outlined absolute left-4 top-4 text-on-surface-variant/50">description</span>
                        <textarea name="descricao" rows="5" placeholder="Detalhes da tarefa..." required
                            class="w-full bg-transparent border-none focus:ring-0 pl-12 pr-4 py-4 text-on-surface placeholder:text-on-surface-variant/30 resize-none outline-none">{{ old('descricao', $tarefa->descricao) }}</textarea>
                    </div>
                </div>

                <!-- Prazo -->
                <div class="space-y-3 mb-6">
                    <label class="font-label-caps text-[11px] tracking-[0.2em] text-primary/70 uppercase">Prazo de
                        Entrega</label>
                    <div
                        class="relative flex items-center bg-surface-container-lowest border border-white/10 rounded-lg input-focus-glow transition-all">
                        <span
                            class="material-symbols-outlined absolute left-4 text-on-surface-variant/50">calendar_today</span>
                        <input type="date" name="prazo" value="{{ old('prazo', $tarefa->prazo) }}" required
                            class="w-full bg-transparent border-none focus:ring-0 pl-12 pr-4 py-4 text-on-surface outline-none" />
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-4 pt-6">
                    <button type="button" onclick="confirmSave()"
                        class="flex-1 bg-primary text-on-primary px-8 py-4 rounded-lg font-label-caps text-label-caps flex items-center justify-center gap-3 hover:opacity-90 transition-all active:scale-95">
                        <span class="material-symbols-outlined text-[20px]">save</span>
                        SALVAR ALTERAÇÕES
                    </button>
                    <a href="{{ url('/tarefas') }}"
                        class="flex-1 border border-white/10 hover:bg-white/5 px-8 py-4 rounded-lg font-label-caps text-label-caps flex items-center justify-center gap-3 text-on-surface-variant hover:text-on-surface transition-all active:scale-95">
                        <span class="material-symbols-outlined text-[20px]">close</span>
                        CANCELAR
                    </a>
                </div>
            </form>
        </div>

        <footer class="fixed bottom-4 left-0 right-0 flex justify-center items-center gap-8 opacity-40 text-center">
            <div class="h-[1px] w-8 bg-white/30 hidden sm:block"></div>
            <span class="text-[10px] tracking-[0.3em] uppercase">Aluno Modern</span>
            <span class="material-symbols-outlined text-[14px]">verified_user</span>
        </footer>
    </main>

    <script>
        function confirmSave() {
            Swal.fire({
                icon: 'question', title: 'Salvar alterações?', text: 'Deseja atualizar os dados desta tarefa?',
                showCancelButton: true, confirmButtonText: 'Sim, salvar', cancelButtonText: 'Cancelar',
                confirmButtonColor: '#adc6ff', cancelButtonColor: '#414755', background: '#10131b', color: '#e0e2ed'
            }).then((result) => { if (result.isConfirmed) document.getElementById('edit-form').submit(); });
        }

        window.addEventListener('keydown', (e) => { if (e.key === 'Escape') window.location.href = '{{ url('/tarefas') }}'; });
    </script>

</body>

</html>