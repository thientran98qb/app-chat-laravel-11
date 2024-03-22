<script setup></script>
<template>
    <div class="w-full h-screen flex font-sans flex-col md:flex-row">
        <div class="md:w-2/3 hidden md:block md:h-screen bg-[#f1f0ff] w-full">
            <div class="flex flex-col p-4 md:mt-48 mt-10 items-center">
                <div
                    class="text-[35px] text-slate-900 tracking-wider font-semibold leading"
                >
                    Impressive
                </div>
                <span class="text-[35px] font-extrabold tracking-wider"
                    >React Login Page</span
                >
                <div
                    class="text-[35px] text-slate-900 font-semibold tracking-wider"
                >
                    Template
                </div>
            </div>
        </div>
        <div
            class="md:w-1/3 w-full h-fit md:h-screen bg-[#d9daf0] relative flex md:items-center justify-center"
        >
            <div
                class="p-4 md:p-0 absolute md:-left-1/4 left-auto -top-2/4 md:top-auto"
            >
                <form action="" class="bg-white rounded-lg p-12">
                    <div class="w-14 mb-2">
                        <img
                            src="https://logovectordl.com/wp-content/uploads/2020/11/neat-logo-vector.png"
                            alt="logo"
                            class="w-full h-full object-contain"
                        />
                    </div>
                    <div class="my-6 space-y-1">
                        <h2 class="text-slate-800 tracking-wide">
                            Welcome to Sneat!
                        </h2>
                        <p class="text-xs text-slate-600 tracking-wide">
                            Please sign-in to your account and start adventure
                        </p>
                    </div>
                    <div class="space-y-3">
                        <div class="flex justify-center flex-col space-y-2">
                            <label class="uppercase text-sm font-medium"
                                >Email or username</label
                            >
                            <input
                                type="text"
                                name="email"
                                id=""
                                class="border rounded px-3 py-2 text-xs"
                                placeholder="Enter your email or username"
                            />
                        </div>
                        <div class="flex justify-center flex-col space-y-2">
                            <label class="uppercase text-sm font-medium"
                                >Password</label
                            >
                            <input
                                type="password"
                                name="password"
                                id=""
                                class="border rounded px-3 py-2 text-xs"
                                placeholder="Enter your email or username"
                            />
                        </div>
                        <div
                            class="text-xs font-medium flex items-center gap-2"
                        >
                            <input type="checkbox" name="" id="remember_me" />
                            <label
                                for="remember_me"
                                class="text-slate-700 cursor-pointer"
                                >Remember Me</label
                            >
                        </div>
                        <button
                            class="w-full hover:opacity-75 transition-all duration-300 bg-blue-600 text-white font-semibold rounded-lg py-2 text-xs"
                        >
                            Sign in
                        </button>
                    </div>
                    <p class="text-xs text-center mt-4 text-slate-600">
                        New on our platform?
                        <a
                            href=""
                            class="text-blue-900 no-underline hover:underline"
                            >Create an account</a
                        >
                    </p>
                    <p
                        class="text-center text-xs mt-5 text-slate-500 after:content-[''] after:absolute after:inset-y-2/4 after:bg-slate-300 after:h-[1px] after:w-[45%] before:content-[''] after:right-0 before:absolute before:bg-slate-300 before:left-0 before:h-[1px] before:inset-y-2/4 before:w-[45%] relative"
                    >
                        or
                    </p>
                    <div class="flex justify-center items-center gap-3 mt-5">
                        <div
                            class="text-sm cursor-pointer hover:bg-[#365899] transition-opacity duration-500 ease-linear rounded-lg h-8 w-8 bg-slate-500 flex justify-center items-center text-white"
                        >
                            <fa :icon="['fab', 'facebook']" />
                        </div>
                        <div
                            class="text-sm cursor-pointer hover:bg-[#EA4335] transition-opacity duration-500 ease-linear rounded-lg h-8 w-8 bg-slate-500 flex justify-center items-center text-white"
                        >
                            <fa :icon="['fab', 'google-plus-g']" />
                        </div>
                        <div
                            class="text-sm cursor-pointer hover:bg-[#1DA1F2] transition-opacity duration-500 ease-linear rounded-lg h-8 w-8 bg-slate-500 flex justify-center items-center text-white"
                        >
                            <fa :icon="['fab', 'twitter']" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
