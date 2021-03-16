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
            <button class="btn btn-danger remove" type="button">Удалить</button>
        </td>
    </tr>
@endforeach

<button class="btn btn-warning" type="submit">Сохранить</button>
