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
        <v-flex lg12>
          <v-card v-if="productdata.files">
            <v-card-title class="title ml-a mr-a">{{productdata.productdata.title}}</v-card-title>

            <v-layout>
              <v-flex lg12 sm12>
                <v-card>
                  <v-container grid-list-lg fluid>
                    <v-layout row wrap>
                      <v-flex lg12 d-flex>
                        <v-card flat tile class="d-flex">
                          <v-img
                            :src="'/files/product/images/'+productdata.productdata.image"
                            :lazy-src="'/files/product/images/'+productdata.productdata.image"
                            aspect-ratio="2.75"
                            class="grey lighten-2"
                          >
                            <template v-slot:placeholder>
                              <v-layout fill-height align-center justify-center ma-0>
                                <v-progress-circular indeterminate color="grey lighten-5"></v-progress-circular>
                              </v-layout>
                            </template>
                          </v-img>
                        </v-card>
                      </v-flex>
                    </v-layout>
                  </v-container>
                </v-card>
              </v-flex>
            </v-layout>

            <v-layout>
              <v-flex lg12 sm12 v-if="productdata.files.length>0">
                <v-card>
                  <v-container grid-list-lg fluid>
                    <v-layout row wrap>
                      <v-flex v-for="n in productdata.files" :key="n.id" xs2 d-flex>
                        <v-card flat tile class="d-flex">
                          <v-img
                            :src="'/image/'+n.fileformate"
                            :lazy-src="'/image/'+n.fileformate"
                            aspect-ratio="1"
                            class="grey lighten-2"
                          >
                            <template v-slot:placeholder>
                              <v-layout fill-height align-center justify-center ma-0>
                                <v-progress-circular indeterminate color="grey lighten-5"></v-progress-circular>
                              </v-layout>
                            </template>
                          </v-img>
                        </v-card>
                      </v-flex>
                    </v-layout>
                  </v-container>
                </v-card>
              </v-flex>
            </v-layout>

            <v-card-title>
              <v-layout row wrap>
                <v-flex xs6>
                  <v-card>
                    <v-card-text class="px-0 ml-3">
                      <span class="grey--text">Category</span>

                      <br>
                      <span>{{productdata.category.cat_name}}</span>
                      <br>
                      <span class="grey--text">Author</span>

                      <br>
                      <span>{{productdata.author.author_name}}</span>
                      <br>
                      <span class="grey--text">Publisher</span>

                      <br>
                      <span>{{productdata.publisher.pub_name}}</span>
                      <br>
                      <span class="grey--text">Language</span>

                      <br>
                      <span>{{productdata.language.name}}</span>
                      <br>
                      <span class="grey--text">media</span>

                      <br>
                      <span v-html="productdata.media.name"></span>

                      <br>
                      <span class="grey--text">Place of publication</span>

                      <br>
                      <span v-html="productdata.productdata.pop"></span>
                      <br>
                      <span class="grey--text">Published Year</span>

                      <br>
                      <span v-html="productdata.productdata.py"></span>
                      <br>
                      <span>
                        <button
                          class="btn btn-xs btn-success"
                          v-if="productdata.productdata.status==1"
                        >
                          <small>Active</small>
                        </button>
                        <button class="btn btn-xs btn-danger" v-else>
                          <small>Deactive</small>
                        </button>
                      </span>
                    </v-card-text>
                  </v-card>
                </v-flex>
                <v-flex xs6>
                  <v-card>
                    <v-card-text class="px-0 ml-3">
                      <span>
                        <span class="grey--text">Translator</span>

                        <br>
                        <span>{{productdata.productdata.translator}}</span>
                        <br>
                        <span class="grey--text">Illustrator</span>

                        <br>
                        <span>{{productdata.productdata.illustrator}}</span>
                        <br>
                        <span class="grey--text">Editor</span>

                        <br>
                        <span>{{productdata.productdata.editor}}</span>
                        <br>
                        <span class="grey--text">Keywords</span>

                        <br>
                        <span>{{productdata.seodata.meta_tag}}</span>
                        <br>
                        <span class="grey--text">Meta Title</span>

                        <br>
                        <span>{{productdata.seodata.metatitle}}</span>

                        <br>
                        <span class="grey--text">Link</span>

                        <br>
                        <span>{{productdata.seodata.link}}</span>
                        <br>
                        <span class="grey--text">Meta Description</span>

                        <br>
                        <span v-html="productdata.seodata.metadescription"></span>
                      </span>
                    </v-card-text>
                  </v-card>
                </v-flex>
              </v-layout>
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
              <h4 class="card-title">All product</h4>
              <div style="float:right;margin-top:-30px;">
                <v-btn icon href="/admin/product/create" slot="widget-header-action">
                  <i class="material-icons white--text">add</i>
                </v-btn>
                <v-btn icon slot="widget-header-action " href="/admin/setting">
                  <v-icon class="white--text">settings_applications</v-icon>
                </v-btn>
              </div>

              <!-- <a
                href="/admin/product/create"
                class="btn btn-sm btn-purple"
                style="float:right;background-color:#9E38B4;margin-top:-10px;"
              >
                <i class="material-icons">add</i>
              </a>-->
              <p class="card-product"></p>
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
                    :items="product"
                    :search="search"
                    :rows-per-page-items="[10,25,50,{text:'All','value':-1}]"
                  >
                    <template v-slot:items="props">
                      <td>{{ props.item.productdata.title }}</td>
                      <td>{{ props.item.category.cat_name }}</td>
                      <td>{{ props.item.author.author_name }}</td>
                      <td>{{ props.item.productdata.py }}</td>

                      <td>
                        <v-btn
                          icon
                          small
                          class="green--text"
                          v-if="props.item.productdata.status==1"
                        >
                          <i class="material-icons">check</i>
                        </v-btn>
                        <v-btn icon small class="red--text" v-else>
                          <i class="material-icons">cancel</i>
                        </v-btn>
                      </td>

                      <td>
                        <v-btn
                          icon
                          small
                          class="green--text"
                          :href="'/admin/product/create/'+props.item.productdata.id"
                        >
                          <i class="material-icons">edit</i>
                        </v-btn>
                        <v-btn
                          icon
                          small
                          class="red--text"
                          @click.prevent="deleteproduct(props.item.productdata.id)"
                        >
                          <i class="material-icons">delete</i>
                        </v-btn>
                        <v-btn icon small class="blue--text" @click="showallinfo(props.item)">
                          <i class="material-icons">remove_red_eye</i>
                        </v-btn>
                      </td>
                    </template>
                    <template v-slot:no-results>
                      <v-alert
                        :value="true"
                        color="red"
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
      search: "",
      loading: false,
      headers: [
        {
          text: "product Name",
          align: "left",
          value: "productdata.title"
        },
        {
          text: "Category",
          value: "category.cat_name"
        },
        {
          text: "Author",
          value: "author.author_name"
        },
        {
          text: "Published Year",
          value: "productdata.py"
        },

        { text: "Status", value: "productdata.status" },

        { text: "Action", value: "", sortable: false }
      ],
      product: [],
      productdata: {},
      dialog: false
    };
  },
  methods: {
    showallinfo(data) {
      this.dialog = true;

      this.productdata = data;
      console.log(this.productdata);
    },
    getallproduct() {
      this.loading = true;
      axios.get("/product").then(response => {
        this.loading = false;
        this.product = response.data.data;
        // console.log(this.product);
      });
    },
    deleteproduct(id) {
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
            axios.delete("/product/" + id).then(response => {
              if (response.data.success) {
                swalWithBootstrapButtons.fire(
                  "Deleted!",
                  "Product has been deleted.",
                  "success"
                );
                this.getallproduct();
              } else {
                Toast.fire({
                  type: "error",
                  title: "product not deleted"
                });
              }
            });
          } else if (
            // Read more about handling dismissals
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire(
              "Cancelled",
              "Product not deleted :)",
              "error"
            );
          }
        });
    }
  },
  created() {
    this.getallproduct();
  }
};
</script>

<style>
</style>
