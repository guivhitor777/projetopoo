<!DOCTYPE html>
<html class="dark" lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Aluno Modern - Cadastrar Aluno</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@500&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "background": "#10131b", "surface": "#10131b",
                        "primary": "#adc6ff", "on-primary": "#002e69",
                        "primary-container": "#4b8eff", "tertiary-container": "#ef6719",
                        "on-surface": "#e0e2ed", "on-surface-variant": "#c1c6d7",
                        "outline-variant": "#414755", "error": "#ffb4ab",
                    },
                    spacing: { "sidebar-width": "280px", "gutter": "24px", "container-padding-desktop": "40px" },
                    fontFamily: { "body-md": ["Inter"], "label-caps": ["Space Grotesk"] },
                    fontSize: {
                        "body-md": ["16px", { lineHeight: "1.6", fontWeight: "400" }],
                        "label-caps": ["12px", { lineHeight: "1.0", letterSpacing: "0.1em", fontWeight: "500" }],
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #0b0e16;
            color: #e0e2ed;
            font-family: 'Inter', sans-serif;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
            vertical-align: middle;
        }

        .glass-panel {
            background: rgba(255, 255, 255, 0.04);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: inset 0 1px 1px rgba(255, 255, 255, 0.05);
        }

        .glow-border:focus-within {
            border-color: #4b8eff;
            box-shadow: 0 0 15px rgba(75, 142, 255, 0.2);
        }
    </style>
</head>

<body class="min-h-screen">

    <aside
        class="fixed left-0 top-0 h-screen w-[280px] bg-surface/40 backdrop-blur-xl border-r border-white/10 flex flex-col py-6 px-4 z-50">
        <div class="mb-10 px-4">
            <h1 class="text-3xl font-bold text-primary tracking-tighter">Aluno Modern</h1>
        </div>
        <nav class="flex flex-col flex-1">
            <div class="space-y-2">
                <a href="{{ url('/painel') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-400 hover:text-primary hover:bg-primary/10 border-l-2 border-transparent hover:border-primary transition-colors">
                    <span class="material-symbols-outlined">dashboard</span><span>Painel</span>
                </a>
                <a href="{{ url('/alunos') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-primary bg-primary/10 border-l-2 border-primary transition-colors">
                    <span class="material-symbols-outlined">school</span><span>Alunos</span>
                </a>
                <a href="{{ url('/notas') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-400 hover:text-primary hover:bg-primary/10 border-l-2 border-transparent hover:border-primary transition-colors">
                    <span class="material-symbols-outlined">grade</span><span>Notas</span>
                </a>
                <a href="{{ url('/tarefas') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-400 hover:text-primary hover:bg-primary/10 border-l-2 border-transparent hover:border-primary transition-colors">
                    <span class="material-symbols-outlined">assignment</span><span>Tarefas</span>
                </a>
            </div>
            <a href="{{ url('/logout') }}" onclick="return confirm('Tem certeza que deseja sair?')"
                class="mt-auto flex items-center gap-3 px-4 py-3 rounded-lg text-slate-400 hover:bg-white/5 hover:text-red-400 transition-colors">
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
    <main class="ml-[280px] min-h-screen p-12 flex flex-col items-center">

        <div class="w-full max-w-4xl mb-12">
            <h2 class="text-4xl font-bold tracking-tight mb-2">Cadastrar Aluno</h2>
            <p class="text-slate-400">Preencha os dados para cadastrar um novo aluno.</p>
        </div>

        <div class="w-full max-w-4xl glass-panel rounded-xl p-8 lg:p-12">

            <div class="flex items-center gap-3 mb-10 border-b border-white/10 pb-6">
                <div class="p-2 bg-primary/10 rounded-lg">
                    <span class="material-symbols-outlined text-primary">school</span>
                </div>
                <span class="text-sm font-semibold uppercase tracking-widest text-primary/80">Informações do
                    Aluno</span>
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

            <form method="POST" action="{{ url('/alunos') }}" class="space-y-8">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                    <!-- Nome -->
                    <div class="space-y-2">
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-3">Nome
                            Completo</label>
                        <div
                            class="relative glow-border border border-white/10 rounded-lg bg-black/20 transition-all duration-300">
                            <input type="text" name="nome" value="{{ old('nome') }}" placeholder="Ex: João da Silva"
                                class="w-full bg-transparent border-none text-on-surface placeholder:text-outline-variant py-4 px-4 text-sm outline-none"
                                required />
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="space-y-2">
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-3">E-mail</label>
                        <div
                            class="relative glow-border border border-white/10 rounded-lg bg-black/20 transition-all duration-300 flex items-center">
                            <span class="material-symbols-outlined text-slate-500 ml-4">alternate_email</span>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="nome@email.com"
                                class="w-full bg-transparent border-none text-on-surface placeholder:text-outline-variant py-4 px-3 text-sm outline-none"
                                required />
                        </div>
                    </div>

                    <!-- Senha -->
                    <div class="space-y-2">
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-3">Senha
                            de Acesso</label>
                        <div
                            class="relative glow-border border border-white/10 rounded-lg bg-black/20 transition-all duration-300 flex items-center">
                            <span class="material-symbols-outlined text-slate-500 ml-4">lock_open</span>
                            <input type="password" name="senha" placeholder="••••••••"
                                class="w-full bg-transparent border-none text-on-surface placeholder:text-outline-variant py-4 px-3 text-sm outline-none"
                                required />
                        </div>
                    </div>

                    <!-- Confirmar Senha -->
                    <div class="space-y-2">
                        <label
                            class="block text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-3">Confirmar
                            Senha</label>
                        <div
                            class="relative glow-border border border-white/10 rounded-lg bg-black/20 transition-all duration-300 flex items-center">
                            <span class="material-symbols-outlined text-slate-500 ml-4">lock</span>
                            <input type="password" name="confirmar_senha" placeholder="••••••••"
                                class="w-full bg-transparent border-none text-on-surface placeholder:text-outline-variant py-4 px-3 text-sm outline-none"
                                required />
                        </div>
                    </div>

                </div>

                <div class="flex flex-col sm:flex-row justify-end items-center gap-4 pt-8 border-t border-white/10">
                    <a href="{{ url('/alunos') }}"
                        class="w-full sm:w-auto px-10 py-3 text-sm font-semibold text-slate-400 hover:text-white border border-white/10 rounded-lg hover:bg-white/5 transition-all text-center">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="w-full sm:w-auto px-10 py-3 text-sm font-bold text-on-primary bg-primary rounded-lg hover:brightness-110 transition-all shadow-lg">
                        CADASTRAR ALUNO
                    </button>
                </div>

            </form>
        </div>

        <footer class="fixed bottom-4 left-0 right-0 flex justify-center items-center gap-8 opacity-40 text-center">
            <div class="flex items-center gap-4">
                <div class="h-[1px] w-8 bg-white/30 hidden sm:block"></div>
                <span class="text-[10px] tracking-[0.3em] uppercase">Aluno Modern</span>
            </div>
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