<template>
  <div>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6" v-for="list in lists" :key="list.index">
        <div class="card card-stats">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
              <i class="material-icons">{{list.icon}}</i>
            </div>
            <p class="card-category">{{list.title}}</p>
            <h3 class="card-title">{{list.value}}</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <!-- <i class="material-icons text-danger">warning</i> -->
              <a :href="list.link">{{list.linktitle}}</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
              <i class="material-icons">content_copy</i>
            </div>
            <p class="card-category">Used Space</p>
            <h3 class="card-title">
              49/50
              <small>GB</small>
            </h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons text-danger">warning</i>
              <a href="#pablo">Get More Space...</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-success card-header-icon">
            <div class="card-icon">
              <i class="material-icons">store</i>
            </div>
            <p class="card-category">Revenue</p>
            <h3 class="card-title">$34,245</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">date_range</i> Last 24 Hours
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-danger card-header-icon">
            <div class="card-icon">
              <i class="material-icons">info_outline</i>
            </div>
            <p class="card-category">Fixed Issues</p>
            <h3 class="card-title">75</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">local_offer</i> Tracked from Github
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
              <i class="fa fa-twitter"></i>
            </div>
            <p class="card-category">Followers</p>
            <h3 class="card-title">+245</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">update</i> Just Updated
            </div>
          </div>
        </div>
      </div>
    </div>-->
  </div>
</template>

<script>
export default {
  data() {
    return {
      lists: [
        {
          title: "Category",
          icon: "category",
          value: "0",
          linktitle: "manage-category",
          link: "/admin/category"
        },
        {
          title: "Setting",
          icon: "settings_brightness",
          value: "0",
          linktitle: "manage-settings",
          link: "/admin/settings"
        }
        // {
        //   title: "",
        //   icon: "",
        //   value: "",
        //   linktitle: "",
        //   link: ""
        // },
        // {
        //   title: "",
        //   icon: "",
        //   value: "",
        //   linktitle: "",
        //   link: ""
        // }
      ]
    };
  }
};
</script>

<style>
</style>
