<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Criação de Funcionários') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Preencha os campos necessários.') }}
                        </p>
                    </header>
                    <form method="get" class="mt-6 space-y-6" wire:submit.prevent="buscacep">
                        <h3 class="text-lg font-medium text-gray-900">
                            {{ __('Endereço') }}
                        </h3>
                        <div>
                            <label for="cep">CEP</label>
                            <input id="cep" name="cep" type="text" class="mt-1 block w-full" maxlength="8"
                                wire:model="cep" required autofocus />
                        </div>
                        <div class="flex items-center gap-4">
                            <button type='submit' class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">Buscar CEP</button>
                            @if (session('status') === 'sem-cep')
                                <div class="alert bg-yellow-100 rounded-lg py-5 px-6 mb-3 text-base text-yellow-700 inline-flex items-center w-full alert-dismissible fade show" role="alert">
                                    <strong class="mr-1">Erro!</strong> {{ __('CEP não encontrado.') }}
                                    <button wire:click='atualizarpagina' type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-yellow-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close">X</button>
                                </div>
                            @endif
                        </div>
                    </form>
                    <form method="post" class="mt-6 space-y-6" wire:submit.prevent="create">
                        <div>
                            <label for="rua">Rua</label>
                            <input id="rua" name="rua" type="text" class="mt-1 block w-full"
                                maxLength="255" wire:model="rua" required />
                        </div>
                        <div>
                            <label for="numero">Número</label>
                            <input id="numero" name="numero" type="text" class="mt-1 block w-full"
                                maxLength="255" wire:model="numero" required />
                        </div>
                        <div>
                            <label for="complemento">Complemento</label>
                            <input id="complemento" name="complemento" type="text" class="mt-1 block w-full"
                                maxLength="255" wire:model="complemento"/>
                        </div>
                        <div>
                            <label for="bairro">Bairro</label>
                            <input id="bairro" name="bairro" type="text" class="mt-1 block w-full"
                                maxLength="255" wire:model="bairro" required />
                        </div>
                        <div>
                            <label for="cidade">Cidade</label>
                            <input id="cidade" name="cidade" type="text" class="mt-1 block w-full"
                                maxLength="255" wire:model="cidade" required />
                        </div>
                        <div>
                            <label for="estado">Estado</label>
                            <input id="estado" name="estado" type="text" class="mt-1 block w-full"
                                maxLength="255" wire:model="estado" required />
                        </div>
                        <h3 class="text-lg font-medium text-gray-900">
                            {{ __('Dados do Funcionário') }}
                        </h3>
                        <div>
                            <label for="nome">Nome</label>
                            <input id="nome" name="nome" type="text" class="mt-1 block w-full" maxlength="255"
                                wire:model="nome" required autofocus />
                        </div>
                        <div>
                            <label for="email">E-mail</label>
                            <input id="email" name="email" type="email" class="mt-1 block w-full"
                                maxLength="50" wire:model="email" required />
                        </div>
                        <div>
                            <label for="data_nascimento">Data Nascimento</label>
                            <input id="data_nascimento" name="data_nascimento" type="date" class="mt-1 block w-full"
                                maxLength="255" wire:model="data_nascimento" required max="{{ date('Y-m-d') }}"/>
                        </div>
                        <div>
                            <label for="idade">Idade</label>
                            <input id="idade" name="idade" type="number" class="mt-1 block w-full"
                            wire:model="idade" required/>
                        </div>
                        <div>
                            <label for="documento">Documento (CPF)</label>
                            <input id="documento" name="documento" type="text" class="mt-1 block w-full"
                                maxLength="11" wire:model="documento" required />
                        </div>
                        <div>
                            <label for="unidade_id">Unidade</label>
                            <select name="unidade_id" required wire:model="unidade_id" class="mt-1 block w-full">
                                <option value="" selected disabled>Selecione</option>
                                @foreach ($unidades as $unidade)
                                    <option value="{{ $unidade->id  }}">{{ $unidade->id }} - {{ $unidade->cnpj }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-center gap-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">Criar Funcionário</button>
                            @if (session('status') === 'concluida')
                            <div class="alert bg-green-100 rounded-lg py-5 px-6 mb-3 text-base text-green-700 inline-flex items-center w-full alert-dismissible fade show" role="alert">
                                <strong class="mr-1">Sucesso!</strong> {{ __('Criado') }}
                                <button wire:click='atualizarpagina' type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-green-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-green-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close">X</button>
                            </div>
                            @endif
                            @if (session('status') === 'negada-existente')
                                <div class="alert bg-yellow-100 rounded-lg py-5 px-6 mb-3 text-base text-yellow-700 inline-flex items-center w-full alert-dismissible fade show" role="alert">
                                    <strong class="mr-1">Erro!</strong> {{ __('Documento já cadastrado') }}
                                    <button wire:click='atualizarpagina' type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-yellow-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close">X</button>
                                </div>
                            @endif
                        </div>
                    </form>
                    <br>
                    <h2><b>Funcionários</b></h2>
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
                                        <b>NOME</b>
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-grady-500 uppercase tracking-wider">
                                        <b>DOCUMENTO</b>
                                    </th>
                                    <th
                                    class="px-6 py-3 text-left text-xs font-medium text-grady-500 uppercase tracking-wider">
                                    <b>ID UNIDADE</b>
                                </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($funcionarios as $funcionario)
                                    <tr>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                            {{ $funcionario->id }}</td>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                            {{ $funcionario->nome }}</td>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                            {{ $funcionario->documento }}</td>
                                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                            {{ $funcionario->unidade_id }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </section>
            </div>
        </div>
    </div>
</div>
