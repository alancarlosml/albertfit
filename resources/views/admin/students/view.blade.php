<x-app-layout>
    <x-header>
        <x-slot:title>Estabelecimentos</x-slot:title>
    </x-header>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-4xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Detalhes do Estabelecimento</h2>
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo</label>
                    <span class="text-gray-900 dark:text-white">
                        @if ($establishment->type == 'crossfit')
                            {{ 'Crossfit' }}
                        @elseif ($establishment->type == 'academia')
                            {{ 'Academia' }}
                        @elseif ($establishment->type == 'personal_trainer')
                            {{ 'Personal trainer' }}
                        @endif
                    </span>
                </div>
                <div class="sm:col-span-2">
                    <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome</label>
                    <span class="text-gray-900 dark:text-white">
                        {{ $establishment->name }}
                    </span>
                </div>
                <div class="sm:col-span-2">
                    <label for="owner"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Proprietário</label>
                    <span class="text-gray-900 dark:text-white">
                        {{ $establishment->owner }}
                    </span>
                </div>
                <div class="sm:col-span-2">
                    <label for="cnpj"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CNPJ</label>
                    <span class="text-gray-900 dark:text-white">
                        {{ $establishment->cnpj }}
                    </span>
                </div>
                <div class="sm:col-span-2">
                    <label for="phone"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefone</label>
                    <span class="text-gray-900 dark:text-white">
                        {{ $establishment->phone }}
                    </span>
                </div>
                <div class="sm:col-span-2">
                    <label for="social_network"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rede social</label>
                    <span class="text-gray-900 dark:text-white">
                        {{ $establishment->social_network }}
                    </span>
                </div>
                <div class="sm:col-span-2">
                    <label for="website"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Site</label>
                    <span class="text-gray-900 dark:text-white">
                        {{ $establishment->website }}
                    </span>
                </div>
                <div class="sm:col-span-2">
                    <label for="address"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Endereço</label>
                    <span class="text-gray-900 dark:text-white">
                        {{ $establishment->address }}
                    </span>
                </div>
                <div class="sm:col-span-2">
                    <label for="active"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stataus</label>
                    <span class="text-gray-900 dark:text-white">
                        @if ($establishment->active == 1)
                            {{ 'Ativo' }}
                        @elseif ($establishment->active == 0)
                            {{ 'Inativo' }}
                        @endif
                </div>
            </div>
            <div class="mt-4 flex justify-end">
                <a href="{{ route('admin.establishments.index') }}"
                    class="ml-4 mt-2 text-gray-500 hover:text-gray-600">Voltar</a>
            </div>
        </div>
    </section>
</x-app-layout>
