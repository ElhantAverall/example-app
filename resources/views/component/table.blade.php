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
                <button type="button" name="add" class="btn btn-success add">Добавить</button>
            </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td scope="row">1</td>
            <td>
                <select class="form-control" wire:model="selectedName" name="name">
                    <option value="" selected>Выберите расходник</option>
                    @foreach ($consumable as $item)
                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </td>

            <td width="15%">
                <input class="form-control" type="number" readonly name="price"
                       {{--           /перебирать конечно не очень круто--}}
                       @if (!is_null($selectedName))
                       @foreach($consumable as $item)
                       @if($item -> name  == $selectedName)
                       value="{{ $item -> price }}"
                    @endif
                    @endforeach
                    @endif
                />
            </td>

            <td class="count">
                <input class="form-control" type="number" name="count" min="1" value="1">
            </td>
            <th>
                <button class="btn btn-danger remove" type="button">Удалить</button>
            </th>
        </tr>

        </tbody>
    </table>
    <button class="btn btn-warning" type="submit">Сохранить</button>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        // удалим row
        $(document).on('click', '.remove', function () {
            $(this).closest("tr").remove();
        });
    {{--    var count = 1;--}}
    {{--    var i = 1;--}}
    {{--    consumableAddRow(count);--}}

    {{--    function consumableAddRow(number) {--}}
    {{--        --}}
    {{--         // немного волшебства--}}
    {{--        html = `<tr><td scope="row">${i}</td><td> ` +--}}
    {{--            `<select class="form-control" wire:model="selectedName${i++}" name="name">` +--}}
    {{--            '<option value="" selected>Выберите расходник</option>' +--}}
    {{--            '@foreach ($consumable as $item) ' +--}}
    {{--            '<option value="{{ $item->name }}">{{ $item->name }}</option>' +--}}
    {{--            '@endforeach ' +--}}
    {{--            '</select> ' +--}}
    {{--            '</td>'--}}

    {{--        html += '<td width="15%"> ' +--}}
    {{--            '<input class="form-control" type="number" readonly name="price"' +--}}
    {{--            '@if (!is_null($selectedName))' +--}}
    {{--            '@foreach($consumable as $item)' +--}}
    {{--            '@if($item -> name  == $selectedName)' +--}}
    {{--            'value="{{ $item -> price }}"' +--}}
    {{--            '@endif @endforeach @endif /> </td>'--}}

    {{--        html += '<td class="count"> ' +--}}
    {{--            '<input class="form-control" type="number" name="count" min="1" value="1"> </td>';--}}
    {{--        if (number > 1) {--}}
    {{--            html += '<td> <button class="btn btn-danger remove" type="button">Удалить</button> </td> </tr>';--}}
    {{--            $('tbody').append(html);--}}
    {{--        }--}}
    {{--    }--}}

    {{--    // добавим row--}}
    {{--    $(document).on('click', '.add', function () {--}}
    {{--        count++;--}}
    {{--        consumableAddRow(count);--}}
    {{--    });--}}

    });

</script>
<script src="{{ asset('js/app.js') }}"></script>




