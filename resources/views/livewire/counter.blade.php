@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h2>Расходники</h2>
                <form method="post" action="store">
                    @csrf
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="table-bordered__row" scope="col">#</th>
                            <th class="table-bordered__row" scope="col">Имя</th>
                            <th class="table-bordered__row" scope="col">Цена</th>
                            <th class="table-bordered__row" scope="col">Количество</th>
                            <th class="table-bordered__row" scope="col" width="13.3%">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Добавить
                                </button>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                <livewire:post-component>

                </tbody>
            </table>

            </div>
        </div>

        <livewire:modal-component>

        </div>
    </div>

@endsection
