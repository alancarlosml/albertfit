<x-app-layout>
    <x-header>
        <x-slot:title>Editar Estabelecimento</x-slot:title>
    </x-header>

    <section class="mt-12">
        <div class="max-w-6xl mx-auto bg-white dark:bg-gray-900 p-6">

            <form action="{{ route('admin.establishments.update', $establishment->id) }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                    <input type="text" name="name" id="name" value="{{ $establishment->name }}" class="mt-1 p-2 border rounded-md w-full">
                </div>

                <div class="mb-4">
                    <label for="type" class="block text-sm font-medium text-gray-700">Tipo</label>
                    <select name="type" id="type" class="mt-1 p-2 border rounded-md w-full">
                        @foreach($types as $type)
                            <option value="{{ $type }}" {{ $establishment->type == $type ? 'selected' : '' }}>{{ $type }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="owner" class="block text-sm font-medium text-gray-700">Proprietário</label>
                    <input type="text" name="owner" id="owner" value="{{ $establishment->owner }}" class="mt-1 p-2 border rounded-md w-full">
                </div>

                <div class="mb-4">
                    <label for="cnpj" class="block text-sm font-medium text-gray-700">CNPJ</label>
                    <input type="text" name="cnpj" id="cnpj" value="{{ $establishment->cnpj }}" class="mt-1 p-2 border rounded-md w-full">
                </div>

                <!-- Adicione mais campos conforme necessário para editar outros detalhes do estabelecimento -->

                <div class="mt-4 flex justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md">Salvar Alterações</button>
                    <a href="{{ route('admin.establishments.index') }}" class="ml-4 mt-2 text-gray-500 hover:text-gray-600">Cancelar</a>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>
