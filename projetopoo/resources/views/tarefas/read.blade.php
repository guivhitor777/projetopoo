<!DOCTYPE html>
<html class="dark" lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Aluno Modern | Tarefas</title>
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
                        "primary": "#adc6ff", "on-primary": "#002e69", "background": "#0b0e14",
                        "surface": "#0b0e14", "surface-container": "#11151d",
                        "on-surface": "#e0e2ed", "on-surface-variant": "#9ba1ad",
                        "outline-variant": "#414755", "error": "#ffb4ab", "tertiary": "#ffb595"
                    },
                    spacing: { "sidebar-width": "280px", "gutter": "24px" },
                    fontFamily: { "body": ["Inter", "sans-serif"], "label-caps": ["Space Grotesk"] }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #0b0e14;
            color: #e0e2ed;
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        .glass-panel {
            background: rgba(255, 255, 255, 0.04);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.08);
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

<body>

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
        class="ml-[280px] h-20 px-8 flex items-center justify-between border-b border-white/10 bg-surface/50 backdrop-blur-md sticky top-0 z-40">
        <div>
            <h2 class="text-xl font-bold text-on-surface">Tarefas</h2>
            <p class="text-xs text-on-surface-variant">Gerencie as tarefas cadastradas.</p>
        </div>
        <div class="flex items-center gap-3 pl-4 border-l border-white/10">
            <div class="text-right">
                <p class="text-[10px] text-primary uppercase tracking-widest">Nível Máx.</p>
                <p class="text-sm font-bold">{{ Session::get('usuario_nome', 'Administrador') }}</p>
            </div>
        </div>
    </header>

    <!-- Main -->
    <main class="ml-[280px] pt-8 min-h-screen flex flex-col">
        <div class="p-8 flex-1">

            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-3">
                <div>
                    <h2 class="text-4xl font-bold tracking-tight mb-3">Tarefas</h2>
                    <div class="w-1/2 h-1 bg-primary mb-4"></div>
                    <p class="text-on-surface-variant text-lg">Gerencie as tarefas cadastradas no sistema.</p>
                </div>
                <a href="{{ url('/tarefas/create') }}"
                    class="bg-primary text-on-primary px-6 py-3 rounded-lg font-bold flex items-center gap-2 hover:opacity-90 active:scale-[0.98] transition-all text-sm">
                    <span class="material-symbols-outlined">add_circle</span>
                    ADICIONAR TAREFA
                </a>
            </div>

            <!-- Busca -->
            <form method="GET" action="{{ url('/tarefas') }}" class="mb-6">
                <div class="relative max-w-[200px]">
                    <span
                        class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant/50 text-base">
                        search
                    </span>
                    <input type="text" name="busca" value="{{ $busca ?? '' }}" placeholder="Buscar..."
                        class="w-full bg-[#1c1f26] border border-white/10 rounded-lg py-1.5 pl-9 pr-3 text-xs text-on-surface placeholder:text-on-surface-variant/40 outline-none focus:border-primary/50 transition-all" />
                </div>
                @if (!empty($busca))
                    <a href="{{ url('/tarefas') }}"
                        class="text-xs text-on-surface-variant hover:text-primary mt-2 inline-block">
                        Limpar busca
                    </a>
                @endif
            </form>

            <div class="glass-panel rounded-xl overflow-hidden shadow-2xl">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-white/5 bg-white/5">
                            <th
                                class="py-5 px-8 text-[11px] font-semibold text-on-surface-variant uppercase tracking-wider">
                                ID</th>
                            <th
                                class="py-5 px-8 text-[11px] font-semibold text-on-surface-variant uppercase tracking-wider">
                                Disciplina</th>
                            <th
                                class="py-5 px-8 text-[11px] font-semibold text-on-surface-variant uppercase tracking-wider w-1/3">
                                Descrição</th>
                            <th
                                class="py-5 px-8 text-[11px] font-semibold text-on-surface-variant uppercase tracking-wider">
                                Prazo de Entrega</th>
                            <th
                                class="py-5 px-8 text-[11px] font-semibold text-on-surface-variant uppercase tracking-wider text-center">
                                Status</th>
                            <th
                                class="py-5 px-8 text-[11px] font-semibold text-on-surface-variant uppercase tracking-wider text-center">
                                Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @forelse ($tarefas as $tarefa)
                                            <tr
                                                class="hover:bg-white/[0.02] transition-colors {{ $tarefa->concluida ? 'opacity-50' : '' }}">
                                                <td class="py-6 px-8">{{ $tarefa->id }}</td>
                                                <td class="py-6 px-8 {{ $tarefa->concluida ? 'line-through' : '' }}">
                                                    {{ $tarefa->disciplina }}</td>
                                                <td class="py-6 px-8 {{ $tarefa->concluida ? 'line-through' : '' }}">
                                                    {{ $tarefa->descricao }}</td>
                                                <td class="py-6 px-8">
                                                    @php
                                                        $atrasada = !$tarefa->concluida && \Carbon\Carbon::parse($tarefa->prazo)->isPast();
                                                    @endphp
                                                    <span class="{{ $atrasada ? 'text-red-400 font-bold' : '' }}">
                                                        {{ \Carbon\Carbon::parse($tarefa->prazo)->format('d/m/Y') }}
                                                    </span>
                                                    @if ($atrasada)
                                                        <span class="text-[10px] text-red-400 block uppercase tracking-wide">Atrasada</span>
                                                    @endif
                                                </td>
                                                <td class="py-6 px-8 text-center">
                                                    <form action="{{ url('/tarefas/' . $tarefa->id . '/toggle') }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit"
                                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold transition-all
                                                                    {{ $tarefa->concluida
                            ? 'bg-green-500/15 text-green-400 border border-green-500/30 hover:bg-green-500/25'
                            : 'bg-white/5 text-on-surface-variant border border-white/10 hover:bg-white/10' }}">
                                                            <span class="material-symbols-outlined text-sm">
                                                                {{ $tarefa->concluida ? 'check_circle' : 'radio_button_unchecked' }}
                                                            </span>
                                                            {{ $tarefa->concluida ? 'Concluída' : 'Pendente' }}
                                                        </button>
                                                    </form>
                                                </td>
                                                <td class="py-6 px-8 text-center">
                                                    <div class="flex items-center justify-center gap-3">
                                                        <a href="{{ url('/tarefas/' . $tarefa->id . '/edit') }}"
                                                            class="w-10 h-10 flex items-center justify-center rounded-lg border border-white/10 hover:border-primary/50 hover:bg-primary/10 text-on-surface-variant hover:text-primary transition-all">
                                                            <span class="material-symbols-outlined">edit</span>
                                                        </a>
                                                        <button onclick="confirmDelete({{ $tarefa->id }})"
                                                            class="w-10 h-10 flex items-center justify-center rounded-lg border border-white/10 hover:border-red-500/50 hover:bg-red-500/10 text-on-surface-variant hover:text-red-500 transition-all">
                                                            <span class="material-symbols-outlined">delete</span>
                                                        </button>
                                                        <form id="delete-form-{{ $tarefa->id }}"
                                                            action="{{ url('/tarefas/' . $tarefa->id) }}" method="POST" class="hidden">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-12 px-8 text-center text-on-surface-variant">Nenhuma tarefa
                                    cadastrada ainda.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>

        <footer class="fixed bottom-4 left-0 right-0 flex justify-center items-center gap-8 opacity-40 text-center">
            <div class="h-[1px] w-8 bg-white/30 hidden sm:block"></div>
            <span class="text-[10px] tracking-[0.3em] uppercase">Aluno Modern</span>
            <span class="material-symbols-outlined text-[14px]">verified_user</span>
        </footer>
    </main>

    <div class="fixed top-0 left-0 w-full h-full pointer-events-none -z-10 overflow-hidden">
        <div class="absolute -top-[10%] -right-[10%] w-[60%] h-[60%] rounded-full bg-primary/5 blur-[120px]"></div>
        <div class="absolute -bottom-[20%] -left-[10%] w-[50%] h-[50%] rounded-full bg-tertiary/5 blur-[100px]"></div>
    </div>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                icon: 'warning', title: 'Excluir tarefa?', text: 'Esta ação não pode ser desfeita.',
                showCancelButton: true, confirmButtonText: 'Sim, excluir', cancelButtonText: 'Cancelar',
                confirmButtonColor: '#ef4444', cancelButtonColor: '#414755', background: '#0b0e14', color: '#e0e2ed'
            }).then((result) => { if (result.isConfirmed) document.getElementById('delete-form-' + id).submit(); });
        }
    </script>

    @if (session('success'))
        <script>Swal.fire({ icon: 'success', title: 'Sucesso!', text: '{{ session('success') }}', confirmButtonColor: '#adc6ff', background: '#0b0e14', color: '#e0e2ed' });</script>
    @endif
    @if (session('error'))
        <script>Swal.fire({ icon: 'error', title: 'Erro!', text: '{{ session('error') }}', confirmButtonColor: '#adc6ff', background: '#0b0e14', color: '#e0e2ed' });</script>
    @endif

</body>

</html>