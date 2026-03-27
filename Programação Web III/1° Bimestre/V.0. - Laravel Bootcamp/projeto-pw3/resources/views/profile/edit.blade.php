<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>V.0</title>
    <link rel="icon" type="image/png" href="{{ asset('imagens/logo.png') }}">
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css">
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
    <style>
        body { font-family: 'Poppins', sans-serif; background: radial-gradient(circle at center, #1e293b 0%, #0f172a 100%); background-attachment: fixed; }
        .tab-active { border-bottom: 2px solid #3b82f6; color: #3b82f6; }
        .modal-open { overflow: hidden; }
        .cropper-view-box, .cropper-face { border-radius: 50%; }
    </style>
</head>
<body class="text-slate-200 antialiased pb-20">

    <header class="hidden md:grid grid-cols-3 w-full h-24 max-w-[90%] 2xl:max-w-[85%] mx-auto mt-10 items-center backdrop-blur-xl rounded-[55px] py-4 px-10 border border-slate-700/50 bg-slate-900/40">
        <div class="flex items-center justify-start"><img src="{{ asset('imagens/logo.png') }}" alt="Logo V.0" class="h-10 w-auto"></div>
        <div class="flex justify-center">
            <div class="bg-slate-800/50 backdrop-blur-sm flex rounded-full w-full max-w-md h-16 items-center p-1 overflow-hidden border border-slate-700/50">
                <nav class="flex flex-1 justify-around items-center px-2">
                    <a href="/" class="text-slate-400 hover:text-white text-sm tracking-widest transition-all px-6">Início</a>
                    <a href="{{ route('projects.index') }}" class="text-slate-400 hover:text-white text-sm tracking-widest transition-all px-6">Projetos</a>
                    <a href="https://github.com/vlipe/atividades-3DS" target="_blank" class="text-slate-400 hover:text-blue-400 text-sm transition-all duration-300 px-6 font-medium">GitHub</a>
                </nav>
            </div>
        </div>
        <div class="flex items-center justify-end gap-4">
            @auth
                <a href="/configuracoes" class="group relative">
                    <div class="w-10 h-10 rounded-full border-2 border-blue-500 overflow-hidden transition-all flex items-center justify-center bg-slate-800 shadow-[0_0_15px_rgba(59,130,246,0.3)]">
                        @if(Auth::user()->profile_image)
                            <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" class="w-full h-full object-cover">
                        @else
                            <i data-lucide="user" class="h-5 w-5 text-blue-400"></i>
                        @endif
                    </div>
                </a>
                <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="bg-slate-800 text-red-400 w-24 h-10 flex justify-center items-center rounded-full border border-slate-700 hover:bg-red-500 hover:text-white transition-all text-sm cursor-pointer font-medium">Sair</button>
            @endauth
        </div>
    </header>

    <div class="max-w-xl mx-auto mt-16 px-6">
        @if(session('success'))
            <div class="bg-green-500/10 border border-green-500/20 text-green-400 p-4 rounded-xl mb-6 text-sm animate-in fade-in zoom-in duration-300">{{ session('success') }}</div>
        @endif

        <div class="bg-slate-900/50 border border-slate-800 p-8 rounded-[40px] shadow-2xl backdrop-blur-md">
            <form id="profile-form" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <div class="flex flex-col items-center">
                    <div class="relative group">
                        <div class="w-32 h-32 rounded-full border-4 border-slate-800 overflow-hidden bg-slate-800 transition-all group-hover:border-blue-500/50">
                            @if(Auth::user()->profile_image)
                                <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-600"><i data-lucide="user" class="w-16 h-16"></i></div>
                            @endif
                        </div>
                        <label class="absolute bottom-0 right-0 bg-blue-600 p-2 rounded-full cursor-pointer shadow-lg hover:bg-blue-500 transition-all border-4 border-slate-900 active:scale-95">
                            <i data-lucide="camera" class="w-4 h-4 text-white"></i>
                            <input type="file" id="avatar-input" class="hidden" accept="image/*">
                        </label>
                    </div>
                </div>

                <input type="hidden" name="avatar_base64" id="avatar-base64">

                <div class="space-y-2">
                    <label class="text-[10px] font-bold uppercase tracking-widest text-slate-500 ml-1">Nome de Exibição</label>
                    <input type="text" name="name" value="{{ Auth::user()->name }}" class="w-full text-sm px-6 py-4 rounded-2xl bg-slate-800/50 border border-slate-700 text-white focus:border-blue-500 outline-none transition-all">
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white py-4 rounded-2xl hover:bg-blue-700 cursor-pointer shadow-lg active:scale-[0.98]">Salvar Alterações</button>
            </form>
        </div>
    </div>

    <div id="cropModal" class="hidden fixed inset-0 z-[100] flex items-center justify-center bg-black/80 backdrop-blur-sm p-4">
        <div class="bg-slate-900 border border-slate-800 w-full max-w-xl rounded-3xl p-6 shadow-2xl">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl text-white flex items-center gap-2"><i data-lucide="scissors" class="w-5 h-5 text-white font-light"></i> Recortar Avatar</h2>
                <button type="button" onclick="closeCropModal()" class="text-slate-400 hover:text-white cursor-pointer"><i data-lucide="x"></i></button>
            </div>
            <div class="max-h-[70vh] overflow-hidden rounded-xl border border-slate-800 bg-black/20 mb-4">
                <img id="image-to-crop" class="max-w-full block">
            </div>
            <button type="button" id="crop-button" class="w-full bg-blue-600 text-white py-3 rounded-xl hover:bg-blue-500 transition-all active:scale-[0.98]">
                Recortar
            </button>
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>

    <script>
        let cropper;
        const avatarInput = document.getElementById('avatar-input');
        const cropModal = document.getElementById('cropModal');
        const imageToCrop = document.getElementById('image-to-crop');
        const cropButton = document.getElementById('crop-button');
        const avatarBase64 = document.getElementById('avatar-base64');

        avatarInput.addEventListener('change', function(e) {
            const files = e.target.files;
            if (files && files.length > 0) {
                const file = files[0];
                const reader = new FileReader();
                reader.onload = function(event) {
                    imageToCrop.src = event.target.result;
                    openCropModal();
                };
                reader.readAsDataURL(file);
            }
        });

        function openCropModal() {
            cropModal.classList.remove('hidden');
            if (cropper) cropper.destroy();
            cropper = new Cropper(imageToCrop, {
                aspectRatio: 1,
                viewMode: 1,
                dragMode: 'move',
                guides: false,
                center: true,
                highlight: false,
                cropBoxMovable: true,
                cropBoxResizable: false,
                toggleDragModeOnDblclick: false,
            });
        }

        function closeCropModal() {
            cropModal.classList.add('hidden');
            if (cropper) cropper.destroy();
            avatarInput.value = '';
        }

        cropButton.addEventListener('click', function() {
            if (!cropper) return;

            const canvas = cropper.getCroppedCanvas({ width: 512, height: 512 });

            const base64Image = canvas.toDataURL('image/png');

            avatarBase64.value = base64Image;

            const previewContainer = document.querySelector('.w-32.h-32');
            const previewImg = previewContainer.querySelector('img');

            if (previewImg) {
                previewImg.src = base64Image;
            } else {

                previewContainer.innerHTML = `<img src="${base64Image}" class="w-full h-full object-cover">`;
            }

            closeCropModal();

        });

        lucide.createIcons();
    </script>
</body>
</html>
