<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>
<div class="container">

    <div class="table-responsive">
        <form method="post" id="dynamic_form">
            <span id="result"></span>
            <table class="table table-bordered" id="user_table">
                <thead>
                <tr>
                    <th width="55%">Наименование</th>
                    <th width="15%">Цена</th>
                    <th width="15%">Количество</th>
                    <th width="35%">Действие</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                <tr>
                    <td colspan="3" align="right">&nbsp;</td>
                    <td>
                        @csrf
                        <input type="submit" name="save" id="save" class="btn btn-primary" value="Сохранить"/>
                    </td>
                </tr>
                </tfoot>
            </table>
        </form>
    </div>
</div>
<td><select  class="custom-select">' +
        "@foreach($consumable as $key )" +
        '<option wire:model="all" value="">{{ $key -> name}}</option>' +
        "@endforeach" +
        '</select>
</td>'

</body>
</html>

<script>
    $(document).ready(function () {

        var count = 1;

        consumableAddRow(count);

        // я даже не знаю как это описать
        function consumableAddRow(number) {
            // Не бейте пожалуйста
            html = '<tr>';
            html += '<td><select wire:model.lazy="all" class="custom-select">' +
                "@foreach($consumable as $key )" +
                '<option value="">{{ $key -> name}}</option>' +
                "@endforeach" +
                '</select></td>';
            html += '<td class="price">' +
                "{{$consumable[0]-> id}}" +
                '</td>';
            html += '<td><input type="number" class="form-control" min="0" /></td>';
            if (number > 1) {
                html += '<td><button type="button" name="remove" class="btn btn-danger remove">Удалить</button></td></tr>';
                $('tbody').append(html);
            } else {
                html += '<td><button type="button" name="add" class="btn btn-success add">Добавить</button></td></tr>';
                $('tbody').html(html);
            }
        }

        // добавим row
        $(document).on('click', '.add', function () {
            count++;
            consumableAddRow(count);
        });
        // удалим row
        $(document).on('click', '.remove', function () {
            count--;
            $(this).closest("tr").remove();
        });

        // ajax обновление цены при выборе option

        $('.custom-select').on('change', function (event) {
            let cat_id = $(':selected').text();
            console.log(cat_id);

        })
    });
</script>
