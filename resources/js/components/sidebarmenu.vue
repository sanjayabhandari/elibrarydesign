<template>
  <div>
    <div class="logo" style="height:100px;">
      <p class="text-black" style="line-height:1;color:black;">
        OLE Nepal's
        <br>E-Pustakala
        <br>

        <span style="font-size:12px;">Free &amp; Open Digiatl Library</span>
      </p>
      <a href="#" class="simple-text logo-normal">
        <img src="/assets/image/logo.png" class="img-fluid mt-2" style="height:62px;">
      </a>
    </div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li
          class="nav-item"
          :class="{'active':sidebar.active}"
          v-for="sidebar in menu"
          :key="sidebar.index"
        >
          <a class="nav-link" :href="sidebar.link">
            <i class="material-icons">{{sidebar.icon}}</i>
            <p>{{sidebar.title}}</p>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="/admin/category">
            <i class="material-icons">category</i>
            <p>Category</p>
          </a>
        </li>-->
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  props: ["url"],
  data() {
    return {
      menu: [
        {
          title: "Dashboard",
          link: "/admin/dashboard",
          icon: "dashboard",
          active: "http://127.0.0.1:8000/admin/dashboard" === this.url
        },
        {
          title: "Settings",
          link: "/admin/setting",
          icon: "settings_brightness",
          active:
            "http://127.0.0.1:8000/admin/setting" === this.url ||
            "http://127.0.0.1:8000/admin/author" === this.url ||
            "http://127.0.0.1:8000/admin/author/create" === this.url ||
            "http://127.0.0.1:8000/admin/category" === this.url ||
            "http://127.0.0.1:8000/admin/category/create" === this.url ||
            "http://127.0.0.1:8000/admin/language" === this.url ||
            "http://127.0.0.1:8000/admin/language/create" === this.url ||
            "http://127.0.0.1:8000/admin/publisher" === this.url ||
            "http://127.0.0.1:8000/admin/publisher/create" === this.url
        },
        {
          title: "Product",
          link: "/admin/product",
          icon: "view_module",
          active:
            "http://127.0.0.1:8000/admin/product" === this.url ||
            "http://127.0.0.1:8000/admin/product/create" === this.url
        },
        {
          title: "Blog",
          link: "/admin/blog",
          icon: "wrap_text",
          active:
            "http://127.0.0.1:8000/admin/blog" === this.url ||
            "http://127.0.0.1:8000/admin/blog/create" === this.url ||
            "http://127.0.0.1:8000/admin/blog/create/" + "*" === this.url
        }
      ]
    };
  }
};
</script>

<style>
</style>
