@extends('user.layouts.app')

@section('title', 'Kontak')

@section('content')
<style>
    .contact-form {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        padding: 2rem;
    }
    .form-control:focus {
        border-color: #0d6efd;
