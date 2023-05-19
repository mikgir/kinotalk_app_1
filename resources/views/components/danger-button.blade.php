<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-danger m-auto']) }}>
    {{ $slot }}
</button>
