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
            </li>
            <li>
                <Link :href="route('register')">ثبت نام</Link>
                <Link :href="route('login')">ورود</Link>
            </li>
        </ul>
    </section>
</template>
