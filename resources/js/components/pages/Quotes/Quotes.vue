<template>
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Quotes</h6>

          <div class="mt-3 mb-3 d-flex quotes-top-area">

            <div class="quotes-tabs">
              <div
                @click="selectTab('All')"
                :class="`btn quotes-tabs--item ${ activeTab === 'All' ? 'quotes-tabs--item-active' :  '' }`"
              >
                All
                <span class="bg-gray text-gray">
                  {{ items ? items.filter(filterMap["All"]).length : 0 }}
                </span>
              </div>
              <div
                @click="selectTab('Quote')"
                :class="`btn quotes-tabs--item ${ activeTab === 'Quote' ? 'quotes-tabs--item-active' :  '' }`"
              >
                Created
                <span class="bg-gray text-gray">
                  {{ items ? items.filter(filterMap["Quote"]).length : 0 }}
                </span>
              </div>
              <div
                @click="selectTab('Sent')"
                :class="`btn quotes-tabs--item ${ activeTab === 'Sent' ? 'quotes-tabs--item-active' :  '' }`"
              >
                Sent
                <span class="bg-gray text-gray">
                  {{ items ? items.filter(filterMap["Sent"]).length : 0 }}
                </span>
              </div>
              <div
                @click="selectTab('Viewed')"
                :class="`btn quotes-tabs--item ${ activeTab === 'Viewed' ? 'quotes-tabs--item-active' :  '' }`"
              >
                Viewed
                <span class="bg-gray text-gray">
                  {{ items ? items.filter(filterMap["Viewed"]).length : 0 }}
                </span>
              </div>
              <div
                @click="selectTab('Approved')"
                :class="`btn quotes-tabs--item ${ activeTab === 'Approved' ? 'quotes-tabs--item-active' :  '' }`"
              >
                Approved
                <span class="bg-gray text-gray">
                  {{ items ? items.filter(filterMap["Approved"]).length : 0 }}
                </span>
              </div>
              <div
                @click="selectTab('Deleted')"
                :class="`btn quotes-tabs--item ${ activeTab === 'Deleted' ? 'quotes-tabs--item-active' :  '' }`"
              >
                Deleted
                <span class="bg-gray text-gray">
                  {{ items ? items.filter(filterMap["Deleted"]).length : 0 }}
                </span>
              </div>
            </div>

            <div class="quotes-create">
              <router-link :to="'/shipper/' + $route.params.shipper_id  + '/quotes/create'" class="btn btn-primary mr-2 mb-2 mb-md-0">
                Create Quote
              </router-link>
            </div>

          </div>

          <div v-if="filteredItems && filteredItems.length" class="quotes">
            <paginate
              ref="paginator"
              name="filteredItems"
              :list="filteredItems"
              :per="perPage"
              class="paginate-list"
              tag="div"
            >

              <div class="row">
                <div class="col-12">

                  <quote-card
                    :key="i" v-for="(item, i) in paginated('filteredItems')"
                    :quote="item"
                    v-on:convert-to-order="convertQuoteToOrder"
                    v-on:send-email="emailQuoteToClient"
                    v-on:edit="editQuote"
                    v-on:delete="sendDeleteQuoteRequest"
                    v-on:restore="sendRestoreQuoteRequest"
                  ></quote-card>

                </div>
              </div>

            </paginate>
          </div>

          <div v-if="filteredItems && filteredItems.length" class="quotes-links">
            <div class="row">
              <div class="col-sm-12 col-md-5">
                <span v-if="$refs.paginator">
                  Showing {{$refs.paginator.pageItemsCount}} entries
                </span>
              </div>

              <div class="col-sm-12 col-md-7">
                <div class="quotes-links-pagination">
                  <paginate-links
                    for="filteredItems"
                    :show-step-links="true"
                    :classes="{
                      'ul': 'pagination',
                      'li': 'page-item',
                      'a': 'page-link',
                      // 'a': ['prev-link', 'another-class']
                    }"
                  ></paginate-links>
                </div>
              </div>
            </div>
          </div>

          <!-- Quotes Legacy -->
          <div v-if="quotes" class="table-responsive">
            <table id="dataTableExample" class="table table-striped">
              <thead>
              <tr>
                <th>ID</th>
                <th>Shipper</th>
                <th>Origin</th>
                <th>Destination</th>
                <th>Carrier</th>
                <th>Vehicle</th>
                <th>Price</th>
                <th>Deposit</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
              <tr v-for="item in quotes">
                <td>Q{{ item.id }}</td>
                <td>{{ item.shipper.full_name }}</td>
                <td>{{ item.origin.address_string }}</td>
                <td>{{ item.destination.address_string }}</td>
                <td>{{ item.transport.carrier_name }} Transport</td>
                <td>
                  <div class="mb-1" v-for="vehicle in item.vehicles">
                    {{ vehicle.make }} {{ vehicle.model }} {{ vehicle.year }}
                  </div>
                </td>
                <td>$ {{ item.transport.price ? format(item.transport.price, ' ') : 0 }}</td>
                <td>$ {{ item.transport.deposit ? format(item.transport.deposit, ' ') : 0 }}</td>
                <td>{{ item.status_name }}</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      ...
                    </button>
                    <div style="cursor: pointer;" class="dropdown-menu">
                      <a @click="convertQuoteToOrder(item)" class="dropdown-item">Convert to Order</a>
                      <router-link class="dropdown-item" :to="{ name: 'shipper.orders.review', params: { shipper_id: $route.params.shipper_id, quote_id: item.id }}">
                        Preview
                      </router-link>
                      <a @click="emailQuoteToClient(item)" class="dropdown-item">Send Email</a>
                      <a @click.prevent="editQuote(item.id)" class="dropdown-item">Edit</a>
                      <a @click="sendDeleteQuoteRequest(item.id)" class="dropdown-item">Delete</a>
                    </div>
                  </div>
                </td>
              </tr>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import {client} from "../../../axios";
  import {mapActions} from "vuex";
  import {
    ACTION_QUOTE_DELETE,
    ACTION_QUOTE_EMAIL,
    ACTION_QUOTE_RESTORE,
    ACTION_QUOTE_TO_ORDER
  } from "../../../store/modules/quote/actions";
  import router from "../../../router";
  import format from "../../../help/number-formatter";
  import QuoteCard from "./QuoteCard";

  export default {
    name: "Quotes",
    data () {
      return {
        /* Pagination */
        perPage: 5,
        items: null,
        paginate: ['filteredItems'],
        /* Pagination */

        /* Items Filter */
        activeTab: 'All',
        filterMap: {
          ["All"]: i => { return i.status_name !== "Deleted" },
          ["Quote"]: i => { return i.status_name === "Quote"; },
          ["Sent"]: i => { return i.status_name === "Sent"; },
          ["Viewed"]: i => { return i.status_name === "Viewed"; },
          ["Approved"]: i => { return i.status_name === "Approved"; },
          ["Deleted"]: i => { return i.status_name === "Deleted"; },
        },
        /* Items filter */

        quotes: null,
        dataTable: null,
        sendingEmail: false
      }
    },
    components: {
      QuoteCard
    },
    computed: {
      filteredItems () {
        if (!this.items) return [];

        const filter = this.filterMap[this.activeTab] || this.filterMap["All"];
        return this.items.filter(filter);
      }
    },
    methods: {
      /* Items filter */
      selectTab (tabName) {
        this.activeTab = tabName;
      },
      /* Items filter */

      ...mapActions({
        deleteQuote: 'quote/' + ACTION_QUOTE_DELETE,
        emailQuote: 'quote/' + ACTION_QUOTE_EMAIL,
        quoteToOrder: 'quote/' + ACTION_QUOTE_TO_ORDER,
        restoreQuote: 'quote/' + ACTION_QUOTE_RESTORE
      }),
      format,
      convertQuoteToOrder(quote) {
        if (this.sendingEmail) return;

        const routeParams = {
          shipper_id: this.$route.params.shipper_id,
          quote_id: quote.id
        };

        const payload = {
          routeParams,
          quote
        }

        this.sendingEmail = true;
        this.$swal.fire({
          title: 'Converting Quote to Order',
          text: 'Your Quote is now being converted to Order',
          onOpen: () => {
            this.$swal.showLoading();
          }
        });

        this.quoteToOrder(payload)
          .then(res => {
            if (res.data.redirect) {
              this.sendingEmail = false;
              this.$swal.close();
              router.push(res.data.redirect);
            } else {
              this.$swal('Success', 'This quote has been successfully converted to Order!', 'success')
                .then(() => {
                  this.loadQuotes();
                });
            }
          })
          .catch(err => {
            this.$swal.close();
          })
          .finally(() => {
            this.sendingEmail = false;
          })

      },

      editQuote(quote_id) {
        router.push({
          name: 'shipper.orders.edit',
          params: {
            shipper_id: this.$route.params.shipper_id,
            quote_id: quote_id
          }
        });
      },
      sendRestoreQuoteRequest(quote_id) {
        const routeParams = {
          shipper_id: this.$route.params.shipper_id,
          quote_id
        };

        this.restoreQuote(routeParams)
          .then(res => {
            this.$swal('Success', 'This quote has been successfully restored', 'success')
              .then(() => {
                this.loadQuotes();
              });
          })
          .catch(err => {
            this.$swal('Error', 'Could not restore this quote', 'error');
          })
      },
      sendDeleteQuoteRequest(quote_id) {

        const routeParams = {
          shipper_id: this.$route.params.shipper_id,
          quote_id
        };

        this.deleteQuote(routeParams)
          .then(res => {
            this.$swal('Success', 'This quote has been successfully deleted', 'success')
              .then(() => {
                this.loadQuotes();
              });
          })
          .catch(err => {
            this.$swal('Error', 'Could not delete this quote', 'error');
          })
      },

      /* Email block*/
      emailQuoteToClient(quote) {
        if (this.sendingEmail) return;

        const routeParams = {
          shipper_id: this.$route.params.shipper_id,
          quote_id: quote.id
        };

        const payload = {
          routeParams,
          quote
        }

        this.sendingEmail = true;
        this.$swal.fire({
          title: 'Sending email',
          text: 'Your email is now being sent',
          onOpen: () => {
            this.$swal.showLoading();
          }
        });

        this.emailQuote(payload)
          .then(res => {
            this.$swal.close();
            setTimeout(() => {
              this.$swal.fire({
                title: 'Success',
                text: 'Email has been successfully sent',
                icon: 'success',
                onOpen: () => {
                  setTimeout(() => {
                    this.$swal.close()
                  }, 1000);
                },
                showConfirmButton: false
              })
            }, 0);
            this.loadQuotes();
          })
          .catch(err => {
            this.$swal.close();
          })
          .finally(() => {
            this.sendingEmail = false;
          })
      },
      /* Email block end */

      datatable() {
        var dt = $('#dataTableExample').DataTable({
          "aLengthMenu": [
            [10, 30, 50, -1],
            [10, 30, 50, "All"]
          ],
          "iDisplayLength": 10,
          "language": {
            search: ""
          },
          "order": []
        });
        dt.each(function() {
          var datatable = $(this);
          // SEARCH - Add the placeholder for Search and Turn this into in-line form control
          var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
          search_input.attr('placeholder', 'Search');
          search_input.removeClass('form-control-sm');
          // LENGTH - Inline-Form control
          var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
          length_sel.removeClass('form-control-sm');
        });

        this.dataTable = dt;

        $('.dropdown-menu').click(function(e) {
          e.stopPropagation();
        });
      },
      loadQuotes() {
        client.get('/api/shipper/' + this.$route.params.shipper_id + '/quotes')
          .then(res => {
            // if (this.dataTable) this.dataTable.destroy();
            //
            // this.quotes = [...res.data.data];
            // setTimeout(() => {
            //   this.datatable();
            // }, 0);

            this.items = [...res.data.data];
          })
          .catch(err => {
            this.$swal('Error', 'Could not get quotes', 'error')
          })
      },
    },
    mounted() {
      this.loadQuotes();
    }
  }
</script>

<style lang="scss" scoped>
  .quotes-links {
    ul.pagination {
      justify-content: flex-end;
    }
  }

  .quotes-top-area {
    display: flex;
    align-items: center;
  }

  .bg-gray {
    border-radius: 5px;
    padding: 0 5px;
    background: #f3f5f8;
  }

  .text-gray {
    color: #68707d;
  }

  .quotes-tabs {
    display: flex;
    &--item {
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;

      padding-bottom: 15px;
      font-weight: 400;
      border-bottom: 2px solid transparent;
      border-radius: 0;

      &-active {
        border-bottom: 2px solid #2660f7;
      }

      &:hover {
        border-bottom: 2px solid #c4c4c4;
      }
    }
  }

  .quotes-create {
    margin-left: auto;
  }
</style>
