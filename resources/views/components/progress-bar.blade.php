<div class="w-full px-24 mb-16">
    <div class="relative flex items-center justify-between w-full">
        <div class="absolute left-0 top-2/4 h-0.5 w-full -translate-y-2/4 bg-gray-300"></div>
        <div class="absolute left-0 top-2/4 h-0.5 {{ $step == 2 ? 'w-1/2' : ($step == 3 ? 'w-full' : '') }} -translate-y-2/4 bg-primary transition-all duration-500">
        </div>
        <div class="relative grid w-10 h-10 font-bold text-white transition-all duration-300 rounded-full z-5 place-items-center bg-primary">
            1
            <div class="absolute -bottom-[2rem] w-max text-center">
            <h6 class="block font-sans text-base antialiased font-medium leading-relaxed tracking-normal text-gray-700">
                {{ $descriptions[0] }}
            </h6>
            </div>
        </div>
        <div class="relative z-5 grid w-10 h-10 font-bold transition-all duration-300 rounded-full place-items-center {{ $step >= 2 ? ' text-white bg-primary' : 'bg-gray-300 text-gray-900' }}">
            2
            <div class="absolute -bottom-[2rem] w-max text-center">
                <h6 class="block font-sans text-base antialiased font-medium leading-relaxed tracking-normal text-gray-900">
                    {{ $descriptions[1] }}
                </h6>
            </div>
        </div>
        <div class="relative z-5 grid w-10 h-10 font-bold transition-all duration-300 rounded-full place-items-center {{ $step == 3 ? ' text-white bg-primary' : 'bg-gray-300 text-gray-900' }}">
            3
            <div class="absolute -bottom-[2rem] w-max text-center">
            <h6 class="block font-sans text-base antialiased font-medium leading-relaxed tracking-normal text-gray-700">
                {{ $descriptions[2] }}
            </h6>
            </div>
        </div>
    </div>
</div>