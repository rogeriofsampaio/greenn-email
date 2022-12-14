@extends('components.layouts.layout')
@section('content')
  <p>E-mail: {{ $emailData['email'] }}</p>
  <p>Assunto: {{ $emailData['subject'] }}</p>
  <p>Mensagem: {{ $emailData['message'] }}</p>
@endsection