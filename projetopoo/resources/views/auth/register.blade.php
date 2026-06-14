<!DOCTYPE html>
<html class="dark" lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>ALUNO MODERN - Criar Conta</title>

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
                        "inverse-surface": "#e0e2ed",
                        "on-primary-container": "#00285c",
                        "error": "#ffb4ab",
                        "background": "#10131b",
                        "primary-container": "#4b8eff",
                        "surface": "#10131b",
                        "secondary": "#c4c6cf",
                        "primary": "#adc6ff",
                        "secondary-container": "#464950",
                        "on-primary": "#002e69",
                        "on-surface-variant": "#c1c6d7",
                        "on-surface": "#e0e2ed",
                        "outline-variant": "#414755",
                        "on-primary-container": "#00285c",
                        "tertiary-container": "#ef6719",
                    },
                    fontFamily: {
                        "headline-lg": ["Inter"],
                        "body-md": ["Inter"],
                        "label-caps": ["Space Grotesk"],
                    },
                    fontSize: {
                        "headline-lg": ["32px", { lineHeight: "1.2", letterSpacing: "-0.01em", fontWeight: "600" }],
                        "body-md": ["16px", { lineHeight: "1.6", fontWeight: "400" }],
                        "label-caps": ["12px", { lineHeight: "1.0", letterSpacing: "0.1em", fontWeight: "500" }],
                    }
                },
            },
        }
    </script>

    <style>
        .glass-panel {
            background: rgba(255, 255, 255, 0.04);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: inset 0 1px 1px rgba(255, 255, 255, 0.05);
        }

        .bg-tech {
            background-color: #0B0E14;
            background-image:
                radial-gradient(circle at 50% 50%, rgba(173, 198, 255, 0.03) 0%, transparent 70%),
                linear-gradient(rgba(255, 255, 255, 0.02) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.02) 1px, transparent 1px);
            background-size: 100% 100%, 40px 40px, 40px 40px;
        }

        .glow-border:focus-within {
            border-color: #4b8eff;
            box-shadow: 0 0 15px rgba(75, 142, 255, 0.2);
        }
    </style>
</head>

