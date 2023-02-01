<template>
    <div class="container " id="login">
        <div class="row">
            <div class="card w-50 mx-auto">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="text-primary">Title</h5>
                    <button class="btn btn-sm btn-danger  rounded-circle">X</button>
                </div>
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>

<style>
#login {
    position: fixed;
    top: 20vh;
    left: 17vh;
    z-index: 99;
}
</style>