<!DOCTYPE html>
<html class="dark" lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Cadastrar Nota | Aluno Modern</title>
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
                    spacing: { "sidebar-width": "280px", "gutter": "24px" },
                    fontFamily: { "label-caps": ["Space Grotesk"], "body-md": ["Inter"] }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #0b0e14;
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
        }
    </style>
</head>

<body class="bg-background text-on-surface overflow-x-hidden">

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
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-primary bg-primary/10 border-l-2 border-primary transition-colors">
                    <span class="material-symbols-outlined">grade</span><span>Notas</span>
                </a>
                <a href="{{ url('/tarefas') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-white/5 transition-colors">
                    <span class="material-symbols-outlined">assignment</span><span>Tarefas</span>
                </a>
            </div>
            <a href="{{ url('/logout') }}" onclick="return confirm('Tem certeza que deseja sair?')"
                class="mt-auto flex items-center gap-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-white/5 hover:text-red-400 transition-colors">
                <span class="material-symbols-outlined">logout</span><span>Sair</span>
            </a>
        </nav>
    </aside>

    <main class="ml-[280px] min-h-screen flex flex-col">
        <header
            class="flex justify-between items-center h-16 px-6 sticky top-0 bg-surface/80 backdrop-blur-md border-b border-white/10 z-40">
            <div>
                <h2 class="text-lg font-bold text-primary uppercase tracking-wide">Cadastrar Nota</h2>
                <p class="text-xs text-on-surface-variant">Preencha as informações abaixo.</p>
            </div>
            <div class="flex items-center gap-3 pl-4 border-l border-white/10">
                <div class="text-right">
                    <p class="text-[10px] text-primary uppercase tracking-widest">Nível Máx.</p>
                    <p class="text-sm font-bold">{{ Session::get('usuario_nome', 'Administrador') }}</p>
                </div>
            </div>
        </header>

        <div class="flex-1 flex flex-col items-center justify-center p-6">
            <div class="w-full max-w-[600px] glass-card rounded-xl p-8 shadow-2xl relative overflow-hidden">
                <div
                    class="absolute top-0 left-0 w-full h-[1px] bg-gradient-to-r from-transparent via-primary/40 to-transparent">
                </div>

                @if ($errors->any())
                    <div class="bg-red-500/20 border border-red-500 text-red-300 p-4 rounded-lg mb-6">
                        <ul class="list-disc list-inside space-y-1 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ url('/notas') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="space-y-2">
                        <label class="text-xs text-on-surface-variant tracking-wider uppercase">Aluno</label>
                        <select name="id_aluno" required
                            class="w-full bg-surface-container-lowest border border-white/10 rounded-lg py-3 px-4 text-on-surface outline-none transition-all">
                            <option value="">Selecione um aluno...</option>
                            @foreach ($alunos as $aluno)
                                <option value="{{ $aluno->id }}" {{ old('id_aluno') == $aluno->id ? 'selected' : '' }}>
                                    {{ $aluno->id }} — {{ $aluno->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs text-on-surface-variant tracking-wider uppercase">Disciplina</label>
                        <input type="text" name="disciplina" value="{{ old('disciplina') }}"
                            placeholder="Ex: Matemática" required
                            class="w-full bg-surface-container-lowest border border-white/10 rounded-lg px-4 py-3 text-on-surface outline-none" />
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs text-on-surface-variant tracking-wider uppercase">Nota</label>
                        <input type="number" name="nota" value="{{ old('nota') }}" min="0" max="10" step="0.01"
                            placeholder="0.00" required
                            class="w-full bg-surface-container-lowest border border-white/10 rounded-lg px-4 py-3 text-on-surface outline-none" />
                    </div>

                    <div class="flex gap-3">
                        <a href="{{ url('/notas') }}"
                            class="flex-1 border border-white/10 text-on-surface-variant font-medium py-3 rounded-lg hover:bg-white/5 transition-all text-center">
                            Cancelar
                        </a>
                        <button type="submit"
                            class="flex-1 py-3 bg-primary text-on-primary rounded-lg font-bold hover:brightness-110 transition-all">
                            Cadastrar Nota
                        </button>
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
        <script>
            Swal.fire({ icon: 'error', title: 'Erro!', text: '{{ session('error') }}', confirmButtonColor: '#adc6ff', background: '#10131b', color: '#e0e2ed' });
        </script>
    @endif

</body>

</html>