<x-app-layout>
    <x-header>
        <x-slot:title>Estabelecimentos</x-slot:title>
    </x-header>

    <x-alert-success />

    <section class="mt-12">
        <div class="mx-auto w-full">
            <div class="relative overflow-hidden">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 py-4">
                    <div class="w-full md:w-1/2">
                        <form id="searchForm" class="flex items-center" method="GET" action="{{ route('admin.establishments.index') }}">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                            </div>
                        </form>
                    </div>
                    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <div class="flex items-center space-x-3 w-full md:w-auto">
                            <a href="{{ route('admin.establishments.create') }}" class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                </svg>
                                Adicionar novo
                            </a>
                            <a href="#" class="flex items-center justify-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                                <svg class="w-4 h-4 mr-2 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                </svg>
                                Deteletar selecionados
                            </a>

                            <button id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                                <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewbox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                </svg>
                                Exportar
                                <svg class="ml-2 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                </svg>
                            </button>
                            <div id="actionsDropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="actionsDropdownButton">
                                    <li>
                                        <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Excel</a>
                                    </li>
                                </ul>
                                <div class="py-1">
                                    <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">PDF</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto" x-data="{ establishments: {{ @json_encode($establishments) }}, selectAll: false }">
                    @include('admin.establishments.partials.table', ['establishments' => $establishments])
                    {{-- <table class="w-full text-md text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-base text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-all-search" type="checkbox" x-model="selectAll"
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
                            </tr>
                        </thead>
                        <tbody>
                            <template x-for="establishment in establishments" :key="establishment.id">
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                    <td class="p-4 w-4">
                                        <div class="flex items-center">
                                        <input type="checkbox"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                :id="`checkbox-table-search-` + establishment.id"
                                                :checked="selectAll"> <label :for="`checkbox-table-search-` + establishment.id" class="sr-only">checkbox</label>
                                        </div>
                                    </td>
                                    <th scope="row"
                                        class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                        x-text="establishment.name">
                                    </th>
                                    <td class="py-4 px-6"
                                        x-text="establishment.type === 'crossfit' ? 'Crossfit' : (establishment.type === 'academia' ? 'Academia' : 'Personal Trainer')">
                                    </td>
                                    <td class="py-4 px-6" x-text="establishment.cnpj"></td>
                                    <td class="py-4 px-6" x-text="establishment.phone"></td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center">
                                            <div class="inline-block w-4 h-4 mr-2 rounded-full" x-bind:class="establishment.active ? 'bg-green-700' : 'bg-red-700'"></div>
                                            <span x-text="establishment.active ? 'Ativo' : 'Inativo'"></span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 flex items-center">
                                        <a href="#" x-on:click="viewEstablishment($event, establishment.id)" class="font-medium mr-3 text-green-600 dark:text-green-500 hover:underline">Gerenciar</a>
                                        <div x-data="{ selectedEstablishmentId: null }">
                                            <script>
                                                function viewEstablishment(event, establishmentId) {
                                                    event.preventDefault();
                                                    var editUrl = `{{ url('/estabelecimentos') }}/${establishmentId}/detalhes`;
                                                    window.location.href = editUrl;
                                                }
                                            </script>
                                        </div>
                                        <a href="#" x-on:click="editEstablishment($event, establishment.id)"
                                        class="font-medium mr-3 text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                                        <div x-data="{ selectedEstablishmentId: null }">
                                            <script>
                                                function editEstablishment(event, establishmentId) {
                                                    event.preventDefault();
                                                    var editUrl = `{{ url('/estabelecimentos') }}/${establishmentId}/editar`;
                                                    window.location.href = editUrl;
                                                }
                                            </script>
                                        </div>
                                        <a href="#" data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="font-medium text-red-600 dark:text-red-500 hover:underline">Excluir</a>
                                        
                                        <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative p-4 w-full max-w-md max-h-full">
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <div class="p-4 md:p-5 text-center">
                                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                        </svg>
                                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Você tem certeza que deseja excluir esse estabelecimento?</h3>
                                                        <button data-modal-hide="popup-modal"  x-on:click="deleteEstablishment($event, establishment.id)" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                            Sim, tenho certeza
                                                        </button>
                                                        <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Não, cancelar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            
                                        <script>
                                            function deleteEstablishment(event, establishmentId) {
                                                event.preventDefault();
                                
                                                fetch(`/estabelecimentos/${establishmentId}/excluir`, {
                                                        method: 'DELETE',
                                                        headers: {
                                                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                                            'Content-Type': 'application/json'
                                                        }
                                                    })
                                                    .then(response => {
                                                        if (response.ok) {
                                                            window.location.href = '{{ route('admin.establishments.index') }}';
                                                        } else {
                                                            alert('Ocorreu um erro ao excluir o estabelecimento.');
                                                        }
                                                    })
                                                    .catch(error => {
                                                        console.error('Erro:', error);
                                                        alert('Ocorreu um erro ao excluir o estabelecimento.');
                                                    });
                                            }
                                        </script>
                                    </td>
                                </tr>
                            </template>

                        </tbody>
                    </table> --}}
                </div>
                {{-- <nav class="flex flex-col items-start justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0"
                     aria-label="Table navigation">
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                        Exibindo
                        <span class="font-semibold text-gray-900 dark:text-white">1-10</span>
                        de
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
                </nav> --}}
                <nav id="pagination" class="flex flex-col items-start justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0" aria-label="Table navigation">
                    {{ $establishments->links() }}
                </nav>
            </div>
        </div>
    </section>

    @push('head')
    @endpush

    @push('footer')
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script>

        function viewEstablishment(event, establishmentId) {
            event.preventDefault();
            var editUrl = `{{ url('/estabelecimentos') }}/${establishmentId}/detalhes`;
            window.location.href = editUrl;
        }

        function editEstablishment(event, establishmentId) {
            event.preventDefault();
            var editUrl = `{{ url('/estabelecimentos') }}/${establishmentId}/editar`;
            window.location.href = editUrl;
        }

        function deleteEstablishment(event, establishmentId) {
            event.preventDefault();

            fetch(`/estabelecimentos/${establishmentId}/excluir`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => {
                    if (response.ok) {
                        window.location.href = '{{ route('admin.establishments.index') }}';
                    } else {
                        alert('Ocorreu um erro ao excluir o estabelecimento.');
                    }
                })
                .catch(error => {
                    console.error('Erro:', error);
                    alert('Ocorreu um erro ao excluir o estabelecimento.');
                });
        }

        function generateTable(establishments) {
            if (!establishments || !Array.isArray(establishments)) {
                return `<p>No establishments found.</p>`;
            }

            let tableHTML = `
                <table class="w-full text-md text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-base text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                <input type="checkbox" x-model="selectAll" class="text-primary-500 rounded focus:ring-primary-500">
                            </th>
                            <th scope="col" class="px-6 py-3">Nome</th>
                            <th scope="col" class="px-6 py-3">Tipo</th>
                            <th scope="col" class="px-6 py-3">CNPJ</th>
                            <th scope="col" class="px-6 py-3">Telefone</th>
                            <th scope="col" class="px-6 py-3">Endereço</th>
                            <th scope="col" class="px-6 py-3">Editar</th>
                            <th scope="col" class="px-6 py-3">Excluir</th>
                        </tr>
                    </thead>
                    <tbody>`;

            establishments.forEach(establishment => {
                tableHTML += `
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            <input type="checkbox" class="text-primary-500 rounded focus:ring-primary-500">
                        </td>
                        <td class="px-6 py-4">${establishment.name}</td>
                        <td class="px-6 py-4">${establishment.type}</td>
                        <td class="px-6 py-4">${establishment.cnpj}</td>
                        <td class="px-6 py-4">${establishment.phone}</td>
                        <td class="px-6 py-4">${establishment.address}</td>
                        <td class="px-6 py-4">
                            <a href="/admin/establishments/${establishment.id}/edit" class="text-blue-600 hover:underline">Editar</a>
                        </td>
                        <td class="px-6 py-4">
                            <form action="/admin/establishments/${establishment.id}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Excluir</button>
                            </form>
                        </td>
                    </tr>`;
            });

            tableHTML += `</tbody></table>`;
            return tableHTML;
        }


        $(document).ready(function() {
            function fetch_data(query = '', page = 1) {
                $.ajax({
                    url: "{{ route('admin.establishments.index') }}",
                    method: 'GET',
                    data: { search: query, page: page },
                    success: function(data) {
                        $('#table-container').html(generateTable(data.establishments));
                        $('#pagination').html(data.pagination);
                    }
                });
            }

            $('#searchForm').on('submit', function(event) {
                event.preventDefault();
                fetch_data($('#simple-search').val());
            });

            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                fetch_data($('#simple-search').val(), page);
            });

            fetch_data();
        });

    </script>
    @endpush

</x-app-layout>