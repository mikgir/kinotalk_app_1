<x-app-layout>
    <main>
        <div class="container mt-5">
            <h2>Привет {{Auth::user()->name}}!</h2>
            <div class="row justify-between">
                <div class="col-5">
                    <div class="card-body">
                        <div class="card-image">

                        </div>
                        <div class="w-100">
                            <div class="col">
                                <div class="w-100">
                                    @include('profile.partials.update-profile-information-form')
                                </div>
                            </div>
                            <div class="col">
                                <div class="w-100">
                                    @include('profile.partials.update-password-form')
                                </div>
                            </div>
                            <div class="col">
                                <div class="w-100">
                                    @include('profile.partials.delete-user-form')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-7">
                    <div class="card-body">
                        <div class="w-100">
                            <h4>Личная информация {{Auth::user()->name}}</h4>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
