<div style="{{ ($stage == 'Cancelled' ? 'background-color: #FF7F7F;' : '') . ($stage == 'Finished' ? 'background-color: #5CED73;' : '') }}"
    class="bg-white border border-black rounded-xl shadow-lg p-4 max-w-48 mx-auto my-4 text-wrap hover:-translate-y-1 transition delay-150">
    {{-- {{ dd(route('leads.show', $leadId)) }} --}}

    <h2 class="uppercase tracking-wide text-sm text-indigo-500 font-semibold hover:underline">{{ $title }}</h2>
    <p class="block mt-1 text-lg leading-tight font-medium text-black">
       R$ {{ $price }}
    </p>
    <p class="text-[10px] mt-2 text-gray-500 text-balance">{{ $description }}</p>
    <p class="text-[8px] mt-2 text-gray-500 text-balance">Criado em {{ $created }}</p>
    <p class="text-[8px] text-gray-500 text-balance">{{ $updated ? "Atualizado em $updated" : null }}</p>
    {{-- {{dd($created)}} --}}
</div>
