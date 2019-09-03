<div class="form-group">
    <label for="data_lancamento" class="control-label">Data Lancamento</label>
    <input type="text" id="data_lancamento" class="form-control" placeholder="00/00/0000" name="data_lancamento" value="{{$despesa->data_lancamento ?? date('d/m/Y')}}" required>
</div>
<div class="form-group">
    <label for="name" class="control-label">Nome</label>
    <input type="text" id="name" class="form-control" name="name" placeholder="Nome" value="{{$despesa->name ?? ''}}" required autofocus autocomplete="off">
</div>
<div class="form-group">
    <label for="valor" class="control-label">Valor</label>
    <input type="number" id="valorvalor" class="form-control" name="valor" placeholder="0000,00" value="{{$despesa->valor?? ''}}" required step="any">
</div>
<div class="form-group">
    <label for="valor" class="control-label">Categoria</label>
    <select name="category_id" id=""  class="form-control">
        @if(count($categories)>0)
            <option value="0">Categoria</option>
        @endif
        @foreach($categories as $category)
            @if(isset($despesa))
                @if($despesa->category_id == $category->id )
                    <option selected value="{{$category->id}}">{{$category->name}}</option>
                @else
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endif
            @else
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endif
        @endforeach
    </select>
</div>
