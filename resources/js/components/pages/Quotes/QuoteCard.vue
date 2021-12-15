<template>
  <div class="quote-card">
    <div class="row">

      <!-- Quote Card Distance -->
      <div class="col-12 mb-2 mb-xl-0 col-xl-2">
        <div class="quote-card-distance">

          <div class="quote-card-distance-line">
            <div class="quote-card-distance-line--start"></div>
            <div class="quote-card-distance-line--line"></div>
            <div class="quote-card-distance-line--end"></div>
          </div>

          <div class="quote-card-distance-container">
            <div class="quote-card-block quote-card-distance-container--origin">
              {{ quote.origin.address_string }}
            </div>

            <div class="quote-card-block quote-card-distance-container--value">
              <span class="quote-card-bg-gray quote-card-text-gray">
                {{ format(quote.transport.distance) }} mi
              </span>
            </div>

            <div class="quote-card-block quote-card-distance-container--destination">
              {{ quote.destination.address_string }}
            </div>

          </div>

        </div>
      </div>
      <!-- Quote Card Distance -->

      <!-- Quote Card Vehicle -->
      <div class="col-12 mb-2 mb-xl-0 col-xl-3">
        <div class="quote-card-vehicle">

          <div class="quote-card-block quote-card-vehicle--info">
            <span :class="`${quote.vehicle.is_running ? 'quote-card-bg-gray' : 'quote-card-bg-red' }`">
              {{ quote.vehicle.vehicle_string }} <span
              class="ml-1 quote-card-text-gray">{{ quote.vehicle.size_name }}</span>
            </span>
          </div>

        </div>
      </div>
      <!-- Quote Card Vehicle -->

      <!-- Quote Card Quote -->
      <div class="col-12 mb-2 mb-xl-0 col-xl-2">
        <div class="quote-card-quote">
          <div class="quote-card-block quote-card-quote--payment">
            <span class="quote-card-icon-container">
              <i class="quote-card-icon bx bx-credit-card"></i>
            </span>
            $ {{ format(quote.transport.price) }} 30 days <span class="ml-1 quote-card-text-gray">$4.63/mi</span>
          </div>

          <div class="quote-card-block quote-card-quote--created">
            <span class="quote-card-icon-container">
              <i class="quote-card-icon bx bx-calendar"></i>
              <span class="quote-card-icon-container--text">
                Posted
              </span>
            </span>
            {{ quote.diff_for_humans }}
          </div>

          <div class="quote-card-block quote-card-quote--available">
            <span class="quote-card-icon-container">
              <i class="quote-card-icon bx bx-calendar"></i>
              <span class="quote-card-icon-container--text">
                Available on
              </span>
            </span>
            {{ quote.transport.available_date_for_humans }}
          </div>
        </div>
      </div>
      <!-- Quote Card Quote -->

      <div class="col-12 mb-2 mb-xl-0 col-xl-2">
        <div class="quote-card-info">
          <div class="quote-card-block quote-card-info--shipper">
            <span class="quote-card-icon-container">
              <i class="quote-card-icon bx bxs-business"></i>
            </span>
            BacklotCars Inc
          </div>
          <div class="quote-card-block quote-card-info--load">
            <span class="quote-card-icon-container">
              <i class="quote-card-icon bx bx-hash"></i>
              <span class="quote-card-icon-container--text">
                Load ID
              </span>
            </span>
            TR7661
          </div>
          <div class="quote-card-block quote-card-info--route">
            <span class="quote-card-icon-container">
              <i class="quote-card-icon bx bxs-map"></i>
            </span>
            View Route
          </div>
        </div>
      </div>

      <div class="col-12 mb-2 mb-xl-0 col-xl-3">
        <div class="btn btn-primary">
          Request $ {{ format(quote.transport.price) }}
        </div>
        <div class="btn-group">
          <button type="button" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            ...
          </button>
          <div style="cursor: pointer;" class="dropdown-menu">
            <a v-if="quote.converts_to_order" @click="$emit('convert-to-order', quote)" class="dropdown-item">Convert to Order</a>
            <router-link
              class="dropdown-item"
              :to="{ name: 'shipper.orders.review', params: { shipper_id: $route.params.shipper_id, quote_id: quote.id }}"
            >
              Preview
            </router-link>
            <a v-if="quote.status_name !== 'Deleted'" @click="$emit('send-email', quote)" class="dropdown-item">Send Email</a>
            <a v-if="quote.status_name !== 'Deleted'" @click.prevent="$emit('edit', quote.id)" class="dropdown-item">Edit</a>
            <a v-if="quote.status_name === 'Deleted'" @click="$emit('restore', quote.id)" class="dropdown-item">Restore</a>
            <a v-else @click="$emit('delete', quote.id)" class="dropdown-item">Delete</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import format from "../../../help/number-formatter";

  export default {
    name: "QuoteCard",
    props: ['quote'],
    data() {
      return {}
    },
    methods: {
      format
    }
  }
</script>

<style lang="scss" scoped>
  .quote-card {
    padding: 20px;
    font-size: 15px;
    border: 1px solid #eee;
    margin-bottom: 20px;
    box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
    border-radius: 4px;

    &-block {
      margin-bottom: 6px;
      display: flex;

      &:last-child {
        margin-bottom: 0;
      }
    }

    &-text-gray {
      color: #68707d;
    }

    &-bg-gray {
      border-radius: 5px;
      padding: 0 5px;
      background: #f3f5f8;
    }

    &-bg-red {
      border-radius: 5px;
      padding: 0 5px;
      background: #ffedea;
    }

    &-distance {
      display: flex;

      &-line {
        width: 10px;
        margin-right: 10px;
        display: flex;
        flex-direction: column;
        height: auto;
        padding-top: 5px;
        padding-bottom: 5px;

        &--start {
          width: 100%;
          height: 18px;
          background: #ffca47;
          border-radius: 50%;
        }

        &--line {
          width: 55%;
          height: 100%;
          margin-top: 5px;
          margin-bottom: 5px;
          border-right: 2px dashed #8f949e;
        }

        &--end {
          width: 100%;
          height: 17px;
          background: #1da94c;
          border-radius: 50%;
        }
      }
    }

    &-icon {
      &-container {
        color: #8f949e;
        display: flex;
        align-items: center;
        justify-content: center;

        &--text {
          margin-right: 8px;
        }
      }

      font-size: 16px;
      margin-right: 6px;
    }
  }
</style>
