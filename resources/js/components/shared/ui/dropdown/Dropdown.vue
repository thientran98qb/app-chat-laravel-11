<script setup lang="ts">
import { Icon } from "@iconify/vue";
import {
    DropdownMenuArrow,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuPortal,
    DropdownMenuRoot,
    DropdownMenuTrigger,
} from "radix-vue";
import { ref } from "vue";

const toggleState = ref(false);
</script>

<template>
    <DropdownMenuRoot v-model:open="toggleState">
        <DropdownMenuTrigger
            class="rounded-full w-[35px] h-[35px] inline-flex items-center justify-center text-black bg-white outline-none hover:bg-green3"
            aria-label="Customise options"
        >
            <Icon icon="radix-icons:hamburger-menu" />
        </DropdownMenuTrigger>

        <DropdownMenuPortal>
            <DropdownMenuContent
                class="min-w-[220px] outline-none bg-white rounded-md p-[5px] shadow-[0px_10px_38px_-10px_rgba(22,_23,_24,_0.35),_0px_10px_20px_-15px_rgba(22,_23,_24,_0.2)] will-change-[opacity,transform] data-[side=top]:animate-slideDownAndFade data-[side=right]:animate-slideLeftAndFade data-[side=bottom]:animate-slideUpAndFade data-[side=left]:animate-slideRightAndFade"
                :side-offset="5"
            >
                <DropdownMenuItem
                    value="New Tab"
                    class="group text-[15px] leading-none text-black rounded-[3px] flex items-center h-[35px] px-[5px] relative pl-[25px] select-none outline-none data-[disabled]:text-mauve8 data-[disabled]:pointer-events-none data-[highlighted]:bg-green9 data-[highlighted]:text-green1 hover:cursor-pointer"
                    @click=""
                >
                    My profile
                    <div
                        class="ml-auto pl-[20px] text-mauve11 group-data-[highlighted]:text-white group-data-[disabled]:text-mauve8"
                    >
                        <Icon
                            icon="radix-icons:avatar"
                            class="text-black relative top-[1px] transition-transform duration-[250] ease-in group-data-[state=open]:-rotate-180"
                            aria-hidden
                        />
                    </div>
                </DropdownMenuItem>
                <DropdownMenuItem
                    asChild
                    value="New Tab"
                    class="group text-[15px] leading-none text-black rounded-[3px] flex items-center h-[35px] px-[5px] relative pl-[25px] select-none outline-none data-[disabled]:text-mauve8 data-[disabled]:pointer-events-none data-[highlighted]:bg-green9 data-[highlighted]:text-green1 hover:cursor-pointer"
                >
                    <inertia-link
                        method="post"
                        :href="route('logout')"
                        as="button"
                        class="w-full"
                    >
                        Logout
                        <div
                            class="ml-auto pl-[20px] text-mauve11 group-data-[highlighted]:text-white group-data-[disabled]:text-mauve8"
                        >
                            <Icon
                                icon="radix-icons:pin-left"
                                class="text-black relative top-[1px] transition-transform duration-[250] ease-in group-data-[state=open]:-rotate-180"
                                aria-hidden
                            />
                        </div>
                    </inertia-link>
                </DropdownMenuItem>
                <DropdownMenuArrow class="fill-white" />
            </DropdownMenuContent>
        </DropdownMenuPortal>
    </DropdownMenuRoot>
</template>
