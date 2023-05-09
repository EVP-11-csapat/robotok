@extends('layout')

@section('title')
    Contact
@endsection

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold text-center py-4">Contact Us</h1>
        <div class="flex flex-wrap justify-center">
            <div class="w-full md:w-1/2 lg:w-1/3 p-4">
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-xl font-bold text-gray-700">Address</h2>
                    <p class="text-gray-600 mt-2">1117 Budapest, Pázmány Péter sétány 1/A, VI/126.</p>
                </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3 p-4">
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-xl font-bold text-gray-700">Phone</h2>
                    <p class="text-gray-600 mt-2">+36 1 372 2500/6800</p>
                </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3 p-4">
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-xl font-bold text-gray-700">Email</h2>
                    <p class="text-gray-600 mt-2">operator@elte.hu</p>
                </div>
            </div>
        </div>
        <h2 class="text-2xl font-bold text-center py-4">Meet Our Team</h2>
        <div class="flex flex-wrap justify-center">
            <div class="w-full md:w-1/3 p-4">
                <div class="bg-white shadow-lg rounded-lg p-6 flex items-center">
                    <img src="https://robotok.fra1.cdn.digitaloceanspaces.com/swtjxf.jpg" alt="Tamás Németh"
                        class="w-16 h-16 rounded-full mr-4">
                    <div>
                        <h3 class="text-lg font-bold text-gray-700">Tamas Nemeth</h3>
                        <p class="text-gray-600 mt-1">Senior UX / UI Designer</p>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/3 p-4">
                <div class="bg-white shadow-lg rounded-lg p-6 flex items-center">
                    <img src="https://randomuser.me/api/portraits/men/3.jpg" alt="Dávid Maár"
                        class="w-16 h-16 rounded-full mr-4">
                    <div>
                        <h3 class="text-lg font-bold text-gray-700">Dávid Maár</h3>
                        <p class="text-gray-600 mt-1">Senior Algorithm Designer</p>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/3 p-4">
                <div class="bg-white shadow-lg rounded-lg p-6 flex items-center">
                    <img src="https://randomuser.me/api/portraits/men/76.jpg" alt="Isrván Riszterer"
                        class="w-16 h-16 rounded-full mr-4">
                    <div>
                        <h3 class="text-lg font-bold text-gray-700">István Riszterer</h3>
                        <p class="text-gray-600 mt-1">Senior Database Engineer / Data Scientist</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
