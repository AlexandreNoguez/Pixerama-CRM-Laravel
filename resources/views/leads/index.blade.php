<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Leads') }}
            </h2>
            <a href="{{ route('leads.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-2 items-center flex rounded">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Novo
            </a>
        </div>
    </x-slot>

    <div class="container mx-auto my-4">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50 text-center">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 w-1/4 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Novos
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 w-1/4 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Aprovação Pendente
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 w-1/4 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Em Progresso
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 w-1/4 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Faturado
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <!-- Linha de exemplo -->
                                <tr>
                                    <td class="px-6 py-4 w-1/4 whitespace-nowrap border">
                                        @foreach ($leads as $lead)
                                            @if ($lead->leadStage == 'New')
                                                <a href="{{ route('leads.show', $lead->id) }}" class="cursor-pointer">
                                                    <x-card title="{{ $lead->leadTitle }}" price="{{ $lead->price }}"
                                                        description="{{ $lead->description }}"
                                                        created="{{ $lead->created_at }}"
                                                        updated="{{ $lead->updated_at }}" link="#"
                                                        stage="{{ $lead->leadStage }}"/>
                                                </a>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="px-6 py-4 w-1/4 whitespace-nowrap border">
                                        @foreach ($leads as $lead)
                                            @if ($lead->leadStage == 'WaitingApproval')
                                                <a href="{{ route('leads.show', $lead->id) }}" class="cursor-pointer">
                                                    <x-card title="{{ $lead->leadTitle }}" price="{{ $lead->price }}"
                                                        description="{{ $lead->description }}"
                                                        created="{{ $lead->created_at }}"
                                                        updated="{{ $lead->updated_at }}" link="#"
                                                        stage="{{ $lead->leadStage }}" />
                                                </a>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="px-6 py-4 w-1/4 whitespace-nowrap border">
                                        @foreach ($leads as $lead)
                                            @if ($lead->leadStage == 'OnGoing')
                                                <a href="{{ route('leads.show', $lead->id) }}" class="cursor-pointer">
                                                    <x-card title="{{ $lead->leadTitle }}" price="{{ $lead->price }}"
                                                        description="{{ $lead->description }}"
                                                        created="{{ $lead->created_at }}"
                                                        updated="{{ $lead->updated_at }}" link="#"
                                                        stage="{{ $lead->leadStage }}" />
                                                </a>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="px-6 py-4 w-1/4 whitespace-nowrap border">
                                        @foreach ($leads as $lead)
                                            @if (($lead->leadStage == 'Finished') | ($lead->leadStage == 'Cancelled'))
                                                <a href="{{ route('leads.show', $lead->id) }}" class="cursor-pointer">
                                                    <x-card title="{{ $lead->leadTitle }}" price="{{ $lead->price }}"
                                                        description="{{ $lead->description }}"
                                                        created="{{ $lead->created_at }}"
                                                        updated="{{ $lead->updated_at }}" link="#"
                                                        stage="{{ $lead->leadStage }}" />
                                                </a>
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
