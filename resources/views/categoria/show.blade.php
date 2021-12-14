
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $categoria->name ?? 'Show Categoria' }}
        </h2>
    </x-slot>


    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Categoria</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('categoria.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $categoria->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Slug:</strong>
                            {{ $categoria->slug }}
                        </div>
                        <div class="form-group">
                            <strong>Img:</strong>
                            {{ $categoria->img }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
