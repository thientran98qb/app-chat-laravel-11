<script setup lang="ts">
import { ref, computed } from "vue";
import PrimaryLayout from "../../Layouts/PrimaryLayout.vue";
import Calendar from "../../components/shared/ui/calendar/Calendar.vue";
import { twMerge } from "tailwind-merge";
import { Inertia } from "@inertiajs/inertia";
import { CalendarDate } from "@internationalized/date";
import moment from "moment";
import { usePage } from "@inertiajs/inertia-vue3";
const page = usePage();
const user = computed(() => page.props.value);

defineProps({
    defaultSchedules: Object,
    schedules: Object,
});
const states = ref({
    defaultDate: "" as string | null,
    totalPice: 0,
    dateSelected: moment().format("YYYY-MM-DD") as string | null,
    clicked: [] as {
        key: number;
        value: boolean;
        time_range: string;
        data: {
            court_id: number;
            user_id: number;
            court_price_id: number;
            ordered_at: string;
            status: number;
        };
    }[],
});
const handleFilterDate = (date: string) => {
    states.value.dateSelected = date;
    states.value.clicked = [];
    Inertia.visit(route("showBooking"), {
        data: { filter_date: date },
        preserveState: true,
    });
};

let urlParams = new URLSearchParams(window.location.search);

if (urlParams.has("filter_date")) {
    states.value.dateSelected = urlParams.get("filter_date");
}

const groupedData = computed(() => {
    return states.value.clicked.reduce((acc, item) => {
        const { court_id } = item.data;
        acc[court_id] = acc[court_id] || [];
        acc[court_id].push(item.time_range);
        return acc;
    }, {});
});

const courts = computed(() => {
    return Object.keys(groupedData.value).map((courtId) => {
        return {
            id: courtId,
            time_ranges: groupedData.value[courtId],
        };
    });
});

const dateUrl = computed(() => {
    const date = urlParams.has("filter_date")
        ? (states.value.defaultDate = urlParams.get("filter_date"))
        : "";
    const dateParese = moment(date);
    return date
        ? new CalendarDate(
              dateParese.year(),
              dateParese.month() + 1,
              dateParese.date()
          )
        : null;
});

const handleClickTimeRange = (schedule: {
    id: number;
    court_id: number;
    status: boolean;
    time_range: string;
    price: number;
}) => {
    if (!schedule.status) return;
    const findClicked = states.value.clicked.findIndex(
        (el) => el.key === schedule.id && el.value === true
    );
    if (findClicked !== -1) {
        states.value.clicked.splice(findClicked, 1);
        states.value.totalPice = states.value.totalPice - schedule.price;
    } else {
        states.value.totalPice += schedule.price;

        states.value.clicked.push({
            key: schedule.id,
            value: true,
            time_range: schedule.time_range,
            data: {
                court_id: schedule.court_id,
                user_id: (user.value.auth as any).user.id as number,
                court_price_id: schedule.id,
                ordered_at: moment(states.value.dateSelected).format(
                    "YYYY-MM-DD"
                ) as string,
                status: 1,
            },
        });
    }
};

const formatCurrency = (value: number) => {
    return new Intl.NumberFormat("vi-VN", {
        style: "currency",
        currency: "VND",
    }).format(value);
};

const clearData = () => {
    states.value.clicked = [];
    states.value.totalPice = 0;
};

const handleSubmitBooking = () => {
    console.log(
        "data",
        states.value.clicked.map((el) => el.data)
    );
    if (states.value.clicked.length <= 0) return;
    Inertia.visit(route("booking"), {
        method: "post",
        data: {
            bookings: states.value.clicked.map((el) => el.data),
            filter_date: states.value.dateSelected,
        },
    });
};
</script>

<template>
    <PrimaryLayout>
        <h3 class="text-md font-medium tracking-normal text-gray-700 py-5">
            Booking
        </h3>
        <div class="grid grid-cols-3 gap-4 mb-28">
            <div class="border-r p-3">
                <Calendar @update="handleFilterDate" :date-url="dateUrl" />
            </div>
            <div class="col-span-2 mt-2">
                <div class="flex gap-2">
                    <div class="w-20 shrink-0"></div>
                    <template v-for="schedule in defaultSchedules">
                        <div
                            class="bg-green-700 rounded-md text-white p-1 w-20 flex text-center items-center justify-center shrink-0"
                        >
                            {{ schedule }}
                        </div>
                    </template>
                </div>
                <div class="flex gap-2 flex-col mt-2">
                    <template v-for="(courts, key) in schedules" :key="key">
                        <div class="flex items-center gap-2">
                            <div
                                class="bg-green-700 rounded-md text-white p-1 w-20 flex text-center items-center justify-center shrink-0"
                            >
                                Court {{ key + 1 }}
                            </div>
                            <div>
                                <div class="flex gap-2">
                                    <template
                                        v-for="court in courts"
                                        :key="court.id"
                                    >
                                        <div
                                            :class="
                                                twMerge(
                                                    'border rounded-md bg-transparent text-gray-700 p-1 w-20 flex text-center items-center justify-center cursor-pointer  transition-all duration-300',
                                                    !court.status
                                                        ? 'hover:cursor-not-allowed bg-slate-200'
                                                        : 'hover:bg-slate-100'
                                                )
                                            "
                                            :onclick="
                                                () =>
                                                    handleClickTimeRange(court)
                                            "
                                        >
                                            {{
                                                court.status
                                                    ? states.clicked.find(
                                                          (el) =>
                                                              el.key ===
                                                              court.id
                                                      )
                                                        ? "&#10004;"
                                                        : "o"
                                                    : "x"
                                            }}
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
        <div
            class="border w-full shadow-lg fixed bottom-0 p-1 bg-white left-0 text-center"
        >
            <div v-for="court in courts" :key="court.id">
                <h3>
                    Court {{ court.id }} :
                    <span v-for="time in court.time_ranges" :key="time">
                        {{ time }}
                        <span v-if="time !== court.time_ranges.slice(-1)[0]"
                            >,
                        </span>
                    </span>
                </h3>
            </div>
            <p>Total price: {{ formatCurrency(states.totalPice) }}</p>
            <div class="flex gap-2 justify-center items-center">
                <button
                    :onclick="handleSubmitBooking"
                    class="min-w-[300px] p-2 rounded-md text-white text-lg bg-orange-700 my-2 hover:opacity-75 transition-all duration-200"
                >
                    Booking Court
                </button>
                <button
                    :onclick="clearData"
                    class="min-w-[300px] p-2 rounded-md text-white text-lg bg-slate-700 my-2 hover:opacity-75 transition-all duration-200"
                >
                    Clear Booking
                </button>
            </div>
        </div>
    </PrimaryLayout>
</template>
