<template>
  <div class="content">
    <v-dialog v-model="previewmodal" max-width="650px">
      <v-layout>
        <v-flex lg12>
          <v-card>
            <v-img :src="'/files/blog/'+blogdata.image" height="300px"></v-img>

            <v-card-title primary-title>
              <div>
                <h3 class="headline mb-0">
                  {{blogdata.blog_title}}
                  <span>({{blogdata.short_title}})</span>
                </h3>

                <div v-html="blogdata.blog_description"></div>
              </div>
            </v-card-title>

            <!--         <v-card-actions>
          <v-btn flat color="orange">Share</v-btn>
          <v-btn flat color="orange">Explore</v-btn>
            </v-card-actions>-->
          </v-card>
        </v-flex>
      </v-layout>
    </v-dialog>
    <v-dialog v-model="loading" hide-overlay persistent width="300">
      <v-card color="primary" dark>
        <v-card-text>
          Loading.....
          <v-progress-linear indeterminate color="white" class="mb-0"></v-progress-linear>
        </v-card-text>
      </v-card>
    </v-dialog>
    <v-layout row justify-center>
      <v-dialog v-model="dialog" width="600">
        <div class="row">
          <div class="col-lg-12 col-md-12 mt-0">
            <div class="card">
              <div class="card-header card-header-tabs card-header-primary">
                <div class="nav-tabs-navigation">
                  <div class="nav-tabs-wrapper">
                    <span class="nav-tabs-title">Blog:</span>
                    <ul class="nav nav-tabs" data-tabs="tabs">
                      <li class="nav-item">
                        <a class="nav-link active" href="#basicdetails" data-toggle="tab">
                          <i class="material-icons">add</i> Add blog
                          <div class="ripple-container"></div>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="basicdetails">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="blog">blog Name</label>
                        <input type="text" class="form-control" id="blog" v-model="form.blog_name">
                      </div>
                      <div class="form-group">
                        <label for="blog">Date of Birth</label>
                        <input type="text" class="form-control" id="blog" v-model="form.dob">
                      </div>
                      <div class="form-group">
                        <label for="blog">Date of Death</label>
                        <input type="text" class="form-control" id="blog" v-model="form.dod">
                      </div>
                      <div class="form-group">
                        <label for="blog">Address</label>
                        <input type="text" class="form-control" id="blog" v-model="form.address">
                      </div>
                      <div class="form-group">
                        <label for="blog">blog Title</label>
                        <input type="text" class="form-control" id="blog" v-model="form.blog_title">
                      </div>
                      <div class="form-group">
                        <label for="blog">Social Profile</label>
                        <input
                          type="text"
                          class="form-control"
                          id="blog"
                          v-model="form.socialprofile"
                        >
                      </div>

                      <div class="form-group">
                        <label for="status">Status</label>
                        <v-select
                          :items="status"
                          v-model="form.status"
                          item-text="name"
                          item-value="value"
                          label="Select status"
                        ></v-select>
                      </div>
                      <!--    <div class="form-group">
                        <label
                          class="custom-file-upload"
                          v-bind:style="{ backgroundImage:'url('+imageUrl+')', backgroundSize: '100% 100%' }"
                        >
                          <input type="file" @change="onFileselected" multiple>
                          <i class="fa fa-cloud-upload" style="color:green;"></i> Select Upload
                        </label>
                      </div>-->
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <!-- <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea> -->
                        <tinymce id="d1" v-model="form.description"></tinymce>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="green" @click.prevent="addblog" v-if="!blogedit">Submit</v-btn>
                <v-btn
                  large
                  color="purple"
                  class="btn btn-primary"
                  @click.prevent="updateblog"
                  v-else
                >Update</v-btn>
                <v-spacer></v-spacer>
              </v-card-actions>
            </div>
          </div>
        </div>
      </v-dialog>
    </v-layout>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary" style="height:70px;">
              <h4 class="card-title">
                Blog
                <v-spacer></v-spacer>
                <div style="float:right;margin-top:-20px;">
                  <v-btn icon slot="widget-header-action" href="/admin/blog/create">
                    <i class="material-icons white--text">add</i>
                  </v-btn>

                  <v-btn icon slot="widget-header-action" href="/admin/setting">
                    <v-icon class="text--secondary">setting</v-icon>
                  </v-btn>
                </div>
                <!--       <v-btn icon slot="widget-header-action" @click.prevent="dialog='true' ,imageUrl='',blogedit=false,form=''" >
                <i class="material-icons white--text">add</i>
                </v-btn>-->
                <v-spacer></v-spacer>
              </h4>

              <p class="card-blog"></p>
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
                    :items="blog"
                    :search="search"
                    :rows-per-page-items="[10,25,50,{text:'All','value':-1}]"
                  >
                    <template v-slot:items="props">
                      <td>{{ props.item.blog_title }}</td>

                      <td>{{ props.item.short_title }}</td>
                      <td>{{ props.item.creator.name }}</td>

                      <td>
                        <v-btn icon small class="green--text" v-if="props.item.status==1">
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
                          :href="'/admin/blog/create/'+props.item.id"
                        >
                          <i class="material-icons">edit</i>
                        </v-btn>
                        <!--        <v-btn icon small class="green--text" @click="editblog(props.item)">
                          <i class="material-icons">edit</i>
                        </v-btn>-->
                        <v-btn icon small class="red--text" @click="deleteblog(props.item.id)">
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
      search: "",
      headers: [
        {
          text: " Blog Title",
          align: "left",
          value: "blog_title"
        },
        {
          text: "Short Title",

          value: "short_title"
        },
        {
          text: "Created By",

          value: "created_by"
        },

        { text: "Status", value: "status" },

        { text: "Action", value: "", sortable: false }
      ],
      blog: [],
      blogdata: {},
      dialog: false,
      loading: false,
      form: {},
      blog: [],
      status: [
        {
          name: "Active",
          value: 1
        },
        {
          name: "Deactive",
          value: 0
        }
      ],

      url: "/api/test",

      filesUploaded: [],
      form: {},
      parentstatus: false,
      childstatus: false,
      subblog: [],
      image: null,
      blogedit: false,
      imageUrl: "",
      previewmodal: false
    };
  },
  methods: {
    onFileselected(file) {
      let files = file.target.files || file.dataTransfer.files;
      if (!files.length) return;
      this.createImage(files[0]);
    },
    createImage(file) {
      this.image = file;
      const fr = new FileReader();
      fr.readAsDataURL(file);
      fr.addEventListener("load", () => {
        this.imageUrl = fr.result;
      });
    },

    addblog() {
      const formdata = new FormData();
      for (var key in this.form) {
        formdata.append(key, this.form[key]);
      }
      formdata.append("image", this.image);

      axios
        .post("/blog", formdata, {
          headers: {
            "Content-Type": "multipart/form-data"
          }
        })
        .then(response => {
          if (response.data.success) {
            this.imageUrl = "";
            this.dialog = false;
            this.getallblog();
            this.form = "";
            this.image = "";
            Toast.fire({
              type: "success",
              title: "blog added successfully"
            });
          } else {
            Toast.fire({
              type: "error",
              title: "Some error occurred"
            });
          }
        })
        .catch(function(error) {});
    },
    editblog(data) {
      this.blogedit = true;
      this.dialog = true;
      this.form = data;
      this.imageUrl = "/file/" + data.image;
    },
    updateblog() {
      const formdata = new FormData();
      for (var key in this.form) {
        formdata.append(key, this.form[key]);
      }
      formdata.append("image", this.image);
      formdata.append("_method", "PATCH");

      axios
        .post("/blog/" + this.form.id, formdata, {
          headers: {
            "Content-Type": "multipart/form-data"
          }
        })
        .then(response => {
          if (response.data.success) {
            this.imageUrl = "";
            this.dialog = false;
            this.getallblog();
            this.image = "";
            Toast.fire({
              type: "success",
              title: "blog Updated successfully"
            });
          } else {
            Toast.fire({
              type: "error",
              title: "Some error occurred"
            });
          }
        })
        .catch(function(error) {});
    },
    showallinfo(data) {
      this.previewmodal = true;
      this.blogdata = data;
      console.log(this.blogdata);
      // this.dialog = true;
      //this.blogdata = data;
    },
    getallblog() {
      this.loading = true;
      axios.get("/blog").then(response => {
        this.loading = false;
        this.blog = response.data.data;
        console.table(this.blog);
      });
    },
    deleteblog(id) {
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
            axios.delete("/blog/" + id).then(response => {
              if (response.data.success) {
                this.getallblog();
                swalWithBootstrapButtons.fire(
                  "Deleted!",
                  "blog has been deleted.",
                  "success"
                );
                this.getallblog();
              } else {
                Toast.fire({
                  type: "error",
                  title: "blog not deleted"
                });
              }
            });
          } else if (
            // Read more about handling dismissals
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire(
              "Cancelled",
              "blog  not deleted:)",
              "error"
            );
          }
        });
    }
  },
  created() {
    this.getallblog();
  }
};
</script>

<style>
input[type="file"] {
  display: none;
}
.custom-file-upload {
  border: 1px solid #ccc;
  display: inline-block;
  padding: 60px 120px;
  cursor: pointer;
}
</style>

