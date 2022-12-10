<div>@extends('layouts.layout')
@section('content')
<form>
    <div class="card">
        <div class="card-header">
            Envio de Email
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <label for="assunto" class="form-label">Assunto</label>
                <input type="text" class="form-control" id="assunto" placeholder="Assunto" required>
            </div>
            <div class="mb-3">
                <label for="mensagem" class="form-label">Mensagem</label>
                <textarea class="form-control" id="mensagem" rows="3" required></textarea>
            </div>
        </div>
        <div class="footer">
            <button class="btn btn-primary m-3" type="submit">Enviar</button>  
        </div>
    </div>
</form>
@endsection
</div>