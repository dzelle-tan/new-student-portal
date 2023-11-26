<button {{ $attributes->merge(['type' => 'submit', 'class' => 'px-4 py-2 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest bg-primary hover:bg-primary-light-2 focus:bg-primary-light-2 active:bg-primary-dark-1 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
