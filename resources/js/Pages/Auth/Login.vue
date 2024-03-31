<script lang="ts" setup>
import {
    FormItem,
    FormMessage,
    FormLabel,
} from "../../components/shared/ui/form";

import { Input } from "../../components/shared/ui/input";
import { useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

function onSubmit() {
    form.post(route("login"));
}
</script>
<template>
    <div class="w-full h-screen flex font-sans flex-col md:flex-row">
        <div class="md:w-2/3 hidden md:block md:h-screen bg-[#f1f0ff] w-full">
            <div class="flex flex-col p-4 md:mt-48 mt-10 items-center">
                <div
                    class="text-[35px] text-slate-900 tracking-wider font-semibold leading"
                >
                    Bùng cháy cùng
                </div>
                <span class="text-[35px] font-extrabold tracking-wider"
                    >TDEV BADMINTON</span
                >
                <div
                    class="text-[35px] text-slate-900 font-semibold tracking-wider"
                >
                    Kỷ luật hướng tới đam mê!
                </div>
            </div>
        </div>
        <div
            class="md:w-1/3 w-full h-fit md:h-screen bg-[#d9daf0] relative flex md:items-center justify-center"
        >
            <div
                class="p-4 md:p-0 absolute md:-left-1/4 left-auto -top-2/4 md:top-auto mr-0 md:mr-5"
            >
                <form
                    data-testid="form-login"
                    class="bg-white rounded-lg p-8"
                    @submit.prevent="onSubmit"
                >
                    <div class="h-[150px] mb-2 md:h-[130px]">
                        <img
                            src="/images/logo.png"
                            alt="logo"
                            class="w-full h-full object-contain"
                        />
                    </div>
                    <div class="my-6 space-y-1">
                        <h2 class="text-slate-800 tracking-wide">
                            Chào mừng đến với cầu lông TDEV!
                        </h2>
                        <p class="text-xs text-slate-600 tracking-wide">
                            Vui lòng đăng nhập để truy cập vào hệ thống và tận
                            hưởng dịch vụ của chúng tôi
                        </p>
                    </div>
                    <div class="space-y-3">
                        <FormItem>
                            <FormLabel
                                for="email"
                                class="uppercase text-sm font-medium"
                                >Email</FormLabel
                            >
                            <Input
                                id="email"
                                type="text"
                                v-model="form.email"
                                :variant="
                                    form.errors.email ? 'error' : 'default'
                                "
                                placeholder="Nhập địa chỉ email của bạn"
                            />
                            <FormMessage
                                id="email-error"
                                :error="form.errors.email"
                            />
                        </FormItem>
                        <FormItem>
                            <FormLabel
                                for="password"
                                class="uppercase text-sm font-medium"
                                >Mật khẩu</FormLabel
                            >
                            <Input
                                id="password"
                                type="password"
                                v-model="form.password"
                                :variant="
                                    form.errors.password ? 'error' : 'default'
                                "
                                placeholder="Nhập địa chỉ password của bạn"
                            />
                            <FormMessage
                                id="password-error"
                                :error="form.errors.password"
                            />
                        </FormItem>
                        <div
                            class="text-xs font-medium flex items-center gap-2"
                        >
                            <input
                                type="checkbox"
                                name="remember"
                                id="remember_me"
                                v-model="form.remember"
                            />
                            <label
                                for="remember_me"
                                class="text-slate-700 cursor-pointer leading-[initial]"
                                >Nhớ mật khẩu</label
                            >
                        </div>
                        <button
                            type="submit"
                            class="w-full hover:opacity-75 transition-all duration-300 bg-[#ef7215] text-white font-semibold rounded-lg py-2 text-xs"
                        >
                            Đăng nhập
                        </button>
                    </div>
                    <p class="text-xs text-center mt-4 text-slate-600">
                        Nếu lần đầu tới website?
                        <a
                            href=""
                            class="text-blue-900 no-underline hover:underline"
                            >Tạo tài khoản</a
                        >
                    </p>
                    <p
                        class="text-center text-xs mt-5 text-slate-500 after:content-[''] after:absolute after:inset-y-2/4 after:bg-slate-300 after:h-[1px] after:w-[45%] before:content-[''] after:right-0 before:absolute before:bg-slate-300 before:left-0 before:h-[1px] before:inset-y-2/4 before:w-[45%] relative"
                    >
                        hoặc
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
