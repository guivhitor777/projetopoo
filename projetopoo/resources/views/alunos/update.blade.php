<!DOCTYPE html>
<html class="dark" lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Aluno Modern - Editar Aluno</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        'surface': '#10131b', 'primary': '#adc6ff', 'on-primary': '#002e69',
                        'on-surface': '#e0e2ed', 'on-surface-variant': '#9ba1ad',
                        'aether-surface-dim': '#0b0e16', 'aether-border': '#363942',
                        'aether-primary': '#a0c4ff',
                    },
                    spacing: { "sidebar-width": "280px", "gutter": "24px", "container-padding-desktop": "40px" },
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #0b0e16;
            color: #e2e8f0;
            font-family: 'Inter', sans-serif;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
            vertical-align: middle;
        }

        .glass-card {
            background: rgba(24, 28, 35, 0.6);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(54, 57, 66, 0.5);
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
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-white/5 transition-colors">
                    <span class="material-symbols-outlined">dashboard</span><span>Painel</span>
                </a>
                <a href="{{ url('/alunos') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-primary bg-primary/10 border-l-2 border-primary transition-colors">
                    <span class="material-symbols-outlined">school</span><span>Alunos</span>
                </a>
                <a href="{{ url('/notas') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-white/5 transition-colors">
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

    <main class="ml-[280px] flex-1 flex flex-col overflow-hidden">
        <div class="flex-1 overflow-y-auto p-12 flex flex-col items-center">

            <div class="w-full max-w-4xl mb-12">
                <h2 class="text-4xl font-bold tracking-tight mb-2">Editar Aluno</h2>
                <p class="text-slate-400">Atualize as informações do aluno abaixo.</p>
            </div>

            <div class="w-full max-w-4xl glass-card rounded-xl p-8 lg:p-12 shadow-2xl">

                <div class="flex items-center gap-3 mb-10 border-b border-aether-border pb-6">
                    <div class="p-2 bg-aether-primary/10 rounded-lg">
                        <span class="material-symbols-outlined text-aether-primary">person</span>
                    </div>
                    <span class="text-sm font-semibold uppercase tracking-widest text-aether-primary/80">Informações do
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

                <form method="POST" action="{{ url('/alunos/' . $aluno->id) }}" id="edit-form" class="space-y-8">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        <div>
                            <label
                                class="block text-[10px] font-bold uppercase tracking-widest text-slate-500 mb-3 ml-1">Nome
                                Completo</label>
                            <div class="relative">
                                <span
                                    class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-500 pointer-events-none">
                                    <span class="material-symbols-outlined text-sm">person</span>
                                </span>
                                <input type="text" name="nome" value="{{ old('nome', $aluno->nome) }}"
                                    class="block w-full pl-11 pr-4 py-4 bg-aether-surface-dim border border-aether-border rounded-lg text-sm text-gray-100 placeholder-gray-600 focus:ring-1 focus:ring-aether-primary/50 focus:border-aether-primary/50 transition-all outline-none"
                                    required />
                            </div>
                        </div>

                        <div>
                            <label
                                class="block text-[10px] font-bold uppercase tracking-widest text-slate-500 mb-3 ml-1">E-mail
                                Institucional</label>
                            <div class="relative">
                                <span
                                    class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-500 pointer-events-none">
                                    <span class="material-symbols-outlined text-sm">alternate_email</span>
                                </span>
                                <input type="email" name="email" value="{{ old('email', $aluno->email) }}"
                                    class="block w-full pl-11 pr-4 py-4 bg-aether-surface-dim border border-aether-border rounded-lg text-sm text-gray-100 placeholder-gray-600 focus:ring-1 focus:ring-aether-primary/50 focus:border-aether-primary/50 transition-all outline-none"
                                    required />
                            </div>
                        </div>

                    </div>

                    <div
                        class="flex flex-col sm:flex-row justify-end items-center gap-4 pt-8 border-t border-aether-border/50">
                        <a href="{{ url('/alunos') }}"
                            class="w-full sm:w-auto px-10 py-3 text-sm font-semibold text-slate-400 hover:text-white border border-aether-border rounded-lg hover:bg-aether-border/20 transition-all text-center">
                            Cancelar
                        </a>
                        <button type="button" onclick="confirmSave()"
                            class="w-full sm:w-auto px-10 py-3 text-sm font-bold text-aether-surface-dim bg-aether-primary rounded-lg hover:bg-blue-300 transition-all shadow-lg">
                            Salvar Alterações
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

        </div>
    </main>

    <script>
        function confirmSave() {
            Swal.fire({
                icon: 'question', title: 'Salvar alterações?', text: 'Deseja atualizar os dados deste aluno?',
                showCancelButton: true, confirmButtonText: 'Sim, salvar', cancelButtonText: 'Cancelar',
                confirmButtonColor: '#adc6ff', cancelButtonColor: '#414755',
                background: '#0b0e16', color: '#e0e2ed'
            }).then((result) => {
                if (result.isConfirmed) document.getElementById('edit-form').submit();
            });
        }
    </script>

</body>

</html>