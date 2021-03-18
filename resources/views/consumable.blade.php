@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="col-md-12">
            <h2>Расходники</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="table-bordered__row" scope="col">#</th>
                        <th class="table-bordered__row" scope="col">Имя</th>
                        <th class="table-bordered__row" scope="col">Цена</th>
                        <th class="table-bordered__row" scope="col">Количество</th>
                        <th class="table-bordered__row" scope="col" width="17.3%">
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#exampleModal">Добавить
                            </button>
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($reports as $report)
                        <tr>
                            <td scope="row">
                                {{ $report->id }}
                            </td>
                            <td>
                                {{ $report->name }}
                            </td>

                            <td width="15%">
                                {{ $report->price }}
                            </td>

                            <td class="count">
                                {{ $report->count }}
                            </td>
                            <td>
                                <form action="{{ route('consumable.destroy', ['id' => $report->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger remove">Удалить</button>

                                </form>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit">Edit
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    <!-- Modal add -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="consumableModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="consumableModalLabel">Выберите расходник</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="send-consumable" method="post" action="{{ route('consumable.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <select class="custom-select" id="add-select" name="name">
                                <option value="" selected>Выберите расходник</option>
                                @foreach ($consumable as $item)
                                    <option option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <input class="form-control" id="price" placeholder="Цена" type="number" readonly name="price"
                                value="{{ $item->price }}">
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="number" name="count" placeholder="Количество" min="0">
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    <button form="send-consumable" type="submit" class="btn btn-primary">Добавить</button>
                </div>
            </div>
        </div>

        {{-- Есть пару идей как сделать в одном модальном окне --}}

        <!-- Modal edit -->
        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Выберите расходник</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="editForm" method="post" action="{{ route('consumable.destroy', ['id' => $report->id]) }}">
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
                                <input class="form-control" placeholder="Цена" type="number" readonly name="price"
                                    value="{{ $item->price }}">
                            </div>

                            <div class="form-group">
                                <input class="form-control" type="number" name="count" placeholder="Количество" min="0">
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        <button form="edit-consumable" type="submit" class="btn btn-primary">Редактировать</button>
                    </div>
                </div>
            </div>

        @endsection
