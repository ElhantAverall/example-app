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
        <form method="post"" action=" {{ route('consumable.update', ['report' => $report->id]) }}">
            @method('put')
            @csrf
            <tbody>
                <tr>
                    <td>
                        <select class="custom-select" id="add-select" name="name">
                            @foreach ($consumable as $item)
                                <option label="{{ $item->name }}" value="{{ $item->name }}">{{ $item->price }}
                                </option>
                            @endforeach
                        </select>
                    </td>

                    <td>
                        <input class="form-control price" placeholder="Цена" type="number" readonly name="price"
                            value="{{ old('price') ?? $report->price }}">
                    </td>
                    <td>

                        <input class="form-control" type="number" name="count" placeholder="Количество" min="1"
                            value="{{ old('count') ?? $report->count }}">
                    </td>
                </tr>
                <button class="btn btn-warning">Сохранить</button>
            </tbody>

        </form>
    </table>

@endsection
