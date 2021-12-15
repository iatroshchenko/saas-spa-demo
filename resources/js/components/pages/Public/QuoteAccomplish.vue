<template>
  <div class="row">
    <div v-if="quote" class="offset-md-2 col-md-8 col-xs-12 col-lg-6 offset-lg-3 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12 mb-3 d-flex align-items-center justify-content-center">
              <div class="quote__company-logo right">
                <img v-if="logo" :src="logo"/>
                <!--                <div class="m-5" >-->
<!--                <Loading v-else></Loading>-->
                <!--                </div>-->
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="row">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body d-flex justify-content-center">

                      <div class="card-title mb-0 d-flex align-items-center">
                        <div class="card-title-icon mr-2 d-flex">
                          <h6><i class='bx bxs-file'></i>&nbsp;Order Information</h6>
                        </div>
                      </div>

                      <div v-show="false" class="forms-sample">
                        <div class="form-group">
                          <label for="status">Status</label>
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

            <div class="col-12">
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

                      <form class="forms-sample">

                        <div class="form-group">
                          <label for="first_name">First Name</label>
                          <input v-model="formData.first_name" type="text" class="form-control" id="first_name"
                                 autocomplete="chrome-off" placeholder="First Name">
                        </div>

                        <div v-for="error in errors.first_name" class="form-group validation-error">
                          {{ error }}
                        </div>

                        <div class="form-group">
                          <label for="last_name">Last Name</label>
                          <input v-model="formData.last_name" type="text" class="form-control" id="last_name"
                                 autocomplete="chrome-off" placeholder="Last Name">
                        </div>

                        <div v-for="error in errors.last_name" class="form-group validation-error">
                          {{ error }}
                        </div>

                        <div class="form-group">
                          <label for="phone">Phone</label>
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
                          <label for="email">Email</label>
                          <input v-model="formData.email" type="text" class="form-control" id="email" autocomplete="chrome-off"
                                 placeholder="Email">
                        </div>

                        <div v-for="error in errors.email" class="form-group validation-error">
                          {{ error }}
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
                          <label for="company">Company</label>
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

            <div class="col-12">
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

                      <div class="form-group has-predictions">
                        <label for="quote_origin_zip">Zip</label>
                        <input
                          @input="autocompleteOriginByZip"
                          @focusout="onOriginZipFocusOut"
                          v-mask="'#####'"
                          v-model="formData.quote_origin_zip"
                          type="text" class="form-control"
                          id="quote_origin_zip"
                          autocomplete="chrome-off"
                          placeholder="Zip"
                        >

                        <div v-if="predictions.origin.zip && predictions.origin.zip.length" class="predictions">
                          <div @click="fillOriginInfoByZipPrediction(prediction)"
                               v-for="prediction in predictions.origin.zip" class="predictions-prediction p-2">
                            {{ prediction.description }}
                          </div>
                        </div>
                      </div>

                      <div v-for="error in errors.quote_origin_zip" class="form-group validation-error">
                        {{ error }}
                      </div>


                      <div class="form-group has-predictions">
                        <label for="quote_origin_city">City</label>
                        <input
                          @input="autocompleteOriginByCity"
                          @focusout="onOriginCityFocusOut"
                          v-model="formData.quote_origin_city"
                          type="text" class="form-control"
                          id="quote_origin_city"
                          autocomplete="off"
                          placeholder="City"
                        >

                        <div v-if="predictions.origin.city && predictions.origin.city.length" class="predictions">
                          <div @click="fillOriginInfoByCityPrediction(prediction)"
                               v-for="prediction in predictions.origin.city" class="predictions-prediction p-2">
                            {{ prediction.description }}
                          </div>
                        </div>
                      </div>

                      <div v-for="error in errors.quote_origin_city" class="form-group validation-error">
                        {{ error }}
                      </div>

                      <div class="form-group">
                        <label for="quote_origin_state">State</label>

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

                      <div v-for="error in errors.quote_origin_state" class="form-group validation-error">
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
                          <i class='bx bxs-map'></i>
                        </div>
                        <h6>Destination Information</h6>
                      </div>

                      <div class="form-group has-predictions">
                        <label for="quote_destination_zip">Zip</label>
                        <input
                          @input="autocompleteDestinationByZip"
                          @focusout="onDestinationZipFocusOut"
                          v-mask="'#####'"
                          v-model="formData.quote_destination_zip"
                          type="text"
                          class="form-control"
                          id="quote_destination_zip" autocomplete="off" placeholder="Zip">

                        <div v-if="predictions.destination.zip && predictions.destination.zip.length"
                             class="predictions">
                          <div @click="fillDestinationInfoByZipPrediction(prediction)"
                               v-for="prediction in predictions.destination.zip" class="predictions-prediction p-2">
                            {{ prediction.description }}
                          </div>
                        </div>
                      </div>

                      <div v-for="error in errors.quote_destination_zip" class="form-group validation-error">
                        {{ error }}
                      </div>

                      <div class="form-group has-predictions">
                        <label for="quote_destination_city">City</label>
                        <input
                          @input="autocompleteDestinationByCity"
                          @focusout="onDestinationCityFocusOut"
                          v-model="formData.quote_destination_city"
                          type="text" class="form-control"
                          id="quote_destination_city"
                          autocomplete="off"
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

                      <div v-for="error in errors.quote_destination_city" class="form-group validation-error">
                        {{ error }}
                      </div>

                      <div class="form-group">
                        <label for="quote_destination_state">State</label>
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

                      <div v-for="error in errors.quote_destination_state" class="form-group validation-error">
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
                        v-if="errors.quote_vehicles && errors.quote_vehicles.length && !Array.isArray(errors.quote_vehicles[0])">
                        <div v-for="error in errors.quote_vehicles" class="form-group validation-error">
                          {{ error }}
                        </div>
                      </div>

                      <div class="d-flex justify-content-end">
                        <a @click="addEmptyVehicle" style="width: 100px;" class="btn btn-primary mr-2 mb-2 mb-md-0">
                          <i class="bx bx-plus"></i>
                        </a>
                      </div>

                      <div class="card vehicle mt-3" v-for="(vehicle, key) in formData.quote_vehicles">
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

                          <div class="form-group">
                            <label :for="'vehicles_' + key + '_' + 'year'">Year</label>
                            <input v-model="formData.quote_vehicles[key].year" type="text" class="form-control"
                                   :id="'vehicles_' + key + '_' + 'year'" autocomplete="off" placeholder="Year">
                          </div>

                          <div v-if="errors.quote_vehicles[key]">
                            <div v-for="error in errors.quote_vehicles[key].year" class="form-group validation-error">
                              {{ error }}
                            </div>
                          </div>


                          <div class="form-group">
                            <label :for="'vehicles_' + key + '_' + 'make'">Make</label>
                            <input v-model="formData.quote_vehicles[key].make" type="text" class="form-control"
                                   :id="'vehicles_' + key + '_' + 'make'" autocomplete="off" placeholder="Make">
                          </div>

                          <div v-if="errors.quote_vehicles[key]">
                            <div v-for="error in errors.quote_vehicles[key].make" class="form-group validation-error">
                              {{ error }}
                            </div>
                          </div>


                          <div class="form-group">
                            <label :for="'vehicles_' + key + '_' + 'model'">Model</label>
                            <input v-model="formData.quote_vehicles[key].model" type="text" class="form-control"
                                   :id="'vehicles_' + key + '_' + 'model'" autocomplete="off" placeholder="Model">
                          </div>

                          <div v-if="errors.quote_vehicles[key]">
                            <div v-for="error in errors.quote_vehicles[key].model" class="form-group validation-error">
                              {{ error }}
                            </div>
                          </div>


                          <div class="form-group">
                            <label :for="'vehicles_' + key + '_' + 'vin'">Vin</label>

                            <the-mask
                              v-model="formData.quote_vehicles[key].vin"
                              placeholder="VIN code"
                              :mask="['XXX XXX XXX XX', 'XXX XXX XXX XXX', 'XXXX XXX XXX XXX', 'XXXX XXXX XXX XXX', 'XXXX XXXX XXXX XXX', 'XXXX XXXX XXXX XXXX', 'XXXX XXXX XXXX XXXXX']"
                              :id="'vehicles_' + key + '_' + 'vin'"
                              type="text"
                              class="form-control"
                            ></the-mask>
                          </div>

                          <div v-if="errors.quote_vehicles[key]">
                            <div v-for="error in errors.quote_vehicles[key].vin" class="form-group validation-error">
                              {{ error }}
                            </div>
                          </div>


                          <div class="form-group form-check">
                            <label class="form-check-label">
                              <input v-model="formData.quote_vehicles[key].is_running" type="checkbox"
                                     class="form-check-input">
                              Running
                              <i class="input-frame bx bx-check"></i>
                            </label>
                          </div>

                          <div v-if="errors.quote_vehicles[key]">
                            <div v-for="error in errors.quote_vehicles[key].is_running"
                                 class="form-group validation-error">
                              {{ error }}
                            </div>
                          </div>

                          <div class="form-group">
                            <label :for="'vehicles_' + key + '_' + 'size'">Size</label>
                            <select v-if="carSizes" v-model="formData.quote_vehicles[key].size" class="form-control"
                                    :id="'vehicles_' + key + '_' + 'size'">
                              <option selected="" disabled="">Select Size</option>
                              <option v-for="item in carSizes" :value="item.key">
                                {{ item.value }}
                              </option>
                            </select>
                          </div>

                          <div v-if="errors.quote_vehicles[key]">
                            <div v-if="errors.quote_vehicles[key]" v-for="error in errors.quote_vehicles[key].size"
                                 class="form-group validation-error">
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

            <div class="col-12">
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
                        <label for="carrier_type">Carrier Type</label>
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

                      <div class="form-group">
                        <label for="available_date">Available Date</label>
                        <div class="input-group date datepicker" id="available_date">
                          <input type="text" id="available_date_datepicker" class="form-control datePicker">
                          <span @click="showAvailableDateDatepicker" class="input-group-addon"><svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2"
                                                                   ry="2"></rect><line x1="16" y1="2" x2="16"
                                                                                       y2="6"></line><line x1="8" y1="2"
                                                                                                           x2="8"
                                                                                                           y2="6"></line><line
                            x1="3" y1="10" x2="21" y2="10"></line></svg></span>
                        </div>
                      </div>

                      <div v-for="error in errors.available_date" class="form-group validation-error">
                        {{ error }}
                      </div>


                      <div class="form-group">
                        <label for="delivery_date">Delivery Date</label>
                        <div class="input-group date datepicker" id="delivery_date">
                          <input type="text" id="delivery_date_datepicker" class="form-control datePicker">
                          <span @click="showDeliveryDateDatepicker" class="input-group-addon"><svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2"
                                                                   ry="2"></rect><line x1="16" y1="2" x2="16"
                                                                                       y2="6"></line><line x1="8" y1="2"
                                                                                                           x2="8"
                                                                                                           y2="6"></line><line
                            x1="3" y1="10" x2="21" y2="10"></line></svg></span>
                        </div>
                      </div>

                      <div v-for="error in errors.delivery_date" class="form-group validation-error">
                        {{ error }}
                      </div>

                      <div class="form-group">
                        <label for="delivery_accuracy">Delivery Date Accuracy</label>
                        <p class="card-description">
                          Choose On/Before/Around or After Delivery Date
                        </p>
                        <select v-if="deliveryAccuracy" v-model="formData.delivery_accuracy" class="form-control"
                                id="delivery_accuracy">
                          <option selected="" disabled="">Select Delivery Accuracy</option>
                          <option v-for="item in deliveryAccuracy" :value="item.key">
                            {{ item.value }}
                          </option>
                        </select>
                      </div>

                      <div v-for="error in errors.delivery_accuracy" class="form-group validation-error">
                        {{ error }}
                      </div>

                      <div class="form-group">
                        <label for="price">Price</label>
                        <the-mask
                          v-model="formData.price"
                          type="text"
                          class="form-control"
                          id="price"
                          autocomplete="off"
                          placeholder="Price"
                          :mask="['$ # ###', '$ ## ###', '$ ### ###', '$ # ### ###', '$ ## ### ###', '$ ### ### ###']"
                        ></the-mask>
                      </div>

                      <div v-for="error in errors.price" class="form-group validation-error">
                        {{ error }}
                      </div>

                      <div class="form-group">
                        <label for="deposit">Deposit</label>

                        <the-mask
                          v-model="formData.deposit"
                          type="text"
                          class="form-control"
                          id="deposit"
                          autocomplete="off"
                          placeholder="Deposit"
                          :mask="['$ # ###', '$ ## ###', '$ ### ###', '$ # ### ###', '$ ## ### ###', '$ ### ### ###']"
                        ></the-mask>
                      </div>

                      <div v-for="error in errors.deposit" class="form-group validation-error">
                        {{ error }}
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 mb-4">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <terms />
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group form-check">
                            <label class="form-check-label">
                              <input v-model="formData.terms.agreement" type="checkbox"
                                     class="form-check-input">

                              Do you accept the terms and conditions?
                              <i class="input-frame bx bx-check"></i>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">

                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="signer">Type Your Name</label>
                            <input v-model="formData.signer" type="text" class="form-control" id="signer"
                                   autocomplete="off" placeholder="Your name">
                          </div>
                          <vueSignature class="quote__signature" ref="signature" :w="'100%'"
                                        :h="'148px'"></vueSignature>
                          <a class="mt-2" href="##" @click="$refs.signature.clear()">Clear</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12">
              <div v-if="updatingQuote">
                <Loading></Loading>
              </div>
              <div v-else @click="updateQuote">
                <a class="btn btn-primary">Complete order</a>
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
  import vueSignature from 'vue-signature';
  import terms from '../../shared/terms';

  const MODE_EDIT = 1;
  const MODE_ACCOMPLISH = 2;

  export default {
    name: "EditQuote",
    components: {
      Loading,
      vueSignature,
      terms
    },
    data() {
      return {
        MODE_EDIT,
        MODE_ACCOMPLISH,

        logo: false,

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

          quote_vehicles: [
            {
              year: '',
              make: '',
              model: '',
              vin: '',
              is_running: false,
              size: '',
            }
          ],
          terms: {
            agreement: false,
            signer: '',
            signature: null
          }
        },
        errors: {
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
          quote_vehicles: [],
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
          carrier_type: []
        }
      }
    },
    beforeDestroy() {
      document.removeEventListener('click', this.eventListeners.clickEventListener);
    },
    mounted() {
      if (this.$route.query.pub) {
        client.defaults.headers.common['Authorization'] = `Bearer ${this.$route.query.pub}`;
      }

      this.loadQuoteInfo()
        .then(() => {
          this.onQuoteInfoLoaded();
        });

      this.loadCarrierTypes();
      this.loadCarSizes();
      this.loadDeliveryAccuracy();
      this.loadStates();
      this.loadStatuses();
      this.loadLogo()
    },
    methods: {
      parseQuoteData() {
        // Quote shipper
        this.formData.status = this.quote.status;
        this.formData.first_name = this.quote.shipper.first_name;
        this.formData.last_name = this.quote.shipper.last_name;
        this.formData.email = this.quote.shipper.email;
        this.formData.phone = this.quote.shipper.phone;
        this.formData.type = this.quote.shipper.type;
        this.formData.company = this.quote.shipper.company;
        this.formData.address_1 = this.quote.shipper.address_1;
        this.formData.address_2 = this.quote.shipper.address_2;
        this.formData.mobile = this.quote.shipper.mobile;
        this.formData.zip = this.quote.shipper.zip;
        this.formData.city = this.quote.shipper.city;
        this.formData.state = this.quote.shipper.state;
        this.formData.phone_2 = this.quote.shipper.phone_2;
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

        // Quote vehicles
        this.formData.quote_vehicles = [];
        this.quote.vehicles.forEach(vehicle => {
          this.formData.quote_vehicles.push({...vehicle});
        })
      },
      loadQuoteInfo() {
        return client.get('/api/v1/shipper/' + this.$route.params.shipper_id + '/quotes/' + this.$route.params.quote_id)
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
        return client.get('/api/v1/car-sizes-data')
          .then(res => {
            this.carSizes = [...res.data.data];
          })
          .catch(err => {
            this.$swal('Error', 'Could not load car sizes', 'error');
          })
      },
      loadDeliveryAccuracy() {
        return client.get('/api/v1/delivery-accuracy-data')
          .then(res => {
            this.deliveryAccuracy = [...res.data.data];
          })
          .catch(err => {
            this.$swal('Error', 'Could not load delivery accuracy data', 'error');
          })
      },
      loadCarrierTypes() {
        return client.get('/api/v1/carrier-types-data')
          .then(res => {
            this.carrierTypes = [...res.data.data];
          })
          .catch(err => {
            this.$swal('Error', 'Could not load carrier types data', 'error');
          })
      },
      loadStates() {
        return client.get('/api/v1/states-data')
          .then(res => {
            this.states = [...res.data.data];
          })
          .catch(err => {
            this.$swal('Error', 'Could not load states data', 'error');
          })
      },
      loadStatuses() {
        return client.get('/api/v1/quote-statuses-data')
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
        return client.get('/api/v1/zip/' + zip + '/autocomplete');
      },

      getCityInfo(city) {
        return client.get('/api/v1/city/' + city + '/autocomplete');
      },

      getPlaceInfo(placeId) {
        return client.get('/api/v1/place/' + placeId + '/details');
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

      addEmptyVehicle() {
        this.formData.quote_vehicles.push({
          year: '',
          make: '',
          model: '',
          vin: '',
          is_running: false,
          size: ''
        });
      },
      removeVehicle(key) {
        this.formData.quote_vehicles.splice(key, 1);
        this.formData.quote_vehicles = [...this.formData.quote_vehicles];
      },
      clearCreateErrors() {
        this.errors = {
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
          quote_vehicles: [],
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
          carrier_type: []
        };
      },
      updateQuote() {
        this.clearCreateErrors();
        this.updatingQuote = true;
        client.post('/api/v1/shipper/' + this.$route.params.shipper_id + '/quotes/' + this.$route.params.quote_id, {
          ...this.formData,
        })
          .then(res => {
            this.updatingQuote = false;

            this.$swal('Success', 'Order has been completed', 'success')
            // .then(() => {
            //   router.push(
            //     {
            //       name: 'shipper.quotes.review',
            //       params: {
            //         shipper_id: this.$route.params.shipper_id,
            //         quote_id: res.data.data.id
            //       }
            //     }
            //   )
            // });
          })
          .catch(error => {
            if (error.response.status === 422) {
              this.$swal('Error', 'Form contains some errors', 'error')
                .then(() => {
                });
            }

            const err = error.response.data.errors;

            Object.keys(this.errors).forEach(key => {
              if (err[key]) {
                err[key].forEach(item => {
                  this.errors[key].push(item);
                });
              }
            });

            this.formData.quote_vehicles.forEach((item, i, arr) => {
              this.errors.quote_vehicles[i] = [];

              Object.keys(item).forEach(key => {
                this.errors.quote_vehicles[i][key] = [];
              })

              Object.keys(item).forEach(key => {
                if (error.response.data.errors['quote_vehicles.' + i + '.' + key]) {
                  if (!Array.isArray(this.errors.quote_vehicles[i][key])) {

                    this.errors.quote_vehicles[i][key] = [];
                  }
                  error.response.data.errors['quote_vehicles.' + i + '.' + key].forEach(item => {
                    this.errors.quote_vehicles[i][key].push(item);
                  })
                }
              })
            });

          })
          .finally(() => {
            this.updatingQuote = false;
          })
      },
      recalculatePrice() {
        if (this.formData.quote_destination_zip && this.formData.quote_destination_zip.length === 5 && this.formData.quote_origin_zip && this.formData.quote_origin_zip.length === 5) {
          client.post('/api/v1/calculate-price', {
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
      },
      loadLogo() {
        client.get(`/api/v1/shipper/${this.$route.params.shipper_id}/settings/logo`)
          .then(response => {
            this.logo = response.data.value;
          })
      }
    },
    computed: {
      origin_zip() {
        return this.formData.quote_origin_zip;
      },
      destination_zip() {
        return this.formData.quote_destination_zip;
      },
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

  .quote {
    &__company-logo {
      & > img {
        height: 120px;
        width: 120px;
      }
    }

    &__signature {
      border: 1px solid #a0a0a0;
    }
  }
</style>
