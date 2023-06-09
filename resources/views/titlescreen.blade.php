@extends('layout')

{{-- @vite('resources/js/titlescreen.js') --}}

@section('title')
    Title screen
@endsection

@section('content')
    {{-- Pass the id parameter to the js file using this element --}}
    <span class="hidden" id="simulationID">{{ $id }}</span>
    <form>
        <div class="grid gap-6 mb-6 xl:grid-cols-4 lg:grid-cols-2 grid-cols-1">
            <div class="flex w-full">
                <div class="w-full">
                    <label for="robots" class="block mb-2 text-sm font-medium text-gray-900">Select a Robot</label>
                    <select id="robots"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="">Choose a Robot to buy</option>
                        @foreach ($storerobots as $robot)
                            <option value="{{ $robot->id }}">Speed: {{ $robot->speed }} - Capacity:
                                {{ $robot->capacity }}
                                -
                                Model: {{ $robot->model }} - Price: {{ number_format($robot->cost, 2) }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center mt-auto ml-2"
                    id="buyRobot">Buy</button>
            </div>
            <div class="flex w-full">
                <div class="w-full">
                    <label for="chargers" class="block mb-2 text-sm font-medium text-gray-900">Select a Charger</label>
                    <select id="chargers"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="">Choose a Charger to buy</option>
                        @foreach ($storechargers as $charger)
                            <option value="{{ $charger->id }}">Rate: {{ $charger->rate }} -
                                Model: {{ $charger->model }} - Price: {{ number_format($charger->cost, 2) }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center mt-auto ml-2"
                    id="buyCharger">Buy</button>
            </div>
            <div class="flex w-full items-center">
                <button type="button" id="simulate"
                    class="flex-grow-1 w-full text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 shadow-lg shadow-green-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center h-10">Simulate</button>
            </div>
            <div class="flex justify-center items-center w-full">
                <input type="number" id="numberofstuff"
                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 mr-2 h-10"
                    value="1" min="1" max="100">

                <button type="button" id="generate"
                    class="text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 shadow-lg shadow-pink-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center h-10 w-full">Generate
                    cargo</button>
            </div>
        </div>
    </form>

    <div class="grid xl:grid-cols-2 grid-cols-1 gap-4 ">
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

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
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


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="flex justify-center my-auto mx-auto">
                <h1 class="text-lg text-gray-800 font-bold">Possible cargo</h1>
            </div>
            <table class="w-full text-sm text-left text-gray-500" id="templateTable">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Perishable
                        </th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="flex justify-center my-auto mx-auto">
                <h1 class="text-lg text-gray-800 font-bold">Generated cargo</h1>
            </div>
            <table class="w-full text-sm text-left text-gray-500" id="generatedTable">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Perishable
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Arrival day
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Remaining count
                        </th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>


        <p id="log">

        </p>


    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Hour
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Packing
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Charging
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Depleted
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Charged
                    </th>
                </tr>
            </thead>
            <tbody id="logTableBody">

            </tbody>
        </table>
    </div>
@endsection
