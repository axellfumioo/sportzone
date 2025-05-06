@extends('components.layout')

@section('content')
<section class="bg-[#f8f6f1] pb-16 pt-32 px-4">
    <div class="flex flex-col max-w-7xl mx-auto justify-center items-center">
        <h2 class="text-3xl font-bold text-[#8B1E1E] text-center mb-12">Tanya AI</h2>
        <div class="bg-white w-3xl shadow-lg rounded-xl">
            <div class="h-100 mx-8 my-8"> {{-- THIS IS CHAT--}}
                <div class="flex justify-start">
                    <div class="p-4 bg-[#8B1E1D] user-chat rounded-xl w-fit lg:max-w-3/5 max-w-4/5 motion-preset-fade motion-duration-3000">
                        <h1 class="mb-2 font-bold text-white">Selamat datang! Saya adalah asisten AI yang siap membantu Anda memahami berbagai informasi permainan</h1>
                    </div>
                </div>
                <div class="flex justify-end">
                    <div class=" p-4 bg-gray-200 user-chat rounded-xl w-fit lg:max-w-3/5 max-w-4/5 motion-preset-fade motion-duration-200">
                        <h1 class="font-bold text-black">ara ara</h1>
                    </div>
                </div>
            </div>
            <div class="flex justify-center gap-2 mb-4 mx-4">
                <input placeholder="Tanyakan apa saja tentang permainan yang tersedia" class="w-full px-2 py-3 text-gray-600 placeholder-gray-400 border border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary disabled:opacity-50 disabled:cursor-not-allowed">
                <button class="bg-[#8B1E1E] px-4 rounded-lg text-white">
                    <i class="fa-solid fa-paper-plane"></i>
                </button>
            </div>
        </div>
</section>
@endsection
