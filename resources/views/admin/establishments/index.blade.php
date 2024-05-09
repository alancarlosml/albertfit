<x-app-layout>
    <x-header>
        <x-slot:title>Estabelecimentos</x-slot:title>
    </x-header>

    <section class="mt-12">
        <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
            <div class="relative overflow-hidden">
                <div
                     class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                    <div class="flex items-center flex-1 space-x-4">
                        <h5>
                            <span class="text-gray-500">Total:</span>
                            <span class="text-gray-500" x-text="establishments.size"></span>
                        </h5>
                    </div>
                    <div
                         class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">
                         <a href="{{ route('admin.establishments.create') }}" class="mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Adicionar Novo</a>
                        <button type="button"
                                class="flex items-center justify-center flex-shrink-0 px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                 fill="none" viewbox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                            </svg>
                            Update stocks 1/250
                        </button>
                        <button type="button"
                                class="flex items-center justify-center flex-shrink-0 px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewbox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                            </svg>
                            Export
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto" x-data="{ establishments: {{ @json_encode($establishments) }} }">
                    <table class="w-full text-md text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-base text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
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
                                    <td class="py-4 px-6"
                                        x-text="establishment.type === 'crossfit' ? 'Crossfit' : (establishment.type === 'academia' ? 'Academia' : 'Personal Trainer')">
                                    </td>
                                    <td class="py-4 px-6" x-text="establishment.owner"></td>
                                    <td class="py-4 px-6" x-text="establishment.cnpj"></td>
                                    <td class="py-4 px-6" x-text="establishment.phone"></td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center">
                                            <div class="inline-block w-4 h-4 mr-2 rounded-full" x-bind:class="establishment.active ? 'bg-green-700' : 'bg-red-700'"></div>
                                            <span x-text="establishment.active ? 'Ativo' : 'Inativo'"></span>
                                        </div>
                                    </td>
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
                                                                    window.location.href = '{{ route('admin.establishments.index') }}';
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
                <nav class="flex flex-col items-start justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0"
                     aria-label="Table navigation">
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                        Showing
                        <span class="font-semibold text-gray-900 dark:text-white">1-10</span>
                        of
                        <span class="font-semibold text-gray-900 dark:text-white">1000</span>
                    </span>
                    <ul class="inline-flex items-stretch -space-x-px">
                        <li>
                            <a href="#"
                               class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                <span class="sr-only">Previous</span>
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                          clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                               class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                        </li>
                        <li>
                            <a href="#"
                               class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                        </li>
                        <li>
                            <a href="#" aria-current="page"
                               class="z-10 flex items-center justify-center px-3 py-2 text-sm leading-tight border text-primary-600 bg-primary-50 border-primary-300 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                        </li>
                        <li>
                            <a href="#"
                               class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
                        </li>
                        <li>
                            <a href="#"
                               class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
                        </li>
                        <li>
                            <a href="#"
                               class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                <span class="sr-only">Next</span>
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                          clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>

</x-app-layout>
