@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="col-md-12">
            <h2>Расходники</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="table-bordered__row" scope="col">Разрешено</th>
                        <th class="table-bordered__row" scope="col">Имя</th>
                        <th class="table-bordered__row" scope="col">Цена</th>
                        <th class="table-bordered__row" scope="col" width="13.3%">
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#adminModal">Добавить
                            </button>
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($consumables as $item)
                        <tr>
                            <td width="15% checkbox">
                                <div class="form-group">
                                    <input class="form-control" type="checkbox" name="allow" @if ($item->allow) checked @endif readonly>
                                </div>
                            </td>
                            <td>
                                {{ $item->name }}
                            </td>

                            <td width="15%">
                                {{ $item->price }}
                            </td>
                            <td>
                                <form action="{{ route('admin.destroy', ['id' => $item->id]) }}" method="POST">
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
    <div class="modal fade" id="adminModal" tabindex="-1" role="dialog" aria-labelledby="adminModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adminModalLabel">Добавить расходник</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="add-consumable" method="post" action="{{ route('admin.store') }}">
                    @csrf
                    <div class="modal-body">

                        <div class="input-group-text">
                            <label class="form-label">Разрешить расходник пользователю</label>
                            <input class="form-control" type="checkbox" name="allow" value="1" @if ($item->allow) checked @endif>
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="text" name="name" placeholder="Имя расходника">
                        </div>

                        <div class="form-group">
                            <input class="form-control" placeholder="Цена" type="number" name="price" min="0">
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
