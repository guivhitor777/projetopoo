<!DOCTYPE html>
<html lang="pt-br" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.07);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .bg-pattern {
            background-color: #0b0e14;
            background-image:
                radial-gradient(circle at 2px 2px,
                    rgba(173, 198, 255, 0.05) 1px,
                    transparent 0);
            background-size: 40px 40px;
        }

        .glow-input:focus {
            box-shadow: 0 0 15px rgba(173, 198, 255, 0.2);
            border-color: #adc6ff;
        }
    </style>
</head>

<body class="bg-pattern min-h-screen flex items-center justify-center p-6 overflow-hidden">
    <div class="fixed inset-0 pointer-events-none overflow-hidden">
        <div class="absolute -top-[20%] -left-[10%] w-[60%] h-[60%] bg-blue-500/10 blur-[120px] rounded-full"></div>
        <div class="absolute -bottom-[20%] -right-[10%] w-[50%] h-[50%] bg-blue-400/5 blur-[100px] rounded-full"></div>
    </div>
    <main class="w-full max-w-md relative z-10">
        <div class="flex flex-col items-center mb-10">
            <div class="w-16 h-16 rounded-xl glass-card flex items-center justify-center mb-4">
                <span class="material-symbols-outlined text-blue-300 text-3xl">person</span>
            </div>
            <h1 class="text-blue-300 tracking-[0.3em] text-sm font-bold">ALUNO MODERN</h1>
        </div>

        <div class="glass-card rounded-2xl p-8 shadow-2xl">

            <div class="mb-8">
                <h2 class="text-3xl font-bold text-white mb-2">Acesse sua conta</h2>
                <p class="text-gray-400 text-sm">Insira suas credenciais para acessar o sistema.</p>
            </div>
            @if (session('error'))
                <div class="bg-red-500/20 border border-red-500 text-red-300 p-4 rounded-lg mb-6">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="bg-green-500/20 border border-green-500 text-green-300 p-4 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ url('/login') }}" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-sm text-gray-300 mb-2">E-mail</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-gray-500">
                            alternate_email
                        </span>
                        <input type="email" name="email" required value="{{ old('email') }}"
                            placeholder="usuario@email.com"
                            class="w-full h-14 pl-12 pr-4 rounded-lg bg-black/30 border border-gray-700 text-white glow-input outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-sm text-gray-300 mb-2">Senha</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-gray-500">
                            lock
                        </span>
                        <input type="password" name="senha" required placeholder="••••••••"
                            class="w-full h-14 pl-12 pr-4 rounded-lg bg-black/30 border border-gray-700 text-white glow-input outline-none">
                    </div>
                </div>

                <button type="submit"
                    class="w-full h-14 bg-blue-400 text-black font-bold rounded-lg hover:brightness-110 transition-all">
                    ENTRAR
                </button>

            </form>

        </div>
    </main>

</body>

</html>