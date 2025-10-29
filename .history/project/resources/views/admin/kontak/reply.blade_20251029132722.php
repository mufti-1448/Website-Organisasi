@extends('admin.layouts.app')

@section('content')
    <style>
        .message-card {
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
            border: none;
        }

        .incoming-message {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-left: 4px solid #0d6efd;
        }

        .reply-form-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            border-left: 4px solid #198754;
        }

        .message-header {
            font-weight: 600;
            color: #495057;
        }

        .message-content {
            line-height: 1.6;
            color: #212529;
        }

        .message-meta {
            font-size: 0.875rem;
            color: #6c757d;
        }

        .form-control-custom {
            border-radius: 8px;
