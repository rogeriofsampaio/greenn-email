@extends('components.layouts.layout')
@section('content')
    <div class="containder mt-4">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#emailModal">
            Novo e-mail
        </button>

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <table class="table table-hover mt-4">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">E-MAIL</th>
                    <th scope="col">ASSUNTO</th>
                    <th scope="col">MENSAGEM</th>
                    <th scope="col">DATA</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @if (!empty($emails))
                    @foreach ($emails as $email)
                        <tr>
                            <th scope="row">{{ $email->id }}</th>
                            <td>{{ $email->email }}</td>
                            <td>{{ $email->subject }}</td>
                            <td>{{ $email->message }}</td>
                            <td>{{ $email->created_at }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr class="text-center">
                        <td colspan="5">Nenhum registro encontrado</td>
                    </tr>
                @endif
            </tbody>
        </table>

        <div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="emailModalLabel" aria-hidden="true">
            <form method="post" action="{{ route('email.store') }}">
                @csrf
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="emailModalLabel">E-mail</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Assunto</label>
                                <input type="text" class="form-control" id="subject" name="subject"
                                    placeholder="Assunto" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Mensagem</label>
                                <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection