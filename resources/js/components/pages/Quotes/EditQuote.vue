<template>
  <div class="row">
    <div v-if="quote" class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Edit {{ quote.entity_type.capitalize() }}</h6>

          <div class="steps">
            <div class="row">
              <div class="col-12 grid-margin stretch-card">

                <div class="card">
                  <div class="card-body p-0">

                    <div class="steps-container">
                      <div
                        :key="step.id"
                        v-for="step in steps"
                        @click="moveTo(step)"
                        :class="`steps-item ${step.id === currentStep.id ? 'steps-item-current' : ''} ${step.visited ? 'steps-item-visited' : ''}`"
                      >
                        {{ step.name }}
                      </div>
                    </div>

                  </div>
                </div>

              </div>
            </div>
          </div>

          <div class="row">

            <div v-show="currentStep.id === 1" class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                  <div class="card-title mb-0 d-flex align-items-center">
                    <div class="card-title-icon mr-2">
                      <i class='bx bxs-file'></i>
                    </div>
                    <h6>Order Information</h6>
                  </div>

                  <div class="forms-sample">

                    <div class="row">
                      <div class="col-12 col-lg-6">
                        <div class="form-group">
                          <label class="label-required" for="status">Status</label>
                          <select
                            class="form-control"
                            v-if="statuses"
                            v-model="formData.status"
                            id="status"
                          >
                            <option selected="" disabled="">Status</option>
                            <option v-for="item in statuses" :value="item.key">
                              {{ item.value }}
                            </option>
                          </select>
                        </div>
                      </div>
                    </div>


                  </div>

                </div>
              </div>
            </div>

            <!-- Shipper Information -->
            <div v-show="currentStep.id === 1" class="col-12">
              <div class="row">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-title mb-0 d-flex align-items-center">
                        <div class="card-title-icon mr-2">
                          <i class='bx bx-user'></i>
                        </div>
                        <h6>Shipper Information</h6>
                      </div>

                      <ValidationObserver ref="shipperInfo">
                        <form class="forms-sample">

                          <div class="row">
                            <div class="col-lg-6 col-12">

                              <ValidationProvider
                                name="First Name"
                                rules="required|alpha|min:2|max:20"
                                v-slot="{ errors }"
                              >
                                <div class="form-group">
                                  <label class="label-required" for="first_name">First Name</label>
                                  <input
                                    v-model="formData.first_name"
                                    type="text"
                                    class="form-control"
                                    id="first_name"
                                    autocomplete="chrome-off"
                                    placeholder="First Name"
                                  >
                                </div>

                                <div class="form-group validation-error">
                                  {{ errors[0] }}
                                </div>
                              </ValidationProvider>

                              <ValidationProvider
                                name="Last Name"
                                rules="required|alpha|min:2|max:20"
                                v-slot="{ errors }"
                              >
                                <div class="form-group">
                                  <label class="label-required" for="last_name">Last Name</label>
                                  <input
                                    v-model="formData.last_name"
                                    type="text"
                                    class="form-control"
                                    id="last_name"
                                    autocomplete="chrome-off"
                                    placeholder="Last Name"
                                  >
                                </div>

                                <div class="form-group validation-error">
                                  {{ errors[0] }}
                                </div>
                              </ValidationProvider>

                              <ValidationProvider
                                name="Phone"
                                rules="required|numeric|min:10|max:10"
                                v-slot="{ errors }"
                              >
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

                                <div class="form-group validation-error">
                                  {{ errors[0] }}
                                </div>
                              </ValidationProvider>

                              <ValidationProvider name="Email" rules="required|email" v-slot="{ errors }">
                                <div class="form-group">
                                  <label class="label-required" for="email">Email</label>
                                  <input
                                    v-model="formData.email"
                                    @focus="() => { serverErrors.email = []; }"
                                    type="text"
                                    class="form-control"
                                    id="email"
                                    autocomplete="chrome-off"
                                    placeholder="Email"
                                  >
                                </div>

                                <div v-if="serverErrors.email.length" class="serverErrors">
                                  <div v-for="error in serverErrors.email" class="form-group validation-error">
                                    {{ error }}
                                  </div>
                                </div>
                                <div v-else class="form-group validation-error">
                                  {{ errors[0] }}
                                </div>
                              </ValidationProvider>

                              <ValidationProvider name="Type" rules="required" v-slot="{ errors }">
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

                                <div class="form-group validation-error">
                                  {{ errors[0] }}
                                </div>
                              </ValidationProvider>

                              <ValidationProvider
                                name="Company"
                                :rules="{ required: true, min:3, max:40, regex: /^[0-9,a-z,A-Z,\s,',\-,&]+$/ }"
                                v-slot="{ errors }"
                              >
                                <div class="form-group">
                                  <label class="label-required" for="company">Company</label>
                                  <input
                                    v-model="formData.company"
                                    type="text"
                                    class="form-control"
                                    id="company"
                                    autocomplete="chrome-off"
                                    placeholder="Company"
                                  >
                                </div>

                                <div class="form-group validation-error">
                                  {{ errors[0] }}
                                </div>
                              </ValidationProvider>

                              <ValidationProvider name="Address 1" rules="min:10|max:60" v-slot="{ errors }">
                                <div class="form-group">
                                  <label for="address_1">Address 1</label>
                                  <input
                                    v-model="formData.address_1"
                                    type="text"
                                    class="form-control"
                                    id="address_1"
                                    autocomplete="chrome-off"
                                    placeholder="Address 1"
                                  >
                                </div>

                                <div class="form-group validation-error">
                                  {{ errors[0] }}
                                </div>
                              </ValidationProvider>

                              <ValidationProvider name="Address 2" rules="min:10|max:60" v-slot="{ errors }">
                                <div class="form-group">
                                  <label for="address_2">Address 2</label>
                                  <input
                                    v-model="formData.address_2"
                                    type="text"
                                    class="form-control"
                                    id="address_2"
                                    autocomplete="chrome-off"
                                    placeholder="Address 2"
                                  >
                                </div>

                                <div class="form-group validation-error">
                                  {{ errors[0] }}
                                </div>
                              </ValidationProvider>

                            </div>
                            <div class="col-lg-6 col-12">

                              <ValidationProvider name="Zip Code" rules="numeric|min:5|max:5" v-slot="{ errors }">
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

                                  <div
                                    v-if="predictions.shipper.zip && predictions.shipper.zip.length"
                                    class="predictions"
                                  >
                                    <div
                                      @click="fillShipperInfoByZipPrediction(prediction)"
                                      v-for="prediction in predictions.shipper.zip"
                                      class="predictions-prediction p-2"
                                    >
                                      {{ prediction.description }}
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group validation-error">
                                  {{ errors[0] }}
                                </div>
                              </ValidationProvider>

                              <ValidationProvider name="City" rules="min:3|max:60" v-slot="{ errors }">
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

                                  <div
                                    v-if="predictions.shipper.city && predictions.shipper.city.length"
                                    class="predictions"
                                  >
                                    <div
                                      @click="fillShipperInfoByCityPrediction(prediction)"
                                      v-for="prediction in predictions.shipper.city"
                                      class="predictions-prediction p-2"
                                    >
                                      {{ prediction.description }}
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group validation-error">
                                  {{ errors[0] }}
                                </div>
                              </ValidationProvider>

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

                              <div v-for="error in serverErrors.state" class="form-group validation-error">
                                {{ error }}
                              </div>

                              <ValidationProvider name="Phone 2" rules="min:10|max:10" v-slot="errors">
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

                                <div class="form-group validation-error">
                                  {{ errors[0] }}
                                </div>
                              </ValidationProvider>

                              <ValidationProvider name="Mobile" rules="min:10|max:10" v-slot="errors">
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

                                <div class="form-group validation-error">
                                  {{ errors[0] }}
                                </div>
                              </ValidationProvider>

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

                              <div v-for="error in serverErrors.fax" class="form-group validation-error">
                                {{ error }}
                              </div>

                              <div class="form-group">
                                <label for="notes_from_shipper">Notes From Shipper</label>
                                <textarea v-model="formData.notes_from_shipper" type="text" class="form-control"
                                          id="notes_from_shipper" autocomplete="chrome-off"
                                          placeholder="Notes From Shipper"></textarea>
                              </div>

                              <div v-for="error in serverErrors.notes_from_shipper" class="form-group validation-error">
                                {{ error }}
                              </div>
                            </div>
                          </div>

                        </form>
                      </ValidationObserver>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Shipper Information -->

            <!-- Origin / Destination -->
            <div v-show="currentStep.id === 2" class="col-12 col-lg-6">
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

                      <ValidationObserver ref="originInfo">

                        <ValidationProvider name="Origin Zip" rules="required|min:5|max:5" v-slot="{ errors }">
                          <div class="form-group has-predictions">
                            <label class="label-required" for="quote_origin_zip">Zip</label>
                            <input
                              @input="autocompleteOriginByZip"
                              @focusout="onOriginZipFocusOut"
                              v-mask="'#####'"
                              v-model="formData.quote_origin_zip"
                              type="text" class="form-control"
                              id="quote_origin_zip"
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

                          <div class="form-group validation-error">
                            {{ errors[0] }}
                          </div>
                        </ValidationProvider>

                        <ValidationProvider name="Origin City" rules="required" v-slot="{ errors }">
                          <div class="form-group has-predictions">
                            <label class="label-required" for="quote_origin_city">City</label>
                            <input
                              @input="autocompleteOriginByCity"
                              @focusout="onOriginCityFocusOut"
                              v-model="formData.quote_origin_city"
                              type="text" class="form-control"
                              id="quote_origin_city"
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

                          <div class="form-group validation-error">
                            {{ errors[0] }}
                          </div>
                        </ValidationProvider>

                        <ValidationProvider name="Origin State" rules="required" v-slot="{ errors }">
                          <div class="form-group">
                            <label class="label-required" for="quote_origin_state">State</label>

                            <select
                              v-if="states"
                              v-model="formData.quote_origin_state"
                              id="quote_origin_state"
                              class="form-control"
                            >
                              <option selected="" disabled="">State</option>
                              <option v-for="item in states" :value="item.key">
                                {{ item.value }}
                              </option>
                            </select>
                          </div>

                          <div class="form-group validation-error">
                            {{ errors[0] }}
                          </div>
                        </ValidationProvider>

                      </ValidationObserver>

                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div v-show="currentStep.id === 2" class="col-12 col-lg-6">
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

                      <ValidationObserver ref="destinationInfo">

                        <ValidationProvider name="Destination Zip" rules="required|min:5|max:5" v-slot="{ errors }">

                          <div class="form-group has-predictions">
                            <label class="label-required" for="quote_destination_zip">Zip</label>
                            <input
                              @input="autocompleteDestinationByZip"
                              @focusout="onDestinationZipFocusOut"
                              v-mask="'#####'"
                              v-model="formData.quote_destination_zip"
                              type="text"
                              class="form-control"
                              id="quote_destination_zip"
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

                          <div class="form-group validation-error">
                            {{ errors[0] }}
                          </div>

                        </ValidationProvider>

                        <ValidationProvider name="Destination City" rules="required" v-slot="{ errors }">
                          <div class="form-group has-predictions">
                            <label class="label-required" for="quote_destination_city">City</label>
                            <input
                              @input="autocompleteDestinationByCity"
                              @focusout="onDestinationCityFocusOut"
                              v-model="formData.quote_destination_city"
                              type="text" class="form-control"
                              id="quote_destination_city"
                              autocomplete="chrome-off"
                              placeholder="City"
                            >

                            <div v-if="predictions.destination.city && predictions.destination.city.length"
                                 class="predictions">
                              <div @click="fillDestinationInfoByCityPrediction(prediction)"
                                   v-for="prediction in predictions.destination.city"
                                   class="predictions-prediction p-2">
                                {{ prediction.description }}
                              </div>
                            </div>
                          </div>

                          <div class="form-group validation-error">
                            {{ errors[0] }}
                          </div>
                        </ValidationProvider>

                        <ValidationProvider name="Destination State" rules="required" v-slot="{ errors }">
                          <div class="form-group">
                            <label class="label-required" for="quote_destination_state">State</label>
                            <select
                              v-if="states"
                              v-model="formData.quote_destination_state"
                              id="quote_destination_state"
                              class="form-control"
                            >
                              <option selected="" disabled="">State</option>
                              <option v-for="item in states" :value="item.key">
                                {{ item.value }}
                              </option>
                            </select>
                          </div>

                          <div class="form-group validation-error">
                            {{ errors[0] }}
                          </div>
                        </ValidationProvider>

                      </ValidationObserver>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Origin / Destination -->

            <!-- Vehicle Information -->
            <div v-show="currentStep.id === 3" class="col-12">
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

                      <ValidationObserver ref="vehicleInfo">

                        <ValidationProvider name="Vehicle Year"
                                            :rules="{required: true, numeric: true, min_value: 1936, max_value: (new Date()).getFullYear() }"
                                            v-slot="{ errors }">
                          <div class="form-group">
                            <label class="label-required" for="vehicle_year">Year</label>
                            <input
                              v-model="formData.quote_vehicle_year"
                              type="text"
                              class="form-control"
                              id="vehicle_year"
                              autocomplete="chrome-off"
                              placeholder="Year"
                            >
                          </div>

                          <div class="form-group validation-error">
                            {{ errors[0] }}
                          </div>
                        </ValidationProvider>

                        <ValidationProvider name="Vehicle Make" rules="required" v-slot="{ errors }">
                          <div class="form-group">
                            <label class="label-required" for="vehicle_make">Make</label>
                            <input
                              type="text"
                              class="form-control"
                              id="vehicle_make"
                              v-model="formData.quote_vehicle_make"
                              autocomplete="chrome-off"
                              placeholder="Make"
                            >
                          </div>

                          <div class="form-group validation-error">
                            {{ errors[0] }}
                          </div>
                        </ValidationProvider>

                        <ValidationProvider name="Vehicle Model" rules="required" v-slot="{ errors }">

                          <div class="form-group">
                            <label class="label-required" for="vehicle_model">Model</label>
                            <input
                              type="text"
                              class="form-control"
                              id="vehicle_model"
                              v-model="formData.quote_vehicle_model"
                              autocomplete="chrome-off"
                              placeholder="Model"
                            >
                          </div>

                          <div class="form-group validation-error">
                            {{ errors[0] }}
                          </div>
                        </ValidationProvider>

                        <ValidationProvider name="VIN Code" rules="alpha_num" v-slot="{ errors }">
                          <div class="form-group">
                            <label for="quote_vehicle_vin">Vin</label>

                            <the-mask
                              v-model="formData.quote_vehicle_vin"
                              placeholder="VIN code"
                              :mask="['XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX']"
                              id="quote_vehicle_vin"
                              type="text"
                              class="form-control"
                            ></the-mask>
                          </div>

                          <div class="form-group validation-error">
                            {{ errors[0] }}
                          </div>
                        </ValidationProvider>

                        <ValidationProvider name="Vehicle is running" rules="required" v-slot="{ errors }">
                          <div class="form-group form-check">
                            <label class="form-check-label">
                              <input
                                v-model="formData.quote_vehicle_is_running"
                                type="checkbox"
                                class="form-check-input"
                              >
                              Running
                              <i class="input-frame bx bx-check"></i>
                            </label>
                          </div>

                          <div class="form-group validation-error">
                            {{ errors[0] }}
                          </div>
                        </ValidationProvider>

                        <ValidationProvider name="Vehicle Size" rules="required" v-slot="{ errors }">
                          <div class="form-group">
                            <label class="label-required" for="quote_vehicle_size">Size</label>
                            <select
                              v-if="carSizes"
                              v-model="formData.quote_vehicle_size"
                              class="form-control"
                              id="quote_vehicle_size"
                            >
                              <option selected="" disabled="">Select Size</option>
                              <option v-for="item in carSizes" :value="item.key">
                                {{ item.value }}
                              </option>
                            </select>
                          </div>

                          <div class="form-group validation-error">
                            {{ errors[0] }}
                          </div>
                        </ValidationProvider>

                      </ValidationObserver>
                      <!-- Quote Vehicle Fields -->

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Vehicle Information -->

            <!-- Transport Information -->
            <div v-show="currentStep.id === 4" class="col-12">
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

                      <ValidationObserver ref="transportInfo">

                        <ValidationProvider name="Carrier Type" rules="required" v-slot="{ errors }">

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

                          <div class="form-group validation-error">
                            {{ errors[0] }}
                          </div>

                        </ValidationProvider>

                        <div class="form-group">
                          <label class="label-required" for="available_date">Available Date</label>
                          <div class="input-group date datepicker" id="available_date">
                            <input type="text" id="available_date_datepicker" class="form-control datePicker">
                            <span @click="showAvailableDateDatepicker" class="input-group-addon"><svg
                              xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2"
                                                                     ry="2"></rect><line x1="16" y1="2" x2="16"
                                                                                         y2="6"></line><line x1="8"
                                                                                                             y1="2"
                                                                                                             x2="8"
                                                                                                             y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line></svg></span>
                          </div>
                        </div>

                        <div v-for="error in serverErrors.available_date" class="form-group validation-error">
                          {{ error }}
                        </div>


                        <div class="form-group">
                          <label class="label-required" for="delivery_date">Delivery Date</label>
                          <div class="input-group date datepicker" id="delivery_date">
                            <input type="text" id="delivery_date_datepicker" class="form-control datePicker">
                            <span @click="showDeliveryDateDatepicker" class="input-group-addon"><svg
                              xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                              class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2"
                                                                     ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line></svg></span>
                          </div>
                        </div>

                        <div v-for="error in serverErrors.delivery_date" class="form-group validation-error">
                          {{ error }}
                        </div>

                        <ValidationProvider name="Delivery Date Accuracy" rules="required" v-slot="{ errors }">
                          <div class="form-group">
                            <label class="label-required" for="delivery_accuracy">Delivery Date Accuracy</label>
                            <p class="card-description">
                              Choose On/Before/Around or After Delivery Date
                            </p>
                            <select
                              v-if="deliveryAccuracy"
                              v-model="formData.delivery_accuracy"
                              class="form-control"
                              id="delivery_accuracy"
                            >
                              <option selected="" disabled="">Select Delivery Accuracy</option>
                              <option v-for="item in deliveryAccuracy" :value="item.key">
                                {{ item.value }}
                              </option>
                            </select>
                          </div>

                          <div class="form-group validation-error">
                            {{ errors[0] }}
                          </div>

                        </ValidationProvider>

                        <ValidationProvider name="Distance" rules="required|min_value:0.01" v-slot="{ errors }">
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

                          <div v-if="serverErrors.distance.length" class="serverErrors">
                            <div v-for="error in serverErrors.distance" class="form-group validation-error">
                              {{ error }}
                            </div>
                          </div>
                          <div class="form-group validation-error">
                            {{ errors[0] }}
                          </div>
                        </ValidationProvider>

                        <ValidationProvider name="Price" rules="required|min_value:0.01" v-slot="{ errors }">

                          <div class="form-group">
                            <label class="label-required" for="price">Price</label>

                            <money
                              v-model="formData.price"
                              @focus="() => { serverErrors.price = []; }"
                              placeholder="Price"
                              :decimal="'.'"
                              :thousands="','"
                              :prefix="'$ '"
                              :precision="2"
                              type="text"
                              class="form-control"
                            ></money>
                          </div>

                          <div v-if="serverErrors.price.length" class="serverErrors">
                            <div v-for="error in serverErrors.price" class="form-group validation-error">
                              {{ error }}
                            </div>
                          </div>
                          <div v-else class="form-group validation-error">
                            {{ errors[0] }}
                          </div>

                        </ValidationProvider>

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

                        <div v-for="error in serverErrors.deposit" class="form-group validation-error">
                          {{ error }}
                        </div>

                      </ValidationObserver>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Transport Information -->

            <div class="col-12">
              <div>
                <a @click="updateQuote" class="btn btn-primary">Update {{ quote.entity_type.capitalize() }}</a>
              </div>
            </div>

            <div class="col-12">
              <div class="steps-controls">
                <div @click="stepBack" class="steps-controls-item steps-controls-item-prev">Prev</div>
                <div @click="stepForward" class="steps-controls-item steps-controls-item-next">Next</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="m-5" v-else>
      <Loading></Loading>
    </div>
  </div>
</template>

<script>
  import {client} from "../../../axios";
  import router from "../../../router";
  import Loading from "../../loading/Loading";

  import * as rules from "vee-validate/dist/rules";
  import {extend} from "vee-validate";

  Object.keys(rules).forEach(rule => {
    extend(rule, rules[rule]);
  });

  extend('required', {
    message: (fieldName, placeholders) => {
      return `The ${fieldName} field is required`;
    }
  });

  extend('min', {
    message: (fieldName, placeholders) => {
      return `The ${fieldName} mininum length is ${placeholders.length}`;
    }
  });

  extend('max', {
    message: (fieldName, placeholders) => {
      return `The ${fieldName} maximum length is ${placeholders.length}`;
    }
  });

  extend('email', {
    message: (fieldName, placeholders) => {
      return `The ${fieldName} must be an email`;
    }
  });

  extend('regex', {
    message: (fieldName, placeholders) => {
      return `The ${fieldName} field format is invalid`;
    }
  });

  extend('alpha_num', {
    message: (fieldName, placeholders) => {
      return `The ${fieldName} field may only contain alphabetic characters or numbers`;
    }
  });

  extend('min_value', {
    message: (fieldName, placeholders) => {
      return `The ${fieldName} must not be less than ${placeholders.min}`;
    }
  });

  extend('max_value', {
    message: (fieldName, placeholders) => {
      return `The ${fieldName} must not be greater than ${placeholders.max}`;
    }
  });

  export default {
    name: "EditQuote",
    components: {
      Loading
    },
    data() {
      return {
        /* Steps */
        steps: [
          {
            id: 1,
            name: "Shipper",
            validate: async () => {
              return await this.$refs.shipperInfo.validate();
            },
            proceed: () => {
              this.currentStep.completed = true;
              if (this.nextStep) {
                this.nextStep.visited = true;
              }
            },
            completed: false,
            visited: true
          },
          {
            id: 2,
            name: "Origin / Destination",
            validate: async () => {
              const resultOrigin = await this.$refs.originInfo.validate();
              const resultDestination = await this.$refs.destinationInfo.validate();
              return resultOrigin && resultDestination;
            },
            proceed: () => {
              this.currentStep.completed = true;
              if (this.nextStep) {
                this.nextStep.visited = true;
              }
            },
            completed: false,
            visited: true
          },
          {
            id: 3,
            name: "Vehicle",
            validate: async () => {
              return await this.$refs.vehicleInfo.validate();
            },
            proceed: () => {
              this.currentStep.completed = true;
              if (this.nextStep) {
                this.nextStep.visited = true;
              }
            },
            completed: false,
            visited: true
          },
          {
            id: 4,
            name: "Transport",
            validate: async () => {
              return await this.$refs.transportInfo.validate();
            },
            proceed: () => {
              this.currentStep.completed = true;
              if (this.nextStep) {
                this.nextStep.visited = true;
              }
            },
            completed: false,
            visited: true
          }
        ],
        selectedStep: 1,
        /* Steps */

        quote: null,
        updatingQuote: null, // loading flag when send update request
        priceRecalculateBlocked: true,

        carSizes: null,
        carrierTypes: null,
        deliveryAccuracy: null,
        states: null,
        statuses: null,

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

          zip: null,
          city: null,
          state: null,

          quote_origin_zip: null,
          quote_origin_city: null,
          quote_origin_state: null,

          quote_destination_zip: null,
          quote_destination_state: null,
          quote_destination_city: null,

          carrier_type: null,
          available_date: null,
          delivery_date: null,
          delivery_accuracy: null,
          price: null,
          deposit: null,

          quote_vehicle_year: null,
          quote_vehicle_make: null,
          quote_vehicle_model: null,
          quote_vehicle_vin: null,
          quote_vehicle_is_running: null,
          quote_vehicle_size: null
        },
        serverErrors: {
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

          quote_vehicle_year: [],
          quote_vehicle_make: [],
          quote_vehicle_model: [],
          quote_vehicle_vin: [],
          quote_vehicle_is_running: [],
          quote_vehicle_size: [],

          quote_origin_state: [],
          quote_origin_city: [],
          quote_origin_zip: [],
          quote_destination_state: [],
          quote_destination_city: [],
          quote_destination_zip: [],
          available_date: [],
          delivery_date: [],
          delivery_accuracy: [],
          price: [],
          deposit: [],
          distance: [],
          carrier_type: []
        }
      }
    },
    beforeDestroy() {
      document.removeEventListener('click', this.eventListeners.clickEventListener);
    },
    mounted() {
      this.loadQuoteInfo()
        .then(() => {
          this.onQuoteInfoLoaded();
          this.loadStatuses();
        });

      this.loadCarrierTypes();
      this.loadCarSizes();
      this.loadDeliveryAccuracy();
      this.loadStates();
    },
    methods: {
      /* Steps */
      async stepForward() {
        const validated = await this.currentStep.validate();
        if (validated) {
          this.currentStep.proceed();
          this.increaseStep();
        }
      },
      stepBack() {
        this.decreaseStep();
      },
      moveTo(step) {
        if (step.visited) {
          this.selectedStep = step.id;
        }
      },
      increaseStep() {
        if (this.stepExists(this.selectedStep + 1)) {
          this.selectedStep++;
        }
      },
      decreaseStep() {
        if (this.stepExists(this.selectedStep - 1)) {
          this.selectedStep--;
        }
      },
      stepExists(id) {
        return !!this.steps.find(item => {
          return item.id === id;
        });
      },
      /* Steps */

      parseQuoteData() {
        // Quote shipper
        this.formData.status = this.quote.status;
        this.formData.first_name = this.quote.shipper.first_name;
        this.formData.last_name = this.quote.shipper.last_name;
        this.formData.email = this.quote.shipper.email;
        this.formData.phone = this.quote.shipper.phone_masked;
        this.formData.type = this.quote.shipper.type;
        this.formData.company = this.quote.shipper.company;
        this.formData.address_1 = this.quote.shipper.address_1;
        this.formData.address_2 = this.quote.shipper.address_2;
        this.formData.mobile = this.quote.shipper.mobile_masked;
        this.formData.zip = this.quote.shipper.zip;
        this.formData.city = this.quote.shipper.city;
        this.formData.state = this.quote.shipper.state;
        this.formData.phone_2 = this.quote.shipper.phone_2_masked;
        this.formData.fax = this.quote.shipper.fax;
        this.formData.notes_from_shipper = this.quote.shipper.notes_from_shipper;

        // Quote origin
        this.formData.quote_origin_zip = this.quote.origin.zip;
        this.formData.quote_origin_state = this.quote.origin.state;
        this.formData.quote_origin_city = this.quote.origin.city;

        // Quote destination
        this.formData.quote_destination_zip = this.quote.destination.zip;
        this.formData.quote_destination_state = this.quote.destination.state;
        this.formData.quote_destination_city = this.quote.destination.city;

        // Quote transport
        this.formData.available_date = this.quote.transport.available_date;
        this.formData.delivery_date = this.quote.transport.delivery_date;

        this.formData.delivery_accuracy = this.quote.transport.delivery_accuracy;
        this.formData.price = this.quote.transport.price;
        this.formData.deposit = this.quote.transport.deposit;
        this.formData.carrier_type = this.quote.transport.carrier_type;
        this.formData.distance = this.quote.transport.distance;

        // Quote vehicles
        this.formData.quote_vehicle_year = this.quote.vehicle.year;
        this.formData.quote_vehicle_make = this.quote.vehicle.make;
        this.formData.quote_vehicle_model = this.quote.vehicle.model;
        this.formData.quote_vehicle_vin = this.quote.vehicle.vin;
        this.formData.quote_vehicle_is_running = this.quote.vehicle.is_running;
        this.formData.quote_vehicle_size = this.quote.vehicle.size;
      },
      loadQuoteInfo() {
        return client.get('/api/shipper/' + this.$route.params.shipper_id + '/quotes/' + this.$route.params.quote_id)
          .then(res => {
            this.quote = res.data.data;
            this.parseQuoteData();
          })
          .catch(error => {
            if (error.response.status === 422) {
              router.push('/404');
            } else {
              this.$swal('Error', 'Could not load quote info', 'error');
            }
          })
      },
      onQuoteInfoLoaded() {
        setTimeout(() => {
          this.priceRecalculateBlocked = false;
        }, 100);

        this.eventListeners.clickEventListener = e => {
          const element = e.target;
          if (!element.classList.contains('predictions-prediction')) {
            this.cleanDestinationPredictions();
            this.cleanOriginPredictions();
            this.cleanShipperPredictions();
          }
        };
        document.addEventListener('click', this.eventListeners.clickEventListener);

        if ($('.datePicker').length) {

          $('.datePicker').datepicker({
            format: "yyyy/mm/dd",
            todayHighlight: true,
            autoclose: true
          });

          $('#available_date_datepicker').datepicker('setDate', new Date(this.quote.transport.available_date));
          $('#delivery_date_datepicker').datepicker('setDate', new Date(this.quote.transport.delivery_date));

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
      },

      /* Load block */
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
      loadStatuses() {
        return client.get('/api/quote-statuses-data', {
          params: {
            quote_status: this.quote.status
          }
        })
          .then(res => {
            this.statuses = [...res.data.data];
          })
          .catch(err => {
            this.$swal('Error', 'Could not load statuses data', 'error');
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
          })
      },


      // origin predictions
      autocompleteOriginByZip() {
        this.predictions.origin.zip = [];

        if (window.autocompleteOriginByZipTimeout) clearTimeout(window.autocompleteOriginByZipTimeout);
        window.autocompleteOriginByZipTimeout = setTimeout(() => {
          if (this.formData.quote_origin_zip.length >= 3) {

            this.getZipInfo(this.formData.quote_origin_zip)
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
          this.formData.quote_origin_city = prediction.terms[0].value;
          this.formData.quote_origin_state = prediction.terms[1].value;
          this.formData.quote_origin_zip = prediction.terms[2].value;
        }
        this.cleanOriginPredictions();
      },

      autocompleteOriginByCity() {
        this.predictions.origin.city = [];

        if (window.autocompleteOriginByCityTimeout) clearTimeout(window.autocompleteOriginByCityTimeout);
        window.autocompleteOriginByCityTimeout = setTimeout(() => {
          if (this.formData.quote_origin_city.length >= 3) {

            this.getCityInfo(this.formData.quote_origin_city)
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
        this.formData.quote_origin_city = prediction.structured_formatting.main_text;
        this.getPlaceInfo(prediction.place_id)
          .then(res => {
            const details = res.data.data;

            details.results.forEach(item => {
              if (item.types.includes('postal_code')) {
                item.address_components.forEach(address_component => {
                  if (address_component.types.includes('postal_code')) {
                    this.formData.quote_origin_zip = address_component.long_name;
                  }

                  if (address_component.types.includes('locality')) {
                    // this.formData.quote_origin_city = address_component.long_name;
                  }

                  if (address_component.types.includes('administrative_area_level_1')) {
                    this.formData.quote_origin_state = address_component.short_name;
                  }
                })
              }
            })
          })
          .finally(() => {
            this.cleanOriginPredictions();
          })
      },


      // destination predictions
      autocompleteDestinationByZip() {
        this.predictions.destination.zip = [];

        if (window.autocompleteDestinationByZipTimeout) clearTimeout(window.autocompleteDestinationByZipTimeout);
        window.autocompleteDestinationByZipTimeout = setTimeout(() => {
          if (this.formData.quote_destination_zip.length >= 3) {

            this.getZipInfo(this.formData.quote_destination_zip)
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
          this.formData.quote_destination_city = prediction.terms[0].value;
          this.formData.quote_destination_state = prediction.terms[1].value;
          this.formData.quote_destination_zip = prediction.terms[2].value;
        }
        this.cleanDestinationPredictions();
      },

      autocompleteDestinationByCity() {
        this.predictions.destination.city = [];

        if (window.autocompleteDestinationByCityTimeout) clearTimeout(window.autocompleteDestinationByCityTimeout);
        window.autocompleteDestinationByCityTimeout = setTimeout(() => {
          if (this.formData.quote_destination_city.length >= 3) {
            this.getCityInfo(this.formData.quote_destination_city)
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
        this.formData.quote_destination_city = prediction.structured_formatting.main_text;
        this.getPlaceInfo(prediction.place_id)
          .then(res => {
            const details = res.data.data;

            details.results.forEach(item => {
              if (item.types.includes('postal_code')) {
                item.address_components.forEach(address_component => {
                  if (address_component.types.includes('postal_code')) {
                    this.formData.quote_destination_zip = address_component.long_name;
                  }

                  if (address_component.types.includes('locality')) {
                    // this.formData.quote_destination_city = address_component.long_name;
                  }

                  if (address_component.types.includes('administrative_area_level_1')) {
                    this.formData.quote_destination_state = address_component.short_name;
                  }
                })
              }
            })
          })
          .finally(() => {
            this.cleanDestinationPredictions();
          })
      },
      /* Zip Block end */

      clearCreateErrors() {
        this.serverErrors = {
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

          quote_vehicle_year: [],
          quote_vehicle_make: [],
          quote_vehicle_model: [],
          quote_vehicle_vin: [],
          quote_vehicle_is_running: [],
          quote_vehicle_size: [],

          notes_from_shipper: [],
          quote_origin_state: [],
          quote_origin_city: [],
          quote_origin_zip: [],
          quote_destination_state: [],
          quote_destination_city: [],
          quote_destination_zip: [],
          available_date: [],
          delivery_date: [],
          delivery_accuracy: [],
          price: [],
          deposit: [],
          distance: [],
          carrier_type: [],
        };
      },
      updateQuoteRequest() {
        client.post('/api/shipper/' + this.$route.params.shipper_id + '/quotes/' + this.$route.params.quote_id, {
          ...this.formData
        })
          .then(res => {
            this.updatingQuote = false;

            this.$swal('Success', 'Order has been updated', 'success')
              .then(() => {
                router.push(
                  {
                    name: 'shipper.orders.review',
                    params: {
                      shipper_id: this.$route.params.shipper_id,
                      quote_id: res.data.data.id
                    }
                  }
                )
              });
          })
          .catch(error => {
            const err = error.response.data.errors;

            const errorColumns = [];

            Object.keys(this.serverErrors).forEach(key => {
              if (err[key]) {
                errorColumns.push(key);
                err[key].forEach(item => {
                  this.serverErrors[key].push(item);
                });
              }
            });

            let errorMessage = 'Form contains some errors';
            if (errorColumns.length) {
              const lastIndex = errorColumns.length - 1;
              errorMessage += ' (';
              errorColumns.forEach((item, i) => {
                errorMessage += item;

                if (i !== lastIndex) {
                  errorMessage += ', ';
                }
              })
              errorMessage += ')';
            }

            if (error.response.status === 422) {
              this.$swal('Error', errorMessage, 'error')
                .then(() => {
                });
            }
          })
          .finally(() => {
            this.updatingQuote = false;
          })
      },
      updateQuote() {

        (async () => {

          if (this.updatingQuote) return;

          const shipperInfoValid = await this.$refs.shipperInfo.validate();
          const transportInfoValid = await this.$refs.transportInfo.validate();
          const originInfoValid = await this.$refs.originInfo.validate();
          const destinationInfoValid = await this.$refs.destinationInfo.validate();
          const vehicleInfoValid = await this.$refs.vehicleInfo.validate();
          const valid = (
            shipperInfoValid &&
            transportInfoValid &&
            originInfoValid &&
            destinationInfoValid &&
            vehicleInfoValid
          );

          if (valid) {
            this.clearCreateErrors();

            this.updatingQuote = true;

            this.$swal.fire({
              title: 'Updating Order',
              text: 'Your Order is being updated',
              onOpen: () => {
                this.$swal.showLoading();
              }
            });

            setTimeout(() => {
              this.updateQuoteRequest();
            }, 500);
          }

        })();

      },
      recalculatePrice() {
        if (this.formData.quote_destination_zip && this.formData.quote_destination_zip.length === 5 && this.formData.quote_origin_zip && this.formData.quote_origin_zip.length === 5) {
          client.post('/api/calculate-price', {
            origin_zip: this.formData.quote_origin_zip,
            destination_zip: this.formData.quote_destination_zip,
            shipper_id: this.$route.params.shipper_id
          })
            .then(res => {
              this.formData.price = res.data.data.price;
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
      /* Steps */
      previousStep() {
        return this.steps.find(item => {
          return item.id === this.selectedStep - 1
        });
      },
      currentStep() {
        return this.steps.find(item => {
          return item.id === this.selectedStep
        });
      },
      nextStep() {
        return this.steps.find(item => {
          return item.id === this.selectedStep + 1
        });
      },
      stepsCompleted() {
        const lastItem = this.steps[this.steps.length - 1];
        if (!lastItem) return true;
        return lastItem.completed;
      },
      /* Steps */

      origin_zip() {
        return this.formData.quote_origin_zip;
      },
      destination_zip() {
        return this.formData.quote_destination_zip;
      }
    },
    watch: {
      destination_zip(val) {
        if (this.priceRecalculateBlocked) return;
        if (val && val.length === 5 && this.formData.quote_origin_zip && this.formData.quote_origin_zip.length === 5) {
          this.recalculatePrice();
        }
      },
      origin_zip(val) {
        if (this.priceRecalculateBlocked) return;
        if (val && val.length === 5 && this.formData.quote_destination_zip && this.formData.quote_destination_zip.length === 5) {
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

  .steps {
    &-container {
      display: flex;
      background: transparent;
    }

    &-item {
      display: flex;
      width: 100%;
      height: 40px;
      justify-content: center;
      align-items: center;
      cursor: pointer;
      background: #f2f2f2;
      color: #aaa;
      margin-right: 6px;

      &:last-child {
        margin-right: 0;
      }

      &-visited {
        background: #1324ee;
        color: #fff;
      }

      &-current {
        background: #727cf5;
        color: #fff;
      }
    }

    &-controls {
      display: flex;
      justify-content: flex-end;

      &-item {
        padding: 5px;
        cursor: pointer;
        border-radius: 4px;
        width: 100px;
        display: flex;
        align-items: center;
        justify-content: center;

        &-prev {
          margin-right: 4px;
          color: #727cf5;
          background-color: #fff;
          border: 1px solid #727cf5;

          &:hover {
            color: #fff;
            background-color: #727cf5;
          }
        }

        &-next {
          color: #fff;
          background-color: #727cf5;
          border: 1px solid #727cf5;
        }
      }
    }
  }
</style>
