<template>
  <div class="row">
    <div class="col-lg-12 col-md-12 mt-0">
      <div class="card">
        <div class="card-header card-header-tabs card-header-primary">
          <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
              <span class="nav-tabs-title">Category:</span>
              <ul class="nav nav-tabs" data-tabs="tabs">
                <li class="nav-item">
                  <a class="nav-link active" href="#basicdetails" data-toggle="tab">
                    <i class="material-icons">transform</i> Basic Details
                    <div class="ripple-container"></div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#image" data-toggle="tab">
                    <i class="material-icons">image</i> Image
                    <div class="ripple-container"></div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#seosettings" data-toggle="tab">
                    <i class="material-icons">settings</i> Seo Settings
                    <div class="ripple-container"></div>
                  </a>
                </li>
                <v-spacer></v-spacer>
                <li class="nav-item" style="float:right;">
                  <v-btn icon slot="widget-header-action " @click="goBack">
                    <v-icon class="white--text">reply</v-icon>
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
                  <div class="form-group">
                    <label for="category">categoryname</label>
                    <input type="text" class="form-control" id="category" v-model="form.cat_name">
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label for="status">Level</label>
                        <select
                          class="form-control select-css"
                          v-model="form.level"
                          id="status"
                          @change="setstatus"
                        >
                          <option
                            v-for="item in level"
                            :key="item.index"
                            :value="item.value"
                          >{{item.name}}</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-lg-4" v-if="form.level">
                      <div v-if="form.level!=0">
                        <div class="form-group" v-if="parentstatus">
                          <label for="status">Parent</label>
                          <select class="form-control select-css" v-model="form.parent" id="status">
                            <option
                              v-for="item in category"
                              :key="item.index"
                              :value="item.id"
                            >{{item.cat_name}}</option>
                          </select>
                        </div>

                        <div class="form-group" v-if="childstatus">
                          <label for="status">Child</label>
                          <select class="form-control select-css" v-model="form.child" id="status">
                            <option
                              v-for="item in subcategory"
                              :key="item.index"
                              :value="item.id"
                            >{{item.cat_name}}</option>
                          </select>
                        </div>
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
                    <label for="exampleFormControlTextarea1">Description</label>
                    <!-- <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea> -->
                    <tinymce id="d1" v-model="form.description"></tinymce>
                  </div>
                </form>
              </div>
            </div>
            <div class="tab-pane" id="image">
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
                <!-- <div class="col-md-6">
                  <v-img class="white--text" v-if="imageUrl" :src="imageUrl" aspect-ratio="1.75"></v-img>
                </div>-->
              </div>
            </div>
            <div class="tab-pane" id="seosettings">
              <div class="card-body">
                <form>
                  <div class="form-group">
                    <label for="category">Meta Tag</label>
                    <input type="text" class="form-control" id="category" v-model="form.meta_tag">
                  </div>
                  <div class="form-group">
                    <label for="category">Meta Title</label>
                    <input type="text" class="form-control" id="category" v-model="form.meta_title">
                  </div>
                  <div class="form-group">
                    <label for="category">Meta Description</label>
                    <tinymce id="d2" v-model="form.meta_description"></tinymce>
                  </div>
                  <a
                    href="#"
                    class="btn btn-success"
                    @click.prevent="addcategory"
                    v-if="!categoryedit"
                  >Submit</a>
                  <a href="#" class="btn btn-primary" @click.prevent="updatecategory" v-else>Update</a>
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
  props: ["categoryid"],
  data() {
    return {
      category: [],
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
      level: [
        {
          name: "Parent",
          value: 0
        },
        {
          name: "Child",
          value: 1
        },
        {
          name: "Sub Child",
          value: 2
        }
      ],
      url: "/api/test",

      filesUploaded: [],
      form: {},
      parentstatus: false,
      childstatus: false,
      subcategory: [],
      image: null,
      categoryedit: false,
      imageUrl: ""
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
    setstatus(e) {
      let level = e.target.value;
      if (level == 0) {
        this.parentstatus = false;
        this.childstatus = false;
        this.form.parent = 0;
        this.form.child = 0;
      }
      if (level == 1) {
        this.parentstatus = true;
        this.childstatus = false;
        this.form.child = 0;
      }
      if (level == 2) {
        this.parentstatus = false;
        this.childstatus = true;
      }
    },
    addcategory() {
      const formdata = new FormData();
      for (var key in this.form) {
        formdata.append(key, this.form[key]);
      }
      formdata.append("image", this.image);

      axios
        .post("/category", formdata, {
          headers: {
            "Content-Type": "multipart/form-data"
          }
        })
        .then(response => {
          if (response.data.success) {
            Toast.fire({
              type: "success",
              title: "catgory added successfully"
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
    updatecategory() {
      const formdata = new FormData();
      for (var key in this.form) {
        formdata.append(key, this.form[key]);
      }
      formdata.append("image", this.image);
      formdata.append("_method", "PATCH");
      console.log(formdata);

      axios
        .post("/category/" + this.categoryid, formdata, {
          headers: {
            "Content-Type": "multipart/form-data"
          }
        })
        .then(response => {
          if (response.data.success) {
            Toast.fire({
              type: "success",
              title: "catgory Updated successfully"
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
    getallcategory() {
      axios.get("/category/create").then(response => {
        this.category = response.data[0];
        this.subcategory = response.data[1];
      });
    },
    goBack() {
      window.history.back();
    }
  },
  created() {
    this.getallcategory();
    if (this.categoryid !== "") {
      this.categoryedit = true;
      axios.get("/category/" + this.categoryid).then(response => {
        this.form = response.data;
        this.imageUrl = "/files/category/" + response.data.image;
        // this.parentstatus = true;
        // this.childstatus = true;
      });
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
</style>
