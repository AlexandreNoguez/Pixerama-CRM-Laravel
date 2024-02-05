<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Cadatrar Lead') }}
            </h2>
            <a href="{{ route('leads.index') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-2 items-center flex rounded">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
                Voltar
            </a>
        </div>
    </x-slot>
    <form method="POST" action="{{ route('leads.store') }}" class="max-w-80 mx-auto mt-4">
        @csrf

        <!-- Título -->
        <div>
            <x-input-label for="leadTitle" :value="__('Título')" />
            <x-text-input id="leadTitle" class="block mt-1 w-full" type="text" name="leadTitle" :value="old('leadTitle')"
                required autofocus autocomplete="leadTitle" />
            <x-input-error :messages="$errors->get('leadTitle')" class="mt-2" />
        </div>

        <!-- Nome do Cliente -->
        <div class="mt-4">
            <x-input-label for="leadName" :value="__('Cliente')" />
            <x-text-input id="leadName" class="block mt-1 w-full" type="text" name="leadName" :value="old('leadName')"
                required autocomplete="leadName" />
            <x-input-error :messages="$errors->get('leadName')" class="mt-2" />
        </div>

        <!-- Empresa -->
        <div class="mt-4">
            <x-input-label for="companyName" :value="__('Empresa (opcional)')" />

            <x-text-input id="companyName" class="block mt-1 w-full" type="text" name="companyName" :value="old('companyName')"
                autocomplete="companyName" />

            <x-input-error :messages="$errors->get('companyName')" class="mt-2" />
        </div>

        <!-- Estágio do lead -->
        <div class="mt-4">
            <x-input-label for="leadStage" :value="__('Estado da negociação')" />

            <select id="leadStage" class="block mt-1 w-full" type="sek" name="leadStage" required
                autocomplete="leadStage">
                <option value="New">Novo</option>
                <option value="WaitingApproval">Aguardando Aprovação</option>
                <option value="OnGoing">Em andamento</option>
                <option value="Finished">Finalizado</option>
                <option value="Cancelled">Cancelado</option>
            </select>

            {{-- <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" /> --}}

            <!-- Preço -->
            <div class="mt-4">
                <x-input-label for="price" :value="__('Valor')" />

                <input id="price" class="block mt-1 w-full" type="text" name="price"
                    data-mask="000.000.000.000.000,00" autocomplete="price" placeholder="Apenas números" />

                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>

            <!-- descrição -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('Descrição')" />

                <textarea id="description" class="block mt-1 w-full" type="text" name="description" autocomplete="description"></textarea>

                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
        </div>

        <div class="flex items-center justify-end mt-4 pb-4">
            <x-primary-button class="ms-4">
                {{ __('Criar') }}
            </x-primary-button>
        </div>
    </form>
    <script>
        $(document).ready(function() {
            $('#price').mask('000.000.000.000.000,00', {
                reverse: true
            });
        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

</x-app-layout>
