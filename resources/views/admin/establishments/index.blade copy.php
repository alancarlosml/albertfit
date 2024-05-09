<x-app-layout>
    <x-header>
        <x-slot:title>Estabelecimentos</x-slot:title>
        <x-slot:link>/estabelecimentos/novo</x-slot:link>
    </x-header>

    <section class="mt-12">
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg"
                x-data="{ establishments: {{@json_encode($establishments)}} }">
            {{-- <div class="pb-4 bg-white dark:bg-gray-900">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative mt-1">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                             viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" id="table-search"
                           @input="establishments = $event.target.value ? establishments.filter(est => est.name.toLowerCase().includes($event.target.value.toLowerCase())) : @json($establishments)"
                           class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Search for items">
                </div>
            </div> --}}
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all-search" type="checkbox"
                                       class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Nome do estabelecimento
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Tipo
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Proprietário
                        </th>
                        <th scope="col" class="py-3 px-6">
                            CNPJ
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Telefone
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Status
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Ações
                        </th>
                        {{-- <th scope="col" class="py-3 px-6">
                            Endereço
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Rede Social
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Website
                        </th> --}}
                    </tr>
                </thead>
                <tbody>
                    <template x-for="establishment in establishments" :key="establishment.id">
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                            <td class="p-4 w-4">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox"
                                           class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                x-text="establishment.name">
                            </th>
                            <td class="py-4 px-6" x-text="establishment.type === 'crossfit' ? 'Crossfit' : (establishment.type === 'academia' ? 'Academia' : 'Personal Trainer')"></td>
                            <td class="py-4 px-6" x-text="establishment.owner"></td>
                            <td class="py-4 px-6" x-text="establishment.cnpj"></td>
                            <td class="py-4 px-6" x-text="establishment.phone"></td>
                            <td class="py-4 px-6" x-text="establishment.active ? 'Ativo' : 'Inativo'"></td>
                            <td class="py-4 px-6">
                                <div class="flex items-center space-x-3">
                                    <a href="#" x-on:click="editEstablishment($event, establishment.id)"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                                    <div x-data="{ selectedEstablishmentId: null }">
                                        <script>
                                            function editEstablishment(event, establishmentId) {
                                                event.preventDefault();
                                                var editUrl = `{{ url('/estabelecimentos') }}/${establishmentId}/editar`;
                                                window.location.href = editUrl;
                                            }
                                        </script>
                                    </div>
                                    <a href="#" x-on:click="deleteEstablishment($event, establishment.id)"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">Excluir</a>

                                    <script>
                                        function deleteEstablishment(event, establishmentId) {
                                            event.preventDefault();
                                            
                                            if (confirm('Tem certeza que deseja excluir este estabelecimento?')) {
                                                // Use fetch ou uma solicitação AJAX para enviar uma solicitação DELETE para o servidor
                                                fetch(`/estabelecimentos/${establishmentId}/excluir`, {
                                                    method: 'DELETE',
                                                    headers: {
                                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                                        'Content-Type': 'application/json'
                                                    }
                                                })
                                                .then(response => {
                                                    if (response.ok) {
                                                        // Se a exclusão for bem-sucedida, redirecione para a página de índice
                                                        window.location.href = '{{ route("admin.establishments.index") }}';
                                                    } else {
                                                        // Se houver um erro na exclusão, exiba uma mensagem de erro
                                                        alert('Ocorreu um erro ao excluir o estabelecimento.');
                                                    }
                                                })
                                                .catch(error => {
                                                    console.error('Erro:', error);
                                                    alert('Ocorreu um erro ao excluir o estabelecimento.');
                                                });
                                            }
                                        }
                                    </script>

                                </div>
                            </td>
                            {{-- <td class="py-4 px-6" x-text="establishment.address"></td>
                            <td class="py-4 px-6" x-text="establishment.social_network"></td>
                            <td class="py-4 px-6" x-text="establishment.website"></td> --}}
                        </tr>
                    </template>

                </tbody>
            </table>
        </div>
    </section>

</x-app-layout>
