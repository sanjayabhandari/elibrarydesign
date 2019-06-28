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
      <v-layout row justify-center>
        <v-dialog v-model="dialog" max-width="500px">
          <!-- <v-btn color="primary" dark slot="activator">Open Dialog</v-btn> -->
          <v-card>
            <v-card-title>
              <span class="headline" v-if="!publisheredit">Add Language</span>
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
                              <v-text-field label="Nmae " name="name" v-model="form.pub_name"></v-text-field>
                            </v-flex>
                            <v-flex lg12 sm12>
                              <v-text-field label="Address" name="Location" v-model="form.address"></v-text-field>
                            </v-flex>
                            <v-flex lg12 sm12>
                              <v-text-field label="Contact" name="con" v-model="form.contact"></v-text-field>
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
                            <v-flex lg12 sm12>
                              <tinymce id="d1" v-model="form.description"></tinymce>
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
              <v-btn
                v-if="!publisheredit"
                color="blue darken-1"
                flat
                @click.native="addpublisher"
              >Save</v-btn>
              <v-btn
                v-if="!publisheredit"
                color="blue darken-1"
                flat
                @click.native="addpublisher"
              >Save</v-btn>
              <v-btn v-else color="blue darken-1" flat @click.native="updatepublisher">Update</v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </v-layout>
    </v-layout>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary" style="height:70px;">
              <h4 class="card-title">
                All Publisher
                <v-btn icon href="/admin/publisher/create" slot="widget-header-action">
                  <i class="material-icons white--text">add</i>
                </v-btn>
                <!--     <v-btn icon   @click.prevent="dialog=true,form='',publisheredit=false"
              slot="widget-header-action" >
                <i class="material-icons white--text">add</i>
                </v-btn>-->
                <v-btn icon slot="widget-header-action " href="/admin/setting">
                  <v-icon class="text--secondary">reply</v-icon>
                </v-btn>
              </h4>

              <p class="card-publisher"></p>
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
                    :items="publisher"
                    :search="search"
                    :rows-per-page-items="[10,25,50,{text:'All','value':-1}]"
                  >
                    <template v-slot:items="props">
                      <td>{{ props.item.pub_name }}</td>
                      <td>{{ props.item.address }}</td>
                      <td>{{ props.item.contact }}</td>
                      <td v-html="props.item.description"></td>

                      <td class="text-xs-right">
                        <v-btn icon small class="green--text" v-if="props.item.status==1">
                          <i class="material-icons">check</i>
                        </v-btn>
                        <v-btn icon small class="red--text" v-else>
                          <i class="material-icons">cancel</i>
                        </v-btn>
                      </td>

                      <td>
                        <!--       <v-btn icon @click.prevent="editpublisher(props.item)"
                    
                        >
                          <i class="material-icons medium green--text">edit</i>
                        </v-btn>-->
                        <v-btn icon :href="'/admin/publisher/create/'+props.item.id">
                          <i class="material-icons medium green--text">edit</i>
                        </v-btn>
                        <v-btn href="#" @click.prevent="deletepublisher(props.item.id)" icon>
                          <i class="material-icons medium red--text">delete</i>
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
      form: {},
      publisheredit: false,
      search: "",
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
      headers: [
        {
          text: "publisher Name",
          align: "left",
          value: "pub_name"
        },
        {
          text: "Address",
          value: "address"
        },
        {
          text: "Contact",
          value: "contact"
        },
        {
          text: "Description",
          value: "description"
        },
        { text: "Status", value: "status" },

        { text: "Action", value: "", sortable: false }
      ],
      publisher: [],
      publisherdata: {},
      dialog: false
    };
  },
  methods: {
    editpublisher(data) {
      this.publisheredit = true;
      this.form = data;
      this.dialog = true;
    },
    showallinfo(data) {
      this.dialog = true;
      this.publisherdata = data;
    },
    getallpublisher() {
      this.loading = true;
      axios.get("/publisher").then(response => {
        this.loading = false;
        this.publisher = response.data;
      });
    },
    addpublisher() {
      axios
        .post("/publisher", this.form)
        .then(response => {
          if (response.data.success) {
            this.getallpublisher();
            this.form = "";
            this.dialog = false;
            Toast.fire({
              type: "success",
              title: "publisher added successfully"
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
    updatepublisher() {
      axios
        .put("/publisher/" + this.form.id, this.form)
        .then(response => {
          if (response.data.success) {
            this.getallpublisher();
            this.form = "";
            this.dialog = false;
            this.publisheredit = false;
            Toast.fire({
              type: "success",
              title: "publisher Updated successfully"
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
    deletepublisher(id) {
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
            axios.delete("/publisher/" + id).then(response => {
              if (response.data.success) {
                swalWithBootstrapButtons.fire(
                  "Deleted!",
                  "Publisher has been deleted.",
                  "success"
                );
                this.getallpublisher();
              } else {
                Toast.fire({
                  type: "error",
                  title: "publisher not deleted"
                });
              }
            });
          } else if (
            // Read more about handling dismissals
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire(
              "Cancelled",
              "Publisher not deleted :)",
              "error"
            );
          }
        });
    }
  },
  created() {
    this.getallpublisher();
  }
};
</script>

<style>
</style>
