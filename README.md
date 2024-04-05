# Application Overview

The application built with:

-   `vite` + `typescript` + `eslint` -> development productivity
-   `vitest` + `@testing-library/vue` -> unit test, integration test, coverage
-   `msw` -> browser and server mocking
-   `tailwindcss` + `tailwind-merge` + `class-variance-authority` -> easy styling
-   `radix-vue` + `vue-sonner` + `vaul-vue` + `v-calendar` + `@tanstack/vue-table` -> UI component library
-   `ky` + `@tanstack/vue-query` -> server state management + data fetching
-   `zod` -> runtime schema validation
-   `@iconify/vue` -> icon on demand
-   `vee-validate` + `@vee-validate/zod` -> form management
-   `pinia` -> performant global state management
-   `type-fest` -> useful type helpers
-   `vue-router` -> client routing
-   `@vueuse/core` -> useful composables
-   `vue-i18n` -> i18n

Đặt giờ chơi từ 5h -> 20h mỗi ngày
= Cho phép đặt theo tháng và lựa chọn khung giờ
= Cho phép đặt theo từng giờ nếu còn trống
Khi người này đặt thì tự động cập nhật lại lịch
Đặt thành công gửi sms vé tới người dùng
Tích hợp thanh toán stripe
Cho phép quản lý lịch sử giao dịch.
Tracking đơn hàng
Gửi email thông báo gia hạn nếu người dùng đặt theo tháng (dựa vào ngày thanh toán trước).

-   Users
    -   name
    -   sdt
    -   email
-   Courts
    -   name
    -   status
    -   start_time
    -   end_time
-   Court_Prices
    -   court_id
    -   time_range
    -   price
-   Court_Orders
    -   user_id
    -   court_id
    -   ordered_at
    -   time_range
    -   total_price
    -   status
-   Payment
    -   user_id
    -   stripe_id
    -   paymented_date
    -   status
