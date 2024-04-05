<script setup lang="ts">
import { Icon } from "@iconify/vue";
import {
    CalendarCell,
    CalendarCellTrigger,
    CalendarGrid,
    CalendarGridBody,
    CalendarGridHead,
    CalendarGridRow,
    CalendarHeadCell,
    CalendarHeader,
    CalendarHeading,
    CalendarNext,
    CalendarPrev,
    CalendarRoot,
    CalendarRootProps,
} from "radix-vue";

import { ref } from "vue";
import { CalendarDate, type DateValue } from "@internationalized/date";
import moment from "moment";

const props = defineProps<{
    dateUrl?: DateValue;
}>();

const date = ref<DateValue | null>(
    props.dateUrl
        ? props.dateUrl
        : new CalendarDate(
              moment().year(),
              moment().month() + 1,
              moment().date()
          )
);

const emits = defineEmits(["update"]);
const handleSubmitDate = () => {
    emits("update", date.value?.toString());
};

const isDateUnavailable: CalendarRootProps["isDateUnavailable"] = (date) => {
    return (
        date <
        new CalendarDate(moment().year(), moment().month() + 1, moment().date())
    );
};
</script>

<template>
    <CalendarRoot
        v-slot="{ weekDays, grid }"
        class="mt-2 rounded-xl bg-white p-4 shadow-md"
        fixed-weeks
        v-model="date"
        :is-date-unavailable="isDateUnavailable"
    >
        <CalendarHeader class="flex items-center justify-between">
            <CalendarPrev
                class="inline-flex items-center cursor-pointer text-black justify-center rounded-[9px] bg-transparent w-8 h-8 hover:bg-black hover:text-white active:scale-98 active:transition-all focus:shadow-[0_0_0_2px] focus:shadow-black"
            >
                <Icon icon="radix-icons:chevron-left" class="w-6 h-6" />
            </CalendarPrev>
            <CalendarHeading class="text-[15px] text-black font-medium" />

            <CalendarNext
                class="inline-flex items-center cursor-pointer justify-center text-black rounded-[9px] bg-transparent w-8 h-8 hover:bg-black hover:text-white active:scale-98 active:transition-all focus:shadow-[0_0_0_2px] focus:shadow-black"
            >
                <Icon icon="radix-icons:chevron-right" class="w-6 h-6" />
            </CalendarNext>
        </CalendarHeader>
        <div
            class="flex flex-col space-y-4 pt-4 sm:flex-row sm:space-x-4 sm:space-y-0"
        >
            <CalendarGrid
                v-for="month in grid"
                :key="month.value.toString()"
                class="w-full border-collapse select-none space-y-1"
            >
                <CalendarGridHead>
                    <CalendarGridRow class="mb-1 grid w-full grid-cols-7">
                        <CalendarHeadCell
                            v-for="day in weekDays"
                            :key="day"
                            class="rounded-md text-xs text-green8"
                        >
                            {{ day }}
                        </CalendarHeadCell>
                    </CalendarGridRow>
                </CalendarGridHead>
                <CalendarGridBody class="grid">
                    <CalendarGridRow
                        v-for="(weekDates, index) in month.rows"
                        :key="`weekDate-${index}`"
                        class="grid grid-cols-7"
                    >
                        <CalendarCell
                            v-for="weekDate in weekDates"
                            :key="weekDate.toString()"
                            :date="weekDate"
                            class="relative text-center text-sm"
                        >
                            <CalendarCellTrigger
                                :day="weekDate"
                                :month="month.value"
                                class="relative flex items-center justify-center rounded-full whitespace-nowrap text-sm font-normal text-black w-8 h-8 outline-none focus:shadow-[0_0_0_2px] focus:shadow-black data-[disabled]:text-black/30 data-[selected]:!bg-green10 data-[selected]:text-white hover:bg-green5 data-[highlighted]:bg-green5 data-[unavailable]:pointer-events-none data-[unavailable]:text-black/30 data-[unavailable]:line-through before:absolute before:top-[5px] before:hidden before:rounded-full before:w-1 before:h-1 before:bg-white data-[today]:before:block data-[today]:before:bg-green9"
                            />
                        </CalendarCell>
                    </CalendarGridRow>
                </CalendarGridBody>
            </CalendarGrid>
        </div>
    </CalendarRoot>
    <button
        class="w-full p-2 rounded-md text-white bg-green-700 my-2"
        :onclick="handleSubmitDate"
    >
        Submit
    </button>
</template>
