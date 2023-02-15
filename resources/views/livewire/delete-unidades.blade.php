<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Exclusão de Unidades') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Preencha os campos necessários.') }}
                        </p>
                    </header>
                    <form method="delete" class="mt-6 space-y-6" wire:submit.prevent="delete">
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
                            <button type="submit" class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">Excluir Unidades</button>
                            @if (session('status') === 'concluida')
                            <div class="alert bg-green-100 rounded-lg py-5 px-6 mb-3 text-base text-green-700 inline-flex items-center w-full alert-dismissible fade show" role="alert">
                                <strong class="mr-1">Sucesso!</strong> {{ __('Excluido') }}
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