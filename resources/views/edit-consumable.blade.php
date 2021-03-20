@extends('layouts.app')

@section('content')

    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="table-bordered__row" scope="col">Имя</th>
                <th class="table-bordered__row" scope="col">Цена</th>
                <th class="table-bordered__row" scope="col">Количество</th>
            </tr>
        </thead>
        <form method="post" action="{{ route('consumable.update', ['id' => $reports[id]]) }}">
            @csrf
            <tbody>
                @foreach ($reports as $report)
                    <tr>
                        <td>
                            <select class="custom-select" id="add-select" name="name">
                                <option value="" selected>Выберите расходник</option>
                                @foreach ($consumable as $item)
                                    <option label="{{ $item->name }}" value="{{ $item->name }}">{{ $item->price }}
                                    </option>
                                @endforeach
                            </select>
                        </td>

                        <td>
                            <input class="form-control price" placeholder="Цена" type="number" readonly name="price" </td>

                        <td>
                            <input class="form-control" type="number" name="count" placeholder="Количество" min="1"
                                value="{{ $report->count }}">
                        </td>

                    </tr>
                @endforeach
            </tbody>
            <button class="btn btn-warning" type="submit">Сохранить</button>
        </form>
    </table>

@endsection
