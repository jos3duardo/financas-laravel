<div class="form-group">
    <label for="data_lancamento" class="control-label">Data Lancamento</label>
    <input type="text" id="data_lancamento" class="form-control" placeholder="00/00/0000" name="data_lancamento" value="{{$receita->data_lancamento ?? date('d/m/Y')}}" required>
</div>
<div class="form-group">
    <label for="name" class="control-label">Nome</label>
    <input type="text" id="name" class="form-control" name="name" placeholder="Nome" value="{{$receita->name ?? ''}}" required autofocus autocomplete="off">
</div>
<div class="form-group">
    <label for="valor" class="control-label">Valor</label>
    <input type="number" id="valorvalor" class="form-control" name="valor" placeholder="0000,00" value="{{$receita->valor?? ''}}" required step="any">
</div>
