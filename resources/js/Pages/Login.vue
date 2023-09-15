<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import { reactive } from "vue";

const props = defineProps({
  canLogin: Boolean,
  canRegister: Boolean,
  username: String,
  role: String,
});

const userInfo = reactive({
  user: { link: route("userhome"), string: "會員中心",},
  admin: { link: route("home"), string: "管理中心", },
});

//用來綁定選擇項目的變數
const testSelect = reactive({ quizbank: 3, type: "test" });

</script>

<template>
  <!--inertia的HEAD組件可以用來改變瀏灠器分頁上的標籤文字(title)-->
  <Head title="學科測驗系統" />

  <!--這一段是註冊登入用的，將來可以改成sticky的標題功能列-->
  <div class="relative">
    <div v-if="canLogin"
         class="hidden sticky top-0 right-0 bg-sky-200 text-sm 
                text-sky-900 text-right px-6 py-4 sm:block w-full">
      {{ username }}
      <Link v-if="$page.props.auth.user"
            :href="userInfo[role].link"
            class="text-sm text-gray-700 dark:text-gray-500 underline">
        {{ userInfo[role].string }}
      </Link>

      <template v-else>
        <Link :href="route('login')"
              class="text-sm text-gray-700 dark:text-gray-500 underline">
          登入
        </Link>

        <Link v-if="canRegister"
              :href="route('register')"
              class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">
          註冊
        </Link>
      </template>
    </div>
    <!--前台主要內容區域-->
    <div class="max-w-7xl m-auto p-4">
      <div class="m-4">
        <div>選擇測驗項目:</div>
        <input type="radio" name="quizbank" value="3" checked />網頁設計丙級
        <input type="radio" name="quizbank" value="2" />網頁設計乙級
      </div>
      <div class="m-4">
        <div>選擇測驗類型:</div>
        <input type="radio" name="type" value="test" checked />測驗
        <input type="radio" name="type" value="practice" />練習
      </div>

      <!-- <button class="px-6 py-2 border rounded-lg bg-blue-700 text-blue-100">
          開始
      </button> -->
          <!--原本的Button改成Inertia內建的Link組件，有a link的功能-->
      <Link :href="route('test.start', testSelect)"
            class="px-6 py-2 border rounded-lg bg-blue-700 text-blue-100">
          開始
      </Link>
      <div class="m-4">
        <div>瀏灠題庫:</div>
        <!-- <Link class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">
          網頁設計丙級
        </Link>
        <Link class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">
          網頁設計乙級
        </Link> -->
         <!--在題庫連結加上路由和參數-->
        <Link :href="route('quiz.browser', 3)"
              class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">
          網頁設計丙級
        </Link>
        <Link :href="route('quiz.browser', 2)"
              class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">
          網頁設計乙級
        </Link>
      </div>
    </div>
  </div>
</template>