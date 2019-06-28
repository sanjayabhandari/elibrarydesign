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
      <v-dialog v-model="dialog" max-width="500px">
        <!-- <v-btn color="primary" dark slot="activator">Open Dialog</v-btn> -->
        <v-card>
          <v-card-title>
            <span class="headline" v-if="!languageedit">Add Language</span>
            <span class="headline" v-else>Update Language</span>
          </v-card-title>
          <v-divider></v-divider>
          <v-card-text>
            <v-container grid-list-md>
              <v-layout wrap>
                <v-flex lg12>
                  <v-card>
                    <v-card-text>
                      <v-form>
                        <v-layout row wrap>
                          <v-flex lg12 sm12>
                            <v-text-field
                              label="Language "
                              name="category"
                              v-model.lazy="form.name"
                            ></v-text-field>
                          </v-flex>
                          <v-flex lg12 sm12>
                            <v-text-field
                              label="Nationality"
                              name="category"
                              v-model="form.nationality"
                            ></v-text-field>
                          </v-flex>
                          <v-flex lg12 sm12>
                            <v-select
                              name="status"
                              :items="status"
                              item-text="name"
                              item-value="value"
                              v-model="form.status"
                              label="Status"
                            ></v-select>
                          </v-flex>

                          <v-spacer></v-spacer>
                        </v-layout>
                      </v-form>
                    </v-card-text>
                  </v-card>
                </v-flex>
              </v-layout>
            </v-container>
          </v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>

            <v-btn color="blue darken-1" flat @click.native="dialog = false">Close</v-btn>
            <v-btn v-if="!languageedit" color="blue darken-1" flat @click.native="addlanguage">Save</v-btn>
            <v-btn v-else color="blue darken-1" flat @click.native="updatelanguage">Update</v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
    </v-layout>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary" style="height:70px;">
              <h4 class="card-title">
                All Language
                <v-btn icon href="/admin/language/create" slot="widget-header-action">
                  <i class="material-icons white--text">add</i>
                </v-btn>
                <v-btn icon slot="widget-header-action " href="/admin/setting">
                  <v-icon class="text--secondary">reply</v-icon>
                </v-btn>
              </h4>
              <!--          <a
                href="#"
                @click.prevent="dialog=true,form='',languageedit=false"
                class="btn btn-sm btn-purple"
                style="float:right;background-color:#9E38B4;margin-top:-10px;"
              >
                <i class="material-icons">add</i>
              </a>-->
              <p class="card-language"></p>
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
                    :items="language"
                    :search="search"
                    :rows-per-page-items="[10,25,50,{text:'All','value':-1}]"
                  >
                    <template v-slot:items="props">
                      <td>{{ props.item.name }}</td>
                      <td>{{ props.item.nationality }}</td>

                      <td>
                        <v-btn icon small class="green--text" v-if="props.item.status==1">
                          <i class="material-icons">check</i>
                        </v-btn>
                        <v-btn icon small class="red--text" v-else>
                          <i class="material-icons">cancel</i>
                        </v-btn>
                      </td>
                      <td>
                        <v-btn icon :href="'/admin/language/create/'+props.item.id">
                          <i class="material-icons medium green--text">edit</i>
                        </v-btn>
                        <!--     <v-btn icon @click.prevent="editlanguage(props.item)">
                          <i class="material-icons medium green--text">edit</i>
                        </v-btn>-->
                        <v-btn icon @click.prevent="deletelanguage(props.item.id)">
                          <i class="material-icons red--text medium">delete</i>
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
          text: "language ",
          align: "left",
          value: "name"
        },
        { text: "Nationality", value: "nationality" },
        { text: "Status", value: "status" },

        { text: "Action", value: "", sortable: false }
      ],
      language: [],
      languagedata: {},
      dialog: false,
      form: {},
      languageedit: false,
      status: [
        {
          name: "Active",
          value: 1
        },
        {
          name: "Deactive",
          value: 0
        }
      ]
    };
  },
  methods: {
    editlanguage(data) {
      this.form = data;
      this.dialog = true;
      this.languageedit = true;
    },
    showallinfo(data) {
      this.dialog = true;
      this.languagedata = data;
    },
    getalllanguage() {
      this.loading = true;
      axios.get("/language").then(response => {
        this.loading = false;
        this.language = response.data;
        console.table(this.language);
      });
    },
    addlanguage() {
      axios
        .post("/language", this.form)
        .then(response => {
          if (response.data.success) {
            this.getalllanguage();
            this.dialog = false;
            this.form = "";
            Toast.fire({
              type: "success",
              title: "language added successfully"
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
    updatelanguage() {
      axios
        .put("/language/" + this.form.id, this.form)
        .then(response => {
          if (response.data.success) {
            this.getalllanguage();
            this.dialog = false;
            this.form = "";
            Toast.fire({
              type: "success",
              title: "language Updated successfully"
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
    deletelanguage(id) {
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
            axios.delete("/language/" + id).then(response => {
              if (response.data.success) {
                swalWithBootstrapButtons.fire(
                  "Deleted!",
                  "Language has been deleted.",
                  "success"
                );
                this.getalllanguage();
              } else {
                Toast.fire({
                  type: "error",
                  title: "language not deleted"
                });
              }
            });
          } else if (
            // Read more about handling dismissals
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire(
              "Cancelled",
              "language not deleted :)",
              "error"
            );
          }
        });
    }
  },
  created() {
    this.getalllanguage();
  }
};
</script>

<style>
</style>
