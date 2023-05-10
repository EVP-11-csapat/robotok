@extends('layout')

{{-- @vite('resources/js/titlescreen.js') --}}

@section('title')
    Title screen
@endsection

@section('content')
    <form>
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div class="flex">
                <div>
                    <label for="robots" class="block mb-2 text-sm font-medium text-gray-900">Select a Robot</label>
                    <select id="robots"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="">Choose a Robot to buy</option>
                        @foreach ($storerobots as $robot)
                            <option value="{{ $robot->id }}">Speed: {{ $robot->speed }} - Capacity: {{ $robot->capacity }}
                                -
                                Model: {{ $robot->model }} - Price: {{ $robot->cost }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center mt-auto ml-2"
                    id="buyRobot">Buy</button>
            </div>
            <div class="flex">
                <div>
                    <label for="chargers" class="block mb-2 text-sm font-medium text-gray-900">Select a Charger</label>
                    <select id="chargers"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="">Choose a Charger to buy</option>
                        @foreach ($storechargers as $charger)
                            <option value="{{ $charger->id }}">Rate: {{ $charger->rate }} -
                                Model: {{ $charger->model }} - Price: {{ $charger->cost }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center mt-auto ml-2"
                    id="buyCharger">Buy</button>
            </div>
        </div>
    </form>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex justify-center my-auto mx-auto">
            <h1 class="text-lg text-gray-800 font-bold">Robot Status Table</h1>
        </div>
        <table class="w-full text-sm text-left text-gray-500" id="robotTable">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Model
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Charge
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Active for hours
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
        <div class="flex justify-center my-auto mx-auto">
            <h1 class="text-lg text-gray-800 font-bold">Charger Status Table</h1>
        </div>
        <table class="w-full text-sm text-left text-gray-500" id="chargerTable">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Model
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Charging
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Active for hours
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
@endsection
