<template>
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Orders</h6>

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
                @click="selectTab('Approved')"
                :class="`btn quotes-tabs--item ${ activeTab === 'Approved' ? 'quotes-tabs--item-active' :  '' }`"
              >
                Created
                <span class="bg-gray text-gray">
                  {{ items ? items.filter(filterMap["Approved"]).length : 0 }}
                </span>
              </div>
              <div
                @click="selectTab('Paid')"
                :class="`btn quotes-tabs--item ${ activeTab === 'Paid' ? 'quotes-tabs--item-active' :  '' }`"
              >
                Paid
                <span class="bg-gray text-gray">
                  {{ items ? items.filter(filterMap["Paid"]).length : 0 }}
                </span>
              </div>

              <div
                @click="selectTab('Assigned to Load')"
                :class="`btn quotes-tabs--item ${ activeTab === 'Assigned to Load' ? 'quotes-tabs--item-active' :  '' }`"
              >
                Assigned to Load
                <span class="bg-gray text-gray">
                  {{ items ? items.filter(filterMap["Assigned to Load"]).length : 0 }}
                </span>
              </div>
              <div
                @click="selectTab('Out for Delivery')"
                :class="`btn quotes-tabs--item ${ activeTab === 'Out for Delivery' ? 'quotes-tabs--item-active' :  '' }`"
              >
                Out for Delivery
                <span class="bg-gray text-gray">
                  {{ items ? items.filter(filterMap["Out for Delivery"]).length : 0 }}
                </span>
              </div>
              <div
                @click="selectTab('Delivered')"
                :class="`btn quotes-tabs--item ${ activeTab === 'Delivered' ? 'quotes-tabs--item-active' :  '' }`"
              >
                Delivered
                <span class="bg-gray text-gray">
                  {{ items ? items.filter(filterMap["Delivered"]).length : 0 }}
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

            <div v-if="user && user.role !== 'Client'" class="quotes-create">
              <router-link :to="'/shipper/' + $route.params.shipper_id  + '/orders/create'" class="btn btn-primary mr-2 mb-2 mb-md-0">
                Create Order
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

        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import {client} from "../../../axios";
  import {mapGetters, mapActions} from "vuex";
  import {
    ACTION_QUOTE_DELETE,
    ACTION_QUOTE_EMAIL,
    ACTION_QUOTE_RESTORE,
    ACTION_QUOTE_TO_ORDER
  } from "../../../store/modules/quote/actions";
  import router from "../../../router";
  import format from "../../../help/number-formatter";
  import QuoteCard from "../Quotes/QuoteCard";
  import {GETTER_USER_USER} from "../../../store/modules/user/getters";

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
          ["Approved"]: i => { return i.status_name === "Approved"; },
          ["Paid"]: i => { return i.status_name === "Paid"; },
          ["Assigned to Load"]: i => { return i.status_name === "Assigned to Load"; },
          ["Out for Delivery"]: i => { return i.status_name === "Out for Delivery"; },
          ["Delivered"]: i => { return i.status_name === "Delivered"; },
          ["Deleted"]: i => { return i.status_name === "Deleted"; },
        },
        /* Items filter */

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
      },
      ...mapGetters({
        user: 'user/' + GETTER_USER_USER
      })
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
            this.$swal('Success', 'This quote has been successfully converted to Order!', 'success')
              .then(() => {
                this.loadQuotes();
              });
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
            this.$swal('Success', 'This order has been successfully restored', 'success')
              .then(() => {
                this.loadQuotes();
              });
          })
          .catch(err => {
            this.$swal('Error', 'Could not restore this order', 'error');
          })
      },
      sendDeleteQuoteRequest(quote_id) {

        const routeParams = {
          shipper_id: this.$route.params.shipper_id,
          quote_id
        };

        this.deleteQuote(routeParams)
          .then(res => {
            this.$swal('Success', 'This order has been successfully deleted', 'success')
              .then(() => {
                this.loadQuotes();
              });
          })
          .catch(err => {
            this.$swal('Error', 'Could not delete this order', 'error');
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
        client.get('/api/shipper/' + this.$route.params.shipper_id + '/orders')
          .then(res => {
            this.items = [...res.data.data];
          })
          .catch(err => {
            this.$swal('Error', 'Could not get orders', 'error')
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
