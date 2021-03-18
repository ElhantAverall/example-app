@extends('layouts.app')

@section('admin')


    <div class="row">
        <div class="col-md-12">
            <h2>Расходники</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="table-bordered__row" scope="col">#</th>
                        <th class="table-bordered__row" scope="col">Имя</th>
                        <th class="table-bordered__row" scope="col">Цена</th>
                        <th class="table-bordered__row" scope="col" width="13.3%">
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#exampleModal">Добавить
                            </button>
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($consumables as $consumable)
                        <tr>
                            <td scope="row">
                                {{ $consumable->id }}
                            </td>
                            <td>
                                {{ $consumable->name }}
                            </td>

                            <td width="15%">
                                {{ $consumable->price }}
                            </td>
                            <td>
                                <form action="{{ route('consumable.destroy', ['id' => $consumable->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger remove">Удалить</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="adminModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adminModalLabel">Добавить расходник</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="add-consumable" method="post" action="{{ route('consumable.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <select class="custom-select" name="name">
                                <option value="" selected>Выберите расходник</option>
                                @foreach ($consumable as $item)
                                    <option option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="text" name="price" placeholder="Цена" readonly
                                class="form-control" type="number" readonly name="price" value="{{ $item->price }}">
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    <button form="add-consumable" type="submit" class="btn btn-primary">Добавить</button>
                </div>
            </div>
        </div>

    @endsection
