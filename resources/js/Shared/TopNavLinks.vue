<script setup>

</script>

<template>
    <section class="flex align-between justify-between px-4 bg-base-100">
        <ul class="menu menu-horizontal">
            <li>
                <Link :href="route('ads')">آگهی ها</Link>
            </li>
            <li>
                <Link :href="route('categories')">دسته بندی ها</Link>
            </li>
        </ul>
        <ul class="menu menu-horizontal">
            <!--            <li>-->
            <!--                <Link :href="route('chat')">چت</Link>-->
            <!--            </li>-->
            <!-- Account -->
            <li v-if="$page.props.user">
                <Link :href="route('account')">حساب من</Link>
                <Link :href="route('logout')" as="form" method="post">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    خروج از حساب کاربری
                </Link>
            </li>
            <li v-else>
                <Link :href="route('register')">ثبت نام</Link>
                <Link :href="route('login')">ورود</Link>
            </li>
        </ul>
    </section>
</template>
