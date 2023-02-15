<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Edição de Unidades') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Preencha os campos necessários.') }}
                        </p>
                    </header>
                    <form method="get" class="mt-6 space-y-6" wire:submit.prevent="verificar">
                        <div>
                            <label for="unidade">Unidade</label>
                            <select name="unidade" required wire:model="unidade" class="mt-1 block w-full">
                                <option value="" selected disabled>Selecione</option>
                                @foreach ($unidades as $unidade)
                                    <option value="{{$unidade->id }}" >{{ $unidade->id }} - {{ $unidade->cnpj }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-center gap-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">Editar Unidade</button>
                        </div>
                    </form>
                    <form method="puth" class="mt-6 space-y-6" wire:submit.prevent="edit">
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
                            <button type="submit" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">Editar Unidades</button>
                            @if (session('status') === 'concluida')
                            <div class="alert bg-green-100 rounded-lg py-5 px-6 mb-3 text-base text-green-700 inline-flex items-center w-full alert-dismissible fade show" role="alert">
                                <strong class="mr-1">Sucesso!</strong> {{ __('Editado') }}
                                <button wire:click='atualizarpagina' type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-green-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-green-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close">X</button>
                            </div>
                            @endif
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</div>