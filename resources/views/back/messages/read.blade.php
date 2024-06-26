@extends('back.layouts.master')
@section('title', 'Read Message')
@section('css')
    <style>
        textarea {
            height: 10rem !important;
        }
    </style>
@endsection
@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-white-50">
                Read Message
            </h4>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.index') }}">
                            Home
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.messages.index') }}">
                            Messages
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        Read
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <form class="card">
        <div class="card-body">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="title" value="{{ $message->name }}" disabled/>
                <label for="title" class="form-label text-white-50">
                    Name
                </label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="subtitle" value="{{ $message->email }}" disabled/>
                <label for="subtitle" class="form-label text-white-50">
                    E-mail
                </label>
            </div>
            <div class="form-floating mb-3">
                <input type="tel" class="form-control" id="subtitle" value="{{ $message->phone }}" disabled/>
                <label for="subtitle" class="form-label text-white-50">
                    Phone
                </label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" id="text" placeholder="Text" disabled>{{ $message->text}}</textarea>
                <label for="text" class="form-label text-white-50">
                    Text
                </label>
            </div>
            <a href="mailto:{{ $message->email }}" class="btn btn-warning text-white">
                Answer
            </a>
        </div>
    </form>
@endsection
