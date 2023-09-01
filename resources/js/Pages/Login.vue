<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
})
</script>

<template>
<!--inertia的HEAD組件可以用來改變瀏灠器分頁上的標籤文字(title)-->
<Head title="學科測驗系統" />

<!--這一段是註冊登入用的，將來可以改成sticky的標題功能列-->
<div class="relative flex items-top justify-center 
            min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
    <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">

        <!--這裏的路由要改成backstage-->
        <Link v-if="$page.props.auth.user" 
             :href="route('backstage')" 
             class="text-sm text-gray-700 dark:text-gray-500 underline">
                 管理中心
        </Link>

        <template v-else>
        <Link :href="route('login')" 
              class="text-sm text-gray-700 dark:text-gray-500 underline">
                  Log in
        </Link>

        <Link v-if="canRegister" 
              :href="route('register')" 
              class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">
                  Register
        </Link>
        </template>
    </div> 
    <!--前台主要內容區域-->
    <div>
        <ul>
            <li>可以選擇學科別</li>
            <li>可以選擇測驗或是練習</li>
            <li>可以單純查看題庫</li>
        </ul> 
    </div>
</div>
</template>