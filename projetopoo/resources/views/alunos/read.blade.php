<!DOCTYPE html>
<html class="dark" lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Aluno Modern | Gestão de Alunos</title>
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
                        "background": "#0b0e14", "surface": "#0b0e14",
                        "primary": "#adc6ff", "on-primary": "#002e69",
                        "on-surface": "#e0e2ed", "on-surface-variant": "#9ba1ad",
                        "outline": "#414755", "error": "#ffb4ab"
                    },
                    spacing: { "sidebar-width": "260px", "gutter": "24px" },
                    fontFamily: { "body": ["Inter", "sans-serif"] }
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
            font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
            vertical-align: middle;
        }

        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #0b0e14;
        }

        ::-webkit-scrollbar-thumb {
            background: #31353d;
            border-radius: 10px;
        }
    </style>
</head>

<body class="bg-background text-on-surface font-body">

    <!-- Sidebar -->
    <aside
        class="fixed left-0 top-0 h-screen w-[260px] bg-surface/40 backdrop-blur-xl border-r border-white/10 flex flex-col py-6 px-4 z-50">
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
            <a href="{{ url('/logout') }}" onclick="return confirm('Tem certeza que deseja sair do sistema?')"
                class="mt-auto flex items-center gap-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-white/5 hover:text-red-400 transition-colors">
                <span class="material-symbols-outlined">logout</span><span>Sair</span>
            </a>
        </nav>
    </aside>

    <!-- Header -->
    <header
        class="ml-[260px] h-20 px-8 flex items-center justify-between border-b border-white/10 bg-surface/50 backdrop-blur-md sticky top-0 z-40">
        <div>
            <h2 class="text-xl font-bold">Alunos</h2>
            <p class="text-xs text-on-surface-variant">Gerencie os alunos cadastrados.</p>
        </div>
        <div class="flex items-center gap-3 pl-4 border-l border-white/10">
            <div class="text-right">
                <p class="text-[10px] text-primary uppercase tracking-widest">Nível Máx.</p>
                <p class="text-sm font-bold">{{ Session::get('usuario_nome', 'Administrador') }}</p>
            </div>
        </div>
    </header>

    <!-- Main -->
    <main class="ml-[260px] pt-8 min-h-screen flex flex-col">
        <div class="p-8 flex-1">

            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-3">
                <div>
                    <h2 class="text-4xl font-bold tracking-tight mb-3">Alunos</h2>
                    <div class="w-1/2 h-1 bg-primary mb-4"></div>
                    <p class="text-on-surface-variant text-lg">Gerencie os alunos cadastrados no sistema.</p>
                </div>
                <a href="{{ url('/alunos/create') }}"
                    class="bg-primary text-on-primary px-6 py-3 rounded-lg font-bold flex items-center gap-2 hover:opacity-90 active:scale-[0.98] transition-all text-sm">
                    <span class="material-symbols-outlined">add_circle</span>
                    ADICIONAR ALUNO
                </a>
            </div>

            <!-- Busca -->
            <form method="GET" action="{{ url('/alunos') }}" class="mb-6">
                <div class="relative max-w-[200px]">
                    <span
                        class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant/50 text-base">
                        search
                    </span>
                    <input type="text" name="busca" value="{{ $busca ?? '' }}" placeholder="Buscar..."
                        class="w-full bg-[#1c1f26] border border-white/10 rounded-lg py-1.5 pl-9 pr-3 text-xs text-on-surface placeholder:text-on-surface-variant/40 outline-none focus:border-primary/50 transition-all" />
                </div>
                @if (!empty($busca))
                    <a href="{{ url('/alunos') }}"
                        class="text-xs text-on-surface-variant hover:text-primary mt-2 inline-block">
                        Limpar busca
                    </a>
                @endif
            </form>

            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-white/5 bg-white/5">
                        <th class="py-5 px-8">ID</th>
                        <th class="py-5 px-8">Nome Completo</th>
                        <th class="py-5 px-8">E-mail Institucional</th>
                        <th class="py-5 px-8 text-center">Média</th>
                        <th class="py-5 px-8 text-center">Situação</th>
                        <th class="py-5 px-8 text-right">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse ($alunos as $aluno)
                        <tr class="hover:bg-white/[0.02] transition-colors group">
                            <td class="py-6 px-8">{{ $aluno->id }}</td>
                            <td class="py-6 px-8">{{ $aluno->nome }}</td>
                            <td class="py-6 px-8">{{ $aluno->email }}</td>
                            <td class="py-6 px-8 text-center">
                                {{ $aluno->media !== null ? number_format($aluno->media, 1) : '—' }}
                            </td>
                            <td class="py-6 px-8 text-center">
                                @if ($aluno->situacao === 'aprovado')
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-green-500/15 text-green-400 border border-green-500/30">
                                        <span class="material-symbols-outlined text-sm">check_circle</span>
                                        Aprovado
                                    </span>
                                @elseif ($aluno->situacao === 'reprovado')
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-red-500/15 text-red-400 border border-red-500/30">
                                        <span class="material-symbols-outlined text-sm">cancel</span>
                                        Reprovado
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-white/5 text-on-surface-variant border border-white/10">
                                        Sem notas
                                    </span>
                                @endif
                            </td>
                            <td class="py-6 px-8 text-right">
                                <div class="flex justify-end gap-3">
                                    <a href="{{ url('/alunos/' . $aluno->id . '/edit') }}"
                                        class="w-10 h-10 flex items-center justify-center rounded-lg border border-white/10 hover:border-primary/50 hover:bg-primary/10 text-on-surface-variant hover:text-primary transition-all">
                                        <span class="material-symbols-outlined">edit</span>
                                    </a>
                                    <button onclick="confirmDelete({{ $aluno->id }})"
                                        class="w-10 h-10 flex items-center justify-center rounded-lg border border-white/10 hover:border-red-500/50 hover:bg-red-500/10 text-on-surface-variant hover:text-red-500 transition-all">
                                        <span class="material-symbols-outlined">delete</span>
                                    </button>
                                    <form id="delete-form-{{ $aluno->id }}" action="{{ url('/alunos/' . $aluno->id) }}"
                                        method="POST" class="hidden">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 px-8 text-center text-on-surface-variant">
                                Nenhum aluno cadastrado ainda.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>

        <footer class="fixed bottom-4 left-0 right-0 flex justify-center items-center gap-8 opacity-40 text-center">
            <div class="flex items-center gap-4">
                <div class="h-[1px] w-8 bg-white/30 hidden sm:block"></div>
                <span class="text-[10px] tracking-[0.3em] uppercase">Aluno Modern</span>
            </div>
            <span class="material-symbols-outlined text-[14px]">verified_user</span>
        </footer>
    </main>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                icon: 'warning', title: 'Excluir aluno?', text: 'Esta ação não pode ser desfeita.',
                showCancelButton: true, confirmButtonText: 'Sim, excluir', cancelButtonText: 'Cancelar',
                confirmButtonColor: '#ef4444', cancelButtonColor: '#414755',
                background: '#11151d', color: '#e0e2ed'
            }).then((result) => {
                if (result.isConfirmed) document.getElementById('delete-form-' + id).submit();
            });
        }
    </script>

    @if (session('success'))
        <script>
            Swal.fire({ icon: 'success', title: 'Sucesso!', text: '{{ session('success') }}', confirmButtonColor: '#adc6ff', background: '#11151d', color: '#e0e2ed' });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({ icon: 'error', title: 'Erro!', text: '{{ session('error') }}', confirmButtonColor: '#adc6ff', background: '#11151d', color: '#e0e2ed' });
        </script>
    @endif

</body>

</html>