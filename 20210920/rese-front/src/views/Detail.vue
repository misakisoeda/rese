<template>
  <div class="flex">
    <div class="right">
      <!-- <Shop :id="id" /> -->
      <div class="comment">
        <div class="message" v-for="(comment, index) in data" :key="index">
          <div class="flex">
            <p class="name">{{ comment.comment_user.name }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
// import Shop from "../components/Shop";
export default {
  props: ["id"],
  data() {
    return {
      content: "",
      data: "",
    };
  },
  methods: {
    comment() {
      axios
        .get("http://127.0.0.1:8000/api/shop/" + this.id)
        .then((response) => {
          this.data = response.data.comment;
        });
    },
  },
  created() {
    this.comment();
  }
};
</script>
