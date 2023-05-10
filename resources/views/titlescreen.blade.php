@extends('layout')

@section('title')
    Title screen
@endsection

@section('content')
    <div role="status"
        class="max-w-md p-4 space-y-4 border border-gray-200 divide-y divide-gray-200 rounded shadow animate-pulse md:p-6">
        <div class="flex items-center justify-between">
            <div>
                <div class="h-2.5 bg-gray-300 rounded-full w-24 mb-2.5"></div>
                <div class="w-32 h-2 bg-gray-200 rounded-full"></div>
            </div>
            <div class="h-2.5 bg-gray-300 rounded-full w-12"></div>
        </div>
        <div class="flex items-center justify-between pt-4">
            <div>
                <div class="h-2.5 bg-gray-300 rounded-full w-24 mb-2.5"></div>
                <div class="w-32 h-2 bg-gray-200 rounded-full"></div>
            </div>
            <div class="h-2.5 bg-gray-300 rounded-full w-12"></div>
        </div>
        <div class="flex items-center justify-between pt-4">
            <div>
                <div class="h-2.5 bg-gray-300 rounded-full w-24 mb-2.5"></div>
                <div class="w-32 h-2 bg-gray-200 rounded-full"></div>
            </div>
            <div class="h-2.5 bg-gray-300 rounded-full w-12"></div>
        </div>
        <div class="flex items-center justify-between pt-4">
            <div>
                <div class="h-2.5 bg-gray-300 rounded-full w-24 mb-2.5"></div>
                <div class="w-32 h-2 bg-gray-200 rounded-full"></div>
            </div>
            <div class="h-2.5 bg-gray-300 rounded-full w-12"></div>
        </div>
        <div class="flex items-center justify-between pt-4">
            <div>
                <div class="h-2.5 bg-gray-300 rounded-full w-24 mb-2.5"></div>
                <div class="w-32 h-2 bg-gray-200 rounded-full"></div>
            </div>
            <div class="h-2.5 bg-gray-300 rounded-full w-12"></div>
        </div>
        <span class="sr-only">Loading...</span>

        <table>
            <thead>
                <tr>
                    <th>Id</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($storerobots as $robot)
                    <tr>
                        <td>{{ $robot }}</td>
                    </tr>
                @endforeach
        </table>
    </div>
@endsection
