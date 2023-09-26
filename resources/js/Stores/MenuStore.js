import { defineStore } from "pinia";

export const menuStore=defineStore('menuStore',{
    state:()=>({
        selected:{},  //以物件的方式來儲存狀態
    }),
    actions:{
        setItem(item){
            
            //把項目的KEY值取出成為一個陣列
            let items=Object.keys(this.selected)
            
            //如果陣列中沒有這個項目，就加入
            if(items.indexOf(item)<0){
                this.selected[item]=false;
            }
        },
        select(item){
            
           //把選單項目全部設為false
            Object.keys(this.selected).forEach(key=>{
                this.selected[key]=false
            })
            
            //把點選的項目設為true
            this.selected[item]=true
        }
    },
})