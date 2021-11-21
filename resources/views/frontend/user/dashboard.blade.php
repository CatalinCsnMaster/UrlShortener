@extends('frontend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <x-frontend.card>
                    <x-slot name="body">
                        <add-url-form/>
                    </x-slot>
                </x-frontend.card>

                <x-frontend.card>
                    <x-slot name="body">
                        <urls-table
                            fetch-url="{{ route('urls') }}"
                            :columns="['slug', 'url', 'created_at']"
                        />
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
@endsection
