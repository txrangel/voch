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
                            <select name="unidade" required wire:model="unidade">
                                <option value="" selected disabled>Selecione</option>
                                @foreach ($unidades as $unidade)
                                    <option {{ $unidade->id }}>{{ $unidade->id }} - {{ $unidade->cnpj }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-center gap-4">
                            <button type="submit" class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">Deletar Unidade</button>
                            @if (session('status') === 'concluida')
                                <div class="bg-lime-400">
                                    <p
                                        class="inline-flex items-center px-4 py-2 bg-lime-500 border border-transparent font-semibold text-xs text-white uppercase tracking-widest">
                                        <b>{{ __('Deletado.') }}</b>
                                    </p>
                                </div>
                            @endif
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</div>