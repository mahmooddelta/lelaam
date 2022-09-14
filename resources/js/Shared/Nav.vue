<script setup>
import ThemeChanger from "./ThemeChanger.vue";
import Logo from "./Logo.vue";</script>
<template>
    <div class="navbar bg-base-300 w-full px-4">
        <div class="navbar-start">
            <!--            <div class="dropdown">-->
            <!--                <label tabindex="0" class="btn btn-ghost lg:hidden">-->
            <!--                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">-->
            <!--                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"/>-->
            <!--                    </svg>-->
            <!--                </label>-->
            <!--                <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">-->
            <!--                    <li><a>Item 1</a></li>-->
            <!--                    <li><a>Item 3</a></li>-->
            <!--                </ul>-->
            <!--            </div>-->
            <a class="">
                <Logo/>
            </a>
        </div>
        <div class="navbar-end">
            <ThemeChanger/>
            <Link v-if="$page.props.is_blog" :href="route('blog.posts')" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="h-6 w-6 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
                </svg>

                جستجو در بلاگ
            </Link>
            <Link v-else :href="route('ad.create')" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                </svg>
                ثبت آگهی
            </Link>
        </div>
    </div>
</template>
