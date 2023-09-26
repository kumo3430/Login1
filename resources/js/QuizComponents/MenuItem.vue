<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import { storeToRefs } from 'pinia'
import { menuStore } from '@/Stores/MenuStore.js';
import { ref, onMounted ,watch} from 'vue';

//onSelected是外部傳入的一個值，型態為布林值，預設為false
defineProps({
  href: String,
  onSelected:{type:Boolean,default:false}
});

const store=menuStore();
const {selected}=storeToRefs(store)
const {setItem,select} = store
const itemText=ref(); //設定一個變數來代表DOM物件

onMounted(()=>{
    
    //當單一選單項目被掛載到畫面上時，去狀態管理器中註冊一下自己
    //註冊的方式是把項目文字傳過去
  store.setItem(itemText.value.innerText)
});

</script>
<template>
    
    <!-- 在項目本身建立一個click事件，觸發時去通知狀態管理那個項目被點選了 -->
    <!-- class的部份綁定傳入的onSelected屬性，進行不同class的切換 -->
  <Link
    :href="href"
    class="block my-2 py-2 text-center text-xl"
    :class="{'hover:bg-slate-50 hover:text-slate-900':!onSelected,
             'bg-slate-50 text-slate-900':onSelected}"
    @click="select(itemText.innerText)"
  >
    <span ref="itemText"><slot /></span>
  </Link>
</template>