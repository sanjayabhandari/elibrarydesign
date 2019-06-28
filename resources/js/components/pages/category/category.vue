<template>
  <div class="content">
    <v-dialog v-model="loading" hide-overlay persistent width="300">
      <v-card color="primary" dark>
        <v-card-text>
          Loading.....
          <v-progress-linear indeterminate color="white" class="mb-0"></v-progress-linear>
        </v-card-text>
      </v-card>
    </v-dialog>
    <v-layout row justify-center>
      <v-dialog v-model="dialog" width="600px" :scrollable="false">
        <!-- <template v-slot:activator="{ on }">
          <v-btn color="primary" dark v-on="on">Open Dialog</v-btn>
        </template>-->
        <v-flex lg12>
          <v-card>
            <v-img
              class="white--text"
              v-if="categorydata.image"
              :src="'/files/category/'+categorydata.image"
              aspect-ratio="1.75"
            >
              <v-container fill-height fluid>
                <v-layout fill-height>
                  <v-flex xs12 align-end flexbox>
                    <span class="headline" color="black">{{categorydata.cat_name}}</span>
                  </v-flex>
                </v-layout>
              </v-container>
            </v-img>
            <v-card-title>
              <div>
                <span>
                  <v-btn icon small class="green--text" v-if="categorydata.status==1">
                    <i class="material-icons">check</i>
                  </v-btn>
                  <v-btn icon small class="red--text" v-else>
                    <i class="material-icons">cancel</i>
                  </v-btn>
                </span>
                <br>
                <span class="grey--text">Description</span>

                <br>
                <span v-html="categorydata.description"></span>
                <br>
                <span class="grey--text">Meta Title</span>

                <br>
                <span>{{categorydata.meta_title}}</span>
                <br>
                <span class="grey--text">Meta Tag</span>

                <br>
                <span>{{categorydata.meta_tag}}</span>
                <br>
                <span class="grey--text">Meta Description</span>

                <br>
                <span v-html="categorydata.meta_description"></span>
                <br>
              </div>
            </v-card-title>
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn flat color="red" @click="dialog=false">Close</v-btn>
            </v-card-actions>
          </v-card>
        </v-flex>
      </v-dialog>
    </v-layout>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary" style="height:70px;">
              <h4 class="card-title">
                All categories
                <v-btn icon href="/admin/category/create" slot="widget-header-action">
                  <i class="material-icons white--text">add</i>
                </v-btn>
                <v-btn icon slot="widget-header-action " href="/admin/setting">
                  <v-icon class="text--secondary">reply</v-icon>
                </v-btn>
              </h4>

              <p class="card-category"></p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <v-card>
                  <v-card-title>
                    <v-spacer></v-spacer>
                    <v-text-field
                      v-model="search"
                      append-icon="search"
                      label="Search"
                      single-line
                      hide-details
                    ></v-text-field>
                  </v-card-title>
                  <v-data-table
                    :headers="headers"
                    :items="category"
                    :search="search"
                    :rows-per-page-items="[10,25,50,{text:'All','value':-1}]"
                  >
                    <template v-slot:items="props">
                      <td>{{ props.item.cat_name }}</td>
                      <td>
                        <img :src="'/files/category/'+props.item.image" width="100px" height="80px">
                      </td>

                      <td>
                        <v-btn icon small class="green--text" v-if="props.item.status==1">
                          <i class="material-icons">check</i>
                        </v-btn>
                        <v-btn icon small class="red--text" v-else>
                          <i class="material-icons">cancel</i>
                        </v-btn>
                      </td>

                      <!-- <td class="text-xs-right" v-html=" props.item.meta_description"></td> -->
                      <td>
                        <v-btn icon :href="'/admin/category/create/'+props.item.id">
                          <i class="material-icons green--text medium">edit</i>
                        </v-btn>
                        <v-btn @click.prevent="deletecategory(props.item.id)" icon>
                          <i class="material-icons red--text medium">delete</i>
                        </v-btn>
                        <v-btn @click.prevent="showallinfo(props.item)" icon>
                          <i class="material-icons blue--text medium">remove_red_eye</i>
                        </v-btn>
                      </td>
                    </template>
                    <template v-slot:no-results>
                      <v-alert
                        :value="true"
                        color="error"
                        icon="warning"
                      >Your search for "{{ search }}" found no results.</v-alert>
                    </template>
                  </v-data-table>
                </v-card>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loading: false,
      search: "",
      headers: [
        {
          text: "Category Name",
          align: "left",
          value: "cat_name"
        },
        {
          text: "Image",
          value: ""
        },
        { text: "Status", value: "status" },

        { text: "Action", value: "", sortable: false }
      ],
      category: [],
      categorydata: {},
      dialog: false
    };
  },
  methods: {
    showallinfo(data) {
      this.dialog = true;
      this.categorydata = data;
    },
    getallcategory() {
      this.loading = true;
      axios.get("/category").then(response => {
        this.loading = false;
        this.category = response.data;
      });
    },
    deletecategory(id) {
      swalWithBootstrapButtons
        .fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          type: "warning",
          showCancelButton: true,
          confirmButtonText: "Yes, delete it!",
          cancelButtonText: "No, cancel!",
          reverseButtons: true
        })
        .then(result => {
          if (result.value) {
            axios.delete("/category/" + id).then(response => {
              if (response.data.success) {
                swalWithBootstrapButtons.fire(
                  "Deleted!",
                  "Category has been deleted.",
                  "success"
                );
                this.getallcategory();
              } else {
                swalWithBootstrapButtons.fire(
                  "Deleted!",
                  "Category has not been deleted.",
                  "success"
                );
              }
            });
          } else if (
            // Read more about handling dismissals
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire(
              "Cancelled",
              "Category not deleted :)",
              "error"
            );
          }
        });
    }
  },
  created() {
    this.getallcategory();
  }
};
</script>

<style>
</style>
