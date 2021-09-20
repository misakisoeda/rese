<template>
 <div>
   <Header />
   <div class="wrapper">
     <ul class="list-item">
       <li class="list-item__content" v-for="(shop, index) in shops" :key="index.id">
         <div class="card-item">
           <p class="card-item__img">
             <img :src="shop.shop_img" v-bind:alt="shop.shop_name">
           </p>
           <div class="card-item__main">
            <p class="card-item__ttl">{{ shop.shop_name }}</p>
            <div class="tags-item">
              <p class="tags-item__txt">#{{ shop.shop_place }}</p>
              <p class="tags-item__txt">#{{ shop.shop_genre }}</p>
            </div>
            <!-- /[tags-item] -->
            <div class="card-item__bottom">
              <button class="btn-item">詳しく見る</button>
            </div>
          </div>
          <button class="btn-heart">
            <img class="btn-heart__img" src="../assets/icon_heart_white.png" />
          </button>
         </div>
         <!-- [/card-item] -->
       </li>
     </ul>
     <!-- /[list-item] -->
   </div>
   <!-- [/wrapper] -->
 </div>
</template>

<script>
import Header from "../components/Header";
import axios from "axios";
export default {
  data: function () {
    return {
        shops: []
    }
  },
  methods: {
    getShops() {
      axios.get('http://127.0.0.1:8000/api/shop')
        .then((response) => {
          // handle success(axiosの処理が成功した場合に処理させたいことを記述)
          this.shops = response.data.data;
        })
        .catch((error) => {
          // handle error(axiosの処理にエラーが発生した場合に処理させたいことを記述)
          console.log(error);
        })
        .finally(() => {
          // always executed(axiosの処理結果によらずいつも実行させたい処理を記述)
        });
    },
  },
  mounted() {
    this.getShops();
  },
  components: {
    Header
  }
};
</script>

<style>
@import "../style.css";
</style>