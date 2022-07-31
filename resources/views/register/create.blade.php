<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Register!</h1>
                <form method="POST" action="/register" class="mt-10">
                    @csrf
                    <x-form.input name="name" type="text" />
                    <x-form.input name="username" type="text" />
                    <x-form.input name="email" type="email" />
                    <x-form.input name="password" autocomplete="new-password" />
                    <x-form.button name="Submit" />
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-red-500 text-xs">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
