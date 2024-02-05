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
            <a href="{{ route('leads.edit', $lead->id) }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-2 items-center flex rounded">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>

                Editar
            </a>
            <x-danger-button x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-lead-deletion')">{{ __('Excluir') }}</x-danger-button>
        </div>
    </x-slot>

    <x-modal name="confirm-lead-deletion" :show="$errors->leadDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('leads.destroy', $lead->id) }}" class="p-6">
            @csrf
            @method('delete')

             <h2 class="text-lg font-medium text-gray-900">
                {{ __('Tem certeza que deseja excluir este lead?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Se você deletar, os dados e todo histórico da negociação será perido. Deseja excluir assim mesmo?') }}
            </p>

            {{-- <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input id="password" name="password" type="password" class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}" />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div> --}}

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Excluir permanentemente') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>

    <div class="max-w-80 mx-auto mt-4">
        @csrf

        <!-- Título -->
        <div>
            <x-input-label for="leadTitle" :value="__('Título')" />
            <x-input-label id="leadTitle" class="block mt-1 w-full" type="text" name="leadTitle" :value="$lead->leadTitle" />
            <x-input-error :messages="$errors->get('leadTitle')" class="mt-2" />
        </div>

        <!-- Nome do Cliente -->
        <div class="mt-4">
            <x-input-label for="leadName" :value="__('Cliente')" />
            <x-input-label id="leadName" class="block mt-1 w-full" type="text" name="leadName" :value="$lead->leadName" />
            <x-input-error :messages="$errors->get('leadName')" class="mt-2" />
        </div>

        <!-- Empresa -->
        <div class="mt-4">
            <x-input-label for="companyName" :value="__('Empresa (opcional)')" />
            <x-input-label id="companyName" class="block mt-1 w-full" type="text" name="companyName"
                :value="$lead->companyName" />
            <x-input-error :messages="$errors->get('companyName')" class="mt-2" />
        </div>

        <!-- Estágio do lead -->
        <div class="mt-4">
            <x-input-label for="leadStage" :value="__('Estado da negociação')" />
            <x-input-label id="companyName" class="block mt-1 w-full" type="text" name="companyName"
                :value="getLeadStage($lead->leadStage)" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

            <!-- Preço -->
            <div class="mt-4">
                <x-input-label for="price" :value="__('Valor')" />
                <x-input-label id="price" class="block mt-1 w-full" type="text" name="price"
                    :value="$lead->price" />
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>

            <!-- descrição -->
            <div class="mt-4 pb-4">
                <x-input-label for="description" :value="__('Descrição')" />
                <x-input-label id="description" class="block mt-1 w-full" type="text" name="description"
                    :value="$lead->description" />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
        </div>
    </div>
</x-app-layout>
