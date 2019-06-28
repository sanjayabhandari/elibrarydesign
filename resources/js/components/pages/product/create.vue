<template>
  <div class="row">
    <div class="col-lg-12 col-md-12 mt-0">
      <div class="card">
        <div class="card-header card-header-tabs card-header-primary">
          <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
              <span class="nav-tabs-title">product:</span>
              <ul class="nav nav-tabs" data-tabs="tabs">
                <li class="nav-item">
                  <a class="nav-link active" href="#basicdetails" data-toggle="tab">
                    <i class="material-icons">transform</i> Basic Details
                    <div class="ripple-container"></div>
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="#seosettings" data-toggle="tab">
                    <i class="material-icons">settings</i> Seo Settings
                    <div class="ripple-container"></div>
                  </a>
                </li>
                <li class="nav-item" v-if="productedit">
                  <a class="nav-link" href="#image" data-toggle="tab">
                    <i class="material-icons">attach_file</i> File
                    <div class="ripple-container"></div>
                  </a>
                </li>
                <v-spacer></v-spacer>
                <li class="nav-item" style="float:right;">
                  <v-btn icon slot="widget-header-action " @click="goBack">
                    <v-icon class="white--text">reply</v-icon>
                  </v-btn>
                  <v-btn icon slot="widget-header-action " href="/admin/setting">
                    <v-icon class="white--text">settings_applications</v-icon>
                  </v-btn>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="tab-content">
            <div class="tab-pane active" id="basicdetails">
              <div class="card-body">
                <form>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="product">Product Title</label>
                        <input type="text" class="form-control" id="product" v-model="form.title">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="product">Place of Publication</label>
                        <input type="text" class="form-control" id="product" v-model="form.pop">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="product">Published Year</label>
                        <input type="text" class="form-control" id="product" v-model="form.py">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="product">Translator</label>
                        <input
                          type="text"
                          class="form-control"
                          id="product"
                          v-model="form.translator"
                        >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="product">Illustrator</label>
                        <input
                          type="text"
                          class="form-control"
                          id="product"
                          v-model="form.illustrator"
                        >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="product">Editor</label>
                        <input type="text" class="form-control" id="product" v-model="form.editor">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="product">Link</label>
                        <input type="text" class="form-control" id="product" v-model="form.link">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="product">Revised Date</label>
                        <input
                          type="text"
                          class="form-control"
                          id="product"
                          v-model="form.revised_date"
                        >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="product">Revised Edition</label>
                        <input
                          type="text"
                          class="form-control"
                          id="product"
                          v-model="form.revised_edition"
                        >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="author">
                          Author
                          <v-btn
                            icon
                            slot="widget-header-action "
                            href="/admin/author/create"
                            @click="saveformdata"
                          >
                            <v-icon class="black--text">add</v-icon>
                          </v-btn>
                        </label>
                        <select
                          class="form-control select-css"
                          v-model="form.author_id"
                          id="author"
                        >
                          <option
                            v-for="item in author"
                            :key="item.index"
                            :value="item.id"
                          >{{item.author_name}}</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="publisher">
                          Publisher
                          <v-btn
                            icon
                            slot="widget-header-action "
                            href="/admin/publisher/create"
                            @click="saveformdata"
                          >
                            <v-icon class="black--text">add</v-icon>
                          </v-btn>
                        </label>
                        <select
                          class="form-control select-css"
                          v-model="form.publisher_id"
                          id="publisher"
                        >
                          <option
                            v-for="item in publisher"
                            :key="item.index"
                            :value="item.id"
                          >{{item.pub_name}}</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="category">
                          Category
                          <v-btn
                            icon
                            slot="widget-header-action "
                            href="/admin/category/create"
                            @click="saveformdata"
                          >
                            <v-icon class="black--text">add</v-icon>
                          </v-btn>
                        </label>
                        <select
                          class="form-control select-css"
                          v-model="form.category_id"
                          id="category"
                        >
                          <option
                            v-for="item in category"
                            :key="item.index"
                            :value="item.id"
                          >{{item.cat_name}}</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="media">Media Type</label>
                        <select class="form-control select-css" id="media" v-model="form.media_id">
                          <option
                            v-for="item in media"
                            :key="item.index"
                            :value="item.id"
                          >{{item.name}}</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="language" class="language">
                          Language
                          <v-btn
                            icon
                            slot="widget-header-action "
                            href="/admin/language/create"
                            @click="saveformdata"
                          >
                            <v-icon class="black--text">add</v-icon>
                          </v-btn>
                        </label>
                        <select
                          class="form-control select-css"
                          id="lang"
                          v-model="form.language_id"
                        >
                          <option
                            v-for="item in language"
                            :key="item.index"
                            :value="item.id"
                          >{{item.name}}</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control select-css" id="status" v-model="form.status">
                          <option
                            v-for="item in status"
                            :key="item.index"
                            :value="item.value"
                          >{{item.name}}</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label
                      class="custom-file-upload"
                      v-bind:style="{ backgroundImage:'url('+imageUrl+')', backgroundSize: '100% 100%' }"
                    >
                      <input type="file" @change="uploadcoverimage" multiple>
                      <i class="fa fa-cloud-upload" style="color:green;"></i> Select Upload
                    </label>
                  </div>-->
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <!-- <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea> -->
                    <tinymce id="d1" v-model="form.description"></tinymce>
                  </div>
                </form>
              </div>
            </div>
            <div class="tab-pane" id="image">
              <v-layout>
                <v-flex lg12 sm12 v-if="images.length>0">
                  <v-card>
                    <v-container grid-list-lg fluid>
                      <v-layout row wrap>
                        <v-flex v-for="n in images" :key="n" xs2 d-flex>
                          <v-card flat tile class="d-flex">
                            <v-img :src="n" :lazy-src="n" aspect-ratio="1" class="grey lighten-2">
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
                <div class="row">
                  <div class="col-md-6">
                    <label
                      class="custom-file-upload"
                      v-bind:style="{ backgroundImage:'url('+imageUrl+')', backgroundSize: '100% 100%' }"
                    >
                      <input type="file" @change="onFileselected" multiple>
                      <i class="fa fa-cloud-upload"></i> Select Upload
                    </label>
                  </div>
                </div>
              </v-layout>
              <a
                href="#"
                class="btn btn-success"
                @click.prevent="uploadfiles"
                v-if="productedit"
              >Upload</a>
            </div>
            <div class="tab-pane" id="seosettings">
              <div class="card-body">
                <form>
                  <div class="form-group">
                    <label for="product">Meta Tag</label>
                    <input type="text" class="form-control" id="product" v-model="form.keywords">
                  </div>
                  <div class="form-group">
                    <label for="product">Meta Title</label>
                    <input type="text" class="form-control" id="product" v-model="form.meta_title">
                  </div>
                  <div class="form-group">
                    <label for="product">Meta Description</label>
                    <tinymce id="d2" v-model="form.meta_description"></tinymce>
                  </div>
                  <a
                    href="#"
                    class="btn btn-success"
                    @click.prevent="addproduct"
                    v-if="!productedit"
                  >Submit</a>
                  <a href="#" class="btn btn-primary" @click.prevent="updateproduct" v-else>Update</a>
                </form>
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
  props: ["productid"],
  data() {
    return {
      checkextensions: false,
      product: [],
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
      subproduct: [],
      image: [],
      productedit: false,
      imageUrl: "",
      author: [],
      publisher: [],
      category: [],
      media: [],
      language: [],
      images: [],
      coverimage: ""
    };
  },
  methods: {
    uploadfiles() {
      const formdata = new FormData();

      for (var i = 0; i < this.image.length; i++) {
        formdata.append("fileformate[]", this.image[i]);
      }
      formdata.append("status", 1);
      formdata.append("product_id", this.productid);

      //   let t = formdata.getAll("image[]");

      axios
        .post("/productfile", formdata, {
          headers: {
            "Content-Type": "multipart/form-data"
          }
        })
        .then(response => {
          if (response.data.success) {
            Toast.fire({
              type: "success",
              title: "Product Image Uploaded successfully"
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
    uploadcoverimage(file) {
      let files = file.target.files || file.dataTransfer.files;
      if (!files.length) return;
      this.createImage(files[0]);
    },
    createImage(file) {
      this.coverimage = file;
      const fr = new FileReader();
      fr.readAsDataURL(file);
      fr.addEventListener("load", () => {
        this.imageUrl = fr.result;
      });
    },

    onFileselected(file) {
      let files = file.target.files;
      if (!files.length) return;

      for (var pic = 0; pic < files.length; pic++) {
        this.createImages(files[pic]);
      }
    },
    createImages(file) {
      this.image.push(file);

      if (file.type == "application/pdf") {
        const fr = new FileReader();
        fr.readAsDataURL(file);
        fr.addEventListener("load", () => {
          this.images.push(
            "https://lh3.googleusercontent.com/W1Jwfw3dKIo8BsQFaLc0y4UflpgSUlDKiWn4LgjKXFW1Uxj1t8qfwYu987CnBDWdsENT"
          );
          //this.imageUrl = fr.result;
        });
      } else {
        Toast.fire({
          type: "error",
          title: "Only Pdf files are allowed"
        });
      }
    },

    getFileExtension(filename) {
      var ext = /^.+\.([^.]+)$/.exec(filename);
      return ext == null ? "" : ext[1] === "jpg" || "jpeg" || "png";
    },
    checkextension(extension) {
      if (extension === "jpg" || "jpeg" || "png") return true;
      return false;
    },

    addproduct() {
      const formdata = new FormData();
      for (var key in this.form) {
        formdata.append(key, this.form[key]);
      }
      formdata.append("image", this.coverimage);

      axios
        .post("/product", formdata, {
          headers: {
            "Content-Type": "multipart/form-data"
          }
        })
        .then(response => {
          if (response.data.success) {
            Toast.fire({
              type: "success",
              title: "product added successfully"
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
    updateproduct() {
      const formdata = new FormData();
      for (var key in this.form) {
        formdata.append(key, this.form[key]);
      }
      formdata.append("image", this.coverimage);
      formdata.append("_method", "PATCH");

      axios
        .post("/product/" + this.productid, formdata, {
          headers: {
            "Content-Type": "multipart/form-data"
          }
        })
        .then(response => {
          if (response.data.success) {
            Toast.fire({
              type: "success",
              title: "product Updated successfully"
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
    getallproduct() {
      axios.get("/product/create").then(response => {
        this.product = response.data[0];
        this.subproduct = response.data[1];
      });
    },
    getallauthor() {
      axios.get("/author").then(response => {
        this.author = response.data;
      });
    },
    getallpublisher() {
      axios.get("/publisher").then(response => {
        this.publisher = response.data;
      });
    },

    getallcategory() {
      axios.get("/category").then(response => {
        this.category = response.data;
      });
    },

    getallmedia() {
      axios.get("/media").then(response => {
        this.media = response.data;
      });
    },

    getalllanguage() {
      axios.get("/language").then(response => {
        this.language = response.data;
      });
    },
    goBack() {
      window.history.back();
    },
    saveformdata() {
      localStorage.setItem("productform", JSON.stringify(this.form));
    }
  },
  created() {
    // this.getallproduct();
    this.getallauthor();
    this.getallpublisher();
    this.getallcategory();
    this.getallmedia();
    this.getalllanguage();
    if (this.productid !== "") {
      this.productedit = true;
      axios.get("/product/" + this.productid).then(response => {
        this.form = response.data[0];
        this.imageUrl = "/file/" + response.data.image;
        if (response.data[0].pdffile) {
          this.images.push(
            "https://lh3.googleusercontent.com/W1Jwfw3dKIo8BsQFaLc0y4UflpgSUlDKiWn4LgjKXFW1Uxj1t8qfwYu987CnBDWdsENT"
          );
        }

        // this.parentstatus = true;
        // this.childstatus = true;
      });
    }
  },
  mounted() {
    if (localStorage.productform) {
      this.form = JSON.parse(localStorage.productform);
    }
  },
  watch: {
    form(newName) {
      localStorage.productform = newName;
    }
  }
};
</script>


<style scoped>
.select-css {
  display: block;
  font-size: 16px;
  font-family: sans-serif;
  font-weight: 500;
  color: #444;
  line-height: 1.3;
  padding: 0.6em 1.4em 0.5em 0.8em;
  width: 100%;
  max-width: 100%;
  box-sizing: border-box;
  margin: 0;
  border: 1px solid #aaa;
  box-shadow: 0 1px 0 1px rgba(5, 5, 5, 0.04);
  border-radius: 0.5em;
  -moz-appearance: none;
  -webkit-appearance: none;
  appearance: none;
  background-color: rgb(222, 232, 238);
  background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007CB2%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E"),
    linear-gradient(to bottom, #ffffff 0%, #e5e5e5 100%);
  background-repeat: no-repeat, repeat;
  background-position: right 0.7em top 50%, 0 0;
  background-size: 0.65em auto, 100%;
}
.select-css::-ms-expand {
  display: none;
}
.select-css:hover {
  border-color: #888;
}
.select-css:focus {
  border-color: #aaa;
  box-shadow: 0 0 1px 3px rgba(59, 153, 252, 0.7);
  box-shadow: 0 0 0 3px -moz-mac-focusring;
  color: #222;
  outline: none;
}
.select-css option {
  font-weight: normal;
}
input[type="file"] {
  display: none;
}
.custom-file-upload {
  border: 1px solid #ccc;
  display: inline-block;
  padding: 60px 120px;
  cursor: pointer;
}
.language {
  margin-top: -41px;
  position: absolute;
}
#lang {
  margin-top: 36px;
}
</style>
