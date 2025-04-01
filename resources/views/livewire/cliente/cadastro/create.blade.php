<div class="mt-5">

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

    <div class="card">
        <h5 class="card-header text-center">Cadastro de Clientes</h5>

        <div class="card-body">
            <form wire:submit.prevent="cadastrarCliente">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex: João Ferrão"
                        wire:model.defer="nome">
                        @error('nome')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
                </div>


                <div class="mb-3">
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Ex: Rua Frederico 20-12"
                        wire:model.defer="endereco">
                        @error('endereco')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
                </div>


                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Ex: (**) *****-****"
                        wire:model.defer="telefone">
                        @error('telefone')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
                </div>


                <div class="mb-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="**********"
                        wire:model.defer="cpf">
                        @error('cpf')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
                </div>

                <div class="mb-3">
                    <label for="email" >Email</label>
                    <input type="email" name="email" id="email"
                        class="form-control" wire:model.defer="email"
                        placeholder="Ex: enzo@gmail.com">
                        @error('email')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" id="password" wire:model="password" class="form-control"
                        placeholder="Digite sua senha">
                    @error('password')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
                

                <div class="mb-3">
                    <button type="submit" class="btn btn-dark">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>