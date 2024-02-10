<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Cabeçalho
        </h2>
    </x-slot>

    <div class="container py-4 ">
        <div class="row">
            <div class="col sm-12">
                <p class="alert alert-info">Teste de página home</p>
            </div>
        </div>
    </div>

    <div class="container py-4" >
        <p class="text-decoration-underline">This text has a line underneath it.</p>
        <p class="text-decoration-line-through">This text has a line going through it.</p>
        <a href="#" class="text-decoration-none">This link has its text decoration removed</a>
    </div>

</x-app-layout>