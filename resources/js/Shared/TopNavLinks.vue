<script setup>

</script>

<template>
    <section class="flex align-between justify-between px-4 bg-base-100 text-xs">
        <ul class="menu menu-horizontal">
            <li>
                <Link :href="route('ads')">آگهی ها</Link>
            </li>
            <li>
                <Link :href="route('categories')">دسته بندی ها</Link>
            </li>
        </ul>
        <ul class="menu menu-horizontal">
            <!-- Blog -->
            <li>
                <Link :href="route('blog.index')" title="بلاگ لیلام">
                    بلاگ
                </Link>
            </li>
            <li v-if="$page.props.user">
                <Link :href="route('chat')" title="گفتگو ها">
                    <div class="badge badge-primary badge-xs" v-if="$page.props.unread_messages_count > 0"
                         v-text="$page.props.unread_messages_count"></div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                </Link>
            </li>
            <!-- Account -->
            <li v-if="$page.props.user">
                <Link :href="route('account')" title="حساب کاربری">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </Link>
            </li>
            <li v-else>
                <Link :href="route('register')" title="ثبت نام">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                </Link>
                <Link :href="route('login')" title="ورود به سیستم">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                    </svg>
                </Link>
            </li>
        </ul>
    </section>
</template>
