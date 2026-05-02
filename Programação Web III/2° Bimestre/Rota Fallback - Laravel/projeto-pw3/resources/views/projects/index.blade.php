<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>V.0</title>
    <link rel="icon" type="image/png" href="{{ asset('imagens/logo.png') }}">
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
    <style>
        body { font-family: 'Poppins', sans-serif; background: radial-gradient(circle at center, #1e293b 0%, #0f172a 100%); background-attachment: fixed; }
        .tab-active { border-bottom: 2px solid #3b82f6; color: #3b82f6; }
        .modal-open { overflow: hidden; }
    </style>
</head>
<body class="text-slate-200 antialiased">

    <header class="hidden md:grid grid-cols-3 w-full h-24 max-w-[90%] 2xl:max-w-[85%] mx-auto mt-10 items-center backdrop-blur-xl rounded-[55px] py-4 px-10 border border-slate-700/50 bg-slate-900/40">
        <div class="flex items-center justify-start">
            <img src="{{ asset('imagens/logo.png') }}" alt="Logo V.0" class="h-10 w-auto">
        </div>

        <div class="flex justify-center">
            <div class="bg-slate-800/50 backdrop-blur-sm flex rounded-full w-full max-w-md h-16 items-center p-1 overflow-hidden border border-slate-700/50">
                <nav class="flex flex-1 justify-around items-center px-2">
                    <a href="/" class="text-slate-400 hover:text-white text-sm tracking-widest transition-all px-6">Início</a>
                    <div class="w-36 h-14 rounded-full flex justify-center items-center bg-blue-600 text-white text-sm tracking-widest shadow-lg shadow-blue-900/20 cursor-default">Projetos</div>
                    <a href="https://github.com/vlipe/atividades-3DS" target="_blank" class="text-slate-400 hover:text-blue-400 text-sm transition-all duration-300 px-6 font-medium">GitHub</a>
                </nav>
            </div>
        </div>

        <div class="flex items-center justify-end gap-4">
            @auth
                <a href="/configuracoes" class="group relative">
                    <div class="w-10 h-10 rounded-full border-2 border-slate-700 overflow-hidden group-hover:border-blue-500 transition-all flex items-center justify-center bg-slate-800">
                        @if(Auth::user()->profile_image)
                            <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" class="w-full h-full object-cover">
                        @else
                            <i data-lucide="user" class="h-5 w-5 text-slate-400 group-hover:text-blue-400"></i>
                        @endif
                    </div>
                </a>
                <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="bg-slate-800 text-red-400 w-24 h-10 flex justify-center items-center rounded-full border border-slate-700 hover:bg-red-500 hover:text-white transition-all text-sm cursor-pointer font-medium">Sair</button>
            @endauth
        </div>
    </header>

    <main class="max-w-[90%] mx-auto mt-12 px-6">
        <div class="flex items-center justify-between border-b border-slate-800 mb-8 pb-2">
            <div class="flex gap-8">
                <button onclick="switchTab('list')" id="btn-list" class="tab-active pb-2 text-sm font-medium cursor-pointer flex items-center gap-2 transition-all">
                    <i data-lucide="list" class="w-4 h-4"></i> Lista de Logs
                </button>
                <button onclick="switchTab('form')" id="btn-form" class="pb-2 text-sm font-medium text-slate-500 hover:text-white cursor-pointer flex items-center gap-2 transition-all">
                    <i data-lucide="plus" class="w-4 h-4"></i> Novo Registro
                </button>
            </div>
            <div class="text-[10px] uppercase tracking-widest font-bold text-slate-500">Total: {{ $projects->count() }}</div>
        </div>

        <div id="tab-form" class="hidden max-w-2xl mx-auto animate-in fade-in slide-in-from-bottom-4">
            <div class="bg-slate-900/50 border border-slate-800 p-8 rounded-3xl backdrop-blur-md">
                <form method="POST" action="{{ route('projects.store') }}" class="space-y-4">
                    @csrf
                    <div class="space-y-1">
                        <label class="text-[10px] font-bold uppercase text-slate-500">Identificação</label>
                        <input type="text" name="title" required class="w-full bg-slate-800/50 border border-slate-700 rounded-xl p-4 focus:border-blue-500 text-white font-light outline-none">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label class="text-[10px] font-bold uppercase tracking-widest text-slate-500">Status</label>
                            <el-dropdown class="w-full relative">
    <button type="button" class="inline-flex w-full justify-between gap-x-1.5 rounded-xl bg-slate-800/50 px-4 py-4 text-sm text-white border border-slate-700 hover:bg-slate-800 transition-all outline-none focus:border-blue-500">
        <span id="display-status-new">Em Fila</span>
        <i data-lucide="chevron-down" class="w-4 h-4 text-slate-500"></i>
    </button>
    <el-menu anchor="bottom start" popover class="w-64 origin-top-right rounded-xl bg-slate-900 border border-slate-700 shadow-2xl transition-all data-closed:scale-95 data-closed:opacity-0 z-[100]">
        <div class="py-1">
            <button type="button" onclick="updateStatus('Em Fila', 'new')" class="block w-full px-4 py-3 text-left text-sm text-gray-300 font-light hover:bg-blue-600 hover:text-white transition-colors">Em Fila</button>
            <button type="button" onclick="updateStatus('Em Progresso', 'new')" class="block w-full px-4 py-3 text-left text-sm text-gray-300 hover:bg-blue-600 hover:text-white transition-colors border-t border-slate-800">Em Progresso</button>
            <button type="button" onclick="updateStatus('Testes', 'new')" class="block w-full px-4 py-3 text-left text-sm text-gray-300 hover:bg-blue-600 hover:text-white transition-colors border-t border-slate-800">Testes</button>
        </div>
    </el-menu>
</el-dropdown>
                            <input type="hidden" name="status" id="status-input-new" value="Em Fila">
                        </div>
                        <div class="space-y-1">
                            <label class="text-[10px] font-bold uppercase text-slate-500">Tecnologias</label>
                            <input type="text" name="tech_stack" class="w-full bg-slate-800/50 border border-slate-700 rounded-xl p-4 text-white font-light outline-none">
                        </div>
                    </div>
                    <div class="space-y-1">
                        <label class="text-[10px] font-bold uppercase text-slate-500">Documentação</label>
                        <textarea name="description" rows="4" class="w-full bg-slate-800/50 border border-slate-700 rounded-xl p-4 text-white font-light outline-none"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 py-4 rounded-xl hover:bg-blue-500 transition-all cursor-pointer">Publicar</button>
                </form>
            </div>
        </div>

        <div id="tab-list" class="block overflow-hidden rounded-2xl border border-slate-800 bg-slate-900/20 backdrop-blur-sm">
            <table class="w-full text-left border-collapse text-slate-300">
                <thead class="bg-slate-900/80 text-slate-500 text-[10px] uppercase font-bold">
                    <tr>
                        <th class="p-5">Projeto</th>
                        <th class="p-5">Data</th>
                        <th class="p-5">Descrição</th>
                        <th class="p-5 text-center">Status</th>
                        <th class="p-5 text-right">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800">
                    @foreach($projects as $project)
                    <tr class="transition-colors hover:bg-slate-800/20">
                        <td class="p-5 text-sm text-white font-light">{{ $project->title }}</td>
                        <td class="p-5 text-xs text-blue-400">{{ $project->created_at->format('d M, Y') }}</td>
                        <td class="p-5 text-xs text-slate-400 max-w-xs truncate">{{ $project->description }}</td>
                        <td class="p-5 text-center">
                            <span class="px-3 py-1 rounded-full text-[10px] uppercase border {{ $project->status == 'Testes' ? 'bg-purple-500/10 text-purple-400 border-purple-500/20' : 'bg-blue-500/10 text-blue-400 border-blue-500/20' }}">
                                {{ $project->status }}
                            </span>
                        </td>
                        <td class="p-5">
                            <div class="flex justify-end gap-4 items-center">
                                <button onclick="openEditModal({{ json_encode($project) }})" class="text-slate-400 hover:text-blue-400 transition-colors cursor-pointer">
                                    <i data-lucide="pencil" class="w-4 h-4"></i>
                                </button>
                                <form action="{{ route('projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Excluir permanentemente?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-slate-400 hover:text-red-500 transition-colors cursor-pointer">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    <div id="editModal" class="hidden fixed inset-0 z-[60] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">
        <div class="bg-slate-900 border border-slate-800 w-full max-w-xl rounded-3xl p-8 shadow-2xl">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-light text-white">Editar Registro</h2>
                <button onclick="closeEditModal()" class="text-slate-400 hover:text-white cursor-pointer"><i data-lucide="x"></i></button>
            </div>
            <form id="editForm" method="POST" class="space-y-4">
                @csrf @method('PATCH')
                <div class="space-y-1">
                    <label class="text-[10px] font-bold uppercase text-slate-500">Título</label>
                    <input type="text" name="title" id="edit_title" required class="w-full bg-slate-800 border border-slate-700 rounded-xl p-4 font-light text-white outline-none focus:border-blue-500">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-1">
                        <label class="text-[10px] font-bold uppercase tracking-widest text-slate-500 ml-1">Status Atual</label>
                        <el-dropdown class="w-full relative">
    <button type="button" class="inline-flex w-full justify-between gap-x-1.5 rounded-xl bg-slate-800/50 px-4 py-4 text-sm font-light text-white border border-slate-700 hover:bg-slate-800 transition-all outline-none focus:border-blue-500">
        <span id="display-status-new">Em Fila</span>
        <i data-lucide="chevron-down" class="w-4 h-4 text-slate-500"></i>
    </button>
    <el-menu anchor="bottom start" popover class="w-64 origin-top-right rounded-xl bg-slate-900 border border-slate-700 shadow-2xl transition-all data-closed:scale-95 data-closed:opacity-0 z-[100]">
        <div class="py-1">
            <button type="button" onclick="updateStatus('Em Fila', 'new')" class="block w-full px-4 py-3 text-left font-light text-sm text-gray-300 hover:bg-blue-600 hover:text-white transition-colors">Em Fila</button>
            <button type="button" onclick="updateStatus('Em Progresso', 'new')" class="block w-full px-4 py-3 text-left font-light text-sm text-gray-300 hover:bg-blue-600 hover:text-white transition-colors border-t border-slate-800">Em Progresso</button>
            <button type="button" onclick="updateStatus('Testes', 'new')" class="block w-full px-4 py-3 text-left text-sm font-light text-gray-300 hover:bg-blue-600 hover:text-white transition-colors border-t border-slate-800">Testes</button>
        </div>
    </el-menu>
</el-dropdown>
                        <input type="hidden" name="status" id="status-input-edit" value="Em Fila">
                    </div>
                    <div class="space-y-1">
                        <label class="text-[10px] font-bold uppercase text-slate-500">Tecnologias</label>
                        <input type="text" name="tech_stack" id="edit_tech" class="w-full bg-slate-800 border border-slate-700 rounded-xl p-4 text-white font-light outline-none focus:border-blue-500">
                    </div>
                </div>
                <div class="space-y-1">
                    <label class="text-[10px] font-bold uppercase text-slate-500">Descrição</label>
                    <textarea name="description" id="edit_description" rows="4" class="w-full bg-slate-800 border border-slate-700 rounded-xl p-4 text-white font-light outline-none focus:border-blue-500"></textarea>
                </div>
                <button type="submit" class="w-full bg-blue-600 py-4 rounded-xl hover:bg-blue-500 cursor-pointer">Salvar</button>
            </form>
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>

    <script>
        function switchTab(tab) {
            const form = document.getElementById('tab-form');
            const list = document.getElementById('tab-list');
            const btnForm = document.getElementById('btn-form');
            const btnList = document.getElementById('btn-list');

            if(tab === 'form') {
                form.classList.remove('hidden'); list.classList.add('hidden');
                btnForm.classList.add('tab-active'); btnList.classList.remove('tab-active');
                btnForm.classList.remove('text-slate-500'); btnList.classList.add('text-slate-500');
            } else {
                form.classList.add('hidden'); list.classList.remove('hidden');
                btnForm.classList.remove('tab-active'); btnList.classList.add('tab-active');
                btnList.classList.remove('text-slate-500'); btnForm.classList.add('text-slate-500');
            }
        }

        function openEditModal(project) {
            document.getElementById('editModal').classList.remove('hidden');
            document.body.classList.add('modal-open');

            document.getElementById('edit_title').value = project.title;
            document.getElementById('edit_tech').value = project.tech_stack;
            document.getElementById('edit_description').value = project.description;

            updateStatus(project.status, 'edit');

            document.getElementById('editForm').action = `/projects/${project.id}`;
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
            document.body.classList.remove('modal-open');
        }

        function updateStatus(valor, context) {
            document.getElementById(`display-status-${context}`).innerText = valor;
            document.getElementById(`status-input-${context}`).value = valor;

            const dropdowns = document.querySelectorAll('el-menu');
            dropdowns.forEach(menu => {
                if (typeof menu.hidePopover === 'function') menu.hidePopover();
            });
        }

        lucide.createIcons();
    </script>
</body>
</html>
