<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Criação de Unidades') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Preencha os campos necessários.') }}
                        </p>
                    </header>

                    <form method="post" class="mt-6 space-y-6" wire:submit.prevent="create">
                        <div>
                            <label for="cnpj">CNPJ</label>
                            <input id="cnpj" name="cnpj" type="text" class="mt-1 block w-full" maxlength="14"
                                wire:model="cnpj" required autofocus />
                        </div>
                        <div>
                            <label for="razao_social">Razão Social</label>
                            <input id="razao_social" name="razao_social" type="text" class="mt-1 block w-full"
                                maxLength="255" wire:model="razao_social" required />
                        </div>
                        <div>
                            <label for="nome_fantasia">Nome Fantasia</label>
                            <input id="nome_fantasia" name="nome_fantasia" type="text" class="mt-1 block w-full"
                                maxLength="255" wire:model="nome_fantasia" required />
                        </div>
                        <div class="flex items-center gap-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">Criar Unidades</button>
                            @if (session('status') === 'concluida')
                            <div class="alert bg-green-100 rounded-lg py-5 px-6 mb-3 text-base text-green-700 inline-flex items-center w-full alert-dismissible fade show" role="alert">
                                <strong class="mr-1">Sucesso!</strong> {{ __('Criado') }}
                                <button wire:click='atualizarpagina' type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-green-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-green-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close">X</button>
                            </div>
                            @endif
                            @if (session('status') === 'negada-existente')
                                <div class="alert bg-yellow-100 rounded-lg py-5 px-6 mb-3 text-base text-yellow-700 inline-flex items-center w-full alert-dismissible fade show" role="alert">
                                    <strong class="mr-1">Erro!</strong> {{ __('CNPJ já cadastrado') }}
                                    <button wire:click='atualizarpagina' type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-yellow-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close">X</button>
                                </div>
                            @endif
                        </div>
                    </form>
                    <br>
                    <h2><b>Unidades</b></h2>
                    <div class="mt-6">
                        <table class="w-full divide-y divide-gray-200">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-grady-500 uppercase tracking-wider">
                                        <b>ID</b>
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-grady-500 uppercase tracking-wider">
                                        <b>CNPJ</b>
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-grady-500 uppercase tracking-wider">
                                        <b>RAZÃO SOCIAL</b>
                                    </th>
                                    <th
                                    class="px-6 py-3 text-left text-xs font-medium text-grady-500 uppercase tracking-wider">
                                    <b>NOME FANTASIA</b>
                                </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($unidades as $unidade)
                                    <tr>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                            {{ $unidade->id }}</td>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                            {{ $unidade->cnpj }}</td>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                            {{ $unidade->razao_social }}</td>
                                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                            {{ $unidade->nome_fantasia }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </section>
            </div>
        </div>
    </div>
</div>