<body
    class="bg-tech min-h-screen flex items-center justify-center p-6 selection:bg-primary-container selection:text-white">

    <!-- Fundo -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-[-10%] right-[-5%] w-[40%] h-[40%] bg-primary/10 rounded-full blur-[120px]"></div>
        <div
            class="absolute bottom-[-10%] left-[-5%] w-[30%] h-[30%] bg-tertiary-container/5 rounded-full blur-[100px]">
        </div>
    </div>

    <!-- Cantos decorativos -->
    <div class="fixed top-8 left-8 w-16 h-16 border-t border-l border-white/10 pointer-events-none"></div>
    <div class="fixed top-8 right-8 w-16 h-16 border-t border-r border-white/10 pointer-events-none"></div>
    <div class="fixed bottom-8 left-8 w-16 h-16 border-b border-l border-white/10 pointer-events-none"></div>
    <div class="fixed bottom-8 right-8 w-16 h-16 border-b border-r border-white/10 pointer-events-none"></div>

    <main class="w-full max-w-[480px] z-10 relative">

        <!-- Logo -->
        <div class="flex flex-col items-center mb-8">
            <div class="w-16 h-16 glass-panel rounded-xl flex items-center justify-center mb-6 border-primary/20">
                <span class="material-symbols-outlined text-primary text-4xl">school</span>
            </div>
            <h1 class="font-headline-lg text-headline-lg text-on-surface mb-2">Criar Conta</h1>
        </div>

        <!-- Formulário -->
        <section class="glass-panel p-8 rounded-2xl">
            <form action="{{ url('/register') }}" class="space-y-5" method="POST">
                @csrf

                <!-- Erros de validação -->
                @if ($errors->any())
                    <div class="bg-red-500/20 border border-red-500 text-red-300 p-4 rounded-lg">
                        <ul class="list-disc list-inside space-y-1 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Nome -->
                <div class="space-y-2">
                    <label
                        class="font-label-caps text-label-caps text-on-surface-variant block uppercase tracking-widest">
                        Nome Completo
                    </label>
                    <div
                        class="relative glow-border border border-white/10 rounded-lg bg-black/20 transition-all duration-300">
                        <input name="nome" value="{{ old('nome') }}"
                            class="w-full bg-transparent border-none text-on-surface placeholder:text-outline-variant py-3 px-4 font-body-md text-body-md outline-none"
                            placeholder="Ex: João da Silva" type="text" required />
                    </div>
                </div>

                <!-- Email -->
                <div class="space-y-2">
                    <label
                        class="font-label-caps text-label-caps text-on-surface-variant block uppercase tracking-widest">
                        E-mail Institucional
                    </label>
                    <div
                        class="relative glow-border border border-white/10 rounded-lg bg-black/20 transition-all duration-300 flex items-center">
                        <span class="material-symbols-outlined text-outline-variant ml-4">alternate_email</span>
                        <input name="email" value="{{ old('email') }}"
                            class="w-full bg-transparent border-none text-on-surface placeholder:text-outline-variant focus:ring-0 py-3 px-3 font-body-md text-body-md outline-none"
                            placeholder="nome@gmail.com" type="email" required />
                    </div>
                </div>

                <!-- Senha e Confirmar -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label
                            class="font-label-caps text-label-caps text-on-surface-variant block uppercase tracking-widest">
                            Senha de Acesso
                        </label>
                        <div
                            class="relative glow-border border border-white/10 rounded-lg bg-black/20 transition-all duration-300 flex items-center">
                            <span class="material-symbols-outlined text-outline-variant ml-3">lock_open</span>
                            <input name="senha"
                                class="w-full bg-transparent border-none text-on-surface placeholder:text-outline-variant focus:ring-0 py-3 px-2 font-body-md text-body-md outline-none"
                                placeholder="••••••••" type="password" required />
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label
                            class="font-label-caps text-label-caps text-on-surface-variant block uppercase tracking-widest">
                            Confirmar Senha
                        </label>
                        <div
                            class="relative glow-border border border-white/10 rounded-lg bg-black/20 transition-all duration-300 flex items-center">
                            <span class="material-symbols-outlined text-outline-variant ml-3">lock</span>
                            <input name="confirmar_senha"
                                class="w-full bg-transparent border-none text-on-surface placeholder:text-outline-variant focus:ring-0 py-3 px-2 font-body-md text-body-md outline-none"
                                placeholder="••••••••" type="password" required />
                        </div>
                    </div>
                </div>

                <!-- Botão -->
                <button
                    class="w-full bg-primary-container text-on-primary-container font-label-caps text-label-caps py-4 rounded-lg font-bold tracking-[0.2em] hover:bg-primary transition-all active:scale-[0.98] shadow-lg shadow-primary/20"
                    type="submit">
                    CADASTRAR NO SISTEMA
                </button>

            </form>

            <!-- Link para login -->
            <div class="mt-6 pt-5 border-t border-white/10 text-center">
                <p class="text-on-surface-variant text-sm">
                    Já tem uma conta?
                    <a href="{{ url('/login') }}" class="text-primary hover:underline">Fazer login</a>
                </p>
            </div>

        </section>

        <!-- Footer -->
        <footer class="mt-8 flex justify-center items-center gap-4 opacity-40">
            <div class="h-[1px] w-8 bg-white/30 hidden sm:block"></div>
            <span class="font-label-caps text-[10px] tracking-[0.3em] text-on-surface uppercase">Aluno Modern</span>
            <span class="material-symbols-outlined text-[14px]">verified_user</span>
        </footer>

    </main>

    <!-- SweetAlert para erros vindos de session -->
    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Erro!',
                text: '{{ session('error') }}',
                confirmButtonColor: '#adc6ff',
                background: '#10131b',
                color: '#e0e2ed'
            });
        </script>
    @endif

</body>

</html>