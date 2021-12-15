<template>
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Create Load</h6>

          <div class="row">
            <div class="col-12 col-lg-6">
              <div class="row">

                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">

                      <div class="card-title mb-0 d-flex align-items-center">
                        <div class="card-title-icon mr-2">
                          <i class='bx bxs-file' ></i>
                        </div>
                        <h6>Load Information</h6>
                      </div>

                      <div class="forms-sample">

                        <div class="form-group">
                          <label for="custom_load_number">Custom Load Number</label>
                          <input v-model="formData.custom_load_number" class="form-control" id="custom_load_number" type="text" autocomplete="chrome-off" placeholder="Custom Load Number">
                        </div>

                        <div v-for="error in errors.custom_load_number" class="form-group validation-error">
                          {{ error }}
                        </div>

                        <div class="form-group">
                          <label for="referrer">Referrer</label>
                          <input v-model="formData.referrer" class="form-control" id="referrer" type="text" autocomplete="chrome-off" placeholder="Referrer">
                        </div>

                        <div v-for="error in errors.referrer" class="form-group validation-error">
                          {{ error }}
                        </div>

                        <div v-if="user && user.role !== 'Client'" class="form-group">
                          <label for="client">Client</label>

                          <select
                            class="form-control"
                            v-if="clients"
                            v-model="formData.client_id"
                            id="client"
                            @change="onClientSelect"
                          >
                            <option :value="null">New Client</option>
                            <option v-for="item in clients" :value="item.id">
                              {{ item.name }}, {{ item.company }}
                            </option>
                          </select>
                        </div>

                        <div v-if="user && user.role !== 'Client'" class="form-group">
                          <label for="driver">Driver</label>

                          <select
                            class="form-control"
                            v-if="drivers"
                            v-model="formData.driver_id"
                            id="driver"
                          >
                            <option :value="null">No Driver</option>
                            <option v-for="item in drivers" :value="item.id">
                              {{ item.name }}, {{ item.email }}
                            </option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label>Attachments</label>
                          <p class="card-description">
                            Maximum file size is 2M
                          </p>
                          <input class="form-control" type="file" multiple ref="attachments">
                        </div>

                        <div v-for="error in errors.attachments" class="form-group validation-error">
                          {{ error }}
                        </div>

                      </div>

                    </div>
                  </div>
                </div>

                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-title mb-0 d-flex align-items-center">
                        <div class="card-title-icon mr-2">
                          <i class='bx bx-user'></i>
                        </div>
                        <h6>Shipper Information</h6>
                      </div>

                      <form class="forms-sample">

                        <div class="form-group">
                          <label for="description">Load Description</label>
                          <input v-model="formData.description" class="form-control" id="description" type="text" autocomplete="chrome-off" placeholder="Load Description">
                        </div>

                        <div v-for="error in errors.description" class="form-group validation-error">
                          {{ error }}
                        </div>

                        <div class="form-group">
                          <label class="label-required" for="first_name">First Name</label>
                          <input v-model="formData.first_name" type="text" class="form-control" id="first_name"
                                 autocomplete="chrome-off" placeholder="First Name">
                        </div>

                        <div v-for="error in errors.first_name" class="form-group validation-error">
                          {{ error }}
                        </div>

                        <div class="form-group">
                          <label class="label-required" for="last_name">Last Name</label>
                          <input v-model="formData.last_name" type="text" class="form-control" id="last_name"
                                 autocomplete="chrome-off" placeholder="Last Name">
                        </div>

                        <div v-for="error in errors.last_name" class="form-group validation-error">
                          {{ error }}
                        </div>

                        <div class="form-group">
                          <label class="label-required" for="phone">Phone</label>
                          <the-mask
                            v-model="formData.phone"
                            placeholder="Phone Number"
                            mask="+1 (###) ###-####"
                            id="phone"
                            type="text"
                            class="form-control"
                          ></the-mask>
                        </div>

                        <div v-for="error in errors.phone" class="form-group validation-error">
                          {{ error }}
                        </div>

                        <div class="form-group">
                          <label class="label-required" for="email">Email</label>
                          <input v-model="formData.email" type="text" class="form-control" id="email" autocomplete="chrome-off"
                                 placeholder="Email">
                        </div>

                        <div v-for="error in errors.email" class="form-group validation-error">
                          {{ error }}
                        </div>

                        <div class="form-group">
                          <label class="label-required">Type</label>
                        </div>

                        <div class="form-group">
                          <div class="form-check form-check-inline">
                            <label class="form-check-label">
                              <input v-model="formData.type" type="radio" class="form-check-input" value="0">
                              Residence
                              <i class="input-frame"></i></label>
                          </div>
                          <div class="form-check form-check-inline">
                            <label class="form-check-label">
                              <input v-model="formData.type" type="radio" class="form-check-input" value="1">
                              Business
                              <i class="input-frame"></i></label>
                          </div>
                        </div>

                        <div v-for="error in errors.type" class="form-group validation-error">
                          {{ error }}
                        </div>

                        <div class="form-group">
                          <label class="label-required" for="company">Company</label>
                          <input v-model="formData.company" type="text" class="form-control" id="company"
                                 autocomplete="chrome-off" placeholder="Company">
                        </div>

                        <div v-for="error in errors.company" class="form-group validation-error">
                          {{ error }}
                        </div>

                        <div class="form-group">
                          <label for="address_1">Address 1</label>
                          <input v-model="formData.address_1" type="text" class="form-control" id="address_1"
                                 autocomplete="chrome-off" placeholder="Address 1">
                        </div>

                        <div v-for="error in errors.address_1" class="form-group validation-error">
                          {{ error }}
                        </div>

                        <div class="form-group">
                          <label for="address_2">Address 2</label>
                          <input v-model="formData.address_2" type="text" class="form-control" id="address_2"
                                 autocomplete="chrome-off" placeholder="Address 2">
                        </div>

                        <div v-for="error in errors.address_2" class="form-group validation-error">
                          {{ error }}
                        </div>

                        <div class="form-group has-predictions">
                          <label for="zip">Zip Code</label>
                          <input
                            v-mask="'#####'"
                            @input="autocompleteShipperByZip"
                            @focusout="onShipperZipFocusOut"
                            v-model="formData.zip"
                            type="text"
                            class="form-control"
                            id="zip"
                            autocomplete="chrome-off"
                            placeholder="Zip Code"
                          >

                          <div v-if="predictions.shipper.zip && predictions.shipper.zip.length" class="predictions">
                            <div @click="fillShipperInfoByZipPrediction(prediction)"
                                 v-for="prediction in predictions.shipper.zip" class="predictions-prediction p-2">
                              {{ prediction.description }}
                            </div>
                          </div>
                        </div>

                        <div v-for="error in errors.zip" class="form-group validation-error">
                          {{ error }}
                        </div>

                        <div class="form-group has-predictions">
                          <label for="city">City</label>
                          <input
                            v-model="formData.city"
                            @input="autocompleteShipperByCity"
                            @focusout="onShipperCityFocusOut"
                            type="text"
                            class="form-control"
                            id="city"
                            autocomplete="chrome-off"
                            placeholder="City"
                          >

                          <div v-if="predictions.shipper.city && predictions.shipper.city.length" class="predictions">
                            <div @click="fillShipperInfoByCityPrediction(prediction)"
                                 v-for="prediction in predictions.shipper.city" class="predictions-prediction p-2">
                              {{ prediction.description }}
                            </div>
                          </div>
                        </div>

                        <div v-for="error in errors.city" class="form-group validation-error">
                          {{ error }}
                        </div>

                        <div class="form-group">
                          <label for="state">State</label>

                          <select
                            class="form-control"
                            v-if="states"
                            v-model="formData.state"
                            id="state"
                          >
                            <option selected="" disabled="">State</option>
                            <option v-for="item in states" :value="item.key">
                              {{ item.value }}
                            </option>
                          </select>
                        </div>

                        <div v-for="error in errors.state" class="form-group validation-error">
                          {{ error }}
                        </div>

                        <div class="form-group">
                          <label for="phone_2">Phone 2</label>
                          <the-mask
                            v-model="formData.phone_2"
                            placeholder="Phone 2"
                            mask="+1 (###) ###-####"
                            id="phone_2"
                            type="text"
                            class="form-control"
                          ></the-mask>
                        </div>

                        <div v-for="error in errors.phone_2" class="form-group validation-error">
                          {{ error }}
                        </div>

                        <div class="form-group">
                          <label for="mobile">Mobile</label>
                          <the-mask
                            v-model="formData.mobile"
                            placeholder="Mobile"
                            mask="+1 (###) ###-####"
                            id="mobile"
                            type="text"
                            class="form-control"
                          ></the-mask>
                        </div>

                        <div v-for="error in errors.mobile" class="form-group validation-error">
                          {{ error }}
                        </div>

                        <div class="form-group">
                          <label for="fax">Fax</label>

                          <the-mask
                            v-model="formData.fax"
                            type="text"
                            placeholder="Fax"
                            mask="+1 (###) ###-####"
                            id="fax"
                            class="form-control"
                          ></the-mask>
                        </div>

                        <div v-for="error in errors.fax" class="form-group validation-error">
                          {{ error }}
                        </div>

                        <div class="form-group">
                          <label for="notes_from_shipper">Notes From Shipper</label>
                          <textarea v-model="formData.notes_from_shipper" type="text" class="form-control"
                                    id="notes_from_shipper" autocomplete="chrome-off"
                                    placeholder="Notes From Shipper"></textarea>
                        </div>

                        <div v-for="error in errors.notes_from_shipper" class="form-group validation-error">
                          {{ error }}
                        </div>

                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-6">
              <div class="row">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-title mb-0 d-flex align-items-center">
                        <div class="card-title-icon mr-2">
                          <i class='bx bxs-truck'></i>
                        </div>
                        <h6>Transport Information</h6>
                      </div>

                      <div class="form-group">
                        <label class="label-required" for="carrier_type">Carrier Type</label>
                        <select v-if="carrierTypes" v-model="formData.carrier_type" class="form-control"
                                id="carrier_type">
                          <option selected="" disabled="">Select Carrier Type</option>
                          <option v-for="item in carrierTypes" :value="item.key">
                            {{ item.value }}
                          </option>
                        </select>
                      </div>

                      <div v-for="error in errors.carrier_type" class="form-group validation-error">
                        {{ error }}
                      </div>

                      <div class="row">

                        <div class="col-6">

                          <div class="form-group">
                            <label class="label-required" for="available_accuracy">Available</label>
                            <select v-if="availableAccuracy" v-model="formData.available_accuracy" class="form-control" id="available_accuracy">
                              <option disabled>Select Available Accuracy</option>
                              <option :key="key" v-for="(item, key) in deliveryAccuracy" :value="item.key">
                                {{ item.value }}
                              </option>
                            </select>
                          </div>

                          <div :key="key" v-for="(error, key) in errors.available_accuracy" class="form-group validation-error">
                            {{ error }}
                          </div>

                        </div>

                        <div class="col-6">

                          <div class="form-group">
                            <label class="label-required" for="available_date">Available Date</label>
                            <div class="input-group date datepicker" id="available_date">
                              <input type="text" id="available_date_datepicker" class="form-control datePicker">
                              <span @click="showAvailableDateDatepicker" class="input-group-addon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg></span>
                            </div>
                          </div>

                          <div v-for="error in errors.available_date" class="form-group validation-error">
                            {{ error }}
                          </div>

                        </div>

                      </div>

                      <div class="row">
                        <div class="col-6">

                          <div class="form-group">
                            <label class="label-required" for="delivery_accuracy">Delivery</label>
                            <select v-if="deliveryAccuracy" v-model="formData.delivery_accuracy" class="form-control" id="delivery_accuracy">
                              <option disabled>Select Delivery Accuracy</option>
                              <option v-for="item in deliveryAccuracy" :value="item.key">
                                {{ item.value }}
                              </option>
                            </select>
                          </div>

                          <div v-for="error in errors.delivery_accuracy" class="form-group validation-error">
                            {{ error }}
                          </div>

                        </div>

                        <div class="col-6">

                          <div class="form-group">
                            <label class="label-required" for="delivery_date">Delivery Date</label>
                            <div class="input-group date datepicker" id="delivery_date">
                              <input type="text" id="delivery_date_datepicker" class="form-control datePicker">
                              <span  @click="showDeliveryDateDatepicker" class="input-group-addon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg></span>
                            </div>
                          </div>

                          <div v-for="error in errors.delivery_date" class="form-group validation-error">
                            {{ error }}
                          </div>

                        </div>
                      </div>

                      <div class="form-group">
                        <label class="label-required" for="distance">Distance</label>
                        <money
                          v-model="formData.distance"
                          placeholder="Distance"
                          :decimal="'.'"
                          :thousands="','"
                          :suffix="' ml'"
                          :precision="2"
                          type="text"
                          class="form-control"
                        ></money>
                      </div>

                      <div v-for="error in errors.distance" class="form-group validation-error">
                        {{ error }}
                      </div>

                      <div class="form-group">
                        <label class="label-required" for="price">Price</label>
                        <money
                          v-model="formData.price"
                          placeholder="Price"
                          :decimal="'.'"
                          :thousands="','"
                          :prefix="'$ '"
                          :precision="2"
                          type="text"
                          class="form-control"
                        ></money>
                      </div>

                      <div v-for="error in errors.price" class="form-group validation-error">
                        {{ error }}
                      </div>

                      <div class="form-group">
                        <label for="deposit">Deposit</label>

                        <money
                          v-model="formData.deposit"
                          placeholder="Deposit"
                          :decimal="'.'"
                          :thousands="','"
                          :prefix="'$ '"
                          :precision="2"
                          type="text"
                          class="form-control"
                        ></money>
                      </div>

                      <div v-for="error in errors.deposit" class="form-group validation-error">
                        {{ error }}
                      </div>

                      <div class="form-group">
                        <label for="carrier_pay_terms">Customer Pay Terms</label>
                        <select v-if="customerPayTerms" v-model="formData.customer_pay_terms" class="form-control"
                                id="customer_pay_terms">
                          <option selected="" disabled="">Select Customer Pay Terms</option>
                          <option v-for="item in customerPayTerms" :value="item.key">
                            {{ item.value }}
                          </option>
                        </select>
                      </div>

                      <div v-for="error in errors.customer_pay_terms" class="form-group validation-error">
                        {{ error }}
                      </div>

                      <div class="form-group">
                        <label for="carrier_pay_terms">Carrier Pay Terms</label>
                        <select v-if="carrierPayTerms" v-model="formData.carrier_pay_terms" class="form-control"
                                id="carrier_pay_terms">
                          <option selected="" disabled="">Select Carrier Pay Terms</option>
                          <option v-for="item in carrierPayTerms" :value="item.key">
                            {{ item.value }}
                          </option>
                        </select>
                      </div>

                      <div v-for="error in errors.carrier_pay_terms" class="form-group validation-error">
                        {{ error }}
                      </div>

                      <div class="form-group">
                        <label class="label-required" for="carrier_pay">Carrier Pay</label>

                        <money
                          v-model="formData.carrier_pay"
                          placeholder="Carrier Pay"
                          :decimal="'.'"
                          :thousands="','"
                          :prefix="'$ '"
                          :precision="2"
                          type="text"
                          class="form-control"
                        ></money>
                      </div>

                      <div v-for="error in errors.carrier_pay" class="form-group validation-error">
                        {{ error }}
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-6">
              <div class="row">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-title mb-0 d-flex align-items-center">
                        <div class="card-title-icon mr-2">
                          <i class='bx bxs-map'></i>
                        </div>
                        <h6>Origin Information</h6>
                      </div>

                      <div class="form-group">
                        <label for="load_origin_name">Name</label>
                        <input
                          type="text"
                          class="form-control"
                          id="load_origin_name"
                          placeholder="Name"
                          v-model="formData.load_origin_name"
                        >
                      </div>

                      <div v-for="error in errors.load_origin_name" class="form-group validation-error">
                        {{ error }}
                      </div>

                      <div class="form-group">
                        <label for="load_origin_company">Company</label>
                        <input
                          type="text"
                          class="form-control"
                          id="load_origin_company"
                          placeholder="Company"
                          v-model="formData.load_origin_company"
                        >
                      </div>

                      <div v-for="error in errors.load_origin_company" class="form-group validation-error">
                        {{ error }}
                      </div>

                      <div class="form-group">
                        <div class="form-check form-check-inline">
                          <label class="form-check-label">
                            <input v-model="formData.load_origin_type" type="radio" class="form-check-input" value="0">
                            Residence
                            <i class="input-frame"></i></label>
                        </div>
                        <div class="form-check form-check-inline">
                          <label class="form-check-label">
                            <input v-model="formData.load_origin_type" type="radio" class="form-check-input" value="1">
                            Business
                            <i class="input-frame"></i></label>
                        </div>
                      </div>

                      <div v-for="error in errors.load_origin_type" class="form-group validation-error">
                        {{ error }}
                      </div>

                      <div class="form-group has-predictions">
                        <label class="label-required" for="load_origin_zip">Zip</label>
                        <input
                          @input="autocompleteOriginByZip"
                          @focusout="onOriginZipFocusOut"
                          v-mask="'#####'"
                          v-model="formData.load_origin_zip"
                          type="text" class="form-control"
                          id="load_origin_zip"
                          placeholder="Zip"
                          autocomplete="chrome-off"
                        >

                        <div v-if="predictions.origin.zip && predictions.origin.zip.length" class="predictions">
                          <div @click="fillOriginInfoByZipPrediction(prediction)"
                               v-for="prediction in predictions.origin.zip" class="predictions-prediction p-2">
                            {{ prediction.description }}
                          </div>
                        </div>
                      </div>

                      <div v-for="error in errors.load_origin_zip" class="form-group validation-error">
                        {{ error }}
                      </div>

                      <div class="form-group has-predictions">
                        <label class="label-required" for="load_origin_city">City</label>
                        <input
                          @input="autocompleteOriginByCity"
                          @focusout="onOriginCityFocusOut"
                          v-model="formData.load_origin_city"
                          type="text" class="form-control"
                          id="load_origin_city"
                          autocomplete="chrome-off"
                          placeholder="City"
                        >

                        <div v-if="predictions.origin.city && predictions.origin.city.length" class="predictions">
                          <div @click="fillOriginInfoByCityPrediction(prediction)"
                               v-for="prediction in predictions.origin.city" class="predictions-prediction p-2">
                            {{ prediction.description }}
                          </div>
                        </div>
                      </div>

                      <div v-for="error in errors.load_origin_city" class="form-group validation-error">
                        {{ error }}
                      </div>

                      <div class="form-group">
                        <label class="label-required" for="load_origin_state">State</label>

                        <select
                          v-if="states"
                          v-model="formData.load_origin_state"
                          id="load_origin_state"
                          class="form-control"
                        >
                          <option selected="" disabled="">State</option>
                          <option v-for="item in states" :value="item.key">
                            {{ item.value }}
                          </option>
                        </select>
                      </div>

                      <div v-for="error in errors.load_origin_state" class="form-group validation-error">
                        {{ error }}
                      </div>

                      <div class="form-group">
                        <label for="load_origin_address_1">Address 1</label>
                        <input
                          type="text"
                          class="form-control"
                          id="load_origin_address_1"
                          placeholder="Address 1"
                          v-model="formData.load_origin_address_1"
                        >
                      </div>

                      <div v-for="error in errors.load_origin_address_1" class="form-group validation-error">
                        {{ error }}
                      </div>

                      <div class="form-group">
                        <label for="load_origin_address_2">Address 2</label>
                        <input
                          type="text"
                          class="form-control"
                          id="load_origin_address_2"
                          placeholder="Address 2"
                          v-model="formData.load_origin_address_2"
                        >
                      </div>

                      <div v-for="error in errors.load_origin_address_2" class="form-group validation-error">
                        {{ error }}
                      </div>

                      <div class="form-group">
                        <label for="load_origin_phone">Phone</label>
                        <the-mask
                          v-model="formData.load_origin_phone"
                          placeholder="Phone"
                          mask="+1 (###) ###-####"
                          id="load_origin_phone"
                          type="text"
                          class="form-control"
                        ></the-mask>
                      </div>

                      <div v-for="error in errors.load_origin_phone" class="form-group validation-error">
                        {{ error }}
                      </div>

                      <div class="form-group">
                        <label for="load_origin_phone_2">Phone 2</label>
                        <the-mask
                          v-model="formData.load_origin_phone_2"
                          placeholder="Phone 2"
                          mask="+1 (###) ###-####"
                          id="load_origin_phone_2"
                          type="text"
                          class="form-control"
                        ></the-mask>
                      </div>

                      <div v-for="error in errors.load_origin_phone_2" class="form-group validation-error">
                        {{ error }}
                      </div>

                      <div class="form-group">
                        <label for="load_origin_mobile">Mobile</label>
                        <the-mask
                          v-model="formData.load_origin_mobile"
                          placeholder="Mobile"
                          mask="+1 (###) ###-####"
                          id="load_origin_mobile"
                          type="text"
                          class="form-control"
                        ></the-mask>
                      </div>

                      <div v-for="error in errors.load_origin_mobile" class="form-group validation-error">
                        {{ error }}
                      </div>

                      <div class="form-group">
                        <label for="load_origin_email">Email</label>
                        <input
                          type="text"
                          class="form-control"
                          id="load_origin_email"
                          placeholder="Email"
                          v-model="formData.load_origin_email"
                        >
                      </div>

                      <div v-for="error in errors.load_origin_email" class="form-group validation-error">
                        {{ error }}
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-6">
              <div class="row">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-title mb-0 d-flex align-items-center">
                        <div class="card-title-icon mr-2">
                          <i class='bx bxs-map'></i>
                        </div>
                        <h6>Destination Information</h6>
                      </div>

                      <div class="form-group">
                        <label for="load_destination_name">Name</label>
                        <input
                          type="text"
                          class="form-control"
                          id="load_destination_name"
                          placeholder="Name"
                          v-model="formData.load_destination_name"
                        >
                      </div>

                      <div v-for="error in errors.load_destination_name" class="form-group validation-error">
                        {{ error }}
                      </div>

                      <div class="form-group">
                        <label for="load_destination_company">Company</label>
                        <input
                          type="text"
                          class="form-control"
                          id="load_destination_company"
                          placeholder="Company"
                          v-model="formData.load_destination_company"
                        >
                      </div>

                      <div v-for="error in errors.load_destination_company" class="form-group validation-error">
                        {{ error }}
                      </div>

                      <div class="form-group">
                        <div class="form-check form-check-inline">
                          <label class="form-check-label">
                            <input v-model="formData.load_destination_type" type="radio" class="form-check-input" value="0">
                            Residence
                            <i class="input-frame"></i></label>
                        </div>
                        <div class="form-check form-check-inline">
                          <label class="form-check-label">
                            <input v-model="formData.load_destination_type" type="radio" class="form-check-input" value="1">
                            Business
                            <i class="input-frame"></i></label>
                        </div>
                      </div>

                      <div v-for="error in errors.load_destination_type" class="form-group validation-error">
                        {{ error }}
                      </div>

                      <div class="form-group has-predictions">
                        <label class="label-required" for="load_destination_zip">Zip</label>
                        <input
                          @input="autocompleteDestinationByZip"
                          @focusout="onDestinationZipFocusOut"
                          v-mask="'#####'"
                          v-model="formData.load_destination_zip"
                          type="text"
                          class="form-control"
                          id="load_destination_zip"
                          autocomplete="chrome-off"
                          placeholder="Zip">

                        <div v-if="predictions.destination.zip && predictions.destination.zip.length"
                             class="predictions">
                          <div @click="fillDestinationInfoByZipPrediction(prediction)"
                               v-for="prediction in predictions.destination.zip" class="predictions-prediction p-2">
                            {{ prediction.description }}
                          </div>
                        </div>
                      </div>

                      <div v-for="error in errors.load_destination_zip" class="form-group validation-error">
                        {{ error }}
                      </div>

                      <div class="form-group has-predictions">
                        <label class="label-required" for="load_destination_city">City</label>
                        <input
                          @input="autocompleteDestinationByCity"
                          @focusout="onDestinationCityFocusOut"
                          v-model="formData.load_destination_city"
                          type="text" class="form-control"
                          id="load_destination_city"
                          autocomplete="chrome-off"
                          placeholder="City"
                        >

                        <div v-if="predictions.destination.city && predictions.destination.city.length"
                             class="predictions">
                          <div @click="fillDestinationInfoByCityPrediction(prediction)"
                               v-for="prediction in predictions.destination.city" class="predictions-prediction p-2">
                            {{ prediction.description }}
                          </div>
                        </div>
                      </div>

                      <div v-for="error in errors.load_destination_city" class="form-group validation-error">
                        {{ error }}
                      </div>

                      <div class="form-group">
                        <label class="label-required" for="load_destination_state">State</label>
                        <select
                          v-if="states"
                          v-model="formData.load_destination_state"
                          id="load_destination_state"
                          class="form-control"
                        >
                          <option selected="" disabled="">State</option>
                          <option v-for="item in states" :value="item.key">
                            {{ item.value }}
                          </option>
                        </select>
                      </div>

                      <div v-for="error in errors.load_destination_state" class="form-group validation-error">
                        {{ error }}
                      </div>

                      <div class="form-group">
                        <label for="load_destination_address_1">Address 1</label>
                        <input
                          type="text"
                          class="form-control"
                          id="load_destination_address_1"
                          placeholder="Address 1"
                          v-model="formData.load_destination_address_1"
                        >
                      </div>

                      <div v-for="error in errors.load_destination_address_1" class="form-group validation-error">
                        {{ error }}
                      </div>

                      <div class="form-group">
                        <label for="load_destination_address_2">Address 2</label>
                        <input
                          type="text"
                          class="form-control"
                          id="load_destination_address_2"
                          placeholder="Address 2"
                          v-model="formData.load_destination_address_2"
                        >
                      </div>

                      <div v-for="error in errors.load_destination_address_2" class="form-group validation-error">
                        {{ error }}
                      </div>

                      <div class="form-group">
                        <label for="load_destination_phone">Phone</label>
                        <the-mask
                          v-model="formData.load_destination_phone"
                          placeholder="Phone"
                          mask="+1 (###) ###-####"
                          id="load_destination_phone"
                          type="text"
                          class="form-control"
                        ></the-mask>
                      </div>

                      <div v-for="error in errors.load_destination_phone" class="form-group validation-error">
                        {{ error }}
                      </div>

                      <div class="form-group">
                        <label for="load_destination_phone_2">Phone 2</label>
                        <the-mask
                          v-model="formData.load_destination_phone_2"
                          placeholder="Phone 2"
                          mask="+1 (###) ###-####"
                          id="load_destination_phone_2"
                          type="text"
                          class="form-control"
                        ></the-mask>
                      </div>

                      <div v-for="error in errors.load_destination_phone_2" class="form-group validation-error">
                        {{ error }}
                      </div>

                      <div class="form-group">
                        <label for="load_destination_mobile">Mobile</label>
                        <the-mask
                          v-model="formData.load_destination_mobile"
                          placeholder="Mobile"
                          mask="+1 (###) ###-####"
                          id="load_destination_mobile"
                          type="text"
                          class="form-control"
                        ></the-mask>
                      </div>

                      <div v-for="error in errors.load_destination_mobile" class="form-group validation-error">
                        {{ error }}
                      </div>

                      <div class="form-group">
                        <label for="load_destination_email">Email</label>
                        <input
                          type="text"
                          class="form-control"
                          id="load_destination_email"
                          placeholder="Email"
                          v-model="formData.load_destination_email"
                        >
                      </div>

                      <div v-for="error in errors.load_destination_email" class="form-group validation-error">
                        {{ error }}
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12">
              <div class="row">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-title mb-0 d-flex align-items-center">
                        <div class="card-title-icon mr-2">
                          <i class='bx bxs-car'></i>
                        </div>
                        <h6>Vehicle Information</h6>
                      </div>

                      <div
                        v-if="errors.load_vehicles && errors.load_vehicles.length && !Array.isArray(errors.load_vehicles[0])">
                        <div v-for="error in errors.load_vehicles" class="form-group validation-error">
                          {{ error }}
                        </div>
                      </div>

                      <div class="d-flex justify-content-end">
                        <a @click="addEmptyVehicle" style="width: 100px;" class="btn btn-primary mr-2 mb-2 mb-md-0">
                          <i class="bx bx-plus"></i>
                        </a>
                      </div>

                      <div class="card vehicle mt-3" v-for="(vehicle, key) in formData.load_vehicles">
                        <div @click="removeVehicle(key)" class="vehicle-delete-btn">
                          <i class='bx bx-x'></i>
                        </div>
                        <div class="card-body">
                          <div class="card-title mb-0 d-flex align-items-center">
                            <div class="card-title-icon mr-2">
                              <i class='bx bxs-car'></i>
                            </div>
                            <h6>Vehicle {{ key + 1}}</h6>
                          </div>

                          <div class="row">
                            <div class="col-12 col-lg-6">

                              <div class="form-group">
                                <label class="label-required" :for="'vehicles_' + key + '_' + 'year'">Year</label>
                                <input v-model="formData.load_vehicles[key].year" type="text" class="form-control"
                                       :id="'vehicles_' + key + '_' + 'year'" autocomplete="chrome-off" placeholder="Year">
                              </div>

                              <div v-if="errors.load_vehicles[key]">
                                <div v-for="error in errors.load_vehicles[key].year" class="form-group validation-error">
                                  {{ error }}
                                </div>
                              </div>


                              <div class="form-group">
                                <label class="label-required" :for="'vehicles_' + key + '_' + 'make'">Make</label>
                                <input v-model="formData.load_vehicles[key].make" type="text" class="form-control"
                                       :id="'vehicles_' + key + '_' + 'make'" autocomplete="chrome-off" placeholder="Make">
                              </div>

                              <div v-if="errors.load_vehicles[key]">
                                <div v-for="error in errors.load_vehicles[key].make" class="form-group validation-error">
                                  {{ error }}
                                </div>
                              </div>


                              <div class="form-group">
                                <label class="label-required" :for="'vehicles_' + key + '_' + 'model'">Model</label>
                                <input v-model="formData.load_vehicles[key].model" type="text" class="form-control"
                                       :id="'vehicles_' + key + '_' + 'model'" autocomplete="chrome-off" placeholder="Model">
                              </div>

                              <div v-if="errors.load_vehicles[key]">
                                <div v-for="error in errors.load_vehicles[key].model" class="form-group validation-error">
                                  {{ error }}
                                </div>
                              </div>


                              <div class="form-group">
                                <label :for="'vehicles_' + key + '_' + 'vin'">Vin</label>

                                <the-mask
                                  v-model="formData.load_vehicles[key].vin"
                                  placeholder="VIN code"
                                  :mask="['XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX']"
                                  :id="'vehicles_' + key + '_' + 'vin'"
                                  type="text"
                                  class="form-control"
                                ></the-mask>
                              </div>

                              <div v-if="errors.load_vehicles[key]">
                                <div v-for="error in errors.load_vehicles[key].vin" class="form-group validation-error">
                                  {{ error }}
                                </div>
                              </div>


                              <div class="form-group form-check">
                                <label class="form-check-label">
                                  <input v-model="formData.load_vehicles[key].is_running" type="checkbox"
                                         class="form-check-input">
                                  Running
                                  <i class="input-frame bx bx-check"></i>
                                </label>
                              </div>

                              <div v-if="errors.load_vehicles[key]">
                                <div v-for="error in errors.load_vehicles[key].is_running"
                                     class="form-group validation-error">
                                  {{ error }}
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="label-required" :for="'vehicles_' + key + '_' + 'size'">Size</label>
                                <select v-if="carSizes" v-model="formData.load_vehicles[key].size" class="form-control"
                                        :id="'vehicles_' + key + '_' + 'size'">
                                  <option selected="" disabled="">Select Size</option>
                                  <option v-for="item in carSizes" :value="item.key">
                                    {{ item.value }}
                                  </option>
                                </select>
                              </div>

                              <div v-if="errors.load_vehicles[key]">
                                <div v-if="errors.load_vehicles[key]" v-for="error in errors.load_vehicles[key].size"
                                     class="form-group validation-error">
                                  {{ error }}
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="label-required" :for="'vehicles_' + key + '_' + 'price'">Price</label>

                                <money
                                  v-model="formData.load_vehicles[key].price"
                                  placeholder="Price"
                                  :decimal="'.'"
                                  :thousands="','"
                                  :prefix="'$ '"
                                  :precision="2"
                                  type="text"
                                  class="form-control"
                                ></money>
                              </div>

                              <div v-if="errors.load_vehicles[key]">
                                <div v-for="error in errors.load_vehicles[key].price" class="form-group validation-error">
                                  {{ error }}
                                </div>
                              </div>

                            </div>
                            <div class="col-12 col-lg-6">

                              <div class="form-group">
                                <label :for="'vehicles_' + key + '_' + 'state'">State</label>
                                <input v-model="formData.load_vehicles[key].state" type="text" class="form-control"
                                       :id="'vehicles_' + key + '_' + 'state'" autocomplete="chrome-off" placeholder="State">
                              </div>

                              <div v-if="errors.load_vehicles[key]">
                                <div v-for="error in errors.load_vehicles[key].state" class="form-group validation-error">
                                  {{ error }}
                                </div>
                              </div>

                              <div class="form-group">
                                <label :for="'vehicles_' + key + '_' + 'color'">Color</label>
                                <input v-model="formData.load_vehicles[key].color" type="text" class="form-control"
                                       :id="'vehicles_' + key + '_' + 'color'" autocomplete="chrome-off" placeholder="Color">
                              </div>

                              <div v-if="errors.load_vehicles[key]">
                                <div v-for="error in errors.load_vehicles[key].color" class="form-group validation-error">
                                  {{ error }}
                                </div>
                              </div>

                              <div class="form-group">
                                <label :for="'vehicles_' + key + '_' + 'plate_number'">Plate Number</label>
                                <input v-model="formData.load_vehicles[key].plate_number" type="text" class="form-control"
                                       :id="'vehicles_' + key + '_' + 'plate_number'" autocomplete="chrome-off" placeholder="Plate Number">
                              </div>

                              <div v-if="errors.load_vehicles[key]">
                                <div v-for="error in errors.load_vehicles[key].plate_number" class="form-group validation-error">
                                  {{ error }}
                                </div>
                              </div>

                              <div class="form-group">
                                <label :for="'vehicles_' + key + '_' + 'lot_number'">Lot Number</label>
                                <input v-model="formData.load_vehicles[key].lot_number" type="text" class="form-control"
                                       :id="'vehicles_' + key + '_' + 'lot_number'" autocomplete="chrome-off" placeholder="Lot Number">
                              </div>

                              <div v-if="errors.load_vehicles[key]">
                                <div v-for="error in errors.load_vehicles[key].lot_number" class="form-group validation-error">
                                  {{ error }}
                                </div>
                              </div>

                              <div class="form-group">
                                <label :for="'vehicles_' + key + '_' + 'p_o_number'">P O Number</label>
                                <input v-model="formData.load_vehicles[key].p_o_number" type="text" class="form-control"
                                       :id="'vehicles_' + key + '_' + 'p_o_number'" autocomplete="chrome-off" placeholder="P O Number">
                              </div>

                              <div v-if="errors.load_vehicles[key]">
                                <div v-for="error in errors.load_vehicles[key].p_o_number" class="form-group validation-error">
                                  {{ error }}
                                </div>
                              </div>

                              <div class="form-group">
                                <label :for="'vehicles_' + key + '_' + 'notes'">Notes</label>
                                <textarea v-model="formData.load_vehicles[key].notes" type="text" class="form-control"
                                          :id="'vehicles_' + key + '_' + 'notes'" autocomplete="chrome-off"
                                          placeholder="Notes"></textarea>
                              </div>

                              <div v-if="errors.load_vehicles[key]">
                                <div v-for="error in errors.load_vehicles[key].notes" class="form-group validation-error">
                                  {{ error }}
                                </div>
                              </div>

                            </div>
                          </div>

                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12">
              <div @click="createLoad">
                <a class="btn btn-primary">Create Load</a>
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
  import router from "../../../router";
  import { mapGetters } from "vuex";
  import {GETTER_USER_USER} from "../../../store/modules/user/getters";
  import Loading from "../../loading/Loading";

  export default {
    name: "CreateLoad",
    data() {
      return {
        creatingLoad: null,

        clients: null,
        drivers: null,
        carSizes: null,
        carrierTypes: null,
        deliveryAccuracy: null,
        availableAccuracy: null,
        states: null,
        carrierPayTerms: null,
        customerPayTerms: null,

        eventListeners: {
          clickEventListener: null
        },

        predictions: {
          shipper: {
            zip: [],
            city: []
          },
          origin: {
            zip: [],
            city: []
          },
          destination: {
            zip: [],
            city: []
          }
        },

        formData: {

          attachments: [],
          custom_load_number: null,
          referrer: null,
          client_id: null,
          driver_id: null,

          description: null,
          status: null,
          first_name: null,
          last_name: null,
          email: null,
          phone: null,
          type: null,
          company: null,
          address_1: null,
          address_2: null,
          mobile: null,
          phone_2: null,
          fax: null,
          notes_from_shipper: null,

          zip: '',
          city: '',
          state: '',

          load_origin_zip: '',
          load_origin_city: '',
          load_origin_state: '',

          // optional load origin params
          load_origin_name: '',
          load_origin_company: '',
          load_origin_type: '',
          load_origin_address_1: '',
          load_origin_address_2: '',
          load_origin_phone: '',
          load_origin_phone_2: '',
          load_origin_mobile: '',
          load_origin_email: '',

          load_destination_zip: '',
          load_destination_state: '',
          load_destination_city: '',

          // optional load destination params
          load_destination_name: '',
          load_destination_company: '',
          load_destination_type: '',
          load_destination_address_1: '',
          load_destination_address_2: '',
          load_destination_phone: '',
          load_destination_phone_2: '',
          load_destination_mobile: '',
          load_destination_email: '',

          // transport
          carrier_type: null,
          available_date: (new Date()).toISOString().replaceAll('-', '/').substr(0, 10),
          delivery_date: (new Date()).toISOString().replaceAll('-', '/').substr(0, 10),
          delivery_accuracy: null,
          available_accuracy: null,
          distance: null,
          price: null,
          deposit: null,
          customer_pay_terms: null,
          carrier_pay_terms: null,
          carrier_pay: null,

          load_vehicles: [
            {
              year: '',
              make: '',
              model: '',
              vin: '',
              is_running: false,
              size: '',
              state: '',
              color: '',
              plate_number: '',
              lot_number: '',
              p_o_number: '',
              notes: ''
            }
          ]
        },
        errors: {
          custom_load_number: [],
          referrer: [],
          client_id: [],
          driver_id: [],
          description: [],
          first_name: [],
          last_name: [],
          phone: [],
          email: [],
          type: [],
          company: [],
          zip: [],
          state: [],
          city: [],
          phone_2: [],
          address_1: [],
          address_2: [],
          mobile: [],
          fax: [],
          notes_from_shipper: [],
          load_vehicles: [],
          load_origin_state: [],
          load_origin_city: [],
          load_origin_zip: [],
          load_destination_state: [],
          load_destination_city: [],
          load_destination_zip: [],
          available_date: [],
          delivery_date: [],
          available_accuracy: [],
          delivery_accuracy: [],
          distance: [],
          price: [],
          deposit: [],
          carrier_type: []
        }
      }
    },
    components: {
      Loading
    },
    beforeDestroy() {
      document.removeEventListener('click', this.eventListeners.clickEventListener);
    },
    mounted() {
      if (this.user && this.user.role !== 'Client') {
        this.loadClients();
        this.loadDrivers();
      }
      if (this.user && this.user.role === 'Client') {
        this.loadClientInfo();
      }

      this.loadCarrierTypes();
      this.loadCarSizes();
      this.loadAvailableAccuracy();
      this.loadDeliveryAccuracy();
      this.loadStates();
      this.loadCarrierPayTerms();
      this.loadCustomerPayTerms();

      document.addEventListener('click', (e) => {
        this.eventListeners.clickEventListener = document.addEventListener('click', e => {
          const element = e.target;
          if (!element.classList.contains('predictions-prediction')) {
            this.cleanDestinationPredictions();
            this.cleanOriginPredictions();
            this.cleanShipperPredictions();
          }
        })
      });

      if ($('.datePicker').length) {
        var date = new Date();
        var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
        $('.datePicker').datepicker({
          format: "yyyy/mm/dd",
          todayHighlight: true,
          autoclose: true
        });
        $('.datePicker').datepicker('setDate', today);

        const self = this;

        $('#available_date_datepicker').datepicker()
          .on('changeDate', e => {
            let date = e.date;
            let dateZero = date.getDate() < 10 ? '0' : '';
            const d = date.getFullYear() + '/' + (date.getMonth() + 1) + '/' + dateZero + date.getDate();
            self.formData.available_date = d;
          })

        $('#delivery_date_datepicker').datepicker()
          .on('changeDate', e => {
            let date = e.date;
            let dateZero = date.getDate() < 10 ? '0' : '';
            const d = date.getFullYear() + '/' + (date.getMonth() + 1) + '/' + dateZero + date.getDate();
            self.formData.delivery_date = d;
          })
      }

      this.formData.delivery_accuracy = 1;
      this.formData.available_accuracy = 1;
    },
    methods: {
      fillShipperInfoWithClientInfo(client, id = null) {
        if (id) {
          this.formData.client_id = id;
        }
        this.formData.first_name = client.first_name;
        this.formData.last_name = client.last_name;
        this.formData.email = client.email;
        this.formData.phone = client.phone;
        this.formData.type = client.type;
        this.formData.company = client.company;
        this.formData.address_1 = client.address_1;
        this.formData.address_2 = client.address_2;
        this.formData.mobile = client.mobile;
        this.formData.phone_2 = client.phone_2;
        this.formData.fax = client.fax;
        this.formData.notes_from_shipper = client.notes_from_shipper;
      },
      fillShipperInfoWithEmptyInfo() {
        this.formData.first_name = '';
        this.formData.last_name = '';
        this.formData.email = '';
        this.formData.phone = '';
        this.formData.type = '';
        this.formData.company = '';
        this.formData.address_1 = '';
        this.formData.address_2 = '';
        this.formData.mobile = '';
        this.formData.phone_2 = '';
        this.formData.fax = '';
        this.formData.notes_from_shipper = '';
      },

      onClientSelect(event) {
        const clientId = event.target.value;
        const client = this.clients.find(item => item.id === clientId);
        if (client) {
          this.fillShipperInfoWithClientInfo(client);
        } else {
          this.fillShipperInfoWithEmptyInfo();
        }
      },

      /* Load block */
      loadClientInfo() {
        client.get('/api/clientinfo/')
          .then(res => {
            const client = {...res.data.data};
            this.fillShipperInfoWithClientInfo(client, client.id);
          })
          .catch(err => {
            this.$swal('Error', 'Could not load client info', 'error')
          })
      },
      loadClients() {
        client.get('/api/shipper/' + this.$route.params.shipper_id + '/clients')
          .then(res => {
            this.clients = [...res.data.data];
          })
          .catch(err => {
            this.$swal('Error', 'Could not load clients', 'error')
          })
      },
      loadDrivers() {
        client.get('/api/shipper/' + this.$route.params.shipper_id + '/drivers')
          .then(res => {
            this.drivers = [...res.data.data];
          })
          .catch(err => {
            this.$swal('Error', 'Could not load drivers', 'error')
          })
      },
      loadCarSizes() {
        return client.get('/api/car-sizes-data')
          .then(res => {
            this.carSizes = [...res.data.data];
          })
          .catch(err => {
            this.$swal('Error', 'Could not load car sizes', 'error');
          })
      },
      loadDeliveryAccuracy() {
        return client.get('/api/delivery-accuracy-data')
          .then(res => {
            this.deliveryAccuracy = [...res.data.data];
          })
          .catch(err => {
            this.$swal('Error', 'Could not load delivery accuracy data', 'error');
          })
      },
      loadAvailableAccuracy() {
        return client.get('/api/available-accuracy-data')
          .then(res => {
            this.availableAccuracy = [...res.data.data];
          })
          .catch(err => {
            this.$swal('Error', 'Could not load available accuracy data', 'error');
          })
      },
      loadCarrierTypes() {
        return client.get('/api/carrier-types-data')
          .then(res => {
            this.carrierTypes = [...res.data.data];
          })
          .catch(err => {
            this.$swal('Error', 'Could not load carrier types data', 'error');
          })
      },
      loadStates() {
        return client.get('/api/states-data')
          .then(res => {
            this.states = [...res.data.data];
          })
          .catch(err => {
            this.$swal('Error', 'Could not load states data', 'error');
          })
      },
      loadCarrierPayTerms() {
        return client.get('/api/carrier-pay-terms-data')
          .then(res => {
            this.carrierPayTerms = [...res.data.data];
          })
          .catch(err => {
            this.$swal('Error', 'Could not load carrier pay terms data', 'error');
          })
      },
      loadCustomerPayTerms() {
        return client.get('/api/customer-pay-terms-data')
          .then(res => {
            this.customerPayTerms = [...res.data.data];
          })
          .catch(err => {
            this.$swal('Error', 'Could not load customer pay terms data', 'error');
          })
      },
      /* End load block */

      /* Clean Block */
      cleanShipperPredictions() {
        this.predictions.shipper.city = [];
        this.predictions.shipper.zip = [];
      },
      cleanOriginPredictions() {
        this.predictions.origin.city = [];
        this.predictions.origin.zip = [];
      },
      cleanDestinationPredictions() {
        this.predictions.destination.city = [];
        this.predictions.destination.zip = [];
      },

      /* Clean Block */

      swalMixin() {
        return this.$swal.mixin({
          toast: true,
          position: 'bottom',
          showConfirmButton: false,
          timer: 1500
        }).fire({
          icon: 'success',
          title: 'Zip info loaded'
        });
      },

      /* Zip Block */
      getZipInfo(zip) {
        return client.get('/api/zip/' + zip + '/autocomplete');
      },

      getCityInfo(city) {
        return client.get('/api/city/' + city + '/autocomplete');
      },

      getPlaceInfo(placeId) {
        return client.get('/api/place/' + placeId + '/details');
      },

      // shipper info predictions
      autocompleteShipperByZip() {
        this.predictions.shipper.zip = [];

        if (window.autocompleteShipperByZipTimeout) clearTimeout(window.autocompleteShipperByZipTimeout);
        window.autocompleteShipperByZipTimeout = setTimeout(() => {

          if (this.formData.zip.length >= 3) {
            this.getZipInfo(this.formData.zip)
              .then(res => {
                this.swalMixin();

                const predictions = res.data.data.predictions;
                if (predictions.length) {
                  this.predictions.shipper.zip = [...predictions];
                }

              })
          }
        }, 500)
      },

      onShipperZipFocusOut() {
        setTimeout(() => {
          this.predictions.shipper.zip = [];
        }, 100);
      },

      fillShipperInfoByZipPrediction(prediction) {
        if (prediction.types.includes('postal_code')) {
          this.formData.city = prediction.terms[0].value;
          this.formData.state = prediction.terms[1].value;
          this.formData.zip = prediction.terms[2].value;
        }
        this.cleanShipperPredictions();
      },

      autocompleteShipperByCity() {
        this.predictions.shipper.city = [];

        if (window.autocompleteShipperByCityTimeout) clearTimeout(window.autocompleteShipperByCityTimeout);
        window.autocompleteShipperByCityTimeout = setTimeout(() => {

          if (this.formData.city.length >= 3) {
            this.getCityInfo(this.formData.city)
              .then(res => {
                this.swalMixin();

                const predictions = res.data.data.predictions;
                if (predictions.length) {
                  this.predictions.shipper.city = [...predictions];
                }
              })
          }

        }, 500)
      },

      onShipperCityFocusOut() {
        setTimeout(() => {
          this.predictions.shipper.city = [];
        }, 100);
      },

      fillShipperInfoByCityPrediction(prediction) {
        this.formData.city = prediction.structured_formatting.main_text;

        this.getPlaceInfo(prediction.place_id)
          .then(res => {
            const details = res.data.data;

            details.results.forEach(item => {
              if (item.types.includes('postal_code')) {
                item.address_components.forEach(address_component => {
                  if (address_component.types.includes('postal_code')) {
                    this.formData.zip = address_component.long_name;
                  }

                  if (address_component.types.includes('locality')) {
                    // this.formData.city = address_component.long_name;
                  }

                  if (address_component.types.includes('administrative_area_level_1')) {
                    this.formData.state = address_component.short_name;
                  }
                })
              }
            })
          })
          .finally(() => {
            this.cleanShipperPredictions();
          });
      },


      // origin predictions
      autocompleteOriginByZip() {
        this.predictions.origin.zip = [];

        if (window.autocompleteOriginByZipTimeout) clearTimeout(window.autocompleteOriginByZipTimeout);
        window.autocompleteOriginByZipTimeout = setTimeout(() => {
          if (this.formData.load_origin_zip.length >= 3) {

            this.getZipInfo(this.formData.load_origin_zip)
              .then(res => {
                this.swalMixin();

                const predictions = res.data.data.predictions;
                if (predictions.length) {
                  this.predictions.origin.zip = [...predictions];
                }

              })
          }
        }, 500)
      },

      onOriginZipFocusOut() {
        setTimeout(() => {
          this.predictions.origin.zip = [];
        }, 100);
      },

      fillOriginInfoByZipPrediction(prediction) {
        if (prediction.types.includes('postal_code')) {
          this.formData.load_origin_city = prediction.terms[0].value;
          this.formData.load_origin_state = prediction.terms[1].value;
          this.formData.load_origin_zip = prediction.terms[2].value;
        }
        this.cleanOriginPredictions();
      },

      autocompleteOriginByCity() {
        this.predictions.origin.city = [];

        if (window.autocompleteOriginByCityTimeout) clearTimeout(window.autocompleteOriginByCityTimeout);
        window.autocompleteOriginByCityTimeout = setTimeout(() => {
          if (this.formData.load_origin_city.length >= 3) {

            this.getCityInfo(this.formData.load_origin_city)
              .then(res => {
                this.swalMixin();

                const predictions = res.data.data.predictions;
                if (predictions.length) {
                  this.predictions.origin.city = [...predictions];
                }
              });
          }
        }, 500)
      },

      onOriginCityFocusOut() {
        setTimeout(() => {
          this.predictions.origin.city = [];
        }, 100);
      },

      fillOriginInfoByCityPrediction(prediction) {
        this.formData.load_origin_city = prediction.structured_formatting.main_text;
        this.getPlaceInfo(prediction.place_id)
          .then(res => {
            const details = res.data.data;

            details.results.forEach(item => {
              if (item.types.includes('postal_code')) {
                item.address_components.forEach(address_component => {
                  if (address_component.types.includes('postal_code')) {
                    this.formData.load_origin_zip = address_component.long_name;
                  }

                  if (address_component.types.includes('locality')) {
                    // this.formData.load_origin_city = address_component.long_name;
                  }

                  if (address_component.types.includes('administrative_area_level_1')) {
                    this.formData.load_origin_state = address_component.short_name;
                  }
                })
              }
            })
          })
          .finally(() => {
            this.cleanOriginPredictions();
          });
      },


      // destination predictions
      autocompleteDestinationByZip() {
        this.predictions.destination.zip = [];

        if (window.autocompleteDestinationByZipTimeout) clearTimeout(window.autocompleteDestinationByZipTimeout);
        window.autocompleteDestinationByZipTimeout = setTimeout(() => {
          if (this.formData.load_destination_zip.length >= 3) {

            this.getZipInfo(this.formData.load_destination_zip)
              .then(res => {
                this.swalMixin();

                const predictions = res.data.data.predictions;
                if (predictions.length) {
                  this.predictions.destination.zip = [...predictions];
                }

              })
          }
        }, 500)
      },

      onDestinationZipFocusOut() {
        setTimeout(() => {
          this.predictions.destination.zip = [];
        }, 100);
      },

      fillDestinationInfoByZipPrediction(prediction) {
        if (prediction.types.includes('postal_code')) {
          this.formData.load_destination_city = prediction.terms[0].value;
          this.formData.load_destination_state = prediction.terms[1].value;
          this.formData.load_destination_zip = prediction.terms[2].value;
        }
        this.cleanDestinationPredictions();
      },

      autocompleteDestinationByCity() {
        this.predictions.destination.city = [];

        if (window.autocompleteDestinationByCityTimeout) clearTimeout(window.autocompleteDestinationByCityTimeout);
        window.autocompleteDestinationByCityTimeout = setTimeout(() => {
          if (this.formData.load_destination_city.length >= 3) {
            this.getCityInfo(this.formData.load_destination_city)
              .then(res => {
                this.swalMixin();

                const predictions = res.data.data.predictions;
                if (predictions.length) {
                  this.predictions.destination.city = [...predictions];
                }
              })
          }
        }, 500)
      },

      onDestinationCityFocusOut() {
        setTimeout(() => {
          this.predictions.destination.city = [];
        }, 100);
      },

      fillDestinationInfoByCityPrediction(prediction) {
        this.formData.load_destination_city = prediction.structured_formatting.main_text;
        this.getPlaceInfo(prediction.place_id)
          .then(res => {
            const details = res.data.data;

            details.results.forEach(item => {
              if (item.types.includes('postal_code')) {
                item.address_components.forEach(address_component => {
                  if (address_component.types.includes('postal_code')) {
                    this.formData.load_destination_zip = address_component.long_name;
                  }

                  if (address_component.types.includes('locality')) {
                    // this.formData.load_destination_city = address_component.long_name;
                  }

                  if (address_component.types.includes('administrative_area_level_1')) {
                    this.formData.load_destination_state = address_component.short_name;
                  }
                })
              }
            })
          })
          .finally(() => {
            this.cleanDestinationPredictions();
          });
      },
      /* Zip Block end */

      addEmptyVehicle() {
        this.formData.load_vehicles.push({
          year: '',
          make: '',
          model: '',
          vin: '',
          is_running: false,
          size: '',
          state: '',
          color: '',
          plate_number: '',
          lot_number: '',
          p_o_number: '',
          notes: ''
        });
      },
      removeVehicle(key) {
        this.formData.load_vehicles.splice(key, 1);
        this.formData.load_vehicles = [...this.formData.load_vehicles];
      },
      clearCreateErrors() {
        this.errors = {

          attachments: [],

          custom_load_number: [],
          referrer: [],
          description: [],
          first_name: [],
          last_name: [],
          phone: [],
          email: [],
          type: [],
          company: [],
          zip: [],
          state: [],
          city: [],
          phone_2: [],
          address_1: [],
          address_2: [],
          mobile: [],
          fax: [],
          load_vehicles: [],
          notes_from_shipper: [],
          load_origin_state: [],
          load_origin_city: [],
          load_origin_zip: [],
          load_destination_state: [],
          load_destination_city: [],
          load_destination_zip: [],
          available_date: [],
          delivery_date: [],
          available_accuracy: [],
          delivery_accuracy: [],
          distance: [],
          price: [],
          deposit: [],
          carrier_type: []
        };
      },
      getFormDataObject() {
        const fd = new FormData();

        for(let i = 0; i < this.formData.attachments.length; i++ ){
          let file = this.formData.attachments[i];
          fd.append('attachments[' + i + ']', file);
        }

        for (let key in this.formData) {
          if (
            this.formData[key] !== ''
            && this.formData[key] !== null
            && !Array.isArray(this.formData[key])
            && this.formData[key] !== undefined
          ) {
            fd.append(key, this.formData[key]);
          }
        }

        const vehicles = [];
        this.formData.load_vehicles.forEach(item => {
          const newObj = {};

          for (let key in item) {
            if (item[key]) {
              newObj[key] = item[key];
            }
          }

          vehicles.push(newObj);
        });

        fd.append('load_vehicles', JSON.stringify(vehicles));

        return fd;
      },
      createLoadRequest() {
        this.formData.attachments = [];

        const attachmentFiles = this.$refs['attachments'].files;

        for(let i = 0; i < attachmentFiles.length; i++ ){
          let file = attachmentFiles[i];
          this.formData.attachments.push(file);
        }

        this.clearCreateErrors();

        const fd = this.getFormDataObject();

        client.post('/api/shipper/' + this.$route.params.shipper_id + '/loads/', fd, {
          headers: {
              'Content-Type': 'multipart/form-data'
          }
        })
          .then(res => {

            this.$swal('Success', 'Load has been created', 'success')
              .then(() => {

                router.push(
                  {
                    name: 'shipper.loads.review',
                    params: {
                      shipper_id: this.$route.params.shipper_id,
                      load_id: res.data.data.id
                    }
                  }
                )
              });
          })
          .catch(error => {
            if (error.response.status === 422) {
              this.$swal('Error', 'Form contains some errors', 'error')
                .then(() => {
                });
            }

            if (error.response.status === 413) {
              this.$swal('Error', 'Form contains some errors', 'error')
                .then(() => {
                });

              this.errors['attachments'].push('One of the files you try to send is too large');
            }

            const err = error.response.data.errors;

            Object.keys(this.errors).forEach(key => {
              if (err[key]) {
                err[key].forEach(item => {
                  this.errors[key].push(item);
                });
              }
            });

            this.formData.attachments.forEach((item, i) => {
              if (error.response.data.errors['attachments.' + i]) {
                let e = error.response.data.errors['attachments.' + i];
                e = Array.isArray(e) ? e : [e];

                e.forEach(nestedError => {
                  this.errors.attachments.push(nestedError);
                })
              }
            });

            this.formData.load_vehicles.forEach((item, i, arr) => {
              this.errors.load_vehicles[i] = [];

              Object.keys(item).forEach(key => {
                this.errors.load_vehicles[i][key] = [];
              })

              Object.keys(item).forEach(key => {
                if (error.response.data.errors['load_vehicles.' + i + '.' + key]) {
                  if (!Array.isArray(this.errors.load_vehicles[i][key])) {

                    this.errors.load_vehicles[i][key] = [];
                  }
                  error.response.data.errors['load_vehicles.' + i + '.' + key].forEach(item => {
                    this.errors.load_vehicles[i][key].push(item);
                  })
                }
              })
            });

          })
        .finally(() => {
          this.creatingLoad = false;
        })
      },
      createLoad() {
        if (this.creatingLoad) return;
        this.creatingLoad = true;

        this.$swal.fire({
          title: 'Creating Load',
          text: 'Your Load is being created',
          onOpen: () => {
            this.$swal.showLoading();
          }
        });

        setTimeout(() => {
          this.createLoadRequest();
        }, 500);
      },
      recalculatePrice() {
        if (this.formData.load_destination_zip && this.formData.load_destination_zip.length === 5 && this.formData.load_origin_zip && this.formData.load_origin_zip.length === 5) {
          client.post('/api/calculate-price', {
            origin_zip: this.formData.load_origin_zip,
            destination_zip: this.formData.load_destination_zip,
            shipper_id: this.$route.params.shipper_id
          })
            .then(res => {
              this.formData.price = res.data.data.price;
              this.formData.distance = res.data.data.distance;
              return this.$swal.mixin({
                toast: true,
                position: 'bottom',
                showConfirmButton: false,
                timer: 1500
              }).fire({
                icon: 'success',
                title: 'Price Recalculated!'
              });
            })
        }
      },
      showAvailableDateDatepicker() {
        $('#available_date_datepicker').datepicker().focus();
      },
      showDeliveryDateDatepicker() {
        $('#delivery_date_datepicker').datepicker().focus();
      }
    },
    computed: {
      ...mapGetters({
        user: 'user/' + GETTER_USER_USER
      }),
      origin_zip() {
        return this.formData.load_origin_zip;
      },
      destination_zip() {
        return this.formData.load_destination_zip;
      },
    },
    watch: {
      destination_zip(val) {
        if (val && val.length === 5 && this.formData.load_origin_zip && this.formData.load_origin_zip.length === 5) {
          this.recalculatePrice();
        }
      },
      origin_zip(val) {
        if (val && val.length === 5 && this.formData.load_destination_zip && this.formData.load_destination_zip.length === 5) {
          this.recalculatePrice();
        }
      }
    }
  }
</script>

<style lang="scss" scoped>
  .vehicle {
    position: relative;

    &-delete-btn {
      width: 40px;
      height: 40px;
      position: absolute;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 30px;
      right: 10px;
      top: 10px;
      cursor: pointer;
    }
  }

  .card-title-icon {
    font-size: 24px;
    color: #334152;
  }
</style>
