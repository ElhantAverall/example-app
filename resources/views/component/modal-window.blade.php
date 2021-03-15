<div class="row">
    <!-- Modal -->
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
<form method="post" action="/">
   <div class="modal-body">
       <div class="form-group">
           <select class="custom-select" name="name">
               <option value="" selected>Выберите расходник</option>
               @foreach ($consumable as $item)
                   <option value="{{ $item->name }}">{{ $item->name }}</option>
               @endforeach
           </select>
       </div>

       <div class="form-group">
           <input class="form-control" type="text" name="price" placeholder="Цена" readonly>
       </div>

       <div class="form-group">
           <input class="form-control" type="number" name="count" placeholder="Количество" min="0">
       </div>
   </div>
</form>
<div class="modal-footer">
   <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
   <button type="submit" class="btn btn-primary">Добавить</button>
</div>
</div>
</div>
</div>
