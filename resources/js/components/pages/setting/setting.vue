<template>
  <div id="pageDashboard">
    <v-container grid-list-xl fluid>
      <v-layout row wrap>
        <v-flex lg12 sm12 xs12 v-for="(item, key) in settingList" :key="key">
          <v-widget :title="item.title" content-bg="white">
            <div slot="widget-header-action">
              <v-btn icon slot="widget-header-action " right href="/admin/product">
                <v-icon class="black--text">view_module</v-icon>
              </v-btn>
            </div>
            <div slot="widget-content">
              <v-layout row wrap>
                <!--                                 <div class="col-lg-3 col-md-6 col-sm-6" v-for="list in lists" :key="list.index">
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
         <i class="material-icons text-danger">warning</i> -
              <a :href="list.link">{{list.linktitle}}</a>
            </div>
          </div>
        </div>
                </div>-->
                <v-flex
                  lg3
                  sm6
                  xs12
                  v-for="(setting,index) in item.list"
                  :key="index"
                  class="col-lg-3 col-md-6 col-sm-6"
                >
                  <v-card :color="setting.cardColor" class="white--text card card-stats">
                    <div class="card-header card-header-icon" :class="setting.cardheadercolor">
                      <div class="card-icon">
                        <i class="material-icons">{{setting.icon}}</i>
                      </div>
                      <p class="card-category"></p>
                      <h3 class="card-title title ml-2 white--text">{{ setting.settingTitle}}</h3>
                    </div>
                    <div class="card-footer">
                      <div class="stats">
                        <!-- <i class="material-icons text-danger">warning</i> -->
                        <a :href="setting.url" class="white--text subheading">{{setting.linktitle}}</a>
                      </div>
                    </div>
                    <!--          <v-card-title primary-title>
                      <div>
                        <div class="headline">{{ setting.settingTitle}}</div>
                        <span>{{ setting.description }}</span>
                      </div>
                    </v-card-title>
                    <v-card-actions>
                      <v-btn flat dark :href="setting.url">View Details</v-btn>
                    </v-card-actions>-->
                  </v-card>
                </v-flex>
              </v-layout>
            </div>
          </v-widget>
        </v-flex>
      </v-layout>
    </v-container>
  </div>
</template>

<script>
// import API from "@/api";
import MiniStatistic from "../../layouts/MiniStatistic";
import VWidget from "../../layouts/VWidget";
import Material from "vuetify/es5/util/colors";

export default {
  layout: "dashboard",
  components: {
    VWidget,
    MiniStatistic
  },
  data: () => ({
    color: Material,
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
    ],
    settingList: [
      {
        title: "All Settings",
        list: [
          {
            cardColor: "green",
            settingTitle: "Author",
            description: "Manage Author",
            url: "/admin/author",
            icon: "book",
            cardheadercolor: "card-header-warning",
            linktitle: "Manage Author"
          },
          {
            cardColor: "orange",
            settingTitle: "Category",
            description: "Manage category",
            url: "/admin/category",
            icon: "category",
            cardheadercolor: "card-header-success",
            linktitle: "Manage Category"
          },
          {
            cardColor: "purple",
            settingTitle: "Language",
            description: "Manage Language",
            url: "/admin/language",
            icon: "language",
            cardheadercolor: "card-header-danger",
            linktitle: "Manage Language"
          },

          {
            cardColor: "indigo",
            settingTitle: "Publisher",
            description: "Manage Publisher",
            url: "/admin/publisher",
            icon: "touch_app",
            linktitle: "Manage Publisher"
          }
        ]
      }
      // {
      //   title: "Other Settings",
      //   list: [
      //     {
      //       cardColor: "purple",
      //       settingTitle: "Other Setting",
      //       description: "Manage Other Setting",
      //       url: "#"
      //     }
      //   ]
      // }
    ]
  })
  //   computed: {
  //     activity() {
  //       return API.getActivity();
  //     },
  //     posts() {
  //       return API.getPost(3);
  //     },
  //     siteTrafficData() {
  //       return API.getMonthVisit;
  //     },
  //     locationData() {
  //       return API.getLocation;
  //     }
  //   }
};
</script>

